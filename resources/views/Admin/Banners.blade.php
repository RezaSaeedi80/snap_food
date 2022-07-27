<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div
        class="py-12 bg-white rounded-md w-[700px] h-[500px] absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <a href="{{ route('banner.create') }}" class="italic underline text-blue-500">Create Banner</a>
        @forelse ($banners as $banner)
            <div class="flex flex-col gap-5 items-center mx-auto w-[300px]">
                <div>
                    <img src="{{ asset($banner->path) }}" alt="" class="w-[200px] h-[200px] rounded-full">
                </div>
                <div>
                    <p>{{ $banner->caption }}</p>
                </div>
                <div class="flex gap-4 items-center">
                    @if (!$banner->show)
                        <form action="{{ route('banner.showBanner', $banner) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit">
                                <svg class="h-5 w-5 text-green-500" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <line x1="15" y1="6" x2="15.01" y2="6" />
                                    <rect x="3" y="3" width="18" height="14" rx="3" />
                                    <path d="M3 13l4 -4a3 5 0 0 1 3 0l 4 4" />
                                    <path d="M13 12l2 -2a3 5 0 0 1 3 0l 3 3" />
                                    <line x1="8" y1="21" x2="8.01" y2="21" />
                                    <line x1="12" y1="21" x2="12.01" y2="21" />
                                    <line x1="16" y1="21" x2="16.01" y2="21" />
                                </svg>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('banner.dontShowBanner', $banner) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit">
                                <svg class="h-5 w-5 text-red-500" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <line x1="15" y1="6" x2="15.01" y2="6" />
                                    <rect x="3" y="3" width="18" height="14" rx="3" />
                                    <path d="M3 13l4 -4a3 5 0 0 1 3 0l 4 4" />
                                    <path d="M13 12l2 -2a3 5 0 0 1 3 0l 3 3" />
                                    <line x1="8" y1="21" x2="8.01" y2="21" />
                                    <line x1="12" y1="21" x2="12.01" y2="21" />
                                    <line x1="16" y1="21" x2="16.01" y2="21" />
                                </svg>
                            </button>
                        </form>
                    @endif
                    <form method="get" action="{{ route('banner.edit', $banner) }}">
                        @csrf
                        <button type="submit">
                            <svg class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                <line x1="16" y1="5" x2="19" y2="8" />
                            </svg>
                        </button>
                    </form>
                    <form method="post" action="{{ route('banner.destroy', $banner) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit">
                            <svg class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        @empty
        @endforelse

        <div class="mx-auto w-[400px] fixed bottom-0 left-0 right-0">
            {{ $banners->links() }}
        </div>
    </div>
</x-app-layout>
