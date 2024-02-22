<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuyOrderController extends Controller
{
    public function index()
    {
        $buy_orders = DB::table('buy_orders')
            ->select(
                'buy_orders.id as id',
                'buy_orders.total_price as total_price',
                'buy_orders.created_at',
                'buyers.id as buyer_id',
                'buyers.first_name as cus_first_name',
                'buyers.last_name as cus_last_name',
                'cars.id as car_id',
                'cars.name as car_name',
                'cars.price as car_price',
                'cars.status as car_status',
                'users.id as staff_id',
                'users.name as staff_first_name',
                'users.last_name as staff_last_name',
            )
            ->join('cars', 'cars.id', '=', 'car_id')
            ->join('buyers', 'buyers.id', '=', 'buyer_id')
            ->join('users', 'users.id', '=', 'staff_id')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('staff.pages.buy_order.list', ['buy_orders' => $buy_orders]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(string $id)
    {
        $buy_order = DB::table('buy_orders')->where('id', $id)->get();
        $buyer = DB::table('buyers')->where('id', '=', $buy_order[0]->buyer_id)->get();
        $car = DB::table('cars')->where('id', '=', $buy_order[0]->car_id)->get();
        $user = DB::table('users')->where('id', '=', $buy_order[0]->staff_id)->get();

        return view(
            'staff.pages.buy_order.detail',
            [
                'buy_order' => $buy_order,
                'buyer' => $buyer,
                'car' => $car,
                'user' => $user
            ]
        );
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
        return redirect()->route('staff.buy_order.index');
    }

    public function destroy(string $id)
    {
    }
}
