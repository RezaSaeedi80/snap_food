<x-app-resturant>

    <x-slot name="resturant">
        {{ $resturant->id }}
    </x-slot>

    <div>
        <div class="py-12">
            <div class="w-[800px] mx-auto mt-[6vh] bg-white rounded-lg p-3 overflow-auto">
                <div class="flow-root h-[500px]">




                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <div class="flex justify-between items-center pb-4 bg-white dark:bg-gray-900">
                            <div>
                                <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                                    class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                    type="button">
                                    <span class="sr-only">Action button</span>
                                    Action
                                    <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownAction"
                                    class="z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 block"
                                    data-popper-reference-hidden="" data-popper-escaped=""
                                    data-popper-placement="bottom"
                                    style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 46.4px, 0px);">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownActionButton">
                                        <li>
                                            <a href="#"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate
                                                account</a>
                                        </li>
                                    </ul>
                                    <div class="py-1">
                                        <a href="#"
                                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                                            User</a>
                                    </div>
                                </div>
                            </div>
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text" id="table-search-users"
                                    class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search for users">
                            </div>
                        </div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all-search" type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Name
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Position
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Status
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="p-4 w-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-search-1" type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row"
                                        class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-10 h-10 rounded-full"
                                            src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
                                        <div class="pl-3">
                                            <div class="text-base font-semibold">Neil Sims</div>
                                            <div class="font-normal text-gray-500">neil.sims@flowbite.com</div>
                                        </div>
                                    </th>
                                    <td class="py-4 px-6">
                                        React Developer
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Online
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <a href="#"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit
                                            user</a>
                                    </td>
                                </tr>
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="p-4 w-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-search-2" type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-search-2" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row"
                                        class="flex items-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-10 h-10 rounded-full"
                                            src="/docs/images/people/profile-picture-3.jpg" alt="Jese image">
                                        <div class="pl-3">
                                            <div class="text-base font-semibold">Bonnie Green</div>
                                            <div class="font-normal text-gray-500">bonnie@flowbite.com</div>
                                        </div>
                                    </th>
                                    <td class="py-4 px-6">
                                        Designer
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Online
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <a href="#"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit
                                            user</a>
                                    </td>
                                </tr>
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="p-4 w-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-search-2" type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-search-2" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row"
                                        class="flex items-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-10 h-10 rounded-full"
                                            src="/docs/images/people/profile-picture-2.jpg" alt="Jese image">
                                        <div class="pl-3">
                                            <div class="text-base font-semibold">Jese Leos</div>
                                            <div class="font-normal text-gray-500">jese@flowbite.com</div>
                                        </div>
                                    </th>
                                    <td class="py-4 px-6">
                                        Vue JS Developer
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Online
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <a href="#"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit
                                            user</a>
                                    </td>
                                </tr>
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="p-4 w-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-search-2" type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-search-2" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row"
                                        class="flex items-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-10 h-10 rounded-full"
                                            src="/docs/images/people/profile-picture-5.jpg" alt="Jese image">
                                        <div class="pl-3">
                                            <div class="text-base font-semibold">Thomas Lean</div>
                                            <div class="font-normal text-gray-500">thomes@flowbite.com</div>
                                        </div>
                                    </th>
                                    <td class="py-4 px-6">
                                        UI/UX Engineer
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Online
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <a href="#"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit
                                            user</a>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="p-4 w-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-search-3" type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row"
                                        class="flex items-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-10 h-10 rounded-full"
                                            src="/docs/images/people/profile-picture-4.jpg" alt="Jese image">
                                        <div class="pl-3">
                                            <div class="text-base font-semibold">Leslie Livingston</div>
                                            <div class="font-normal text-gray-500">leslie@flowbite.com</div>
                                        </div>
                                    </th>
                                    <td class="py-4 px-6">
                                        SEO Specialist
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Offline
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <a href="#"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit
                                            user</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>






                    {{-- <ul id="filtering">
                        @foreach ($orders as $item)
                            <a href="{{ route('payment.archives.show', [$resturant, $item]) }}">
                                <li
                                    class="p-3 rounded-md sm:py-4 hover:shadow-lg hover:shadow-zinc-900/70 hover:bg-gray-100">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                {{ $item->cart->user->name }}
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                Address : {{ $item->cart->user->addresses
                                                                ->where('current_address', true)->first()->address }}
                                            </p>
                                        </div>
                                        <div>
                                            $ {{ $item->totalPrice }}
                                        </div>
                                    </div>
                                </li>
                            </a>
                        @endforeach
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>

</x-app-resturant>
