@extends('layouts.Resturant.resturantApp')



@section('main')
    <div class="relative w-[700px] h-[500px] mx-auto mt-[12vh] bg-white rounded-lg">
        <div class="absolute top-[-60px] left-[-60px] w-fit rounded-full">
            <img src="{{ asset('Default/default.jpg') }}" alt="" class="w-[180px] rounded-full">
            <button id="open-file"
                class="absolute right-0 bottom-0 inline-flex items-center justify-center w-10 h-10 text-gray-700 transition-colors duration-150 bg-gray-100 rounded-full focus:shadow-outline hover:bg-gray-200">

                <svg class="h-5 w-5 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
            </button>
        </div>
        <form class="w-[400px] mx-auto pt-[10vh]" method="POST" action="{{ route('food.update', [$resturant, $food]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="file" name="image" id="file" class="hidden">
            <div class="form-group mb-4">
                <input type="text" name="name"
                    value="{{ $food->name }}"
                    class="mb-2 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Name">
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror

            </div>
            <div class="form-group mb-4">
                <input type="text" name="price"
                    value="{{ $food->price }}"
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
            <div class="form-group mb-4">
                <div class="mb-2">
                    <select name="offer"
                        class="form-select mb-2 appearance-none block w-full py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        <option selected disabled value="">Offers</option>
                        @foreach ($offers as $offer)
                            <option value="{{ $offer->id }}">{{ $offer->name }}</option>
                        @endforeach
                    </select>
                    @error('offer')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3">
                <input type="text" name="materials" placeholder="Please separate the raw materials with a comma"
                    value="{{ $food->materials ?? '' }}"
                    class="mb-3 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                @error('materials')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full px-6 mt-3 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Save</button>
        </form>
    </div>
    <script>
        $('#open-file').click(function() {
            $('#file').click();
        })
    </script>
@endsection