@extends('layouts.Resturant.resturantApp')



@section('main')
    <div class="w-[700px] bg-white rounded-lg mx-auto mt-[10vh]">
        <div class="absolute top-[-60px] left-[-60px] w-fit rounded-full">
            <img src="{{ asset('Default/default.jpg') }}" alt="" class="w-[180px] rounded-full">
        </div>
        <div class="flex flex-col gap-3 mx-auto w-[300px] pt-4 mb-10">
            <div class="italic"> Name : {{ $food->name }} </div>
            <div class="italic">  : {{ $resturant->phone }} </div>
            <div class="italic"> Account Number : {{ $resturant->account_number }} </div>
            <div class="italic"> Latitude : {{ $resturant->lat }} </div>
            <div class="italic"> Longitude : {{ $resturant->lng }} </div>
        </div>
    </div>
@endsection
