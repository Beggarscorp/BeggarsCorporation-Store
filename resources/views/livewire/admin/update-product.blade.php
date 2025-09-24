<div>
    <div class="text-2xl font-bold my-5">Update Product</div>

    @if (session()->has('error'))
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-3">
        {{ session('error') }}
    </div>
    @endif

    @if (session()->has('message'))
    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-3">
        {{ session('message') }}
    </div>
    @endif

    <form wire:submit.prevent="updateProduct">

        <!-- Product Name -->
        <div class="grid mb-5">
            <label for="product_name" class="my-2">Product Name :</label>
            <input type="text" wire:model="product_name" wire:input="generateSlug($event.target.value)" class="my-input" placeholder="Enter product name">
            @error('product_name') <span class="error text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- Slug -->
        <div class="grid mb-5">
            <label for="slug" class="my-2">Slug :</label>
            <input type="text" wire:model="slug" class="my-input" placeholder="Slug will be generated automatically" readonly>
            @error('slug') <span class="error text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- Description -->
        <div class="grid mb-5">
            <label for="description" class="my-2">Description :</label>
            <textarea wire:model="description" class="my-input" placeholder="Write product description here..."></textarea>
            @error('description') <span class="error text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- Price -->
        <div class="grid mb-5">
            <label for="price" class="my-2">Price :</label>
            <input type="number" wire:model="price" class="my-input" placeholder="Enter price">
            @error('price') <span class="error text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- Size & Fit -->
        <div class="grid mb-5">
            <label for="size_and_fit" class="my-2">Size & Fit :</label>
            <textarea wire:model="size_and_fit" class="my-input" placeholder="Write product size and fit here..."></textarea>
            @error('size_and_fit') <span class="error text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- Material & Care -->
        <div class="grid mb-5">
            <label for="material_and_care" class="my-2">Material & Care :</label>
            <textarea wire:model="material_and_care" class="my-input" placeholder="Material and care instructions"></textarea>
            @error('material_and_care') <span class="error text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- Specification -->
        <div class="grid mb-5">
            <label for="specification" class="my-2">Specification :</label>
            <textarea wire:model="specification" class="my-input" placeholder="Product specifications"></textarea>
            @error('specification') <span class="error text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- Product Color -->
        <div class="grid mb-5">
            <label for="product_color_id" class="my-2">Product Color :</label>
            <select wire:model="product_color_id" class="my-input">
                <option value="">Select Color</option>
                <!-- Example: Loop through colors -->
                @foreach($colors as $color)
                <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                @endforeach
            </select>
            @error('product_color_id') <span class="error text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- Category -->
        <div class="grid mb-5">
            <label for="category_id" class="my-2">Category :</label>
            <select wire:model="category_id" class="my-input">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                @endforeach
            </select>
            @error('category_id') <span class="error text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- Impact Product By -->
        <div class="grid mb-5">
            <label for="impact_product_by" class="my-2">Impact Product By :</label>
            <input type="text" wire:model="impact_product_by" class="my-input" placeholder="Enter impact product by">
            @error('impact_product_by') <span class="error text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- Stock -->
        <div class="grid mb-5">
            <label for="stock" class="my-2">Stock :</label>
            <input type="number" wire:model="stock" class="my-input" placeholder="Enter stock quantity">
            @error('stock') <span class="error text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- Minimum Order Quantity -->
        <div class="grid mb-5">
            <label for="min_order_quantity" class="my-2">Minimum Order Quantity :</label>
            <input type="number" wire:model="min_order_quantity" class="my-input" placeholder="Enter minimum order quantity">
            @error('min_order_quantity') <span class="error text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- Product Image -->
        <div class="grid mb-5">
            <label for="productImage" class="my-2">Product Image :</label>
            <input type="file" wire:model="productImage" class="my-input">
            @if ($productImage)
            <img src="{{ Storage::url($productImage) }}" alt="product-image" class="h-32 rounded shadow mt-4">
            @else
            <img src="{{ $productImage->temporaryUrl() }}" alt="product-image">
            @endif
            @error('productImage') <span class="error text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- Product Gallery Images -->
        <div class="grid mb-5">
            <label for="newGalleryImages" class="my-2">Product Gallery Images :</label>
            <input type="file" wire:model="newGalleryImages" multiple class="my-input">
            
            @error('newGalleryImages') <span class="error text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div class="grid mb-5">
            <button type="submit" class="submitButton">
                Update Product
            </button>
        </div>

    </form>

</div>