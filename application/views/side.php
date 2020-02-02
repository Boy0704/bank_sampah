<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="image/user/<?php echo $this->session->userdata('foto') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <?php 
        if ($this->session->userdata('level') == 'admin') {
         ?>
        
        <li><a href="app"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-recycle"></i>
            <span>Master Data Sampah</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="sampah"><i class="fa fa-circle-o"></i> <span>Data Sampah</span></a></li>
            <li><a href="jenis_sampah"><i class="fa fa-circle-o"></i> <span>Jenis Sampah</span></a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-send"></i>
            <span>Master Data Transaksi</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">3</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pembelian"><i class="fa fa-money"></i> <span>Pembelian Sampah</span></a></li>
            <li><a href="app/tarik_tabungan"><i class="fa fa-cart-plus"></i> <span>Tarik Tabungan</span></a></li>
            <li><a href="app/tabungan"><i class="fa fa-money"></i> <span>Tabungan Sampah</span></a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-pdf-o"></i>
            <span>Data Laporan</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">3</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="app/lap_nasabah" target="_blank"><i class="fa fa-circle-o"></i> <span>Laporan Data Nasabah</span></a></li>
            <li><a href="app/lap_sampah" target="_blank"><i class="fa fa-circle-o"></i> <span>Laporan Data Sampah</span></a></li>
            <li><a href="app/lap_pembelian" target="_blank"><i class="fa fa-circle-o"></i> <span>Laporan Data Transaksi</span></a></li>
            <!-- <li><a href="app/lap_penjualan" target="_blank"><i class="fa fa-circle-o"></i> <span>Laporan Data Penjualan</span></a></li> -->
          </ul>
        </li>
        
        
        <li><a href="anggota"><i class="fa fa-user"></i> <span>Data Nasabah</span></a></li>
        <li><a href="penjualan"><i class="fa fa-list"></i> <span>Data Penjualan</span></a></li>
        <li><a href="app/pengelola"><i class="fa fa-list"></i> <span>Data Pengelola</span></a></li>
        <li><a href="app/persentase_keuntungan"><i class="fa fa-list"></i> <span>Persentase Keuntungan</span></a></li>
        <li><a href="user"><i class="fa fa-users"></i> <span>Manajemen User</span></a></li>
      <?php } elseif ($this->session->userdata('level') == 'anggota') { ?>
         <li><a href="app"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
         <li><a href="app/sampah"><i class="fa fa-circle-o"></i> <span>Data Sampah</span></a></li>
         <li><a href="app/tabungan_nasabah/<?php echo $this->session->userdata('id_user') ?>"><i class="fa fa-money"></i> <span>Riwayat Tabungan Nasabah</span></a></li>

      <?php } ?>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Tentang Aplikasi</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Bantuan</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>