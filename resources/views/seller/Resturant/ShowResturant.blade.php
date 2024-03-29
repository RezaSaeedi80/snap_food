<x-app-resturant>

    <x-slot name="resturant">
        {{ $resturant->id }}
    </x-slot>

    <div id="body" class="font-sans antialiased text-gray-900 leading-normal tracking-wider bg-cover">



        <div class="max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0">

            <!--Main Col-->
            <div id="profile"
                class="w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white opacity-75 mx-6 lg:mx-0">


                <div class="p-4 md:p-12 text-center lg:text-left">
                    <!-- Image for mobile view-->
                    <div class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center"
                        style="background-image: url({{ asset($resturant->image->path) }})"></div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="flex gap-3 items-center">
                        <h1 class="text-3xl font-bold pt-8 lg:pt-0">{{ $resturant->name }}</h1>
                        <button onclick="openResturant(this)"
                            class="flex items-center {{ $resturant->is_open ? 'hidden' : '' }}"
                            value="{{ $resturant->id }}" id="open">
                            <svg class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                            </svg>
                        </button>
                        <button onclick="closeResturant(this)" value="{{ $resturant->id }}">
                            <svg class="h-6 w-6 text-red-500 {{ !$resturant->is_open ? 'hidden' : '' }}" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" id="close">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </button>
                    </div>
                    <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25"></div>
                    <p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start"><svg
                            class="h-4 fill-current text-green-700 pr-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z" />
                        </svg> What you do</p>
                    <p class="pt-2 text-gray-600 text-xs lg:text-sm flex items-center justify-center lg:justify-start">
                        <svg class="h-4 fill-current text-green-700 pr-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm7.75-8a8.01 8.01 0 0 0 0-4h-3.82a28.81 28.81 0 0 1 0 4h3.82zm-.82 2h-3.22a14.44 14.44 0 0 1-.95 3.51A8.03 8.03 0 0 0 16.93 14zm-8.85-2h3.84a24.61 24.61 0 0 0 0-4H8.08a24.61 24.61 0 0 0 0 4zm.25 2c.41 2.4 1.13 4 1.67 4s1.26-1.6 1.67-4H8.33zm-6.08-2h3.82a28.81 28.81 0 0 1 0-4H2.25a8.01 8.01 0 0 0 0 4zm.82 2a8.03 8.03 0 0 0 4.17 3.51c-.42-.96-.74-2.16-.95-3.51H3.07zm13.86-8a8.03 8.03 0 0 0-4.17-3.51c.42.96.74 2.16.95 3.51h3.22zm-8.6 0h3.34c-.41-2.4-1.13-4-1.67-4S8.74 3.6 8.33 6zM3.07 6h3.22c.2-1.35.53-2.55.95-3.51A8.03 8.03 0 0 0 3.07 6z" />
                        </svg> Address - {{ $resturant->addresses->first()->address }}
                    </p>
                    <p class="pt-2 text-gray-600 text-xs lg:text-sm flex items-center justify-center lg:justify-start">
                        <svg class="h-4 fill-current text-green-700 pr-4" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                        </svg>
                        Phone - {{ $resturant->phone }}
                    </p>
                    <p class="pt-2 text-gray-600 text-xs lg:text-sm flex items-center justify-center lg:justify-start">
                        <svg class="h-4 text-green-700 pr-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                            <circle cx="12" cy="10" r="3" />
                        </svg>
                        Address - {{ $resturant->addresses->first()->address }}
                    </p>
                    <p class="pt-2 text-gray-600 text-xs lg:text-sm flex items-center justify-center lg:justify-start">

                        <svg class="h-4 w-8 text-green-700 pr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <a href="{{ route('food.chart', $resturant) }}">Food sales results(foods)</a>
                    </p>
                    <p class="pt-2 text-gray-600 text-xs lg:text-sm flex items-center justify-center lg:justify-start">
                        <svg class="h-4 w-8 text-green-700 pr-4" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path
                                d="M10 3.2a9 9 0 1 0 10.8 10.8a1 1 0 0 0 -1 -1h-6.8a2 2 0 0 1 -2 -2v-7a.9 .9 0 0 0 -1 -.8" />
                            <path d="M15 3.5a9 9 0 0 1 5.5 5.5h-4.5a1 1 0 0 1 -1 -1v-4.5" />
                        </svg>
                        <a href="{{ route('category.chart', $resturant) }}">Food sales results(categories)</a>
                    </p>

                    <div class="mt-6 pb-16 lg:pb-0 w-4/5 lg:w-full mx-auto flex flex-wrap items-center gap-4">
                        <a class="" href="{{ route('resturant.edit', $resturant) }}">
                            <svg class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                <line x1="16" y1="5" x2="19" y2="8" />
                            </svg>
                        </a>
                        <form class="w-fit pt-2" action="{{ route('resturant.destroy', $resturant) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="">
                                <svg class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>

                            </button>
                        </form>
                        @can('view', $resturant->time_working)
                            <a href="{{ route('timeWorking.show', [$resturant, $resturant->time_working]) }}">
                                <svg class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2"
                                        ry="2" />
                                    <line x1="16" y1="2" x2="16" y2="6" />
                                    <line x1="8" y1="2" x2="8" y2="6" />
                                    <line x1="3" y1="10" x2="21" y2="10" />
                                </svg>
                            </a>
                        @endcan


                    </div>

                    <!-- Use https://simpleicons.org/ to find the svg for your preferred product -->

                </div>

            </div>

            <!--Img Col-->
            <div class="w-full lg:w-2/5">
                <!-- Big profile image for side bar (desktop) -->
                <img src="{{ asset($resturant->image->path) }}"
                    class="rounded-none lg:h-[380px] lg:rounded-lg shadow-2xl hidden lg:block">
                <!-- Image from: http://unsplash.com/photos/MP0IUfwrn0A -->

            </div>


            <!-- Pin to top right corner -->
            <div class="absolute top-0 right-0 h-12 w-18 p-4">
                <button class="js-change-theme focus:outline-none">🌙</button>
            </div>

        </div>

        <script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/tippy.js@4"></script>
        <script>
            //Init tooltips
            tippy('.link', {
                placement: 'bottom'
            })

            //Toggle mode
            const toggle = document.querySelector('.js-change-theme');
            const body = document.getElementById('body');
            const profile = document.getElementById('profile');


            toggle.addEventListener('click', () => {

                if (body.classList.contains('text-gray-900')) {
                    toggle.innerHTML = "☀️";
                    body.classList.remove('text-gray-900');
                    body.classList.add('text-gray-100');
                    profile.classList.remove('bg-white');
                    profile.classList.add('bg-gray-900');
                } else {
                    toggle.innerHTML = "🌙";
                    body.classList.remove('text-gray-100');
                    body.classList.add('text-gray-900');
                    profile.classList.remove('bg-gray-900');
                    profile.classList.add('bg-white');

                }
            });
        </script>

    </div>

</x-app-resturant>
<script>
    openResturant = function(e) {
        let _token = $("input[name=_token]").val();
        let resturant_id = e.value

        $.ajax({
            url: "/resturant/" + e.value + '/open',
            type: "PUT",
            data: {
                _token: _token,
                resturant_id: e.value,
            },
            success: function(response) {
                if (response['result'] == true) {
                    $('#open').addClass('hidden');
                    $('#close').removeClass('hidden');
                }
            }
        });
    };

    closeResturant = function(e) {
        let _token = $("input[name=_token]").val();
        let resturant_id = e.value

        $.ajax({
            url: "/resturant/" + e.value + '/close',
            type: "PUT",
            data: {
                _token: _token,
                resturant_id: e.value,
            },
            success: function(response) {
                console.log(response);
                if (response['result'] == true) {
                    $('#close').addClass('hidden');
                    $('#open').removeClass('hidden');
                }
            }
        });
    }
</script>
