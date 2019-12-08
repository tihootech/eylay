@extends('layouts.dashboard')
@section('title')
    @lang('QUIZ_ANALYZE') {{$quiz->title}}
@endsection
@section('content')

    @if ($quiz->show_answers)

        @if ($quiz->type == 'quiz')
            <div class="tile">
                <div class="row">
                    @foreach ($quiz->top3 as $rank => $top)
                        <div class="col-md-4">
                            <div class="card my-2
                                @if($rank == 0) bg-warning @endif
                                @if($rank == 1) text-light bg-secondary @endif
                                @if($rank == 2) text-light bg-danger @endif">
                                <div class="card-body">
                                    <i class="material-icons ml-2">filter_{{$rank+1}}</i>
                                    {{$top->user->name ?? 'NO NAME'}}
                                </div>
                                <div class="card-footer font-weight-bold">
                                    <div class="row">
                                        <div class="col-4">
                                            <i class="fa fa-line-chart ml-1"></i>
                                            {{$top->percentage}} %
                                        </div>
                                        <div class="col-8 text-left">
                                            <i class="fa fa-clock-o ml-1"></i>
                                            {{human_time($top->time)}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <hr>
                <div class="alert alert-info text-center">

                    <div class="row justify-content-center">

                        @if ($filler)
                            <div class="col-md-4 my-1">
                                <i class="fa fa-arrow-left ml-1"></i>
                                عملکرد شما :
                                @if ($filler->percentage)
                                    <b class="calibri"> {{$filler->percentage}} % </b>
                                @else
                                    <em> تعریف نشده </em>
                                @endif
                            </div>

                            <div class="col-md-4 my-1">
                                <i class="fa fa-arrow-left ml-1"></i>
                                رتبه شما :
                                @if ($rank = $filler->rank())
                                    <b class="calibri"> {{$rank}} </b>
                                    از
                                    <b class="calibri">{{$quiz->fillers->count()}} </b>

                                @else
                                    <em> تعریف نشده </em>
                                @endif
                            </div>
                        @endif

                        <div class="col-md-4 my-1">
                            <i class="fa fa-arrow-left ml-1"></i>
                            میانگین عملکرد شرکت کنندگان
                            <b class="calibri"> {{$quiz->ave('percentage')}} % </b>
                        </div>

                    </div>

                </div>
            </div>
        @endif

        @foreach ($quiz->questions as $question)

            <div class="tile text-center">

                <h5>
                    <span data-toggle="popover" data-trigger="hover" data-content="{{$question->info}}" data-placement="top" data-html="true">
                        {{$question->position}} : {{$question->body}}
                    </span>
                </h5>
                <hr>
                @if ($question->type == 'multiple_choices')

                    @if ($filler)
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
                    @endif


                    <div class="row align-items-center statics">

                        <div class="col-md-7 col-11">
                            <h6 class="text-primary yekan"> درصد پاسخگویی </h6>
                            <canvas class="embed-responsive-item" id="bar-chart-{{$question->id}}"></canvas>
                        </div>
                        <div class="col-md-5">
                            <h6 class="text-primary yekan mb-4"> تعداد پاسخگویی </h6>
                            <canvas class="embed-responsive-item" id="pie-chart-{{$question->id}}"></canvas>
                        </div>

                    </div>


                    @if ($correct_choice = $question->correct_choice())
                        <hr>
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
                        @master
                            <div class="text-right">
                                <a href="#who-answered-{{$question->id}}" data-toggle="collapse">
                                    <i class="fa fa-list mx-2"></i>
                                    نمایش عملکرد شرکت کنندگان
                                </a>
                                <div class="collapse" id="who-answered-{{$question->id}}">
                                    <div class="card card-body mt-3">
                                        <h5 class="mb-3 text-success"> کسانی که درست پاسخ دادند : </h5>
                                        <div class="row">
                                            @foreach ($question->correct_fillers() as $answerer)
                                                <div class="col-md-3">
                                                    <div class="alert alert-success my-1">
                                                        <a href="{{route('user.show', $answerer->filler->user->id ?? 0)}}" class="text-success">
                                                            {{$answerer->filler->user->name ?? 'Error'}}
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <hr>
                                        <h5 class="mb-3 text-danger"> کسانی که غلط پاسخ دادند : </h5>
                                        <div class="row">
                                            @foreach ($question->wrong_fillers() as $answerer)
                                                <div class="col-md-3">
                                                    <div class="alert alert-danger my-1">
                                                        <a href="{{route('user.show', $answerer->filler->user->id ?? 0)}}" class="text-danger">
                                                            {{$answerer->filler->user->name ?? 'Error'}}
                                                            <hr>
                                                            {{$answerer->body}}
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endmaster
                    @endif

                @elseif ($question->type == 'message')
                    <div class="alert alert-info">
                        این نوع از سوال نیازی به پاسخ ندارد.
                    </div>
                @elseif($filler)
                    <p> پاسخ شما : <b class="text-primary"> {{$question->filler_answer($filler->id)}} </b> </p>
                @else
                    <p> <i class="fa fa-warning ml-2"></i> بدون آمار </p>
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

    @else

        <div class="alert alert-info">
            لطفا صبر کنید تا آزمون همه شرکت کنندگان به اتمام برسد.
            پس از به اتمام رسیدن میتوانید دوباره رفرش کنید و نتایج را آنالیز کنید.
            <hr>
            <div class="text-center">
                <a href="javascript:void" onclick="location.reload()" class="btn btn-primary btn-round">
                    <i class="fa fa-refresh ml-1"></i> رفرش
                </a>
            </div>
        </div>

    @endif

@endsection
