<nav class="bg-white border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/home" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img class="h-8" src="{{ asset('/img/Logo NUtrimet.png') }}" alt="Logo NUtrimet">
        </a>
        <div class="flex items-center md:order-2 space-x-1 md:space-x-0 rtl:space-x-reverse">
            <button type="button" data-dropdown-toggle="language-dropdown-menu" class="inline-flex items-center font-bold justify-center px-4 py-2 text-sm rounded-lg cursor-pointer hover:bg-gray-100" onclick="toggleUser();">
                {{ auth()->user()->nama_lengkap }}
                <img src="https://th.bing.com/th/id/R.c3631c652abe1185b1874da24af0b7c7?rik=XBP%2fc%2fsPy7r3HQ&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fpng-user-icon-circled-user-icon-2240.png&ehk=z4ciEVsNoCZtWiFvQQ0k4C3KTQ6wt%2biSysxPKZHGrCc%3d&risl=&pid=ImgRaw&r=0" alt="User Icon" class="w-6 mx-3">
            </button>
            <!-- Dropdown -->
            <div class="z-50 hidden absolute mt-32 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="user-menu">
                <ul class="py-2 font-medium" role="none">
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                            <div class="inline-flex items-center">         
                                Pengaturan Akun
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                            <div class="inline-flex items-center">         
                                Logout
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
                <button data-collapse-toggle="navbar-language" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-language" aria-expanded="false" id="navbarBtn" onclick="toggleNav();">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
        </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                    <li>
                        <a href="#" class="block py-2 px-3 font-bold md:p-0 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary3" aria-current="page">Beranda</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 md:p-0 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary3">Riwayat Cek</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 md:p-0 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary3">Cek Status Gizi</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 md:p-0 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary3">Cek Pre-Metabolic Syndrome</a>
                    </li>
            </ul>
        </div>
    </div>
</nav>