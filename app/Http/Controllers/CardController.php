<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AdmUser;
use App\Models\AppUser;
use App\Models\AppUsers;
use App\Models\Card;
use App\Models\Locations;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Arrays;

class CardController extends Controller
{
    //
    public function create()
    {
        if (Auth::check()) {
            $card_type = ['VISA', 'MASTER'];
            return view("cards.create",$card_type);
        }
        return view("login.index");
    }

    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'account_number' => ['required', 'string', 'min:12', 'max:12', 'unique:account']
        // ]);

        if (Auth::check()) {
            $input = $request->all();
            Card::create($input);
            return redirect('card')->with('flash_message', 'card Addedd!');
        }

        return view("login.index");
    }

    public function index(Request $request)
    {
        if (Auth::check()) {

            $search =  $request->input('search');
            if ($search != "") {
                
                $cards = DB::table('v_card')
                    ->select(
                        'id',
                        'user_id',
                        'username',
                        'card_number',
                        'card_type',
                        'cvv',
                        'expired_date'
                    )
                    ->where('user_id', $search)
                    ->orWhere('username', 'like', '%' . $search . '%')
                    ->orWhere('card_number', $search)
                    ->paginate(5);

                $cards->appends(['search' => $search]);

            } else {

                $cards = DB::table('v_card')
                    ->select(
                        'id',
                        'user_id',
                        'username',
                        'card_number',
                        'card_type',
                        'cvv',
                        'expired_date'
                    )
                 
                    ->paginate(50);
            }
            return View('cards.index', compact('cards'));
        }

        return view("login.index");
    }

    public function edit(string $id)
    {
        if (Auth::check()) {
            $cards = Card::find($id);
            $cardType = ['VISA', 'MASTER'];
            return view('cards.edit', compact('cards', 'cardType'));
        }

        return view("login.index");
    }

    public function update(Request $request, string $id)
    {
        $card = Card::find($id);
        $input = $request->all();
        $card->update($input);
        return redirect('card')->with('success', 'card updated');
    }

    public function destroy(string $id)
    {
        if(Auth::user()->position == "user"){
            return view('error_page.cannot_access');
        }
        
        Card::destroy($id);
        return redirect('card')->with('success', 'card deleted');
    }
}
