  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Surat Kelahiran |
        <small>SI Administrasi Kependudukan</small>
      </h1>
    </section>

    <!-- Main content -->
      <section class="content">
        <div class="row">
        <?php echo form_open('surat_kelahiran/tambah', array('method' => 'POST', 'role' => 'form', 'enctype' => 'multipart/form-data'));?>
        <?php echo validation_errors();?>
          <!-- /.col -->
          <div class="col-md-12">
            <!-- About Me Box -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-edit margin-r-5"></i>Data Surat Kelahiran</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>NIK</label>
                      <input id="kelahiran" required name="nik" type="text" class="form-control" value="<?=set_value('nik')?>"  placeholder="Masukan Nomor Induk Kependudukan" onblur="getdata(this)">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Nama</label>
                      <input required readonly id="nama_kelahiran" name="nama_kelahiran" type="text" class="form-control" value="<?=set_value('nama_kelahiran')?>" placeholder="Nama Penduduk">
                      <input type="hidden" id="id_kelahiran" name="id_kelahiran" type="text" class="form-control" value="<?=set_value('id_kelahiran')?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tanggal Surat</label><br>
                      <div class='input-group date'>
                        <div class='input-group-addon'>
                          <i class='fa fa-calendar'></i>
                        </div>
                        <input required name="tanggal_surat" type='text' class='form-control pull-right' id='datepicker' value="<?=set_value('tanggal_surat')?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>No Surat Kantor</label>
                      <input required name="no_surat_kantor" type="text" class="form-control" value="<?=set_value('no_surat_kantor')?>" placeholder="No Surat Kantor">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>No Surat Terakhir</label>
                      <input readonly type="text" class="form-control" value="lalala">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>No Surat Kaling</label>
                      <input required name="no_surat_kaling" type="text" class="form-control" value="<?=set_value('no_surat_kaling')?>" placeholder="No Surat Kaling">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Nama Kaling</label>
                      <input required name="nama_kaling" type="text" class="form-control" value="<?=set_value('nama_kaling')?>" placeholder="Nama Kaling">
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
                <a href="<?=site_url('surat_kelahiran')?>" class="btn btn-default"><i class="fa fa-close"></i> Cancel</a>
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

  $(document).ready(function() {
    $('#surat').addClass("active");
    $('#surat_kelahiran').addClass("active");
  });

</script>

<script>
  
  function getdata(input)
  {
    $.getJSON( "<?=site_url('surat_kelahiran/ajaxgetdetailbynik/')?>" + input.value)
      .done(function( data ) {
        if(data != null)
        {
          $('#nama_' + input.id).val(data.nama);
          $('#id_' + input.id).val(data.id_kelahiran);
        }
        else
        {
          $('#nama_' + input.id).val('Data tidak ditemukan');
        }
      });
  }

</script>