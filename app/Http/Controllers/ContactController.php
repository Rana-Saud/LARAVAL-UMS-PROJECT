<?php

namespace App\Http\Controllers;

use App\Http\Requests\contactValidation;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Auth::user()) {
            return redirect('/');
        }

        $contacts = Contact::where('user_id', Auth::id())->paginate(5);
        $search = $request->search;
        if ($search) {
            $contacts = Contact::where('first_name', 'like', '%' . $search . '%')->orWhere('last_name', 'like', '%' . $search . '%')->orWhere('phone', 'like', '%' . $search . '%')->orWhere('user_id', Auth::id())->paginate(5);
        }
        return view('contact.contact', ['contacts' => $contacts, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(contactValidation $request)
    {
        $contact = new Contact();
        $image = $request->file('image');
        if ($image) {
            $img_name = time() . rand(100000, 999999) . $request->image->getClientOriginalName();
            $image->move('images/', $img_name);
        }

        $contact->user_id = Auth::id();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->phone = $request->phone;
        $contact->image = $img_name ?? null;
        $contact->save();
        return redirect('contact')->with('success', 'Contact Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::find($id);
        return view('contact.view', ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::find($id);
        return view('contact.edit', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(contactValidation $request)
    {
        $contact = Contact::find($request->id);

        $image = $request->file('image');

        if ($image) {
            if (file_exists($contact->image)) {
                unlink($contact->image);
            }
            $img_name = time() . rand(100000, 999999) . $request->image->getClientOriginalName();
            $image->move('images/', $img_name);
        }

        $contact->user_id = Auth::id();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->phone = $request->phone;
        $contact->image = isset($img_name) ? $img_name : null;
        $contact->update();
        return redirect('contact')->with('success', 'Contact Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect('contact')->with('success', 'Contact Successfully Deleted.');
    }
}
