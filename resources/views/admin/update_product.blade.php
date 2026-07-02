<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Product Here,') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{route('admin.update_save_value',$products->id)}}" enctype="multipart/form-data">
                        @csrf
                        <br>
                        <label>Product Name :</label>
                        <input type="text" name="product_name" value="{{$products->product_name}}" style="color:black;">
                        <br>
                        <br>
                        <label>Product Name :</label>
                        <input type="text" name="product_description" value="{{$products->product_description}}" style="color:black;">
                        <br>
                        <br>
                        <label>Product Quantity :</label>
                        <input type="number" min="1" name="product_quantity" value="{{$products->product_quantity}}"  style="color:black;">
                        <br>
                        <br>
                        <label>Product Price :</label>
                        <input type="number" min="0" name="product_price" value="{{$products->product_price}}"  style="color:black;">
                        <br>
                        <br>
                        <label>Product Category :</label>
                        <select name="product_category" style="color:black;">
                            <option value="{{ $products->product_supplier }}" selected>
                                {{ $products->product_category }} 
                            </option>
                            @foreach($categories as $categoriy)
                                <option>{{$categoriy->category_name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <br>
                        <label>Product Supplier :</label>
                        <select name="product_supplier"  style="color:black;">
                            <option value="{{ $products->product_supplier }}" selected>
                                {{ $products->product_supplier }} 
                            </option>
                            @foreach($suppliers as $supplier)
                                <option>{{$supplier->supplier_name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <br>
                        <label>Current Product Image :</label>
                        <img style="width:20%; height:20%" src="{{asset('db_img/' . $products->product_image)}}">
                        <br>
                        <input type="file" name="product_image">
                        <br>
                        <br>
                        <button type="submit" style="background-color:green; color:white; padding:8px; border-radius:10px;">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
