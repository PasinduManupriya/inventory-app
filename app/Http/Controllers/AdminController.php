<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Supplier;

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

    public function add_supplier(){
        return view('admin.add_supplier');
    }

    public function supplier_save(Request $request){
        $supplier = new Supplier();
        $supplier->supplier_name = $request->supplier_name;
        $supplier->supplier_conact_info = $request->supplier_contact_info;
        $supplier->save();
        return redirect()->back();
    }

    public function view_supplier(){
        $suppliers = Supplier::all();
        return view('admin.view_supplier', compact('suppliers'));
    }

    public function delete_supplier($id){
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->back();
    }

    public function update_supplier($id){
        $suppliers = Supplier::findOrFail($id);
        return view('admin.update_supplier', compact('suppliers'));
    }

    public function supplier_new_value(Request $request, $id){
        $supplier = Supplier::findOrFail($id);
        $supplier->supplier_name = $request->supplier_name;
        $supplier->supplier_conact_info = $request->supplier_contact_info;
        $supplier->save();
        return redirect('/view_supplier');
    }
}
