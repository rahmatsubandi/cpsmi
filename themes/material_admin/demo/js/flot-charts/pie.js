'use strict';

$(document).ready(function(){
    // Make some sample data
    var pieData = [
        {data: 1, color: '#ff6b68', label: 'Toyota'},
        {data: 2, color: '#03A9F4', label: 'Nissan'},
        {data: 3, color: '#32c787', label: 'Hyundai'},
        {data: 4, color: '#f5c942', label: 'Scion'},
        {data: 5, color: '#d066e2', label: 'Daihatsu'}
    ];
    
    // Pie Chart
    if($('.flot-pie')[0]){
        $.plot('.flot-pie', pieData, {
            series: {
                pie: {
                    show: true,
                    stroke: {
                        width: 2
                    }
                }
            },
            legend: {
                container: '.flot-chart-legend--pie',
                backgroundOpacity: 0.5,
                noColumns: 0,
                backgroundColor: "white",
                lineWidth: 0,
                labelBoxBorderColor: '#fff'
            }
        });
    }
    
    // Donut Chart
    if($('.flot-donut')[0]){
        $.plot('.flot-donut', pieData, {
            series: {
                pie: {
                    innerRadius: 0.5,
                    show: true,
                    stroke: { 
                        width: 2
                    }
                }
            },
            legend: {
                container: '.flot-chart-legend--donut',
                backgroundOpacity: 0.5,
                noColumns: 0,
                backgroundColor: "white",
                lineWidth: 0,
                labelBoxBorderColor: '#fff'
            }
        });
    }
});