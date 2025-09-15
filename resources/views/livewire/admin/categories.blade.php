<div class="overflow-x-auto bg-white shadow-md rounded-lg">

    <div class="text-2xl font-bold m-5">Categories</div>

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


    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category Name</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Parent</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($categories as $index => $category)
            <tr>
                <td class="px-4 py-3 text-sm text-gray-700">{{ $index + 1 }}</td>

                <td class="px-4 py-3">
                    <div class="w-12 h-12 rounded overflow-hidden border">
                        @if($category->image)
                            <img src="{{ Storage::url($category->image) }}" alt="{{ $category->categoryName }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs">No image</div>
                        @endif
                    </div>
                </td>

                <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $category->categoryName }}</td>

                <td class="px-4 py-3 text-sm text-gray-700">
                    {{ $category->parent ? $category->parent->categoryName : '—' }}
                </td>

                <td class="px-4 py-3 text-sm text-gray-500">
                    {{ $category->created_at->format('d M, Y') }}
                </td>

                <td class="px-4 py-3 text-right text-sm font-medium space-x-2">
                    
                    <button wire:click="updateCategory({{ $category->id }})" class="text-green-600 hover:text-green-800">Edit</button>
                     
                    <button wire:click="deleteCategory({{ $category->id }})" class="text-red-600 hover:text-red-800">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
