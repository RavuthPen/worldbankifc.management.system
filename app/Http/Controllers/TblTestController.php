<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TblTestController extends Controller
{
    public function index(){
        return view("login.index");
    }

    public function check(Request $request){
        $message = "";

        $credentials = $request->validate([
            "email"=> "required",'email',
            'password'=> 'required',
        ]);

        if(Auth::attempt($credentials)){


            $username = $request->user()->name;

            return view('home',compact('username'));
        }
        $message = 'Invalid email or password';
        return '<h3>Invalid email or password</h3>';
    }



}
