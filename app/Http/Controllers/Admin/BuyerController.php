<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBuyerRequest;
use App\Models\Buyer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuyerController extends Controller
{
    public function index()
    {
        $buyers = DB::table('buyers')
            ->select('buyers.*', 'cars.name as car_name', 'cars.price as price', 'car_categories.rent_price as rent_price')
            ->join('cars', 'cars.id', '=', 'car_id')
            ->join('car_categories', 'cars.car_category_id', '=', 'car_categories.id')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.pages.buyer.list', ['buyers' => $buyers]);
    }

    public function create()
    {
    }

    public function store(StoreBuyerRequest $request)
    {
    }

    public function show(string $id)
    {
        $buyer = DB::table('buyers')->find($id);

        return view('admin.pages.buyer.detail', ['buyer' => $buyer]);
    }

    public function edit(string $id)
    {
    }

    public function update(StoreBuyerRequest $request, string $id)
    {
        $check = DB::table('buyers')->where('id', '=', $id)->update([
            "status" => $request->status,
            "send" => $request->send,
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Updated Buyer Success' : 'Updated Buyer Fail';
        return redirect()->route('admin.buyer.index')->with('message', $message);
    }

    public function destroy(string $id)
    {
        $buyerData = Buyer::find($id);
        $buyerData->delete();
        return redirect()->route('admin.buyer.index')->with('message', 'Deleted Buyer Success');
    }

    public function restore(string $id)
    {
        $buyerData = Buyer::withTrashed()->find($id);
        $buyerData->restore();
        return redirect()->route('admin.buyer.index')->with('message', 'Restored Buyer Success');
    }
}
