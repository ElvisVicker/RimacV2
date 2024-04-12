<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        $cars = DB::table('cars')->where('cars.status', '=', 1)
            ->select('cars.*', 'categories.name as car_category_name', 'brands.name as brand_name', 'brands.image as brand_image')
            ->join('categories', 'cars.car_category_id', '=', 'categories.id')
            ->join('brands', 'cars.brand_id', '=', 'brands.id')

            ->inRandomOrder()
            ->limit(3)
            ->get();



        $carsNew = DB::table('cars')->where('cars.status', '=', 1)
            ->select('cars.*', 'categories.name as car_category_name',  'brands.name as brand_name', 'brands.image as brand_image')
            ->join('categories', 'cars.car_category_id', '=', 'categories.id')
            ->join('brands', 'cars.brand_id', '=', 'brands.id')

            ->orderBy('created_at', 'desc')->limit(3)->get();


        return view('client.pages.home.home', ['cars' => $cars, 'carsNew' => $carsNew]);
    }
}
