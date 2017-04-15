  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SI Administrasi Kependudukan
        <small>Tambah Data Kematian</small>
      </h1>
    </section>

    <!-- Main content -->
      <section class="content">
        <div class="row">
        <?php echo form_open('kematian/tambah', array('method' => 'POST', 'role' => 'form', 'enctype' => 'multipart/form-data'));?>
        <?php echo validation_errors();?>
          <!-- /.col -->
          <div class="col-md-12">
            <!-- About Me Box -->
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-edit margin-r-5"></i>Data Kematian</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>NIK</label>
                      <input id="penduduk" required name="nik" type="text" class="form-control" value="<?=set_value('nik')?>"  placeholder="Masukan Nomor Induk Kependudukan" onblur="getdata(this)">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Nama</label>
                      <input required readonly id="nama_penduduk" name="nama_penduduk" type="text" class="form-control" value="<?=set_value('nama_penduduk')?>" placeholder="Nama Penduduk">
                      <input type="hidden" id="id_penduduk" name="id_penduduk" type="text" class="form-control" value="<?=set_value('id_penduduk')?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Penyebab</label>
                      <input required name="penyebab" type="text" class="form-control" value="<?=set_value('penyebab')?>" placeholder="Penyebab Meninggal">
                    </div>                   
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tempat Meninggal</label>
                      <input required name="tempat_meninggal" type="text" class="form-control" value="<?=set_value('tempat_meninggal')?>" placeholder="Tempat Meninggal">
                    </div>                   
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tanggal Kematian</label><br>
                      <div class='input-group date'>
                        <div class='input-group-addon'>
                          <i class='fa fa-calendar'></i>
                        </div>
                        <input required name="tanggal_meninggal" type='text' class='form-control pull-right' id='datepicker' value="<?=set_value('tanggal_meninggal')?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <input required name="keterangan" type="text" class="form-control" value="<?=set_value('keterangan')?>" placeholder="Keterangan">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?=site_url('kematian')?>" class="btn btn-default"><i class="fa fa-close"></i> Cancel</a>
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
          $('#nama_' + input.id).val(data.nama);
          $('#id_' + input.id).val(data.id_penduduk);
        }
        else
        {
          $('#nama_' + input.id).val('Data tidak ditemukan');
        }
      });
  }

</script>