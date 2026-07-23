<link rel="shortcut icon" href="{{ asset('images/inventory_logo.png') }}" type="image/x-icon">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Product Here,') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        @include('sweetalert::alert')
                    </div>
                    <form method="post" action="{{route('admin.store_product')}}" enctype="multipart/form-data">
                        @csrf
                        <br>
                        <label>Product Name :</label>
                        <input type="text" name="product_name" placeholder="Enter Product Name" style="color:black;" required>
                        <br>
                        <br>
                        <label>Product Description :</label>
                        <input type="text" name="product_description" placeholder="Enter Product Description" style="color:black;" required>
                        <br>
                        <br>
                        <label>Product Quantity :</label>
                        <input type="number" min="1" name="product_quantity" placeholder="Enter Product Quantity" style="color:black;" required>
                        <br>
                        <br>
                        <label>Product Price :</label>
                        <input type="number" min="0" name="product_price" placeholder="Enter Product Price" style="color:black;" required>
                        <br>
                        <br>
                        <label>Product Category :</label>
                        <select name="product_category" style="color:black;">
                            <option value="" disabled selected>-- Select Category --</option>
                            @foreach($categories as $categoriy)
                                <option>{{$categoriy->category_name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <br>
                        <label>Product Supplier :</label>
                        <select name="product_supplier" style="color:black;">
                            <option value="" disabled selected>-- Select Category --</option>
                            @foreach($suppliers as $supplier)
                                <option>{{$supplier->supplier_name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <br>
                        <label>Product Image :</label>
                        <input type="file" name="product_image">
                        <br>
                        <br>
                        <button type="submit" style="background-color:green; color:white; padding:8px; border-radius:10px;">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
