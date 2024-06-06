<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AdmUser;
use App\Models\AppUser;
use App\Models\AppUsers;
use App\Models\City;
use App\Models\Khan;
use App\Models\Locations;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Arrays;

class KhanController extends Controller
{
    //
    public function create()
    {
        if (Auth::check()) {
            $cities = City::All();
            return view("khans.create", compact('cities'));
        }
        return view("login.index");
    }

    public function store(Request $request)
    {

        if (Auth::check()) {

            $input = $request->all();
            Khan::create($input);
            return redirect('khan')->with('flash_message', 'khan Addedd!');
        }

        return view("login.index");
    }

    public function index(Request $request)
    {
        if (Auth::check()) {

            $khan =  $request->input('search');
            if ($khan != "") {

                $khans = DB::table('khan')
                    ->leftJoin('cities', 'khan.city_id', '=', 'cities.id')
                    ->select(
                        'khan.id',
                        'khan.khan_kh',
                        'khan.khan_en',

                        'cities.city_en'
                    )
                    ->where('khan_en', $khan)
                    ->paginate(5);

                $khans->appends(['search' => $khan]);
            } else {

                $khans = DB::table('khan')
                    ->leftJoin('cities', 'khan.city_id', '=', 'cities.id')
                    ->select(
                        'khan.id',
                        'khan.khan_kh',
                        'khan.khan_en',
                        'cities.city_en'
                    )
                    ->paginate(5);
            }
            return View('khans.index', compact('khans'));
        }

        return view("login.index");
    }

    public function edit(string $id)
    {
        if (Auth::check()) {
            $khans = Khan::find($id);
            $cities = City::All();
            return view('khans.edit', compact('khans', 'cities'));
        }
        return view("login.index");
    }

    public function update(Request $request, string $id)
    {
        $khan = Khan::find($id);
        $input = $request->all();
        $khan->update($input);
        return redirect('khan')->with('success', 'khan updated');
    }

    public function destroy(string $id)
    {
        Khan::destroy($id);
        return redirect('khan')->with('success', 'khan deleted');
    }
}
