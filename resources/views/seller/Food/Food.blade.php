{{-- @dd($resturant->image) --}}
@extends('layouts.Resturant.resturantApp')



@section('main')
    <div class="relative  w-[700px] h-[500px] mx-auto mt-[12vh] bg-white rounded-lg">
        <div class="absolute top-[-60px] left-[-60px] w-fit rounded-full">
            <img src="{{ asset($resturant->image->path) }}" alt="" class="w-[180px] rounded-full">
        </div>
        <div class="flex flex-col gap-3 mx-auto w-[300px] pt-4 mb-10">
            <div class="italic"> Name : {{ $resturant->name }} </div>
            <div class="italic"> Phone : {{ $resturant->phone }} </div>
            <div class="italic"> Account Number : {{ $resturant->account_number }} </div>
            <div class="italic"> Address Title : {{ $resturant->addresses->first()->title }} </div>
            <div class="italic"> Address : {{ $resturant->addresses->first()->address }} </div>
            <div class="italic"> Latitude : {{ $resturant->addresses->first()->latitude }} </div>
            <div class="italic"> Longitude : {{ $resturant->addresses->first()->longitude }} </div>

            @can('view', $resturant->time_working)
                <div class="italic "> times : <a class="text-blue-400 hover:text-blue-700" href="{{ route('time.show', [$resturant, $resturant->time_working]) }}"> show </a> </div>
            @endcan
        </div>

        <div class="text-center">
            <div class="font-[700] text-[20px] italic">Abillity</div>
            <div class="flex flex-col gap-3">
                <div class="flex">
                    <a class="italic w-[50%] text-blue-500" href="{{ route('time.create', $resturant) }}">Working Time</a>
                    <a class="italic w-[50%] text-blue-500" href="{{ route('resturant.edit', $resturant) }}">Edit</a>
                </div>
                <div class="flex">
                    <form class="w-[50%]" action="{{ route('resturant.destroy', $resturant) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="italic text-blue-500">
                            delete
                        </button>
                    </form>
                    <a class="italic w-[50%] text-blue-500" href="{{ route('food.index', $resturant) }}">food</a>
                </div>
                <div class="flex">
                    <a class="italic w-[50%] text-blue-500" href="{{ route('food.create', $resturant) }}">Create Food</a>
                    {{-- <a class="italic w-[50%] text-blue-500" href="{{ route('resturant.edit', $resturant) }}">Edit</a> --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#open-file').click(function() {
            $('#file').click();
        })
    </script>
@endsection
