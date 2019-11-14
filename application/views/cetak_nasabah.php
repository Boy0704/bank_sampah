<!DOCTYPE html>
<html>
<head>
	<title></title>
	<base href="<?php echo base_url() ?>">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

</head>
<body onload="print()">

	<center>
		<h2>Laporan Data Nasabah</h2>
	</center>
	<hr>

	<table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        <th>ID Anggota</th>
        <th>Nama Anggota</th>
        <th>Umur</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <!-- <th>Username</th>
        <th>Password</th>
        <th>Level</th> -->
            </tr><?php
            $start = 0;
            $anggota_data = $this->db->get('anggota')->result();
            foreach ($anggota_data as $anggota)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo 'AGT00'.$anggota->id_anggota ?></td>
            <td><?php echo $anggota->nama_anggota ?></td>
            <td><?php echo $anggota->umur ?></td>
            <td><?php echo $anggota->jenis_kelamin ?></td>
            <td><?php echo $anggota->alamat ?></td>
            <!-- <td><?php echo $anggota->username ?></td>
            <td><?php echo $anggota->password ?></td>
            <td><?php echo $anggota->level ?></td> -->
            
        </tr>
                <?php
            }
            ?>
        </table>

</body>
</html>