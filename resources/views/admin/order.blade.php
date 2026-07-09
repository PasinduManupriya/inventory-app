<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Order Here,') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <div>

                            <!-- Error alert start -->
                                @if(session('error'))
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 shadow-sm" role="alert">
                                        <strong class="font-bold">Oops! </strong>
                                        <span class="block sm:inline">{{ session('error') }}</span>
                                    </div>
                                @endif
                                
                                @if(session('success'))
                                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 shadow-sm" role="alert">
                                        <span class="block sm:inline">{{ session('success') }}</span>
                                    </div>
                                @endif
                            <!-- Error alert end -->
                        </div>

                        <table style="margin:auto;" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 border border-gray-300 dark:border-gray-600">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product Quantity</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product Price</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Total</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Remove</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach($orders as $order)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$order->product_name}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <form action="{{route('admin.update_order_quantity', $order->id)}}" method="post">
                                            @csrf
                                            <input type="number" min="1" name="quantity" value="{{$order->product_quantity}}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-20">
                                            <button type="submit" style="background-color:green; color:white; padding:5px 10px; border-radius: 8px; cursor: pointer;">Update</button>
                                            </form>
                                        </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">${{$order->product_price}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">${{$order->product_quantity*$order->product_price}}</td>
                                    <td><a href="{{route('admin.delete_order', $order->id)}}" style="background-color:red; color:white; padding:5px; border-radius: 8px; border-radius: 10px;">Remove</a></td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm"><b>Total Balance</b></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">__</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">__</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm"><b>${{ $orders->sum(function($order) { return $order->product_quantity * $order->product_price; }) }}</b></td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="button" value="Print Order">
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- product -->
 <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">product Description</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product Quantity</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product price</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product Category</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product Image</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product Add</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach($products as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$product->product_name}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$product->product_description}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$product->product_quantity}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">${{$product->product_price}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$product->product_category}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm"><img width="50%" height="50%" src="{{asset('db_img/' . $product->product_image)}}"></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm"><a href="{{route('admin.add_order', $product->id)}}" style="background-color:green; color:white; padding:5px; border-radius: 8px; border-radius: 10px;">Add</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
<!-- end product -->

</x-app-layout>
