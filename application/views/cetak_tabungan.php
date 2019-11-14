<!DOCTYPE html>
<html>
<head>
	<title></title>
	<base href="<?php echo base_url() ?>">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

</head>
<body onload="print()">

	<center>
		<h2>Laporan Data Tabungan</h2>
	</center>
	<hr>
    <?php 
    $id = $this->uri->segment(3);
    $total_penarikan = 0;
    $total_tabungan = 0;
     ?>
    <div>
        <h3>No Nasabah : <?php echo "AGT00".$id ?></h3>
        <h3>Total Tabungan : <?php echo "Rp. ". number_format(total_tabungan($id));?> </h3>
    </div>
    <br><br>
    <h4>Data Tabungan Masuk</h4>
	<table class="table table-bordered" style="margin-bottom: 10px" id="">
            <thead>
            <tr>
                <th>No</th>
                <th>No Transaksi</th>
                <th>Sampah</th>
                <th>Tanggal</th>
                <th>No Anggota</th>
                <th>Berat</th>
                <th>Total</th>
                <th>Tabungan</th>
            </tr>
            </thead>
            <tbody><?php
            $start = 0;
            $pembelian_data = $this->db->get_where('pembelian', array('tabungan' => 'ya','id_anggota'=>$this->uri->segment(3)))->result();
            foreach ($pembelian_data as $pembelian)
            {
                ?>

                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo 'BELI00'.$pembelian->id_pembelian ?></td>
            <td><?php echo  ambil_field_tabel('sampah','id_sampah',$pembelian->id_sampah,'nama_sampah')  ?></td>
            <td><?php echo $pembelian->tanggal ?></td>
            <td><?php echo 'AGT00'.$pembelian->id_anggota.'-'.ambil_field_tabel('anggota','id_anggota',$pembelian->id_anggota,'nama_anggota') ?></td>
            <td><?php echo $pembelian->berat ?></td>
            <td><?php echo $pembelian->total; $total_tabungan = $total_tabungan+$pembelian->total; ?></td>
            <td><?php echo $pembelian->tabungan ?></td>
            
        </tr>
                <?php
            }
            ?>
            <tr>
                <td colspan="6">Total</td>
                <td colspan="2"><b><?php echo number_format($total_tabungan) ?></b></td>
            </tr>
            </tbody>
        </table>

        <br><br>
        <h4>Data Penarikan Tabungan</h4>
        <div class="row" style="margin-left: 10px;">
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>No Nasabah</th>
            <th>Jumlah Penarikan</th>
        </tr>

        <?php 
        $no = 1;
        foreach ($this->db->get_where('penarikan',array('id_anggota'=>$id))->result() as $rw) {
         ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $rw->tanggal; ?></td>
            <td><?php echo 'AGT00'.$rw->id_anggota.'-'.ambil_field_tabel('anggota','id_anggota',$rw->id_anggota,'nama_anggota') ?></td>
            <td><?php echo number_format($rw->jumlah); $total_penarikan=$total_penarikan+$rw->jumlah; ?></td>
        </tr>
        <?php $no++; } ?>
        <tr>
                <td colspan="3">Total</td>
                <td ><b><?php echo number_format($total_penarikan) ?></b></td>
            </tr>
    </table>
</div>


</body>
</html>