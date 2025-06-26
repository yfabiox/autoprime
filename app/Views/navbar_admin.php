<?php
    // Obtenha a URL atual
    $currentUrl = current_url();
    $uri = service('uri');
 ?>
<nav class="bg-neutral-900 bg-opacity-70 backdrop-blur-sm fixed w-full z-50 py-4 shadow-xl rounded-b-3xl">
    <div class="container mx-auto px-8 flex justify-between items-center">
        <div class="flex items-center">
            <a href="<?= url_to('Home') ?>"
                class="text-4xl font-extrabold text-white tracking-wider hover:text-red-500 duration-500 transform hover:scale-110">
                Auto Prime
            </a>
        </div>

        <button class="text-gray-300 lg:hidden flex items-center justify-center p-2 rounded-md focus:outline-none"
            onclick="toggleMenu()">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <div id="menu"
            class="hidden lg:flex flex-col lg:flex-row absolute lg:static top-20 left-0 w-full lg:w-auto bg-neutral-900 bg-opacity-90 lg:bg-transparent shadow-lg lg:shadow-none space-y-5 lg:space-y-0 lg:space-x-10 p-5 lg:p-0 text-lg z-10 items-center">
            <a href="<?= url_to('Home') ?>"
                class="text-gray-300 hover:text-red-400 transition-colors duration-300 font-medium relative group">
                Home
                <span
                    class="absolute left-0 bottom-0 w-full h-0.5 bg-red-400 transition-all duration-300
                    <?= ($uri->getSegment(1) === '' || $uri->getSegment(1) === 'home') ? 'opacity-100' : 'opacity-0 group-hover:opacity-100' ?>"></span>
            </a>

            <a href="<?= url_to('Cars_Dashboard') ?>"
                class="text-gray-300 hover:text-red-400 transition-colors duration-300 font-medium relative group">
                Veiculos
                <span
                    class="absolute left-0 bottom-0 w-full h-0.5 bg-red-400 transition-all duration-300
                <?= ($uri->getSegment(1) === 'dashboard') ? 'opacity-100' : 'opacity-0 group-hover:opacity-100' ?>"></span>
            </a>

            <a href="#"
                class="text-gray-300 hover:text-red-400 transition-colors duration-300 font-medium relative group">
                Users
                <span
                    class="absolute left-0 bottom-0 w-full h-0.5 bg-red-400 opacity-0 group-hover:opacity-100 transition-all duration-300"></span>
            </a>

            <a href="#"
                class="text-gray-300 hover:text-red-400 transition-colors duration-300 font-medium relative group">
                Vendas
                <span
                    class="absolute left-0 bottom-0 w-full h-0.5 bg-red-400 opacity-0 group-hover:opacity-100 transition-all duration-300"></span>
            </a>

            <a href="<?= url_to('AdminDashboard') ?>"
                class="text-gray-300 hover:text-red-400 transition-colors duration-300 font-medium relative group">
                Dashboard
                <span
                    class="absolute left-0 bottom-0 w-full h-0.5 bg-red-400 transition-all duration-300
                <?= ($uri->getSegment(1) === 'dashboard_admin') ? 'opacity-100' : 'opacity-0 group-hover:opacity-100' ?>"></span>
            </a>
            <?php if (session()->get('logged_in')): ?>
            <div class="relative inline-block text-left">
                <button id="dropdownButton" onclick="toggleDropdown()"
                    class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-neutral-900 text-sm font-medium text-gray-300 hover:text-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Olá, <?= esc($user_name) ?>
                    <svg class="-mr-1 ml-2 h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div id="dropdownMenu"
                    class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-neutral-900 ring-1 ring-black ring-opacity-5 hidden z-20">
                    <div class="py-1">
                        <a href=""
                            class="block px-4 py-2 text-sm text-gray-300 hover:bg-red-500 hover:text-white">Perfil</a>
                        <a href="<?= url_to('logout') ?>"
                            class="block px-4 py-2 text-sm text-gray-300 hover:bg-red-500 hover:text-white">Logout</a>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <a href="<?= url_to('form_login') ?>"
                class="block relative flex items-center gap-2 font-semibold text-lg text-gray-300 group">
                <p class="relative transition-colors duration-200 group-hover:text-red-400">Log In</p>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-4 h-4 text-gray-300 transition-transform duration-200 group-hover:translate-x-1 group-hover:text-red-400"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
                <span
                    class="absolute left-0 bottom-[-7px] block w-0 h-[2px] bg-red-400 transition-all duration-200 ease-in-out group-hover:w-full"></span>
            </a>
            <?php endif; ?>

        </div>
    </div>
</nav>

<div class="pt-24"></div>
<script src="<?= base_url('js/navbar.js'); ?>"></script>
<script src="<?= base_url('js/dropdown.js'); ?>"></script>