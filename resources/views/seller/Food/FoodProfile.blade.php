@extends('layouts.Resturant.resturantApp')



@section('main')
    <div class="relative w-[700px] h-[500px] bg-white rounded-lg mx-auto mt-[10vh]">
        <div class="absolute top-[-60px] left-[-60px] w-fit rounded-full">
            <img src="{{ asset($food->image->path) }}" alt="" class="w-[180px] rounded-full">
        </div>
        <div class="flex flex-col gap-3 mx-auto w-[300px] pt-4 mb-10">
            <div class="italic"> Name : {{ $food->name }} </div>
            <div class="italic"> Price : {{ $food->price }} </div>
            <div class="italic"> Materials : {{ $food->materials }} </div>
            @empty(!$food->offer)
                <div class="italic"> Offer Name : {{ $food->offer->name }} </div>
                <div class="italic"> Offer Persent : {{ $food->offer->persent }} % </div>
            @endempty
        </div>
    </div>
@endsection
