<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-[800px] mx-auto mt-[10vh] bg-white rounded-lg p-3 overflow-auto">
            <div class="flow-root h-[500px]">
                <ul id="filtering">
                    @foreach ($resturants as $item)
                        <li class="p-3 rounded-md sm:py-4 hover:shadow-lg hover:shadow-zinc-900/70 hover:bg-gray-100">
                            <div class="flex items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        {{ $item->name }}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        Phone : {{ $item->phone }}
                                    </p>
                                    <div class="text-sm text-gray-500 truncate dark:text-gray-400 flex gap-2">
                                        @foreach ($item->categories as $category)
                                            <div>
                                                {{ $category->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                    {{-- @dd($item->categories) --}}
                                </div>
                                <div
                                    class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                    {{ $item->account_number }}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
</x-app-layout>
