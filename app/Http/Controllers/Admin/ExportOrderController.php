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
        $import_orders = DB::table('export_orders')
            // ->select(
            // 'import_orders.id as import_id',
            // 'import_orders.order_id as order_id',
            // 'import_orders.created_at as import_created_at',

            // 'orders.id as orders_id',
            // 'orders.employee_id as employee_id',

            // 'import_details.car_id as car_id',
            // 'import_details.import_price as import_price',
            // 'import_details.quantity as quantity',

            // 'cars.name as car_name',
            // )

            // ->join('orders', 'orders.id', '=', 'import_orders.order_id')
            // ->join('import_details', 'import_details.import_id', '=', 'import_orders.id')
            // ->join('cars', 'cars.id', '=', 'import_details.car_id')
            // ->orderBy('import_created_at', 'desc')
            ->paginate(10);
        // ->get();

        return view('admin.pages.import_order.list', ['import_orders' => $import_orders]);

        // return view('admin.pages.import_order.list', ['import_orders' => $import_orders]);
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
