<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){
        if(Auth::check() && Auth::user()->usertype=="user"){
            return view('dashboard');
        }
        else if(Auth::check() && Auth::user()->usertype=="admin"){
            return view('admin.dashboard');
        }
        else{
            return redirect('/');
        }
    }
}
