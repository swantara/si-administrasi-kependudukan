  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SI Ancat Duduk
        <small>Detail Data Penduduk</small>
      </h1>
    </section>

    <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-success">
              <div class="box-body box-profile">
                <img style="margin: 0 auto;" class="img-responsive" src="dist/img/no-image.jpg" alt="Program Picture">
                <hr/>
                <button type="button" class="btn btn-default btn-block" onClick="window.location.href='data-penduduk-edit.php'">
                  <i class="fa fa-edit"></i> Edit
                </button>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <!-- About Me Box -->
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-edit margin-r-5"></i> Detail Data Penduduk</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <strong>NIK</strong>
                <p>1</p>
                <hr/>
                <strong>NKK</strong>
                <p>2</p>
                <hr/>
                <strong>Status KK</strong>
                <p>2</p>
                <hr/>
                <strong>Nama</strong>
                <p>3</p>
                <hr/>
                <strong>TTL</strong>
                <p>4</p>
                <hr/>
                <strong>Jenis Kelamin</strong>
                <p>5</p>
                <hr/>
                <strong>Alamat</strong>
                <p>6</p>
                <hr/>
                <strong>Agama</strong>
                <p>7</p>
                <hr/>
                <strong>Pekerjaan</strong>
                <p>8</p>
                <hr/>
                <strong>Telepon</strong>
                <p>9</p>
                <hr/>
                <strong>Status Perkawinan</strong>
                <p>10</p>
                <hr/>
                <strong>Nama Ayah</strong>
                <p>11</p>
                <hr/>
                <strong>Nama Ibu</strong>
                <p>12</p>
                <hr/>
                <strong>Kewarganegaraan</strong>
                <p>13</p>
                <hr/>
                <strong>Status Kependudukan</strong>
                <p>14</p>
                <hr/>
                <strong>Foto</strong>
                <p>15</p>
                <hr/>
                <strong>Tanggal Input</strong>
                <p>16</p>
                <hr/>
                <strong>Periode Data</strong>
                <p>17</p>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2016 <a href="#">Edukezy</a>.</strong> All rights
    reserved.
  </footer>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->

<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<!-- <script>
  $(document).ready(function() {
    $('#example1').DataTable( {
      "scrollX": true,
      dom: 'Bfrtip',
      buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
      ]
    } );
  } );
</script> -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<!-- Button Function -->
<script>
function deletePrompt(id){
  var prompt = confirm("Pilih OK untuk melanjutkan.")
  if(prompt == true){
    Javascript:window.location.href = 'function/delete_admin.php?id='+id;
  }
}
</script>
<!-- <a href="function/delete_admin.php?id=<?=$row['id'];?>" onclick="return confirm('Are you sure?')">Hapus</a> -->
</body>
</html>