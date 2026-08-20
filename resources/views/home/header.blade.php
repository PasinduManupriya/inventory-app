<header class="w-full text-sm mt-0 pt-0 mb-6 not-has-[nav]:hidden" x-data="{ open: false }">
@if (Route::has('login'))
                <nav class="w-full mb-4">
                    @auth

                        <!-- nav -->
                        <div class="flex items-center gap-2">
                                <a href="{{url('/')}}">
                                    <img src="{{ asset('images/inventory_logo.png') }}" class="block h-7 w-auto ml-4 mt-2" alt="Inventory Logo">
                                </a>

                                <div class="hidden md:flex items-center gap-2">
                                    <a
                                        href="{{url('/')}}"
                                        class="ml-3 text-left inline-block px-5 py-1.5 transition-all duration-200 dark:text-[#EDEDEC] text-[#1b1b18] text-sm leading-normal
                                            {{ request()->is('/','user_product_details') ? 'border-b-2 border-[#FFFFFF] rounded-b-md font-semibold' : 'border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm' }}"
                                    >
                                        Home
                                    </a>

                                    <a
                                        href="{{url('about_us')}}"
                                        class="text-left inline-block px-5 py-1.5 transition-all duration-200 dark:text-[#EDEDEC] text-[#1b1b18] text-sm leading-normal
                                            {{ request()->is('about_us') ? 'border-b-2 border-[#FFFFFF] rounded-b-md font-semibold' : 'border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm' }}"
                                    >
                                        About Us
                                    </a>

                                    <a
                                        href="{{url('cart')}}"
                                        class="text-left inline-block px-5 py-1.5 transition-all duration-200 dark:text-[#EDEDEC] text-[#1b1b18] text-sm leading-normal
                                            {{ request()->is('cart') ? 'border-b-2 border-[#FFFFFF] rounded-b-md font-semibold' : 'border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm' }}"
                                    >
                                        Cart
                                    </a>

                                    <a
                                        href="{{url('order')}}"
                                        class="text-left inline-block px-5 py-1.5 transition-all duration-200 dark:text-[#EDEDEC] text-[#1b1b18] text-sm leading-normal
                                            {{ request()->is('order') ? 'border-b-2 border-[#FFFFFF] rounded-b-md font-semibold' : 'border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm' }}"
                                    >
                                        Order
                                    </a>
                                </div>
                            </div>
                        <!-- nav -->

                        <div class="w-full flex justify-end items-center px-4 -mt-7">
                            <div class="hidden sm:flex sm:items-center sm:ms-6">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center px-4 py-1.5 border border-[#19140035] dark:border-[#3E3E3A] hover:border-[#1915014a] dark:hover:border-[#62605b] text-sm leading-normal font-medium rounded-md text-white bg-transparent hover:text-gray-200 focus:outline-none transition-all duration-200">
                                            <div>{{ Auth::user()->name }}</div>

                                            <div class="ms-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.edit')">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        </div>
                    @else
                        <div class="flex justify-between items-center w-full px-4 md:px-6 py-2 bg-transparent">
                            <div class="flex items-center gap-2">
                                <a href="{{url('/')}}">
                                    <img src="{{ asset('images/inventory_logo.png') }}" class="block h-7 w-auto" alt="Inventory Logo">
                                </a>

                                <div class="hidden md:flex items-center gap-2">
                                    <a
                                        href="{{url('/')}}"
                                        class="ml-3 text-left inline-block px-5 py-1.5 transition-all duration-200 dark:text-[#EDEDEC] text-[#1b1b18] text-sm leading-normal
                                            {{ request()->is('/','user_product_details') ? 'border-b-2 border-[#FFFFFF] rounded-b-md font-semibold' : 'border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm' }}"
                                    >
                                        Home
                                    </a>

                                    <a
                                        href="{{url('about_us')}}"
                                        class="text-left inline-block px-5 py-1.5 transition-all duration-200 dark:text-[#EDEDEC] text-[#1b1b18] text-sm leading-normal
                                            {{ request()->is('about_us') ? 'border-b-2 border-[#FFFFFF] rounded-b-md font-semibold' : 'border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm' }}"
                                    >
                                        About Us
                                    </a>

                                    <a
                                        href="{{url('cart')}}"
                                        class="text-left inline-block px-5 py-1.5 transition-all duration-200 dark:text-[#EDEDEC] text-[#1b1b18] text-sm leading-normal
                                            {{ request()->is('cart') ? 'border-b-2 border-[#FFFFFF] rounded-b-md font-semibold' : 'border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm' }}"
                                    >
                                        Cart
                                    </a>

                                    <a
                                        href="{{url('order')}}"
                                        class="text-left inline-block px-5 py-1.5 transition-all duration-200 dark:text-[#EDEDEC] text-[#1b1b18] text-sm leading-normal
                                            {{ request()->is('order') ? 'border-b-2 border-[#FFFFFF] rounded-b-md font-semibold' : 'border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm' }}"
                                    >
                                        Order
                                    </a>
                                </div>
                            </div>

                            <div class="hidden md:flex items-center gap-2">
                                <a
                                    href="{{ route('login') }}"
                                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                                >
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="inline-block px-5 py-1.5 text-[#1b1b18] dark:text-[#EDEDEC] hover:opacity-80 rounded-sm text-sm leading-normal border border-[#19140035] dark:border-[#3E3E3A]">
                                        Register
                                    </a>
                                @endif
                            </div>

                            <div class="flex md:hidden">
                                <button @click="open = !open" type="button" class="text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none p-2">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" style="display: none;" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div x-show="open" x-transition class="md:hidden bg-[#0f172a]/90 backdrop-blur-md px-4 pt-2 pb-4 space-y-2 mt-2 border-t border-white/10">
                            <a href="{{url('/')}}" class="block px-3 py-2 rounded-md text-base dark:text-[#EDEDEC] text-[#1b1b18]">Home</a>
                            <a href="{{url('about_us')}}" class="block px-3 py-2 rounded-md text-base dark:text-[#EDEDEC] text-[#1b1b18]">About Us</a>
                            <a href="{{url('cart')}}" class="block px-3 py-2 rounded-md text-base dark:text-[#EDEDEC] text-[#1b1b18]">Cart</a>
                            <a href="{{url('order')}}" class="block px-3 py-2 rounded-md text-base dark:text-[#EDEDEC] text-[#1b1b18]">Order</a>

                            <div class="pt-3 border-t border-gray-700 flex flex-col gap-2">
                                <a href="{{ route('login') }}" class="w-full text-center px-4 py-2 dark:text-[#EDEDEC] text-[#1b1b18] border border-gray-600 rounded-md">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="w-full text-center px-4 py-2 bg-white text-black font-semibold rounded-md">Register</a>
                                @endif
                            </div>
                        </div>
                    @endauth
                </nav>
            @endif
            </header>