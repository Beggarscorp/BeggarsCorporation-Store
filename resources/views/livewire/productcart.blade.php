<div class="container mx-auto p-6">
    <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-8">
        <div class="flex-1">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h1 class="text-2xl font-bold mb-6">Shopping cart</h1>
                <p class="text-gray-500 mb-6">{{ $cartCount }} items in your cart.</p>
    
                <div class="hidden md:grid grid-cols-5 gap-4 text-gray-500 text-sm font-semibold mb-4 border-b pb-2">
                    <div class="col-span-2">Product</div>
                    <div>Price</div>
                    <div>Quantity</div>
                    <div class="text-right">Total Price</div>
                </div>
    
                @foreach ($cartItems as $cartItem)
    
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4 items-center border-b py-4">
                    <div class="col-span-2 flex items-center gap-4">
                        <img src="{{ Storage::url($cartItem['image']) }}" alt="{{ $cartItem['name'] }}" class="w-24 h-24 rounded-lg object-cover">
                        <div>
                            <p class="text-xs text-gray-500">{{ $cartItem['category_name'] }}</p>
                            <h2 class="font-semibold text-lg">{{ $cartItem['name'] }}</h2>
                            <!-- <p class="text-sm text-gray-500">Color: <span class="font-medium">Blue</span></p> -->
                            <!-- <p class="text-sm text-gray-500">Size: <span class="font-medium">42</span></p> -->
                        </div>
                    </div>
                    <div class="text-lg font-semibold"><span><i class="fa fa-inr text-sm" aria-hidden="true"></i></span>{{ $cartItem['price'] }}</div>
                    <div class="flex items-center gap-2">
                        <button class="bg-gray-200 text-gray-600 px-3 py-1 rounded-md" wire:click="increaseCartQuantity({{ $cartItem['id'] }})">+</button>
                        <span class="w-8 text-center">{{ $cartItem['quantity'] }}</span>
                        <button class="bg-gray-200 text-gray-600 px-3 py-1 rounded-md" wire:click="decreaseCartQuantity({{ $cartItem['id'] }})">-</button>
                    </div>
                    <div class="text-right font-semibold text-lg text-yellow-500"><span><i class="fa fa-inr text-sm" aria-hidden="true"></i></span>{{ $cartItem['price'] * $cartItem['quantity'] }}.00</div>
                </div>
    
                @endforeach
    
            </div>
        </div>
    
        <div class="w-full lg:w-96 flex flex-col gap-8">
            <!-- <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-4">Calculated Shipping</h2>
                    <div class="flex flex-col gap-4">
                        <select class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>Country</option>
                        </select>
                        <div class="flex gap-4">
                            <select class="flex-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>State / City</option>
                            </select>
                            <input type="text" placeholder="ZIP Code" class="w-28 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <button class="w-full bg-black text-white py-3 rounded-lg font-semibold hover:bg-gray-800">Update</button>
                    </div>
                </div> -->
    
            <!-- <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-4">Coupon Code</h2>
                    <p class="text-sm text-gray-500 mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </p>
                    <div class="flex gap-4">
                        <input type="text" placeholder="Coupon Code" class="flex-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button class="bg-black text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-800">Apply</button>
                    </div>
                </div> -->
    
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Cart Total</h2>
                <div class="flex flex-col gap-3 text-gray-800">
                    <div class="flex justify-between items-center">
                        <span>Cart Subtotal</span>
                        <span class="font-semibold">$71.50</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span>Design by Fluttertop</span>
                        <span class="font-semibold text-green-600">Free</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span>Discount</span>
                        <span class="font-semibold text-yellow-600">-$4.00</span>
                    </div>
                    <div class="border-t border-gray-300 my-2"></div>
                    <div class="flex justify-between items-center text-xl font-bold">
                        <span>Cart Total</span>
                        <span><span><i class="fa fa-inr text-sm" aria-hidden="true"></i></span>{{ $total }}.00</span>
                    </div>
                </div>
                <button class="w-full bg-black text-white py-4 rounded-lg mt-6 font-semibold hover:bg-gray-800">Proceed to checkout </button>
            </div>
        </div>
    </div>

</div>