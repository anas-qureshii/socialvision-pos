@extends('layout.layout')

@section('title')
    Inventory Items
@endsection

@section('content')
    <div class="w-full bg-white shadow shadow-gray-200 flex flex-col rounded p-2">
        <div class="flex w-full">
            <h6 class="p-2"><a href="/" class="text-[#1447e6] themeFont text-lg">Home</a> / <span
                    class="themeFont text-gray-400 text-lg">create-client</span></h6>
        </div>
        <h2 class="themeFont text-3xl capitalize mt-4 font-semibold px-2 ">Create Client</h2>
        <div class="w-full py-6 mt-6 border-t border-t-gray-100 flex flex-col items-center justify-center">

            <div class="w-full flex flex-wrap justify-between mt-2 px-4">
                <div class="w-[49%] rounded overflow-hidden relative">
                    <input type="text"
                        class="w-full p-3 pt-8 bg-blue-100 rounded themeFont text-gray-600 border border-transparent outline-0 focus:border-[#1447e6] peer"
                        id="title">
                    <label for="title"
                        class="text-gray-700 text-lg themeFont absolute top-5  ease duration-300 left-3 z-10 peer-focus:text-sm peer-focus:top-2 peer-focus:text-blue-500">Client Name</label>
                </div>
                <div class="w-[49%] rounded overflow-hidden relative">
                    <input type="text"
                        class="w-full p-3 pt-8 bg-blue-100 rounded themeFont text-gray-600 border border-transparent outline-0 focus:border-[#1447e6] peer"
                        id="phonenumber">
                    <label for="phonenumber"
                        class="text-gray-700 text-lg themeFont absolute top-5  ease duration-300 left-3 z-10 peer-focus:text-sm peer-focus:top-2 peer-focus:text-blue-500">Client Number</label>
                </div>
            </div>
            
            <div class="w-full flex flex-wrap justify-between mt-8 px-4" >
                <div class="w-[49%] rounded overflow-hidden relative">
                    <input type="text"
                        class="w-full p-3 pt-8 bg-blue-100 rounded themeFont text-gray-600 border border-transparent outline-0 focus:border-[#1447e6] peer"
                        id="client_email">
                    <label for="client_email"
                        class="text-gray-700 text-lg themeFont absolute top-5  ease duration-300 left-3 z-10 peer-focus:text-sm peer-focus:top-2 peer-focus:text-blue-500">Client Email</label>
                </div>
                <div class="w-[49%] rounded overflow-hidden relative ">
                    <input type="text"
                    class="w-full p-3 pt-8 bg-blue-100 rounded themeFont text-gray-600 border border-transparent outline-0 focus:border-[#1447e6] peer"
                    id="address">
                <label for="address"
                    class="text-gray-700 text-lg themeFont absolute top-5  ease duration-300 left-3 z-10 peer-focus:text-sm peer-focus:top-2 peer-focus:text-blue-500">Client Address</label>
                
                </div>
            </div>

        
            <div class="w-full flex flex-wrap justify-between mt-8 px-4" >
                <div class="w-full flex flex-col gap-2 relative bg-blue-100 rounded p-3" id='dropzone'>
                    <div class="w-full border-2 border-dashed border-blue-400 bg-blue-50 flex items-center justify-center p-4 relative ease-linear duration-300 hover:border-blue-200"
                        id="cus_dropzone">
                        <div class='py-8 px-3 text-sm flex themeFont gap-1'>
                            <span class="material-icons material-symbols-outlined">
                                upload_file
                            </span>
                            <p>
                                <span>drag or drop files here</span> or
                                <label for="drag_file" class="text-blue-300">Browse from device</label>
                            </p>
                        </div>
                    </div>
                    <input type="file" name="client_image" id="drag_file" hidden>
                    <div id="appendDropFile" class="flex flex-wrap items-center gap-3">
                    </div>
                    <div class="w-full h-full bg-blue-700 opacity-40 absolute top-0 left-0 hidden" id="overlay"></div>
                </div>
            </div>

            <div class="flex flex-wrap justify-start mt-4 px-4 w-full">
                <button type="submit" class="bg-blue-700 px-6 py-3 cursor-pointer rounded text-white themeFont">Create client</button>
            </div>

        </div>
    @endsection
