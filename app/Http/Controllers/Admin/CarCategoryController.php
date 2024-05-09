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
        $account =  DB::table('accounts')->where('user_id', '=', auth()->user()->id)->get();
        $permission =  DB::table('permissions')->where('id', '=',  $account[0]->permission_id)->get();
        $functions =  DB::table('functions')->where('name', '=', 'categories')->get();
        $permission_detail =  DB::table('permission_details')
            ->where('function_id', '=', $functions[0]->id)
            ->where('permission_id', '=', $permission[0]->id)
            ->get();


        // dd($permission_detail);

        $carCategories = DB::table('categories')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.car_category.list', ['carCategories' => $carCategories, 'permission_detail' =>  $permission_detail[0]]);
    }

    public function create()
    {
        return view('admin.pages.car_category.create');
    }

    public function store(StoreCarCategoryRequest $request)
    {
        $check = DB::table('categories')->insert([
            "name" => $request->name,
            // "description" => $request->description,
            // "rent_price" => 1,
            "status" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Created Category Success' : 'Created Category Fail';
        return redirect()->route('admin.car_category.index')->with('message', $message);
    }

    public function show(string $id)
    {
        $carCategory = DB::table('categories')->find($id);
        return view('admin.pages.car_category.detail', ['carCategory' => $carCategory]);
    }

    public function edit(string $id)
    {
    }

    public function update(StoreCarCategoryRequest $request, string $id)
    {
        $check = DB::table('categories')->where('id', '=', $id)->update([
            "name" => $request->name,
            // "description" => $request->description,
            // "rent_price" => 1,
            // "status" => 1,
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Updated Category Success' : 'Updated Category Fail';
        return redirect()->route('admin.car_category.index')->with('message', $message);
    }

    public function destroy(string $id)
    {
        DB::table('categories')->where('id', '=', $id)->update([
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
        DB::table('categories')->where('id', '=', $id)->update([
            "status" => 1
        ]);

        return redirect()->route('admin.car_category.index')->with('message', 'Restored Category Success');
    }
}
