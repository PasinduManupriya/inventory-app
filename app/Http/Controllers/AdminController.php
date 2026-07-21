<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Order;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function addCategory(){
        return view('admin.addcategory');
    }

    public function postaddcategory(Request $request){
        $category = new Category();
        $category->category_name = $request->add_category;
        $category->save();
        Alert::success('Success!', 'Your Catergory Added Successfully.');
        return redirect()->back();
    }

    public function viewcategory(){
        $categories = Category::all();
        return view('admin.viewcategory', compact('categories'));
    }

    public function delete_category($id){
        $category = Category::findOrFail($id);
        $category->delete();
        Alert::info('Deleted!', 'Catergory Deleted Successfully.');
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
        Alert::success('Updated!', 'Catergory Updated Successfully!');
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
        Alert::Success('Success!', 'Supplier Added Successfully!');
        return redirect()->back();
    }

    public function view_supplier(){
        $suppliers = Supplier::all();
        return view('admin.view_supplier', compact('suppliers'));
    }

    public function delete_supplier($id){
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        Alert::info('Deleted', 'Supplier Deleted Successfully!');
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
        Alert::success('Updated!', 'Suplier Updated Successfully!');
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
        Alert::Success('Success!', 'Product Added Successfully!');
        return redirect()->back();
    }

    public function view_product(){
        $products = Product::all();
        return view('admin.view_product', compact('products'));
    }

    public function delete_product($id){
        $product = Product::findOrFail($id);
        $product->delete();
        Alert::info('Deleted!', 'Product Deleted!');
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
        Alert::Success('Updated!', 'Product Updated Successfully!');
        return redirect('view_product');

    }

    public function Orders(){
        $products = Product::all();
        $orders = Order::all();
        return view('admin.order', compact('products', 'orders'));
    }

    public function add_order($id){
        $quantity = 1;
        $products = Product::findOrFail($id);
        $existOrder = Order::where('product_id', $products->id)->first();
        if($existOrder && ($products->product_quantity>=1)){
            $existOrder->product_quantity += 1;
            $products->product_quantity -= 1;
            $products->save();
            $existOrder->save();
            Alert::success('Success!', 'Item Added Order List.');
            return redirect('/Orders');
        }elseif($products->product_quantity>=1){
            $orders = new Order();
            $orders->product_id = $products->id;
            $orders->product_name = $products->product_name;
            $orders->product_quantity = $quantity;
            $orders->product_price = $products->product_price;
            $products->product_quantity -= 1;
            $products->save();
            $orders->save();
            Alert::success('Success!', 'Your Item Add Order List.');
            return redirect('/Orders');
        }else{
            Alert::error('info!', 'Item Not Available (Out of Stock)!');
            return redirect()->back();
        }
        
    }

    public function update_order_quantity(Request $request, $id){
        $orders = Order::findOrFail($id);
        $p_id = $orders->product_id;
        $products = Product::findOrFail($p_id);
        if($products->product_quantity>=$request->quantity){
            $products->product_quantity = $products->product_quantity + $orders->product_quantity;
            $orders->product_quantity = $request->quantity;
            $products->product_quantity -= $request->quantity;
            $orders->save();
            $products->save();
            Alert::info('Success!', 'Item Quantity Update Successfully!.');
            return redirect('/Orders');
        }else{
            Alert::error('info!', 'Item Not Available (Out of Stock)!');
            return redirect()->back();
        }
        
    }

    public function delete_order($id){
        $orders = Order::findOrFail($id);

        $p_id = $orders->product_id;
        $product = Product::findOrFail($p_id);
        $quantity = $orders->product_quantity;
        $product->product_quantity = $product->product_quantity + $quantity;
        $orders->delete();
        $product->save();
        Alert::info('Removed!', 'Your Item Remove Successfully!');
        return redirect('/Orders');
    }

    public function search_iterm(Request $request){
        $search = $request->search;
        $products = Product::where('product_name', 'LIKE', '%' . $search . '%')->get();
        $orders = Order::all();
        return view('admin.order', compact('products','orders'));
    }
}