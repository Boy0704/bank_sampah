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
        <h2 style="margin-top:0px">Sampah Read</h2>
        <table class="table">
	    <tr><td>Nama Sampah</td><td><?php echo $nama_sampah; ?></td></tr>
	    <tr><td>Id Jenis</td><td><?php echo $id_jenis; ?></td></tr>
	    <tr><td>Harga Beli</td><td><?php echo $harga_beli; ?></td></tr>
	    <tr><td>Harga Jual</td><td><?php echo $harga_jual; ?></td></tr>
	    <tr><td>Stok</td><td><?php echo $stok; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('sampah') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>