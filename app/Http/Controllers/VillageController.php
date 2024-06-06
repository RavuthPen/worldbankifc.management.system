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
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Arrays;

class VillageController extends Controller
{
    //
    public function create()
    {
        if (Auth::check()) {
            $cities = City::All();
            $khans = Khan::All();
            $sangkats = Khan::All();
            return view("villages.create", compact('cities','khans','sangkats'));
        }
        return view("login.index");
    }

    public function store(Request $request)
    {

        if (Auth::check()) {

            $input = $request->all();
            Village::create($input);
            return redirect('village')->with('flash_message', 'villages Addedd!');
        }

        return view("login.index");
    }

    public function index(Request $request)
    {
        if (Auth::check()) {

            $village =  $request->input('search');
            if ($village != "") {

                $villages = DB::table('village')
                    ->leftJoin('sangkat', 'village.sangkat_id', '=', 'sangkat.id')
                    ->leftJoin('khan', 'sangkat.khan_id', '=', 'khan.id')
                    ->leftJoin('cities', 'khan.city_id', '=', 'cities.id')


                    ->select(
                        'village.id',
                        'village.village_kh',
                        'village.village_en',
                        'sangkat.sangkat_en',
                        'khan.khan_en',
                        'cities.city_en'

                    )
                    ->where('village_en','like','%'. $village.'%')
                    ->paginate(5);
                $villages->appends(['search' => $village]);
            } else {

                $villages = DB::table('village')
                    ->leftJoin('sangkat', 'village.sangkat_id', '=', 'sangkat.id')
                    ->leftJoin('khan', 'sangkat.khan_id', '=', 'khan.id')
                    ->leftJoin('cities', 'khan.city_id', '=', 'cities.id')

                    ->select(
                        'village.id',
                        'village.village_kh',
                        'village.village_en',
                        'sangkat.sangkat_en',
                        'khan.khan_en',
                        'cities.city_en'
                    )
                    ->paginate(5);
            }
            return View('villages.index', compact('villages'));
        }

        return view("login.index");
    }

    public function edit(string $id)
    {
        if (Auth::check()) {
            $villages = Village::find($id);
            $cities = City::All();
            $sangkats = DB::table('sangkat')
                ->where('id', $villages->sangkat_id)
                ->get();
            return view('villages.edit', compact('villages', 'cities','sangkats'));
        }
        return view("login.index");
    }

    public function update(Request $request, string $id)
    {
        $villages = Village::find($id);
        $input = $request->all();
        $villages->update($input);
        return redirect('village')->with('success', 'sangkats updated');
    }

    public function destroy(string $id)
    {
        Village::destroy($id);
        return redirect('villages')->with('success', 'village deleted');
    }
}
