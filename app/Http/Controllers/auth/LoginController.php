<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(){

        $this->middleware('guest')->except('logout');
    }

    function index(){
        return view('auth.login');
    }
    function store(Request $request){



        $this->validate($request,[

            'email' =>'required|email',
            'password' =>'required'
        ]);
        if(!auth()->attempt($request->only('email','password'),$request->remember)){
             return back()->with('status','Invalid Details');
        }

        return redirect()->route('dashboard');
    }
    function logout(){

        auth()->logout();
        return redirect()->route('home');
    }
}
