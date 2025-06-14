@extends('layout.layout')

@section('title')
    Generate Bill
@endsection

@section('content')
    <div class="w-full bg-white shadow shadow-gray-200 flex flex-col rounded p-2">
        <div class="flex w-full">
            <h6 class="p-2"><a href="/" class="text-[#1447e6] themeFont text-lg">Home</a> / <span
                    class="themeFont text-gray-400 text-lg">Bill</span></h6>
        </div>
        <h2 class="themeFont text-3xl capitalize mt-4 font-semibold px-2 ">Generate Bill</h2>
        <div class="w-full py-6 mt-6 border-t border-t-gray-100 flex flex-wrap justify-between">

            <div class="w-[60%] flex flex-col gap-4">
                <div class="w-full flex flex-wrap justify-between mt-2 px-4 ">
                    <button
                        class="w-full rounded border border-blue-600 p-4 flex items-center bg-blue-100 themeFont capitalize cursor-pointer"
                        id="selectUser">
                        select users
                    </button>

                    <div class="w-full px-4 relative">
                        <div class="w-full  flex-col gap-2 absolute bg-white rounded overflow-hidden top-[5px] left-0 p-2 z-12 hidden"
                            id="cus_inp">
                            <div class="w-full flex">
                                <input type="search" name="" placeholder="Search Users Here"
                                    class="w-full rounded border border-blue-600 p-4 flex items-center bg-blue-100 themeFont capitalize"
                                    id="">
                            </div>
                            <div class="w-full flex flex-col gap-2 max-h-[190px] overflow-x-auto">

                                @for ($xy = 0; $xy < 4; $xy++)
                                    <button
                                        class="w-full rounded border border-blue-600 p-4 flex items-center bg-blue-100 themeFont capitalize cursor-pointer gap-2 hover:bg-blue-700 hover:text-white">Muhammad
                                        Furqan <span class="text-[10px] themeFont">(03133889331)</span></button>
                                @endfor

                            </div>

                        </div>
                    </div>

                    {{-- select users here --}}

                    <div class="w-full bg-blue-700 rounded text-white p-4 flex mt-2 pr-10 relative">
                        <h2 class="themeFont">Muhammad Anas</h2>
                        <button
                            class="w-6 h-6 bg-red-500 rounded material-icons material-symbols-rounded !text-[16px] cursor-pointer absolute top-[50%] -translate-y-1/2 right-2">close</button>
                    </div>

                </div>
                <div class="w-full flex flex-wrap justify-between mt-2 px-4">
                    <div
                        class="w-full rounded border border-blue-600 px-4 py-2 bg-blue-100 themeFont flex items-center justify-between">
                        <span>Add items</span>
                        <button class="px-3 py-2 rounded bg-blue-700 text-white cursor-pointer" id="addItems">Add</button>

                    </div>

                </div>
                <div class="w-full flex flex-wrap justify-between mt-2 px-4 ">
                    <input type="text" placeholder="Amount Deposit"
                        class="w-full rounded border border-blue-600 p-4 flex items-center bg-blue-100 themeFont capitalize">
                </div>
                <div class="w-full flex flex-wrap justify-between mt-2 px-4 ">
                    <input type="text" placeholder="Order discount in %"
                        class="w-full rounded border border-blue-600 p-4 flex items-center bg-blue-100 themeFont capitalize">
                </div>
                <div class="w-full flex flex-wrap justify-between mt-2 px-4 ">
                    <select name="" id="parent_category"
                        class='w-full p-4  bg-blue-100 rounded themeFont text-gray-600 border border-transparent outline-0 text-lg focus:border-[#1447e6]'>
                        <option value="">payment options</option>
                        <option value="category">on Cash</option>
                        <option value="category">on Credit</option>
                        <option value="category">on Debit</option>
                    </select>
                </div>
                <div class="w-full flex flex-wrap justify-between mt-2 px-4 ">
                    <select name="" id="parent_category"
                        class='w-full p-4  bg-blue-100 rounded themeFont text-gray-600 border border-transparent outline-0 text-lg focus:border-[#1447e6]'>
                        <option value="">Remaining</option>
                        <option value="category">Return</option>
                        <option value="category">Debit</option>
                    </select>
                </div>
                <div class="w-full p-2">
                    <button class="px-3 py-4 bg-blue-700 text-white themeFont rounded">
                        Generate Bill
                    </button>
                </div>
            </div>

            <div class="w-[39%] flex flex-col ">
                <div class="w-full px-2 py-3 rounded bg-gray-100">
                    <h2 class="themeFont text-3xl font-semibold capitalize pb-3 border-b border-dashed border-gray-200">Bill
                        summary</h2>
                    <div class="flex flex-col gap-2 py-3 border-b border-dashed border-gray-200">
                        <h4 class="themeFont mt-2 text-xl"> <b>Name :</b> Muhammad Furqan</h4>
                        <h4 class="themeFont"><b>Phone :</b> 03133889331</h4>
                        <h4 class="themeFont"><b>Email :</b> furqanahmed@gmail.com</h4>
                    </div>

                    <div class="flex flex-col w-full mt-4 gap-2">

                        @for ($x = 0; $x < 1; $x++)
                            <div class="w-full flex flex-wrap py-2 border-b border-dashed border-gray-300">
                                <div class="w-[68%] flex items-center">
                                    <h2 class="themeFont text-lg">Top digitals locks for rooms <b class="text-gray-500"> x
                                            3</b> </h2>
                                </div>
                                <div class="w-[30%] flex justify-center">
                                    <h2 class="font-semibold themeFont text-lg">7700.Rs</h2>
                                </div>
                            </div>
                        @endfor


                    </div>

                    <div class="w-full flex flex-col gap-2 mt-6">
                        <div class="w-full flex flex-wrap py-2 border-b border-dashed border-gray-300">
                            <div class="w-[68%] flex items-center">
                                <h2 class="themeFont text-lg font-bold">Subtotal</h2>
                            </div>
                            <div class="w-[30%] flex justify-center">
                                <h2 class="font-semibold themeFont text-lg">7700.Rs</h2>
                            </div>
                        </div>
                        <div class="w-full flex flex-wrap py-2 border-b border-dashed border-gray-300">
                            <div class="w-[68%] flex items-center">
                                <h2 class="themeFont text-lg font-bold">Discount (%)</h2>
                            </div>
                            <div class="w-[30%] flex justify-center">
                                <h2 class="font-semibold themeFont text-lg">5%</h2>
                            </div>
                        </div>
                        <div class="w-full flex flex-wrap py-2 border-b border-dashed border-gray-300">
                            <div class="w-[68%] flex items-center">
                                <h2 class="themeFont text-lg font-bold">Tax.(Vat)</h2>
                            </div>
                            <div class="w-[30%] flex justify-center">
                                <h2 class="font-semibold themeFont text-lg">0</h2>
                            </div>
                        </div>
                        <div class="w-full flex flex-wrap py-2 border-b border-dashed border-gray-300">
                            <div class="w-[68%] flex items-center">
                                <h2 class="themeFont text-lg font-bold">Total</h2>
                            </div>
                            <div class="w-[30%] flex justify-center">
                                <h2 class="font-semibold themeFont text-lg">21000.Rs</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    @endsection

    @section('popup')
        <div class="bg-black opacity-20 fixed top-0 left-0 z-10 w-full h-screen  hidden" id="overlay"></div>

        <div class="w-[800px] max-h-[90vh] bg-white flex flex-col gap-4 rounded-lg p-4 z-12 fixed top-1/2 left-1/2 -translate-1/2 overflow-y-auto hidden"
            id="items_area">
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
    @endsection

    {{-- 
    @push('scripts')
    <script>
        window.addEventListener('load', () => {
            console.log(document.getElementById('selectUser'))
           if(document.getElementById('selectUser')){
            let selUser = document.getElementById('selectUser');
            let inp = document.getElementById('cus_inp');
            let overlay = document.getElementById('overlay');
            selUser.addEventListener('click',()=>{ 
                console.log("hello")
                overlay.classList.toggle('hidden')
                setTimeout(() => {
                    inp.classList.toggle('hidden')
                    
                }, 50);
            })
            overlay.addEventListener('click',()=>{ 
                inp.classList.toggle('hidden')
                setTimeout(() => {
                    overlay.classList.toggle('hidden')
                    
                }, 50);
            })
           }
           if(document.getElementById('addItems')){
            let addItems = document.getElementById('addItems');
            let itemsArea = document.getElementById('items_area');
            addItems.addEventListener('click',()=>{
                overlay.classList.toggle('hidden')
                setTimeout(()=>{
                    itemsArea.classList.toggle('hidden')
                },50)
            })
           
           }
        });
    </script>
    @endpush --}}
