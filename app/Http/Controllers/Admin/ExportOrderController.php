<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExportOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $account =  DB::table('accounts')->where('user_id', '=', auth()->user()->id)->get();
        $permission =  DB::table('permissions')->where('id', '=',  $account[0]->permission_id)->get();
        $functions =  DB::table('functions')->where('name', '=', 'exports')->get();
        $permission_detail =  DB::table('permission_details')
            ->where('function_id', '=', $functions[0]->id)
            ->where('permission_id', '=', $permission[0]->id)
            ->get();
        $export_orders = DB::table('export_orders')
            ->select(
                'export_orders.id as export_id',
                'export_orders.order_id as order_id',
                'export_orders.customer_id as customer_id',
                'export_orders.prepay as prepay',
                'export_orders.created_at as export_created_at',
                'export_orders.status as export_status',
                'users.name as customer_name',
                'users.last_name as customer_last_name',

            )
            ->join('users', 'users.id', '=', 'export_orders.customer_id')
            ->orderBy('export_created_at', 'desc')
            ->paginate(10);

        return view('admin.pages.export_order.list', ['export_orders' => $export_orders, 'permission_detail' => $permission_detail[0]]);
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

        $export_order = DB::table('export_orders')
            ->select(
                'export_orders.id as export_id',
                'export_orders.order_id as order_id',
                'export_orders.created_at as export_created_at',
                'export_orders.status as export_status',
                'export_orders.customer_id as customer_id',
                'export_details.car_id as car_id',
                'export_details.export_price as export_price',
                'export_details.quantity as quantity',
                'users.name as customer_name',
                'users.last_name as customer_last_name',
                'orders.employee_id as employee_id',
                'cars.name as car_name',
            )

            ->join('orders', 'orders.id', '=', 'export_orders.order_id')
            ->join('export_details', 'export_details.export_id', '=', 'export_orders.id')
            ->join('cars', 'cars.id', '=', 'export_details.car_id')
            ->join('users', 'users.id', '=', 'export_orders.customer_id')
            ->where('export_orders.id', '=', $id)

            ->get();



        return view(
            'admin.pages.export_order.detail',
            [
                'export_order' => $export_order,

            ]
        );
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
        if ($request->status == '1') {
            $detail_exports =  DB::table('export_details')->where('export_id', '=', $id)->get();
            foreach ($detail_exports as $detail_export) {
                $car = DB::table('cars')->where('id', '=',  $detail_export->car_id)->get();
                DB::table('cars')->where('id', '=', $detail_export->car_id)->update([
                    "quantity" => $car[0]->quantity -= $detail_export->quantity,
                ]);
            }
        }

        $order_id = DB::table('export_orders')->where('id', '=', $id)->get('order_id');
        DB::table('orders')->where('id', '=', $order_id[0]->order_id)->update([
            "employee_id" => auth()->user()->id,
        ]);
        $check = DB::table('export_orders')->where('id', '=', $id)->update([
            "status" => $request->status,
            "updated_at" => Carbon::now()
        ]);
        $message = $check ? 'Updated Buy Order Success' : 'Updated Buy Order Fail';
        return redirect()->route('admin.export_order.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
