<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    public function index()
    {
        $cookie = Cookie::get('allCarId');
        $cookieArray = explode(',', json_decode($cookie));


        $carsInCart = [];
        foreach ($cookieArray as $id) {
            $car = DB::table('cars')
                ->select('cars.*', 'brands.name as brand_name', 'brands.image as brand_image')
                ->join('brands', 'cars.brand_id', '=', 'brands.id')
                ->where('cars.id', $id)->get();
            array_push($carsInCart, $car);
        }

        $totalCarPrice = 0;

        foreach ($carsInCart as $data) {
            foreach ($data as $i) {
                $totalCarPrice += $i->price;
            }
        };
        return view('client.pages.cart.cart', ['carsInCart' => $carsInCart, 'totalCarPrice' =>  $totalCarPrice]);
    }

    public function add_to_cart(Request $request)
    {
        if ($request->checkBuy == 1) {
            $cookieValue = "";
            $cookieValue .= json_decode($request->cookie('allCarId'));
            $cookieValue .= (string)$request->id . ',';
            Cookie::queue('allCarId', json_encode($cookieValue), 60);
        }
        return redirect()->route('client.cars');
    }

    public function destroy(Request $request)
    {
        $carData = request()->cookie('allCarId');
        $cookieArray = explode(',', json_decode($carData));
        $keys = array_keys($cookieArray, $request->carId);
        unset($cookieArray[$keys[0]]);
        $cookieString = '"' .  implode(',', $cookieArray) . '"';
        Cookie::queue('allCarId', $cookieString, 60);



        if ($cookieString== '""') {
            Cookie::queue(Cookie::forget('allCarId'));
        }

        return redirect()->route('client.cart');
    }

    public function checkout(Request $request)
    {
        if ($request->hasCookie('allCarId')) {
            return view('client.pages.checkout.checkout');
        } else {
            return redirect()->route('client.cars');
        }
    }
}
