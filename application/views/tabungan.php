        <a href="pembelian/create/tabungan" class="btn btn-primary">Tambah Tabungan</a><br><br>
        <table class="table table-bordered" style="margin-bottom: 10px" id="">
        	<thead>
            <tr>
                <th>No</th>
		        <th>No Anggota</th>
                <th>Tabungan</th>
		        <th>Option</th>
            </tr>
            </thead>
            <tbody><?php
            $start = 0;
            $this->db->group_by('id_anggota');
            $pembelian_data = $this->db->get_where('pembelian', array('tabungan' => 'ya'))->result();
            foreach ($pembelian_data as $pembelian)
            {
                ?>

                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo 'AGT00'.$pembelian->id_anggota.'-'.ambil_field_tabel('anggota','id_anggota',$pembelian->id_anggota,'nama_anggota') ?></td>
            <td><b><?php echo "Rp. ". number_format(total_tabungan($pembelian->id_anggota));?></b></td>
            <td>
                <a href="app/detail_tabungan/<?php echo $pembelian->id_anggota ?>"><span class="label label-info">Detail</span></a>
                <a href="app/lap_tabungan/<?php echo $pembelian->id_anggota ?>" target="_blank"><span class="label label-success">Cetak Tabungan</span></a>
            </td>
            
        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        