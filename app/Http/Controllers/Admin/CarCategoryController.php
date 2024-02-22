<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarCategoryRequest;
use App\Models\CarCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarCategoryController extends Controller
{

    public function index(Request $request)
    {
        $carCategories = DB::table('car_categories')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.car_category.list', ['carCategories' => $carCategories]);
    }

    public function create()
    {
        return view('admin.pages.car_category.create');
    }

    public function store(StoreCarCategoryRequest $request)
    {
        $check = DB::table('car_categories')->insert([
            "name" => $request->name,
            "description" => $request->description,
            "rent_price" => 1,
            "status" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Created Category Success' : 'Created Category Fail';
        return redirect()->route('admin.car_category.index')->with('message', $message);
    }

    public function show(string $id)
    {
        $carCategory = DB::table('car_categories')->find($id);
        return view('admin.pages.car_category.detail', ['carCategory' => $carCategory]);
    }

    public function edit(string $id)
    {
    }

    public function update(StoreCarCategoryRequest $request, string $id)
    {
        $check = DB::table('car_categories')->where('id', '=', $id)->update([
            "name" => $request->name,
            "description" => $request->description,
            // "rent_price" => 1,
            // "status" => 1,
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Updated Category Success' : 'Updated Category Fail';
        return redirect()->route('admin.car_category.index')->with('message', $message);
    }

    public function destroy(string $id)
    {
        DB::table('car_categories')->where('id', '=', $id)->update([
            "status" => 0
        ]);

        $carCategoryData = CarCategory::find($id);
        $carCategoryData->delete();
        return redirect()->route('admin.car_category.index')->with('message', 'Deleted Category Success');
    }


    public function restore(string $id)
    {
        $carCategoryData = CarCategory::withTrashed()->find($id);
        $carCategoryData->restore();
        DB::table('car_categories')->where('id', '=', $id)->update([
            "status" => 1
        ]);

        return redirect()->route('admin.car_category.index')->with('message', 'Restored Category Success');
    }
}
