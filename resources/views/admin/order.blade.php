<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<link rel="shortcut icon" href="{{ asset('images/inventory_logo.png') }}" type="image/x-icon">
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

                            <!-- sweetalert start -->
                                @include ('sweetalert::alert')
                            <!-- sweetalert end -->
                        </div>
                        <div id="pdf-content">
                        <table style="margin:auto;" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 border border-gray-300 dark:border-gray-600">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr class="text-white dark:text-white">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product Code</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product Quantity</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product Price</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Total</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Remove</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach($orders as $order)
                                <tr class="text-white dark:text-white">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$order->product_id}}</td>
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
                                <tr class="text-white dark:text-white">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm"><b><u>Total Balance :</u></b></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">__</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">__</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">__</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm"><b><u>${{ $orders->sum(function($order) { return $order->product_quantity * $order->product_price; }) }}</u></b></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">__</td>
                                </tr>
                            </tbody>
                        </table>
                        <div>
                        <div>
                            <br>
                            <button onclick="downloadPDF()" class="btn btn-primary">Download PDF</button>
                            <a href="{{route('admin.clear_order')}}" class="block text-right">Clear Order</a>
                            <script>
                                function downloadPDF() {
                                    const element = document.getElementById('pdf-content');

                                    const opt = {
                                    margin:       10,
                                    filename:     'Order-Invoice.pdf',
                                    image:        { type: 'jpeg', quality: 0.98 },
                                    html2canvas:  { scale: 2, backgroundColor: '#ffffff' },
                                    jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
                                };
                                html2pdf().set(opt).from(element).save();
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- User Order Details -->

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 border border-gray-300 dark:border-gray-600">
                        <thead id="table-head" class="bg-gray-50 dark:bg-gray-700">
                            <tr class="text-white dark:text-white">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">User Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Action</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Send Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Bill Status</th>
                            </tr>
                        </thead>
                        <tbody id="table-body" class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach($users_products as $users_product)
                                <tr class="text-white dark:text-white">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $users_product->user?->name ?? 'No User' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-xs fetch-user-orders" data-id="{{ $users_product->user_id }}">
                                            View Order
                                        </button>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <a href="{{url('send_email',$users_product->user_id)}}" style="background-color:green; color:white; padding:5px 10px; border-radius: 8px; cursor: pointer;">Send Email</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <a href="{{url('bill_status/'. $users_product->id)}}" style="background-color:green; color:white; padding:5px 10px; border-radius: 8px; cursor: pointer;">Completed</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- User Order Details -->

<!-- jQuery Script -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.fetch-user-orders', function(e) {
            e.preventDefault(); 
            
            let userId = $(this).attr('data-id');
            console.log("Clicked User ID:", userId); 

            if(!userId) {
                alert("User ID එක හමුවූයේ නැත!");
                return;
            }

            $.ajax({
                url: '/get-user-orders/' + userId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log("Response Received:", response);

                    if (response.success && response.data.length > 0) {
                        let newHeader = `
                            <tr class="text-white dark:text-white">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Item Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Quantity</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Descripton</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Image</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Action</th>
                            </tr>
                        `;
                        $('#table-head').html(newHeader);
                        let newBody = '';
                        $.each(response.data, function(key, order) {

                            let productObj = order.product || order.Product;

                            let productName = productObj ? productObj.product_name : 'N/A';
                            let productQuantity = order.product_quantity ?? 'N/A';
                            let productDescription = productObj ? productObj.product_description : 'N/A';

                            let imageName = productObj ? (productObj.image || productObj.product_image || productObj.photo) : null;
                            let imageElement = imageName 
                                ? `<img src="/db_img/${imageName}" class="w-12 h-12 object-cover rounded" alt="Product Image">` 
                                : `<span class="text-gray-400">No Image</span>`;
                            newBody += `
                                <tr class="text-white dark:text-white">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">${productName}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">${productQuantity}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">${productDescription}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">${imageElement}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <button type="button" onclick="location.reload()" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded text-xs">
                                            Back
                                        </button>
                                    </td>
                                </tr>
                            `;
                        });
                        $('#table-body').html(newBody);

                    } else {
                        alert('Not Order');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", xhr.responseText);
                    alert('Error: ' + xhr.status + ' - ' + error);
                }
            });
        });
    });
</script>

<!-- jQuery Script -->

<!-- product -->

 <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="overflow-x-auto">
                        <div>
                            <form action="{{route('admin_search_iterm')}}" method="GET">
                                <input type="search"  name="search" value="{{ request('search') }}" placeholder="Search products..."  class="block w-full p-2.5 text-sm text-white bg-gray-800 border border-gray-600 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400 shadow-sm transition duration-150 ease-in-out">
                                <div style="text-align: center; margin-top: 15px; margin-bottom: 15px;" class="text-center my-4">
                                    <button type="submit" class="px-6 py-2.5 text-sm font-bold rounded-lg transition duration-150 ease-in-out shadow-md cursor-pointer" style="background-color: #38bdf8; color: #0f172a; display: inline-block;">Search</button>
                                </div>
                                <br>
                            </form>
                        </div>
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr class="text-white dark:text-white">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product ID</th>
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
                                <tr class="text-white dark:text-white">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$product->id}}</td>
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
