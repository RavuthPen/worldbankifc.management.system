<?php

namespace App\Http\Controllers;

use App\Models\AdmUser;
use App\Models\AppUser;
use App\Models\AppUsers;
use App\Models\BankSwift;
use App\Models\Locations;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Arrays;

class BankSwiftController extends Controller
{
    //
    public function create()
    {
        if (Auth::check()) {
            return view("bank_swifts.create");
        }
        return view("login.index");
    }

    public function store(Request $request)
    {
        $input = $request->all();
        BankSwift::create($input);
        return redirect('bank_swift')->with('flash_message', 'bank_swifts Addedd!');
    }

    public function index(Request $request)
    {
        if (Auth::check()) {

            $bank_swift =  $request->input('search');
            if ($bank_swift != "") {
                $bank_swifts = BankSwift::where(function ($query) use ($bank_swift) {
                    $query->where('banks_phones', $bank_swift)
                        ->orWhere('banks_swift', 'like', '%' . $bank_swift . '%')
                        ->orWhere('banks_name', 'like', '%' . $bank_swift . '%');
                })
                    ->paginate(5);
                $bank_swifts->appends(['search' => $bank_swift]);
            } else {
                $bank_swifts = BankSwift::paginate(5);
            }
            return View('bank_swifts.index', compact('bank_swifts'));
        }

        return View('login.index');
    }

    public function edit(string $id)
    {
        if (Auth::check()) {

            $bank_swift = BankSwift::find($id);
            return view('bank_swifts.edit', compact('bank_swift'));
        }

        return view('login.index');
    }

    public function update(Request $request, string $id)
    {
        $bank_swift = BankSwift::find($id);
        $input = $request->all();
        $bank_swift->update($input);
        return redirect('bank_swift')->with('success', 'bank_swift updated');
    }

    public function destroy(string $id)
    {
        BankSwift::destroy($id);
        return redirect('bank_swift')->with('success', 'bank_swift deleted');
    }
}
