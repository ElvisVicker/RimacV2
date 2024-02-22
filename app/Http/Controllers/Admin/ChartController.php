<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class ChartController extends Controller
{
    public function index()
    {

        //Total Account
        $accountNumber = DB::table('users')
            ->selectRaw('status, count(status) as number')
            ->groupBy('status')
            ->get();
        $totalAcc = 0;
        foreach ($accountNumber as $data) {
            $totalAcc += $data->number;
        };


        //Total Car
        $carNumber = DB::table('cars')
            ->selectRaw('status, count(status) as number')
            ->groupBy('status')
            ->get();
        $totalCar = 0;
        foreach ($carNumber as $data) {
            $totalCar += $data->number;
        };


        //Total Order
        $orderNumber = DB::table('buy_orders')
            ->selectRaw('id, count(id) as number')
            ->groupBy('id')
            ->get();
        $totalOrder = 0;
        foreach ($orderNumber as $data) {
            $totalOrder += $data->number;
        };
// dd($totalOrder);


        //Total Buyer
        $buyerNumber = DB::table('buyers')
            ->selectRaw('status, count(status) as number')
            ->groupBy('status')
            ->get();
        $totalBuyer = 0;
        foreach ($buyerNumber as $data) {
            $totalBuyer += $data->number;
        };



        //Car number by Category
        $labelArrayCategory = [];
        $dataArrayCategory = [];
        $carDatasCategory = DB::table('cars')->where('cars.status', '=', 1)
            ->leftJoin('car_categories', 'cars.car_category_id', '=', 'car_categories.id')
            ->selectRaw('car_categories.name, count(cars.car_category_id) as number ')
            ->groupBy('car_categories.name')
            ->get();
        foreach ($carDatasCategory as $data) {
            $labelArrayCategory[] = [$data->name];
            $dataArrayCategory[] = [$data->number];
        }

        //Car number by Brand
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


        //Buy Order Statistics
        $monthCost = [];
        $cost = 0;
        for ($i = 1; $i <= 12; $i++) {
            $total_cost = DB::table('buy_orders')->whereMonth('buy_orders.created_at',  $i)->where('cars.status', '=', 1)
                ->select('cars.price as car_price')
                ->leftJoin('cars', 'cars.id', '=', 'car_id')
                ->get();


            foreach ($total_cost as $data) {
                $cost += $data->car_price;
            };
            $monthCost[] +=  $cost;
            $cost = 0;
        }

        $monthProfit = [];
        $profit = 0;
        for ($i = 1; $i <= 12; $i++) {
            $total_profit = DB::table('buy_orders')->whereMonth('buy_orders.created_at',  $i)->where('cars.status', '=', 1)
                ->leftJoin('cars', 'cars.id', '=', 'car_id')

                ->get();
            foreach ($total_profit as $data) {
                $profit += $data->total_price;
            };
            $monthProfit[] +=  $profit;
            $profit = 0;
        }

        // Total Car Price
        $totalCarPrice = 0;
        $totalCost = DB::table('cars')->get();


        foreach ($totalCost as $data) {
            $totalCarPrice += $data->price;
        };


        $buy_orders = DB::table('buy_orders')
        ->select(
            'buy_orders.id as id',
            'buy_orders.total_price as total_price',
            'buy_orders.created_at',
            'buyers.id as buyer_id',
            'buyers.first_name as cus_first_name',
            'buyers.last_name as cus_last_name',
            'cars.id as car_id',
            'cars.name as car_name',
            'cars.price as car_price',
            'cars.status as car_status',
            'users.id as staff_id',
            'users.name as staff_first_name',
            'users.last_name as staff_last_name',
        )
        ->join('cars', 'cars.id', '=', 'car_id')
        ->join('buyers', 'buyers.id', '=', 'buyer_id')
        ->join('users', 'users.id', '=', 'staff_id')
        ->orderBy('created_at', 'desc')
       ->get();


        return view(
            'admin.pages.chart.chart',
            [
                'labelArrayCategory' => $labelArrayCategory,
                'dataArrayCategory' => $dataArrayCategory,
                'labelArrayBrand' => $labelArrayBrand,
                'dataArrayBrand' => $dataArrayBrand,
                'accountNumber' => $accountNumber,
                'buyerNumber' => $buyerNumber,
                'totalBuyer' => $totalBuyer,
                'carNumber' => $carNumber,
                'totalAcc' => $totalAcc,
                'totalCar' => $totalCar,
                'monthCost' => $monthCost,
                'monthProfit' => $monthProfit,
                'totalCarPrice' => $totalCarPrice,
                'totalOrder'=> $totalOrder,
                'buy_orders' => $buy_orders
            ]
        );
    }
}
