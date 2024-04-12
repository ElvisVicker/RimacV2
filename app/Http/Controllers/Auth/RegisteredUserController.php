<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        // dd($request->all());

        $getNextIdUser = DB::select("show table status like 'users'");
        $getNextIdAccount = DB::select("show table status like 'accounts'");
        // dd($getNextIdAccount[0]->Auto_increment);
        // dd($getNextIdUser);



        $user = User::create([
            'name' => $request->name,
            "middle_name" => $request->middle_name,
            "last_name" => $request->last_name,
            "gender" => $request->gender,
            'email' => $request->email,
            'password' => Hash::make($request->password),

            "phone_number" => $request->phone_number,
            "address" => $request->address,
            "role" => 0,

            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
            "status" => 1,
            "email_verified_at" => Carbon::now(),
            "remember_token" =>     Str::random(10)
        ]);

        DB::table('accounts')->insert([
            "id" => $getNextIdAccount[0]->Auto_increment,
            "user_id" => $getNextIdUser[0]->Auto_increment,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
            "status" => 1,
        ]);

        DB::table('customers')->insert([
            "user_id" =>  $getNextIdUser[0]->Auto_increment,

            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
            "status" => 1,
        ]);












        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
