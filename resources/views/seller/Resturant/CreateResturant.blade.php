<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 p-8 rounded-lg shadow-zinc-900/70 shadow-xl bg-white w-[500px]">
        <form class="overflow-auto" method="POST" action="{{ route('resturant.store') }}">
            @csrf
            <div class="form-group mb-3">
                <input type="text" name="name"
                    class="mb-3 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Name">
                @error('name')
                    <p class="text-red-500 text-xs italic" >{{ $message }}</p>
                @enderror

            </div>
            <div class="form-group mb-3">
                <input type="text" name="phone"
                    class="mb-3 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Phone">
                @error('phone')
                    <p class="text-red-500 text-xs italic" >{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <input type="text" name="address_title"
                    class="mb-3 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Address Title">
                @error('address_title')
                    <p class="text-red-500 text-xs italic" >{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <input type="text" name="address"
                    class="mb-3 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Address">
                @error('address')
                    <p class="text-red-500 text-xs italic" >{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <div class="mb-3">
                    <select name="category"
                        class="form-select mb-3 appearance-none block w-full py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        <option selected disabled value="">Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="text-red-500 text-xs italic" >{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3">
                <input type="text" name="account_number" placeholder="Account Number"
                    class="mb-3 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                @error('account_number')
                    <p class="text-red-500 text-xs italic" >{{ $message }}</p>
                @enderror

            </div>
            <a href="#ex1" rel="modal:open" class="text-blue-500 hover:text-blue-600 italic">select your location
                -></a>
            @error('lng')
                <p class="text-red-500 mt-3 text-xs italic" >{{ $message }}</p>
            @enderror
            <div class="modal w-[460px]" id="ex1">
                <div class="p-6 h-[300px] relative bg-white border-gray-200">
                    <x-mapbox id="mapId" :draggable="true"
                    :center="['long' => 8, 'lat' => 10]"
                    class="w-[600px] absolute left-0 bottom-0" />
                </div>
            </div>
            <input type="hidden" name="lng" id="lng" value="">
            <input type="hidden" name="lat" id="lat" value="">
            <button type="submit"
                class="w-full px-6 mt-3 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Create</button>
        </form>
    </div>
</x-app-layout>
<script>
    marker.on('dragend', function(e) {
        // here you can get the coordinates as follows
        $('#lng').val(e.target.getLngLat().lng)
        $('#lat').val(e.target.getLngLat().lat)
    });
</script>
