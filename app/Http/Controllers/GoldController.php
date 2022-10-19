<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gold;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class GoldController extends Controller
{
    function index(){
        return view('HomePages.Gold.gold');
    }

    public function fetchGold(){
        $gold_items = Gold::all();
        return response()->json([
            'gold_item'=>$gold_items
        ]);
    }

    public function store(Request $req){
        $validator = Validator::make($req->all(),[
            'item_code'=>'required|max:191',
            'item_name'=>'required|max:191',
            'item_gram'=>'required|max:191',
            'item_making_charge'=>'required|max:191',
            'item_wastages'=>'required|max:191',
            'item_stone_charge'=>'required|max:191',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            $gold_item = new Gold;
            $gold_item->item_code = $req->input('item_code');
            $gold_item->item_name = $req->input('item_name');
            $gold_item->item_gram = $req->input('item_gram');
            $gold_item->item_making_charge = $req->input('item_making_charge');
            $gold_item->item_wastages = $req->input('item_wastages');
            $gold_item->item_stone = $req->input('item_stone_charge');
            if($req->hasFile('item_images')){
                $file = $req->file('item_images');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/gold/',$filename);
                $gold_item->item_images = $filename;
            }
            $gold_item->save();
            return response()->json([
                'status'=>200,
                'message'=>'Gold Item Added Successfully'
            ]);
        }
    }

    function edit($id){
        $golds_item = Gold::find($id);
        if($golds_item){
            return response()->json([
                'status'=>200,
                'gold'=>$golds_item
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Gold Item Not Found'
            ]);
        }

    }

    function update(Request $req,$id){
        $validator = Validator::make($req->all(),[
            'item_code'=>'required|max:191',
            'item_name'=>'required|max:191',
            'item_gram'=>'required|max:191',
            'item_making_charge'=>'required|max:191',
            'item_wastages'=>'required|max:191',
            'item_stone_charge'=>'required|max:191'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            $gold_item = Gold::find($id);
            if($gold_item){
                $gold_item->item_code = $req->input('item_code');
                $gold_item->item_name = $req->input('item_name');
                $gold_item->item_gram = $req->input('item_gram');
                $gold_item->item_making_charge = $req->input('item_making_charge');
                $gold_item->item_wastages = $req->input('item_wastages');
                $gold_item->item_stone = $req->input('item_stone_charge');

                if($req->hasFile('item_images')){
                    $path = 'uploads/gold/'.$gold_item->item_images;
                    if(File::exists($path)){
                        File::delete($path);
                    }
                    $file = $req->file('item_images');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $file->move('uploads/gold/',$filename);
                    $gold_item->item_images = $filename;
                }
                $gold_item->save();

                return response()->json([
                    'status'=>200,
                    'message'=>'Gold Image Data Updated Successfully'
                ]);
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Gold Item Not Fount'
                ]);
            }
        }
    }

    public function destroy($id){
        $gold_item = Gold::find($id);
        if($gold_item){
            $path = 'uploads/gold/'.$gold_item->item_images;
            if(File::exists($path)){
                File::delete($path);
            }
            $gold_item->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Gold Item Delete Successfully'
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Gold Item Not Found'
            ]);
        }
    }

    function search(Request $req){
        $search_text = $req->search;
        $search_gold_item = Gold::where('item_code','LIKE','%'.$search_text.'%')->get();
        if($search_gold_item){
            return response()->json([
                'status'=>200,
                'gold_item'=>$search_gold_item
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Gold Item Not Found'
            ]);
        }
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
