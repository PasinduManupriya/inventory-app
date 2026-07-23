<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){
        if(Auth::check() && Auth::user()->usertype=="user"){
            return view('dashboard');
        }
        else if(Auth::check() && Auth::user()->usertype=="admin"){
            $catergorys = Category::count();
            $Suppliers = Supplier::count();
            $Products = Product::count();
            return view('admin.dashboard', compact('catergorys', 'Suppliers', 'Products'));
        }
        else{
            return redirect('/');
        }
    }
}
