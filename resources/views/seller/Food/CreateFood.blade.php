<x-app-resturant>

    <x-slot name="resturant">
        {{ $resturant->id }}
    </x-slot>

    <div class="w-[500px] h-fit absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <x-create-food-card>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('food.store', $resturant) }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Name')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus />
                </div>

                <!-- Price -->
                <div class="mt-4">
                    <x-label for="Price" :value="__('Price')" />

                    <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')"
                        required />
                </div>

                <!-- Category -->
                <div class="mt-4">
                    <x-label for="category" :value="__('Category')" />

                    <select name="category"
                        class="w-full block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option selected disabled value="">Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="materials" :value="__('Materials')" />

                    <x-input id="materials" class="block mt-1 w-full" type="text" name="materials" :value="old('materials')"
                        required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Save') }}
                    </x-button>
                </div>
            </form>
        </x-create-food-card>
    </div>
</x-app-resturant>
