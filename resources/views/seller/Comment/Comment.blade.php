<x-app-resturant>

    <x-slot name="resturant">
        {{ $resturant->id }}
    </x-slot>


    <div class="bg-white absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <div class="max-w-2xl border rounded">
            <div>
                <div class="w-[650px]">
                    <div class="relative flex items-center p-3 border-b border-gray-300">
                        <span class="block ml-2 font-bold text-gray-600">{{ $comment->user->name }}</span>
                    </div>
                    <div class="relative w-full p-6 overflow-y-auto h-[30rem]">

                        <ul class="space-y-2">
                            <li class="flex justify-start">
                                <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                    <span class="block">{{ $comment->message }}</span>
                                </div>
                            </li>
                            @forelse ($comment->replies as $reply)
                                <li class="flex justify-end" id="parent_{{ $reply->id }}">
                                    <div
                                        class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow flex flex-row-reverse gap-5">
                                        <span class="block"
                                            id="success_{{ $reply->id }}">{{ $reply->message }}</span>
                                        <div
                                            class="flex flex-row-reverse gap-3 items-center text-base font-semibold text-gray-900 dark:text-white">
                                            <a href="#{{ $reply->id }}" rel="modal:open" class="">
                                                <svg class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" />
                                                    <path
                                                        d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                    <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                    <line x1="16" y1="5" x2="19" y2="8" />
                                                </svg>
                                            </a>
                                            <a href="#{{ $reply->id }}delete" rel="modal:open">
                                                <svg class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div id="{{ $reply->id }}" class="modal bg-indigo-400">
                                            <div class="block p-6 rounded-lg shadow-lg shadow-zinc-800 bg-indigo-500">
                                                <input type="hidden" value="{{ $resturant->id }}" name="resturant_id">
                                                <div>
                                                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                    <div class="mb-6">
                                                        <input type="text" name="message"
                                                            value="dfsdfsdfsdfsd"
                                                            id="message_{{ $reply->id }}"
                                                            class="hover:shadow-xl hover:shadow-zinc-900/70 form-control mb-3 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                            placeholder="Message">
                                                        <p class="text-red-500 text-xs italic hidden"
                                                            id="message_error{{ $reply->id }}">gfgfg</p>
                                                    </div>
                                                    <button type="button" onclick="editComment(this)"
                                                        value="{{ $reply->id }}"
                                                        class="hover:shadow-zinc-900/70 w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-xl hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                                        <a href="#" rel="modal:close">Save</a>

                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="{{ $reply->id }}delete" class="modal w-[300px]">
                                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                            <div
                                                class="h-[150px] w-[150px] p-3 mx-auto flex flex-col gap-3 justify-around">
                                                <p class="text-center">Are you sure?</p>
                                                <div class="flex space-x-2 justify-center">
                                                    <button type="button" onclick="deleteComment(this)"
                                                        value="{{ $reply->id }}"
                                                        class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">

                                                        <a class="w-full" href="#" rel="modal:close">
                                                            Delete
                                                        </a></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @empty
                            @endforelse
                        </ul>

                    </div>

                    <form action="{{ route('seller.comments.store', [$resturant, $comment]) }}"
                        class="flex items-center justify-between w-full p-3 border-t border-gray-300" method="POST">
                        @csrf
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <input type="text" placeholder="Message"
                            class="block w-full py-2 pl-4 mx-3 bg-gray-100 rounded-full outline-none focus:text-gray-700"
                            name="message" required />
                        <button type="submit">
                            <svg class="w-5 h-5 text-gray-500 origin-center transform rotate-90"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                            </svg>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-resturant>

<script>
    editComment = function(e) {
        let _token = $("input[name=_token]").val();
        let resturant_id = $("input[name=resturant_id]").val();
        $.ajax({
            url: '/resturant/' + resturant_id + '/comments/' + e.value,
            type: "PUT",
            data: {
                message: $('#message_' + e.value).val(),
                _token: _token,
            },
            success: function(response) {

                console.log(response);

                if (response['errors'] != undefined) {
                    $('#message_error'+e.value).removeClass('hidden');
                    $('#message_error' + e.value).text(response['errors']['message'][0]);
                } else {
                    $('#success_' + e.value).text($('#message_' + e.value).val());
                }
            }
        });
    }

    deleteComment = function(e) {
        let _token = $("input[name=_token]").val();
        let resturant_id = $("input[name=resturant_id]").val();
        $.ajax({
            url: '/resturant/' + resturant_id + '/comments/' + e.value,
            type: "delete",
            data: {
                _token: _token,
            },
            success: function(response) {

                console.log(response);
                if (response['success']) {
                    $('#parent_'+e.value).addClass('hidden');
                }
            }
        });
    }
</script>
