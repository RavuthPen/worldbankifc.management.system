<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AdmUser;
use App\Models\AppUser;
use App\Models\AppUsers;
use App\Models\BankInformation;
use App\Models\CisMember;
use App\Models\Locations;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as FacadesFile;
use Nette\Utils\Arrays;

class BankInforController extends Controller
{
    //
    public function create()
    {
        if (Auth::check()) {
            return view("bank_infos.create");
        }
        return view("login.index");
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'account_number' => ['required', 'string', 'min:12', 'max:12'],
        //     'passport_image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        // ]);

        if (Auth::check()) {

            




            BankInformation::create([
                'bank_name' => $request->bank_name,
                'street_address' => $request->street_address,
                'city' => $request->city,
                'telephone' => $request->telephone,
                'swift_code' => $request->swift_code
            ]);

            return redirect('bank_info')->with('flash_message', 'bank_info Addedd!');
        }

        return view("login.index");
    }

    public function index(Request $request)
    {
        if (Auth::check()) {

            $bank_info =  $request->input('search');
            if ($bank_info != "") {

                $bank_infos = DB::table('bank_info')
                    // ->leftJoin('account', 'cis_member.account_number', '=', 'account.account_number')
                    ->select(
                        'id',
                        'bank_name',
                        'street_address',
                        'city',
                        'telephone',
                        'swift_code',
                        'created_at'
                    )

                    ->Where('bank_name', $bank_info)
                    ->paginate(5);

                $bank_infos->appends(['search' => $bank_info]);
            } else {

                $bank_infos = DB::table('bank_info')
                    // ->leftJoin('account', 'cis_member.account_number', '=', 'account.account_number')
                    ->select(
                        'id',
                        'bank_name',
                        'street_address',
                        'city',
                        'telephone',
                        'swift_code',
                        'created_at'
                    )
                    ->paginate(5);
            }
            return View('bank_infos.index', compact('bank_infos'));
        }
        return view("login.index");
    }

    public function edit(string $id)
    {
        if (Auth::check()) {
            $bank_infos = BankInformation::find($id);
            return view('bank_infos.edit', compact('bank_infos'));
        }
        return view("login.index");
    }

    public function update(Request $request, string $id)
    {
        $bank_info = BankInformation::find($id);
        $bank_info->bank_name = $request->bank_name;
        $bank_info->street_address = $request->street_address;
        $bank_info->city = $request->city;
        $bank_info->telephone = $request->telephone;
        $bank_info->swift_code = $request->swift_code;
        $bank_info->save();
        
        return redirect('bank_info')->with('success', 'bank_info updated');
    }

    public function destroy(string $id)
    {
        BankInformation::destroy($id);
        return redirect('bank_info')->with('success', 'bank_info deleted');
    }
}
