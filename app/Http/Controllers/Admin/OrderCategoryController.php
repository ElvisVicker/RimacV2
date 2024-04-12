<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderCategories = DB::table('order_categories')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.order_category.list', ['orderCategories' => $orderCategories]);
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
        // $order_category = DB::table('order_categories')->find($id);
        // return view('admin.pages.order_category.detail', ['order_category' => $order_category]);
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
