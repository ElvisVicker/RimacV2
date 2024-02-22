<?php

namespace App\Http\Controllers\Staff;

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
        return view('staff.pages.contact.list', ['contacts' => $contacts]);
    }

    public function create()
    {
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
        return redirect()->route('staff.contact.index')->with('message', $message);
    }

    public function show(string $id)
    {
        $contact = DB::table('contacts')->find($id);
        return view('staff.pages.contact.detail', ['contact' => $contact]);
    }

    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
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
        return redirect()->route('staff.contact.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = DB::table('contacts')->delete($id);
        $message = $result ? 'Deleted Contact Success' : 'Deleted Contact Fail';
        return redirect()->route('staff.contact.index')->with('message', $message);
    }
}
