<x-app-resturant>

    <x-slot name="resturant">
        {{ $resturant->id }}
    </x-slot>
    <input type="hidden" id="test" value="{{ $resturant->id }}">

    <div class="bg-white py-10 rounded-lg absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <div id="chart" class="w-[700px]" style="height: 300px;"></div>
    </div>
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <script>
        const chart = new Chartisan({
            el: '#chart',
            url: "@chart('food_category_chart')" + "?id=" + $('#test').val(),

            hooks: new ChartisanHooks()
                .legend()
                .colors()
                .tooltip()
                .axis(false)
                .datasets([{
                        type: 'pie',
                        radius: ['40%', '60%']
                    },
                    {
                        type: 'pie',
                        radius: ['10%', '30%']
                    },
                ]),
        });
    </script>


</x-app-resturant>
