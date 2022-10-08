<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Silver;

class SilverController extends Controller
{
    function index(){
        $silver = Silver::paginate(10);
        return view('homepages.Silver.silver',compact('silver'));
    }

    function addSilverItem(Request $req){
        $newSilver = new Silver;
        $newSilver->item_code = $req->item_code;
        $newSilver->item_name = $req->item_name;
        $newSilver->item_tola = $req->item_tola;
        $newSilver->save();
        return redirect()->back()->with('status','New Item Successfully Added');
    }

    function edit($id){
        $silver_edit_item = Silver::find($id);
        return response()->json([
            'status'=>200,
            'silver'=>$silver_edit_item
        ]);
    }

    function update(Request $req){
        $silver_update_item = Silver::find($req->silver_id);
        $silver_update_item->item_code = $req->item_code;
        $silver_update_item->item_name = $req->item_name;
        $silver_update_item->item_tola = $req->item_tola;
        $silver_update_item->update();

        return redirect()->back()->with('status',"Silver Item Successfully Updated");
    }

    function delete($id){
        $delete_silver_item = Silver::find($id);
        $delete_silver_item->delete();
        return redirect()->back()->with('status','Successfully Deleted');
    }

    function search(Request $req){
        $search_text = $req->search;
        $search_silver_item = Silver::where('item_code','LIKE','%'.$search_text.'%')->get();
        return view('HomePages.Silver.search',compact('search_silver_item'));
    }

    function silver(){
        $silver_item = Silver::all();
        return response()->json([
            'status'=>200,
            'silver'=>$silver_item
        ]);
    }
    
}
