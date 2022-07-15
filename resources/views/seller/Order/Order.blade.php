<x-app-resturant>

    <x-slot name="resturant">
        {{ $resturant->id }}
    </x-slot>

    <div>
        <div
            class="bg-white w-[800px] h-[500px] py-3 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <div class="flex flex-col gap-4 items-center justify-center">
                <div class="text-[22px]">
                    Items
                </div>
                <div class="w-[500px] mx-auto bg-white rounded-lg p-3 overflow-auto">
                    <div class="flow-root h-[200px]">
                        <ul id="filtering">
                            @foreach ($payment->cart->cartItems as $item)
                                <li
                                    class="p-3 rounded-md sm:py-4 hover:shadow-lg hover:shadow-zinc-900/70 hover:bg-gray-100">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                {{ $item->food->name }}
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                Quantity : {{ $item->quantity }}
                                            </p>
                                        </div>
                                        <div>
                                            $ {{ $item->food->price_with_offer * $item->quantity }}
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mt-5">
                    <ol class="flex">
                        @if ($payment->status === 'pending')
                            <li
                                class="relative w-[150px] text-center text-sm font-light italic after:content-[''] after:absolute after:left-[50%] after:top-[200%] after:w-5 after:h-5 after:bg-blue-500 after:rounded-full after:z-50">
                                Pending
                            </li>
                            <li
                                class="relative w-[150px] text-center text-sm font-light italic before:content-[''] before:absolute before:left-[-50%] before:top-[calc(200%+0.5rem)] before:w-full before:h-1 before:bg-gray-300 after:content-[''] after:absolute after:left-[50%] after:top-[200%] after:w-5 after:h-5 after:bg-gray-300 after:rounded-full after:z-50">
                                Preparing
                            </li>

                            <li
                                class="relative w-[150px] text-center text-sm font-light italic before:content-[''] before:absolute before:left-[-50%] before:top-[calc(200%+0.5rem)] before:w-full before:h-1 before:bg-gray-300 after:content-[''] after:absolute after:left-[50%] after:top-[200%] after:w-5 after:h-5 after:bg-gray-300 after:rounded-full after:z-50">
                                Sending
                            </li>
                            <li
                                class="relative w-[150px] text-center text-sm font-light italic before:content-[''] before:absolute before:left-[-50%] before:top-[calc(200%+0.5rem)] before:w-full before:h-1 before:bg-gray-300 after:content-[''] after:absolute after:left-[50%] after:top-[200%] after:w-5 after:h-5 after:bg-gray-300 after:rounded-full after:z-50">
                                Delivered
                            </li>
                        @endif
                        @if ($payment->status === 'preparing')
                            <li
                                class="relative w-[150px] text-center text-sm font-light italic after:content-[''] after:absolute after:left-[50%] after:top-[200%] after:w-5 after:h-5 after:bg-blue-500 after:rounded-full after:z-50">
                                Pending
                            </li>
                            <li
                                class="relative w-[150px] text-center text-sm font-light italic before:content-[''] before:absolute before:left-[-50%] before:top-[calc(200%+0.5rem)] before:w-full before:h-1 before:bg-blue-500 after:content-[''] after:absolute after:left-[50%] after:top-[200%] after:w-5 after:h-5 after:bg-blue-500 after:rounded-full after:z-50">
                                Preparing
                            </li>

                            <li
                                class="relative w-[150px] text-center text-sm font-light italic before:content-[''] before:absolute before:left-[-50%] before:top-[calc(200%+0.5rem)] before:w-full before:h-1 before:bg-gray-300 after:content-[''] after:absolute after:left-[50%] after:top-[200%] after:w-5 after:h-5 after:bg-gray-300 after:rounded-full after:z-50">
                                Sending
                            </li>
                            <li
                                class="relative w-[150px] text-center text-sm font-light italic before:content-[''] before:absolute before:left-[-50%] before:top-[calc(200%+0.5rem)] before:w-full before:h-1 before:bg-gray-300 after:content-[''] after:absolute after:left-[50%] after:top-[200%] after:w-5 after:h-5 after:bg-gray-300 after:rounded-full after:z-50">
                                Delivered
                            </li>
                        @endif
                        @if ($payment->status === 'sending')
                            <li
                                class="relative w-[150px] text-center text-sm font-light italic after:content-[''] after:absolute after:left-[50%] after:top-[200%] after:w-5 after:h-5 after:bg-blue-500 after:rounded-full after:z-50">
                                Pending
                            </li>
                            <li
                                class="relative w-[150px] text-center text-sm font-light italic before:content-[''] before:absolute before:left-[-50%] before:top-[calc(200%+0.5rem)] before:w-full before:h-1 before:bg-blue-500 after:content-[''] after:absolute after:left-[50%] after:top-[200%] after:w-5 after:h-5 after:bg-blue-500 after:rounded-full after:z-50">
                                Preparing
                            </li>

                            <li
                                class="relative w-[150px] text-center text-sm font-light italic before:content-[''] before:absolute before:left-[-50%] before:top-[calc(200%+0.5rem)] before:w-full before:h-1 before:bg-blue-500 after:content-[''] after:absolute after:left-[50%] after:top-[200%] after:w-5 after:h-5 after:bg-blue-500 after:rounded-full after:z-50">
                                Sending
                            </li>
                            <li
                                class="relative w-[150px] text-center text-sm font-light italic before:content-[''] before:absolute before:left-[-50%] before:top-[calc(200%+0.5rem)] before:w-full before:h-1 before:bg-gray-300 after:content-[''] after:absolute after:left-[50%] after:top-[200%] after:w-5 after:h-5 after:bg-gray-300 after:rounded-full after:z-50">
                                Delivered
                            </li>
                        @endif
                        @if ($payment->status === 'delivered')
                            <li
                                class="relative w-[150px] text-center text-sm font-light italic after:content-[''] after:absolute after:left-[50%] after:top-[200%] after:w-5 after:h-5 after:bg-blue-500 after:rounded-full after:z-50">
                                Pending
                            </li>
                            <li
                                class="relative w-[150px] text-center text-sm font-light italic before:content-[''] before:absolute before:left-[-50%] before:top-[calc(200%+0.5rem)] before:w-full before:h-1 before:bg-blue-500 after:content-[''] after:absolute after:left-[50%] after:top-[200%] after:w-5 after:h-5 after:bg-blue-500 after:rounded-full after:z-50">
                                Preparing
                            </li>

                            <li
                                class="relative w-[150px] text-center text-sm font-light italic before:content-[''] before:absolute before:left-[-50%] before:top-[calc(200%+0.5rem)] before:w-full before:h-1 before:bg-blue-500 after:content-[''] after:absolute after:left-[50%] after:top-[200%] after:w-5 after:h-5 after:bg-blue-500 after:rounded-full after:z-50">
                                Sending
                            </li>
                            <li
                                class="relative w-[150px] text-center text-sm font-light italic before:content-[''] before:absolute before:left-[-50%] before:top-[calc(200%+0.5rem)] before:w-full before:h-1 before:bg-blue-500 after:content-[''] after:absolute after:left-[50%] after:top-[200%] after:w-5 after:h-5 after:bg-blue-500 after:rounded-full after:z-50">
                                Delivered
                            </li>
                        @endif
                    </ol>
                </div>
                <div class="mt-20">
                    <form action="{{ route('payment.status', [$resturant, $payment]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Chenge Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-resturant>
