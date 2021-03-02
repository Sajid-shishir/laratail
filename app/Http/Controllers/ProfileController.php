<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(User $user){

    $posts = $user->posts()->with('user','likes')->paginate(4);
       return view('user.profile.post',[

        'user'=>$user,
        'posts'=>$posts
       ]);
    }
}
