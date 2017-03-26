  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SI Ancat Duduk
        <small>Edit Data Penduduk</small>
      </h1>
    </section>

    <!-- Main content -->
      <section class="content">
        <div class="row">
        <form action"" method="post" enctype="multipart/form-data">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-success">
              <div class="box-body box-profile">
                <lavel>Preview</lavel>
                <img style="margin: 0 auto;" class="img-responsive" src="dist/img/no-image.jpg" alt="Program Picture">
                <hr>
                <lavel>Browse Foto :</lavel>
                <input required name="foto" type="file" id="foto">
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
                <h3 class="box-title"><i class="fa fa-edit margin-r-5"></i>Edit Data Penduduk</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <label>NIK</label>
                  <input required name="nik" type="text" class="form-control" value="1">
                </div>
                <div class="form-group">
                  <label>NKK</label>
                  <input required name="nkk" type="text" class="form-control" value="2">
                </div>
                <div class="form-group">
                  <label>Status KK</label>
                  <select required name="status_kk" class="form-control">
                    <option value="1" >Aktif</option>
                    <option value="0" selected>Non-aktif</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input required name="nama" type="text" class="form-control" value="4">
                </div>
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input required name="tempat_lahir" type="text" class="form-control" value="5">
                </div>
                <div class="form-group">
                  <label>Tanggal Lahir</label><br>
                  <div class='input-group date'>
                    <div class='input-group-addon'>
                      <i class='fa fa-calendar'></i>
                    </div>
                    <input type='text' class='form-control pull-right' id='datepicker'>
                  </div>
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select required name="jenis_kelamin" class="form-control">
                    <option value="1" >Laki-laki</option>
                    <option value="0" selected>Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input required name="alamat" type="text" class="form-control" value="6">
                </div>
                <div class="form-group">
                  <label>Agama</label>
                  <select required name="jenis_kelamin" class="form-control">
                    <option value="1" >Agama 1</option>
                    <option value="2" selected>Agama 2</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Pendidikan</label>
                  <select required name="jenis_kelamin" class="form-control">
                    <option value="1" >Pendidikan 1</option>
                    <option value="2" selected>Pendidikan 2</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Pekerjaan</label>
                  <input required name="pekerjaan" type="text" class="form-control" value="7">
                </div>
                <div class="form-group">
                  <label>Telepon</label>
                  <input required name="telepon" type="text" class="form-control" value="8">
                </div>
                <div class="form-group">
                  <label>Status Perkawinan</label>
                  <select required name="jenis_kelamin" class="form-control">
                    <option value="1" >Jomblo</option>
                    <option value="2" selected>Cuma Dianggep Kakak</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nama Ayah</label>
                  <input required name="ayah" type="text" class="form-control" value="9">
                </div>
                <div class="form-group">
                  <label>Nama Ibu</label>
                  <input required name="ibu" type="text" class="form-control" value="10">
                </div>
                <div class="form-group">
                  <label>Kewarganegaraan</label>
                  <input required name="kewarganegaraan" type="text" class="form-control" value="11">
                </div>
                <div class="form-group">
                  <label>Status Kependudukan</label>
                  <select required name="jenis_kelamin" class="form-control">
                    <option value="1" >Status 1</option>
                    <option value="2" selected>Status 2</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Tanggal Input</label><br>
                  <div class='input-group date'>
                    <div class='input-group-addon'>
                      <i class='fa fa-calendar'></i>
                    </div>
                    <input type='text' class='form-control pull-right' id='datepicker'>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="song-detail.php" class="btn btn-default"><i class="fa fa-close"></i> Cancel</a>
                <button type="submit" class="btn btn-default pull-right"><i class="fa fa-check text-green"></i> Submit</button>
              </div>
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </form>
        </div>
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
<!-- bs datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy',
      endDate: '+0d'
    }); 
</script>
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