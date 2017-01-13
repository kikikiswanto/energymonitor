<?php 
  $PATH = base_url('application/views/themes/admin_lte');
 ?>
<div class="row">
	<div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>

        <div class="info-box-content">
          <b>COST</b> <br>
          Today : Rp <?= ceil($this->electric_m->get_cost(date("Y-m-d"))); ?> ,-<br>
          Weekly : Rp <?= ceil($this->electric_m->get_cost(date("Y-m"))); ?> ,-<br>
          Monthly : Rp <?= ceil($this->electric_m->get_cost(date("Y"))); ?> ,-
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-blue"><i class="fa fa-plug"></i></span>

        <div class="info-box-content">
          <b>POWER</b> <br>
          Today : <?= $this->electric_m->get_power(date("Y-m-d")); ?> W<br>
          Monthly : <?= $this->electric_m->get_power(date("Y-m")); ?> W<br>
          Years : <?= $this->electric_m->get_power(date("Y")); ?> W
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-bolt"></i></span>

        <div class="info-box-content">
          <b>CURRENT</b> <br>
          Today  : <?= $this->electric_m->sum_electric('i', date("Y-m-d"))->i; ?> A<br>
          Monthly  : <?= $this->electric_m->sum_electric('i', date("Y-m"))->i; ?> A<br>
          Years : <?= $this->electric_m->sum_electric('i', date("Y"))->i; ?> A
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-code-fork"></i></span>

        <div class="info-box-content">
          <b>VOLT</b> <br>
          Today  : <?= $this->electric_m->sum_electric('v', date("Y-m-d"))->v; ?> V<br>
          Monthly  : <?= $this->electric_m->sum_electric('v', date("Y-m"))->v; ?> V<br>
          Years : <?= $this->electric_m->sum_electric('v', date("Y"))->v; ?> V
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <!-- interactive chart -->
        <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Realtime Energy Monitor</h3>

              <div class="box-tools pull-right">
                Real time
                <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                  <button type="button" class="btn btn-default btn-xs active" data-toggle="on">On</button>
                  <button type="button" class="btn btn-default btn-xs" data-toggle="off">Off</button>
                </div>
              </div>
            </div>
            <div class="box-body">
              <div id="interactive" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
        </div>
        <!-- /.box -->

    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<!-- FLOT CHARTS -->
<script src="<?= $PATH . '/assets/plugins/flot/jquery.flot.min.js'; ?>"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?= $PATH . '/assets/plugins/flot/jquery.flot.resize.min.js'; ?>"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?= $PATH . '/assets/plugins/flot/jquery.flot.pie.min.js'; ?>"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?= $PATH . '/assets/plugins/flot/jquery.flot.categories.min.js'; ?>"></script>
<script>
  $(function () {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data = [], totalPoints = 100;

    function getRandomData() {

      if (data.length > 0)
        data = data.slice(1);

      // Do a random walk
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y = prev + Math.random() * 10 - 5;

        if (y < 0) {
          y = 0;
        } else if (y > 100) {
          y = 100;
        }

        data.push(y);
      }

      // Zip the generated y values with the x values
      var res = [];
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]]);
      }

      return res;
    }

    var interactive_plot = $.plot("#interactive", [getRandomData(), getRandomData()+50], {
      grid: {
        borderColor: "#f3f3f3",
        borderWidth: 1,
        tickColor: "#f3f3f3"
      },
      series: {
        shadowSize: 0, // Drawing is faster without shadows
        color: "#3c8dbc"
      },
      lines: {
        fill: true, //Converts the line chart to area chart
        color: "#3c8dbc"
      },
      yaxis: {
        min: 0,
        max: 100,
        show: true
      },
      xaxis: {
        show: true
      }
    });

    var updateInterval = 1000; //Fetch data ever x milliseconds
    var realtime = "on"; //If == to on then fetch data every x seconds. else stop fetching
    function update() {

      interactive_plot.setData([getRandomData()]);

      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw();
      if (realtime === "on")
        setTimeout(update, updateInterval);
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === "on") {
      update();
    }
    //REALTIME TOGGLE
    $("#realtime .btn").click(function () {
      if ($(this).data("toggle") === "on") {
        realtime = "on";
      }
      else {
        realtime = "off";
      }
      update();
    });
    /*
     * END INTERACTIVE CHART
     */

  });

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
        + label
        + "<br>"
        + Math.round(series.percent) + "%</div>";
  }
</script>