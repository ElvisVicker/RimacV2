<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = DB::table('contacts')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.contact.list', ['contacts' => $contacts]);
    }

    public function create()
    {
        return view('admin.pages.contact.create');
    }

    public function store(StoreContactRequest $request)
    {
        $check = DB::table('contacts')->insert([
            "name" => $request->name,
            "email" => $request->email,
            "message" => $request->message,
            "status" => $request->status,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Created Contact Success' : 'Created Contact Fail';
        return redirect()->route('admin.contact.index')->with('message', $message);
    }

    public function show(string $id)
    {
        $contact = DB::table('contacts')->find($id);
        return view('admin.pages.contact.detail', ['contact' => $contact]);
    }

    public function edit(string $id)
    {
    }

    public function update(StoreContactRequest $request, string $id)
    {
        $check = DB::table('contacts')->where('id', '=', $id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "message" => $request->message,
            "status" => $request->status,
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Updated Contact Success' : 'Updated Contact Fail';
        return redirect()->route('admin.contact.index')->with('message', $message);
    }

    public function destroy(string $id)
    {
        $result = DB::table('contacts')->delete($id);
        $message = $result ? 'Deleted Contact Success' : 'Deleted Contact Fail';
        return redirect()->route('admin.contact.index')->with('message', $message);
    }
}
