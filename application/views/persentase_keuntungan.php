	<!-- Styles -->
	<style>
	#chartselisih {
	  width: 100%;
	  height: 500px;
	}

	#chartpersentase {
	  width: 100%;
	  height: 500px;
	}

	</style>

	<!-- Resources -->
	<script src="https://www.amcharts.com/lib/4/core.js"></script>
	<script src="https://www.amcharts.com/lib/4/charts.js"></script>
	<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

	<!-- Chart code -->
	<script>
	am4core.ready(function() {

		// Themes begin
		am4core.useTheme(am4themes_animated);
		// Themes end

		// Create chart instance
		var charts = am4core.create("chartselisih", am4charts.PieChart);

		// Add data
		charts.data = [ {
		  "label": "Keuntungan Pengelola",
		  "nilai": <?php echo total_penjualan(); ?>
		}, {
		  "label": "Keuntungan Nasabah",
		  "nilai": <?php echo total_pembelian(); ?>
		}, 
		];

		// Add and configure Series
		var pieSeries = charts.series.push(new am4charts.PieSeries());
		pieSeries.dataFields.value = "nilai";
		pieSeries.dataFields.category = "label";
		pieSeries.slices.template.stroke = am4core.color("#fff");
		pieSeries.slices.template.strokeWidth = 2;
		pieSeries.slices.template.strokeOpacity = 1;

		// This creates initial animation
		pieSeries.hiddenState.properties.opacity = 1;
		pieSeries.hiddenState.properties.endAngle = -90;
		pieSeries.hiddenState.properties.startAngle = -90;

	}); // end am4core.ready()


	am4core.ready(function() {

		// Themes begin
		am4core.useTheme(am4themes_animated);
		// Themes end

		// Create chart instance
		var charts = am4core.create("chartpersentase", am4charts.PieChart);

		// Add data
		charts.data = [ {
		  "label": "Keuntungan Pengelola",
		  "nilai": <?php echo ($pengelola/100) * total_penjualan(); ?>
		}, {
		  "label": "Keuntungan Nasabah",
		  "nilai": <?php echo ($nasabah/100) *total_penjualan(); ?>
		}, 
		];

		// Add and configure Series
		var pieSeries = charts.series.push(new am4charts.PieSeries());
		pieSeries.dataFields.value = "nilai";
		pieSeries.dataFields.category = "label";
		pieSeries.slices.template.stroke = am4core.color("#fff");
		pieSeries.slices.template.strokeWidth = 2;
		pieSeries.slices.template.strokeOpacity = 1;

		// This creates initial animation
		pieSeries.hiddenState.properties.opacity = 1;
		pieSeries.hiddenState.properties.endAngle = -90;
		pieSeries.hiddenState.properties.startAngle = -90;

	});
	</script>


<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#selisih">Berdasarkan Selisih</a></li>
		    <li><a data-toggle="tab" href="#persentase">Berdasarkan Persentase</a></li>
		  </ul>

		  <div class="tab-content">
		    <div id="selisih" class="tab-pane fade in active">
				<!-- HTML -->
				<br>
		    	<div class="col-md-12">
		    		<p>
		    			Keuntungan Pengelola : <?php echo total_penjualan(); ?>
		    		</p>
		    		<p>
		    			Keuntungan Nasabah : <?php echo total_pembelian(); ?>
		    		</p>
		    	</div>
		    	<br>
				<div id="chartselisih"></div>


		    </div>
		    <div id="persentase" class="tab-pane fade">
		    	<br>
		    	<div class="col-md-6">
		    		<p>
		    			Keuntungan Pengelola : <?php echo ($pengelola/100) * total_penjualan(); ?>
		    		</p>
		    		<p>
		    			Keuntungan Nasabah : <?php echo ($nasabah/100) * total_penjualan(); ?>
		    		</p>
		    	</div>
		    	<br>
		    	<div class="col-md-6">
		    		<form action="" method="post">
			    		<div class="form-group">
			    			<label>Keunutungan Nasabah</label>
			    			<input type="text" name="nasabah" class="form-control" value="<?php echo $nasabah ?>">
			    		</div>
			    		<div class="form-group">
			    			<label>Keunutungan Pengelola</label>
			    			<input type="text" name="pengelola" class="form-control" value="<?php echo $pengelola ?>">
			    		</div>
			    		<div class="form-group">
			    			<button type="submit" class="btn btn-primary">Kirim</button>
			    		</div>
			    	</form>
		    	</div>
		      	<div class="col-md-12">
		      		<div id="chartpersentase"></div>
		      	</div>
		    	

		    </div>
		   
		  </div>
		  <br><br><br><br><br><br><br><br><br><br><br><br>
	</div>
</div>