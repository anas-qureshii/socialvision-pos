<div class="w-[250px] fixed top-0 left-0 p-2 h-[100vh] duration-300 ease-in-out transition-all overflow-hidden bg-white border-r border-gray-100 flex flex-col"
    id="sidebar">
    <div class="w-full p-4 flex-shrink-0">
        <img src="{{ asset('assets/Socialz Vision logo 1-01.webp') }}" alt="logo image">
    </div>
    <div class="w-full overflow-y-auto flex-grow flex flex-col gap-2">
        <ul class="w-full p-2 flex flex-col gap-2">
            <ul class="w-full p-2 flex flex-col gap-2">
                <li class="w-full flex">
                    <a href='/'
                        class='w-full p-2 flex items-center rounded capitalize gap-2 
                        ease duration-300 text-gray-500 hover:bg-[#eaf3fd] hover:text-[#1447e6] active-class' aria-current="page">
                        <span class="material-icons material-symbols-rounded !text-[20px]">
                            grid_view
                        </span>
                        <p class="themeFont text-[14px] font-normal">Dashboard</p>
                    </a>
                </li>

                <li class="w-full flex text-gray-400 mt-2 uppercase themeFont text-sm font-semibold px-2">Billing
                </li>
                <li class="w-full flex">

                    <a href='/retail/create'
                        class='w-full p-2 flex items-center rounded capitalize gap-2 ease duration-300 text-gray-500 hover:bg-[#eaf3fd] hover:text-[#1447e6]'>
                        <span class="material-icons material-symbols-rounded !text-[20px]">
                            two_pager_store
                        </span>
                        <p class="themeFont text-[14px] font-normal">Retail Client</p>
                    </a>
                </li>
                <li class="w-full  flex flex-col gap-1">
                    <a href='javascript:void(0)'
                        class='w-full p-2 flex items-center rounded capitalize gap-2 ease duration-300 text-gray-500 pr-5 relative hover:bg-[#eaf3fd] hover:text-[#1447e6] side-nav-link'
                        ancType='dropdown' dropElement='drop1'>
                        <span class="material-icons material-symbols-rounded !text-[20px]">
                            account_balance_wallet
                        </span>
                        <span
                            class="material-icons material-symbols-rounded absolute top-1/2 right-[5px] -translate-y-1/2  !text-sm dr-arrow">
                            keyboard_arrow_up
                        </span>
                        <p class="themeFont text-[14px] font-normal">Credit Holders</p>
                    </a>
                    <div id="drop1" class="w-full p-1 pl-4 flex flex-col gap-1 ease-linear duration-300 ">
                        <a href='/client'
                            class='w-full p-2 flex items-center rounded capitalize gap-2 ease duration-300 text-gray-500 hover:bg-[#eaf3fd] hover:text-[#1447e6]'>
                            <span class="material-icons material-symbols-rounded !text-[20px]">
                                person_pin
                            </span>
                            <p class="themeFont text-[14px] font-normal">Client</p>
                        </a>
                        <a href='/client/create'
                            class='w-full p-2 flex items-center rounded capitalize gap-2 ease duration-300 text-gray-500 hover:bg-[#eaf3fd] hover:text-[#1447e6]'>
                            <span class="material-icons material-symbols-rounded !text-[20px]">
                                person_add
                            </span>
                            <p class="themeFont text-[14px] font-normal">Create client</p>
                        </a>
                        <a href='/bill'
                            class='w-full p-2 flex items-center rounded capitalize gap-2 ease duration-300 text-gray-500 hover:bg-[#eaf3fd] hover:text-[#1447e6]'>
                            <span class="material-icons material-symbols-rounded !text-[20px]">
                                receipt_long
                            </span>
                            <p class="themeFont text-[14px] font-normal">Create Bill</p>
                        </a>
                    </div>
                </li>

                <li class="w-full flex">
                    <a href='#'
                        class='side-nav-link w-full p-2 flex items-center rounded capitalize gap-2 ease duration-300 text-gray-500 hover:bg-[#eaf3fd] hover:text-[#1447e6]'>
                        <span class="material-icons material-symbols-rounded !text-[20px]">
                            receipt_long_off
                        </span> 
                        <p class="themeFont text-[14px] font-normal">Return Bill</p>
                    </a>
                </li>

                <li class="w-full flex text-gray-400 mt-2 uppercase themeFont text-sm font-semibold px-2">Inventory
                </li>

                <li class="w-full  flex flex-col gap-1">
                    <a href='javascript:void(0)'
                        class='side-nav-link w-full p-2 flex items-center rounded capitalize gap-2 ease duration-300 text-gray-500 pr-5 relative hover:bg-[#eaf3fd] hover:text-[#1447e6]'
                        ancType='dropdown' dropElement='drop2'>
                        <span class="material-icons material-symbols-rounded !text-[20px]">
                            inventory
                        </span>
                        <span
                            class="material-icons material-symbols-rounded absolute top-1/2 right-[5px] -translate-y-1/2  !text-sm dr-arrow">
                            keyboard_arrow_up
                        </span>
                        <p class="themeFont text-[14px] font-normal">Manage Inventory</p>
                    </a>
                    <div id="drop2" class="w-full p-1 pl-4 flex flex-col gap-1 ease-linear duration-300 ">
                        <a href='/product'
                            class='w-full p-2 flex items-center rounded capitalize gap-2 ease duration-300 text-gray-500 hover:bg-[#eaf3fd] hover:text-[#1447e6]'>
                            <span class="material-icons material-symbols-rounded !text-[20px]">
                                package
                            </span>
                            <p class="themeFont text-[14px] font-normal">Products</p>
                        </a>
                        <a href='/product/create'
                            class='w-full p-2 flex items-center rounded capitalize gap-2 ease duration-300 text-gray-500 hover:bg-[#eaf3fd] hover:text-[#1447e6]'>
                            <span class="material-icons material-symbols-rounded !text-[20px]">
                                box_add
                            </span>
                            <p class="themeFont text-[14px] font-normal">Add product</p>
                        </a>
                    </div>
                </li>
                <li class="w-full  flex flex-col gap-1">
                    <a href='javascript:void(0)'
                        class='side-nav-link w-full p-2 flex items-center rounded capitalize gap-2 ease duration-300 text-gray-500 pr-5 relative hover:bg-[#eaf3fd] hover:text-[#1447e6]'
                        ancType='dropdown' dropElement='drop3'>
                        <span class="material-icons material-symbols-rounded !text-[20px]">
                            Category
                        </span>
                        <span
                            class="material-icons material-symbols-rounded absolute top-1/2 right-[5px] -translate-y-1/2  !text-sm dr-arrow">
                            keyboard_arrow_up
                        </span>
                        <p class="themeFont text-[14px] font-normal">Manage Category</p>
                    </a>
                    <div id="drop3" class="w-full p-1 pl-4 flex flex-col gap-1 ease-linear duration-300 ">
                        <a href='/product'
                            class='w-full p-2 flex items-center rounded capitalize gap-2 ease duration-300 text-gray-500 hover:bg-[#eaf3fd] hover:text-[#1447e6]'>
                            <span class="material-icons material-symbols-rounded !text-[20px]">
                                category
                            </span>
                            <p class="themeFont text-[14px] font-normal">Category</p>
                        </a>
                        <a href='/product/create'
                            class='w-full p-2 flex items-center rounded capitalize gap-2 ease duration-300 text-gray-500 hover:bg-[#eaf3fd] hover:text-[#1447e6]'>
                            <span class="material-icons material-symbols-rounded !text-[20px]">
                                add
                            </span>
                            <p class="themeFont text-[14px] font-normal">Add category</p>
                        </a>
                    </div>
                </li>
                <li class="w-full flex text-gray-400 mt-2 uppercase themeFont text-sm font-semibold px-2">Sign Out
                </li>
                <li class="w-full flex">
                    <a href='#'
                        class='w-full p-2 flex items-center rounded capitalize gap-2 ease duration-300 text-gray-500 bg-[#1447e6] text-white'>
                        <span class="material-icons material-symbols-rounded !text-[20px]">
                            logout
                        </span>
                        <p class="themeFont text-[14px] font-normal">Logout</p>
                    </a>
                </li>
            </ul>
        </ul>
    </div>
</div>
