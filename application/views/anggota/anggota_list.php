<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('anggota/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('anggota/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('anggota'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        <th>ID Anggota</th>
        <th>Nama Anggota</th>
        <th>Umur</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <!-- <th>Username</th>
        <th>Password</th>
        <th>Level</th> -->
        <th>Action</th>
            </tr><?php
            foreach ($anggota_data as $anggota)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo 'AGT00'.$anggota->id_anggota ?></td>
            <td><?php echo $anggota->nama_anggota ?></td>
            <td><?php echo $anggota->umur ?></td>
            <td><?php echo $anggota->jenis_kelamin ?></td>
            <td><?php echo $anggota->alamat ?></td>
            <!-- <td><?php echo $anggota->username ?></td>
            <td><?php echo $anggota->password ?></td>
            <td><?php echo $anggota->level ?></td> -->
            <td style="text-align:center" width="200px">
                <?php 
                 
                echo anchor(site_url('anggota/update/'.$anggota->id_anggota),'<span class="label label-info">Update</span>'); 
                echo ' | '; 
                echo anchor(site_url('anggota/delete/'.$anggota->id_anggota),'<span class="label label-danger">Hapus</span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
        </tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>