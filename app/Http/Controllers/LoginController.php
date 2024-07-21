<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $messages = makeMessage();
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ],$messages);

        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            return back()->withErrors([
                'email' => 'Las credenciales son incorrectas.',
            ]);
        }
        return redirect()->route('clientDashboard');
    }
    // $credentials = $request->only('email', 'password');

    // if (auth()->attempt($credentials)) {
    //     $request->session()->regenerate();
    //     return redirect()->route('clientDashboard');
    // }

    // return back()->withErrors([
    //     'email' => 'The provided credentials do not match our records.',
    // ]);
}
