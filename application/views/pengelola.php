<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<tr>
				<th width="80">No.</th>
				<th>Nama</th>
				<th>Jabatan</th>
			</tr>
			<?php 
			$no =1;
			$this->db->where('jabatan !=', '');
			$data = $this->db->get('users');
			if ($data->num_rows() > 0) {
			foreach ($data->result() as $rw) {
			 ?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $rw->nama_user; ?></td>
				<td><?php echo $rw->jabatan; ?></td>
			</tr>
			<?php $no++; }
			} else { 
			 ?>
			<td colspan="3">Tidak Ada data.</td>
			<?php } ?>
		</table>
	</div>
</div>