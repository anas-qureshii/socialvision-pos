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
                        @foreach ($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="w-full flex flex-wrap justify-between mt-8 px-4">
                <div class="w-full rounded overflow-hidden">
                    <label class="block text-sm font-medium text-gray-700 themeFont">Product Type: <span
                            class="text-red-500">*</span></label>
                    <select name="" id="productType"
                        class="mt-2 w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none  focus:border-[#1447e6]">
                        <option value="">select product type</option>
                        <option value="0">simple product</option>
                        <option value="1">Attribute product</option>
                        <option value="2">variation Product</option>
                    </select>
                </div>
                <input type="text" name="attribute_data" id="attribute_data_inp" hidden>
            </div>

            <div class="w-full flex flex-wrap justify-between mt-4 px-4 hidden" id="main-var-data">
                <div class="flex items-center justify-center h-[100px] w-full hidden">
                    <div class="w-12 h-12 border-4 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
                </div>
                <div class="w-full" id="attribute-data">
                    <label class="block text-sm font-medium text-gray-700 themeFont mb-3">Add Attributes: <span
                            class="text-red-500">*</span>
                    </label>
                    {{-- add attribute div btn  --}}
                    <div
                        class="rounded overflow-hidden relative w-full p-2 bg-gray-100 themeFont text-gray-600 border border-gray-400 peer flex justify-between items-center">
                        <h2>Add Attribute</h2>
                        <button type="button"
                            class="bg-[#1447e6] text-white p-2 px-3 rounded-md themeFont text-sm hover:bg-blue-700 ease-linear duration-200 cursor-pointer"
                            id="add_attrs">Add
                            Attribute</button>
                    </div>





                    {{-- claude variation ends here --}}
                    


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

    @push('scripts')
        <script src="{{ asset('js/product.js') }}"></script>
    @endpush
