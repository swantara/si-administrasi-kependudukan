  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SI Administrasi Kependudukan
        <small>Tambah Data Perpindahan Penduduk</small>
      </h1>
    </section>

    <!-- Main content -->
      <section class="content">
        <div class="row">
        <form action"" method="post" enctype="multipart/form-data">
          <!-- /.col -->
          <div class="col-md-12">
            <!-- About Me Box -->
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-edit margin-r-5"></i>Data Penduduk Pindah</h3>
              </div>
              <!-- /.box-header -->
              
              <div class="box-body">
                <div class="form-group">
                  <label>NKK</label>
                  <input required name="nkk" type="text" class="form-control" placeholder="Masukan Nomor Kartu Keluarga">
                </div>
                <div class="form-group">
                  <label>Tanggal Pindah</label><br>
                  <div class='input-group date'>
                    <div class='input-group-addon'>
                      <i class='fa fa-calendar'></i>
                    </div>
                    <input type='text' class='form-control pull-right' id='datepicker'>
                  </div>
                </div>
                <div class="form-group">
                  <label>Alasan Pindah</label>
                  <input required name="alasan_pindah" type="text" class="form-control" placeholder="Masukan Alasan">
                </div>
                 <div class="form-group">
                  <label>Alamat Tujuan</label>
                  <input required name="tujuan_pindah" type="text" class="form-control" placeholder="Masukan Alamat">
                </div>
                <div class="form-group">
                  <label>Banjar</label>
                  <input required name="banjar" type="text" class="form-control" placeholder="Nama Banjar">
                </div>
                  <div class="form-group">
                  <label>Desa</label>
                  <input required name="desa" type="text" class="form-control" placeholder="Nama Desa">
                </div>
                  <div class="form-group">
                  <label>Banjar</label>
                  <input required name="banjar" type="text" class="form-control" placeholder="Nama Banjar">
                </div>
                  <div class="form-group">
                  <label>Kecamatan</label>
                  <input required name="kecamatan" type="text" class="form-control" placeholder="Nama Kecamatan">
                </div>
                  <div class="form-group">
                  <label>Kabupaten</label>
                  <input required name="kabupaten" type="text" class="form-control" placeholder="Nama Kabupaten">
                </div>
                  <div class="form-group">
                  <label>Provinsi</label>
                  <input required name="provinsi" type="text" class="form-control" placeholder="Nama Provinsi">
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <input required name="keternagan_pindah" type="text" class="form-control" placeholder="Keterangan">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?=site_url('pindah')?>" class="btn btn-default"><i class="fa fa-close"></i> Cancel</a>
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