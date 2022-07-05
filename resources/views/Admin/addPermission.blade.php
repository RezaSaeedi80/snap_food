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
                                                    <button onclick="addPermission(this)" value="{{ $item->id }}"
                                                        data-permission-name="add offer">
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
                                                    <button type="button" onclick="revokePermission(this)"
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
    addPermission = function(e) {
        console.log(e);
        // let _token = $("input[name=_token]").val();
        // $.ajax({
        //     url: "{{ route('category.store') }}",
        //     type: "POST",
        //     data: {
        //         name: $('#name').val(),
        //         type: $('#type').val(),
        //         _token: _token,
        //     },
        //     success: function(response) {

        //         console.log(response);

        //         if (response['error']['name'] != null) {
        //             $('#name_error').text(response['error']['name']);
        //             $('#name_error').removeClass('hidden');
        //         } else {
        //             $('#name_error').addClass('hidden');
        //         }
        //         if (response['error']['type'] != null) {
        //             $('#type_error').text(response['error']['type']);
        //             $('#type_error').removeClass('hidden');
        //         } else {
        //             $('#type_error').addClass('hidden');
        //         }

        //         if (response['success'] != null) {
        //             $('#ex1').modal('hide');
        //             location.reload();
        //         }
        //     }
        // });
    };


    revokePermission = function(e) {
        alert('jhftydetfbygdfytedyt')
        console.log(e);

        // let _token = $("input[name=_token]").val();
        // $.ajax({
        //     url: 'category/' + e.value,
        //     type: "PUT",
        //     data: {
        //         name: $('#name_' + e.value).val(),
        //         type: $('#type_' + e.value).val(),
        //         category_id: e.value,
        //         _token: _token,
        //     },
        //     success: function(response) {

        //         if (response['error']['name'] != null) {
        //             $('#name_error' + e.value).text(response['error']['name']);
        //             $('#name_error' + e.value).removeClass('hidden');
        //         } else {
        //             $('#name_error' + e.value).addClass('hidden');
        //         }
        //         if (response['error']['type'] != null) {
        //             $('#type_error' + e.value).text(response['error']['type']);
        //             $('#type_error' + e.value).removeClass('hidden');
        //         } else {
        //             $('#type_error' + e.value).addClass('hidden');
        //         }

        //         if (response['success'] != null) {
        //             $('#' + e.value).modal('hide');
        //             location.reload();
        //         }
        //     }
        // });
    }
