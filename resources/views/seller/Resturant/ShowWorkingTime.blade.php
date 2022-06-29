@extends('layouts.Resturant.resturantApp')


@section('main')
    <div class="flex flex-col gap-5 w-[500px] mx-auto mt-[15vh] bg-white rounded-lg">
        <div class="text-center">
            <span>You can <a href="{{ route('time.edit', [$time_working->resturant->id, $time_working]) }}" class="text-blue-400 hover:text-blue-600 underline">edit</a> your working time</span>
        </div>
        <div class="relative overflow-x-auto rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Day
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Start Time
                        </th>
                        <th scope="col" class="px-6 py-3">
                            End Time
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Saturday
                        </th>
                        <td class="px-6 py-4">
                            {{ explode('-', $time_working->saturday)[0] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ explode('-', $time_working->saturday)[1] }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Sunday
                        </th>
                        <td class="px-6 py-4">
                            {{ explode('-', $time_working->sunday)[0] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ explode('-', $time_working->sunday)[1] }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Monday
                        </th>
                        <td class="px-6 py-4">
                            {{ explode('-', $time_working->monday)[0] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ explode('-', $time_working->monday)[1] }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Thusday
                        </th>
                        <td class="px-6 py-4">
                            {{ explode('-', $time_working->thusday)[0] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ explode('-', $time_working->thusday)[1] }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Wednesday
                        </th>
                        <td class="px-6 py-4">
                            {{ explode('-', $time_working->wednesday)[0] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ explode('-', $time_working->wednesday)[1] }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Thursday
                        </th>
                        <td class="px-6 py-4">
                            {{ explode('-', $time_working->thursday)[0] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ explode('-', $time_working->thursday)[1] }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Friday
                        </th>
                        <td class="px-6 py-4">
                            {{ explode('-', $time_working->friday)[0] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ explode('-', $time_working->friday)[1] }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
