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
                        <div class="flex gap-3 items-center mb-4">
                            <h5 class="pl-3 text-xl font-bold leading-none text-gray-900 dark:text-white">Categories</h5>
                            <div class="pt-1">
                                <a href="#ex1" rel="modal:open"
                                    class="inline-flex items-center justify-center w-10 h-10 mr-2 text-gray-700 transition-colors duration-150 bg-white rounded-full focus:shadow-outline hover:bg-gray-200">

                                    <svg class="h-5 w-5 text-black" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>

                                </a>
                            </div>
                            <div id="ex1" class="modal bg-indigo-400">
                                <div class="block p-6 rounded-lg shadow-lg shadow-zinc-800 bg-indigo-500">
                                    <div class="">
                                        <input type="hidden" value="{{ csrf_token() }}">
                                        <div class="mb-6">
                                            <input type="text" name="name"
                                                class="hover:shadow-xl hover:shadow-zinc-900/70 form-control mb-3 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                id="name" placeholder="Name">
                                            <p class="text-red-500 text-xs italic hidden" id="name_error"></p>
                                        </div>
                                        <div class="mb-6">
                                            <input type="text" name="type"
                                                class="hover:shadow-xl hover:shadow-zinc-900/70  form-control mb-3 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                id="type" placeholder="Type">
                                            <p class="text-red-500 text-xs italic hidden" id="type_error"></p>
                                        </div>
                                        <button type="submit" onclick="Category(this)"
                                            class="hover:shadow-zinc-900/70  w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-xl hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flow-root">
                            <ul role="list">
                                @foreach ($categories as $item)
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
                                                        Type : {{ $item->type }}
                                                    </p>
                                                </div>
                                                <div
                                                    class="inline-flex gap-3 items-center text-base font-semibold text-gray-900 dark:text-white">
                                                    <a href="#{{ $item->id }}" rel="modal:open" class="">
                                                        <svg class="h-5 w-5 text-blue-500" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" />
                                                            <path
                                                                d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                            <line x1="16" y1="5" x2="19"
                                                                y2="8" />
                                                        </svg>
                                                    </a>
                                                    <a href="#{{ $item->id }}delete" rel="modal:open">
                                                        <svg class="h-5 w-5 text-red-500" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div id="{{ $item->id }}" class="modal bg-indigo-400">
                                                <div
                                                    class="block p-6 rounded-lg shadow-lg shadow-zinc-800 bg-indigo-500">
                                                    <input type="hidden" value="{{ $item->id }}"
                                                        name="category_id">
                                                    <div>
                                                        <input type="hidden" value="{{ csrf_token() }}"
                                                            name="_token">
                                                        <div class="mb-6">
                                                            <input type="text" name="name"
                                                                id="name_{{ $item->id }}"
                                                                class="hover:shadow-xl hover:shadow-zinc-900/70 form-control mb-3 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                                placeholder="Name">
                                                            <p class="text-red-500 text-xs italic hidden"
                                                                id="name_error{{ $item->id }}"></p>
                                                        </div>
                                                        <div class="mb-6">
                                                            <input type="text" name="type"
                                                                class="hover:shadow-xl hover:shadow-zinc-900/70 form-control mb-3 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                                id="type_{{ $item->id }}"
                                                                placeholder="Type">
                                                            <p class="text-red-500 text-xs italic hidden"
                                                                id="type_error{{ $item->id }}"></p>
                                                        </div>
                                                        <button type="button" onclick="CategoryEdit(this)"
                                                            value="{{ $item->id }}"
                                                            class="hover:shadow-zinc-900/70 w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-xl hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">add</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="{{ $item->id }}delete" class="modal w-[300px]">
                                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                <div
                                                    class="h-[150px] w-[150px] p-3 mx-auto flex flex-col gap-3 justify-around">
                                                    <p class="text-center">Are you sure?</p>
                                                    <div class="flex space-x-2 justify-center">
                                                        <button type="button" onclick="deleteCategory(this)"
                                                            value="{{ $item->id }}"
                                                            class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Delete</button>
                                                    </div>
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
</x-app-layout>

<script>
    Category = function (e) {
    let _token = $("input[name=_token]").val();
    $.ajax({
        url: "{{ route('category.store') }}",
        type: "POST",
        data: {
            name: $('#name').val(),
            type: $('#type').val(),
            _token: _token,
        },
        success: function(response) {

            if (response['error']['name'] != null) {
                $('#name_error').text(response['error']['name']);
                $('#name_error').removeClass('hidden');
            } else {
                $('#name_error').addClass('hidden');
            }
            if (response['error']['type'] != null) {
                $('#type_error').text(response['error']['type']);
                $('#type_error').removeClass('hidden');
            } else {
                $('#type_error').addClass('hidden');
            }

            if (response['success'] != null) {
                $('#ex1').modal('hide');
                location.reload();
            }
        }
    });
}


CategoryEdit = function (e) {
    let _token = $("input[name=_token]").val();
    $.ajax({
        url: 'category/'+e.value,
        type: "PUT",
        data: {
            name: $('#name_' + e.value).val(),
            type: $('#type_' + e.value).val(),
            category_id: e.value,
            _token: _token,
        },
        success: function(response) {

            if (response['error']['name'] != null) {
                $('#name_error' + e.value).text(response['error']['name']);
                $('#name_error' + e.value).removeClass('hidden');
            } else {
                $('#name_error' + e.value).addClass('hidden');
            }
            if (response['error']['type'] != null) {
                $('#type_error' + e.value).text(response['error']['type']);
                $('#type_error' + e.value).removeClass('hidden');
            } else {
                $('#type_error' + e.value).addClass('hidden');
            }

            if (response['success'] != null) {
                $('#'+e.value).modal('hide');
                location.reload();
            }
        }
    });
}

deleteCategory = function (e) {
    let _token = $("input[name=_token]").val();
    $.ajax({
        url: "category/"+e.value,
        type: "DELETE",
        data: {
            category_id: e.value,
            _token: _token,
        },
        success: function(response) {

            if (response['success'] != null) {
                $('#' + e.value + 'delete').modal('hide');
                location.reload();
            }
        }
    });
}
</script>
