@extends('layouts.Resturant.resturantApp')


@section('main')

        <!--Container-->
        <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto mt-[4vh]">
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
                                    <a href="{{ route('food.show', $food) }}" class="py-1 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">Show</a>
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

@endsection
