<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view("login.index");
    }

    public function check(Request $request)
    {
        $message = "";

        $credentials = $request->validate([
            "name" => "required", 'name',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $username = $request->user()->name;

            return view('home', compact('username'));
        }
        $message = 'Invalid email or password';
        return view('login.index', compact('message'));
    }

    public function logout()
    {
        Auth::logout(); // logout user
        Session::flush();
        // Redirect::back();
        return Redirect::to('/'); //redirect back to login
    }
}
