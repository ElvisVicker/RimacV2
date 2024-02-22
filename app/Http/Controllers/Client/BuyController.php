<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBuyerRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class BuyController extends Controller
{
    public function store(StoreBuyerRequest $request)
    {
        if ($request->payment == 1) {
            $cookie = Cookie::get('allCarId');
            $cookieArray = explode(',', json_decode($cookie));
            array_pop($cookieArray);
            foreach ($cookieArray as $id) {
                $id = (int) $id;
                $check = DB::table('buyers')->insert([
                    "first_name" => $request->first_name,
                    "middle_name" => $request->middle_name,
                    "last_name" => $request->last_name,
                    "phone_number" => $request->phone_number,
                    "email" => $request->email,
                    "address" => $request->address,
                    "gender" => $request->gender,
                    "car_id" => $id,
                    "prepay" => 0,
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()
                ]);
            }
            Cookie::queue(Cookie::forget('allCarId'));
            $message = $check ? 'Buy Success' : 'Buy Fail';
            return redirect()->route('client.home')->with('message', $message);
        } else {
            //==========================
            // for total vnpay
            $cookie = Cookie::get('allCarId');
            $cookieArray = explode(',', json_decode($cookie));
            $carsInCart = [];
            $totalCarPrice = 0;
            foreach ($cookieArray as $id) {
                $car = DB::table('cars')
                    ->select('cars.*', 'brands.name as brand_name', 'brands.image as brand_image')
                    ->join('brands', 'cars.brand_id', '=', 'brands.id')
                    ->where('cars.id', $id)->get();
                array_push($carsInCart, $car);
            }
            foreach ($carsInCart as $data) {
                foreach ($data as $i) {

                    $totalCarPrice += $i->price;
                }
            };

            // Add DB
            array_pop($cookieArray);
            foreach ($cookieArray as $id) {
                $car = DB::table('cars')
                    ->select('cars.*')
                    ->where('id', $id)->get();
                $id = (int) $id;
                $check = DB::table('buyers')->insert([
                    "first_name" => $request->first_name,
                    "middle_name" => $request->middle_name,
                    "last_name" => $request->last_name,
                    "phone_number" => $request->phone_number,
                    "email" => $request->email,
                    "address" => $request->address,
                    "gender" => $request->gender,
                    "car_id" => $id,
                    "prepay" => ($car[0]->price  + ($car[0]->price   * 15 / 100)) * 0.1,
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()
                ]);
            }

            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = route('client.vnpay-callback');
            $vnp_TmnCode = "ETDYY7AE"; //Mã website tại VNPAY
            $vnp_HashSecret = "IQZAYIQXEVCTCWNGOZVUXIZVTEBFTUMZ"; //Chuỗi bí mật

            $vnp_TxnRef = Str::random(10); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = "Car Order";
            $vnp_OrderType = "Rimac";
            $vnp_Amount = ($totalCarPrice + ($totalCarPrice * 15 / 100)) * 0.05 * 24520  * 100;
            // $vnp_Amount = 10000;
            $vnp_Locale = "VN";
            $vnp_BankCode = "NCB";
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef

            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            // var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            // Cookie::queue(Cookie::forget('allCarId'));
            return Redirect::to($vnp_Url);
        }
    }



    public function vnpayCallback(Request $request)
    {
        // dd($request->all());
        if ($request->vnp_ResponseCode === '00') {
            $message = "Successfully";
             Cookie::queue(Cookie::forget('allCarId'));
        } else {
            $message = "Failed";
        }

        return redirect()->route('client.home')->with('message', $message);
    }
}
