@extends('layout.layout')

@section('title')
    Inventory Items
@endsection

@section('content')
    <div class="w-full bg-white shadow shadow-gray-200 flex flex-col rounded p-2">
        {{-- breadcrumbs --}}
        <div class="flex w-full">
            <h6 class="p-2"><a href="/" class="text-[#1447e6] themeFont text-lg">Home</a> / <span
                    class="themeFont text-gray-400 text-lg">Products</span></h6>
        </div>
        {{-- breadcrumbs ends here --}}

        {{-- page heading --}}
        <h2 class="themeFont text-3xl capitalize mt-4 font-semibold px-2 ">Add Products</h2>

        <form class="w-full py-6 mt-6 border-t border-t-gray-100 flex flex-col items-center justify-center" method="POST"
            action="{{ route('product.store') }}" enctype="multipart/form-data">

            <div class="w-full flex flex-wrap justify-between mt-2 px-4">
                <div class="w-[33%] rounded overflow-hidden flex flex-col gap-1">
                    <label class="block text-sm font-medium text-gray-700 themeFont">Title: <span
                            class="text-red-500">*</span></label>
                    <input type="text" placeholder="Title"
                        class="mt-1  w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none  focus:border-[#1447e6]">
                </div>
                <div class="w-[33%] rounded overflow-hidden flex flex-col gap-1">
                    <label class="block text-sm font-medium text-gray-700 themeFont">Price: <span
                            class="text-red-500">*</span></label>
                    <input type="text" placeholder="price"
                        class="mt-1  w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none  focus:border-[#1447e6]">
                </div>
                <div class="w-[33%] rounded overflow-hidden flex flex-col gap-1">
                    <label class="block text-sm font-medium text-gray-700 themeFont">Retail Price: <span
                            class="text-red-500">*</span></label>
                    <input type="text" placeholder="Retail price"
                        class="mt-1  w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none  focus:border-[#1447e6]">
                </div>

            </div>
            <div class="w-full flex flex-wrap justify-between mt-8 px-4">
                <div class="w-[33%] rounded overflow-hidden flex flex-col gap-1">
                    <label class="block text-sm font-medium text-gray-700 themeFont">Wholesale Price: <span
                            class="text-red-500">*</span></label>
                    <input type="text" placeholder="Wholesale Price"
                        class="mt-1  w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none  focus:border-[#1447e6]">
                </div>
                <div class="w-[33%] rounded overflow-hidden flex flex-col gap-1">
                    <label class="block text-sm font-medium text-gray-700 themeFont">stock (Quantity): <span
                            class="text-red-500">*</span></label>
                    <input type="text" placeholder="stock (Quantity)"
                        class="mt-1  w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none  focus:border-[#1447e6]">
                </div>
                <div class="w-[33%] rounded overflow-hidden flex flex-col gap-1">
                    <label class="block text-sm font-medium text-gray-700 themeFont">Category: <span
                            class="text-red-500">*</span></label>
                    <select name="" id=""
                        class="mt-1 w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none  focus:border-[#1447e6]">
                        <option value="">select categories</option>
                        <option value="">mat d</option>
                        <option value="">88mm sheet</option>
                    </select>
                </div>

            </div>

            <div class="w-full flex flex-wrap justify-between mt-8 px-4">
                <div class="w-full rounded overflow-hidden">
                    <label class="block text-sm font-medium text-gray-700 themeFont">Product Type: <span
                            class="text-red-500">*</span></label>
                    <select name="" id=""
                        class="mt-2 w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none  focus:border-[#1447e6]">
                        <option value="">select product type</option>
                        <option value="">simple product</option>
                        <option value="">variation Product</option>
                    </select>
                </div>
            </div>

            <div class="w-full flex flex-wrap justify-between mt-8 px-4">
                <div class="flex items-center justify-center h-[100px] w-full hidden">
                    <div class="w-12 h-12 border-4 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
                </div>
                <div class="w-full" id="variation-div">

                    <div class="w-full" id="attribute-data">
                        <label class="block text-sm font-medium text-gray-700 themeFont mb-3">Add Attributes: <span
                                class="text-red-500">*</span>
                        </label>
                        {{-- add attribute div  --}}
                        <div
                            class="rounded overflow-hidden relative w-full p-2 bg-gray-100 themeFont text-gray-600 border border-gray-400 peer flex justify-between items-center">
                            <h2>Add Attribute</h2>
                            <button type="button"
                                class="bg-[#1447e6] text-white p-2 px-3 rounded-md themeFont text-sm hover:bg-blue-700 ease-linear duration-200 cursor-pointer"
                                id="add_items">Add
                                Item</button>
                        </div>
                        {{-- product attribute fields --}}
                        <div class="bg-gray-50 border border-gray-200 p-4 rounded-lg my-4" id="attr-container">
                            <h3 class="text-lg font-semibold mb-3 themeFont">Product Attributes</h3>
                            <div class="flex flex-wrap gap-4 mt-4 main-attr-div">
                                <div class="flex-1 min-w-[200px]">
                                    <label class="block text-sm mb-1 themeFont">Attribute Name</label>
                                    <input type="text" placeholder="e.g., Size"
                                        class="mt-1 w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none focus:border-[#1447e6]" />
                                </div>
                                <div class="flex-1 min-w-[200px]">
                                    <label class="block text-sm mb-1 themeFont">Attribute Values</label>
                                    <input type="text" placeholder="e.g., S, M, L"
                                        class="mt-1 w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none focus:border-[#1447e6]" />
                                </div>
                            </div>
                            <button type="button"
                                class="bg-[#1447e6] text-white mt-3 p-2 px-3 flex  rounded-md themeFont text-sm hover:bg-blue-700 ease-linear duration-200 cursor-pointer"
                                id="add_items">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                Add
                            </button>
                            {{-- product attribute fields ends --}}

                            {{-- product attribute data edds here ends --}}
                            <div class="w-full flex flex-col items-start  gap-4 pt-4" id="attr-data">
                                <!-- Attributes Display Section -->
                                <div class="w-full flex flex-col  gap-4" id="attributes-container">
                                    <!-- Sample Attribute (Size) -->
                                    <div
                                        class="w-full flex flex-col sm:flex-row border border-gray-200 rounded-md overflow-hidden attribute-row">
                                        <!-- Attribute Name -->
                                        <div class="w-full sm:w-1/3 bg-blue-700 p-4 flex items-center justify-between">
                                            <h3 class="text-lg font-semibold themeFont text-white">Size</h3>
                                            <button
                                                class="remove-attr text-white hover:text-red-200 transition duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                        <!-- Attribute Values -->
                                        <div class="w-full sm:w-2/3 p-4 flex flex-wrap gap-2 items-center">
                                            <span
                                                class="bg-blue-700 px-3 py-2 text-sm themeFont text-white rounded-md flex items-center">
                                                88cm
                                                <button class="ml-2 text-white hover:text-red-200 transition duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </span>
                                            <span
                                                class="bg-blue-700 px-3 py-2 text-sm themeFont text-white rounded-md flex items-center">
                                                68mm
                                                <button class="ml-2 text-white hover:text-red-200 transition duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </span>
                                            <span
                                                class="bg-blue-700 px-3 py-2 text-sm themeFont text-white rounded-md flex items-center">
                                                103cm
                                                <button class="ml-2 text-white hover:text-red-200 transition duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Sample Attribute (Color) -->
                                    <div
                                        class="w-full flex flex-col sm:flex-row border border-gray-200 rounded-md overflow-hidden attribute-row">
                                        <!-- Attribute Name -->
                                        <div class="w-full sm:w-1/3 bg-blue-700 p-4 flex items-center justify-between">
                                            <h3 class="text-lg font-semibold themeFont text-white">Color</h3>
                                            <button
                                                class="remove-attr text-white hover:text-red-200 transition duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                        <!-- Attribute Values -->
                                        <div class="w-full sm:w-2/3 p-4 flex flex-wrap gap-2 items-center">
                                            <span
                                                class="bg-blue-700 px-3 py-2 text-sm themeFont text-white rounded-md flex items-center">
                                                Red
                                                <button class="ml-2 text-white hover:text-red-200 transition duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </span>
                                            <span
                                                class="bg-blue-700 px-3 py-2 text-sm themeFont text-white rounded-md flex items-center">
                                                Blue
                                                <button class="ml-2 text-white hover:text-red-200 transition duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </span>
                                            <span
                                                class="bg-blue-700 px-3 py-2 text-sm themeFont text-white rounded-md flex items-center">
                                                Green
                                                <button class="ml-2 text-white hover:text-red-200 transition duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <button type="button"
                                    class="bg-[#1447e6] text-white mt-3 p-3 px-5 flex  rounded-md themeFont text-sm hover:bg-blue-700 ease-linear duration-200 cursor-pointer"
                                    id="add_items">
                                  
                                    Make Variation
                                </button>

                            </div>
                        </div>

                        <!-- Complete Version with Multiple Variations -->
                        <div class="w-full flex flex-col gap-6 pt-4" id="variation_container">
                            <!-- First Variation -->
                            <div
                                class="w-full flex flex-col border border-gray-200 rounded-md overflow-hidden variation-container">
                                <!-- Variation Header -->
                                <div class="w-full bg-blue-700 p-4 flex items-center justify-between">
                                    <h3 class="text-lg font-semibold themeFont text-white">88mm</h3>
                                    <button class="text-white hover:text-red-200 transition duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Pricing and Stock Form -->
                                <div class="w-full bg-gray-50 p-6">
                                    <!-- First Row -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                        <div class="flex flex-col">
                                            <label class="flex text-sm font-medium text-gray-700 mb-1">
                                                Per feet Price:
                                                <span class="text-red-500 ml-1">*</span>
                                            </label>
                                            <input type="number" placeholder="Enter price per feet"
                                                class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-md themeFont focus:ring-blue-500 focus:border-blue-500">
                                        </div>

                                        <div class="flex flex-col">
                                            <label class="flex text-sm font-medium text-gray-700 mb-1">
                                                Per Roll price:
                                                <span class="text-red-500 ml-1">*</span>
                                            </label>
                                            <input type="number" placeholder="Enter price per roll"
                                                class="w-full px-4 py-3 mt-2 border border-gray-300 themeFont rounded-md focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                    </div>

                                    <!-- Second Row -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                        <div class="flex flex-col">
                                            <label class="flex text-sm font-medium text-gray-700 mb-1">
                                                Retail Price (per feet):
                                                <span class="text-red-500 ml-1">*</span>
                                            </label>
                                            <input type="number" placeholder="Enter wholesale price per feet"
                                                class="w-full px-4 py-3 mt-2 border border-gray-300 themeFont rounded-md focus:ring-blue-500 focus:border-blue-500">
                                        </div>

                                        <div class="flex flex-col">
                                            <label class="flex text-sm font-medium text-gray-700 mb-1">
                                                Wholesale Price (per feet):
                                                <span class="text-red-500 ml-1">*</span>
                                            </label>
                                            <input type="number" placeholder="Enter wholesale price per roll"
                                                class="w-full px-4 py-3 mt-2 border border-gray-300 themeFont rounded-md focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                    </div>

                                    <!-- Stock Quantity Row -->
                                    <div class="w-full">
                                        <label class="flex text-sm font-medium text-gray-700 mb-1">
                                            Stock (Quantity):
                                            <span class="text-red-500 ml-1">*</span>
                                        </label>
                                        <input type="number" placeholder="Enter available quantity for this variation"
                                            class="w-full px-4 py-3 mt-2 themeFont border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </div>
                            </div>
                            <div
                                class="w-full flex flex-col border border-gray-200 rounded-md overflow-hidden variation-container">
                                <!-- Variation Header -->
                                <div class="w-full bg-blue-700 p-4 flex items-center justify-between">
                                    <h3 class="text-lg font-semibold themeFont text-white">88mm</h3>
                                    <button class="text-white hover:text-red-200 transition duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Pricing and Stock Form -->
                                <div class="w-full bg-gray-50 p-6">
                                    <!-- First Row -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                        <div class="flex flex-col">
                                            <label class="flex text-sm font-medium text-gray-700 mb-1">
                                                Per feet Price:
                                                <span class="text-red-500 ml-1">*</span>
                                            </label>
                                            <input type="number" placeholder="Enter price per feet"
                                                class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-md themeFont focus:ring-blue-500 focus:border-blue-500">
                                        </div>

                                        <div class="flex flex-col">
                                            <label class="flex text-sm font-medium text-gray-700 mb-1">
                                                Per Roll price:
                                                <span class="text-red-500 ml-1">*</span>
                                            </label>
                                            <input type="number" placeholder="Enter price per roll"
                                                class="w-full px-4 py-3 mt-2 border border-gray-300 themeFont rounded-md focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                    </div>

                                    <!-- Second Row -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                        <div class="flex flex-col">
                                            <label class="flex text-sm font-medium text-gray-700 mb-1">
                                                Retail Price (per feet):
                                                <span class="text-red-500 ml-1">*</span>
                                            </label>
                                            <input type="number" placeholder="Enter wholesale price per feet"
                                                class="w-full px-4 py-3 mt-2 border border-gray-300 themeFont rounded-md focus:ring-blue-500 focus:border-blue-500">
                                        </div>

                                        <div class="flex flex-col">
                                            <label class="flex text-sm font-medium text-gray-700 mb-1">
                                                Wholesale Price (per feet):
                                                <span class="text-red-500 ml-1">*</span>
                                            </label>
                                            <input type="number" placeholder="Enter wholesale price per roll"
                                                class="w-full px-4 py-3 mt-2 border border-gray-300 themeFont rounded-md focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                    </div>

                                    <!-- Stock Quantity Row -->
                                    <div class="w-full">
                                        <label class="flex text-sm font-medium text-gray-700 mb-1">
                                            Stock (Quantity):
                                            <span class="text-red-500 ml-1">*</span>
                                        </label>
                                        <input type="number" placeholder="Enter available quantity for this variation"
                                            class="w-full px-4 py-3 mt-2 themeFont border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </div>
                            </div>


                        </div>


                        {{-- claude variation ends here --}}


                    </div>

                </div>

            </div>


            <div class="w-full flex flex-wrap justify-between mt-8 px-4">
                <div class="w-full rounded overflow-hidden relative">
                    <label class="block text-sm font-medium text-gray-700 themeFont">Description: <span
                            class="text-red-500">*</span></label>

                    <textarea placeholder="Enter Note" class="mt-2 w-full border border-gray-300 themeFont rounded p-3"></textarea>
                </div>
            </div>
            <div class="w-full flex flex-wrap justify-between mt-4 px-4">
                <label class="block text-sm font-medium text-gray-700 mb-4 themeFont">Upload Files: <span
                        class="text-red-500">*</span></label>
                <div class="w-full flex flex-col gap-2 relative bg-gray-100 rounded p-3" id='dropzone'>
                    <div class="w-full border-2 border-dashed border-gray-200 bg-gray-50 flex items-center justify-center p-4 relative ease-linear duration-300 hover:border-blue-200"
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
                    <input type="file" name="" id="drag_file" hidden>
                    <div id="appendDropFile" class="flex flex-wrap items-center gap-3">
                        {{-- <div class="w-16 h-16 rounded-lg bg-gray-500 relative">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('assets/products/p-1.webp') }}"
                                alt="">
                            <button
                                class="w-4 h-4 text-[10px] flex items-center justify-center rounded-full bg-red-800 text-white hover:bg-black absolute -top-2 -right-2 cursor-pointer">
                                <span class="material-icons material-symbols-outlined !text-sm">
                                    close
                                </span>
                            </button>
                        </div> --}}
                    </div>
                    <div class="w-full h-full bg-blue-700 opacity-40 absolute top-0 left-0 hidden" id="overlay"></div>
                </div>
            </div>
            <div class="w-full flex justify-start mt-4 p-4">
                <button
                    class="bg-[#1447e6] text-white p-3 px-4 rounded-md themeFont text-lg hover:bg-blue-600 ease-linear duration-200 cursor-pointer"
                    type="submit">Add
                    Product</button>
            </div>


        </form>
    @endsection
