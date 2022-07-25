<x-app-resturant>

    <x-slot name="resturant">
        {{ $resturant->id }}
    </x-slot>

    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <div class="py-5">
            <div class="w-[1000px] mx-auto bg-white rounded-lg p-3 overflow-auto">
                <div class="flow-root h-[600px]">




                    <div class="mb-4">
                        <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                            class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                            type="button">
                            <span class="sr-only">Action button</span>
                            Filter
                            <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownAction"
                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownActionButton">
                                <li>
                                    <form class="w-full" action="{{ route('seller.comments.notApproved', $resturant) }}"
                                        method="get">
                                        <input type="hidden" name="all" value="{{ 'all' }}">
                                        <button type="submit"
                                            class="text-left w-full block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            All
                                        </button>
                                    </form>
                                </li>
                                @foreach ($resturant->food as $food)
                                    <li>
                                         <form class="w-full" action="{{ route('seller.comments.notApproved', $resturant) }}"
                                            method="get">
                                            <input type="hidden" name="food_id" value="{{ $food->id }}">
                                            <button type="submit"
                                                class="text-left w-full block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                {{ $food->name }}
                                            </button>
                                        </form>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>


                    <div class="p-3 relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="text-center py-3 px-6">
                                        Name
                                    </th>
                                    <th scope="col" class="text-center py-3 px-6">
                                        Message
                                    </th>
                                    <th scope="col" class="text-center py-3 px-6">
                                        Score
                                    </th>
                                    <th scope="col" class="text-center py-3 px-6">
                                        Date
                                    </th>
                                    <th scope="col" class="text-center py-3 px-6">
                                        Approve
                                    </th>
                                    <th scope="col" class="text-center py-3 px-6">
                                        Reject
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($comments as $comment)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="text-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $comment->user->name }}
                                        </th>
                                        <td class="text-center py-4 px-6">
                                            {{ $comment->message }}
                                        </td>
                                        <td class="text-center py-4 px-6">
                                            {{ $comment->score }}
                                        </td>
                                        <td class="text-center py-4 px-6">
                                            {{ Carbon\Carbon::parse($comment->created_at)->format('Y/m/d H:i:s') }}
                                        </td>
                                        <td class="text-center py-4 px-6">
                                            <form method="post"
                                                action="{{ route('seller.comments.approve', [$resturant, $comment]) }}">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit">
                                                    <svg class="h-[24px] w-[24px] text-green-500" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-center py-4 px-6">
                                            <form method="post"
                                                action="{{ route('seller.comments.reject', [$resturant, $comment]) }}">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit">
                                                    <svg class="h-5 w-5 text-red-500" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <circle cx="12" cy="12" r="10" />
                                                        <line x1="15" y1="9" x2="9"
                                                            y2="15" />
                                                        <line x1="9" y1="9" x2="15"
                                                            y2="15" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <nav class="flex justify-between items-center pt-4" aria-label="Table navigation">
                            {{ $comments->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-resturant>
