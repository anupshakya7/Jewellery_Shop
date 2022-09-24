<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Silver;

class SilverController extends Controller
{
    function index(){
        $silver = Silver::all();
        return view('homepages.silver',compact('silver'));
    }
}
