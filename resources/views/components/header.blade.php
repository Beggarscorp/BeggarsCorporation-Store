<header class="sticky top-0 z-50">
    <div class="bg-yellow-500 text-white" x-data="{ open: false , cartOpen: false }" x-effect="document.body.classList.toggle('overflow-hidden', cartOpen)">
        <div class="grid grid-cols-12 items-center py-3">
            <div class="col-span-6 md:col-span-4 forLogo px-10"><img src="{{asset('assets/images/logos/header-logo.png')}}" alt="logo" class="max-w-[120px] md:max-w-[220px] lg:max-w-[250px] h-auto"></div>
            <div class="col-span-6 md:col-span-8 forIcon px-10 flex justify-end items-center">
                <div class="icons">
                    <i class="fas fa-user"></i>
                    <i class="fas fa-cart-arrow-down"  @click="cartOpen = !cartOpen"></i>
                    <div class="block sm:hidden md:hidden">
                        <i class="fas fa-bars" @click="open = !open"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- for mobile device -->
        <div class="links border-t-2 py-2 bg-yellow-500 px-2 w-50 absolute sm:static md:static" 
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        >
            <div class="flex-block sm:flex md:flex justify-center space-x-6 font-bold">
                <div><a href="#" class="hover:underline">Link 1</a></div>
                <div><a href="#" class="hover:underline">Link 2</a></div>
                <div><a href="#" class="hover:underline">Link 3</a></div>
                <div><a href="#" class="hover:underline">Link 3</a></div>
                <div><a href="#" class="hover:underline">Link 3</a></div>
                <div><a href="#" class="hover:underline">Link 3</a></div>
            </div>
        </div>

        <!-- end here -->

        <!-- for desktop device -->

        <div class="links border-t-2 py-2 bg-yellow-500 px-2 hidden sm:block md:block"
        >
            <div class="flex justify-around font-bold">
                <div><a href="#" class="hover:underline">Link 1</a></div>
                <div><a href="#" class="hover:underline">Link 2</a></div>
                <div><a href="#" class="hover:underline">Link 3</a></div>
                <div><a href="#" class="hover:underline">Link 3</a></div>
                <div><a href="#" class="hover:underline">Link 3</a></div>
                <div><a href="#" class="hover:underline">Link 3</a></div>
            </div>
        </div>

        <!-- end here -->

        <!-- cart sidebar code  -->

        <div>
            <div class="grid grid-cols-12 h-[calc(100vh-114px)]" x-show="cartOpen" 
            x-show="cartOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            >
                <div class="col-span-8 bg-[#ffffff] h-full">sdf</div>
                <div class="col-span-4 bg-white text-gray-400 h-full p-4 border-b-2 shadow-lg">
                    <div class="text-2xl font-bold">Cart</div>
                    
                    <div class="cart-card">
                        <div class="grid grid-cols-12 border-b-2 border-yellow-500 py-2">
                            <div class="col-span-4 p-2">
                                <img src="{{asset('assets/images/product-image.jpg')}}" alt="product" class="h-auto max-w-full rounded">
                            </div>
                            <div class="col-span-8 pl-2">
                                <div class="font-bold">Product Name</div>
                                <div class="text-sm text-gray-400">Product Short Description</div>
                                <div class="text-lg font-bold text-yellow-500">$99.00</div>
                                <div class="flex space-x-2">
                                    <div class="text-sm">Quantity: 1</div>
                                    <div class="text-sm">Total: $99.00</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="cart-card">
                        <div class="grid grid-cols-12 border-b-2 border-yellow-500 py-2">
                            <div class="col-span-4 p-2">
                                <img src="{{asset('assets/images/product-image.jpg')}}" alt="product" class="h-auto max-w-full rounded">
                            </div>
                            <div class="col-span-8 pl-2">
                                <div class="font-bold">Product Name</div>
                                <div class="text-sm text-gray-400">Product Short Description</div>
                                <div class="text-lg font-bold text-yellow-500">$99.00</div>
                                <div class="flex space-x-2">
                                    <div class="text-sm">Quantity: 1</div>
                                    <div class="text-sm">Total: $99.00</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</header>