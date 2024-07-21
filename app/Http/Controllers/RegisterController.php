<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;

class RegisterController extends Controller
{
    use ValidatesRequests;

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        $messages = makeMessage();
        // Validate the user
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],

        ], $messages);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->route('clientDashboard');

        //dd($request->all());
    }
}
