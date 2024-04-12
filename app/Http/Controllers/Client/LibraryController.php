<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(auth()->user()->id);
        $export_orders = DB::table('export_orders')
            ->where('customer_id', '=', auth()->user()->id)
            ->orderBy('created_at', 'desc')->paginate(10);







        // $cars = DB::table('export_orders')
        //     ->select(
        //         'export_orders.*',


        //         'export_details.car_id as car_id',
        //         'export_details.export_price as export_price',
        //         'export_details.quantity as quantity',

        //         'cars.name as car_name',


        //     )
        //     ->join('export_details', 'export_orders.id', '=', 'export_details.export_id')

        //     ->join('cars', 'export_details.car_id', '=', 'cars.id')

        //     ->orderBy('created_at', 'desc')
        //     ->get(10);
        // dd($cars);




        // dd($cars);
        return view('client.pages.library.list', ['export_orders' => $export_orders]);
        // dd($cars);
        // return view('client.pages.library.list');
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

        // dd($id);


        $export_details = DB::table('export_orders')
            ->select(
                'export_orders.*',


                'export_details.car_id as car_id',
                'export_details.export_price as export_price',
                'export_details.quantity as quantity',

                'cars.name as car_name',
                'cars.slug as car_slug',

                'cars.image as car_image',


            )
            ->join('export_details', 'export_orders.id', '=', 'export_details.export_id')

            ->join('cars', 'export_details.car_id', '=', 'cars.id')
            ->where('export_orders.id', '=', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        // dd($export_details);
        return view('client.pages.library.detail', ['export_details' => $export_details]);
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
