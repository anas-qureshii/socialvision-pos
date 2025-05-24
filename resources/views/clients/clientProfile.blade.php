@extends('layout.layout')

@section('title')
    client name
@endsection

@section('content')
    <div class="w-full bg-white shadow shadow-gray-200 flex flex-col rounded p-2">
        <div class="flex w-full">
            <h6 class="p-2"><a href="/" class="text-[#1447e6] themeFont text-lg">Home</a> / <span
                    class="themeFont text-gray-400 text-lg">client name</span></h6>
        </div>
        <h2 class="themeFont text-3xl capitalize mt-4 font-semibold px-2 ">Client Profile</h2>
        <div class="w-full py-2 mt-6 border-t border-t-gray-100 flex flex-col items-center justify-center">

            <div class="w-full flex flex-wrap items-center">
              <div class="flex flex-wrap w-3/5">
                <div class="p-2 w-1/5 flex items-start">
                    <img src="{{asset('assets/profile.jpg')}}" class="w-full rounded max-w-[280px]" alt="">
                </div>
                <div class="p-2 pl-4 flex flex-col items-start gap-2 w-4/5">
                    <h2 class="themeFont text-3xl font-semibold capitalize">Muhammad usman</h2>
                    <p class="themeFont text-gray-600 text-lg">muhusam543@gmail.com</p>
                    <p class="themeFont text-gray-600 text-lg">03133000931</p>
                    <p class="themeFont text-gray-600 text-lg">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus quaerat nobis reprehenderit, aut, dolorum, voluptate sequi tempore deleniti vel doloribus explicabo adipisci quidem! Suscipit deleniti incidunt aliquam ratione error. Officia.</p>
                </div>
              </div>
               <div class="w-2/5 flex flex-col gap-2">
                <h2 class="themeFont text-center text-2xl">Monthly Transaction</h2>
                <div id="transition_type" class="w-full h-[300px]"></div>
               </div>
            </div>
            <div class="w-full flex flex-wrap items-center">
                <div class="p-2 w-3/5 flex flex-col">
                    <h6 class="themeFont text-2xl p-6 mt-2 text-black border-b border-b-gray-100">Monthy Sales🚀
                    </h6>
                    <div class="w-full min-h-[400px]  themeFont" id="barChart"></div>
                </div>
                <div class="p-2 w-2/5 flex flex-col">
                    <h6 class="themeFont text-2xl p-6 mt-2 text-black border-b border-b-gray-100">Items Purchased
                    </h6>
                    <div class="w-full min-h-[400px] themeFont" id="itemsChart"></div>
                </div>
            </div>
            <div class="w-full flex flex-col gap-1 p-1 mt-3 border-t border-gray-100">
                <div class="w-full overflow-x-auto p-2 scrollbar-thin">
                    <table class="whitespace-nowrap w-full themeFont ">
                        <thead class='bg-blue-50'>
                            <tr>
                                <th class="font-normal text-sm capitalize p-2">sno</th>
                                <th class="font-normal text-sm capitalize p-2">order-id</th>
                                <th class="font-normal text-sm capitalize p-2">User</th>
                                <th class="font-normal text-sm capitalize p-2">items</th>
                                <th class="font-normal text-sm capitalize p-2">credit/debit</th>
                                <th class="font-normal text-sm capitalize p-2">deposit Amount</th>
                                <th class="font-normal text-sm capitalize p-2">Bill</th>
                                <th class="font-normal text-sm capitalize p-2">publish Date</th>
                                <th class="font-normal text-sm capitalize p-2">Action</th>
                            </tr>
                        </thead>
                        <tbody class='text-gray-500'>
                            <tr class="border-b border-b-gray-50">
                                <td class="p-2 text-lg text-center">1</td>
                                <td class="p-2 text-sm text-center">#tdx-1001</td>
                                <td class="p-2 text-sm text-center">Muhammad Younus911</td>
                                <td class="p-2 text-sm">
                                    <div class="flex flex-col gap-1">
                                        <p class='themeFont block'>Shanty Cotton Seat x <span>1</span> </p>
                                        <p class='themeFont block'>main door locks shinny x <span>3</span> </p>
                                    </div>
                                </td>
                                <td class="p-2 text-sm"><span
                                        class='flex items-center justify-center p-2 bg-green-100 text-green-500'>Debit</span>
                                </td>
                                <td class="p-2 text-sm">40000pkr</td>
                                <td class="p-2 text-sm">38 000pkr</td>
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
                                            class="w-8 h-8 flex justify-center items-center bg-red-100 text-red-400 rounded cursor-pointer">
                                            <span class="material-icons material-symbols-outlined">
                                                print
                                            </span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-b-gray-50">
                                <td class="p-2 text-lg text-center">1</td>
                                <td class="p-2 text-sm text-center">#tdx-1001</td>
                                <td class="p-2 text-sm text-center">Muhammad Younus911</td>
                                <td class="p-2 text-sm">
                                    <div class="flex flex-col gap-1">
                                        <p class='themeFont block'>Shanty Cotton Seat x <span>1</span> </p>
                                        <p class='themeFont block'>main door locks shinny x <span>3</span> </p>
                                    </div>
                                </td>
                                <td class="p-2 text-sm"><span
                                        class='flex items-center justify-center p-2 bg-green-100 text-green-500'>Debit</span>
                                </td>
                                <td class="p-2 text-sm">40000pkr</td>
                                <td class="p-2 text-sm">38 000pkr</td>
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
                                            class="w-8 h-8 flex justify-center items-center bg-red-100 text-red-400 rounded cursor-pointer">
                                            <span class="material-icons material-symbols-outlined">
                                                print
                                            </span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-b-gray-50">
                                <td class="p-2 text-lg text-center">1</td>
                                <td class="p-2 text-sm text-center">#tdx-1001</td>
                                <td class="p-2 text-sm text-center">Muhammad Younus911</td>
                                <td class="p-2 text-sm">
                                    <div class="flex flex-col gap-1">
                                        <p class='themeFont block'>Shanty Cotton Seat x <span>1</span> </p>
                                        <p class='themeFont block'>main door locks shinny x <span>3</span> </p>
                                    </div>
                                </td>
                                <td class="p-2 text-sm"><span
                                        class='flex items-center justify-center p-2 bg-green-100 text-green-500'>Debit</span>
                                </td>
                                <td class="p-2 text-sm">40000pkr</td>
                                <td class="p-2 text-sm">38 000pkr</td>
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
                                            class="w-8 h-8 flex justify-center items-center bg-red-100 text-red-400 rounded cursor-pointer">
                                            <span class="material-icons material-symbols-outlined">
                                                print
                                            </span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-b-gray-50">
                                <td class="p-2 text-lg text-center">1</td>
                                <td class="p-2 text-sm text-center">#tdx-1001</td>
                                <td class="p-2 text-sm text-center">Muhammad Younus911</td>
                                <td class="p-2 text-sm">
                                    <div class="flex flex-col gap-1">
                                        <p class='themeFont block'>Shanty Cotton Seat x <span>1</span> </p>
                                        <p class='themeFont block'>main door locks shinny x <span>3</span> </p>
                                    </div>
                                </td>
                                <td class="p-2 text-sm"><span
                                        class='flex items-center justify-center p-2 bg-green-100 text-green-500'>Debit</span>
                                </td>
                                <td class="p-2 text-sm">40000pkr</td>
                                <td class="p-2 text-sm">38 000pkr</td>
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
                                            class="w-8 h-8 flex justify-center items-center bg-red-100 text-red-400 rounded cursor-pointer">
                                            <span class="material-icons material-symbols-outlined">
                                                print
                                            </span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-b-gray-50">
                                <td class="p-2 text-lg text-center">1</td>
                                <td class="p-2 text-sm text-center">#tdx-1001</td>
                                <td class="p-2 text-sm text-center">Muhammad Younus911</td>
                                <td class="p-2 text-sm">
                                    <div class="flex flex-col gap-1">
                                        <p class='themeFont block'>Shanty Cotton Seat x <span>1</span> </p>
                                        <p class='themeFont block'>main door locks shinny x <span>3</span> </p>
                                    </div>
                                </td>
                                <td class="p-2 text-sm"><span
                                        class='flex items-center justify-center p-2 bg-green-100 text-green-500'>Debit</span>
                                </td>
                                <td class="p-2 text-sm">40000pkr</td>
                                <td class="p-2 text-sm">38 000pkr</td>
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
                                            class="w-8 h-8 flex justify-center items-center bg-red-100 text-red-400 rounded cursor-pointer">
                                            <span class="material-icons material-symbols-outlined">
                                                print
                                            </span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="p-2 w-full">
                    <ul class="flex space-x-2 themeFont" id="pagination"></ul>
                </div>
            </div>
        </div>
    @endsection
