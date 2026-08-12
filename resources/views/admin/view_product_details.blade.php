<link rel="shortcut icon" href="{{ asset('images/inventory_logo.png') }}" type="image/x-icon">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product View Here,') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div style="text-align:center;">
                        <h1 class="font-bold" style="font-size: 60px;">{{$product_details->product_name}}</h1>
                        <br>
                        <img style="width:300px; height:300px; display: block; margin: 0 auto;" src ="{{asset('db_img/' . $product_details->product_image)}}">
                        <br>
                        <h1>product Description : {{$product_details->product_description	}}</h1>
                        <br>
                        <h1>Product Category : {{$product_details->product_category}}</h1>
                        <br>
                        <h1>Product Supplier : {{$product_details->product_supplier}}</h1>
                        <br>
                        <h1>Product Received Date : {{$product_details->received_date}}</h1>
                        <br>
                        <a href="{{route('admin.delete_product', $product_details->id)}}" style="background-color:red; color:white; padding:5px; border-radius: 8px; border-radius: 10px;">Delete</a></td>
                        <a href="{{route('admin.update_product', $product_details->id)}}" style="background-color:green; color:white; padding:5px; border-radius: 8px; border-radius: 10px;">Update</a></td>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
