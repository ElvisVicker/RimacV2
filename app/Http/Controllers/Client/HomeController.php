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
            ->select('cars.*', 'car_categories.name as car_category_name', 'car_categories.rent_price as car_category_rent_price', 'brands.name as brand_name', 'brands.image as brand_image')
            ->join('car_categories', 'cars.car_category_id', '=', 'car_categories.id')
            ->join('brands', 'cars.brand_id', '=', 'brands.id')

            ->inRandomOrder()
            ->limit(3)
            ->get();



        $carsNew = DB::table('cars')->where('cars.status', '=', 1)
            ->select('cars.*', 'car_categories.name as car_category_name', 'car_categories.rent_price as car_category_rent_price', 'brands.name as brand_name', 'brands.image as brand_image')
            ->join('car_categories', 'cars.car_category_id', '=', 'car_categories.id')
            ->join('brands', 'cars.brand_id', '=', 'brands.id')

            ->orderBy('created_at', 'desc')->limit(3)->get();


        return view('client.pages.home.home', ['cars' => $cars, 'carsNew' => $carsNew]);
    }



}
