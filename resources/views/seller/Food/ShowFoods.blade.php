<x-app-resturant>

    <x-slot name="resturant">
        {{ $resturant->id }}
    </x-slot>



    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <div class="py-5">
            <div class="w-[900px] mx-auto bg-white rounded-lg p-3 overflow-auto">
                <div class="flow-root h-[600px]">

                    <div class="flex justify-between">
                        <form class="pb-4 bg-white dark:bg-gray-900">
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative mt-1">
                                <button type="submit" class="flex absolute inset-y-0 left-0 items-center pl-3">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <input type="text" id="table-search"
                                    name="search_food"
                                    class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search for items">
                            </div>
                        </form>
                        <div class="mb-4">
                            <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                                class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                type="button">
                                <span class="sr-only">Action button</span>
                                Filter
                                <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownAction"
                                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownActionButton">
                                    <li>
                                        <form class="w-full" action="{{ route('food.index', $resturant) }}"
                                            method="get">
                                            <input type="hidden" name="all" value="{{ 'all' }}">
                                            <button type="submit"
                                                class="text-left w-full block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                All
                                            </button>
                                        </form>
                                    </li>
                                    @foreach ($categories as $category)
                                        <li>
                                            <form class="w-full" action="{{ route('food.index', $resturant) }}"
                                                method="get">
                                                <input type="hidden" name="category" value="{{ $category->id }}">
                                                <button type="submit"
                                                    class="text-left w-full block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    {{ $category->name }}
                                                </button>
                                            </form>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="text-center py-3 px-6">
                                        Name
                                    </th>
                                    <th scope="col" class="text-center py-3 px-6">
                                        Price
                                    </th>
                                    <th scope="col" class="text-center py-3 px-6">
                                        Category
                                    </th>
                                    <th scope="col" class="text-center py-3 px-6">
                                        Date
                                    </th>
                                    <th scope="col" class="text-center py-3 px-6">
                                        Show
                                    </th>
                                    <th scope="col" class="text-center py-3 px-6">
                                        Edit
                                    </th>
                                    <th scope="col" class="text-center py-3 px-6">
                                        Delete
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($foods as $food)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="text-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $food->name }}
                                        </th>
                                        <td class="text-center py-4 px-6">
                                            {{ $food->price }}
                                        </td>
                                        <td class="text-center py-4 px-6">
                                            {{ $food->categories->first()->name }}
                                        </td>
                                        <td class="text-center py-4 px-6">
                                            {{ Carbon\Carbon::parse($food->created_at)->format('Y/m/d H:i:s') }}
                                        </td>
                                        <td class="text-center py-4 px-6">
                                            <a href="{{ route('food.show', [$resturant, $food]) }}">
                                                <svg class="h-5 w-5 text-green-500" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" />
                                                    <path
                                                        d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                                    <path d="M20 12h-13l3 -3m0 6l-3 -3" />
                                                </svg>
                                            </a>
                                        </td>
                                        <td class="text-center py-4 px-6">
                                            <a href="{{ route('food.edit', [$resturant, $food]) }}">
                                                <svg class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" />
                                                    <path
                                                        d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                    <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                    <line x1="16" y1="5" x2="19"
                                                        y2="8" />
                                                </svg>
                                            </a>
                                        </td>
                                        <td class="text-center py-4 px-6">
                                            <form action="{{ route('food.destroy', [$resturant, $food]) }}"
                                                class="w-fit" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-fit flex items-center">
                                                    <svg class="h-5 w-5 text-red-500" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" />
                                                        <line x1="4" y1="7" x2="20"
                                                            y2="7" />
                                                        <line x1="10" y1="11" x2="10"
                                                            y2="17" />
                                                        <line x1="14" y1="11" x2="14"
                                                            y2="17" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <nav class="flex w-full justify-between items-center pt-4" aria-label="Table navigation">
                            {{ $foods->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>





    {{-- <!--Container-->
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2
    container w-full md:w-4/5 xl:w-3/5  mx-auto mt-[4vh]">
        <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">ID</th>
                        <th data-priority="2">Name</th>
                        <th data-priority="3">Price</th>
                        <th data-priority="4">Category</th>
                        <th data-priority="5">Show</th>
                        <th data-priority="6">Edit</th>
                        <th data-priority="7">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($foods as $food)
                        <tr>
                            <td>
                                {{ $food->id }}
                            </td>
                            <td>
                                {{ $food->name }}
                            </td>
                            <td>
                                {{ $food->price }}
                            </td>
                            <td>
                                @foreach ($food->categories as $category)
                                    {{ $category->name }}
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('food.show', [$resturant, $food]) }}">
                                    <svg class="h-5 w-5 text-green-500" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                        <path d="M20 12h-13l3 -3m0 6l-3 -3" />
                                    </svg>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('food.edit', [$resturant, $food]) }}">
                                    <svg class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                        <line x1="16" y1="5" x2="19" y2="8" />
                                    </svg>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('food.destroy', [$resturant, $food]) }}" class="w-fit"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-fit flex items-center">
                                        <svg class="h-5 w-5 text-red-500" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <line x1="4" y1="7" x2="20" y2="7" />
                                            <line x1="10" y1="11" x2="10" y2="17" />
                                            <line x1="14" y1="11" x2="14" y2="17" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>


        </div>
        <!--/Card-->


    </div>
    <!--/container-->


    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {

            var table = $('#example').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script> --}}
</x-app-resturant>
