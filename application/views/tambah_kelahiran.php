  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SI Administrasi Kependudukan
        <small>Tambah Data Penduduk</small> 
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
                <h3 class="box-title"><i class="fa fa-edit margin-r-5"></i>Data Kelahiran</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <label>NIK</label>
                  <select required name="nama" class="form-control select2">
                    <?php
                      if(is_object($penduduk) || is_array($penduduk)) :
                        foreach ($penduduk as $row) :
                    ?>
                    <option value="<?=$row->nik?>"><?php echo $row->nik . " (" . $row->nama . ")"?></option>
                    <?php
                        endforeach;
                      endif;
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input required name="" type="text" class="form-control" placeholder="12 digit">
                </div>
                <div class="form-group">
                  <label>Kewarganegaraan</label>
                  <input required name="nama" type="text" class="form-control" placeholder="Kewarganegaraan">
                </div>
                <hr/>
                <div class="form-group">
                  <label>Nama Ayah</label>
                  <div class="row">
                    <div class="col-md-6">
                      <input required name="nama_ayah" type="text" class="form-control" placeholder="nama ayah" onblur="getdata(this)">
                    </div>
                    <div class="col-md-6">
                      <h5 id="nama_ayah_nama">Nama :</h5>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Nama Ibu</label>
                  <div class="row">
                    <div class="col-md-6">
                      <input required name="nama_ibu" type="text" class="form-control" placeholder="nama ibu" onblur="getdata(this)">
                    </div>
                    <div class="col-md-6">
                      <h5 id="nama_ibu_nama">Nama :</h5>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Saksi I</label>
                  <div class="row">
                    <div class="col-md-6">
                      <input required name="saksi_I" type="text" class="form-control" placeholder="nama saksi I" onblur="getdata(this)">
                    </div>
                    <div class="col-md-6">
                      <h5 id="saksi_I_nama">Nama : </h5>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Saksi II</label>
                  <div class="row">
                    <div class="col-md-6">
                      <input required name="saksi_II" type="text" class="form-control" placeholder="Nama saksi 2" onblur="getdata(this)">
                    </div>
                    <div class="col-md-6">
                      <h5 id="saksi_II_nama">Nama :</h5>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?=site_url('kelahiran')?>" class="btn btn-default"><i class="fa fa-close"></i> Cancel</a>
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

<script>
  
  function getdata(input)
  {
    $.getJSON( "<?=site_url('penduduk/ajaxgetdetailbynik/')?>" + input.value)
      .done(function( data ) {
        if(data != null)
        {
          $('#' + input.name + '_nama').html('Nama : ' + data.nama);
        }
        else
        {
          $('#' + input.name + '_nama').html('Data tidak ditemukan');
        }
      });
  }

</script>