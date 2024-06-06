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
use App\Models\Sangkat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Arrays;

class SangkatController extends Controller
{
    //
    public function create()
    {
        if (Auth::check()) {
            $cities = City::All();
            $khans = Khan::All();
            return view("sangkats.create", compact('cities','khans'));
        }
        return view("login.index");
    }

    public function store(Request $request)
    {

        if (Auth::check()) {

            $input = $request->all();
            Sangkat::create($input);
            return redirect('sangkat')->with('flash_message', 'sangkat Addedd!');
        }

        return view("login.index");
    }

    public function index(Request $request)
    {
        if (Auth::check()) {

            $sangkat =  $request->input('search');
            if ($sangkat != "") {

                $sangkats = DB::table('sangkat')
                    ->leftJoin('khan', 'sangkat.khan_id', '=', 'khan.id')
                    ->select(
                        'sangkat.id',
                        'sangkat.sangkat_kh',
                        'sangkat.sangkat_en',
                        'khan.khan_en'
                    )
                    ->where('sangkat_en','like','%'. $sangkat.'%')
                    ->orwhere('sangkat_kh','like','%'. $sangkat.'%')

                    ->paginate(5);
                $sangkats->appends(['search' => $sangkat]);
            } else {

                $sangkats = DB::table('sangkat')
                    ->leftJoin('khan', 'sangkat.khan_id', '=', 'khan.id')
                    ->select(
                        'sangkat.id',
                        'sangkat.sangkat_kh',
                        'sangkat.sangkat_en',
                        'khan.khan_en'
                    )
                    ->paginate(5);
            }
            return View('sangkats.index', compact('sangkats'));
        }

        return view("login.index");
    }

    public function edit(string $id)
    {
        if (Auth::check()) {
            $sangkats = Sangkat::find($id);
            $cities = City::All();
            $khans = DB::table('khan')
                ->where('id', $sangkats->khan_id)
                ->get();

            return view('sangkats.edit', compact('sangkats', 'cities','khans'));
        }
        return view("login.index");
    }

    public function update(Request $request, string $id)
    {
        $Sangkat = Sangkat::find($id);
        $input = $request->all();
        $Sangkat->update($input);
        return redirect('sangkat')->with('success', 'sangkats updated');
    }

    public function destroy(string $id)
    {
        Sangkat::destroy($id);
        return redirect('sangkat')->with('success', 'sangkats deleted');
    }
}
