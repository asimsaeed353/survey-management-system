@php use Illuminate\Support\Str; @endphp
<x-layout>
    <script src="https://code.highcharts.com/highcharts.js"></script>

    {{-- Bredcrumbs and Title of page --}}
    <div class="text-white bg-linear-to-r from-[#4B3F72]  to-[#0092c2] p-5 rounded-lg border border-gray-300 shadow-md">
        <a href="/surveys" class="inline hover:underline hover:underline-offset-4"><h1
                class="text-[1.5rem] font-bold inline">Surveys  / </h1></a>
        <span class="text-[2.25rem]">  {{ $survey['name']  }}</span>
    </div>

    {{--    Wrapper to wrap all the questions and their options--}}
    <div class="grid grid-cols-1 gap-5 w-full my-2 scroll-smooth">

        @if($survey['description'])
            <x-survey.description>
                {{$survey['description']}}
            </x-survey.description>
        @endif

            <div class="grid grid-col-1 p-5 gap-2 rounded-lg border border-gray-300 shadow-md bg-white">
                {{--                 Respondent Email--}}
                <div class="grid grid-cols-1 gap-1">
                    <h2 class="text-[1.25rem]">Who has responded?</h2>
                </div>

                @if($respondentEmails->isNotEmpty())
                    @foreach($respondentEmails as $email)
                        @if($email)
                            <div class="grid grid-cols-1 gap-3 h-fit max-h-[50vh] overflow-y-auto">
                                <ul class="list-none flex flex-col gap-5 overflow-x-hidden">
                                    <li class="bg-[#0092c2] text-white p-2 rounded-lg">{{ $email }}</li>
                                </ul>
                            </div>
                        @endif
                    @endforeach

                @else
                    <p class="text-[0.75rem] text-[#0092c2] font-bold">Publish survey to start collecting responses.</p>
                @endif



            </div>

        @foreach($survey->questions()->get() as $key => $question)

            @php
                $questionId = (string)$question->_id;
                $stats = $responseStats[$questionId] ?? ['responses' => [], 'counts' => [], 'percentages' => []];
            @endphp
            <div class="grid grid-col-1 p-5 gap-4 rounded-lg border border-gray-300 shadow-md bg-white">
{{--                 Survey Question--}}
                <div class="grid grid-cols-1 gap-1">
                    <h2 class="text-[1.25rem]">
                        {{$key + 1}}.
                        <pre class="whitespace-pre-wrap font-sans text-[1.25rem] inline">{{ $question->question }}</pre>
                    </h2>
                </div>

            {{-- Responses --}}
                <div class="grid grid-cols-1 gap-3 h-fit max-h-[50vh] overflow-y-auto">

                    @if($totalResponses == 0)
                        <p class="text-[0.75rem] text-[#0092c2] font-bold">
                            No responses yet
                        </p>

                        @if(($question->type == 'mcq') || ($question->type == 'scq'))
                            @foreach($stats['counts'] as $option => $count)
                                <div class="flex flex-col md:flex-row md:items-center justify-between bg-[#0092c2] text-white p-2 rounded-lg">
                                    <p>{{ $option }}</p>
                                </div>
                            @endforeach
                        @endif

                    @else
                        @if(in_array($question->type, ['short', 'long']))
                            <p class="text-[#0092c2] font-bold text-[0.75rem]">
                                {{count($stats['responses'])}} {{  count($stats['responses']) == 1 ? 'Response' : 'Responses'}}
                            </p>
                            <ul class="list-none flex flex-col gap-3 overflow-x-hidden">
                                @foreach($stats['responses'] as $response)

                                    @if( $response )
                                        <li class="bg-[#0092c2] text-white p-2 rounded-lg"><pre class="whitespace-pre-wrap font-sans leading-relaxed m-0">{{ $response }}</pre></li>
                                    @endif
                                @endforeach


                            </ul>
                        @elseif($question->type == 'mcq' || $question->type == 'scq' )

                            <p class="text-[#0092c2] font-bold text-[0.75rem]">{{ array_sum($stats['counts']) }} Choices made</p>


                            <figure class="highcharts-figure">
                                <div id="{{$questionId}}" class="rounded-lg shadow-lg max-h-[350px]"></div>
                            </figure>

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
                                            text: `Most Chosen Option: {{ $key_with_max_value = array_search(max($stats['counts']), $stats['counts']) }}`
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
                                            name: 'Choices',
                                            data: responseData,
                                        }]
                                    });

                                });

                            </script>


                        @elseif($question->type === 'boolean')
                            <p class="text-[#0092c2] font-bold text-[0.75rem]">{{ array_sum($stats['counts']) }} Responses</p>

                                <figure class="highcharts-figure">
                                    <div id="{{$questionId}}" class="rounded-lg shadow-lg max-h-[40vh]"></div>
                                </figure>

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

                            <figure class="highcharts-figure">
                                <div id="{{$questionId}}" class="rounded-lg shadow-lg max-h-[50vh]"></div>
                            </figure>

                            <script type="text/javascript">
                                document.addEventListener('DOMContentLoaded', () => {
                                    // Calculate average rating
                                    @php
                                        $rating = 0;
                                        foreach ($stats['counts'] as $star => $response){
                                            $rating += $star * $response;
                                        }
                                        $avgRating = $rating / array_sum($stats['counts']);
                                     @endphp

                                    Highcharts.chart('{{$questionId}}', {
                                        chart: {
                                            type: 'bar',
                                            // borderWidth: 1, // Enable border around the chart
                                            // borderColor: '#000000' // Black border color
                                        },
                                        title: {
                                            text: 'Average Rating: {{round($avgRating, 1)}}'
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

        @if(!$survey['published'])
            <x-button href="/published/{{ $survey->_id }}"
                      class="max-w-fit px-2 rounded-lg py-1 cursor-pointer">Publish
            </x-button>
        @endif
    </div>

</x-layout>

