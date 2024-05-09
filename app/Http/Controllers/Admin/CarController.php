<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarController extends Controller
{
    public function index()
    {

        $account =  DB::table('accounts')->where('user_id', '=', auth()->user()->id)->get();
        $permission =  DB::table('permissions')->where('id', '=',  $account[0]->permission_id)->get();
        $functions =  DB::table('functions')->where('name', '=', 'cars')->get();
        $permission_detail =  DB::table('permission_details')
            ->where('function_id', '=', $functions[0]->id)
            ->where('permission_id', '=', $permission[0]->id)
            ->get();



        $cars = DB::table('cars')
            ->select(
                'cars.*',
                'categories.name as car_category_name',

                'brands.name as brand_name',
                'brands.image as brand_image',

            )
            ->join('categories', 'cars.car_category_id', '=', 'categories.id')
            ->join('brands', 'cars.brand_id', '=', 'brands.id')

            ->orderBy('created_at', 'desc')
            ->paginate(10);


        // dd($cars);
        return view('admin.pages.car.list', ['cars' => $cars, 'permission_detail' => $permission_detail[0]]);
    }

    public function create()
    {
        $carCategories = DB::table('categories')->whereNull('deleted_at')->where('status', '=', 1)->get();
        $brands = DB::table('brands')->whereNull('deleted_at')->where('status', '=', 1)->get();

        return view('admin.pages.car.create', ['carCategories' => $carCategories, 'brands' => $brands]);
    }

    public function store(StoreCarRequest $request)
    {

        // dd($request->all());
        $carImages = [];
        if ($request->has('images')) {

            foreach ($request->file('images') as $image) {
                $fileOriginalName = $image->getClientOriginalName();
                $fileName = pathinfo($fileOriginalName, PATHINFO_FILENAME);
                $fileName .= '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'),  $fileName);
                $carImages[] = $fileName;
            }
        } else {
            $carImages = [];
        }
        $strImage = implode(', ', $carImages);



        $check = DB::table('cars')->insert([
            "name" => $request->name,
            "slug" => $request->slug,
            "import_price" => $request->import_price,
            "export_price" => $request->export_price,
            "description" => $request->description,
            "quantity" => 0,
            "model" => $request->model,
            "color" => $request->color,
            "fueltype" => $request->fueltype,
            "year" => $request->year,
            "image" => $strImage,
            "sittingfor" => $request->sittingfor,
            "transmission_type" => $request->transmission_type,
            "width" => $request->width,
            "height" => $request->height,
            "length" => $request->length,
            "wheelbase" => $request->wheelbase,
            "combined" => $request->combined,
            "motorway" => $request->motorway,
            "urban" => $request->urban,
            "emission_co2" => $request->emission_co2,
            "engine_size" => $request->engine_size,
            "maxKw" => $request->maxKw,
            "maxHp" => $request->maxHp,
            "acceleration" => $request->acceleration,
            "status" => 1,
            "extra_equipment" => $request->extra_equipment,
            "brand_id" => $request->brand_id,
            "car_category_id" => $request->car_category_id,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Created Car Success' : 'Created Car Fail';
        return redirect()->route('admin.car.index')->with('message', $message);
    }

    public function show(string $id)
    {
        $car = DB::table('cars')->find($id);
        $carCategories = DB::table('categories')->whereNull('deleted_at')->where('status', '=', 1)->get();
        $brands = DB::table('brands')->whereNull('deleted_at')->where('status', '=', 1)->get();
        return view('admin.pages.car.detail', ['car' => $car, 'carCategories' => $carCategories, 'brands' => $brands]);
    }

    public function edit(string $id)
    {
    }

    public function update(StoreCarRequest $request, string $id)
    {

        $uCarImage = DB::table('cars')->find($id);
        $oldImageFileName[] = $uCarImage->image;
        $carImages = [];
        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $fileOriginalName = $image->getClientOriginalName();
                $fileName = pathinfo($fileOriginalName, PATHINFO_FILENAME);
                $fileName .= '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'),  $fileName);
                $carImages[] = $fileName;
                foreach (explode(', ', implode(', ', $oldImageFileName)) as $oldImage) {
                    if (!is_null($oldImage) && file_exists('images/' . $oldImage)) {
                        if ($oldImage != '') {
                            unlink('images/' . $oldImage);
                        }
                    }
                }
            }
        } else {
            $carImages = $oldImageFileName;
        }
        $strImage = implode(', ', $carImages);

        // dd($strImage);
        $check = DB::table('cars')->where('id', '=', $id)->update([
            "name" => $request->name,
            "slug" => $request->slug,
            "import_price" => $request->import_price,
            "export_price" => $request->export_price,
            "description" => $request->description,
            "model" => $request->model,
            "color" => $request->color,
            "fueltype" => $request->fueltype,
            "year" => $request->year,
            "image" => $strImage,
            "sittingfor" => $request->sittingfor,
            "transmission_type" => $request->transmission_type,
            "width" => $request->width,
            "height" => $request->height,
            "length" => $request->length,
            "wheelbase" => $request->wheelbase,
            "combined" => $request->combined,
            "motorway" => $request->motorway,
            "urban" => $request->urban,
            "emission_co2" => $request->emission_co2,
            "engine_size" => $request->engine_size,
            "maxKw" => $request->maxKw,
            "maxHp" => $request->maxHp,
            "acceleration" => $request->acceleration,
            "extra_equipment" => $request->extra_equipment,
            "brand_id" => $request->brand_id,
            "car_category_id" => $request->car_category_id,
            "updated_at" => Carbon::now()
        ]);
        $message = $check ? 'Updated Car Success' : 'Updated Car Fail';
        return redirect()->route('admin.car.index')->with('message', $message);
    }

    public function destroy(string $id)
    {
        $carData = Car::find($id);
        $dCarImage = DB::table('cars')->find($id);
        $oldImageFileName[] = $dCarImage->image;
        foreach (explode(', ', implode(', ', $oldImageFileName)) as $oldImage) {
            if (!is_null($oldImage) && file_exists('images/' . $oldImage)) {
                if ($oldImage != '') {
                    unlink('images/' . $oldImage);
                }
            }
        }



        DB::table('cars')->where('id', '=', $id)->update([
            "status" => 0,
            "image" => null
        ]);



        $carData->delete();
        return redirect()->route('admin.car.index')->with('message', 'Deleted Car Success');
    }



    public function deleteImage(string $id)
    {
        $dCarImage = DB::table('cars')->find($id);
        $oldImageFileName[] = $dCarImage->image;
        foreach (explode(', ', implode(', ', $oldImageFileName)) as $oldImage) {
            if (!is_null($oldImage) && file_exists('images/' . $oldImage)) {
                if ($oldImage != '') {
                    unlink('images/' . $oldImage);
                }
            }
        }
        DB::table('cars')->where('id', '=', $id)->update([
            "image" => null
        ]);
        return redirect()->route('admin.car.index')->with('message', 'Deleted Car Success');
    }





    public function restore(string $id)
    {
        $carData = Car::withTrashed()->find($id);
        $carData->restore();
        DB::table('cars')->where('id', '=', $id)->update([
            "status" => 1
        ]);

        return redirect()->route('admin.car.index')->with('message', 'Restored Car Success');
    }

    public function createSlug(Request $request)
    {
        return response()->json(['slug' => Str::slug($request->name, '-')]);
    }
}
