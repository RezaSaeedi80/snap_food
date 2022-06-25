<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="block p-6 mx-auto mt-[22vh] rounded-lg shadow-zinc-900/70 shadow-xl bg-white max-w-md">
        <form>
            <div class="grid grid-cols-2 gap-4">
                <div class="form-group mb-6">
                    <input type="text" name="name"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="Name">
                </div>
                <div class="form-group mb-6">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="Phone">
                </div>
            </div>
            <div class="form-group mb-6">
                <div class="mb-3">
                    <select name="resturant_type"
                        class="form-select appearance-none block w-full py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        aria-label="Default select example">
                        <option selected disabled value="">Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group mb-3">
                <input type="text" name="account_number" placeholder="Account Number"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <a href="#ex1" rel="modal:open" class="text-blue-500 hover:text-blue-600 italic">select your location
                -></a>
            <div class="modal w-[460px]" id="ex1">
                <div class="p-6 h-[300px] relative bg-white border-gray-200">
                    <x-mapbox id="mapId" :draggable="true" class="w-[600px] absolute left-0 bottom-0" />
                </div>
            </div>
            <button type="submit"
                class="w-full px-6 mt-3 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Sign
                up</button>
        </form>
    </div>
</x-app-layout>
<script>
    marker.on('dragend', function(e) {
        // here you can get the coordinates as follows
        console.log(e.target.getLngLat().lng);
        console.log(e.target.getLngLat().lat);
    });
</script>
