<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function postLogin(Request $request){
        //Authentification is user and password are correct or not
        // dd(request()->all());
        if(Auth::attempt($request->only('name', 'password'))){
            $request->session()->regenerate();
            $data = $request->input();
            // Hash::request()->password;
            $name = Auth::User()->name;
            $comp_name = Auth::User()->comp_name;
            $comp_code = Auth::User()->comp_code;
            $request->session()->put('comp_name', $comp_name);
            $request->session()->put('name', $name);
            $request->session()->put('comp_code', $comp_code);
            // dd(session()->all());
                        
            return redirect()->intended('/upload');
        }
        return redirect('/');
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }
}