<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        //Total Employee
        $employeesNumber = DB::table('employees')
            ->selectRaw('status, count(status) as number')
            ->groupBy('status')
            ->get();

        $totalEmployees = 0;
        foreach ($employeesNumber as $data) {
            $totalEmployees += $data->number;
        };

        //Total Customer
        $customersNumber = DB::table('customers')
            ->selectRaw('status, count(status) as number')
            ->groupBy('status')
            ->get();

        $totalCustomers = 0;
        foreach ($customersNumber as $data) {
            $totalCustomers += $data->number;
        };
        // dd($totalCustomers);


        //Total Export Order
        $orderNumber = DB::table('export_orders')
            ->selectRaw('id, count(id) as number')
            ->groupBy('id')
            ->get();
        $totalOrder = 0;
        foreach ($orderNumber as $data) {
            $totalOrder += $data->number;
        };


        // Total Car Price
        $totalCarImportPrice = 0;
        $totalCost = DB::table('cars')->get();


        foreach ($totalCost as $data) {

            $totalCarImportPrice += ($data->import_price * $data->quantity);
        };


        //Buy Order Statistics
        $monthCost = [];
        $cost = 0;
        for ($i = 1; $i <= 12; $i++) {
            $total_cost = DB::table('import_details')->whereMonth('import_details.created_at',  $i)
                ->select('import_price', 'quantity')
                ->get();
            foreach ($total_cost as $data) {
                $cost += ($data->import_price * $data->quantity);
            };
            $monthCost[] +=  $cost;
            $cost = 0;
        }

        $monthProfit = [];
        $profit = 0;
        for ($i = 1; $i <= 12; $i++) {
            $total_profit = DB::table('export_details')->whereMonth('export_details.created_at',  $i)
                ->select('export_price', 'quantity')
                ->get();
            foreach ($total_profit as $data) {
                $profit += ($data->export_price * $data->quantity);
            };
            $monthProfit[] +=  $profit;
            $profit = 0;
        }


        //Car number by Category
        $labelArrayCategory = [];
        $dataArrayCategory = [];
        $carDatasCategory = DB::table('cars')->where('cars.status', '=', 1)
            ->leftJoin('categories', 'cars.car_category_id', '=', 'categories.id')
            ->selectRaw('categories.name, count(cars.car_category_id) as number ')
            ->groupBy('categories.name')
            ->get();
        foreach ($carDatasCategory as $data) {
            $labelArrayCategory[] = [$data->name];
            $dataArrayCategory[] = [$data->number];
        }

        $labelArrayBrand = [];
        $dataArrayBrand = [];
        $carDatasBrand = DB::table('cars')->where('cars.status', '=', 1)
            ->leftJoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->selectRaw('brands.name, count(cars.brand_id) as number ')
            ->groupBy('brands.name')
            ->get();
        foreach ($carDatasBrand as $data) {
            $labelArrayBrand[] = [$data->name];
            $dataArrayBrand[] = [$data->number];
        }



        $export_orders = DB::table('export_orders')
            ->select(
                'export_orders.id as id',
                'export_orders.prepay as prepay',
                'export_orders.created_at as created_at',
                'export_orders.customer_id as customer_id',
                'users.name as customer_name',
                'users.last_name as customer_last_name',
            )
            ->join('users', 'users.id', '=', 'customer_id')
            ->orderBy('created_at', 'desc')->limit(6)
            ->get();



        return view(
            'admin.pages.chart.chart',
            [
                'totalEmployees' => $totalEmployees,
                'totalCustomers' => $totalCustomers,
                'totalOrder' => $totalOrder,
                'totalCarImportPrice' => $totalCarImportPrice,
                'monthCost' => $monthCost,
                'monthProfit' => $monthProfit,
                'labelArrayCategory' => $labelArrayCategory,
                'dataArrayCategory' => $dataArrayCategory,
                'labelArrayBrand' => $labelArrayBrand,
                'dataArrayBrand' => $dataArrayBrand,
                'export_orders' => $export_orders,
            ]
        );
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
