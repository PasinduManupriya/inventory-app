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
                    {{ __("Add Supplier Here,") }}
                    <form method="post" action="{{route('admin.supplier_save')}}">
                        @csrf
                        <br>
                        <label>Supplier Name :</label>
                        <input type="text" name="supplier_name" placeholder="Enter Supplier Name" style="color:black;">
                        <br>
                        <br>
                        <label>Supplier Contact Info :</label>
                        <input type="text" name="supplier_contact_info" placeholder="Enter Supplier Contact Info" style="color:black;">
                        <br>
                        <br>
                        <button type="submit" style="background-color:green; color:white; padding:8px; border-radius:10px;">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
