<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gold;

class GoldController extends Controller
{
    function index(){
        $gold = Gold::paginate(10);
        return view('HomePages.Gold.gold',compact('gold'));
    }

    function addGoldItem(Request $req){
        $newGold = new Gold;
        $newGold->item_code = $req->item_code;
        $newGold->item_name = $req->item_name;
        $newGold->item_tola = $req->item_tola;
        $newGold->save();
        return redirect()->back()->with('status',"New Item Successfully Added");
    }

    function edit($id){
        $golds_item = Gold::find($id);
        return response()->json([
            'status'=>200,
            'gold'=>$golds_item
        ]);
    }

    function update(Request $req){
        $gold_id = $req->input('gold_id');
        $gold = Gold::find($gold_id);
        $gold->item_code = $req->item_code;
        $gold->item_name = $req->item_name;
        $gold->item_tola = $req->item_tola;
        $gold->update();

        return redirect()->back()->with('status',"Gold Item Successfully Updated");
    }

    function delete($id){
        $delete_gold_item = Gold::find($id);
        $delete_gold_item->delete(); 
        return redirect()->back()->with('status','Successfully Deleted');
    }

    function search(Request $req){
        $search_text = $req->search;
        $search_gold_item = Gold::where('item_code','LIKE','%'.$search_text.'%')->get();
        return view('HomePages.Gold.search',compact('search_gold_item'));
    }

    function gold(){
        $gold_item = Gold::all();
        return response()->json([
            'status'=>200,
            'gold'=>$gold_item
        ]);
    }

    function searchGold($text){
        $search_gold = Gold::where('item_code','LIKE','%'.$text.'%')->get();
        return response()->json([
            'status'=>200,
            'gold_search'=>$search_gold
        ]);
    }
}
