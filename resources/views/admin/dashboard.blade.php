<link rel="shortcut icon" href="{{ asset('images/inventory_logo.png') }}" type="image/x-icon">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Total Products</h1>
                </div>
            </div>
        </div>
    </div> -->

    <div style="background-color:white; padding:10px; margin:40px 40px 40px 180px; display: inline-block;">
        <img style="width:200px"src="{{asset('images/product.png')}}">
        @if($Products<"10")
            <h1 style="color:red; text-align:center; font-size:20px;"><b>{{$Products}}</b></h1>
        @elseif($Products<"50")
            <h1 style="color:#237BEB; text-align:center; font-size:20px;"><b>{{$Products}}</b></h1>
        @else
            <h1 style="color:green; text-align:center; font-size:20px;"><b>{{$Products}}</b></h1>
        @endif
        <h1 style="color:black; text-align:center; font-size:20px;"><b>Total Products</b></h1>
    </div>
    <div style="background-color:white; padding:10px; margin:40px 40px 40px 180px; display: inline-block;">
        <img style="width:200px"src="{{asset('images/catergory.avif')}}">
        @if($catergorys<"10")
            <h1 style="color:red; text-align:center; font-size:20px;"><b>{{$catergorys}}</b></h1>
        @elseif($catergorys<"50")
            <h1 style="color:#237BEB; text-align:center; font-size:20px;"><b>{{$catergorys}}</b></h1>
        @else
            <h1 style="color:green; text-align:center; font-size:20px;">{{$catergorys}}</b></h1>
        @endif
        <h1 style="color:black; text-align:center; font-size:20px;"><b>Total Catergories</b></h1>
    </div>
    <div style="background-color:white; padding:10px; margin:40px 40px 40px 180px; display: inline-block;">
        <img style="width:200px"src="{{asset('images/supplier.jpg')}}">
        @if($Suppliers<"10")
            <h1 style="color:red; text-align:center; font-size:20px;"><b>{{$Suppliers}}</b></h1>
        @elseif($Suppliers<"50")
            <h1 style="color:#237BEB; text-align:center; font-size:20px;"><b>{{$Suppliers}}</b></h1>
        @else
            <h1 style="color:green; text-align:center; font-size:20px;"><b>{{$Suppliers}}</b></h1>
        @endif
        <h1 style="color:black; text-align:center; font-size:20px;"><b>Total Supliers</b></h1>
    </div>
</x-app-layout>
