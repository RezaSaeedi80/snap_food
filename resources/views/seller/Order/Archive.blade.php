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
            </div>
        </div>
    </div>

</x-app-resturant>
