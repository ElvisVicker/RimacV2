<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $account =  DB::table('accounts')->where('user_id', '=', auth()->user()->id)->get();
        $permission =  DB::table('permissions')->where('id', '=',  $account[0]->permission_id)->get();
        $functions =  DB::table('functions')->where('name', '=', 'employees')->get();
        $permission_detail =  DB::table('permission_details')
            ->where('function_id', '=', $functions[0]->id)
            ->where('permission_id', '=', $permission[0]->id)
            ->get();
        $employees = DB::table('users')
            ->select(
                'users.*',
                'employees.position as employees_position',
            )
            ->join('employees', 'users.id', '=', 'employees.user_id')
            ->orderBy('created_at', 'desc')
            ->where('role', '=', 1)
            ->paginate(10);

        return view('admin.pages.employee.list', ['employees' => $employees, 'permission_detail' => $permission_detail[0]]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $permissions = DB::table('permissions')->whereNull('deleted_at')->where('status', '=', 1)->get();
        return view('admin.pages.employee.create',  ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request)
    {
        if ($request->hasFile('image')) {
            $fileOriginalName =  $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOriginalName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);
        }


        $getNextIdUser = DB::select("show table status like 'users'");
        $getNextIdAccount = DB::select("show table status like 'accounts'");

        $permissions = DB::table('permissions')->whereNull('deleted_at')->where('id', '=', $request->permission_id)->get();

        DB::table('users')->insert([

            "name" => $request->name,
            "middle_name" => $request->middle_name,
            "last_name" => $request->last_name,
            "gender" => $request->gender,
            "email" => $request->email,
            "password" => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            "phone_number" => $request->phone_number,
            "address" => $request->address,
            "role" => 1,
            "image" => $fileName ?? null,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
            "status" => 1,
            "email_verified_at" => Carbon::now(),
            "remember_token" =>     Str::random(10)
        ]);


        $check = DB::table('accounts')->insert([
            "id" => $getNextIdAccount[0]->Auto_increment,
            "user_id" => $getNextIdUser[0]->Auto_increment,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
            "status" => 1,
            'permission_id' => $request->permission_id,
        ]);

        $check = DB::table('employees')->insert([
            "user_id" =>  $getNextIdUser[0]->Auto_increment,
            "position" => $permissions[0]->name,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
            "status" => 1,
        ]);
        $message = $check ? 'Created Account Success' : 'Created Account Fail';
        return redirect()->route('admin.employees.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


        $employee = DB::table('users')
            ->select(
                'users.*',
                'employees.position as employees_position',
            )
            ->join('employees', 'users.id', '=', 'employees.user_id')
            ->where('users.id', '=', $id)
            ->get();

        return view('admin.pages.employee.detail', ['employee' => $employee[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {



        $user = DB::table('users')->where('id', $id)->get();

        $employee = DB::table('employees')->where('user_id', $id)->get();
        $account = DB::table('accounts')->where('user_id', $id)->get();

        // dd($account);
        $permissions = DB::table('permissions')->whereNull('deleted_at')->where('status', '=', 1)->get();


        return view('admin.pages.employee.edit', [
            'permissions' => $permissions,
            'user' => $user[0],
            'employee' => $employee[0],
            'account' => $account[0]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, string $id)
    {
        //
        // dd($request->all(), $id);



        $permissions = DB::table('permissions')->whereNull('deleted_at')->where('id', '=', $request->permission_id)->get();


        $user = DB::table('users')->find($id);

        $oldImageFileName = $user->image;
        if ($request->hasFile('image')) {
            $fileOriginalName =  $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOriginalName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);

            if (!is_null($oldImageFileName) && file_exists('images/' . $oldImageFileName)) {
                unlink('images/' . $oldImageFileName);
            }
        }

        $check = DB::table('users')->where('id', '=', $id)->update([
            "name" => $request->name,
            "middle_name" => $request->middle_name,
            "last_name" => $request->last_name,
            "gender" => $request->gender,
            "email" => $request->email,
            "image" => $fileName ?? $oldImageFileName,
            "phone_number" => $request->phone_number,
            "address" => $request->address,
            "updated_at" => Carbon::now()
        ]);


        $check = DB::table('employees')->where('user_id', '=', $id)->update([
            "position" => $permissions[0]->name,
            "updated_at" => Carbon::now()
        ]);

        $check = DB::table('accounts')->where('user_id', '=', $id)->update([
            "updated_at" => Carbon::now(),
            'permission_id' => $request->permission_id,
        ]);
        return redirect()->route('admin.employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = DB::table('users')->find($id);
        $image = $user->image;
        if (!is_null($image) && file_exists('images/' . $image)) {
            unlink('images/' . $image);
        }


        $userData = User::find($id);
        $userData->delete();


        DB::table('users')->where('id', '=', $id)->update([
            "status" => 0,
            'deleted_at' => Carbon::now()
        ]);

        DB::table('accounts')->where('user_id', '=', $id)->update([
            "status" => 0,
            'deleted_at' => Carbon::now()
        ]);

        DB::table('employees')->where('user_id', '=', $id)->update([
            "status" => 0,
            'deleted_at' => Carbon::now()
        ]);

        return redirect()->route('admin.employees.index')->with('message', 'Deleted Account Success');
    }
    public function restore(string $id)
    {
        $userData = User::withTrashed()->find($id);
        $userData->restore();

        DB::table('users')->where('id', '=', $id)->update([
            "status" => 1,
            'deleted_at' => null
        ]);
        DB::table('accounts')->where('user_id', '=', $id)->update([
            "status" => 1,
            'deleted_at' => null
        ]);

        DB::table('employees')->where('user_id', '=', $id)->update([
            "status" => 1,
            'deleted_at' => null
        ]);

        return redirect()->route('admin.employees.index')->with('message', 'Restored Account Success');
    }
}
