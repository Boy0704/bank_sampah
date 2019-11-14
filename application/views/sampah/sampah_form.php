<form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Nama Sampah <?php echo form_error('nama_sampah') ?></label>
            <input type="text" class="form-control" name="nama_sampah" id="nama_sampah" placeholder="Nama Sampah" value="<?php echo $nama_sampah; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Jenis Sampah<?php echo form_error('id_jenis') ?></label>
            <!-- <input type="text" class="form-control" name="id_jenis" id="id_jenis" placeholder="Id Jenis" value="<?php echo $id_jenis; ?>" /> -->
            <select class="form-control" name="id_jenis" style="width: 100%;">
              <option value="<?php echo ambil_field_tabel('jenis_sampah','id_jenis',$id_jenis,'jenis_sampah') ?>"><?php echo ambil_field_tabel('jenis_sampah','id_jenis',$id_jenis,'jenis_sampah') ?></option>

                <?php 
                foreach ($this->db->get('jenis_sampah')->result() as $row) {
                 ?>
                <option value="<?php echo $row->id_jenis ?>"><?php echo $row->jenis_sampah ?></option>
            <?php } ?>

            </select>

        </div>
        <div class="form-group">
            <label for="int">Harga Beli <?php echo form_error('harga_beli') ?></label>
            <input type="text" class="form-control" name="harga_beli" id="harga_beli" placeholder="Harga Beli" value="<?php echo $harga_beli; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Harga Jual <?php echo form_error('harga_jual') ?></label>
            <input type="text" class="form-control" name="harga_jual" id="harga_jual" placeholder="Harga Jual" value="<?php echo $harga_jual; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Stok <?php echo form_error('stok') ?></label>
            <input type="text" class="form-control" name="stok" id="stok" placeholder="Stok" value="<?php echo $stok; ?>" />
        </div>
        <input type="hidden" name="id_sampah" value="<?php echo $id_sampah; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('sampah') ?>" class="btn btn-default">Cancel</a>
    </form>