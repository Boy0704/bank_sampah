
        <div class="alert alert-info">
            <h3>Total Saldo Tabungan : Rp. <?php echo number_format(total_tabungan($this->session->userdata('id_user'))); ?></h3>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px" id="">
        	<thead>
            <tr>
                <th>No</th>
		        <th>No Transaksi</th>
		        <th>Sampah</th>
		        <th>Tanggal</th>
		        <th>No Anggota</th>
		        <th>Berat</th>
		        <th>SubTotal</th>
            </tr>
            </thead>
            <tbody><?php
            $total = 0;
            $start = 0;
            $pembelian_data = $this->db->get_where('pembelian', array('tabungan' => 'ya','id_anggota'=>$this->session->userdata('id_user')))->result();
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
            <td><?php echo $pembelian->total; $total = $total + $pembelian->total; ?></td>
            
        </tr>
                <?php
            }
            ?>
            <tr>
                <th colspan="6">Total Tabungan</th>
                <th>Rp. <?php echo number_format($total) ?></th>
            </tr>
            </tbody>
        </table>

        <?php
        $id_user = $this->uri->segment(3);
        $cektabungan = $this->db->get_where('tabungan', array('id_user' => $id_user));
		if ($cektabungan->num_rows() == 0) {
			$this->db->insert('tabungan', array('id_user'=> $id_user, 'tabungan'=>$total));
		} else {
			$this->db->where('id_user',$id_user);
			$this->db->update('tabungan',array('tabungan'=>$total));
		}

        ?>
        