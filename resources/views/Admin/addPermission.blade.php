<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div
                        class="shadow-zinc-900/70 mx-auto p-4 w-[700px] bg-white rounded-lg border shadow-xl sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flow-root">
                            <ul role="list">
                                @foreach ($sellers as $item)
                                    <div>
                                        <li id="{{ $item->id }}li"
                                            class="p-3 rounded-md sm:py-4 hover:shadow-lg hover:shadow-zinc-900/70 hover:bg-gray-100">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-1 min-w-0">
                                                    <p
                                                        class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                        {{ $item->name }}
                                                    </p>
                                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                        Email : {{ $item->email }}
                                                    </p>
                                                </div>
                                                <div>
                                                    <input type="hidden" value="{{ csrf_token() }}">
                                                    <button onclick="permissionRevoke(this)" id="{{ 'revoke'.$item->id }}"
                                                        class="{{ !$item->hasPermissionTo('add offer') ? 'hidden' : '' }}"
                                                        value="{{ $item->id }}"
                                                        data-permission-revoke-value="add offer">
                                                        <svg class="h-5 w-5 text-red-500" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <circle cx="12" cy="12" r="10" />
                                                            <line x1="15" y1="9" x2="9"
                                                                y2="15" />
                                                            <line x1="9" y1="9" x2="15"
                                                                y2="15" />
                                                        </svg>
                                                    </button>
                                                    <button type="button" onclick="permissionAdd(this)" id="{{ 'add'.$item->id }}"
                                                        class="{{ $item->hasPermissionTo('add offer') ? 'hidden' : '' }}"
                                                        data-permission-add-value="add offer"
                                                        value="{{ $item->id }}">
                                                        <svg class="h-5 w-5 text-green-500" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </li>

                                    </div>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ $sellers->links() }}



</x-app-layout>

<script>
    permissionAdd = function(e) {
        let permissionName = e.getAttribute("data-permission-add-value");
        let _token = $("input[name=_token]").val();
        let user_id = e.value

        $.ajax({
            url: "/permission/" + e.value + '/add',
            type: "POST",
            data: {
                _token: _token,
                user_id: e.value,
                permission: permissionName,
            },
            success: function(response) {

                if (response['result'] == true) {
                    $('#add'+e.value).addClass('hidden');
                    $('#revoke'+e.value).removeClass('hidden');
                }
            }
        });
    };

    permissionRevoke = function(e) {
        let permissionName = e.getAttribute("data-permission-revoke-value");
        let _token = $("input[name=_token]").val();
        let user_id = e.value

        $.ajax({
            url: "/permission/" + e.value + '/revoke',
            type: "POST",
            data: {
                _token: _token,
                user_id: e.value,
                permission: permissionName,
            },
            success: function(response) {

                if (response['result'] == true) {
                    $('#revoke'+e.value).addClass('hidden');
                    $('#add'+e.value).removeClass('hidden');
                }
            }
        });
    }
</script>
