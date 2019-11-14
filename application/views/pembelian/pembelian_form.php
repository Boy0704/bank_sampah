<form action="<?php echo $aksi = ($this->uri->segment(3) == 'tabungan') ? $action.'/tabungan' : $action ; ?>" method="post">
        <div class="form-group">
            <label for="int">Sampah <?php echo form_error('id_sampah') ?></label>
            <!-- <input type="text" class="form-control" name="id_sampah" id="id_sampah" placeholder="Id Sampah" value="<?php echo $id_sampah; ?>" /> -->
            <select class="form-control select2" name="id_sampah" id="id_sampah" style="width: 100%;" >
              <option value="<?php echo ambil_field_tabel('sampah','id_sampah',$id_sampah,'nama_sampah') ?>"><?php echo ambil_field_tabel('sampah','id_sampah',$id_sampah,'nama_sampah') ?></option>

                <?php 
                foreach ($this->db->get('sampah')->result() as $row) {
                 ?>
                <option value="<?php echo $row->id_sampah ?>"><?php echo $row->nama_sampah ?></option>
            <?php } ?>

            </select>
            
        </div>
        <div class="form-group">
            <label for="date">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div>
        <div class="form-group">
            <label for="int">ID Anggota <?php echo form_error('id_anggota') ?></label>
            <!-- <input type="text" class="form-control" name="id_anggota" id="id_anggota" placeholder="Id Anggota" value="<?php echo $id_anggota; ?>" /> -->
            <select class="form-control select2" name="id_anggota" style="width: 100%;">
              <option value="<?php echo ambil_field_tabel('anggota','id_anggota',$id_anggota,'nama_anggota') ?>"><?php echo ambil_field_tabel('anggota','id_anggota',$id_anggota,'nama_anggota') ?></option>

                <?php 
                foreach ($this->db->get('anggota')->result() as $row) {
                 ?>
                <option value="<?php echo $row->id_anggota ?>"><?php echo 'AGT00'.$row->id_anggota.'-'.$row->nama_anggota ?></option>
            <?php } ?>

            </select>
        </div>
        <div class="form-group">
            <label for="int">Berat <?php echo form_error('berat') ?></label>
            <input type="text" class="form-control" name="berat" id="berat" placeholder="Berat" onkeypress="jumTotal()" value="<?php echo $berat; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Total <?php echo form_error('total') ?></label>
            <input type="text" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Tambahkan ke Tabungan</label>
            <select name="tabungan" class="form-control">
                <option value="<?php echo $tabungan ?>"><?php echo $tabungan ?></option>
                <option value="tidak">tidak</option>
                <option value="ya">ya</option>
            </select>
        </div>
        <div class="form-group">
            <label for="ket">Ket <?php echo form_error('ket') ?></label>
            <textarea class="form-control" rows="3" name="ket" id="ket" placeholder="Ket"><?php echo $ket; ?></textarea>
        </div>
        <input type="hidden" name="id_pembelian" value="<?php echo $id_pembelian; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('pembelian') ?>" class="btn btn-default">Cancel</a>
    </form>

    <script type="text/javascript">
        function jumTotal() {
            var id_sampah = $('#id_sampah').val();
            $.get("<?php echo base_url() ?>app/cekharga_beli/"+id_sampah, function(data, status){

                //alert("Data: " + data + "\nStatus: " + status);
                var harga = data;
                var berat = $("#berat").val();
                var total = harga * berat;
                $('#total').val(total);
            });

            
        }


    </script>