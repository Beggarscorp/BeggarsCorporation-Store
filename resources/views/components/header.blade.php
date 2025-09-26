<header class="sticky top-0 z-50" x-data="{ open: false }">
    <!-- Top bar -->
    <div class="flex items-center justify-between py-3 px-4 bg-yellow-500 text-white">
        <!-- Logo -->
        <div class="flex-shrink-0">
            <img src="{{ asset('assets/images/logos/header-logo.png') }}" 
                 alt="logo" 
                 class="max-w-[120px] sm:max-w-[140px] md:max-w-[200px] lg:max-w-[240px] h-auto">
        </div>

        <!-- Right side icons -->
        <div class="flex items-center space-x-4">
            <!-- User icon -->
            <i class="fas fa-user cursor-pointer text-xl"></i>

            <!-- Cart button with badge -->
            <div class="relative">
                <button wire:navigate href="{{ route('product.cart') }}">
                    <i class="fas fa-cart-arrow-down cursor-pointer text-xl"></i>
                    <span class="absolute -top-2 -right-2 w-5 h-5 bg-yellow-600 text-white rounded-full flex items-center justify-center text-xs">
                        <livewire:components.cart-count />
                    </span>
                </button>
            </div>

            <!-- Mobile menu toggle -->
            <button class="block lg:hidden text-xl" @click="open = !open">
                <i class="fas fa-bars cursor-pointer"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Nav -->
    <nav 
        x-show="open" 
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="bg-yellow-500 px-4 py-3 lg:hidden"
    >
        <div class="flex flex-col space-y-3 font-bold text-white">
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
</header>
