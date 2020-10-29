@extends('layouts.seller')

@section('title', 'Chart')

@section('content')
<div class="right_col booking" role="main">
    <div class="col-md-12 col-sm-12">
        <div class="row">
        <div id="container" class="card" style="margin: 3px; padding: 3px; -webkit-box-flex: 0; -ms-flex: 0 0 33.333333%; flex: 0 0 49%; max-width: 49%;"></div>
        <div id="container-2" class="card" style="margin: 3px; padding: 3px; -webkit-box-flex: 0; -ms-flex: 0 0 33.333333%; flex: 0 0 49%; max-width: 49%;"></div>
        </div>
        <div class="row">
        <div id="container-3" class="card" style="margin: 3px; padding: 3px; -webkit-box-flex: 0; -ms-flex: 0 0 33.333333%; flex: 0 0 49%; max-width: 49%;"></div>
        <div id="container-4" class="card" style="margin: 3px; padding: 3px; -webkit-box-flex: 0; -ms-flex: 0 0 33.333333%; flex: 0 0 49%; max-width: 49%;"></div>
        </div>
    </div>
</div>

<input type="hidden" id="serverData" 
    data-month="{{json_encode($month)}}"
    data-month_name="{{json_encode($month_name)}}"

    data-year="{{json_encode($year)}}"
    data-year_name="{{json_encode($year_name)}}"
    
    data-mobile="{{json_encode($mobile)}}"
    data-website="{{json_encode($website)}}"
    data-desktop="{{json_encode($desktop)}}"

    data-software="{{json_encode($software)}}"
    data-software_name="{{json_encode($software_name)}}"
>
@endsection

@section('scripts')
<script src="{{ asset('js/highchart/highcharts.js')}}" defer></script>
<script src="{{ asset('js/highchart/chart.js')}}" defer></script>
@endsection