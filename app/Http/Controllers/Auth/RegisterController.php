<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function signup()
    {
        return view('authentication.signup');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'first_name' => 'required|max:25|min:3',
            'last_name' => 'required|max:25|min:3',
            'email' => 'required|email|unique:users',
            'phone' => 'required|digits:10',
            'password' => 'required|min:8'
        ]);

        $user = new User();
        $image = $request->file('image');
        if ($image) {
            $img_name = time() . rand(10000, 99999) . $request->image->getClientOriginalName();
            $image->move('images/', $img_name);
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->image = isset($img_name) ? $img_name : null;
        $user->city_id = $request->city_id;
        $user->save();
        return redirect('/')->with('success','User Successfully Created');
    }
}
