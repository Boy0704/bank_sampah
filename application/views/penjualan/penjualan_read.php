<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Penjualan Read</h2>
        <table class="table">
	    <tr><td>Id Sampah</td><td><?php echo $id_sampah; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Berat</td><td><?php echo $berat; ?></td></tr>
	    <tr><td>Total</td><td><?php echo $total; ?></td></tr>
	    <tr><td>Petugas</td><td><?php echo $petugas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('penjualan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>