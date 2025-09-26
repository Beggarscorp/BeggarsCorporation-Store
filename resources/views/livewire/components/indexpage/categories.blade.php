<section>
        <div class="container mx-auto py-6">
            <div class="heading">Categories</div>
            <div class="swiper categorySlider w-full max-w-6xl mx-auto">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    @foreach ($categories as $category)
                    <div class="swiper-slide">
                        <div class="category-card">
                            <a href="{{ route('shop.category', ['slug' => $category->slug]) }}" target="_blank" rel="noopener noreferrer">
                                <img src="{{ Storage::url($category->image) }}" alt="{{ $category->categoryName }}" class="w-full h-full object-cover rounded-full">
                                <div class="category-name text-center my-2 text-yellow-600 text-xl">{{ $category->categoryName }}</div>
                            </a>
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