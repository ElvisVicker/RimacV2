<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarImagesRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarImagesController extends Controller
{
    // public function index()
    // {
    //     $carImages = DB::table('car_images')
    //         ->select('car_images.*', 'cars.name as car_name')
    //         ->join('cars', 'car_images.car_id', '=', 'cars.id')
    //         ->get();

    //     return view('admin.pages.car_images.list', ['carImages' => $carImages]);
    // }

    // public function create()
    // {

    //     $cars = DB::table('cars')->where('status', '=', 1)->get();
    //     return view('admin.pages.car_images.create', ['cars' => $cars]);
    // }

    // public function store(StoreCarImagesRequest $request)
    // {
    //     $carImages = [];
    //     if ($request->has('images')) {

    //         foreach ($request->file('images') as $image) {
    //             $fileOriginalName = $image->getClientOriginalName();
    //             $fileName = pathinfo($fileOriginalName, PATHINFO_FILENAME);
    //             $fileName .= '_' . time() . '.' . $image->getClientOriginalExtension();
    //             $image->move(public_path('images'),  $fileName);
    //             $carImages[] = $fileName;
    //         }
    //     } else {
    //         $carImages = [];
    //     }
    //     $strImage = implode(', ', $carImages);

    //     $check = DB::table('car_images')->insert([
    //         'name' => $strImage,
    //         "car_id" => $request->car_id,
    //         "created_at" => Carbon::now(),
    //         "updated_at" => Carbon::now()
    //     ]);

    //     $message = $check ? 'Created Image Success' : 'Created Image Fail';
    //     return redirect()->route('admin.car_images.index')->with('message', $message);
    // }

    // public function show(string $id)
    // {
    //     $carImage = DB::table('car_images')->find($id);
    //     $cars = DB::table('cars')->where('status', '=', 1)->get();
    //     return view('admin.pages.car_images.detail', ['carImage' => $carImage, 'cars' => $cars]);
    // }

    // public function edit(string $id)
    // {
    // }

    // public function update(StoreCarImagesRequest $request, string $id)
    // {
    //     $carImage = DB::table('car_images')->find($id);
    //     $oldImageFileName[] = $carImage->name;
    //     if ($request->has('images')) {
    //         $carImages = [];
    //         foreach ($request->file('images') as $image) {
    //             $fileOriginalName = $image->getClientOriginalName();
    //             $fileName = pathinfo($fileOriginalName, PATHINFO_FILENAME);
    //             $fileName .= '_' . time() . '.' . $image->getClientOriginalExtension();
    //             $image->move(public_path('images'),  $fileName);
    //             $carImages[] = $fileName;
    //             foreach (explode(', ', implode(', ', $oldImageFileName)) as $oldImage) {
    //                 if (!is_null($oldImage) && file_exists('images/' . $oldImage)) {
    //                     if ($oldImage != '') {
    //                         unlink('images/' . $oldImage);
    //                     }
    //                 }
    //             }
    //         }
    //         $strImage = implode(', ', $carImages);
    //     } else {
    //         foreach (explode(', ', implode(', ', $oldImageFileName)) as $oldImage) {
    //             if (!is_null($oldImage) && file_exists('images/' . $oldImage)) {
    //                 if ($oldImage != '') {
    //                     unlink('images/' . $oldImage);
    //                 }
    //             }
    //         }
    //     }

    //     $check = DB::table('car_images')->where('id', '=', $id)->update([
    //         'name' =>  $strImage ?? '',
    //         "car_id" => $request->car_id,
    //         "updated_at" => Carbon::now()
    //     ]);
    //     $message = $check ? 'Updated Image Success' : 'Updated Image Fail';
    //     return redirect()->route('admin.car_images.index')->with('message', $message);
    // }

    // public function destroy(string $id)
    // {
    //     $carImage = DB::table('car_images')->find($id);
    //     $oldImageFileName[] = $carImage->name;
    //     foreach (explode(', ', implode(', ', $oldImageFileName)) as $oldImage) {
    //         if (!is_null($oldImage) && file_exists('images/' . $oldImage)) {
    //             if ($oldImage != '') {
    //                 unlink('images/' . $oldImage);
    //             }
    //         }
    //     }

    //     $result = DB::table('car_images')->delete($id);
    //     $message = $result ? 'Deleted Image Success' : 'Deleted Image Fail';
    //     return redirect()->route('admin.car_images.index')->with('message', $message);
    // }
}
