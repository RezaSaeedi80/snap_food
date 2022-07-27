<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- flowbite -->
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
</head>

<body class="antialiased">
    <div style="background-image: url({{ asset('bg/bg3.jpg') }})" class="h-[100vh] bg-cover">


        <div class="relative flex items-top justify-center dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="mx-auto mt-[17vh] w-[1000px] h-[500px]">
                <!-- Implement the carousel -->
                <div class="relative w-full rounded-lg shadow-lg shadow-zinc-900/70">
                    @forelse ($banners as $banner)
                        <div class="slide relative">
                            <img class="w-full h-[500px] object-cover rounded-lg" src="{{ asset($banner->path) }}">
                            <div class="absolute bottom-0 w-full px-5 py-3 bg-black/40 text-center text-white">
                                {{ $banner->caption }}</div>
                        </div>
                    @empty
                        <div class="slide relative">
                            <img class="w-full h-[500px] object-cover" src="{{ asset('Default/default.jpg') }}">
                            <div class="absolute bottom-0 w-full px-5 py-3 bg-black/40 text-center text-white">
                                Default
                            </div>
                        </div>
                    @endforelse

                    {{-- <div class="slide relative">
                        <img class="w-full h-[500px] object-cover"
                            src="https://www.kindacode.com/wp-content/uploads/2022/07/flower-2.jpeg">
                        <div class="absolute bottom-0 w-full px-5 py-3 bg-black/40 text-center text-white">Flower Two
                            Caption</div>
                    </div>

                    <div class="slide relative">
                        <img class="w-full h-[500px] object-cover"
                            src="https://www.kindacode.com/wp-content/uploads/2022/07/flower-3.jpeg">
                        <div class="absolute bottom-0 w-full px-5 py-3 bg-black/40 text-center text-white">Flower Three
                            Caption
                        </div>
                    </div>
                    <div class="slide relative">
                        <img class="w-full h-[500px] object-cover" src="{{ asset('Default/default.jpg') }}">
                        <div class="absolute bottom-0 w-full px-5 py-3 bg-black/40 text-center text-white">Flower Three
                            Caption
                        </div>
                    </div> --}}


                    <!-- The previous button -->
                    <button
                        class="absolute left-0 top-1/2 p-4 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white hover:text-amber-500 cursor-pointer"
                        onclick="moveSlide(-1)">❮</button>

                    <!-- The next button -->
                    <button
                        class="absolute right-0 top-1/2 p-4 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white hover:text-amber-500 cursor-pointer"
                        onclick="moveSlide(1)">❯</button>

                </div>
                <br>

                <!-- The dots -->
                <div class="flex justify-center items-center space-x-5">
                    <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(1)"></div>
                    <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(2)"></div>
                    <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(3)"></div>
                </div>

                <!-- Javascript code -->
                <script>
                    // set the default active slide to the first one
                    let slideIndex = 1;
                    showSlide(slideIndex);

                    // change slide with the prev/next button
                    function moveSlide(moveStep) {
                        showSlide(slideIndex += moveStep);
                    }

                    // change slide with the dots
                    function currentSlide(n) {
                        showSlide(slideIndex = n);
                    }

                    function showSlide(n) {
                        let i;
                        const slides = document.getElementsByClassName("slide");
                        const dots = document.getElementsByClassName('dot');

                        if (n > slides.length) {
                            slideIndex = 1
                        }
                        if (n < 1) {
                            slideIndex = slides.length
                        }

                        // hide all slides
                        for (i = 0; i < slides.length; i++) {
                            slides[i].classList.add('hidden');
                        }

                        // remove active status from all dots
                        for (i = 0; i < dots.length; i++) {
                            dots[i].classList.remove('bg-yellow-500');
                            dots[i].classList.add('bg-green-600');
                        }

                        // show the active slide
                        slides[slideIndex - 1].classList.remove('hidden');

                        // highlight the active dot
                        dots[slideIndex - 1].classList.remove('bg-green-600');
                        dots[slideIndex - 1].classList.add('bg-yellow-500');
                    }
                </script>
            </div>

        </div>
    </div>
</body>

</html>
