@extends('vcms5::base')

@section('top-white')
<div class="col-sm-6">
    <div class="flot-chart dashboard-chart">
        <div class="flot-chart-content" id="flot-dashboard-chart"></div>
    </div>
    <div class="row text-left">
        <div class="col-xs-4">
            <div class=" m-l-md">
            <span class="h4 font-bold m-t block">$ 406,100</span>
            <small class="text-muted m-b block">Sales marketing report</small>
            </div>
        </div>
        <div class="col-xs-4">
            <span class="h4 font-bold m-t block">$ 150,401</span>
            <small class="text-muted m-b block">Annual sales revenue</small>
        </div>
        <div class="col-xs-4">
            <span class="h4 font-bold m-t block">$ 16,822</span>
            <small class="text-muted m-b block">Half-year revenue margin</small>
        </div>

    </div>
</div>
@stop

@section('content-title')

@stop

@section('content')


@stop

@section('bottom-js')
<script>
$(document).ready(function() {
    var data1 = [
        [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
    ];
    var data2 = [
        [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
    ];
    $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
        data1, data2
    ],
            {
                series: {
                    lines: {
                        show: false,
                        fill: true
                    },
                    splines: {
                        show: true,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 0.4
                    },
                    points: {
                        radius: 0,
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: "#d5d5d5",
                    borderWidth: 1,
                    color: '#d5d5d5'
                },
                colors: ["#1ab394", "#464f88"],
                xaxis:{
                },
                yaxis: {
                    ticks: 4
                },
                tooltip: false
            }
    );
});
</script>
@stop