<form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="int">Sampah <?php echo form_error('id_sampah') ?></label>
            <!-- <input type="text" class="form-control" name="id_sampah" id="id_sampah" placeholder="Id Sampah" value="<?php echo $id_sampah; ?>" /> -->
            <select class="form-control select2" name="id_sampah" id="id_sampah" style="width: 100%;">
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
            <label for="int">Berat <?php echo form_error('berat') ?></label>
            <input type="text" class="form-control" name="berat" id="berat" placeholder="Berat" onkeypress="jumTotal()" value="<?php echo $berat; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Total <?php echo form_error('total') ?></label>
            <input type="text" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Petugas <?php echo form_error('petugas') ?></label>
            <input type="text" class="form-control" name="petugas" id="petugas" placeholder="Petugas" value="<?php echo $this->session->userdata('nama'); ?>" />
        </div>
        <input type="hidden" name="id_penjualan" value="<?php echo $id_penjualan; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('penjualan') ?>" class="btn btn-default">Cancel</a>
    </form>

    <script type="text/javascript">
        function jumTotal() {
            var id_sampah = $('#id_sampah').val();
            $.get("<?php echo base_url() ?>app/cekharga_jual/"+id_sampah, function(data, status){

                //alert("Data: " + data + "\nStatus: " + status);
                var harga = data;
                var berat = $("#berat").val();
                var total = harga * berat;
                $('#total').val(total);
            });

            
        }


    </script>