<?php

namespace App\Http\Controllers;

use App\Models\AppUser;
use App\Models\AppUser_his;
use App\Models\City;
use App\Models\Khan;
use App\Models\Sangkat;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Str;

class UserController extends Controller
{
    // protected static function validator(Request $request)
    // {
    //     $validated = $request->validate([
    //         'account_id' => ['required', 'string', 'min:12', 'max:12', 'unique:users']
    //     ]);
    // }

    //
    public function create()
    {
        if (Auth::check()) {
            $khans = Khan::All();
            $villages = Village::All();
            $sangkats = Sangkat::All();
            $cities = City::All();
            $genders = ['Male', 'Female'];
            return view("users.create", compact('khans', 'villages', 'sangkats', 'cities', 'genders'));
        }
        return view("login.index");
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'id_card' => ['required', 'string','unique:users'],
        ]);

        $user = new AppUser();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->gender = $request->gender;
        $user->phone_number = $request->phone_number;
        $user->dob = $request->dob;
        $user->username = $request->username;
        $user->pincode = $request->pincode;
        $user->id_card = $request->id_card;

        $user->active = $request->input('active', 0);
        $user->remake = $request->remake;
        $user->email = $request->email;
        $user->ho_st_id = $request->ho_st_id;
        $user->village_id = $request->village_id;
        $user->songkat_id = $request->songkat_id;
        $user->khan_id = $request->khan_id;
        $user->city_id = $request->city_id;
        $user->password = Hash::make($request->password);
        $user->remember_token = str::random(10);
       
        $user->save();
        //AppUsers::create($input);
        return redirect('user')->with('flash_message', 'Student Addedd!');
    }

    public function index(Request $request)
    {
        if (Auth::check()) {

            $user =  $request->input('search');
            if ($user != "") {
                $users = AppUser::where(function ($query) use ($user) {
                    $query->where('fname', 'like', '%' . $user . '%')
                        ->orWhere('username', 'like', '%' . $user . '%');
                })
                    ->paginate(10);
                $users->appends(['search' => $user]);
            } else {
                // $users = AppUser::paginate(5);
                $users = DB::table('users')
                    ->leftJoin('cities', 'users.city_id', '=', 'cities.id')
                    ->leftJoin('khan', 'users.khan_id', '=', 'khan.id')
                    ->leftJoin('sangkat', 'users.songkat_id', '=', 'sangkat.id')
                    ->leftJoin('village', 'users.village_id', '=', 'village.id')
                    ->select(
                        'users.id',
                        'users.fname',
                        'users.lname',
                        'users.gender',
                        'users.phone_number',
                        'users.dob',
                        'users.username',
                        'users.active',
                        'users.remake',
                        'users.email',
                        'users.ho_st_id',
                        'cities.city_en',
                        'khan.khan_en',
                        'sangkat.sangkat_en',
                        'village.village_en',
                    )
                    ->paginate(50);
            }
            // return View('users.index', compact('users'));
            return View('users.index', compact('users'));
        }

        return View('login.index');
    }

    public function edit(string $id)
    {
        if (Auth::check()) {
            $user = AppUser::find($id);
            // $khans = Khan::All();

            $khans = DB::table('khan')
                ->where('city_id', $user->city_id)
                ->get();

            $sangkats = DB::table('sangkat')
                ->where('khan_id', $user->khan_id)
                ->get();

            $villages = DB::table('village')
                ->where('sangkat_id', $user->songkat_id)
                ->get();

            $cities = City::All();
            $genders = ['Male', 'Female'];

            return view('users.edit', compact('user', 'khans', 'villages', 'sangkats', 'cities', 'genders'));
        }

        return view('login.index');
    }

    // public function details(string $id)
    // {
    //     $user = AppUser::find($id);
    //     return view('users.details')->with('user', $user);
    // }

    public function resetPass(string $id)
    {
        $user = AppUser::find($id);
        return view('users.reset_pass')->with('user', $user);
    }

    public function update(Request $request, string $id)
    {
        $user = AppUser::find($id);

        if ($request->password != "") {
            $user->password = Hash::make($request->password);
        } else if ($request->pincode != "") {
            $user->pincode = $request->pincode;
        }

        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->gender = $request->gender;
        $user->phone_number = $request->phone_number;
        $user->username = $request->username;
        $user->id_card = $request->id_card;
        $user->dob = $request->dob;
        $user->active = $request->has('active');
        $user->remake = $request->remake;
        $user->email = $request->email;
        $user->ho_st_id = $request->ho_st_id;
        $user->village_id = $request->village_id;
        $user->songkat_id = $request->songkat_id;
        $user->khan_id = $request->khan_id;
        $user->city_id = $request->city_id;

        //track users
        $app_user_his = new AppUser_his();

        $app_user_his->user_id = $request->id;
        $app_user_his->fname = $request->fname;
        $app_user_his->lname = $request->lname;
        $app_user_his->gender = $request->gender;
        $app_user_his->phone_number = $request->phone_number;
        $app_user_his->username = $request->username;
        $app_user_his->nationality = $user->nationality;
        $app_user_his->id_card = $request->id_card;
        $app_user_his->created_at = $user->created_at;
        $app_user_his->dob = $request->dob;
        $app_user_his->email = $request->email;
        $app_user_his->ho_st_id = $request->ho_st_id;
        $app_user_his->village_id = $request->village_id;
        $app_user_his->songkat_id = $request->songkat_id;
        $app_user_his->khan_id = $request->khan_id;
        $app_user_his->city_id = $request->city_id;
        $app_user_his->status = "U";
        $app_user_his->auth_id = Auth::user()->id;
        $app_user_his->auth_name = Auth::user()->name;
        $app_user_his->act_date = now();

        $app_user_his->save();
        //end track
        $user->save();
        return redirect('user')->with('success', 'user updated');
    }

    public function destroy(string $id)
    {

        if(Auth::user()->position == "user"){
            return view('error_page.cannot_access');
        }

        $user = AppUser::find($id);
       
         //track users
        $app_user_his = new AppUser_his();

        $app_user_his->user_id = $user->id;
        $app_user_his->fname = $user->fname;
        $app_user_his->lname = $user->lname;
        $app_user_his->gender = $user->gender;
        $app_user_his->nationality = $user->nationality;
        $app_user_his->id_card = $user->id_card;
        $app_user_his->phone_number = $user->phone_number;
        $app_user_his->username = $user->username;
        $app_user_his->created_at = $user->created_at;
        $app_user_his->dob = $user->dob;
        $app_user_his->email = $user->email;
        $app_user_his->ho_st_id = $user->ho_st_id;
        $app_user_his->village_id = $user->village_id;
        $app_user_his->songkat_id = $user->songkat_id;
        $app_user_his->khan_id = $user->khan_id;
        $app_user_his->city_id = $user->city_id;
        $app_user_his->status = "D";
        $app_user_his->auth_id = Auth::user()->id;
        $app_user_his->auth_name = Auth::user()->name;
        $app_user_his->act_date = now();

        $app_user_his->save();
        //end track
        
        AppUser::destroy($id);
        return redirect('user')->with('success', 'User deleted');
    }

    public function getUserById(Request $request)
    {

        $user = DB::table('users')
            // ->select('users.id', 'users.username')
            ->where('users.id', $request->id)
            ->get();

        if (count($user) > 0) {
            return response()->json($user);
        } else {
            return 0;
        }

    }

    public function show(string $id): View
    {
        $users = DB::table('users')
                    ->leftJoin('cities', 'users.city_id', '=', 'cities.id')
                    ->leftJoin('khan', 'users.khan_id', '=', 'khan.id')
                    ->leftJoin('sangkat', 'users.songkat_id', '=', 'sangkat.id')
                    ->leftJoin('village', 'users.village_id', '=', 'village.id')
                    ->select(
                        'users.id',
                        'users.fname',
                        'users.lname',
                        'users.gender',
                        'users.phone_number',
                        'users.dob',
                        'users.username',
                        'users.email',
                        'users.ho_st_id',
                        'cities.city_en',
                        'khan.khan_en',
                        'sangkat.sangkat_en',
                        'village.village_en',
                    )

            ->where('users.id', $id)
            ->first();

        return view('users.view',compact('users'));
    }


}