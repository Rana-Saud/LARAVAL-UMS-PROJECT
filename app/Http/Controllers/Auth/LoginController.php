<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginView()
    {
        return view('authentication.login');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect('home')->with('success','User Successfully Login');
        } else {
            return back()->with('error', 'Credentials not Match!!');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/')->with('success', 'User Successfully Logout');
    }
}
