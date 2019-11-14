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
        <h2 style="margin-top:0px">Jenis_sampah Read</h2>
        <table class="table">
	    <tr><td>Jenis Sampah</td><td><?php echo $jenis_sampah; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jenis_sampah') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>