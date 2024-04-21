<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Validator;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();
        $request->session()->regenerate();

        if (Auth::check() && Auth::user()->role === 1) {
            return redirect()->route('admin.permissions.index');
        }

        if (Auth::check() && Auth::user()->role === 0) {
            return redirect()->route('client.home');
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        Cookie::queue(Cookie::forget('allCarId'));

        return redirect('/client/home');
    }



    public function fetch_data_login(Request $request)
    {
        $users = DB::table('users')
            ->where('email', '=', $request->email)
            ->get();



        if ($request->email == '') {
            return response()->json(['success' => 'Email required!']);
        } else {
            if (count($users) == 1) {
                return response()->json(['success' => '']);
            } else {
                return response()->json(['success' => 'These credentials do not match our records!']);
            }
        }


        // return response()->json(['success' => 'Added new records.']);
        // return view('auth.fetch_login', [
        //     'users' => $users,
        // ])->render();


        // if ($validator->passes()) {
        //     return response()->json(['success' => 'Added new records.']);
        // }

        // return response()->json(['errors' => $validator->errors()]);




        // if ($request->ajax()) {
        //     $users = DB::table('users')
        //         ->where('email', '=', $request->email)
        //         ->where('password', '=', $request->password)
        //         ->get();
        //     return view('auth.fetch_login', [
        //         'users' => $users,
        //     ])->render();
        // }
    }
}
