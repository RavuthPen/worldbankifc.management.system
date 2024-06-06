<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();
        // Session::flush();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
