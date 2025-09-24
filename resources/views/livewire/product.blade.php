<div class="container mx-auto px-4 py-8" 
     x-data="{ activeImage: '{{ Storage::url($product->productImage) }}', zoom: false }">

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
    <!-- Left Section (Gallery) -->
    <div class="flex flex-col lg:flex-row gap-4">
      
      <!-- Vertical Thumbnails (Desktop) -->
      <div class="hidden lg:flex lg:flex-col gap-3 order-2 lg:order-1">
        @foreach (json_decode($product->productGalleryImages) as $image)
          <img src="{{ Storage::url($image) }}" 
               @click="activeImage = '{{ Storage::url($image) }}'" 
               class="w-20 h-20 object-cover cursor-pointer border hover:border-yellow-500">
        @endforeach
        
        
      </div>

      <!-- Main Image -->
      <div class="relative flex-1 order-1 lg:order-2 overflow-hidden rounded shadow">
        <img :src="activeImage" 
             alt="Product" 
             @mouseenter="zoom = true" 
             @mouseleave="zoom = false" 
             :class="zoom ? 'scale-110' : 'scale-100'"
             class="w-full h-auto transition-transform duration-300 ease-in-out object-cover">
      </div>
    </div>

    <!-- Right Section (Product Info) -->
    <div>
      <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3">{{ $product->product_name }}</h2>
      <p class="text-gray-600 mb-4 text-sm md:text-base">
        {!! nl2br(e($product->description)) !!}
      </p>

      <p class="text-sm text-gray-500 mb-6">
        Estimated Delivery: 8-12 working days from booking.
      </p>

      <hr class="my-4">

      <!-- Size & Fit -->
      @if ($product->size_fit)
      <h3 class="font-semibold text-gray-800 mb-1">Size & Fit</h3>
          <p>{!! nl2br(e($product->size_fit)) !!}</p>
      @endif

      <!-- Material & Care -->
       @if ($product->material_and_care)
       <h3 class="font-semibold text-gray-800 mb-1">Material & Care</h3>
       <p class="text-sm text-gray-500 mb-6">{!! nl2br(e($product->material_and_care)) !!}</p>
       @endif

      <!-- Specification -->
         @if ($product->specification)
      <h3 class="font-semibold text-gray-800 mb-1">Specification</h3>
      <p class="text-sm text-gray-500 mb-6">{!! nl2br(e($product->specification)) !!}</p>
      @endif

      <!-- Buttons -->
      <div class="space-y-3">
        <button class="w-full bg-yellow-500 text-white py-3 font-bold rounded shadow hover:bg-yellow-600 transition">
          Add to Cart 🛒
        </button>
        <button class="w-full bg-yellow-600 text-white py-3 font-bold rounded shadow hover:bg-yellow-700 transition">
          Proceed to Checkout 💳
        </button>
        <button class="w-full bg-yellow-400 text-gray-800 py-3 font-bold rounded shadow hover:bg-yellow-500 transition">
          Continue Shopping →
        </button>
      </div>
    </div>
  </div>

