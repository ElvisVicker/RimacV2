<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $import_orders = DB::table('import_orders')
        //     ->select(
        //         'import_orders.id as id',
        //         'import_orders.total_price as total_price',
        //         'import_orders.created_at',
        //         'buyers.id as buyer_id',
        //         'buyers.first_name as cus_first_name',
        //         'buyers.last_name as cus_last_name',
        //         'cars.id as car_id',
        //         'cars.name as car_name',
        //         'cars.price as car_price',
        //         'cars.status as car_status',
        //         'users.id as staff_id',
        //         'users.name as staff_first_name',
        //         'users.last_name as staff_last_name',
        //     )
        //     ->join('cars', 'cars.id', '=', 'car_id')
        //     ->join('buyers', 'buyers.id', '=', 'buyer_id')
        //     ->join('users', 'users.id', '=', 'staff_id')
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(10);
        $import_orders = DB::table('import_orders')
            ->select(
                'import_orders.id as import_id',
                'import_orders.order_id as order_id',
                'import_orders.created_at as import_created_at',

                'orders.id as orders_id',
                'orders.employee_id as employee_id',

                'import_details.car_id as car_id',
                'import_details.import_price as import_price',
                'import_details.quantity as quantity',

                'cars.name as car_name',
            )

            ->join('orders', 'orders.id', '=', 'import_orders.order_id')
            ->join('import_details', 'import_details.import_id', '=', 'import_orders.id')
            ->join('cars', 'cars.id', '=', 'import_details.car_id')
            ->orderBy('import_created_at', 'desc')
            ->paginate(10);
        // ->get();


        return view('admin.pages.import_order.list', ['import_orders' => $import_orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {



        $cars = DB::table('cars')->where('status', '=', 1)->get();
        // dd($cars);
        // dd($order_categories);
        return view(
            'admin.pages.import_order.create',
            [
                'cars' => $cars
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order_categories = DB::table('order_categories')->where('status', '=', 1)->get();
        // dd($request->all());
        $getNextIdOrder = DB::select("show table status like 'orders'");
        $getNextIdImport = DB::select("show table status like 'import_orders'");




        $car = DB::table('cars')->where('id', '=', $request->car)->get();
        // dd($cars[0]->quantity += $request->quantity);
        // id = 1 -> import

        // dd($order_categories[0]->id);

        DB::table('orders')->insert([
            "id" => $getNextIdOrder[0]->Auto_increment,
            // "employee_id" => 1,
            "category_id" => $order_categories[0]->id,
            "status" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        DB::table('import_orders')->insert([
            "id" => $getNextIdImport[0]->Auto_increment,
            "order_id" => $getNextIdOrder[0]->Auto_increment,
            "status" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        DB::table('import_details')->insert([
            "import_id" => $getNextIdImport[0]->Auto_increment,
            "car_id" => $request->car,
            "quantity" => $request->quantity,
            "import_price" => $car[0]->import_price,
            "status" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);


        DB::table('cars')->where('id', '=', $request->car)->update([
            "quantity" => $car[0]->quantity += $request->quantity,
            "updated_at" => Carbon::now()
        ]);


        return redirect()->route('admin.import_order.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buy_order = DB::table('import_orders')->where('id', $id)->get();
        $buyer = DB::table('buyers')->where('id', '=', $buy_order[0]->buyer_id)->get();
        $car = DB::table('cars')->where('id', '=', $buy_order[0]->car_id)->get();
        $user = DB::table('users')->where('id', '=', $buy_order[0]->staff_id)->get();

        return view(
            'admin.pages.buy_order.detail',
            [
                'buy_order' => $buy_order,
                'buyer' => $buyer,
                'car' => $car,
                'user' => $user
            ]
        );
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
        $check = DB::table('cars')->where('id', '=', $request->car_id)->update([
            "status" => $request->status,
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Updated Buy Order Success' : 'Updated Buy Order Fail';
        return redirect()->route('admin.buy_order.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $result = DB::table('import_orders')->delete($id);
        return redirect()->route('admin.buy_order.index')->with('message', 'Deleted Buy Order Success');
    }
}
