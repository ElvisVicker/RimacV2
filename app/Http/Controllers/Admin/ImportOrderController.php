<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImportRequest;
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


        $account =  DB::table('accounts')->where('user_id', '=', auth()->user()->id)->get();
        $permission =  DB::table('permissions')->where('id', '=',  $account[0]->permission_id)->get();
        $functions =  DB::table('functions')->where('name', '=', 'imports')->get();
        $permission_detail =  DB::table('permission_details')
            ->where('function_id', '=', $functions[0]->id)
            ->where('permission_id', '=', $permission[0]->id)
            ->get();



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

                'users.name as user_name',

                'cars.name as car_name',
            )

            ->join('orders', 'orders.id', '=', 'import_orders.order_id')
            ->join('import_details', 'import_details.import_id', '=', 'import_orders.id')
            ->join('cars', 'cars.id', '=', 'import_details.car_id')
            ->join('users', 'users.id', '=', 'orders.employee_id')
            ->orderBy('import_created_at', 'desc')
            ->paginate(10);
        // ->get();
        // dd($import_orders);

        return view('admin.pages.import_order.list', ['import_orders' => $import_orders, 'permission_detail' => $permission_detail[0]]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {



        $cars = DB::table('cars')->where('status', '=', 1)->get();

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
    public function store(StoreImportRequest $request)
    {
        $order_categories = DB::table('order_categories')->where('status', '=', 1)->get();
        $getNextIdOrder = DB::select("show table status like 'orders'");
        $getNextIdImport = DB::select("show table status like 'import_orders'");




        $car = DB::table('cars')->where('id', '=', $request->car)->get();

        DB::table('orders')->insert([
            "id" => $getNextIdOrder[0]->Auto_increment,
            "employee_id" => auth()->user()->id,
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
        $import_order = DB::table('import_orders')
            ->select(
                'import_orders.id as import_id',
                'import_orders.order_id as order_id',
                'import_orders.created_at as import_created_at',

                'orders.id as orders_id',
                'orders.employee_id as employee_id',

                'import_details.car_id as car_id',
                'import_details.import_price as import_price',
                'import_details.quantity as quantity',

                'users.name as user_name',
                'users.last_name as user_lastname',
                'users.image as user_image',

                'cars.name as car_name',
            )

            ->join('orders', 'orders.id', '=', 'import_orders.order_id')
            ->join('import_details', 'import_details.import_id', '=', 'import_orders.id')
            ->join('cars', 'cars.id', '=', 'import_details.car_id')
            ->join('users', 'users.id', '=', 'orders.employee_id')
            ->where('import_id', '=', $id)

            ->get();



        return view(
            'admin.pages.import_order.detail',
            [
                'import_order' => $import_order[0],

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
