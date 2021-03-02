<?php

namespace App\Http\Controllers\auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct(){

        $this->middleware('guest');
    }

    public function index(){
        return view('auth.register');
    }

    function store(Request $request){

        $this->validate($request,[

            'name' =>'required',
            'email' =>'required|email',
            'password' =>'required|confirmed'

        ]);
        User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password)

        ]);

        auth()->attempt($request->only('email','password'));

        return redirect()->route('dashboard');
    }
}
