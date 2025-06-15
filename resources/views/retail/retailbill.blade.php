@extends('layout.layout')

@section('title')
    Generate Retail Bill
@endsection

@section('content')
    <div class="w-full  flex flex-col rounded p-2">
        {{-- breadcrumbs --}}
        <div class="flex w-full">
            <h6 class="p-2"><a href="/" class="text-[#1447e6] themeFont text-lg">Home</a> / <span
                    class="themeFont text-gray-400 text-lg">Retail Bill</span></h6>

        </div>
        {{-- page heading --}}
        <h2 class="themeFont text-3xl capitalize mt-4 font-semibold px-2 ">Create Bill</h2>
        {{-- breadcrumbs ends here --}}
        <form class="w-full py-6 mt-1 border-t border-t-gray-100 flex flex-col items-center justify-center" method="POST"
            action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Customer Information Card -->
            <div class="w-full flex flex-col rounded bg-white shadow shadow-gray-200 overflow-hidden">
                <div class="w-full bg-[#f8f9fa] px-4 py-8">
                    <h3 class="themeFont text-lg capitalize">Customer Information</h3>
                </div>
                <div class="w-full bg-white p-3">
                    <div class="w-full flex flex-wrap ">
                        <div class="w-[33%] flex flex-col gap-1 p-1">
                            <label class="block text-sm font-medium text-gray-700 themeFont">Customer Name <span
                                    class="text-red-500">*</span></label>
                            <input type="text"
                                class="mt-1 w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none  focus:border-[#1447e6]"
                                id="customerName" value="John Smith" placeholder="Enter customer name" />
                        </div>
                        <div class="w-[33%] flex flex-col gap-1 p-1">
                            <label class="block text-sm font-medium text-gray-700 themeFont">Customer Phone <span
                                    class="text-red-500">*</span></label>
                            <input type="tel"
                                class="mt-1 w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none  focus:border-[#1447e6]"
                                id="customerPhone" value="+1 (555) 123-4567" placeholder="Enter phone number" />
                        </div>
                        <div class="w-[33%] flex flex-col gap-1 p-1">
                            <label class="block text-sm font-medium text-gray-700 themeFont">Customer Email</label>
                            <input type="email"
                                class="mt-1 w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none  focus:border-[#1447e6]"
                                id="customerEmail" value="john.smith@email.com" placeholder="Enter email address" />
                        </div>
                        <div class="w-[33%] flex flex-col gap-1 p-1">
                            <label class="block text-sm font-medium text-gray-700 themeFont">Bill Date <span
                                    class="text-red-500">*</span></label>
                            <input type="date"
                                class="mt-1 w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none  focus:border-[#1447e6]"
                                id="billDate" />
                        </div>
                        <div class="w-[33%] flex flex-col gap-1 p-1">
                            <label class="block text-sm font-medium text-gray-700 themeFont">Discount (%)</label>
                            <input type="number"
                                class="mt-1 w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none  focus:border-[#1447e6]"
                                id="discount" value="10" placeholder="0" min="0" max="100"
                                step="0.01" />
                        </div>
                        <div class="w-[33%] flex flex-col gap-1 p-1">
                            <label class="block text-sm font-medium text-gray-700 themeFont">Amount Deposited</label>
                            <input type="number"
                                class="mt-1 w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none  focus:border-[#1447e6]"
                                id="amountDeposited" value="500" placeholder="0.00" min="0" step="0.01" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Items Card -->
            <div class="w-full flex flex-col rounded bg-white shadow shadow-gray-200 overflow-hidden mt-4">
                <div class="w-full bg-gray-100 p-4">
                    <h3 class="themeFont text-lg capitalize">Bill Items</h3>
                </div>

                <div class="w-full flex flex-col">
                    <div class="w-full flex justify-between items-center p-4">
                        <h2 class="themeFont text-sm  font-semibold">Add Products</h2>
                        <button type="button" id="add_items"
                            class="bg-[#1447e6] text-white p-2 rounded-md themeFont text-sm hover:bg-blue-600 ease-linear duration-200 cursor-pointer">
                            Add Item
                        </button>
                    </div>
                </div>

                <div class="w-full overflow-x-auto">
                    <table class="w-full border-collapse whitespace-nowrap">
                        <colgroup>
                            <col width='7.5%'>
                            <col width='30%'>
                            <col width='10%'>
                            <col width='12.5%'>
                            <col width='12.5%'>
                            <col width='12.5%'>
                            <col width='15%'>
                        </colgroup>
                        <thead class="themeFont text-sm bg-[#f8f9fa] !p-2 w-full">
                            <tr class="border-y border-gray-200">
                                <th class="font-semibold px-2 py-3">Sno</th>
                                <th class="font-semibold px-2 py-3">Title</th>
                                <th class="font-semibold px-2 py-3 text-left">Qty</th>
                                <th class="font-semibold px-2 py-3 text-left">Price</th>
                                <th class="font-semibold px-2 py-3 text-left">Custom Price</th>
                                <th class="font-semibold px-2 py-3 text-left">Total</th>
                                <th class="font-semibold px-2 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 3; $i++)
                                <tr>
                                    <td class="themeFont px-2 py-3 text-center">{{ $i + 1 }}</td>
                                    <td class="themeFont px-2 py-3">Wireless Bluetooth Headphones</td>
                                    <td class="themeFont px-2 py-3">{{ ($i + 1) * 2 }}</td>
                                    <td class="themeFont px-2 py-3">Rs.2,499</td>
                                    <td class="themeFont px-2 py-3">-</td>
                                    <td class="themeFont px-2 py-3">Rs.4,998</td>
                                    <td class="themeFont px-2 py-3">
                                        <div class="w-full flex items-center gap-2 px-2 py-1">
                                            <button
                                                class="bg-orange-500 text-white px-2 py-1 text-sm themeFont rounded cursor-pointer"
                                                type="button">
                                                Edit
                                            </button>
                                            <button
                                                class="bg-red-600 text-white px-2 py-1 text-sm themeFont rounded cursor-pointer"
                                                type="button">
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="w-full flex flex-wrap justify-between py-3 mt-2">
                <div class="w-2/5 flex items-start ">
                    <button class="bg-blue-700 text-white text-lg font-semibold px-6 py-4 rounded cursor-pointer"
                        type="button">🧾Generate Bill</button>
                </div>
                <div class="w-1/4 bg-white flex flex-col gap-5 p-4 shadow shadow-gray-200 border border-gray-300 rounded">
                    <p class="text-[16px] themeFont flex w-full m-0 justify-between text-gray-400">
                        <span>Subtotal</span>
                        <span class="font-semibold ">Rs.10,499</span>
                    </p>
                    <p class="text-[16px] themeFont flex w-full m-0 justify-between text-gray-400">
                        <span>Discount</span>
                        <span class="font-semibold ">Rs.899</span>
                    </p>
                    <hr class="text-gray-300">
                    <p class="text-[16px] themeFont flex w-full m-0 justify-between text-gray-400">
                        <span class="font-semibold">Total Amount</span>
                        <span class="font-semibold text-black">Rs.899</span>
                    </p>
                </div>
            </div>

            {{-- <div class="w-full flex justify-end mt-4 p-4">
                <button
                    class="bg-[#1447e6] text-white p-2 px-4 rounded-md themeFont text-lg hover:bg-blue-700 ease-linear duration-200 cursor-pointer"
                    type="submit">Generate
                    Bill</button>
            </div> --}}


        </form>



    </div>
@section('popup')
    <div class="w-full fixed top-0 left-0 h-screen bg-black/25 flex items-center justify-center z-100 overflow-hidden hidden"
        id="items_pop">
        <div class="w-[1000px] max-h-[90vh] bg-white flex flex-col gap-4 rounded-lg p-4 overflow-y-auto relative">

            {{-- close btn here --}}

            <a href="javascript:void(0)" parent-id='items_pop'
                class="close-btn w-6 h-6 bg-red-600 text-white absolute top-6 
                right-6 -translate-y-1/2 translate-x-1/2 z-11 rounded-full flex items-center  justify-center">
                <span class="material-icons material-symbols-rounded !text-[14px]"> close </span>
            </a>
            {{-- close btn ends here and heading start here --}}
            <h4
                class="themeFont text-2xl font-semibold sticky top-0 bg-white z-10 w-full flex justify-between items-center">
                Add Products

            </h4>
            {{--  heading ends here --}}
            <div class="w-full flex flex-col gap-1" id="search__inp__parent">
                <input type="search"
                    class="w-full p-4 rounded themeFont text-gray-600 border border-gray-200 focus:border-[#1447e6] outline-0"
                    name="" id="search__product__inp" placeholder="Search for products...">
                <div class="hidden p-3 mb-2 mt-1 text-[12px] themeFont text-yellow-600 rounded bg-yellow-100 dark:bg-gray-800 dark:text-yellow-300"
                    role="alert" id="search__error_alert">
                    search query must contains more than 3 letters .
                </div>
                <div class="hidden p-4 mb-4 text-sm text-green-800 rounded-lg duration-500 ease-linear bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert" id="search__success_alert">
                     
                </div>
            </div>
            <input type="hidden" name="">
            <div class="flex flex-col w-full gap-2 items-center">






                {{-- loader here --}}

                <div class="w-full flex items-center justify-center py-6 hidden" id="search_loader">
                    <div class="w-6 h-6 border-4 border-t-[#1447e6] border-gray-200 rounded-full animate-spin">
                    </div>
                </div>

                {{-- loader ends here --}}

                <div class="w-full overflow-x-auto rounded-lg border border-gray-200 hidden" id="search_results_table">
                    <table class="min-w-full divide-y divide-gray-200 whitespace-nowrap">
                        <thead class="bg-gray-50 themeFont">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Sno
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Product
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    In Stock
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Quantity
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Price
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Options
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 themeFont" id="search_results_body">

                            <!-- Sample product row (similar to your image) -->
                            @for ($i = 0; $i < 0; $i++)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $i + 1 }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">Shanty Cotton Seat</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">simple</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        768
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <input type="text"
                                            class="outline-none border border-gray-200 focus:border-[#1447e6] p-2 text-sm themeFont w-12">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" id="p-price">
                                        1000pkr
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="options flex flex-wrap gap-1">
                                            -
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            <button type="button" p-type='simple' product-id='1'
                                                class="sel-p-btn bg-[#1447e6] text-white p-2 rounded-md 
                                                themeFont text-sm hover:bg-blue-600 ease-linear 
                                                duration-200 cursor-pointer select-billing-product flex gap-1 items-center">
                                                <div
                                                    class="w-3 h-3 border-2 border-dashed rounded-full animate-spin border-white hidden">
                                                </div>
                                                select
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                            <!-- Additional product rows would be here -->
                        </tbody>
                    </table>
                </div>


                {{-- table ends here --}}

            </div>
        </div>
    </div>

    {{-- nested popup here --}}

    <div class="w-full fixed top-0 left-0 h-screen bg-black/10 flex items-center justify-center z-110 overflow-hidden hidden"
        id="nested_popup">
        <div class="w-[400px] max-h-[40vh] bg-white flex flex-col gap-4 rounded-lg p-4 overflow-y-auto relative">
            <a href="javascript:void(0)" parent-id='nested_popup'
                class="close-btn w-6 h-6 bg-red-600 text-white absolute top-6 
                right-6 -translate-y-1/2 translate-x-1/2 z-11 rounded-full flex items-center  justify-center">
                <span class="material-icons material-symbols-rounded !text-[14px]"> close </span>
            </a>
            <h2>Hello</h2>


        </div>
    </div>
    </div>
@endsection

@endsection



@push('scripts')
<script src="{{ asset('js/billing.js') }}"></script>
@endpush
