@extends('layout.layout')

@section('title')
    Add category
@endsection


@section('content')
    <div class="w-full bg-white shadow shadow-gray-200 flex flex-col rounded p-2">
        <div class="flex w-full">
            <h6 class="p-2"><a href="/" class="text-[#1447e6] themeFont text-lg">Home</a> / <span
                    class="themeFont text-gray-400 text-lg">category</span></h6>
        </div>
        <h2 class="themeFont text-3xl capitalize mt-4 font-semibold px-2 ">Add Category</h2>
        <div class="w-full py-6 mt-6 border-t border-t-gray-100 flex items-center justify-center">
            <div class="w-1/2 flex flex-col gap-6">
                <p class="themeFont text-sm flex gap-2 items-center mb-3">
                    <span class="w-6 h-6 rounded-full flex items-center justify-center bg-yellow-400">!</span> Adding image
                    is optional
                </p>
                <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="w-full rounded overflow-hidden flex flex-col gap-1 mb-4">
                        <label class="block text-sm font-medium text-gray-700 themeFont">Title: <span
                                class="text-red-500">*</span></label>
                        <input type="text" placeholder="Title" name="name"
                            class="mt-1  w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none  focus:border-[#1447e6]">
                    </div>
                    <div class="w-full rounded overflow-hidden flex flex-col gap-1 mb-4">
                        <label class="block text-sm font-medium text-gray-700 themeFont">Category: <span
                                class="text-red-500">*</span></label>
                        <select name="p_category" id=""
                            class="mt-1 w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none  focus:border-[#1447e6]">
                            <option value="">select categories</option>
                        </select>
                    </div>
                    <div class="w-full flex flex-wrap justify-between mb-4">
                        <label class="block text-sm font-medium text-gray-700 themeFont">Description: <span
                                class="text-red-500">*</span></label>

                        <textarea placeholder="Enter Note" name="description" class="mt-2 w-full border border-gray-300 themeFont rounded p-3"
                            rows="5"></textarea>
                    </div>
                    <div class="w-full flex flex-col gap-2 relative bg-gray-100 rounded p-3 mb-4" id='dropzone'>
                        <div class="w-full border-2 border-dashed border-gray-400 bg-gray-50 flex items-center justify-center p-4 relative ease-linear duration-300 hover:border-blue-200"
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
                        <input type="file" name="cat_image" id="drag_file" hidden>
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
                    <div class="w-full">
                        <input type="submit" value="Add category"
                            class="w-full py-3 px-2 rounded-lg bg-blue-700 text-white capitalize themeFont cursor-pointer">
                    </div>
                </form>

            </div>
        </div>
    @endsection
