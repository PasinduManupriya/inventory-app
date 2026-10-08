<link rel="shortcut icon" href="{{ asset('images/inventory_logo.png') }}" type="image/x-icon">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Send Email To User,') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <div>
                            <h1 class="text-center pb-8 font-bold">Sent to Email {{$user_data->	email }}</h1>
                        </div>

                        <form action ="{{url('send_email_details',$user_data->id)}}" method = "POST" enctype="multipart/form-data">
                            @csrf
                            <div class="pb-4 text-center">
                                <label>greeting :</label>
                                <input type ="text" name= "greeting" placeholder="Enter Greeting" class="text-black">
                            </div>
                            <div class="pb-4 text-center">
                                <label>Second Line :</label>
                                <input type ="text" name= "s_line" placeholder="Enter Second Line" class="text-black">
                            </div>
                            <div class="pb-4 text-center">
                                <label>Body :</label>
                                <input type ="text" name= "body" placeholder="Enter Body" class="text-black">
                            </div>
                            <div class="pb-4 text-center">
                                <label>Url :</label>
                                <input type ="text" name= "url" placeholder="Enter url" class="text-black">
                            </div>
                            <div class="pb-4 text-center">
                                <label class="">Upload PDF:</label>
                                <input type="file" name="pdf_file" accept="application/pdf" class="">
                            </div>
                            <div class="pb-4 text-center">
                                <label>Last Line :</label>
                                <input type ="text" name= "l_line" placeholder="Enter Last Line" class="text-black">
                            </div>
                            <div class="text-left text-center">
                                <button class="w-auto bg-green-600 text-white px-4 py-2 rounded-lg">Send Email</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
