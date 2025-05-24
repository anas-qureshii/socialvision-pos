@extends('layout.layout')

@section('title')
    Inventory category page
@endsection


@section('content')
    <div class="w-full bg-white shadow shadow-gray-200 flex flex-col rounded p-2">
        <div class="flex w-full">
            <h6 class="p-2"><a href="/" class="text-[#1447e6] themeFont text-lg">Home</a> / <span
                    class="themeFont text-gray-400 text-lg">category</span></h6>
        </div>
        <h2 class="themeFont text-3xl capitalize mt-4 font-semibold px-2 ">Add Category</h2>
        <div class="w-full py-6 mt-6 border-t border-t-gray-100 flex items-center justify-center">
            <div class="w-full flex flex-col gap-1">
                <div class="w-full overflow-x-auto p-2">
                    <table class="whitespace-nowrap w-full themeFont ">
                        <thead class='bg-blue-50'>
                            <tr>
                                <th class="font-normal text-sm capitalize p-2">sno</th>
                                <th class="font-normal text-sm capitalize p-2 text-left">Name</th>
                                <th class="font-normal text-sm capitalize p-2 text-left">Parent category</th>
                                <th class="font-normal text-sm capitalize p-2 text-left">Image</th>
                                <th class="font-normal text-sm capitalize p-2 text-left">publish Date</th>
                                <th class="font-normal text-sm capitalize p-2">Action</th>
                            </tr>
                        </thead>
                        <tbody class='text-gray-500'>
                            <tr class="border-b border-b-gray-50">
                                <td class="p-2 text-lg text-center">1</td>
                                <td class="p-2 text-sm">Doors Locks</td>
                                <td class="p-2 text-sm">hardware</td>
                                <td class="p-2 text-sm"><img src="{{ asset('assets/products/p-2.webp') }}"
                                        class="w-12 h-12 flex object-contain" alt="product-image-01"></td>
                                <td class="p-2 text-sm">17-02-2025</td>
                                <td class="p-2 text-sm">
                                    <div class="flex gap-2 justify-center">
                                        <button
                                            class="w-8 h-8 flex justify-center items-center bg-green-100 text-green-400 rounded cursor-pointer">
                                            <span class="material-icons material-symbols-outlined">
                                                visibility
                                            </span>
                                        </button>
                                        <button
                                            class="w-8 h-8 flex justify-center items-center bg-yellow-100 text-yellow-400 rounded cursor-pointer">
                                            <span class="material-icons material-symbols-outlined">
                                                edit
                                            </span>
                                        </button>
                                        <button
                                            class="w-8 h-8 flex justify-center items-center bg-red-100 text-red-400 rounded cursor-pointer">
                                            <span class="material-icons material-symbols-outlined">
                                                delete
                                            </span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-b-gray-50">
                                <td class="p-2 text-lg text-center">1</td>
                                <td class="p-2 text-sm">Doors Locks</td>
                                <td class="p-2 text-sm">hardware</td>
                                
                                <td class="p-2 text-sm"><img src="{{ asset('assets/products/p-3.webp') }}"
                                        class="w-12 h-12 flex object-contain" alt="product-image-01"></td>
                                <td class="p-2 text-sm">17-02-2025</td>
                                <td class="p-2 text-sm">
                                    <div class="flex gap-2 justify-center">
                                        <button
                                            class="w-8 h-8 flex justify-center items-center bg-green-100 text-green-400 rounded cursor-pointer">
                                            <span class="material-icons material-symbols-outlined">
                                                visibility
                                            </span>
                                        </button>
                                        <button
                                            class="w-8 h-8 flex justify-center items-center bg-yellow-100 text-yellow-400 rounded cursor-pointer">
                                            <span class="material-icons material-symbols-outlined">
                                                edit
                                            </span>
                                        </button>
                                        <button
                                            class="w-8 h-8 flex justify-center items-center bg-red-100 text-red-400 rounded cursor-pointer">
                                            <span class="material-icons material-symbols-outlined">
                                                delete
                                            </span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-b-gray-50">
                                <td class="p-2 text-lg text-center">1</td>
                                <td class="p-2 text-sm">Doors Locks</td>
                                <td class="p-2 text-sm">hardware</td>
                                
                                <td class="p-2 text-sm"><img src="{{ asset('assets/products/p-1.webp') }}"
                                        class="w-12 h-12 flex object-contain" alt="product-image-01"></td>
                                <td class="p-2 text-sm">17-02-2025</td>
                                <td class="p-2 text-sm">
                                    <div class="flex gap-2 justify-center">
                                        <button
                                            class="w-8 h-8 flex justify-center items-center bg-green-100 text-green-400 rounded cursor-pointer">
                                            <span class="material-icons material-symbols-outlined">
                                                visibility
                                            </span>
                                        </button>
                                        <button
                                            class="w-8 h-8 flex justify-center items-center bg-yellow-100 text-yellow-400 rounded cursor-pointer">
                                            <span class="material-icons material-symbols-outlined">
                                                edit
                                            </span>
                                        </button>
                                        <button
                                            class="w-8 h-8 flex justify-center items-center bg-red-100 text-red-400 rounded cursor-pointer">
                                            <span class="material-icons material-symbols-outlined">
                                                delete
                                            </span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-b-gray-50">
                                <td class="p-2 text-lg text-center">1</td>
                                <td class="p-2 text-sm">Doors Locks</td>
                                <td class="p-2 text-sm">hardware</td>
                                
                                <td class="p-2 text-sm"><img src="{{ asset('assets/products/p-1.webp') }}"
                                        class="w-12 h-12 flex object-contain" alt="product-image-01"></td>
                                <td class="p-2 text-sm">17-02-2025</td>
                                <td class="p-2 text-sm">
                                    <div class="flex gap-2 justify-center">
                                        <button
                                            class="w-8 h-8 flex justify-center items-center bg-green-100 text-green-400 rounded cursor-pointer">
                                            <span class="material-icons material-symbols-outlined">
                                                visibility
                                            </span>
                                        </button>
                                        <button
                                            class="w-8 h-8 flex justify-center items-center bg-yellow-100 text-yellow-400 rounded cursor-pointer">
                                            <span class="material-icons material-symbols-outlined">
                                                edit
                                            </span>
                                        </button>
                                        <button
                                            class="w-8 h-8 flex justify-center items-center bg-red-100 text-red-400 rounded cursor-pointer">
                                            <span class="material-icons material-symbols-outlined">
                                                delete
                                            </span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-b-gray-50">
                                <td class="p-2 text-lg text-center">1</td>
                                <td class="p-2 text-sm">Doors Locks</td>
                                <td class="p-2 text-sm">hardware</td>
                                
                                <td class="p-2 text-sm"><img src="{{ asset('assets/products/p-1.webp') }}"
                                        class="w-12 h-12 flex object-contain" alt="product-image-01"></td>
                                <td class="p-2 text-sm">17-02-2025</td>
                                <td class="p-2 text-sm">
                                    <div class="flex gap-2 justify-center">
                                        <button
                                            class="w-8 h-8 flex justify-center items-center bg-green-100 text-green-400 rounded cursor-pointer">
                                            <span class="material-icons material-symbols-outlined">
                                                visibility
                                            </span>
                                        </button>
                                        <button
                                            class="w-8 h-8 flex justify-center items-center bg-yellow-100 text-yellow-400 rounded cursor-pointer">
                                            <span class="material-icons material-symbols-outlined">
                                                edit
                                            </span>
                                        </button>
                                        <button
                                            class="w-8 h-8 flex justify-center items-center bg-red-100 text-red-400 rounded cursor-pointer">
                                            <span class="material-icons material-symbols-outlined">
                                                delete
                                            </span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                         
                        </tbody>
                    </table>
                </div>
                <div class="flex flex-wrap justify-between p-2">
                    <div class="w-[50%] flex gap-2 items-center">
                        <p class="themeFont text-sm">showing 10 out <span>200</span> products</p>
                        <select name=""
                            class="bg-gray-50 w-20 rounded p-1 text-sm border border-gray-200 themeFont" id="">
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="w-[50%] flex justify-end gap-2">
                        <button
                            class="bg-blue-700 text-white text-sm p-2 rounded cursor-pointer themeFont capitalize">previous</button>
                        <button
                            class="bg-blue-700 text-white text-sm p-2 rounded cursor-pointer themeFont capitalize">Next</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection
