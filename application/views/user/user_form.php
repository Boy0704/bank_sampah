<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <div class="form-line">
            <label for="varchar">Nama User <?php echo form_error('nama_user') ?></label>
            <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Nama User" value="<?php echo $nama_user; ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="form-line">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="form-line">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="form-line">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="form-line">
            <label for="varchar">Foto User </label>
            <input type="file" class="form-control" name="foto_user" id="foto_user" />

            </div>
            <?php 
            if ($foto_user !== '') {
                ?>
                <div>
                    *) Gambar Sebelumnya <br>
                    <img src="image/user/<?php echo $foto_user ?>" style="width: 100px;height: 100px;">
                </div>
                <?php
            } else {
                #kosngs
            }
            ?>
        </div>
        <div class="form-group">
            <div class="form-line">
            <label for="varchar">Level </label>
            <!-- <input type="text" class="form-control" name="level" id="level" placeholder="Level" value="<?php echo $level; ?>" /> -->
            <select class="form-control show-tick" name="level">
                <option value="<?php echo $level ?>"><?php echo $level ?></option>
                <option value="admin">admin</option>
                <option value="operator">operator</option>
            </select>
            </div>
        </div>
        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a>
    </form>