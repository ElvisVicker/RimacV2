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
use Illuminate\Support\Facades\Session;

class BuyController extends Controller
{


    public function store(Request $request)
    {
        //==================================


        // dd($request->all());



        // Add DB











        // $order_categories = DB::table('order_categories')->where('status', '=', 1)->get();
        // $getNextIdOrder = DB::select("show table status like 'orders'");
        // $getNextIdExport = DB::select("show table status like 'export_orders'");



        // $arrayQty = explode(",", $request->allQty);
        // $cookie = Cookie::get('allCarId');
        // $cookieArray = explode(',', json_decode($cookie));
        // array_pop($cookieArray);
        // $carIdQtyArray = collect($cookieArray)->zip($arrayQty);
        // $prepay = 0;
        // foreach ($carIdQtyArray as [$id, $qty]) {
        //     $id = (int) $id;
        //     $car = DB::table('cars')->where('id', '=', $id)->get();
        //     $prepay += $car[0]->export_price * $qty;
        // }
        // dd($arrayQty);



        // VNPAY
        // $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";

        // $vnp_Returnurl = route('client.vnpay-callback');
        // $vnp_TmnCode = "ETDYY7AE"; //Mã website tại VNPAY
        // $vnp_HashSecret = "IQZAYIQXEVCTCWNGOZVUXIZVTEBFTUMZ"; //Chuỗi bí mật

        // $vnp_TxnRef = Str::random(10); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        // $vnp_OrderInfo = "Car Order";
        // $vnp_OrderType = "Rimac";
        // // $vnp_Amount =  $prepay * 24520  * 100;
        // $vnp_Amount = 10000;
        // $vnp_Locale = "VN";
        // $vnp_BankCode = "NCB";
        // $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        // $inputData = array(
        //     "vnp_Version" => "2.1.0",
        //     "vnp_TmnCode" => $vnp_TmnCode,
        //     "vnp_Amount" => $vnp_Amount,
        //     "vnp_Command" => "pay",
        //     "vnp_CreateDate" => date('YmdHis'),
        //     "vnp_CurrCode" => "VND",
        //     "vnp_IpAddr" => $vnp_IpAddr,
        //     "vnp_Locale" => $vnp_Locale,
        //     "vnp_OrderInfo" => $vnp_OrderInfo,
        //     "vnp_OrderType" => $vnp_OrderType,
        //     "vnp_ReturnUrl" => $vnp_Returnurl,
        //     "vnp_TxnRef" => $vnp_TxnRef

        // );

        // if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        //     $inputData['vnp_BankCode'] = $vnp_BankCode;
        // }
        // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        // }

        // // var_dump($inputData);
        // ksort($inputData);
        // $query = "";
        // $i = 0;
        // $hashdata = "";
        // foreach ($inputData as $key => $value) {
        //     if ($i == 1) {
        //         $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        //     } else {
        //         $hashdata .= urlencode($key) . "=" . urlencode($value);
        //         $i = 1;
        //     }
        //     $query .= urlencode($key) . "=" . urlencode($value) . '&';
        // }

        // $vnp_Url = $vnp_Url . "?" . $query;
        // if (isset($vnp_HashSecret)) {
        //     $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
        //     $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        // }
        // // dd($vnp_Returnurl);
        // return Redirect::to($vnp_Url);


        //==========================================================================================

        $arrayQty = explode(",", $request->allQty);
        $qty = array_sum($arrayQty);
        $prepay =  $qty * 5000000;


        $vnp_TmnCode = "ETDYY7AE"; //Mã định danh merchant kết nối (Terminal Id)
        $vnp_HashSecret = "IQZAYIQXEVCTCWNGOZVUXIZVTEBFTUMZ"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl =  route('client.vnpay-callback');
        $vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
        // $vnp_Amount = $prepay * 24520;
        $vnp_Amount = $prepay; // Số tiền thanh toán
        $vnp_Locale = "VN"; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode =  ""; //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );


        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

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

        session(['prepay' => $prepay, 'allQty' => $request->allQty]);

        return Redirect::to($vnp_Url);
    }

    public function vnpayCallback(Request $request)
    {
        $prepay = session('prepay');
        $allQty = session('allQty');
        $prepay = $prepay / 25000;
        // dd($allQty);


        // dd($request->all());
        if ($request->vnp_ResponseCode === '00') {
            // $message = "Successfully";
            // Cookie::queue(Cookie::forget('allCarId'));
            $order_categories = DB::table('order_categories')->where('status', '=', 1)->get();
            $getNextIdOrder = DB::select("show table status like 'orders'");
            $getNextIdExport = DB::select("show table status like 'export_orders'");


            $arrayQty = explode(",", $allQty);
            $cookie = Cookie::get('allCarId');
            $cookieArray = explode(',', json_decode($cookie));
            array_pop($cookieArray);
            $carIdQtyArray = collect($cookieArray)->zip($arrayQty);

            // dd($arrayQty, $cookieArray, $carIdQtyArray);
            // $prepay = 0;
            // foreach ($carIdQtyArray as [$id, $qty]) {
            //     $id = (int) $id;
            //     $qty = (int) $qty;
            //     // dd($qty);
            //     $car = DB::table('cars')->where('id', '=', $id)->get();
            //     $prepay += $car[0]->export_price * $qty;
            // }




            DB::table('orders')->insert([
                "id" => $getNextIdOrder[0]->Auto_increment,
                // "employee_id" => 1,
                "category_id" => $order_categories[1]->id,
                "status" => 0,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]);

            DB::table('export_orders')->insert([
                "id" =>  $getNextIdExport[0]->Auto_increment,
                "customer_id" => auth()->user()->id,
                "order_id" => $getNextIdOrder[0]->Auto_increment,
                "prepay" => $prepay,
                "status" => 0,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]);

            foreach ($carIdQtyArray as [$id, $qty]) {
                $id = (int) $id;
                $qty = (int) $qty;

                $car = DB::table('cars')->where('id', '=', $id)->get();

                $check = DB::table('export_details')->insert([
                    "export_id" => $getNextIdExport[0]->Auto_increment,
                    "car_id" => $id,
                    "export_price" => $car[0]->export_price,
                    "quantity" => $qty,
                    "status" => 1,
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()
                ]);
            }
            //==================================

            unset($_SESSION['prepay']);
            unset($_SESSION['allQty']);

            Cookie::queue(Cookie::forget('allCarId'));
            $message = $check ? 'Buy Success' : 'Buy Fail';
        } else {
            $message = "Failed";
        }

        return redirect()->route('client.home')->with('message', $message);
    }
}
    // DB::table('orders')->insert([
    //     "id" => $getNextIdOrder[0]->Auto_increment,
    //     // "employee_id" => 1,
    //     "category_id" => $order_categories[1]->id,
    //     "status" => 0,
    //     "created_at" => Carbon::now(),
    //     "updated_at" => Carbon::now()
    // ]);

    // DB::table('export_orders')->insert([
    //     "id" =>  $getNextIdExport[0]->Auto_increment,
    //     "customer_id" => auth()->user()->id,
    //     "order_id" => $getNextIdOrder[0]->Auto_increment,
    //     "prepay" => $prepay * (10 / 100),
    //     "status" => 0,
    //     "created_at" => Carbon::now(),
    //     "updated_at" => Carbon::now()
    // ]);
    // //==================================
    // foreach ($carIdQtyArray as [$id, $qty]) {
    //     $id = (int) $id;
    //     $car = DB::table('cars')->where('id', '=', $id)->get();

    //     $check = DB::table('export_details')->insert([
    //         "export_id" => $getNextIdExport[0]->Auto_increment,
    //         "car_id" => $id,
    //         "export_price" => $car[0]->export_price,
    //         "quantity" => $qty,
    //         "status" => 1,
    //         "created_at" => Carbon::now(),
    //         "updated_at" => Carbon::now()
    //     ]);
    // }
    // Cookie::queue(Cookie::forget('allCarId'));
    // $message = $check ? 'Buy Success' : 'Buy Fail';




    // return redirect()->route('client.home')->with('message', $message);










    // DB::table('cars')->where('id', '=', $request->car)->update([
    //     "quantity" => $car[0]->quantity += $request->quantity,
    //     "updated_at" => Carbon::now()
    // ]);
















    // if ($request->payment == 1) {
    //     $cookie = Cookie::get('allCarId');
    //     $cookieArray = explode(',', json_decode($cookie));
    //     array_pop($cookieArray);
    //     foreach ($cookieArray as $id) {
    //         $id = (int) $id;
    //         $check = DB::table('buyers')->insert([
    //             "first_name" => $request->first_name,
    //             "middle_name" => $request->middle_name,
    //             "last_name" => $request->last_name,
    //             "phone_number" => $request->phone_number,
    //             "email" => $request->email,
    //             "address" => $request->address,
    //             "gender" => $request->gender,
    //             "car_id" => $id,
    //             "prepay" => 0,
    //             "created_at" => Carbon::now(),
    //             "updated_at" => Carbon::now()
    //         ]);
    //     }
    //     Cookie::queue(Cookie::forget('allCarId'));
    //     $message = $check ? 'Buy Success' : 'Buy Fail';
    //     return redirect()->route('client.home')->with('message', $message);
    // } else {
    //     //==========================
    //     // for total vnpay
    //     $cookie = Cookie::get('allCarId');
    //     $cookieArray = explode(',', json_decode($cookie));
    //     $carsInCart = [];
    //     $totalCarPrice = 0;
    //     foreach ($cookieArray as $id) {
    //         $car = DB::table('cars')
    //             ->select('cars.*', 'brands.name as brand_name', 'brands.image as brand_image')
    //             ->join('brands', 'cars.brand_id', '=', 'brands.id')
    //             ->where('cars.id', $id)->get();
    //         array_push($carsInCart, $car);
    //     }
    //     foreach ($carsInCart as $data) {
    //         foreach ($data as $i) {

    //             $totalCarPrice += $i->price;
    //         }
    //     };

    //     // Add DB
    //     array_pop($cookieArray);
    //     foreach ($cookieArray as $id) {
    //         $car = DB::table('cars')
    //             ->select('cars.*')
    //             ->where('id', $id)->get();
    //         $id = (int) $id;
    //         $check = DB::table('buyers')->insert([
    //             "first_name" => $request->first_name,
    //             "middle_name" => $request->middle_name,
    //             "last_name" => $request->last_name,
    //             "phone_number" => $request->phone_number,
    //             "email" => $request->email,
    //             "address" => $request->address,
    //             "gender" => $request->gender,
    //             "car_id" => $id,
    //             "prepay" => ($car[0]->price  + ($car[0]->price   * 15 / 100)) * 0.1,
    //             "created_at" => Carbon::now(),
    //             "updated_at" => Carbon::now()
    //         ]);
    //     }

    //     $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    //     $vnp_Returnurl = route('client.vnpay-callback');
    //     $vnp_TmnCode = "ETDYY7AE"; //Mã website tại VNPAY
    //     $vnp_HashSecret = "IQZAYIQXEVCTCWNGOZVUXIZVTEBFTUMZ"; //Chuỗi bí mật

    //     $vnp_TxnRef = Str::random(10); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    //     $vnp_OrderInfo = "Car Order";
    //     $vnp_OrderType = "Rimac";
    //     $vnp_Amount = ($totalCarPrice + ($totalCarPrice * 15 / 100)) * 0.05 * 24520  * 100;
    //     // $vnp_Amount = 10000;
    //     $vnp_Locale = "VN";
    //     $vnp_BankCode = "NCB";
    //     $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

    //     $inputData = array(
    //         "vnp_Version" => "2.1.0",
    //         "vnp_TmnCode" => $vnp_TmnCode,
    //         "vnp_Amount" => $vnp_Amount,
    //         "vnp_Command" => "pay",
    //         "vnp_CreateDate" => date('YmdHis'),
    //         "vnp_CurrCode" => "VND",
    //         "vnp_IpAddr" => $vnp_IpAddr,
    //         "vnp_Locale" => $vnp_Locale,
    //         "vnp_OrderInfo" => $vnp_OrderInfo,
    //         "vnp_OrderType" => $vnp_OrderType,
    //         "vnp_ReturnUrl" => $vnp_Returnurl,
    //         "vnp_TxnRef" => $vnp_TxnRef

    //     );

    //     if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    //         $inputData['vnp_BankCode'] = $vnp_BankCode;
    //     }
    //     if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    //         $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    //     }

    //     // var_dump($inputData);
    //     ksort($inputData);
    //     $query = "";
    //     $i = 0;
    //     $hashdata = "";
    //     foreach ($inputData as $key => $value) {
    //         if ($i == 1) {
    //             $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    //         } else {
    //             $hashdata .= urlencode($key) . "=" . urlencode($value);
    //             $i = 1;
    //         }
    //         $query .= urlencode($key) . "=" . urlencode($value) . '&';
    //     }

    //     $vnp_Url = $vnp_Url . "?" . $query;
    //     if (isset($vnp_HashSecret)) {
    //         $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
    //         $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    //     }
    //     // Cookie::queue(Cookie::forget('allCarId'));
    //     return Redirect::to($vnp_Url);
    // }
