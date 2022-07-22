<x-app-resturant>

    <x-slot name="resturant">
        {{ $resturant->id }}
    </x-slot>

    <div>
        <div class="py-12">
            <div class="w-[800px] mx-auto mt-[6vh] bg-white rounded-lg p-3 overflow-auto">
                <div class="flow-root h-[500px]">
                    <ul id="filtering">
                        @foreach ($comments as $item)
                            <a href="{{ route('seller.comments.show', [$resturant, $item]) }}">
                                <li
                                    class="p-3 rounded-md sm:py-4 hover:shadow-lg hover:shadow-zinc-900/70 hover:bg-gray-100">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                {{ $item->user->name }}
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                Score: {{ $item->score }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-resturant>
