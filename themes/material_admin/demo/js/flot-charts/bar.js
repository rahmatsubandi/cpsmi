'use strict';

$(document).ready(function(){

    // Chart Data
    var barChartData = [
        {
            label: 'Green',
            data: [[1,60], [2,30], [3,50], [4,100], [5,10], [6,90], [7,85]],
            color: '#32c787',
            bars: {
                order: 0
            }
        },
        {
            label: 'Blue',
            data: [[1,20], [2,90], [3,60], [4,40], [5,100], [6,25], [7,65]],
            color: '#03A9F4',
            bars: {
                order: 1
            }
        },
        {
            label: 'Amber',
            data: [[1,100], [2,20], [3,60], [4,90], [5,80], [6,10], [7,5]],
            color: '#f5c942',
            bars: {
                order: 2
            }
        }
    ];

    // Chart Options
    var barChartOptions = {
        series: {
            bars: {
                show: true,
                barWidth: 0.05,
                fill: 1
            }
        },
        grid : {
            borderWidth: 1,
            borderColor: '#f8f8f8',
            show : true,
            hoverable : true,
            clickable : true
        },
        yaxis: {
            tickColor: '#f8f8f8',
            tickDecimals: 0,
            font :{
                lineHeight: 13,
                style: "normal",
                color: "#9f9f9f",
            },
            shadowSize: 0
        },
        xaxis: {
            tickColor: '#fff',
            tickDecimals: 0,
            font :{
                lineHeight: 13,
                style: "normal",
                color: "#9f9f9f"
            },
            shadowSize: 0,
        },
        legend:{
            container: '.flot-chart-legends--bar',
            backgroundOpacity: 0.5,
            noColumns: 0,
            backgroundColor: '#fff',
            lineWidth: 0,
            labelBoxBorderColor: '#fff'
        }
    };

    // Create chart
    if ($('.flot-bar')[0]) {
        $.plot($('.flot-bar'), barChartData, barChartOptions);
    }
});
