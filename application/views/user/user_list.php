<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('user/create'),'Tambah Data', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('user/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <div class="form-line">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        </div>
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('user'); ?>" class="btn btn-default">Reset</a>
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
        <th>Nama User</th>
        <th>Username</th>
        <th>Email</th>
        <th>Foto User</th>
        <th>Level</th>
        <th>Action</th>
            </tr><?php
            foreach ($user_data as $user)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $user->nama_user ?></td>
            <td><?php echo $user->username ?></td>
            <td><?php echo $user->email ?></td>
            <td><img src="image/user/<?php echo $user->foto_user ?>" style="width: 100px; height: 100px;"></td>
            <td><?php echo $user->level ?></td>
            <td style="text-align:center" width="200px">
                <?php 
                echo anchor(site_url('user/update/'.$user->id_user),'<button class="btn btn-sm btn-info"><i class="fa fa-pencil"></i></button>'); 
                echo ' | '; 
                echo anchor(site_url('user/delete/'.$user->id_user),'<button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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