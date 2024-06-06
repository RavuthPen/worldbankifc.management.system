<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AdmUser;
use App\Models\AppUser;
use App\Models\AppUsers;
use App\Models\BankInformation;
use App\Models\CisMember;
use App\Models\CisMember_his;
use App\Models\Locations;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\View\View;
use Nette\Utils\Arrays;

class CisMemberController extends Controller
{
    //
    public function create()
    {
        if (Auth::check()) {
            $banks = DB::table('bank_info')
                ->get();

            return view("cis_members.create", compact('banks'));
        }
        return view("login.index");
    }

    public function store(Request $request)
    {
        $request->validate([
            'account_number' => ['required', 'string', 'min:12', 'max:12'],
            'version' => ['required','numeric'],
            'passport_image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if (Auth::check()) {
            if ($request->has('passport_image')) {
                $file = $request->file('passport_image');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $path = 'uploads/passport/';
                $file->move($path, $fileName);
            }

            //track users
            // $cis_member_his = new CisMember_his();
            // $cis_member_his->user_id = $request->user_id;
            // $cis_member_his->account_number = $request->account_number;
            // $cis_member_his->status = "N";
            // $cis_member_his->auth_id = Auth::user()->id;
            // $cis_member_his->auth_name = Auth::user()->name;
            // $cis_member_his->date_at = now();
            
            // $cis_member_his->save();
            //end track

            CisMember::create([
                'account_number' => $request->account_number,
                'passport_number' => $request->passport_number,
                'user_id' => $request->user_id,
                'dateof_issue' => $request->dateof_issue,
                'dateof_expi' => $request->dateof_expi,
                'passport_image' => $path . $fileName,
                'bank_id' => $request->bank_id,
                'version' => $request->version
            ]);

            return redirect('cis_member')->with('flash_message', 'cis_member Addedd!');
        }

        return view("login.index");
    }

    public function index(Request $request)
    {
        if (Auth::check()) {

            $cis_member =  $request->input('search');
            if ($cis_member != "") {

                $cis_members = DB::table('v_cis_member')
                    // ->leftJoin('account', 'cis_member.account_number', '=', 'account.account_number')
                    // ->leftJoin('users', 'cis_member.user_id', '=', 'users.id')

                    ->select(
                        'id',
                        'username',
                        'account_number',
                        'passport_number',
                        'dateof_issue',
                        'dateof_expi',
                        'created_at',
                        'bank_id',
                        'version'
                    )
                    ->Where('account_number', $cis_member)
                    ->orWhere('username', 'like', '%' . $cis_member . '%')

                    ->paginate(5);

                $cis_members->appends(['search' => $cis_member]);
            } else {

                $cis_members = DB::table('v_cis_member')
                    
                    ->select(
                        'id',
                        'username',
                        'account_number',
                        'passport_number',
                        'dateof_issue',
                        'dateof_expi',
                        'created_at',
                        'bank_id',
                        'version'
                    )
                    ->paginate(50);
            }
            return View('cis_members.index', compact('cis_members'));
        }
        return view("login.index");
    }

    public function edit(string $id)
    {
        if (Auth::check()) {
            $cis_members = CisMember::find($id);
            $banks = DB::table('bank_info')
                ->get();

            $account_numbers = DB::table('account')
                ->where('account.user_id', $cis_members->user_id)
                ->get();

            return view('cis_members.edit', compact('cis_members', 'banks', 'account_numbers'));
        }
        return view("login.index");
    }

    public function update(Request $request, string $id)
    {
        $cis_member = CisMember::find($id);

        if ($request->has('passport_image')) {
            $file = $request->file('passport_image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $path = 'uploads/passport/';
            $file->move($path, $fileName);

            if (File::exists($cis_member->passport_image)) {
                File::delete($cis_member->passport_image);
            }

            $cis_member->passport_image = $path . $fileName;
        }

        $cis_member->account_number = $request->account_number;
        $cis_member->user_id = $request->user_id;
        $cis_member->passport_number = $request->passport_number;
        $cis_member->dateof_issue = $request->dateof_issue;
        $cis_member->dateof_expi = $request->dateof_expi;
        $cis_member->bank_id = $request->bank_id;
        $cis_member->version = $request->version;

        //track users
        // $cis_member_his = new CisMember_his();
        // $cis_member_his->cis_id = $request->id;
        // $cis_member_his->user_id = $cis_member->user_id;
        // $cis_member_his->account_number = $request->account_number;
        // $cis_member_his->status = "U";
        // $cis_member_his->auth_id = Auth::user()->id;
        // $cis_member_his->auth_name = Auth::user()->name;
        // $cis_member_his->date_at = now();
        // $cis_member_his->save();
        //end track

        $cis_member->save();
        return redirect('cis_member')->with('success', 'cis_member updated');
    }

    public function destroy(string $id)
    {
        if(Auth::user()->position == "user"){
            return view('error_page.cannot_access');
        }

        
        $cis_member = CisMember::find($id);
        //track users
        // $cis_member_his = new CisMember_his();
        // $cis_member_his->cis_id = $cis_member->id;
        // $cis_member_his->user_id = $cis_member->user_id;
        // $cis_member_his->account_number = $cis_member->account_number;
        // $cis_member_his->status = "D";
        // $cis_member_his->auth_id = Auth::user()->id;
        // $cis_member_his->auth_name = Auth::user()->name;
        // $cis_member_his->date_at = now();
        
        // $cis_member_his->save();
        //end track

        CisMember::destroy($id);
        return redirect('cis_member')->with('success', 'cis_member deleted');
    }

    public function show(string $id): View
    {
        $cis_members = DB::table('cis_member')
            ->leftJoin('account', 'cis_member.account_number', '=', 'account.account_number')
            ->leftJoin('users', 'cis_member.user_id', '=', 'users.id')
            ->leftJoin('cities', 'users.city_id', '=', 'cities.id')
            ->leftJoin('bank_info', 'cis_member.bank_id', '=', 'bank_info.id')

            ->select(
                'cis_member.id',
                'account.account_number',
                'users.username',
                'cis_member.passport_number',
                'cis_member.dateof_issue',
                'cis_member.dateof_expi',
                'cis_member.created_at',
                'cis_member.version',
                'users.dob',
                'users.phone_number',
                'users.email',
                'cities.city_en',
                'bank_info.bank_name',
                'bank_info.street_address',
                'bank_info.city',
                'bank_info.telephone',
                'bank_info.swift_code'
            )

            ->where('cis_member.id', $id)
            ->first();

        return view('cis_members.show_print', compact('cis_members'));
    }
}
