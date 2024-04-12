<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Undefined;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = DB::table('permissions')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.permission.list', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $functions = DB::table('functions')->get();

        // $permissions = DB::table('permissions')->where('status', 1)->get();

        return view('admin.pages.permission.create', ['functions' => $functions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $getNextIdPermission = DB::select("show table status like 'permissions'");

        // dd($request->all());

        DB::table('permissions')->insert([
            "id" => $getNextIdPermission[0]->Auto_increment,
            "name" => $request->name,
            "status" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);




        $functionsArr = $request->get('functionName');
        $checkBoxArr = $request->get('checkBox');

        foreach ($functionsArr as $key => $function) {

            DB::table('permission_details')->insert([
                "permission_id" => $getNextIdPermission[0]->Auto_increment,
                "status" => 1,
                "function_id" => $function,


                "create" => ($checkBoxArr[$function][0] ?? null) ? 1 : 0,
                "read" => ($checkBoxArr[$function][1] ?? null) ? 1 : 0,
                "update" => ($checkBoxArr[$function][2] ?? null) ? 1 : 0,
                "delete" => ($checkBoxArr[$function][3] ?? null) ? 1 : 0,

                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]);
        };

        return redirect()->route('admin.permissions.index');

        // foreach ($request->checkBox as $test) {
        //     dd($test);
        // }
        // dd(($detailPermission[1][$test[$count]][2] ?? null) ? 1 : 0);


        // DB::table('permission_details')->insert([
        //     "permission_id" => $getNextIdPermission[0]->Auto_increment,
        //     "status" => 1,
        //     "created_at" => Carbon::now(),
        //     "updated_at" => Carbon::now()
        // ]);





        // dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permission = DB::table('permissions')->find($id);
        // dd($permission);

        $permission_detail = DB::table('permission_details')
            ->select('permission_details.*', 'functions.name as function_name')
            ->where('permission_id', $permission->id)
            ->join('functions', 'permission_details.function_id', '=', 'functions.id')
            ->get();


        // dd($permission_detail);



        return view('admin.pages.permission.detail', ['permission_detail' => $permission_detail, 'permission' =>  $permission]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        DB::table('permissions')->where('id', '=', $id)->update([
            "name" => $request->name,
            "updated_at" => Carbon::now()
        ]);



        // dd(DB::table('permission_details')->where('permission_id', '=', $id)->get());



        $functionsArr = $request->get('functionName');
        $checkBoxArr = $request->get('checkBox');



        foreach ($functionsArr as $key => $function) {
            // $function++;
            // dd($function);
            // dd(($checkBoxArr[$function][0] ?? null) ? 1 : 0);
            // dd(($checkBoxArr[$function]));
            // $test = (int)$function;

            $dof = DB::table('permission_details')->where('permission_id', '=', $id)->where('function_id', '=', $function)->select()->get();
            // dd($id, $function, $dof);

            // dd($key);
            $meo = DB::table('permission_details')->where('permission_id', '=', $id)->where('function_id', '=', $function)->update([
                "create" => ($checkBoxArr[$function][0] ?? null) ? 1 : 0,
                "read" => ($checkBoxArr[$function][1] ?? null) ? 1 : 0,
                "update" => ($checkBoxArr[$function][2] ?? null) ? 1 : 0,
                "delete" => ($checkBoxArr[$function][3] ?? null) ? 1 : 0,






                "updated_at" => Carbon::now()
            ]);
        };


        // foreach ($functionsArr as $key => $function) {



        //     // dd(($checkBoxArr[$function][0] ?? null) ? 1 : 0);




        //     // dd($function);
        //     // dd($checkBoxArr[0]);




        //     // dd(($checkBoxArr[$permission][0] ?? null) ? 1 : 0);
        //     // dd(DB::table('permission_details')->where('permission_id', '=', $id)->where('function_id', '=', (int)$function)->get());

        //     DB::table('permission_details')->where('permission_id', '=', $id)->where('function_id', '=',  (int)$function)->update([

        //         "create" => ($checkBoxArr[$function][0] ?? null) ? 1 : 0,
        //         "read" => ($checkBoxArr[$function][1] ?? null) ? 1 : 0,
        //         "update" => ($checkBoxArr[$function][2] ?? null) ? 1 : 0,
        //         "delete" => ($checkBoxArr[$function][3] ?? null) ? 1 : 0,
        //         "updated_at" => Carbon::now()
        //     ]);
        // };





        // $permissionsArr = $request->get('permissionName');
        // $checkBoxArr = $request->get('checkBox');



        // foreach ($permissionsArr as $key => $permission) {


        //     DB::table('permission_details')->where('permission_id', '=', $id)->update([
        //         "permission_id" => $id,
        //         "function_id" => $permission,
        //         "create" => ($checkBoxArr[$permission][0] ?? null) ? 1 : 0,
        //         "read" => ($checkBoxArr[$permission][1] ?? null) ? 1 : 0,
        //         "update" => ($checkBoxArr[$permission][2] ?? null) ? 1 : 0,
        //         "delete" => ($checkBoxArr[$permission][3] ?? null) ? 1 : 0,
        //         "updated_at" => Carbon::now()
        //     ]);
        // };





        // dd();
        // foreach ($permissionsArr as $key => $permission) {
        //     // dd($checkBoxArr[$permission][3] ?? null ? 1 : 0);

        //     DB::table('permission_details')->where('permission_id', '=', $id)->update([
        //         "permission_id" => $id,
        //         "function_id" => $permission,
        //         "create" => ($checkBoxArr[$permission][0] ?? null) ? 1 : 0,
        //         "read" => ($checkBoxArr[$permission][1] ?? null) ? 1 : 0,
        //         "update" => ($checkBoxArr[$permission][2] ?? null) ? 1 : 0,
        //         "delete" => ($checkBoxArr[$permission][3] ?? null) ? 1 : 0,
        //         "updated_at" => Carbon::now()
        //     ]);
        // };

        return redirect()->route('admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */




    public function destroy(string $id)
    {
        DB::table('permissions')->where('id', '=', $id)->update([
            "status" => 0,
            'deleted_at' => Carbon::now()
        ]);



        return redirect()->route('admin.permissions.index')->with('message', 'Deleted Account Success');
    }
    public function restore(string $id)
    {

        DB::table('permissions')->where('id', '=', $id)->update([
            "status" => 1,
            'deleted_at' => null
        ]);



        return redirect()->route('admin.permissions.index')->with('message', 'Restored Account Success');
    }
}
