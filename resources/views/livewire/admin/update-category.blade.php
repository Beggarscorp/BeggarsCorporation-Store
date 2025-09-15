<div>
    <div class="text-2xl font-bold my-5">Update Category</div>

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
    


    <form wire:submit.prevent="updateCategory">

        <!-- category name -->
        <div class="mb-5 grid">
            <label for="categoryName" class="my-2">Category Name :</label>
            <input type="text" wire:model="UpdateCategoryName" class="my-input" placeholder="Write category name here...">
            @error('categoryName') <span class="error text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- category parent Id -->
        <div class="grid mb-5">
            <select wire:model="UpdateCategoryParetId" class="my-input">

                <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                @foreach ($categories as $cate)

                    <option value="{{ $cate->id }}">{{ $cate->categoryName }}</option>
                
                @endforeach

            
            </select>
            @error('parentId') <span class="error text-red-400">{{ $message }}</span> @enderror
        </div>

        <!-- category image -->
        <div class="grid mb-5">
            <label for="categoryImage" class="my-2">Category Image :</label>
            <input type="file" wire:model="UpdateCategoryImage" class="shadow p-2 rounded bg-gray-300">
            @error('categoryImage') <span class="error text-red-400">{{ $message }}</span> @enderror
            @if ($UpdateCategoryImage)
                <img src="{{ $UpdateCategoryImage->temporaryUrl() }}" alt="category-image" class="h-32 object-cover mt-5 rounded">
            @else
            <img src="{{ Storage::url($category->image) }}" alt="category-image" class="h-32 object-cover mt-5 rounded">
           @endif

        </div>

        <!-- Submit Button -->
        <div class="grid mb-5">
            <button type="submit" class="submitButton">
                Update Category
            </button>
        </div>

    </form>

</div>