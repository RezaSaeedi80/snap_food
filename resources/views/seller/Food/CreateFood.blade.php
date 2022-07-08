<x-app-resturant>

    <x-slot name="resturant">
        {{ $resturant->id }}
    </x-slot>

    <div class="w-[500px] block p-6 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2
    rounded-lg shadow-zinc-900/70 shadow-xl bg-white max-w-md">
        <form method="POST" action="{{ route('food.store', $resturant) }}">
            @csrf
            <div class="form-group mb-4">
                <input type="text" name="name"
                    class="mb-2 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Name">
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror

            </div>
            <div class="form-group mb-4">
                <input type="text" name="price"
                    class="mb-2 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Price">
                @error('price')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-4">
                <div class="mb-2">
                    <select name="category"
                        class="form-select mb-2 appearance-none block w-full py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        <option selected disabled value="">Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <p class="text-gray-400 italic font-[500] my-2">The next field is optional</p>
            <div class="form-group mb-3">
                <input type="text" name="materials" placeholder="Please separate the raw materials with a comma"
                    class="mb-3 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                @error('materials')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full px-6 mt-3 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Create</button>
        </form>
    </div>
</x-app-resturant>
