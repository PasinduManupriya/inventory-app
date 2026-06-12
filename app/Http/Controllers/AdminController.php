<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function addCategory(){
        return view('admin.addcategory');
    }

    public function postaddcategory(Request $request){
        $category = new Category();
        $category->category_name = $request->add_category;
        $category->save();
        return redirect()->back();
    }

    public function viewcategory(){
        $categories = Category::all();
        return view('admin.viewcategory', compact('categories'));
    }

    public function delete_category($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back();
    }

    public function update_category($id){
        $categories = Category::findOrfail($id);
        return view('admin.upadate_category', compact('categories'));
    }

    public function save_category(Request $request , $id){
        $categories = Category::findOrfail($id);
        $categories->category_name = $request->update_category;
        $categories->save();
        return redirect('/viewcategory');
    }
}
