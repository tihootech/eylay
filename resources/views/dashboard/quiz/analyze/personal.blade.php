@extends('layouts.dashboard')
@section('title')
    @lang('QUIZ_ANALYZE') {{$quiz->title}}
@endsection
@section('content')

    @foreach ($quiz->questions as $question)

        <div class="tile text-center">

            <h5>
                <span data-toggle="popover" data-trigger="hover" data-content="{{$question->info}}" data-placement="top">
                    {{$question->position}}. {{$question->title}} : {{$question->body}}
                </span>
            </h5>
            <hr>
            @if ($question->type == 'multiple_choices')

                <p>
                    پاسخ شما :
                    @if ($answer = $question->filler_answer($filler->id, false))
                        <b class="{{$answer->correct ? 'text-success' : 'text-danger'}}">
                            {{$answer->body}}
                        </b>
                    @else
                        <em> عدم پاسخدهی </em>
                    @endif
                </p>

                <hr>

                <div class="row align-items-center">

                    <div class="col-md-7">
                        <h6 class="text-primary yekan"> درصد پاسخگویی </h6>
                        <canvas class="embed-responsive-item" id="bar-chart-{{$question->id}}"></canvas>
                    </div>
                    <div class="col-md-5">
                        <h6 class="text-primary yekan mb-4"> تعداد پاسخگویی </h6>
                        <canvas class="embed-responsive-item" id="pie-chart-{{$question->id}}"></canvas>
                    </div>

                </div>

                <hr>

                @if ($correct_choice = $question->correct_choice())
                    <p>
                        گزینه صحیح
                        <span class="text-success mx-2"> {{$correct_choice->content}} </span>
                        است و
                        <b class="text-primary mx-2"> {{$correct_choice->percentage()}} % </b>
                        شرکت کنندگان
                        به آن پاسخ داده اند.
                    </p>
                    @if ($question->reason)
                        <div class="alert alert-success text-right">
                            <h5> چرا این گزینه صحیح است؟ </h5>
                            <hr>
                            <p> {{$question->reason}} </p>
                        </div>
                    @endif
                @endif

            @elseif ($question->type == 'message')
                <div class="alert alert-info">
                    این نوع از سوال نیازی به پاسخ ندارد.
                </div>
            @else
                <p> پاسخ شما : <b class="text-primary"> {{$question->filler_answer($filler->id)}} </b> </p>
            @endif
        </div>

    @endforeach

@endsection


@section('charts')
    @foreach ($quiz->questions as $question)

        @php
            $count = $question->choices->count();
            $labels = $question->choices->pluck('content')->toArray();
            $statics = $question->choices_statics();
            $percents = $question->choices_percents();
        @endphp

        @if ($question->type == 'multiple_choices')
            <script type="text/javascript">
              var data = {
              	labels: {!! parray($labels) !!},
              	datasets: [
              		{
              			fillColor: "rgba(156,39,176,0.2)",
              			strokeColor: "rgba(156,39,176,1)",
              			pointColor: "rgba(156,39,176,1)",
              			pointStrokeColor: "#fff",
              			pointHighlightFill: "#fff",
              			pointHighlightStroke: "rgba(156,39,176,1)",
              			data: {!! parray($percents) !!}
              		}
              	]
              };
              var pdata = [
                  @for ($i = 0; $i < $count; $i++)
                      {
                          value: {{$statics[$i]}},
                          color:"rgba(156,39,176,0.8)",
                          highlight: "rgba(156,39,176,0.7)",
                          label: "{{$labels[$i]}}"
                      }
                      @if($i != $count-1)
                        ,
                      @endif
                  @endfor
              ];

              var ctxb = $("#bar-chart-{{$question->id}}").get(0).getContext("2d");
              var barChart = new Chart(ctxb).Bar(data, {
                  scaleOverride:true,
                  scaleSteps:10,
                  scaleStartValue:0,
                  scaleStepWidth:10
              });

              var ctxp = $("#pie-chart-{{$question->id}}").get(0).getContext("2d");
              var pieChart = new Chart(ctxp).Pie(pdata);

            </script>
        @endif

    @endforeach
@endsection
