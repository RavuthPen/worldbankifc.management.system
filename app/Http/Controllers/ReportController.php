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
use Illuminate\View\View;

class ReportController extends Controller
{

    public function rpt_users_trans(Request $request)
    {
        if (Auth::check()) {

            $from_Date =  $request->input('from_date');
            $to_Date =  $request->input('to_date');

            if ($from_Date != "" && $to_Date != "") {

                $banks = DB::table('transfer_history')
                    ->select()
                    ->where('transfer_date', '>=', $from_Date)
                    ->where('transfer_date', '<=', $to_Date)
                    ->get();
            } else {
                $banks = DB::table('transfer_history')
                    ->where('transfer_date', '=', '')
                    ->get();
            }

            return View('Report.print_user_trans', compact('banks'));
        }
        return View('login.index');
    }


    // public function show(Request $request)
    // {
    //     $from_Date =  $request->input('from_date');
    //     $to_Date =  $request->input('to_date');

    //     $banks = DB::table('transfer_history')
    //         ->select()
    //         ->where('transfer_date', '>=', $from_Date)
    //         ->where('transfer_date', '<=', $to_Date)
    //         ->get();

    //     return view('cis_members.show_print', compact('cis_members','from_Date','to_Date'));
    // }

    public function rpt_users_list(Request $request)
    {

        $from_Date =  $request->input('from_date');
        $to_Date =  $request->input('to_date');

        if ($from_Date != "" && $to_Date != "") {

            $users = DB::table('v_users')
                ->select()
                ->where('created_at', '>=', $from_Date)
                ->where('created_at', '<=', $to_Date)
                ->get();
        } else {
            $users = DB::table('v_users')
                ->where('created_at', '=', '')
                ->get();
        }


        return View('Report.print_user_list', compact('users'));
    }
}
