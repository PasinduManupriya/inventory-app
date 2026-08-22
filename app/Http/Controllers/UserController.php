<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\UserOrder;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){
        if(Auth::check() && Auth::user()->usertype=="user"){
            return redirect('/');
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

    public function user_search_iterm(Request $request){
        $search = $request->search;
        $products = Product::where('product_name', 'LIKE', '%' . $search . '%') ->paginate(18) ->withQueryString();
        return view('home.home', compact('products'));
    }

    public function about_us(){
        return view('home.about_us');
    }

    public function cart(){
        $user_id = Auth::id();
        $cart_items = UserOrder::where('user_id', $user_id) -> with('product')->get();
        return view('home.cart', compact('cart_items'));
    }

    public function order(){
        return view('home.order');
    }

    public function user_product_details($id){
        $product = Product::findOrFail($id);
        return view('home.user_product_details', compact('product'));
    }

    public function add_user_order($id, Request $request){
        $user_order = new UserOrder();
        $user_order->user_id = Auth::id();
        $user_order->product_id = $id;
        $user_order->user_product_quantity = $request->quantity;
        $user_order->save();
        return redirect()->back();
        // return view('home.user_product_details');
    }
}
