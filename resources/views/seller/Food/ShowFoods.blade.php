<x-app-resturant>

    <x-slot name="resturant">
        {{ $resturant->id }}
    </x-slot>

    <!--Container-->
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
    </script>
</x-app-resturant>
