<x-layout>

    {{-- Bredcrumbs and Title of page --}}
    <div>
        <h1 class="text-[2.25rem] font-bold">Dashboard</h1>
        <hr class="text-gray-300">
    </div>

{{-- md:left-[24vw] lg:left-[18vw] xl:left-[15vw] --}}
{{-- Dashboard Cards--}}
        <div class="w-auto grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

            <x-dashboard-card class="">
                <div class="bg-cyan-100 p-4 rounded-4xl">
                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><path d="M64 80c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l448 0c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16L64 80zM0 96C0 60.7 28.7 32 64 32l448 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zm96 64a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm104 0c0-13.3 10.7-24 24-24l224 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-224 0c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24l224 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-224 0c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24l224 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-224 0c-13.3 0-24-10.7-24-24zm-72-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM96 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" class="fill-cyan-400"/></svg>
                </div>

                <x-slot:name>Total Surveys</x-slot:name>
                <x-slot:number>30</x-slot:number>
            </x-dashboard-card>

            <x-dashboard-card class="">
                <div class="bg-red-100 p-4 rounded-4xl">
                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512"><path d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm64 192c17.7 0 32 14.3 32 32l0 96c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-96c0-17.7 14.3-32 32-32zm64-64c0-17.7 14.3-32 32-32s32 14.3 32 32l0 192c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-192zM320 288c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-32c0-17.7 14.3-32 32-32z" class="fill-red-400"/></svg>
                </div>

                <x-slot:name>Active Surveys</x-slot:name>
                <x-slot:number>14</x-slot:number>
            </x-dashboard-card>

            <x-dashboard-card>
                <div class="bg-blue-100 p-4 rounded-4xl">
                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><path d="M152.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 113C-2.3 103.6-2.3 88.4 7 79s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM224 96c0-17.7 14.3-32 32-32l224 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-224 0c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32l224 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-224 0c-17.7 0-32-14.3-32-32zM160 416c0-17.7 14.3-32 32-32l288 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-288 0c-17.7 0-32-14.3-32-32zM48 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" class="fill-blue-400"/></svg>
                </div>

                <x-slot:name>Completed Surveys</x-slot:name>
                <x-slot:number>14</x-slot:number>
            </x-dashboard-card>

            <x-dashboard-card>
                <div class="bg-green-100 p-4 rounded-4xl">
                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="17.5" viewBox="0 0 640 512"><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z" class="fill-green-400"/></svg>
                </div>

                <x-slot:name>Participants</x-slot:name>
                <x-slot:number>255</x-slot:number>
            </x-dashboard-card>


        </div>


{{-- Dashboard Charts--}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

            <figure class="highcharts-figure md:col-span-2 xl:col-span-2 w-full">
                <div id="container" class="rounded-lg shadow-lg"></div>
            </figure>


            <figure class="highcharts-figure1 col-span-2 w-full">
                <div id="container1" class="rounded-lg shadow-lg"></div>
            </figure>

            <figure class="highcharts-figure col-span-1 md:col-span-2 xl:col-span-4 w-full">
                <div id="container3" class="rounded-lg shadow-lg"></div>

            </figure>

        </div>























    <!-- First graph -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Corn vs wheat estimated production for 2023'
            },
            xAxis: {
                categories: ['USA', 'China', 'Brazil', 'EU', 'Argentina', 'India'],
                crosshair: true,
                accessibility: {
                    description: 'Countries'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: '1000 metric tons (MT)'
                }
            },
            tooltip: {
                valueSuffix: ' (1000 MT)'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [
                {
                    name: 'Corn',
                    data: [387749, 280000, 129000, 64300, 54000, 34300]
                },
                {
                    name: 'Wheat',
                    data: [45321, 140000, 10000, 140500, 19500, 113500]
                }
            ]
        });
    </script>

    <!-- Second graph -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        Highcharts.chart('container1', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Egg Yolk Composition'
            },
            tooltip: {
                valueSuffix: '%'
            },
            subtitle: {
                text:
                    'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: [{
                        enabled: true,
                        distance: 20
                    }, {
                        enabled: true,
                        distance: -40,
                        format: '{point.percentage:.1f}%',
                        style: {
                            fontSize: '1.2em',
                            textOutline: 'none',
                            opacity: 0.7
                        },
                        filter: {
                            operator: '>',
                            property: 'percentage',
                            value: 10
                        }
                    }]
                }
            },
            series: [
                {
                    name: 'Percentage',
                    colorByPoint: true,
                    data: [
                        {
                            name: 'Water',
                            y: 55.02
                        },
                        {
                            name: 'Fat',
                            sliced: true,
                            selected: true,
                            y: 26.71
                        },
                        {
                            name: 'Carbohydrates',
                            y: 1.09
                        },
                        {
                            name: 'Protein',
                            y: 15.5
                        },
                        {
                            name: 'Ash',
                            y: 1.68
                        }
                    ]
                }
            ]
        });
    </script>

    <!-- Third graph -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        // Data retrieved from https://www.ssb.no/energi-og-industri/olje-og-gass/statistikk/sal-av-petroleumsprodukt/artikler/auka-sal-av-petroleumsprodukt-til-vegtrafikk
        Highcharts.chart('container3', {
            title: {
                text: 'Sales of petroleum products March, Norway'
            },
            xAxis: {
                categories: [
                    'Jet fuel', 'Duty-free diesel', 'Petrol', 'Diesel', 'Gas oil'
                ]
            },
            yAxis: {
                title: {
                    text: 'Million liters'
                }
            },
            tooltip: {
                valueSuffix: ' million liters'
            },
            plotOptions: {
                series: {
                    borderRadius: '25%'
                }
            },
            series: [{
                type: 'column',
                name: '2020',
                data: [59, 83, 65, 228, 184]
            }, {
                type: 'column',
                name: '2021',
                data: [24, 79, 72, 240, 167]
            }, {
                type: 'column',
                name: '2022',
                data: [58, 88, 75, 250, 176]
            }, {
                type: 'line',
                step: 'center',
                name: 'Average',
                data: [47, 83.33, 70.66, 239.33, 175.66],
                marker: {
                    lineWidth: 2,
                    lineColor: Highcharts.getOptions().colors[3],
                    fillColor: 'white'
                }
            }, {
                type: 'pie',
                name: 'Total',
                data: [{
                    name: '2020',
                    y: 619,
                    color: Highcharts.getOptions().colors[0], // 2020 color
                    dataLabels: {
                        enabled: true,
                        distance: -50,
                        format: '{point.total} M',
                        style: {
                            fontSize: '15px'
                        }
                    }
                }, {
                    name: '2021',
                    y: 586,
                    color: Highcharts.getOptions().colors[1] // 2021 color
                }, {
                    name: '2022',
                    y: 647,
                    color: Highcharts.getOptions().colors[2] // 2022 color
                }],
                center: [75, 65],
                size: 100,
                innerSize: '70%',
                showInLegend: false,
                dataLabels: {
                    enabled: false
                }
            }]
        });

    </script>
</x-layout>
