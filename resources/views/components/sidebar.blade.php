<div class="bg-admin text-white w-64 min-h-screen p-6">
    <ul class="space-y-5">
        <li class="bg-admin-light p-2 rounded-md"><a wire:navigate href="{{ route('admin') }}">Admin </a></li>
        <li class="bg-admin-light p-2 rounded-md"><a wire:navigate href="{{ route('admin.addproduct') }}">Add Product</a></li>
        <li class="bg-admin-light p-2 rounded-md"><a wire:navigate href="{{ route('admin.addcategories') }}">Add Categories</a></li>
        <li class="bg-admin-light p-2 rounded-md"><a wire:navigate href="{{ route('admin.allproducts') }}">All Products</a></li>
        <li class="bg-admin-light p-2 rounded-md"><a wire:navigate href="{{ route('admin.categories') }}">Categories</a></li>
    </ul>
</div>