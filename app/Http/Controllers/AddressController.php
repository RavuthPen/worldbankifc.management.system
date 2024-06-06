<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Locations;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(){

        // $addresse =  $request->input('search');
        // if($addresse!=""){
        //     $addresses = Addresses::where(function ($query) use ($addresse){
        //         $query->where('province', 'like', '%'.$addresse.'%');
        //     })
        //     ->paginate(5);
        //     $addresses->appends(['search' => $addresse]);
        // }
        // else{
        //     $app_users = Addresses::paginate(5);
        // }
        // return view("address.index", compact("addresses"));
        $locations = Locations::All();
        return view("address.index",compact("locations"));
    }

    public function create(){
        return view("address.create");
    }

    public function store(Request $request)
    {
        $input = $request->all();
        // Addresses::create($input);
        return redirect('users')->with('flash_message', 'Address Addedd!');
    }


}
