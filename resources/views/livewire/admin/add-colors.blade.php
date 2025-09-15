<div>
     <div class="text-2xl font-bold my-5">Add Colors</div>

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

    <form wire.submit.prevent="addColor">

        <!-- color name -->
         <div class="grid mb-5">
            <label for="colorName" class="my-2">Color Name :</label>
            <input type="text" class="my-input" wire:model="colorName" placeholder="Write the name of color...">
            @error('colorName') <span class="error text-red-400">{{ $message }}</span> @enderror
         </div>

         <!-- hexa code of color -->
          <div class="grid mb-5">
            <label for="hexaCode" class="my-2">Hexa Code :</label>
            <input type="text" class="my-input" wire:model="hexaCode" placeholder="Write hexa code of color...">
            @error('hexaCode') <span class="error text-red-400">{{ $message }}</span> @enderror
          </div>

          <!-- Submit Button -->
        <div class="grid mb-5">
            <button type="submit" class="submitButton">
                Save Color
            </button>
        </div>

    </form>
</div>
