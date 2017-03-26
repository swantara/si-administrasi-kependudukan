  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img class="img-circle" src="dist/img/no-image.jpg" alt="User profile picture">
        </div>
        <div class="pull-left info">
          <input name='id' id='id' value='".$id."' type='hidden'>
          <p><a href="#">User</a></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"> MENU</li>
        <li><a href="index.php"><i class="fa fa-home"></i> <span> Home</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa icon-wallet"></i> <span> Data Penduduk</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="data-penduduk.php"><i class="fa icon-arrow-right"></i> Data Penduduk</a></li>
            <li><a href="data-penduduk.php"><i class="fa icon-arrow-right"></i> Data Kelahiran</a></li>
            <li><a href="kupon-lunas.php"><i class="fa icon-arrow-right"></i> Data Pendatang</a></li>
            <li><a href="kupon-proses.php"><i class="fa icon-arrow-right"></i> Data Penduduk Meninggal</a></li>
            <li><a href="kupon-kembali.php"><i class="fa icon-arrow-right"></i> Data Penduduk Pindah</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa icon-wallet"></i> <span> Surat</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa icon-arrow-right"></i> SK Kelahiran</a></li>
            <li><a href="#"><i class="fa icon-arrow-right"></i> SK Pendatang</a></li>
            <li><a href="#"><i class="fa icon-arrow-right"></i> SK Kematian</a></li>
            <li><a href="#"><i class="fa icon-arrow-right"></i> SK Pindah</a></li>
            <li><a href="#"><i class="fa icon-arrow-right"></i> SK Kelakuan Baik</a></li>
            <li><a href="#"><i class="fa icon-arrow-right"></i> SK Usaha</a></li>
            <li><a href="#"><i class="fa icon-arrow-right"></i> SK Tidak Mampu</a></li>
            <li><a href="#"><i class="fa icon-arrow-right"></i> SK Belum Pernah Kawin</a></li>
            <li><a href="#"><i class="fa icon-arrow-right"></i> SK Perkawinan Umat Hindu</a></li>
            <li><a href="#"><i class="fa icon-arrow-right"></i> SK Permohonan KTP</a></li>
          </ul>
        </li>
        <li><a href="kelola_cabang.php"><i class="fa icon-basket"></i> <span> Potensi Daerah</span></a></li>
        <li class="header"> LOGOUT</li>
        <li><a onclick="return confirm('Pilih OK untuk melanjutkan.')" href="#"><i class="fa fa-power-off text-red"></i> <span> Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>