<?php

namespace App\Http\Controllers;

use App\Models\Sangkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    //khan
    public function getKhan(Request $request)
    {

        $khans = DB::table('khan')
            ->where('city_id', $request->city_id)
            ->get();

        if (count($khans) > 0) {
            return response()->json($khans);
        }
    }

    // Sangkat
    public function getSangkat(Request $request)
    {

        $sangkats = DB::table('sangkat')
            ->where('khan_id', $request->khan_id)
            ->get();

        if (count($sangkats) > 0) {
            return response()->json($sangkats);
        }
    }

    //village
    public function getVillage(Request $request)
    {
        $villages = DB::table('village')
            ->where('sangkat_id', $request->sangkat_id)
            ->get();
            
        if (count($villages) > 0) {
            return response()->json($villages);
        }
    }




}
