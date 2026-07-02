<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;

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

    public function add_product(){
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('admin.add_product', compact('categories', 'suppliers'));
    }

    public function store_product(Request $request){
        $product = new Product();

        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;
        $product->product_category = $request->product_category;
        $product->product_supplier = $request->product_supplier;

        if($request->product_image){
            $img = $request->product_image;
            $new_img = time() . '.' . $img->getClientOriginalExtension();
            $product->product_image = $new_img;
            $request->product_image->move('db_img',$new_img);
        }

        $product->save();

        return redirect()->back();
    }

    public function view_product(){
        $products = Product::all();
        return view('admin.view_product', compact('products'));
    }

    public function delete_product($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back();
    }

    public function update_product($id){
        $products = Product::findOrFail($id);
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('admin.update_product', compact('products','categories','suppliers'));
    }

    public function update_save_value(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;
        $product->product_category = $request->product_category;
        $product->product_supplier = $request->product_supplier;

        if($request->hasFile('product_image')){
            $img = $request->product_image;
            $new_img = time() . '.' . $img->getClientOriginalExtension();
            $product->product_image = $new_img;
            $request->product_image->move('db_img',$new_img);
        }
        $product->save();
        return redirect('view_product');

    }
}