<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gold;

class GoldController extends Controller
{
    function index(){
        $gold = Gold::all();
        return view('HomePages.gold',compact('gold'));
    }

    function addGoldItem(Request $req){
        $newGold = new Gold;
        $newGold->item_code = $req->item_code;
        $newGold->item_name = $req->item_name;
        $newGold->item_tola = $req->item_tola;
        $newGold->save();
        return redirect()->back()->with('status',"New Item Successfully Added");
    }
}
