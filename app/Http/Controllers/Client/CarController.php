<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    // public function index(Request $request)
    // {
    //     $carCategories = DB::table('categories')->get();
    //     $brands = DB::table('brands')->get();
    //     $colors = DB::table('cars')->distinct()->get('color');
    //     $fueltypies = DB::table('cars')->distinct()->get('fueltype');
    //     $years = DB::table('cars')->distinct()->get('year');
    //     $cars = DB::table('cars')->where('cars.status', '=', 1)
    //         ->select('cars.*', 'categories.name as car_category_name', 'brands.name as brand_name', 'brands.image as brand_image')
    //         ->join('categories', 'cars.car_category_id', '=', 'categories.id')
    //         ->join('brands', 'cars.brand_id', '=', 'brands.id')

    //         ->when(!$request->color == null, function ($query) use ($request) {
    //             $query->where('color', $request->color);
    //         }, function ($query) {
    //             $query->where('color', '<>', null);
    //         })

    //         ->when(!$request->fueltype == null, function ($query) use ($request) {
    //             $query->where('fueltype', $request->fueltype);
    //         }, function ($query) {
    //             $query->where('fueltype', '<>', null);
    //         })

    //         ->when(!$request->category == null, function ($query) use ($request) {
    //             $query->where('car_category_id', $request->category);
    //         }, function ($query) {
    //             $query->where('car_category_id', '<>', null);
    //         })

    //         ->when(!$request->brand == null, function ($query) use ($request) {
    //             $query->where('brand_id', $request->brand);
    //         }, function ($query) {
    //             $query->where('brand_id', '<>', null);
    //         })

    //         ->when(!$request->year == null, function ($query) use ($request) {
    //             $query->where('year', $request->year);
    //         }, function ($query) {
    //             $query->where('year', '<>', null);
    //         })

    //         ->when(!$request->price == null, function ($query) use ($request) {
    //             if ($request->price == '1') {
    //                 $query->where('export_price', '>', 0)->where('export_price', '<=', 49999);
    //             } else if ($request->price == '2') {
    //                 $query->where('export_price', '>', 49999)->where('export_price', '<=', 99999);
    //             } else {
    //                 $query->where('export_price', '>', 99999);
    //             }
    //         }, function ($query) {
    //             $query->where('export_price', '<>', null);
    //         })
    //         ->orderBy('created_at', 'desc')
    //         ->paginate(1);

    //     session(['category' => $request->category]);
    //     session(['color' => $request->color]);
    //     session(['fueltype' => $request->fueltype]);
    //     session(['brand' => $request->brand]);
    //     session(['year' => $request->year]);



    //     return view('client.pages.cars.cars', [
    //         'cars' => $cars,
    //         'carCategories' => $carCategories,
    //         'brands' => $brands,
    //         'colors' => $colors,
    //         'fueltypies' => $fueltypies,
    //         'years' => $years

    //     ]);
    // }

    public function index(Request $request)
    {
        // $search = 6;
        // $cars = DB::table('cars')
        //     ->where('name', 'like', "%{$search}%")->get();
        // // ->paginate(2);
        // dd($cars);
        $carCategories = DB::table('categories')->get();
        $brands = DB::table('brands')->get();
        $colors = DB::table('cars')->distinct()->get('color');
        $fueltypies = DB::table('cars')->distinct()->get('fueltype');
        $years = DB::table('cars')->distinct()->get('year');

        $cars = DB::table('cars')->where('cars.status', '=', 1)
            ->select('cars.*', 'categories.name as car_category_name', 'brands.name as brand_name', 'brands.image as brand_image')
            ->join('categories', 'cars.car_category_id', '=', 'categories.id')
            ->join('brands', 'cars.brand_id', '=', 'brands.id')

            ->orderBy('created_at', 'desc')
            ->paginate(3);


        return view('client.pages.cars.cars', [
            'cars' => $cars,
            'carCategories' => $carCategories,
            'brands' => $brands,
            'colors' => $colors,
            'fueltypies' => $fueltypies,
            'years' => $years

        ]);
    }

    public function fetch_data_pagination(Request $request)
    {
        if ($request->ajax()) {
            $cars = DB::table('cars')->paginate(3);
            return view('client.pages.cars.cars', compact('cars'))->render();
        }
    }

    public function fetch_data_search(Request $request)
    {
        if ($request->ajax()) {
            $cars = DB::table('cars')
                // ->where('name', '=', $request->input)
                ->where('name', 'like', "%{$request->input}%")
                ->paginate(3);
            return view('client.pages.cars.cars', compact('cars'))->render();
        }
    }




    // public function fetch_data_filter(Request $request)
    // {

    //     $cars = DB::table('cars')->where('cars.status', '=', 1)
    //         ->select('cars.*', 'categories.name as car_category_name', 'brands.name as brand_name', 'brands.image as brand_image')
    //         ->join('categories', 'cars.car_category_id', '=', 'categories.id')
    //         ->join('brands', 'cars.brand_id', '=', 'brands.id')

    //         ->when(!$request->color == null, function ($query) use ($request) {
    //             $query->where('color', $request->color);
    //         }, function ($query) {
    //             $query->where('color', '<>', null);
    //         })

    //         ->when(!$request->fueltype == null, function ($query) use ($request) {
    //             $query->where('fueltype', $request->fueltype);
    //         }, function ($query) {
    //             $query->where('fueltype', '<>', null);
    //         })

    //         ->when(!$request->category == null, function ($query) use ($request) {
    //             $query->where('car_category_id', $request->category);
    //         }, function ($query) {
    //             $query->where('car_category_id', '<>', null);
    //         })

    //         ->when(!$request->brand == null, function ($query) use ($request) {
    //             $query->where('brand_id', $request->brand);
    //         }, function ($query) {
    //             $query->where('brand_id', '<>', null);
    //         })

    //         ->when(!$request->year == null, function ($query) use ($request) {
    //             $query->where('year', $request->year);
    //         }, function ($query) {
    //             $query->where('year', '<>', null);
    //         })

    //         ->when(!$request->price == null, function ($query) use ($request) {
    //             if ($request->price == '1') {
    //                 $query->where('export_price', '>', 0)->where('export_price', '<=', 49999);
    //             } else if ($request->price == '2') {
    //                 $query->where('export_price', '>', 49999)->where('export_price', '<=', 99999);
    //             } else {
    //                 $query->where('export_price', '>', 99999);
    //             }
    //         }, function ($query) {
    //             $query->where('export_price', '<>', null);
    //         })
    //         ->orderBy('created_at', 'desc')
    //         ->paginate(1);



    //     return view('client.pages.cars.cars', [
    //         'cars' => $cars,
    //         'carCategories' => $carCategories,
    //         'brands' => $brands,
    //         'colors' => $colors,
    //         'fueltypies' => $fueltypies,
    //         'years' => $years

    //     ]);
    // }












    public function detail(string $id, string $slug)
    {


        $car = DB::table('cars')
            ->select('cars.*', 'categories.name as car_category_name', 'brands.name as brand_name', 'brands.image as brand_image')
            ->join('categories', 'cars.car_category_id', '=', 'categories.id')
            ->join('brands', 'cars.brand_id', '=', 'brands.id')

            ->where('cars.id', $id)->where('cars.slug', $slug)
            ->get();

        return view('client.pages.car_detail.car_detail', ['car' => $car]);
    }
}
