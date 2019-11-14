<form action="" method="post">
    <div class="form-group">
        <label>Kode Nasabah</label>
        <!-- <input type="text" class="form-control" name="id_anggota"> -->
        <select class="form-control select2" name="id_anggota" id="id_anggota" style="width: 100%;" >
              <option value="">Pilih Nasabah</option>

                <?php 
                foreach ($this->db->get('anggota')->result() as $row) {
                 ?>
                <option value="<?php echo $row->id_anggota ?>"><?php echo $row->nama_anggota ?></option>
            <?php } ?>

            </select>
    </div>
    <div class="form-group">
        <label>Jumlah Penarikan</label>
        <input type="number" class="form-control" name="penarikan">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Proses</button>
    </div>
</form>

<br><br>

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
        foreach ($this->db->get('penarikan')->result() as $rw) {
         ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $rw->tanggal; ?></td>
            <td><?php echo 'AGT00'.$rw->id_anggota.'-'.ambil_field_tabel('anggota','id_anggota',$rw->id_anggota,'nama_anggota') ?></td>
            <td><?php echo number_format($rw->jumlah); ?></td>
        </tr>
        <?php $no++; } ?>
    </table>
</div>