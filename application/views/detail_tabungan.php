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
            <td><?php echo $pembelian->total ?></td>
            <td><?php echo $pembelian->tabungan ?></td>
            
        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>