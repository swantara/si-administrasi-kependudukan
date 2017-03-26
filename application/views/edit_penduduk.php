  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SI Administrasi Kependudukan
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
                <img style="margin: 0 auto;" class="img-responsive" src="<?=base_url()?>assets/dist/img/no-image.jpg" alt="Program Picture">
                <hr>
                <lavel>Browse Foto :</lavel>
                <input required name="foto" type="file" id="fotoArtikel">
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
                <a href="<?=site_url('penduduk/detail')?>" class="btn btn-default"><i class="fa fa-close"></i> Cancel</a>
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