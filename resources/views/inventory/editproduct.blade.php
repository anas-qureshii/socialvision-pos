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
                <div class="w-[49%] rounded overflow-hidden relative">
                    <input type="text"
                        class="w-full p-3 pt-8 bg-blue-100 rounded themeFont text-gray-600 border border-transparent outline-0 focus:border-[#1447e6] peer"
                        id="title">
                    <label for="title"
                        class="text-gray-700 text-lg themeFont absolute top-5  ease duration-300 left-3 z-10 peer-focus:text-sm peer-focus:top-2 peer-focus:text-blue-500">Title</label>
                </div>
                <div class="w-[49%] rounded overflow-hidden relative">
                    <input type="text"
                        class="w-full p-3 pt-8 bg-blue-100 rounded themeFont text-gray-600 border border-transparent outline-0 focus:border-[#1447e6] peer"
                        id="purchasing">
                    <label for="purchasing"
                        class="text-gray-700 text-lg themeFont absolute top-5  ease duration-300 left-3 z-10 peer-focus:text-sm peer-focus:top-2 peer-focus:text-blue-500">Purchasing
                        Price</label>
                </div>
            </div>

            <div class="w-full flex flex-wrap justify-between mt-8 px-4">
                <div class="w-[49%] rounded overflow-hidden relative">
                    <input type="text"
                        class="w-full p-3 pt-8 bg-blue-100 rounded themeFont text-gray-600 border border-transparent outline-0 focus:border-[#1447e6] peer"
                        id="retail_price">
                    <label for="retail_price"
                        class="text-gray-700 text-lg themeFont absolute top-5  ease duration-300 left-3 z-10 peer-focus:text-sm peer-focus:top-2 peer-focus:text-blue-500">Retail
                        Price</label>
                </div>
                <div class="w-[49%] rounded overflow-hidden relative ">
                    <input type="text"
                        class="w-full p-3 pt-8 bg-blue-100 rounded themeFont text-gray-600 border border-transparent outline-0 focus:border-[#1447e6] peer"
                        id="wholesale_price">
                    <label for="wholesale_price"
                        class="text-gray-700 text-lg themeFont absolute top-5  ease duration-300 left-3 z-10 peer-focus:text-sm peer-focus:top-2 peer-focus:text-blue-500">Wholesale
                        Price</label>
                </div>
            </div>

            <div class="w-full flex flex-wrap justify-between mt-8 px-4">
                <div class="w-[49%] rounded overflow-hidden relative">
                    <input type="text"
                        class="w-full p-3 pt-8 bg-blue-100 rounded themeFont text-gray-600 border border-transparent outline-0 focus:border-[#1447e6] peer"
                        id="brands">
                    <label for="brands"
                        class="text-gray-700 text-lg themeFont absolute top-5  ease duration-300 left-3 z-10 peer-focus:text-sm peer-focus:top-2 peer-focus:text-blue-500">Brands</label>
                </div>
                <div class="w-[49%] rounded overflow-hidden relative ">
                    <input type="text"
                        class="w-full p-3 pt-8 bg-blue-100 rounded themeFont text-gray-600 border border-transparent outline-0 focus:border-[#1447e6] peer"
                        id="stock">
                    <label for="stock"
                        class="text-gray-700 text-lg themeFont absolute top-5  ease duration-300 left-3 z-10 peer-focus:text-sm peer-focus:top-2 peer-focus:text-blue-500">stock
                        (quantity)</label>
                </div>
            </div>

            <div class="w-full flex flex-wrap justify-between mt-8 px-4">
                <div class="w-full rounded overflow-hidden relative">
                    <select name="" id="parent_category"
                        class='w-full p-3 py-6 bg-blue-100 rounded themeFont text-gray-600 border border-transparent outline-0 text-lg focus:border-[#1447e6]'>
                        <option value="category">select options</option>
                        <option value="category">Hardware items</option>
                        <option value="category">Hardware items 2</option>
                        <option value="category">Hardware items 3</option>
                    </select>
                </div>
            </div>
            <div class="w-full flex flex-wrap justify-between mt-8 px-4">
                <div class="w-full rounded overflow-hidden relative">
                    <textarea
                        class='w-full p-3 py-6 bg-blue-100 rounded themeFont text-gray-600 border border-transparent outline-0 text-lg focus:border-[#1447e6]'
                        placeholder='category description (optional)' rows='5'></textarea>
                </div>
            </div>
            <div class="w-full flex flex-wrap justify-between mt-8 px-4">
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
