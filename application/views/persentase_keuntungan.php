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
		    		
		    	</div>
		    	<br>
		    	<div class="col-md-6">

		    	<?php 
		    	$persen = $this->db->get_where('persentase', array('id'=>1))->row();
		    	 ?>
		    		<form action="" method="post">
			    		<div class="form-group">
			    			<label>Keuntungan Nasabah</label>
			    			<input type="text" name="nasabah" class="form-control" value="<?php echo $persen->nasabah ?>">
			    		</div>
			    		<div class="form-group">
			    			<label>Keuntungan Pengelola</label>
			    			<input type="text" name="pengelola" class="form-control" value="<?php echo $persen->pengelola ?>">
			    		</div>
			    		<div class="form-group">
			    			<button type="submit" class="btn btn-primary">Kirim</button>
			    		</div>
			    	</form>
		    	</div>
		      	<div class="col-md-12">
		      		<table class="table table-bordered">
		      			<tr>
		      				<th>No.</th>
		      				<th>Nama</th>
		      				<th>Tanggal</th>
		      				<th>Berat</th>
		      				<th>Total</th>
		      				<th>Keuntungan Nasabah (<?php echo $persen->nasabah; ?> %)</th>
		      				<th>Keuntungan Pengelola (<?php echo $persen->pengelola; ?> %)</th>
		      			</tr>
		      			<?php 
		      			$tot = 0;
		      			$tot_n = 0;
		      			$tot_p = 0;
		      			$no = 1;
		      			foreach ($this->db->get_where('pembelian', array('tabungan'=>'ya'))->result() as $rw) {
		      			 ?>
		      			<tr>
		      				<td><?php echo $no; ?></td>
		      				<td><?php echo ambil_field_tabel('anggota','id_anggota',$rw->id_anggota,'nama_anggota') ?></td>
		      				<td><?php echo $rw->tanggal ?></td>
		      				<td><?php echo $rw->berat ?></td>
		      				<td><?php echo number_format($rw->total); $tot = $tot + $rw->total ?></td>
		      				<td><?php $tot_n = $tot_n+($rw->total * ($persen->nasabah/100)); echo number_format($rw->total * ($persen->nasabah/100)); ?></td>
		      				<td><?php $tot_p = $tot_p+($rw->total * ($persen->pengelola/100)); echo number_format($rw->total * ($persen->pengelola/100)); ?></td>
		      			</tr>
		      			<?php $no++; } ?>
		      			<tr>
		      				<td colspan="4">Total</td>
		      				<td ><b><?php echo number_format($tot); ?></b></td>
		      				<td ><b><?php echo number_format($tot_n); ?></b></td>
		      				<td ><b><?php echo number_format($tot_p); ?></b></td>
		      			</tr>
		      		</table>
		      		<!-- <div id="chartpersentase"></div> -->
		      	</div>
		    	

		    </div>
		   
		  </div>
		  <br><br><br><br><br><br><br><br><br><br><br><br>
	</div>
</div>