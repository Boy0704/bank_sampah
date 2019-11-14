<!DOCTYPE html>
<html>
<head>
	<title></title>
	<base href="<?php echo base_url() ?>">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

</head>
<body onload="print()">

	<center>
		<h2>Laporan Data Penjualan</h2>
	</center>
	<hr>

    <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        <th>No Transaksi</th>
        <th>Sampah</th>
        <th>Tanggal</th>
        <th>Berat</th>
        <th>Total</th>
        <th>Petugas</th>
            </tr><?php
            $start = 0;
            $penjualan_data = $this->db->get('penjualan')->result();
            foreach ($penjualan_data as $penjualan)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td width="80px"><?php echo 'JUAL00'.$penjualan->id_penjualan; ?></td>
            <td><?php echo ambil_field_tabel('sampah','id_sampah',$penjualan->id_sampah,'nama_sampah')   ?></td>
            <td><?php echo $penjualan->tanggal ?></td>
            <td><?php echo $penjualan->berat ?></td>
            <td><?php echo $penjualan->total ?></td>
            <td><?php echo $penjualan->petugas ?></td>
            
        </tr>
                <?php
            }
            ?>
        </table>
	

</body>
</html>