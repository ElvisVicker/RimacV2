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
        $contacts = DB::table('contact')
            ->select(
                'contact.id as id',
                'users.name as user_name',
                'users.last_name as user_lastname',

                'contact.comment as comment',
                'contact.created_at as created_at',

            )

            ->join('users', 'users.id', '=', 'contact.customer_id')
            ->orderBy('created_at', 'desc')
            ->paginate(10);


        return view('admin.pages.contact.list', ['contacts' => $contacts]);
    }

    public function create()
    {
        return view('admin.pages.contact.create');
    }

    public function store(StoreContactRequest $request)
    {
    }

    public function show(string $id)
    {



        $contact = DB::table('contact')
            ->select(
                'contact.id as id',
                'users.name as user_name',
                'users.last_name as user_lastname',

                'contact.comment as comment',
                'contact.created_at as created_at',

            )

            ->join('users', 'users.id', '=', 'contact.customer_id')
            ->where('contact.id', '=', $id)
            ->orderBy('created_at', 'desc')
            ->get();


        return view('admin.pages.contact.detail', ['contact' => $contact[0]]);
    }

    public function edit(string $id)
    {
    }

    public function update(StoreContactRequest $request, string $id)
    {
    }

    public function destroy(string $id)
    {
        $result = DB::table('contact')->delete($id);
        $message = $result ? 'Deleted Contact Success' : 'Deleted Contact Fail';
        return redirect()->route('admin.contact.index')->with('message', $message);
    }
}
