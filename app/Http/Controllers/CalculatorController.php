<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gold;
use App\Models\Silver;

class CalculatorController extends Controller
{
    function index(){
        return view('homepages.Calculator.calculate');
    }

    // function calculator(Request $req){
    //     echo $req->gold_id;
    // }

    function calculator($id){
        $calculatorItem = Gold::find($id);
        return view('homepages.Calculator.fullcalculator',compact('calculatorItem'));
    }

    function calculators($id){
        $calculatorItem = Silver::find($id);
        return view('homepages.Calculator.fullcalculator',compact('calculatorItem'));
    }
}
