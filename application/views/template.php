<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Tell the browser to be responsive to screen width -->

  <title>SI Administrasi Desa</title>

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">  
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/select2/select2.min.css">

  <!-- simple line icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">

  <link rel="manifest" href="<?=base_url()?>assets/manifest.json">
  <!-- jQuery 2.2.0 -->
  <script src="<?=base_url()?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>

  
  <!-- DataTables -->
  <script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=site_url('dashboard')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SI</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SI</b>ADMINISTRASI</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img class="img-circle" src="<?=base_url()?>assets/dist/img/no-image-user.jpg" alt="User profile picture">
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
        <li id="home"><a href="<?=site_url('dashboard')?>"><i class="fa fa-home"></i> <span> Home</span></a></li>
        <li id="data_penduduk" class="treeview">
          <a href="#">
            <i class="fa icon-wallet"></i> <span> Data Penduduk</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li id="penduduk"><a href="<?=site_url('penduduk')?>"><i class="fa icon-arrow-right"></i> Data Penduduk</a></li>
            <li id="kelahiran"><a href="<?=site_url('kelahiran')?>"><i class="fa icon-arrow-right"></i> Data Kelahiran</a></li>
            <li id="pendatang"><a href="<?=site_url('pendatang')?>"><i class="fa icon-arrow-right"></i> Data Pendatang</a></li>
            <li id="kematian"><a href="<?=site_url('kematian')?>"><i class="fa icon-arrow-right"></i> Data Penduduk Meninggal</a></li>
            <li id="pindah"><a href="<?=site_url('pindah')?>"><i class="fa icon-arrow-right"></i> Data Penduduk Pindah</a></li>
          </ul>
        </li>
        <li id="surat" class="treeview">
          <a href="#">
            <i class="fa icon-wallet"></i> <span> Surat</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li id="surat_kelahiran"><a href="<?=site_url('surat_kelahiran')?>"><i class="fa icon-arrow-right"></i> SK Kelahiran</a></li>
            <li id="surat_pendatang"><a href="#"><i class="fa icon-arrow-right"></i> SK Pendatang</a></li>
            <li id="surat_kematian"><a href="#"><i class="fa icon-arrow-right"></i> SK Kematian</a></li>
            <li id="surat_pindah"><a href="#"><i class="fa icon-arrow-right"></i> SK Pindah</a></li>
            <li id="surat_kelakuan_baik"><a href="#"><i class="fa icon-arrow-right"></i> SK Kelakuan Baik</a></li>
            <li id="surat_usaha"><a href="#"><i class="fa icon-arrow-right"></i> SK Usaha</a></li>
            <li id="surat_tidak_mampu"><a href="#"><i class="fa icon-arrow-right"></i> SK Tidak Mampu</a></li>
            <li id="surat_belum_kawin"><a href="#"><i class="fa icon-arrow-right"></i> SK Belum Pernah Kawin</a></li>
            <li id="surat_perkawinan_hindu"><a href="#"><i class="fa icon-arrow-right"></i> SK Perkawinan Umat Hindu</a></li>
            <li id="surat_permohonan_ktp"><a href="#"><i class="fa icon-arrow-right"></i> SK Permohonan KTP</a></li>
          </ul>
        </li>
        <li id="potensi"><a href="#"><i class="fa icon-basket"></i> <span> Potensi Daerah</span></a></li>
        <li class="header"> LOGOUT</li>
        <li><a onclick="return confirm('Pilih OK untuk melanjutkan.')" href="<?=site_url('login/logout')?>"><i class="fa fa-power-off text-red"></i> <span> Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <?=$body?>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2017 <a href="#">SI Administrasi Desa</a>.</strong> All rights
    reserved.
  </footer>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/dist/js/demo.js"></script>
<!-- bootstrap datepicker -->
<script src="<?=base_url()?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Select2 -->
<script src="<?=base_url()?>assets/plugins/select2/select2.full.min.js"></script>
<!-- excel -->
<script src="https://rawgithub.com/eligrey/FileSaver.js/master/FileSaver.js" type="text/javascript"></script>
<script>
function export() {
  var blob = new Blob([document.getElementById('exportable').innerHTML], {
    type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=utf-8"
  });
  saveAs(blob, "report.xls");
}
</script>
<!-- page script -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script>
  $(document).ready(function() {
    //Initialize Select2 Elements
    $(".select2").select2();
    $('#example2').DataTable( {
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "scrollX": true,
      dom: 'Bfrtip',
      buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
      ]
    });
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy'
    });
    $('#kedatangan_datepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy'
    });
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy'
    });
  } );
</script>

</body>
</body>
</html>