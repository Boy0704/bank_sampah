<form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Jenis Sampah <?php echo form_error('jenis_sampah') ?></label>
            <input type="text" class="form-control" name="jenis_sampah" id="jenis_sampah" placeholder="Jenis Sampah" value="<?php echo $jenis_sampah; ?>" />
        </div>
        <input type="hidden" name="id_jenis" value="<?php echo $id_jenis; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('jenis_sampah') ?>" class="btn btn-default">Cancel</a>
    </form>