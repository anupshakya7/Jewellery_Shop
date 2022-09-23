<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;

class UserController extends Controller
{
    function register(Request $req){
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->mobile = $req->mobile;
        $user->password = Hash::make($req->password);
        $user->save();
        $req->session()->put('registerUser','User Create Successfully');
        return redirect('login');
    }

    function userlogin(){
        if(session()->get('loginUser')){
            return redirect('dashboard');
        }else{
            return view('AuthPages.login');
        }
    }
    function login(Request $req){
        // $validated = $req->validate([
        //     'email'=>'required|email',
        //     'password'=>'required|alphaNum|min:6'
        // ]);
        $user = User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password)){
            return "Username or Password is not matched";
        }else{
            $req->session()->put('loginUser',$user);
            return redirect('dashboard');
        }

        // $user_data = array(
        //     'email' => $req->get('email'),
        //     'password' => Hash::check($req->get('password'))
        // );

        // if(Auth::attempt($user_data))
        // {
        //     return redirect('dashboard');
        // }else{
        //     return back()->with('error','Wrong Login Details');
        // }
    }

    function dashboard(){
        if(session()->get('loginUser')){
            return view('HomePages.home');
        }else{
            return redirect('login');
        }
    }
}
