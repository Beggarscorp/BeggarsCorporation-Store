<div class="bg-white p-4 rounded-lg shadow-md">
    <h2 class="text-xl font-bold mb-4">Products</h2>

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
    
    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left text-gray-600 text-sm">
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Image</th>
                    <th class="px-4 py-2">Product Name</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Size & Fit</th>
                    <th class="px-4 py-2">Material & Care</th>
                    <th class="px-4 py-2">Specification</th>
                    <th class="px-4 py-2">Color</th>
                    <th class="px-4 py-2">Category</th>
                    <th class="px-4 py-2">Impact Product By</th>
                    <th class="px-4 py-2">Stock</th>
                    <th class="px-4 py-2">Min Order Qty</th>
                    <th class="px-4 py-2">Gallery</th>
                    <th class="px-4 py-2">Created At</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700">
                @foreach ($products as $product)
                <tr class="border-b">
                    <td class="px-4 py-3">{{ $Index++ }}</td>
                    <td class="px-4 py-3">
                        <img src="{{ Storage::url($product->productImage) }}" class="w-12 h-12 rounded object-cover" />
                    </td>
                    <td class="px-4 py-3">{{ $product->product_name }}</td>
                    <td class="px-4 py-3">{{ \Illuminate\Support\Str::words($product->description, words: 8) }}</td>
                    <td class="px-4 py-3">{{ $product->price }}</td>
                    <td class="px-4 py-3">{{ \Illuminate\Support\Str::words($product->size_and_fit, words: 8) }}</td>
                    <td class="px-4 py-3">{{ \Illuminate\Support\Str::words($product->material_and_care, words: 8) }}</td>
                    <td class="px-4 py-3">{{ \Illuminate\Support\Str::words($product->specification, words: 8) }}</td>
                    <td class="px-4 py-3">{{ $product->product_color_id }}</td>
                    <td class="px-4 py-3">{{ $product->category_id }}</td>
                    <td class="px-4 py-3">{{ $product->impact_product_by }}</td>
                    <td class="px-4 py-3">{{ $product->stock }}</td>
                    <td class="px-4 py-3">{{ $product->min_order_quantity }}</td>
                    <td class="px-4 py-3">
                        <div class="flex space-x-2">
                            @foreach (json_decode($product->productGalleryImages) as $galleryImage)
                                <img src="{{ Storage::url($galleryImage) }}" class="w-8 h-8 rounded object-cover" />
                            @endforeach
                        </div>
                    </td>
                    <td class="px-4 py-3">18 Sep, 2025</td>
                    <td class="px-4 py-3 flex space-x-3">
                        <button wire:click="updateProduct({{ $product->id }})" class="text-green-600 hover:text-green-800">Edit</button>
                     
                    <button wire:click="deleteProduct({{ $product->id }})" class="text-red-600 hover:text-red-800">Delete</button>
                    </td>
                </tr>
                <!-- Repeat rows dynamically -->
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Pagination -->
    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
