<?php

namespace App\Http\Controllers;

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

class MemberController extends Controller
{
    //
    public function create()
    {
        if (Auth::check()) {
            return view("members.create");
        }
        return view("login.index");
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Member::create($input);
        return redirect('member')->with('flash_message', 'member Addedd!');
    }

    public function index(Request $request)
    {

        if (Auth::check()) {

            $member =  $request->input('search');
            if ($member != "") {
                $members = Member::where(function ($query) use ($member) {
                    $query->where('user_id', $member)
                        ->orWhere('member_id', $member);
                })
                    ->paginate(5);
                $members->appends(['search' => $member]);
            } else {
                $members = Member::paginate(5);
            }
            return View('members.index', compact('members'));
        }

        return view("login.index");
    }

    public function edit(string $id)
    {
        if (Auth::check()) {
            $member = Member::find($id);
            $try = ['USD', 'khmer'];
            return view('members.edit', compact('member', 'try'));
        }

        return view("login.index");
    }

    public function update(Request $request, string $id)
    {
        $member = Member::find($id);
        $input = $request->all();
        $member->update($input);
        return redirect('member')->with('success', 'member updated');
    }

    public function destroy(string $id)
    {
        if(Auth::user()->position == "user"){
            return view('error_page.cannot_access');
        }
        
        Member::destroy($id);
        return redirect('member')->with('success', 'member deleted');
    }
}
