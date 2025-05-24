@extends('layout.layout')

@section('title')
    Generate Retail Bill
@endsection

@section('content')
    <div class="w-full bg-white shadow shadow-gray-200 flex flex-col rounded p-2">
        {{-- breadcrumbs --}}
        <div class="flex w-full">
            <h6 class="p-2"><a href="/" class="text-[#1447e6] themeFont text-lg">Home</a> / <span
                    class="themeFont text-gray-400 text-lg">Retail Bill</span></h6>
        </div>
        {{-- breadcrumbs ends here --}}

        {{-- page heading --}}
        <h2 class="themeFont text-3xl capitalize mt-4 font-semibold px-2 ">Generate Bill For Users</h2>

        <form class="w-full py-6 mt-6 border-t border-t-gray-100 flex flex-col items-center justify-center" method="POST"
            action="{{ route('product.store') }}" enctype="multipart/form-data">

            <div class="w-full flex flex-wrap justify-between mt-2 px-4">
                <div class="w-[49%] rounded overflow-hidden relative">
                    <input type="text"
                        class="w-full p-2 pt-8 bg-blue-100 rounded themeFont text-gray-600 border border-transparent outline-0 focus:border-[#1447e6] peer"
                        id="customer_name">
                    <label for="customer_name"
                        class="text-gray-700 text-lg themeFont absolute top-5  ease duration-300 left-3 z-10 peer-focus:text-sm peer-focus:top-2 peer-focus:text-blue-500">Customer
                        Name
                    </label>
                </div>
                <div class="w-[49%] rounded overflow-hidden relative">
                    <input type="text"
                        class="w-full p-2 pt-8 bg-blue-100 rounded themeFont text-gray-600 border border-transparent outline-0 focus:border-[#1447e6] peer"
                        id="phone">
                    <label for="phone"
                        class="text-gray-700 text-lg themeFont absolute top-5  ease duration-300 left-3 z-10 peer-focus:text-sm peer-focus:top-2 peer-focus:text-blue-500">Customer
                        Phone</label>
                </div>
            </div>

            <div class="w-full flex flex-wrap justify-between mt-8 px-4">
                <div class="w-[49%] rounded overflow-hidden relative">
                    <input type="text"
                        class="w-full p-2 pt-8 bg-blue-100 rounded themeFont text-gray-600 border border-transparent outline-0 focus:border-[#1447e6] peer"
                        id="email">
                    <label for="email"
                        class="text-gray-700 text-lg themeFont absolute top-5  ease duration-300 left-3 z-10 peer-focus:text-sm peer-focus:top-2 peer-focus:text-blue-500">Customer
                        Email

                    </label>
                </div>
                <div class="w-[49%] rounded overflow-hidden relative ">
                    <input type="date"
                        class="w-full p-2 pt-8 bg-blue-100 rounded themeFont text-gray-600 border border-transparent outline-0 focus:border-[#1447e6] peer"
                        id="bill_date">
                </div>
            </div>
            <div class="w-full flex flex-wrap justify-between mt-8 px-4">
                <div class="w-[49%] rounded overflow-hidden relative">
                    <input type="text"
                        class="w-full p-2 pt-8 bg-blue-100 rounded themeFont text-gray-600 border border-transparent outline-0 focus:border-[#1447e6] peer"
                        id="discount">
                    <label for="discount"
                        class="text-gray-700 text-lg themeFont absolute top-5  ease duration-300 left-3 z-10 peer-focus:text-sm peer-focus:top-2 peer-focus:text-blue-500">Discount
                        in % (optional)

                    </label>
                </div>
                <div class="w-[49%] rounded overflow-hidden relative">
                    <input type="text"
                        class="w-full p-2 pt-8 bg-blue-100 rounded themeFont text-gray-600 border border-transparent outline-0 focus:border-[#1447e6] peer"
                        id="amount_deposit">
                    <label for="deposit"
                        class="text-gray-700 text-lg themeFont absolute top-5  ease duration-300 left-3 z-10 peer-focus:text-sm peer-focus:top-2 peer-focus:text-blue-500">Amount
                        Deposited (optional)

                    </label>
                </div>
            </div>

            <div class="w-full flex flex-wrap justify-between mt-8 px-4">
                <div
                    class="rounded overflow-hidden relative w-full px-3 py-4 bg-blue-100 themeFont text-gray-600 border border-[#1447e6] peer flex justify-between items-center">
                    <h2>Add Items</h2>
                    <button type="button"
                        class="bg-[#1447e6] text-white p-2 px-4 rounded-md themeFont text-lg hover:bg-blue-700 ease-linear duration-200 cursor-pointer" id="add_items">Add
                        Item</button>
                </div>
            </div>
            <div class="w-full flex flex-wrap justify-between mt-8 px-4">
                <div class="w-full overflow-x-auto">
                    <table class="whitespace-nowrap w-full themeFont">
                        <thead class='border-y border-dashed border-blue-700 py-4 bg-blue-50'>
                            <tr>
                                <th class="font-normal text-lg text-left capitalize p-2">sno</th>
                                <th class="font-normal text-lg text-left capitalize p-2">Description</th>
                                <th class="font-normal text-lg text-left capitalize p-2">Qty</th>
                                <th class="font-normal text-lg text-left capitalize p-2">Total</th>
                                <th class="font-normal text-lg text-left capitalize p-2">Action</th>
                            </tr>
                        </thead>
                        <tbody class='text-gray-500 border-b border-dashed'>
                            <tr class="">
                                <td class="p-2 text-lg ">1</td>
                                <td class="p-2 text-sm">Shanty Cotton Seat</td>
                                <td class="p-2 text-sm "><input type="text" value="4" class="w-12" disabled></td>
                                <td class="p-2 text-sm ">768</td>
                                <td class="p-2 text-sm ">
                                    <div class="flex gap-2">
                                        <button class="w-8 h-8 flex items-center justify-center bg-red-500 text-white rounded-full cursor-pointer">
                                            <span class="material-icons material-symbols-rounded !text-[20px]">
                                                close
                                            </span>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center bg-yellow-500 text-white rounded-full cursor-pointer">
                                            <span class="material-icons material-symbols-rounded !text-[20px]">
                                                edit
                                            </span>
                                            
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center bg-green-500 text-white rounded-full hidden cursor-pointer">
                                            <span class="material-icons material-symbols-rounded !text-[20px]">
                                                check
                                            </span>
                                            
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="p-2 text-lg ">2</td>
                                <td class="p-2 text-sm">Shanty Cotton Seat</td>
                                <td class="p-2 text-sm "><input type="text" value="4" class="w-12" disabled></td>
                                <td class="p-2 text-sm ">768</td>
                                <td class="p-2 text-sm ">
                                    <div class="flex gap-2">
                                        <button class="w-8 h-8 flex items-center justify-center bg-red-500 text-white rounded-full cursor-pointer">
                                            <span class="material-icons material-symbols-rounded !text-[20px]">
                                                close
                                            </span>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center bg-yellow-500 text-white rounded-full cursor-pointer">
                                            <span class="material-icons material-symbols-rounded !text-[20px]">
                                                edit
                                            </span>
                                            
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center bg-green-500 text-white rounded-full hidden cursor-pointer">
                                            <span class="material-icons material-symbols-rounded !text-[20px]">
                                                check
                                            </span>
                                            
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="p-2 text-lg ">3</td>
                                <td class="p-2 text-sm">Shanty Cotton Seat</td>
                                <td class="p-2 text-sm "><input type="text" value="4" class="w-12" disabled></td>
                                <td class="p-2 text-sm ">768</td>
                                <td class="p-2 text-sm ">
                                    <div class="flex gap-2">
                                        <button class="w-8 h-8 flex items-center justify-center bg-red-500 text-white rounded-full cursor-pointer">
                                            <span class="material-icons material-symbols-rounded !text-[20px]">
                                                close
                                            </span>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center bg-yellow-500 text-white rounded-full cursor-pointer">
                                            <span class="material-icons material-symbols-rounded !text-[20px]">
                                                edit
                                            </span>
                                            
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center bg-green-500 text-white rounded-full hidden cursor-pointer">
                                            <span class="material-icons material-symbols-rounded !text-[20px]">
                                                check
                                            </span>
                                            
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class='div w-full flex flex-col items-end mt-2'>
                    <div class='w-[320px]'>
                        <table class="whitespace-nowrap w-full">
                            <colgroup>
                                <col style="width:60%">
                                <col style="width:40%">
                            </colgroup>
                            <tbody class='text-gray-500'>
                                <tr class="border-b border-b-gray-50 themeFont">
                                    <td class="p-2  font-semibold flex justify-between">Subtotal <span>:</span></td>
                                    <td class="p-2 text-sm ">768</td>
                                </tr>
                                <tr class="border-b border-b-gray-50 themeFont">
                                    <td class="p-2   flex justify-between">Discount <span>:</span></td>
                                    <td class="p-2 text-sm ">0</td>
                                </tr>
                                <tr class="border-b border-b-gray-50 themeFont">
                                    <td class="p-2  font-bold flex justify-between">Total <span>:</span></td>
                                    <td class="p-2 text-sm ">768</td>
                                </tr>
                                <tr class="border-b border-b-gray-50 themeFont">
                                    <td class="p-2   flex justify-between">Amount Deposited <span>:</span></td>
                                    <td class="p-2 text-sm ">0</td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>


            <div class="w-full flex justify-end mt-4 p-4">
                <button
                    class="bg-[#1447e6] text-white p-2 px-4 rounded-md themeFont text-lg hover:bg-blue-700 ease-linear duration-200 cursor-pointer"
                    type="submit">Generate
                    Bill</button>
            </div>


        </form>

    @section('popup')
        <div
            class="w-full fixed top-0 left-0 h-screen bg-black/25 flex items-center justify-center z-100 overflow-hidden hidden" id="items_pop">
            <div class="w-[800px] max-h-[90vh] bg-white flex flex-col gap-4 rounded-lg p-4 overflow-y-auto">
                <h4 class="themeFont text-2xl font-semibold sticky top-0 bg-white z-10">Add Products</h4>
                <input type="search" class="w-full p-4 rounded themeFont text-gray-600 border border-[#1447e6] outline-0"
                    name="" id="" placeholder="Search for products...">
                <div class="flex flex-col w-full gap-2 items-center">
                    <div class="flex flex-wrap w-full gap-2" id="categories-filter">
                        <button
                            class="p-2 text-gray-600 bg-blue-100  text-[12px] themeFont capitalize rounded-full duration-300 cursor-pointer min-w-[100px] hover:bg-blue-700 hover:text-white">
                            wooden
                        </button>
                        <button
                            class="p-2 text-gray-600 bg-blue-100  text-[12px] themeFont capitalize rounded-full duration-300 cursor-pointer min-w-[100px] hover:bg-blue-700 hover:text-white">
                            round locks
                        </button>
                        <button
                            class="p-2 text-gray-600 bg-blue-100  text-[12px] themeFont capitalize rounded-full duration-300 cursor-pointer min-w-[100px] hover:bg-blue-700 hover:text-white">
                            steel strips
                        </button>
                        <button
                            class="p-2 text-gray-600 bg-blue-100  text-[12px] themeFont capitalize rounded-full duration-300 cursor-pointer min-w-[100px] hover:bg-blue-700 hover:text-white">
                            aluminium foils
                        </button>
                        <button
                            class="px-4 py-3 text-[14px] themeFont capitalize rounded-full cursor-pointer bg-blue-700 text-white">
                            see more
                        </button>
                    </div>
                    <div class="w-full overflow-x-auto p-2">
                        <table class="whitespace-nowrap w-full themeFont">
                            <thead class='bg-blue-50 py-4 sticky top-0'>
                                <tr>
                                    <th class="font-normal text-sm text-left capitalize p-2">sno</th>
                                    <th class="font-normal text-sm text-left capitalize p-2">Image</th>
                                    <th class="font-normal text-sm text-left capitalize p-2">Name</th>
                                    <th class="font-normal text-sm text-left capitalize p-2">in stock</th>
                                    <th class="font-normal text-sm text-left capitalize p-2">price</th>
                                    <th class="font-normal text-sm text-left capitalize p-2">specify quantity</th>
                                    <th class="font-normal text-sm text-left capitalize p-2">Action</th>
                                </tr>
                            </thead>
                            <tbody class='text-gray-500'>
                                <tr class="border-b border-b-gray-50">
                                    <td class="p-2 text-lg text-center">1</td>
                                    <td class="p-2 text-sm"><img src="{{ asset('assets/products/p-1.webp') }}"
                                            class="w-12 h-12 flex object-contain" alt="product-image-01"></td>
                                    <td class="p-2 text-sm">Shanty Cotton Seat</td>

                                    <td class="p-2 text-lg ">768</td>
                                    <td class="p-2 text-lg ">1000pkr</td>
                                    <td class="p-2 text-lg "><input type="text"
                                            class="w-full px-4 py-2 rounded themeFont text-gray-600 border text-sm border-[#1447e6] outline-0"
                                            name="" id="" placeholder="Enter quantity"></td>
                                    <td class="p-2 text-sm">
                                        <button
                                            class="p-2 text-[14px] w-[80px]  themeFont capitalize rounded-full cursor-pointer bg-blue-700 text-white">
                                            Add
                                        </button>
                                    </td>
                                </tr>
                                <tr class="border-b border-b-gray-50">
                                    <td class="p-2 text-lg text-center">2</td>
                                    <td class="p-2 text-sm"><img src="{{ asset('assets/products/p-2.webp') }}"
                                            class="w-12 h-12 flex object-contain" alt="product-image-01"></td>
                                    <td class="p-2 text-sm">Shanty Cotton Seat</td>

                                    <td class="p-2 text-lg ">768</td>
                                    <td class="p-2 text-lg ">1000pkr</td>
                                    <td class="p-2 text-lg "><input type="text"
                                            class="w-full px-4 py-2 rounded themeFont text-gray-600 border text-sm border-[#1447e6] outline-0"
                                            name="" id="" placeholder="Enter quantity"></td>
                                    <td class="p-2 text-sm">
                                        <button
                                            class="p-2 text-[14px] w-[80px]  themeFont capitalize rounded-full cursor-pointer bg-blue-700 text-white">
                                            Add
                                        </button>
                                    </td>
                                </tr>
                                <tr class="border-b border-b-gray-50">
                                    <td class="p-2 text-lg text-center">3 </td>
                                    <td class="p-2 text-sm"><img src="{{ asset('assets/products/p-3.webp') }}"
                                            class="w-12 h-12 flex object-contain" alt="product-image-01"></td>
                                    <td class="p-2 text-sm">Shanty Cotton Seat</td>

                                    <td class="p-2 text-lg ">768</td>
                                    <td class="p-2 text-lg ">1000pkr</td>
                                    <td class="p-2 text-lg "><input type="text"
                                            class="w-full px-4 py-2 rounded themeFont text-gray-600 border text-sm border-[#1447e6] outline-0"
                                            name="" id="" placeholder="Enter quantity"></td>
                                    <td class="p-2 text-sm">
                                        <button
                                            class="p-2 text-[14px] w-[80px]  themeFont capitalize rounded-full cursor-pointer bg-blue-700 text-white">
                                            Add
                                        </button>
                                    </td>
                                </tr>
                                <tr class="border-b border-b-gray-50">
                                    <td class="p-2 text-lg text-center">4</td>
                                    <td class="p-2 text-sm"><img src="{{ asset('assets/products/p-4.webp') }}"
                                            class="w-12 h-12 flex object-contain" alt="product-image-01"></td>
                                    <td class="p-2 text-sm">Shanty Cotton Seat</td>

                                    <td class="p-2 text-lg ">768</td>
                                    <td class="p-2 text-lg ">1000pkr</td>
                                    <td class="p-2 text-lg "><input type="text"
                                            class="w-full px-4 py-2 rounded themeFont text-gray-600 border text-sm border-[#1447e6] outline-0"
                                            name="" id="" placeholder="Enter quantity"></td>
                                    <td class="p-2 text-sm">
                                        <button
                                            class="p-2 text-[14px] w-[80px]  themeFont capitalize rounded-full cursor-pointer bg-blue-700 text-white">
                                            Add
                                        </button>
                                    </td>
                                </tr>
                                <tr class="border-b border-b-gray-50">
                                    <td class="p-2 text-lg text-center">5</td>
                                    <td class="p-2 text-sm"><img src="{{ asset('assets/products/p-5.webp') }}"
                                            class="w-12 h-12 flex object-contain" alt="product-image-01"></td>
                                    <td class="p-2 text-sm">Shanty Cotton Seat</td>

                                    <td class="p-2 text-lg ">768</td>
                                    <td class="p-2 text-lg ">1000pkr</td>
                                    <td class="p-2 text-lg "><input type="text"
                                            class="w-full px-4 py-2 rounded themeFont text-gray-600 border text-sm border-[#1447e6] outline-0"
                                            name="" id="" placeholder="Enter quantity"></td>
                                    <td class="p-2 text-sm">
                                        <button
                                            class="p-2 text-[14px] w-[80px]  themeFont capitalize rounded-full cursor-pointer bg-blue-700 text-white">
                                            Add
                                        </button>
                                    </td>
                                </tr>
                                <!-- Remaining table rows unchanged... -->
                                <!-- Additional rows preserved but omitted for brevity -->
                            </tbody>
                        </table>
                        <div class="flex flex-wrap justify-between p-2">
                            <div class="w-[50%] flex gap-2 items-center">
                                <p class="themeFont text-sm">showing 10 out <span>200</span> products</p>
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
            </div>
        </div>
    @endsection
    
@endsection



@push('scripts')
    <script>
        window.addEventListener('load', () => {
           if(document.getElementById('add_items')){
            let addItem = document.getElementById('add_items');
            let pop = document.getElementById('items_pop');
            addItem.addEventListener('click',()=>{ pop.classList.toggle('hidden')})
           }
        });
    </script>
@endpush