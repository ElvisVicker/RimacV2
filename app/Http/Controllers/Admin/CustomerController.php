<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $account =  DB::table('accounts')->where('user_id', '=', auth()->user()->id)->get();
        $permission =  DB::table('permissions')->where('id', '=',  $account[0]->permission_id)->get();
        $functions =  DB::table('functions')->where('name', '=', 'customers')->get();
        $permission_detail =  DB::table('permission_details')
            ->where('function_id', '=', $functions[0]->id)
            ->where('permission_id', '=', $permission[0]->id)
            ->get();


        $customers = DB::table('users')
            ->select(
                'users.*',
                'customers.status as customer_status',
                'accounts.deleted_at as account_deleted_at',
            )
            ->join('customers', 'users.id', '=', 'customers.user_id')
            ->join('accounts', 'users.id', '=', 'accounts.user_id')
            ->orderBy('created_at', 'desc')
            ->where('role', '=', 0)
            ->paginate(10);

        return view('admin.pages.customer.list', ['customers' => $customers, 'permission_detail' => $permission_detail[0]]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //



        $customer = DB::table('users')
            ->select(
                'users.*',
                'customers.status as customer_status',
            )
            ->join('customers', 'users.id', '=', 'customers.user_id')
            ->orderBy('created_at', 'desc')
            ->where('users.id', '=', $id)
            ->get();

        return view('admin.pages.customer.detail', ['customer' => $customer[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $user = DB::table('users')->where('id', $id)->get();

        $employee = DB::table('customers')->where('user_id', $id)->get();
        $account = DB::table('accounts')->where('user_id', $id)->get();



        return view('admin.pages.customer.edit', [

            'user' => $user[0],
            'employee' => $employee[0],
            'account' => $account[0]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('users')->where('id', '=', $id)->update([
            "status" => 0,
            'deleted_at' => Carbon::now()
        ]);

        DB::table('accounts')->where('user_id', '=', $id)->update([
            "status" => 0,
            'deleted_at' => Carbon::now()
        ]);

        DB::table('customers')->where('user_id', '=', $id)->update([
            "status" => 0,
            'deleted_at' => Carbon::now()
        ]);

        return redirect()->route('admin.customers.index')->with('message', 'Deleted Account Success');
    }

    public function restore(string $id)
    {
        DB::table('users')->where('id', '=', $id)->update([
            "status" => 1,
            'deleted_at' => null
        ]);
        DB::table('accounts')->where('user_id', '=', $id)->update([
            "status" => 1,
            'deleted_at' => null
        ]);

        DB::table('customers')->where('user_id', '=', $id)->update([
            "status" => 1,
            'deleted_at' => null
        ]);

        return redirect()->route('admin.customers.index')->with('message', 'Restored Account Success');
    }
}
