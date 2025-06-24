
@php use Illuminate\Support\Str; @endphp
<x-layout>

    {{-- Bredcrumbs and Title of page --}}
    <div class="text-white bg-linear-to-r from-[#4B3F72]  to-[#0092c2] p-5 rounded-lg border border-gray-300 shadow-md">
        <a href="/surveys" class="inline hover:underline hover:underline-offset-4"><h1
                class="text-[1.5rem] font-bold inline">Surveys  / </h1></a>
        <span class="text-[2.25rem]">  {{ $survey['name']  }}</span>
{{--        <hr class="text-gray-300">--}}
    </div>

    {{--    Wrapper to wrap all the questions and their options--}}
    <div class="grid grid-cols-1 gap-5 w-full my-2 scroll-smooth">

        @if($survey['description'])
            <div class="flex flex-col gap-2 p-5 rounded-lg border border-gray-300 shadow-md bg-[#0092c2] ">
                <h2 class="font-bold text-[1rem] text-white">Description</h2>
                <p class="bg-white p-2 rounded-lg overflow-y-auto max-h-[30vh]">
                    {{$survey['description']}}
                </p>
            </div>
        @endif

{{--        <p class="bg-white p-2 rounded-lg font-bold">--}}
{{--            Total Responses:  <strong class="text-[#0092c2] font-bold">{{ $totalResponses }}</strong>--}}
{{--        </p>--}}

        @foreach($survey->questions()->get() as $key => $question)

            @php
                $questionId = (string)$question->_id;
                $stats = $responseStats[$questionId] ?? ['responses' => [], 'counts' => [], 'percentages' => []];
            @endphp
            <div class="grid grid-col-1 p-5 gap-4 rounded-lg border border-gray-300 shadow-md bg-white">
{{--                 Survey Question--}}
                <div class="grid grid-cols-1 gap-1">
                    <h2 class="text-[1.25rem]">{{$key + 1}}. {{$question->question}}</h2>
                </div>

            {{-- Responses --}}
                <div class="grid grid-cols-1 gap-3 h-fit max-h-[50vh] overflow-y-auto">

                    @if($totalResponses == 0)
                        <p class="text-[0.75rem] text-[#0092c2] font-bold">
                            No responses yet
                        </p>

                    @else
                        @if(in_array($question->type, ['short', 'long']))
                            <p class="text-[#0092c2] font-bold text-[0.75rem]">
                                {{count($stats['responses'])}} {{  count($stats['responses']) == 1 ? 'Response' : 'Responses'}}
                            </p>
                            <ul class="list-none flex flex-col gap-3 overflow-x-hidden">
                                @php $emptyResponses = 0; @endphp
                                @foreach($stats['responses'] as $response)

                                    @if( $response )
                                        <li class="bg-[#0092c2] text-white p-2 rounded-lg">{{ $response }}</li>
                                    @else
                                        @php $emptyResponses++ @endphp
                                    @endif
                                @endforeach

{{--                                <li class="bg-[#0092c2]/25 text-white p-2 rounded-lg">Empty Response</li>--}}
                            </ul>
                            <div>Empty Responses: <span class="text-[#0092c2] font-bold text-[0.75rem]">
                                    {{$emptyResponses}}
                                </span></div>
                        @elseif($question->type == 'mcq')


                            <p class="text-[#0092c2] font-bold text-[0.75rem]">{{ array_sum($stats['counts']) }} Responses</p>

{{--                            <p class="text-[0.75rem]"> Most chosen option:--}}
{{--                                <span class="text-[#0092c2] font-bold ">--}}
{{--                                {{ $key_with_max_value = array_search(max($stats['counts']), $stats['counts']) }}--}}
{{--                            </span>--}}
{{--                            </p>--}}


{{--                            @foreach($question->options()->get() as $optKey => $option)--}}

{{--                                <div class="flex flex-col md:flex-row md:items-center justify-between bg-[#0092c2] text-white p-2 rounded-lg">--}}
{{--                                    <p>{{ $option->option }}</p>--}}
{{--                                    <p class="px-1 rounded-lg text-[#03045e] text-center bg-white max-w-[13%] min-w-[13%]">--}}
{{--                                        {{ $stats['counts'][$option->option] ?? 0 }} responses--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}

                            <figure class="highcharts-figure">
                                <div id="{{$questionId}}" class="rounded-lg shadow-lg max-h-[40vh]"></div>
                            </figure>


                            <script src="https://code.highcharts.com/highcharts.js"></script>
                            <script type="text/javascript">
                                document.addEventListener('DOMContentLoaded', () =>{

                                    // Prepare data to show
                                    const responseData = [
                                        @foreach($stats['counts'] as $option => $count)
                                            { name: '{{$option}}', y: <?php echo $count; ?>,},
                                        @endforeach
                                    ];

                                    Highcharts.chart('{{$questionId}}', {
                                        chart: {
                                            type: 'pie'
                                        },
                                        title: {
                                            text: `Most Chose Option: {{ $key_with_max_value = array_search(max($stats['counts']), $stats['counts']) }}`
                                        },
                                        plotOptions: {
                                            pie: {
                                                dataLabels: {
                                                    enabled: true,
                                                    format: '{point.name}: {point.y} ({point.percentage:.1f}%)'
                                                },
                                                showInLegend: true
                                            }
                                        },
                                        credits: {
                                            enabled: false
                                        },
                                        series: [{
                                            name: 'Responses',
                                            data: responseData,
                                        }]
                                    });

                                });

                            </script>

                        @elseif($question->type == 'boolean')

                            <p class="text-[#0092c2] font-bold text-[0.75rem]">{{ array_sum($stats['counts']) }} Responses</p>
{{--                            @foreach(['Yes', 'No'] as $option)--}}

{{--                                <div class="flex items-center justify-between bg-[#0092c2] p-2 rounded-lg">--}}
{{--                                    <p class="text-white">{{ $option }}</p>--}}
{{--                                    <p class="px-1 rounded-lg text-[#03045e] text-center bg-white max-w-[18%] min-w-[18%]">--}}
{{--                                        {{ $stats['counts'][$option] ?? 0 }} Responses ({{ $stats['percentages'][$option] ?? 0 }}%)--}}
{{--                                    </p>--}}
{{--                                </div>--}}

{{--                            @endforeach--}}
                                <figure class="highcharts-figure">
                                    <div id="{{$questionId}}" class="rounded-lg shadow-lg max-h-[40vh]"></div>
                                </figure>


                                <script src="https://code.highcharts.com/highcharts.js"></script>
                                <script type="text/javascript">
                                    document.addEventListener('DOMContentLoaded', () =>{
                                        Highcharts.chart('{{$questionId}}', {
                                            chart: {
                                                type: 'pie',
                                                zooming: {
                                                    type: 'xy'
                                                },
                                                panning: {
                                                    enabled: true,
                                                    type: 'xy'
                                                },
                                                panKey: 'shift'
                                            },
                                            title: {
                                                text: ''
                                            },
                                            tooltip: {
                                                valueSuffix: ' Responses'
                                            },
                                            credits: {
                                                enabled: false,
                                            },
                                            plotOptions: {
                                                pie: {
                                                    allowPointSelect: true,
                                                    cursor: 'pointer',
                                                    showInLegend: false,
                                                    dataLabels: [{
                                                        enabled: true,
                                                        distance: 20
                                                    },
                                                        {
                                                        enabled: true,
                                                        distance: -40,
                                                        format: '{point.percentage:.1f}%',
                                                        style: {
                                                            fontSize: '1.2em',
                                                            textOutline: 'none',
                                                            color: 'white',
                                                            // opacity: 0.7
                                                        },
                                                        // filter: {
                                                        //     operator: '>',
                                                        //     property: 'percentage',
                                                        //     value: 10
                                                        // }
                                                        }
                                                    ]
                                                }
                                            },
                                            series: [
                                                {
                                                    name: 'Count',
                                                    colorByPoint: true,
                                                    data: [
                                                        {
                                                            name: 'Yes',
                                                            selected: true,
                                                            color: '#0092C2',
                                                            y: <?php echo json_encode($stats['counts']['Yes']); ?>


                                                        },
                                                        {
                                                            name: 'No',
                                                            sliced: true,
                                                            y: <?php echo json_encode($stats['counts']['No']); ?>
                                                        },
                                                    ]
                                                }
                                            ]
                                        });

                                    });

                                </script>


                        @elseif($question->type === 'ranking')
                            <p class="text-[#0092c2] font-bold text-[0.75rem]">{{ array_sum($stats['counts']) }} Responses</p>
{{--                @php  dd($stats['percentages']) @endphp--}}

{{--                            @for($i = 5; $i >= 1; $i--)--}}
{{--                                <div class="flex items-center justify-between bg-[#0092c2] p-2 rounded-lg">--}}
{{--                                    <p class="text-white">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</p>--}}
{{--                                    <p class="px-1 rounded-lg text-[#03045e] text-center bg-white max-w-[18%] min-w-[18%]">--}}
{{--                                        {{ $stats['counts'][$i] ?? 0 }} responses ({{ $stats['percentages'][$i] ?? 0 }}%)--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            @endfor--}}

                            <figure class="highcharts-figure">
                                <div id="{{$questionId}}" class="rounded-lg shadow-lg max-h-[40vh]"></div>
                            </figure>

                            <script src="https://code.highcharts.com/highcharts.js"></script>
                            <script type="text/javascript">
                                document.addEventListener('DOMContentLoaded', () =>{

                                    // Calculate average rating
                                    @php
                                        $rating = 0;
                                        foreach ($stats['counts'] as $star => $response){
                                            $rating += $star * $response;
                                        }
                                        $avgRating = $rating / array_sum($stats['counts']);
//                                        dd($avgRating);
                                     @endphp
                                    Highcharts.chart('{{$questionId}}', {
                                        chart: {
                                            type: 'bar',
                                            // borderWidth: 1, // Enable border around the chart
                                            // borderColor: '#000000' // Black border color
                                        },
                                        title: {
                                            text: 'Average Rating: {{$avgRating}}'
                                        },
                                        xAxis: {
                                            categories: ['★', '★ ★', '★ ★ ★', '★ ★ ★ ★', '★ ★ ★ ★ ★'],
                                            // gridLineWidth: 1,
                                            // gridLineColor: '#CCCCCC',
                                        },
                                        yAxis: {
                                            min: 0,
                                            title: {
                                                text: ''
                                            },
                                            labels: {
                                                overflow: 'justify'
                                            },
                                            gridLineWidth: 0,
                                            tickInterval: 1,
                                            lineWidth: 1, // Enable x-axis line
                                            lineColor: '#000000' // Black color to match y-axis
                                        },
                                        plotOptions: {
                                            bar: {
                                                dataLabels: {
                                                    enabled: true,
                                                    formatter: function() {
                                                        return this.point.y + ' (' + Highcharts.numberFormat(this.point.percentage, 1) + '%)';
                                                    }
                                                },
                                                pointWidth: 30 // Increase bar width to 40 pixels
                                            }
                                        },
                                        credits: {
                                            enabled: false
                                        },
                                        series: [{
                                            name: 'Response Count',
                                            data: [
                                                {{--{ y: <?php echo json_encode($stats['counts'][0]); ?>, percentage: <?php echo json_encode($stats['percentages'][0] ?? 0.0); ?>, color: '#FF6B6B' },--}}
                                                { y: <?php echo json_encode($stats['counts'][1]); ?>, percentage: <?php echo json_encode($stats['percentages'][1] ?? 0.0); ?>, color: '#4ECDC4' },
                                                { y: <?php echo json_encode($stats['counts'][2]); ?>, percentage: <?php echo json_encode($stats['percentages'][2] ?? 0.0); ?>, color: '#0092C2' },
                                                { y: <?php echo json_encode($stats['counts'][3]); ?>, percentage: <?php echo json_encode($stats['percentages'][3] ?? 0.0); ?>, color: '#96CEB4' },
                                                { y: <?php echo json_encode($stats['counts'][4]); ?>, percentage: <?php echo json_encode($stats['percentages'][4] ?? 0.0); ?>, color: '#584F84' },
                                                { y: <?php echo json_encode($stats['counts'][5]); ?>, percentage: <?php echo json_encode($stats['percentages'][5] ?? 0.0); ?>, color: '#900048' }
                                            ],

                                        }]
                                    });

                                });

                            </script>

                        @endif

                    @endif
                </div>

            </div>
        @endforeach


{{--        @if(!$survey['published'])--}}
{{--            <x-button href="/survey/published/{{ $survey->_id }}-{{ Str::slug($survey->name) }}"--}}
{{--                      class="max-w-fit px-2 rounded-lg py-1 cursor-pointer">Publish--}}
{{--            </x-button>--}}
{{--        @endif--}}

        @if(!$survey['published'])
            <x-button href="/published/{{ $survey->_id }}"
                      class="max-w-fit px-2 rounded-lg py-1 cursor-pointer">Publish
            </x-button>
        @endif
    </div>

<!--------- Graphs ------------->

    <!-- First graph -->


</x-layout>

