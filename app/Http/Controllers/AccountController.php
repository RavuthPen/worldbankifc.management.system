<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AdmUser;
use App\Models\AppUser;
use App\Models\AppUsers;
use App\Models\Locations;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Arrays;

class AccountController extends Controller
{
    //
    public function create()
    {
        if (Auth::check()) {
            return view("accounts.create");
        }
        return view("login.index");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_number' => ['required', 'string', 'min:12', 'max:12', 'unique:account']
        ]);

        if (Auth::check()) {

            $input = $request->all();
            Account::create($input);
            return redirect('account')->with('flash_message', 'account Addedd!');
        }

        return view("login.index");
    }

    public function index(Request $request)
    {
        if (Auth::check()) {

            $account =  $request->input('search');
            if ($account != "") {
                
                $accounts = DB::table('v_account')
                    ->select(
                        'id',
                        'user_id',
                        'username',
                        'account_number',
                        'ccy',
                        'amount'
                    )
                    ->where('user_id', $account)
                    ->orWhere('username','like', '%' . $account . '%')
                    ->paginate(5);

                $accounts->appends(['search' => $account]);

                // $accounts = AppUser::where(function ($query) use ($account) {
                //     $query->where('fname', 'like', '%' . $account . '%')
                //         ->orWhere('username', 'like', '%' . $account . '%');
                // })
                //     ->paginate(5);
                // $accounts->appends(['search' => $account]);


            } else {

                // $accounts = Account::paginate(5);

                $accounts = DB::table('v_account')
                    ->select(
                        'id',
                        'user_id',
                        'username',
                        'account_number',
                        'ccy',
                        'amount'
                    )
                    ->paginate(50);
            }
            return View('accounts.index', compact('accounts'));
        }

        return view("login.index");
    }

    public function edit(string $id)
    {
        if (Auth::check()) {
            $accounts = Account::find($id);
            $ccy = ['USD', 'KHR'];
            return view('accounts.edit', compact('accounts', 'ccy'));
        }

        return view("login.index");
    }

    public function update(Request $request, string $id)
    {
        $account = Account::find($id);
        $input = $request->all();
        $account->update($input);
        return redirect('account')->with('success', 'account updated');
    }

    public function destroy(string $id)
    {
        if(Auth::user()->position == "user"){
            return view('error_page.cannot_access');
        }
        
        Account::destroy($id);
        return redirect('account')->with('success', 'Account deleted');
    }

    public function getAccountByUserId(Request $request)
    {

        $account = DB::table('account')
            ->where('account.user_id', $request->id)
            ->get();

        if (count($account) > 0) {
            return response()->json($account);
        }

    }


}