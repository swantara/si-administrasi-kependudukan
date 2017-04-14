  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SI Administrasi Kependudukan
        <small>Tambah Data Pendatang</small>
      </h1>
    </section>

    <!-- Main content -->
      <section class="content">
        <div class="row">
        <?php echo form_open('pendatang/tambah', array('method' => 'POST', 'role' => 'form', 'enctype' => 'multipart/form-data'));?>
        <?php echo validation_errors();?>
          <!-- /.col -->
          <div class="col-md-12">
            <!-- About Me Box -->
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-edit margin-r-5"></i>Data Pendatang</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <label>NIK</label>
                  <input required name="nik" type="text" class="form-control" placeholder="Masukan Nomor Induk Kependudukan">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input required name="nama_penduduk" type="text" class="form-control" placeholder="Masukan Nama">
                </div>
                <div class="form-group">
                  <label>Alamat Asal</label>
                  <input required name="alamat_asal" type="text" class="form-control" placeholder="Masukan Alamat">
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
                <a href="<?=site_url('pendatang')?>" class="btn btn-default"><i class="fa fa-close"></i> Cancel</a>
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