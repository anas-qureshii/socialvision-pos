@extends('layout.layout')

@section('title')
    Clients
@endsection


@section('content')
    <div class="w-full bg-white shadow shadow-gray-200 flex flex-col rounded p-2">
        <div class="flex w-full">
            <h6 class="p-2"><a href="/" class="text-[#1447e6] themeFont text-lg">Home</a> / <span
                    class="themeFont text-gray-400 text-lg">clients</span></h6>
        </div>
        <h2 class="themeFont text-3xl capitalize mt-4 font-semibold px-2 ">clients</h2>
        <div class="w-full py-6 mt-6 border-t border-t-gray-100 flex items-center justify-center">
            <div class="w-full flex flex-col gap-1">
                <div class="w-full overflow-x-auto p-2">
                    <table class="whitespace-nowrap w-full themeFont ">
                        <thead class='bg-blue-50'>
                            <tr>
                                <th class="font-normal text-sm capitalize px-2 py-4">sno</th>
                                <th class="font-normal text-sm capitalize px-2 py-4 text-left">Image</th>
                                <th class="font-normal text-sm capitalize px-2 py-4 text-left">Name</th>
                                <th class="font-normal text-sm capitalize px-2 py-4 text-left">Credit Amount</th>
                                <th class="font-normal text-sm capitalize px-2 py-4 text-left">Balance</th>
                                <th class="font-normal text-sm capitalize px-2 py-4 text-left">Total Purchasing</th>
                                <th class="font-normal text-sm capitalize px-2 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody class='text-gray-500'>
                          @for ($i = 0;$i < 10;$i++)
                          <tr class="border-b border-b-gray-200 py-1 border-dashed">
                            <td class="px-2 py-4 text-lg text-center">{{$i + 1}}</td>
                            <td class="px-2 py-4 text-sm"><img src="{{ asset('assets/avatar.png') }}"
                                    class="w-9 h-9 flex object-contain rounded-full" alt="product-image-01"></td>
                            <td class="px-2 py-4 text-sm">Doors Locks</td>
                            <td class="px-2 py-4 text-sm text-red-300">10000</td>
                            <td class="px-2 py-4 text-sm text-blue-400">0</td>
                            <td class="px-2 py-4 text-sm">111100</td>
                            <td class="px-2 py-4 text-sm">
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
                          @endfor
                         
                      
                         
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
                        {{-- <button
                            class="bg-blue-700 text-white text-sm p-2 rounded cursor-pointer themeFont capitalize">previous</button>
                        <button
                            class="bg-blue-700 text-white text-sm p-2 rounded cursor-pointer themeFont capitalize">Next</button> --}}

                            <ul class="flex space-x-2 themeFont" id="pagination"></ul>
                    </div>
                </div>
            </div>
        </div>
    @endsection
