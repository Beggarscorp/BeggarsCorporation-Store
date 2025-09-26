<section>
        <div class="container mx-auto p-6">
            <div class="heading">Best seller</div>
            <div class="swiper bestSellerSlider w-full max-w-6xl mx-auto">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    @foreach ($products as $product)
                    <div class="swiper-slide">
                        <div>
                            <div class="rounded-md shadow-2xl p-3">
                                <div class="space-y-3">
                                    <div>
                                        <a href="{{ route('product.details', ['slug' => $product->slug, 'id' => $product->id]) }}" target="_blank" rel="noopener noreferrer">
                                            <img src="{{ Storage::url($product->productImage) }}" alt="product-image" class="rounded-md hover:scale-102 transition duration-300">
                                        </a>
                                    </div>
                                    <div class="flex justify-between">
                                        <div>{{ $product->product_name }}</div>
                                        <div class="text-yellow-700">${{ $product->price }}</div>
                                    </div>
                                    <div class="flex justify-between">
                                        <div class="">In Stock <i class="fa fa-check text-green-500" aria-hidden="true"></i></div>
                                        <div class="">Out of Stock<i class="fa fa-times text-red-500" aria-hidden="true"></i></div>
                                    </div>
                                    <button class="
                                        cursor-pointer 
                                        text-center 
                                        w-full 
                                        rounded-md 
                                        border 
                                        border-yellow-700 
                                        bg-yellow-700 
                                        hover:bg-transparent 
                                        text-white 
                                        hover:text-black 
                                        transition 
                                        duration-300 
                                        ease"
                                        wire:click="addProductToCart">Add to cart <i class="fa-solid fa-cart-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>