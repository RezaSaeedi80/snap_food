<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-[800px] mx-auto mt-[6vh] bg-white rounded-lg p-3 overflow-auto">
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
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        {{ $item->account_number }}
                                    </div>
                                </div>
                                <div class="flex gap-3 pr-4">
                                    <form action="{{ route('resturant.restore', $item) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit">
                                            <svg class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                            </svg>
                                        </button>
                                    </form>
                                    <form action="{{ route('resturant.forceDelete', $item) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <svg class="h-8 w-8 text-red-500" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="10" />
                                                <line x1="15" y1="9" x2="9" y2="15" />
                                                <line x1="9" y1="9" x2="15" y2="15" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
</x-app-layout>
