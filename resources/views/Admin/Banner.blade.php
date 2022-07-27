<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>


    <div class="w-[500px] h-fit absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <x-create-food-card>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('banner.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div>
                    <x-label for="caption" :value="__('Caption')" />

                    <x-input id="caption" class="block mt-1 w-full" type="text" name="caption" :value="old('caption')"
                        required autofocus />
                </div>

                <!-- Image -->
                <div class="mt-4">
                    <x-label for="image" :value="__('Image')" />

                    <input
                        name="image"
                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="file_input" type="file">

                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Save') }}
                    </x-button>
                </div>
            </form>
        </x-create-food-card>
    </div>

</x-app-layout>
