<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExportOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $export_orders = DB::table('export_orders')
            ->select(
                'export_orders.id as export_id',
                'export_orders.order_id as order_id',
                'export_orders.customer_id as customer_id',
                'export_orders.prepay as prepay',
                'export_orders.created_at as export_created_at',
                'export_orders.status as export_status',
                // 'orders.id as orders_id',
                // 'orders.employee_id as employee_id',

                'users.name as customer_name',
                'users.last_name as customer_last_name',

                // 'export_details.car_id as car_id',
                // 'export_details.import_price as import_price',
                // 'export_details.quantity as quantity',

                // 'cars.name as car_name',
            )

            // ->join('orders', 'orders.id', '=', 'export_orders.order_id')
            // ->join('import_details', 'import_details.import_id', '=', 'export_orders.id')
            ->join('users', 'users.id', '=', 'export_orders.customer_id')



            ->orderBy('export_created_at', 'desc')

            ->paginate(10);
        // ->get();





        // dd($export_orders);
        return view('admin.pages.export_order.list', ['export_orders' => $export_orders]);

        // return view('admin.pages.import_order.list', ['export_orders' => $export_orders]);
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
                // 'orders.id as orders_id',
                'orders.employee_id as employee_id',

                'export_details.car_id as car_id',
                'export_details.export_price as export_price',
                'export_details.quantity as quantity',


                // 'users.last_name as user_lastname',
                // 'users.image as user_image',

                'cars.name as car_name',
            )

            ->join('orders', 'orders.id', '=', 'export_orders.order_id')
            ->join('export_details', 'export_details.export_id', '=', 'export_orders.id')
            ->join('cars', 'cars.id', '=', 'export_details.car_id')
            // ->join('users', 'users.id', '=', 'orders.employee_id')
            ->where('export_orders.id', '=', $id)

            ->get();

        // dd($export_order);

        return view(
            'admin.pages.export_order.detail',
            [
                'export_order' => $export_order[0],

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
