@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <!-- <h1>Dashboard</h1> -->
@stop

@section('content')

    <canvas id="myChart"></canvas>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Gráficos</div>

                    <div class="card-body">
                        
                        <hr />
                        <h4>{{ $chart1->options['chart_title'] }}</h4>
                        {!! $chart1->renderHtml() !!}

                        <hr />

                        <h4>{{ $chart2->options['chart_title'] }}</h4>
                        {!! $chart2->renderHtml() !!}

                        <hr />

                        <h4>{{ $chart3->options['chart_title'] }}</h4>
                        {!! $chart3->renderHtml() !!}

                        <hr />

                    </div>

                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    {!! $chart1->renderChartJsLibrary() !!}

    {!! $chart1->renderJs() !!}
    {!! $chart2->renderJs() !!}
    {!! $chart3->renderJs() !!}
  
@stop
