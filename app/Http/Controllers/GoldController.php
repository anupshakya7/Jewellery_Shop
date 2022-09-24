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
}
