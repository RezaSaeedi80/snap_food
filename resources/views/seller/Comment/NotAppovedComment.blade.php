<x-app-resturant>

    <x-slot name="resturant">
        {{ $resturant->id }}
    </x-slot>

    <div>
        <div class="py-12">
            <div class="w-[800px] mx-auto mt-[6vh] bg-white rounded-lg p-3 overflow-auto">
                <div class="h-[500px] flex flex-col justify-between">
                    <ul id="filtering">
                        @foreach ($comments as $item)
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
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            Message: {{ $item->message }}
                                        </p>
                                    </div>
                                    <form method="post" action="{{ route('seller.comments.reject', [$resturant, $item]) }}">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit">
                                            <svg class="h-5 w-5 text-red-500" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="10" />
                                                <line x1="15" y1="9" x2="9" y2="15" />
                                                <line x1="9" y1="9" x2="15" y2="15" />
                                            </svg>
                                        </button>
                                    </form>
                                    <form method="post" action="{{ route('seller.comments.approve', [$resturant, $item]) }}">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit">
                                            <svg class="h-[24px] w-[24px] text-green-500" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>

                            </li>
                        @endforeach
                    </ul>
                    <div>
                        {{ $comments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-resturant>
