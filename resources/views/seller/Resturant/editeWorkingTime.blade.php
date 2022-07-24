<x-app-resturant>

    <x-slot name="resturant">
        {{ $resturant->id }}
    </x-slot>

    <div class="bg-white absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] p-3 rounded-lg">

        <form action="{{ route('timeWorking.update', [$resturant, $timeWorking]) }}" method="POST"
            class="bg-white w-full flex flex-col gap-4">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-2">
                <div class="flex justify-between items-center">
                    <span class="italic">Saturday</span>
                    <div class="flex flex-col gap-1">
                        <div class="w-[600px] flex justify-between items-center text-center px-4">
                            <div class="flex gap-3 w-[48%] items-center">
                                <label for="">Start</label>
                                <input type="time" name="saturday_start"
                                    value="{{ explode('-', $timeWorking->saturday)[0] }}"
                                    class="block w-full text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            </div>
                            <div class="flex gap-3 w-[48%] items-center">
                                <label for="">End</label>
                                <input type="time" name="saturday_end"
                                    value="{{ explode('-', $timeWorking->saturday)[1] }}"
                                    class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            </div>
                        </div>
                    </div>
                </div>
                @error('saturday_end')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col gap-2">
                <div class="flex flex-col gap-2">
                    <div class="flex justify-between items-center">
                        <span class="italic">Sunday</span>
                        <div class="flex flex-col gap-1">
                            <div class="w-[600px] flex justify-between items-center text-center px-4">
                                <div class="flex gap-3 w-[48%] items-center">
                                    <label for="">Start</label>
                                    <input type="time" name="sunday_start" value="{{ explode('-', $timeWorking->sunday)[0] }}"
                                        class="block w-full text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                </div>
                                <div class="flex gap-3 w-[48%] items-center">
                                    <label for="">End</label>
                                    <input type="time" name="sunday_end" value="{{ explode('-', $timeWorking->sunday)[1] }}"
                                        class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('sunday_end')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <div class="flex justify-between items-center">
                    <span class="italic">Monday</span>
                    <div class="flex flex-col gap-1">
                        <div class="w-[600px] flex justify-between items-center text-center px-4">
                            <div class="flex gap-3 w-[48%] items-center">
                                <label for="">Start</label>
                                <input type="time" name="monday_start" value="{{ explode('-', $timeWorking->monday)[0] }}"
                                    class="block w-full text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            </div>
                            <div class="flex gap-3 w-[48%] items-center">
                                <label for="">End</label>
                                <input type="time" name="monday_end" value="{{ explode('-', $timeWorking->monday)[1] }}"
                                    class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            </div>
                        </div>
                    </div>
                </div>
                @error('monday_end')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col gap-2">
                <div class="flex justify-between items-center">
                    <span class="italic">tuesday</span>
                    <div class="flex flex-col gap-1">
                        <div class="w-[600px] flex justify-between items-center text-center px-4">
                            <div class="flex gap-3 w-[48%] items-center">
                                <label for="">Start</label>
                                <input type="time" name="tuesday_start"
                                    value="{{ explode('-', $timeWorking->tuesday)[0] }}"
                                    class="block w-full text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            </div>
                            <div class="flex gap-3 w-[48%] items-center">
                                <label for="">End</label>
                                <input type="time" name="tuesday_end" value="{{ explode('-', $timeWorking->tuesday)[1] }}"
                                    class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            </div>
                        </div>
                    </div>
                </div>
                @error('tuesday_end')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col gap-2">
                <div class="flex justify-between items-center">
                    <span class="italic">Wednesday</span>
                    <div class="flex flex-col gap-1">
                        <div class="w-[600px] flex justify-between items-center text-center px-4">
                            <div class="flex gap-3 w-[48%] items-center">
                                <label for="">Start</label>
                                <input type="time" name="wednesday_start"
                                    value="{{ explode('-', $timeWorking->wednesday)[0] }}"
                                    class="block w-full text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            </div>
                            <div class="flex gap-3 w-[48%] items-center">
                                <label for="">End</label>
                                <input type="time" name="wednesday_end"
                                    value="{{ explode('-', $timeWorking->wednesday)[1] }}"
                                    class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            </div>
                        </div>
                    </div>
                </div>
                @error('wednesday_end')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col gap-2">
                <div class="flex justify-between items-center">
                    <span class="italic">Thursday</span>
                    <div class="flex flex-col gap-1">
                        <div class="w-[600px] flex justify-between items-center text-center px-4">
                            <div class="flex gap-3 w-[48%] items-center">
                                <label for="">Start</label>
                                <input type="time" name="thursday_start"
                                    value="{{ explode('-', $timeWorking->thursday)[0] }}"
                                    class="block w-full text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            </div>
                            <div class="flex gap-3 w-[48%] items-center">
                                <label for="">End</label>
                                <input type="time" name="thursday_end"
                                    value="{{ explode('-', $timeWorking->thursday)[1] }}"
                                    class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            </div>
                        </div>
                    </div>
                </div>
                @error('thursday_end')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col gap-2">
                <div class="flex justify-between items-center">
                    <span class="italic">Friday</span>
                    <div class="flex flex-col gap-1">
                        <div class="w-[600px] flex justify-between items-center text-center px-4">
                            <div class="flex gap-3 w-[48%] items-center">
                                <label for="">Start</label>
                                <input type="time" name="friday_start"
                                    value="{{ explode('-', $timeWorking->friday)[0] }}"
                                    class="block w-full text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            </div>
                            <div class="flex gap-3 w-[48%] items_center">
                                <label for="">End</label>
                                <input type="time" name="friday_end"
                                    value="{{ explode('-', $timeWorking->friday)[1] }}"
                                    class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            </div>
                        </div>
                    </div>
                </div>
                @error('friday_end')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="pr-4 w-full mt-4">
                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Edit
                </button>
            </div>
        </form>
    </div>
</x-app-resturant>
