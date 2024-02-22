<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\StoreAccountRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = DB::table('users')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.pages.account.list', ['accounts' => $accounts]);
    }

    public function create()
    {
        return view('admin.pages.account.create');
    }

    public function store(StoreAccountRequest $request)
    {
        if ($request->hasFile('image')) {
            $fileOriginalName =  $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOriginalName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);
        }

        $check = DB::table('users')->insert([
            "name" => $request->name,
            "middle_name" => $request->middle_name,
            "last_name" => $request->last_name,
            "gender" => $request->gender,
            "email" => $request->email,
            "password" => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            "phone_number" => $request->phone_number,
            "address" => $request->address,
            "role" => $request->role,
            "image" => $fileName ?? null,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
            "status" => 1,
            "email_verified_at" => Carbon::now(),
            "remember_token" =>     Str::random(10)
        ]);

        $message = $check ? 'Created Account Success' : 'Created Account Fail';
        return redirect()->route('admin.account.index')->with('message', $message);
    }

    public function show(string $id)
    {
        $account = DB::table('users')->find($id);

        $buy_orders = DB::table('buy_orders')
            ->select(
                'buy_orders.id as id',
                'buy_orders.total_price as total_price',
                'buy_orders.created_at',
                'buy_orders.updated_at',
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
            ->where('staff_id', '=', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $totalCarPrice = 0;
        $totalCost = DB::table('buy_orders')->where('staff_id', '=', $id)->get();
        foreach ($totalCost as $data) {
            $totalCarPrice += $data->total_price;
        };
        // return view('admin.pages.account.detail', ['buy_orders' => $buy_orders]);

        return view('admin.pages.account.detail', ['account' => $account, 'buy_orders' => $buy_orders,      'totalCarPrice' => $totalCarPrice]);
    }

    public function edit(string $id)
    {
    }

    public function update(ProfileUpdateRequest $request, string $id)
    {
         }

    public function destroy(string $id)
    {
        $account = DB::table('users')->find($id);
        $image = $account->image;
        if (!is_null($image) && file_exists('images/' . $image)) {
            unlink('images/' . $image);
        }

        DB::table('users')->where('id', '=', $id)->update([
            "status" => 0,
            "image" => null
        ]);


        $accountData = User::find($id);
        $accountData->delete();
        return redirect()->route('admin.account.index')->with('message', 'Deleted Account Success');
    }

    public function restore(string $id)
    {
        $accountData = User::withTrashed()->find($id);
        $accountData->restore();
        DB::table('users')->where('id', '=', $id)->update([
            "status" => 1
        ]);
        return redirect()->route('admin.account.index')->with('message', 'Restored Account Success');
    }
}
