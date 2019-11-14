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