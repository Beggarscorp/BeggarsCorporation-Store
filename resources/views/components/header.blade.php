<header class="sticky top-0 z-50" 
        x-data="{ open: false, cartOpen: false }" 
        x-effect="document.body.classList.toggle('overflow-hidden', cartOpen)">

    <!-- Top bar -->
    <div class="flex items-center justify-between py-3 px-4 bg-yellow-500 text-white">
        <!-- Logo -->
        <div class="flex-shrink-0">
            <img src="{{asset('assets/images/logos/header-logo.png')}}" 
                 alt="logo" 
                 class="max-w-[140px] md:max-w-[200px] lg:max-w-[240px] h-auto">
        </div>

        <!-- Right side icons -->
        <div class="flex items-center space-x-4">
            <i class="fas fa-user cursor-pointer"></i>
            <button @click="cartOpen = true">
                <i class="fas fa-cart-arrow-down cursor-pointer"></i>
            </button>
            <!-- mobile menu toggle -->
            <button class="block lg:hidden" @click="open = !open">
                <i class="fas fa-bars cursor-pointer"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Nav -->
    <nav class="bg-yellow-500 px-4 py-3 lg:hidden"
         x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2">
        <div class="flex flex-col space-y-3 font-bold">
            <a wire:navigate href="/" class="hover:underline">Home</a>
            <a wire:navigate href="{{ route('shop') }}" class="hover:underline">Impact Product</a>
            <a href="#" class="hover:underline">Bags</a>
            <a href="#" class="hover:underline">Stoles & Sarees</a>
            <a href="#" class="hover:underline">Home Decor</a>
            <a href="#" class="hover:underline">Poonya</a>
            <a href="#" class="hover:underline">Book</a>
        </div>
    </nav>

    <!-- Desktop Nav -->
    <nav class="hidden lg:block bg-yellow-500 border-t border-yellow-400 py-3">
        <div class="flex justify-center space-x-10 font-bold text-white">
            <a wire:navigate href="/" class="hover:underline">Home</a>
            <a wire:navigate href="{{ route('shop') }}" class="hover:underline">Impact Product</a>
            <a href="#" class="hover:underline">Bags</a>
            <a href="#" class="hover:underline">Stoles & Sarees</a>
            <a href="#" class="hover:underline">Home Decor</a>
            <a href="#" class="hover:underline">Poonya</a>
            <a href="#" class="hover:underline">Book</a>
        </div>
    </nav>

    <!-- Cart Sidebar -->
    <div class="fixed inset-0 z-50 flex justify-end"
         x-show="cartOpen"
         x-transition.opacity>
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black bg-opacity-50" @click="cartOpen = false"></div>

        <!-- Sidebar -->
        <div class="relative w-80 h-full bg-white shadow-xl transform transition-transform duration-300"
             x-transition:enter="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="translate-x-0"
             x-transition:leave-end="translate-x-full">

            <!-- Header -->
            <div class="p-4 border-b flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-800">Cart</h2>
                <button @click="cartOpen = false" class="text-gray-500 hover:text-gray-800">✕</button>
            </div>

            <!-- Cart Items -->
            <div class="p-4 space-y-4 overflow-y-auto h-[calc(100%-60px)]">
                <div class="grid grid-cols-12 gap-2 border-b pb-2">
                    <div class="col-span-4">
                        <img src="{{asset('assets/images/product-image.jpg')}}" alt="product" class="rounded">
                    </div>
                    <div class="col-span-8">
                        <div class="font-bold">Product Name</div>
                        <div class="text-sm text-gray-400">Short Description</div>
                        <div class="text-lg font-bold text-yellow-500">$99.00</div>
                        <div class="flex space-x-2 text-sm">
                            <span>Qty: 1</span>
                            <span>Total: $99.00</span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-2 border-b pb-2">
                    <div class="col-span-4">
                        <img src="{{asset('assets/images/product-image.jpg')}}" alt="product" class="rounded">
                    </div>
                    <div class="col-span-8">
                        <div class="font-bold">Product Name</div>
                        <div class="text-sm text-gray-400">Short Description</div>
                        <div class="text-lg font-bold text-yellow-500">$99.00</div>
                        <div class="flex space-x-2 text-sm">
                            <span>Qty: 1</span>
                            <span>Total: $99.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
