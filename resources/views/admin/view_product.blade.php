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
                    
                    <div class="overflow-x-auto">
                        <div>
                            @include('sweetalert::alert')
                        </div>
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr class="text-white dark:text-white">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">product Description</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product Quantity</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product price</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product Category</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product Supplier</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product Image</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product Delete</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product Update</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach($products as $product)
                                <tr class="text-white dark:text-white">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$product->product_name}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$product->product_description}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$product->product_quantity}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$product->product_price}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$product->product_category}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$product->product_supplier}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm"><img width="50%" height="50%" src="{{asset('db_img/' . $product->product_image)}}"></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm"><a href="{{route('admin.delete_product', $product->id)}}" style="background-color:red; color:white; padding:5px; border-radius: 8px; border-radius: 10px;">Delete</a></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm"><a href="{{route('admin.update_product', $product->id)}}" style="background-color:green; color:white; padding:5px; border-radius: 8px; border-radius: 10px;">Update</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
