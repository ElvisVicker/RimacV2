<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index()
    {

        // Phan quyen dong
        $account =  DB::table('accounts')->where('user_id', '=', auth()->user()->id)->get();
        $permission =  DB::table('permissions')->where('id', '=',  $account[0]->permission_id)->get();
        $functions =  DB::table('functions')->where('name', '=', 'brands')->get();
        $permission_detail =  DB::table('permission_details')
            ->where('function_id', '=', $functions[0]->id)
            ->where('permission_id', '=', $permission[0]->id)
            ->get();




        $brands = DB::table('brands')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.brand.list', ['brands' => $brands, 'permission_detail' => $permission_detail[0]]);
    }

    public function create()
    {
        return view('admin.pages.brand.create');
    }

    public function store(StoreBrandRequest $request)
    {
        if ($request->hasFile('image')) {
            $fileOriginalName =  $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOriginalName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);
        }

        $check = DB::table('brands')->insert([
            "name" => $request->name,
            // "description" => $request->description,
            "status" => 1,
            "image" => $fileName ?? null,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Created Brand Success' : 'Created Brand Fail';
        return redirect()->route('admin.brand.index')->with('message', $message);
    }

    public function show(string $id)
    {
        $brand = DB::table('brands')->find($id);
        return view('admin.pages.brand.detail', ['brand' => $brand]);
    }


    public function edit(string $id)
    {
    }

    public function update(StoreBrandRequest $request, string $id)
    {

        // dd($request->all());
        $brand = DB::table('brands')->find($id);
        $oldImageFileName = $brand->image;
        if ($request->hasFile('image')) {
            $fileOriginalName =  $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOriginalName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);

            if (!is_null($oldImageFileName) && file_exists('images/' . $oldImageFileName)) {
                unlink('images/' . $oldImageFileName);
            }
        }

        $check = DB::table('brands')->where('id', '=', $id)->update([
            "name" => $request->name,
            // "description" => $request->description,
            "status" => 1,
            "image" => $fileName ?? $oldImageFileName,
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Updated Brand Success' : 'Updated Brand Fail';
        return redirect()->route('admin.brand.index')->with('message', $message);
    }

    public function destroy(string $id)
    {
        $brand = DB::table('brands')->find($id);
        $image = $brand->image;
        if (!is_null($image) && file_exists('images/' . $image)) {
            unlink('images/' . $image);
        }
        DB::table('brands')->where('id', '=', $id)->update([
            "status" => 0,
            "image" => null
        ]);
        $brandData = Brand::find($id);
        $brandData->delete();
        return redirect()->route('admin.brand.index')->with('message', 'Deleted Brand Success');
    }

    public function restore(string $id)
    {
        $brandData = Brand::withTrashed()->find($id);
        $brandData->restore();
        DB::table('brands')->where('id', '=', $id)->update([
            "status" => 1
        ]);
        return redirect()->route('admin.brand.index')->with('message', 'Restored Brand Success');
    }
}
