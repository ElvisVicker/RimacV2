<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        return view('client.pages.contact.contact');
    }

    public function store(StoreContactRequest $request)
    {
        $check = DB::table('contacts')->insert([
            "name" => $request->name,
            "email" => $request->email,
            "message" => $request->message,
            "status" => '1',
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Created Contact Success' : 'Created Contact Fail';
        return redirect()->route('client.contact')->with('message', $message);
    }
}
