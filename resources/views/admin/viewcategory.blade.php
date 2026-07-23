<link rel="shortcut icon" href="{{ asset('images/inventory_logo.png') }}" type="image/x-icon">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
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
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr class="text-white dark:text-white">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Category Id</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Category Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Delete Category</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Update Category</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach($categories as $category)
                                <tr class="text-white dark:text-white">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$category->id}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$category->category_name}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm"><a href="{{route('admin.delete_category',$category->id)}}" style="background-color:red; color:white; padding:5px; border-radius: 8px; border-radius: 10px;">Delete</a></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm"><a href="{{route('admin.update_category',$category->id)}}" style="background-color:green; color:white; padding:5px; border-radius: 8px; border-radius: 10px;">Update</a></td>
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
