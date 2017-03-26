  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SI Administrasi Kependudukan
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
                <img style="margin: 0 auto;" class="img-responsive" src="<?=base_url()?>assets/dist/img/no-image.jpg" alt="Program Picture">
                <hr/>
                <button type="button" class="btn btn-default btn-block" onClick="window.location.href='<?=site_url('penduduk/edit')?>'">
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
                <h3 class="box-title"><i class="fa fa-quote-right margin-r-5"></i> Deskripsi</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <strong>NIK</strong>
                <p>Nomor Induk Kependudukan</p>
                <hr/>
                <strong>NKK</strong>
                <p>Nomor Kepala Keluarga</p>
                <hr/>
                <strong>Nama Lengkap</strong>
                <p>Nama Lengkap</p>
                <hr/>
                <strong>TTL</strong>
                <p>Tempat Tanggal Lahir</p>
                <hr/>
                <strong>Jenis Kelamin</strong>
                <p>Jenis Kelamin</p>
                <hr/>
                <strong>Alamat</strong>
                <p>Alamat</p>
                <hr/>
                <strong>Agama</strong>
                <p>Agama</p>
                <hr/>
                <strong>Pekerjaan</strong>
                <p>Pekerjaan</p>
                <hr/>
                <strong>SHDK</strong>
                <p>Status Hubungan Dalam Keluarga</p>
                <hr/>
                <strong>Nama Ayah</strong>
                <p>Nama Ayah</p>
                <hr/>
                <strong>Nama Ibu</strong>
                <p>Nama Ibu</p>
                <hr/>
                <strong>Status Perkawinan</strong>
                <p>Kawin</p>
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