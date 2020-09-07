<script type="text/javascript">
  $(document).ready(function()
  {

    // Handle get sp-chart
    $.ajax({
      type: "get",
      url: "<?php echo base_url('panel/dashboard/ajax_get_statisticperiod/') ?>",
      dataType: "json",
      processData: false,
      contentType: false,
      cache: false,
      beforeSend: function() {
        $(".sp-chart-loader").show();
      },
      success: function(response) {
        if (response.status === true) {
          initializeChart_SP(response.data.sp1, response.data.sp2);
        } else {
          notify("SP1 Error: Failed to get data.", "danger");
        };
      },
      complete: function() {
        $(".sp-chart-loader").hide();
      }
    });

    // Handle initialize sp-chart
    function initializeChart_SP(sp1, sp2) {
      var data_sp1 = $.map(sp1, function(value, index) {
        return [[index, value]];
      });
      var data_sp2 = $.map(sp2, function(value, index) {
        return [[index, value]];
      });

      // Chart Data
      var lineChartData = [
        {
          label: "<?php echo date('Y') -1 ?>",
          data: data_sp1,
          color: '#32c787'
        },
        {
          label: "<?php echo date('Y') ?>",
          data: data_sp2,
          color: '#03A9F4'
        }
      ];

      // Chart Options
      var lineChartOptions = {
        series: {
          lines: {
            show: true,
            barWidth: 0.05,
            fill: 0
          }
        },
        shadowSize: 0.1,
        grid : {
          borderWidth: 1,
          borderColor: '#edf9fc',
          show : true,
          hoverable : true,
          clickable : true
        },

        yaxis: {
          tickColor: '#edf9fc',
          tickDecimals: 0,
          font :{
            lineHeight: 13,
            style: 'normal',
            color: '#9f9f9f',
          },
          shadowSize: 0
        },

        xaxis: {
          tickColor: '#fff',
          tickDecimals: 0,
          font :{
            lineHeight: 13,
            style: 'normal',
            color: '#9f9f9f'
          },
          shadowSize: 0,
        },
        legend:{
          container: '.sp-chart-legends--line',
          backgroundOpacity: 0.5,
          noColumns: 0,
          backgroundColor: '#fff',
          lineWidth: 0,
          labelBoxBorderColor: '#fff'
        }
      };

      // Create chart
      if ($('.sp-chart')[0]) {
        $.plot($('.sp-chart'), lineChartData, lineChartOptions);
      };
    };

  });
</script>
