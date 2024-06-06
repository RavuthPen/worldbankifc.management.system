<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_his;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DateTime;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);
    }

    public function index(Request $request)
    {

        if (Auth::check()) {
            $user =  $request->input('search');
            if ($user != "") {
                $users = User::where(function ($query) use ($user) {
                    $query->where('name', 'like', '%' . $user . '%')
                        ->orWhere('email', 'like', '%' . $user . '%');
                })
                    ->paginate(5);
                $users->appends(['search' => $user]);
            } else {
                $users = User::paginate(5);
            }
            return View('adm_users.index', compact('users'));
        }

        return View('login.index');
    }


    //
    public function create()
    {
        if (Auth::check()) {
            return view("adm_users.create");
        }
        return view("login.index");
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:adm_users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:adm_users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);

        $adm_user = new User();
        $adm_user->name = $request->name;
        $adm_user->email = $request->email;
        $adm_user->phone_number = $request->phone_number;
        $adm_user->position = $request->position;
        $adm_user->password = Hash::make($request->password);

        //track users
        // $adm_user_his = new User_his();
        // $adm_user_his->name = $request->name;
        // $adm_user_his->status = "N";
        // $adm_user_his->auth_id = Auth::user()->id;
        // $adm_user_his->auth_name = Auth::user()->name;
        // $adm_user_his->date_at = now();

        // $adm_user_his->save();
        $adm_user->save();

        return redirect('adm_user')->with('flash_message', 'Student Addedd!');
    }

    public function edit(string $id)
    {

        if (Auth::check()) {
            $user = User::find($id);
            $positions = ['user', 'admin'];
            return view('adm_users.edit', compact('user', 'positions'));
        }

        return view('login.index');
    }

    public function update(Request $request, string $id)
    {
        $adm_user = User::find($id);
        
        if ($request->password != "") {
            $adm_user->password = Hash::make($request->password);
        }

        // $input = $request->all();

        $adm_user->name = $request->name;
        $adm_user->email = $request->email;
        $adm_user->phone_number = $request->phone_number;
        $adm_user->position = $request->position;
        // $adm_user->password = Hash::make($request->password);

        //track users
        // $adm_user_his = new User_his();
        // $adm_user_his->name = $request->name;
        // $adm_user_his->status = "U";
        // $adm_user_his->auth_id = Auth::user()->id;
        // $adm_user_his->auth_name = Auth::user()->name;
        // $adm_user_his->date_at = new DateTime();

        // $adm_user_his->save();
        $adm_user->save();
        // $adm_user->update($input);

        return redirect('adm_user')->with('success', 'user updated');
    }

    public function destroy(string $id)
    {
        //track users
        // $adm_user_his = new User_his();

        // $user = User::find($id);
        // $adm_user_his->name = $user->name;
        // $adm_user_his->status = "D";
        // $adm_user_his->auth_id = Auth::user()->id;
        // $adm_user_his->auth_name = Auth::user()->name;
        // $adm_user_his->date_at = now();
        // $adm_user_his->save();

        User::destroy($id);
        return redirect('adm_user')->with('success', 'User deleted');
    }
}
