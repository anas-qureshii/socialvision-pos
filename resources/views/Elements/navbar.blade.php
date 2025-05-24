<div class="w-full flex items-center justify-between py-3 px-10 bg-white">
    <div class="w-1/5 flex gap-3 items-center">
        <button class="w-10 h-10 flex items-center justify-center rounded cursor-pointer text-white bg-[#1447e6]" id="sideBar_toggle_btn">
            <span class="material-icons material-symbols-outlined">
                menu_open
            </span>
        </button>
        <form class="relative w-[80%]">
            <!-- Search Icon -->
            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500 ">
                <span class="material-icons !text-[22px]">search</span>
            </span>

            <!-- Input Field -->
            <input type="search" placeholder="Search..."
                class="w-full themeFont pl-10 pr-4 py-3 bg-gray-50 border border-gray-300 text-sm rounded-sm focus:outline-none" />
        </form>
    </div>
    <div class="w-2/5 flex items-center justify-end gap-4">
        <div class="flex relative">
            <button class="w-7 h-7 flex items-center justify-center">
                <span class="material-icons material-symbols-outlined">
                    notifications
                </span>
            </button>
        </div>
        <div class="flex relative">
            <div class="w-10 h-10 flex justify-center items-center cursor-pointer">
                <img src="{{ asset('assets/prof.png') }}" class="w-full h-full     rounded-full object-contain"
                    alt="">
            </div>
            <div
                class="w-[240px] bg-white rounded flex flex-col gap-1 p-1 shadow shadow-gray-50 absolute -left-[220px] top-[80px] hidden">
                <div class="w-full flex flex-wrap justify-between border-b border-gray-100 p-1 mb-1">
                    <div class="w-12 flex items-center">
                        <img src="{{ asset('assets/prof.png') }}" class="w-10 h-10 rounded-full flex" alt="">
                    </div>
                    <div class="w-[78%] flex flex-col gap-1 break-words">
                        <h4 class='text-sm themeFont'>Abdul Rauf</h4>
                        <p class='text-[12px] themeFont break-words'>abdulraufmemon@gmail.com</p>
                    </div>
                </div>
                <ul>
                    <li class="w-full flex">
                        <a href='#'
                            class='w-full p-2 flex items-center rounded capitalize gap-2 ease duration-300 text-gray-500 hover:text-[#1447e6]'>
                            <span class="material-icons material-symbols-rounded !text-[20px]">
                                account_circle
                            </span>
                            <p class="themeFont text-[14px] font-normal">View profile</p>
                        </a>
                    </li>
                    <li class="w-full flex">
                        <a href='#'
                            class='w-full p-2 flex items-center rounded capitalize gap-2 ease duration-300 text-gray-500 hover:text-[#1447e6]'>
                            <span class="material-icons material-symbols-rounded !text-[20px]">
                                settings
                            </span>
                            <p class="themeFont text-[14px] font-normal">settings</p>
                        </a>
                    </li>
                    <li class="w-full flex">
                        <a href='#'
                            class='w-full p-2 flex items-center rounded capitalize gap-2 ease duration-300 text-gray-500 hover:text-[#1447e6]'>
                            <span class="material-icons material-symbols-rounded !text-[20px]">
                                logout
                            </span>
                            <p class="themeFont text-[14px] font-normal">settings</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
