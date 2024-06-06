<?php

namespace App\Http\Controllers;

use App\Models\AdmUser;
use App\Models\AppUser;
use App\Models\AppUsers;
use App\Models\Bank;
use App\Models\BankSwift;
use App\Models\BankTransfer;
use App\Models\Locations;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Arrays;

class BankTransferController extends Controller
{
    //
    public function create()
    {
        if (Auth::check()) {
            return view("banks.create");
        }
        return view("login.index");
    }

    public function store(Request $request)
    {
        $input = $request->all();
        BankTransfer::create($input);
        return redirect('bank')->with('flash_message', 'BankTransfer Addedd!');
    }

    public function index(Request $request)
    {
        if (Auth::check()) {

            $from_Date =  $request->input('from_date');
            $to_Date =  $request->input('to_date');
            $member_name =  $request->input('member_name');

            if ($from_Date != "" && $to_Date != "" && $member_name != "") {

                $banks = DB::table('transfer_history')
                    ->select()
                    ->where('transfer_date', '>=', $from_Date)
                    ->where('transfer_date', '<=', $to_Date)
                    ->where('member_name', '=', $member_name)
                    ->get();

            } else {
                $banks = DB::table('transfer_history')
                    ->where('transfer_date', '=', '')
                    ->get();
            }

            return View('banks.index2', compact('banks'));
        }
        return View('login.index');
    }

    public function edit(string $id)
    {
        if (Auth::check()) {
            $bank = BankTransfer::find($id);
            return view('banks.edit', compact('bank'));
        }
        return View('login.index');
    }

    public function update(Request $request, string $id)
    {
        $bank = BankTransfer::find($id);
        $input = $request->all();
        $bank->update($input);
        return redirect('bank')->with('success', 'bank updated');
    }

    public function destroy(string $id)
    {
        BankTransfer::destroy($id);
        return redirect('bank')->with('success', 'bank deleted');
    }
}
