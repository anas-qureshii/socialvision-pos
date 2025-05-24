<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
    {{-- <script src={{asset("js/dist/echarts.min.js")}}></script> --}}


</head>

<body>
    <div class="w-full flex flex-wrap">
        @include('Elements.sidebar')
        <div class="w-full max-w-[calc(100%-250px)] ml-[250px] duration-300 ease-in-out transition-all" id="main-wrapper">
            @include('Elements.navbar')
            <div id="main-content" class="py-4 px-10 w-full block">
                <div class="flex w-full flex-wrap justify-between ">
                    <div
                        class="w-[24%] bg-white rounded-lg flex flex-wrap items-center justify-between p-4 shadow-md shadow-gray-100">
                        <div class="w-1/5 flex items-center justify-center">
                            <span
                                class="material-icons material-icons-outlined w-10 h-10 !flex items-center justify-center bg-blue-100 text-blue-700  rounded-full">
                                credit_card
                            </span>
                        </div>
                        <div class="w-4/5 flex flex-col gap-1 pl-3">
                            <h2 class="text-xl themeFont font-semibold">170000+</h2>
                            <span class="text-sm text-gray-300 themeFont capitalize">Earnings</span>
                        </div>
                    </div>
                    <div
                        class="w-[24%] bg-white rounded-lg flex flex-wrap items-center justify-between p-4 shadow-md shadow-gray-100">
                        <div class="w-1/5 flex items-center justify-center">
                            <span
                                class="material-icons material-symbols-rounded w-10 h-10 !flex items-center justify-center bg-orange-100 text-orange-700 rounded-full">
                                box
                            </span>
                        </div>
                        <div class="w-4/5 flex flex-col gap-1 pl-3">
                            <h2 class="text-xl themeFont font-semibold">88+</h2>
                            <span class="text-sm text-gray-300 themeFont capitalize">total products</span>
                        </div>
                    </div>
                    <div
                        class="w-[24%] bg-white rounded-lg flex flex-wrap items-center justify-between p-4 shadow-md shadow-gray-100">
                        <div class="w-1/5 flex items-center justify-center">
                            <span
                                class="material-icons material-icons-outlined w-10 h-10 !flex items-center justify-center bg-blue-700 text-white rounded-full">
                                person
                            </span>
                        </div>
                        <div class="w-4/5 flex flex-col gap-1 pl-3">
                            <h2 class="text-xl themeFont font-semibold">43+</h2>
                            <span class="text-sm text-gray-300 themeFont capitalize">Total client</span>
                        </div>
                    </div>
                    <div
                        class="w-[24%] bg-white rounded-lg flex flex-wrap items-center justify-between p-4 shadow-md shadow-gray-100">
                        <div class="w-1/5 flex items-center justify-center">
                            <span
                                class="material-icons material-icons-outlined w-10 h-10 !flex items-center justify-center bg-green-100 text-green-700 rounded-full">
                                request_quote
                            </span>
                        </div>
                        <div class="w-4/5 flex flex-col gap-1 pl-3">
                            <h2 class="text-xl themeFont font-semibold">30000+</h2>
                            <span class="text-sm text-gray-300 themeFont capitalize">Credited amount</span>
                        </div>
                    </div>
                </div>
                <div class="w-full flex mt-6 flex-wrap justify-between">
                    <div class="w-[68%] flex flex-col gap-1  bg-white rounded-lg shadow shadow-gray-200">
                        <h6 class="themeFont text-2xl p-6 mt-2 text-black border-b border-b-gray-100">Monthy Sales🚀
                        </h6>
                        <div class="w-full min-h-[400px]  themeFont" id="barChart"></div>
                    </div>
                    <div class="w-[30%] flex flex-col gap-2 bg-white rounded-lg shadow shadow-gray-200">
                        <h6 class="themeFont text-2xl p-6 mt-2 text-black border-b border-b-gray-100">Credit/Debit
                            Data💸</h6>
                        {{-- <div  class="w-full h-min-[400px] h-[400px]" id="fullDonutChart"></div> --}}
                        <div id="pieChart" style="height:300px"></div>


                    </div>
                </div>
                <div class="w-full flex mt-6 flex-wrap justify-between bg-white shadow shadow-gray-100 rounded-lg p-4">
                    <div class="w-[68%] flex flex-col gap-1">
                        <div class="w-full overflow-x-auto p-2">
                            <table class="whitespace-nowrap w-full themeFont ">
                                <thead class='bg-blue-50'>
                                    <tr>
                                        <th class="font-normal text-sm capitalize p-2">sno</th>
                                        <th class="font-normal text-sm capitalize p-2">Image</th>
                                        <th class="font-normal text-sm capitalize p-2">Name</th>
                                        <th class="font-normal text-sm capitalize p-2">category</th>
                                        <th class="font-normal text-sm capitalize p-2">in stock</th>
                                        <th class="font-normal text-sm capitalize p-2">price</th>
                                        <th class="font-normal text-sm capitalize p-2">publish Date</th>
                                        <th class="font-normal text-sm capitalize p-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody class='text-gray-500'>
                                    <tr class="border-b border-b-gray-50">
                                        <td class="p-2 text-lg text-center">1</td>
                                        <td class="p-2 text-sm"><img src="{{ asset('assets/products/p-1.webp') }}"
                                                class="w-12 h-12 flex object-contain" alt="product-image-01"></td>
                                        <td class="p-2 text-sm">Shanty Cotton Seat</td>
                                        <td class="p-2 text-sm">hardware</td>
                                        <td class="p-2 text-sm">768</td>
                                        <td class="p-2 text-sm">1000pkr</td>
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
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-b-gray-50">
                                        <td class="p-2 text-lg text-center">2</td>
                                        <td class="p-2 text-sm"><img src="{{ asset('assets/products/p-2.webp') }}"
                                                class="w-12 h-12 flex object-contain" alt="product-image-01"></td>
                                        <td class="p-2 text-sm">Shanty Cotton Seat</td>
                                        <td class="p-2 text-sm">hardware</td>
                                        <td class="p-2 text-sm">768</td>
                                        <td class="p-2 text-sm">1000pkr</td>
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
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-b-gray-50">
                                        <td class="p-2 text-lg text-center">3</td>
                                        <td class="p-2 text-sm"><img src="{{ asset('assets/products/p-3.webp') }}"
                                                class="w-12 h-12 flex object-contain" alt="product-image-01"></td>
                                        <td class="p-2 text-sm">Shanty Cotton Seat</td>
                                        <td class="p-2 text-sm">hardware</td>
                                        <td class="p-2 text-sm">768</td>
                                        <td class="p-2 text-sm">1000pkr</td>
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
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-b-gray-50">
                                        <td class="p-2 text-lg text-center">4</td>
                                        <td class="p-2 text-sm"><img src="{{ asset('assets/products/p-4.webp') }}"
                                                class="w-12 h-12 flex object-contain" alt="product-image-01"></td>
                                        <td class="p-2 text-sm">Shanty Cotton Seat</td>
                                        <td class="p-2 text-sm">hardware</td>
                                        <td class="p-2 text-sm">768</td>
                                        <td class="p-2 text-sm">1000pkr</td>
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
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-b-gray-50">
                                        <td class="p-2 text-lg text-center">5</td>
                                        <td class="p-2 text-sm"><img src="{{ asset('assets/products/p-5.webp') }}"
                                                class="w-12 h-12 flex object-contain" alt="product-image-01"></td>
                                        <td class="p-2 text-sm">Shanty Cotton Seat</td>
                                        <td class="p-2 text-sm">hardware</td>
                                        <td class="p-2 text-sm">768</td>
                                        <td class="p-2 text-sm">1000pkr</td>
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
                                    class="bg-gray-50 w-20 rounded p-1 text-sm border border-gray-200 themeFont"
                                    id="">
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
                    <div class="w-[30%] flex flex-col gap-1 p-1 border-l border-l-gray-100">
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
            </div>
            @include('Elements.footer')
        </div>
    </div>

    <script src={{ asset('js/c-charts.js') }}></script>
    <script src={{ asset('js/development.js') }}></script>
   
    
</body>

</html>
