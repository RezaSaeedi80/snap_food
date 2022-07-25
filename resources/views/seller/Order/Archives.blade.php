<x-app-resturant>

    <x-slot name="resturant">
        {{ $resturant->id }}
    </x-slot>

    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <div class="py-5">
            <div class="w-[900px] mx-auto bg-white rounded-lg p-3 overflow-auto">
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
                                    <form class="w-full" action="{{ route('payment.archives', $resturant) }}"
                                        method="get">
                                        <input type="hidden" name="all" value="{{ 'all' }}">
                                        <button type="submit"
                                            class="text-left w-full block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            All
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <form class="w-full" action="{{ route('payment.archives', $resturant) }}"
                                        method="get">
                                        <input type="hidden" name="day" value="{{ 'yesterday' }}">
                                        <button type="submit"
                                            class="text-left w-full block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Yesterday
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <form class="w-full" action="{{ route('payment.archives', $resturant) }}"
                                        method="get">
                                        <input type="hidden" name="week" value="{{ 'last week' }}">
                                        <button type="submit"
                                            class="text-left w-full block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Last Week
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <form class="w-full" action="{{ route('payment.archives', $resturant) }}"
                                        method="get">
                                        <input type="hidden" name="month" value="{{ 'last month' }}">
                                        <button type="submit"
                                            class="text-left w-full block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Last Month
                                        </button>
                                    </form>
                                </li>
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
                                        Address
                                    </th>
                                    <th scope="col" class="text-center py-3 px-6">
                                        Price
                                    </th>
                                    <th scope="col" class="text-center py-3 px-6">
                                        Date
                                    </th>
                                    <th scope="col" class="text-center py-3 px-6">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($orders as $order)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="text-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $order->cart->user->name }}
                                        </th>
                                        <td class="text-center py-4 px-6">
                                            {{ $order->cart->user->addresses->where('current_address', true)->first()->address }}
                                        </td>
                                        <td class="text-center py-4 px-6">
                                            $ {{ $order->totalPrice }}
                                        </td>
                                        <td class="text-center py-4 px-6">
                                            {{ Carbon\Carbon::parse($order->created_at)->format('Y/m/d H:i:s') }}
                                        </td>
                                        <td class="text-center py-4 px-6">
                                            <a href="{{ route('payment.archives.show', [$resturant, $order]) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>
                                        </td>
                                    </tr>
                                @endforeach

                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="text-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Total Price
                                    </th>
                                    <td class="text-center py-4 px-6">
                                        -
                                    </td>
                                    <td class="text-center py-4 px-6">
                                        $ {{ $orders->sum('totalPrice') }}
                                    </td>
                                    <td class="text-center py-4 px-6">
                                        -
                                    </td>
                                    <td class="text-center py-4 px-6">
                                        -
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                        <nav class="flex justify-between items-center pt-4" aria-label="Table navigation">
                            {{ $orders->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-resturant>
