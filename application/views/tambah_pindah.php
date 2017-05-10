  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Penduduk Pindah |
        <small>SI Administrasi Kependudukan</small>
      </h1>
    </section>

    <!-- Main content -->
      <section class="content">
        <div class="row">
        <?php echo form_open('pindah/tambah', array('method' => 'POST', 'role' => 'form', 'enctype' => 'multipart/form-data'));?>
        <?php echo validation_errors();?>
          <!-- /.col -->
          <div class="col-md-12">
            <!-- About Me Box -->
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-edit margin-r-5"></i>Data Pindah</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>No Kartu Keluarga</label>
                      <input id="penduduk" required name="nkk" type="text" class="form-control" value="<?=set_value('nkk')?>"  placeholder="Masukan Nomor Kartu Keluarga" onblur="getdata(this)">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Nama Kepala Keluarga</label>
                      <input required readonly id="nama_penduduk" name="nama_penduduk" type="text" class="form-control" value="<?=set_value('nama_penduduk')?>" placeholder="Nama Kepala Keluarga">
                      <input type="hidden" id="id_penduduk" name="id_penduduk" type="text" class="form-control" value="<?=set_value('id_penduduk')?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tanggal Pindah</label><br>
                      <div class='input-group date'>
                        <div class='input-group-addon'>
                          <i class='fa fa-calendar'></i>
                        </div>
                        <input required name="tanggal_pindah" type='text' class='form-control pull-right' id='datepicker' value="<?=set_value('tanggal_pindah')?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">                  
                    <div class="form-group">
                      <label>Alasan Pindah</label>
                      <input required name="alasan_pindah" type="text" class="form-control" value="<?=set_value('alasan_pindah')?>" placeholder="Masukan Alasan">
                    </div>
                  </div>
                  <div class="col-md-4">                  
                    <div class="form-group">
                      <label>Alamat Tujuan</label>
                      <input required name="alamat_tujuan" type="text" class="form-control" value="<?=set_value('alamat_tujuan')?>" placeholder="Masukan Alamat">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Provinsi</label>
                      <select required name="provinsi" class="form-control">
                        <?php
                          if(is_object($provinsi) || is_array($provinsi)) :
                            foreach ($provinsi as $row) :
                        ?>
                        <option <?=set_select('provinsi', $row->id_provinsi)?> value="<?=$row->id_provinsi?>"><?=$row->provinsi?></option>
                        <?php
                            endforeach;
                          endif;
                        ?>
                      </select>
                    </div>                    
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Kabupaten</label>
                      <select required name="kabupaten" class="form-control">
                        <?php
                          if(is_object($kabupaten) || is_array($kabupaten)) :
                            foreach ($kabupaten as $row) :
                        ?>
                        <option <?=set_select('kabupaten', $row->id_kabupaten)?> value="<?=$row->id_kabupaten?>"><?=$row->kabupaten?></option>
                        <?php
                            endforeach;
                          endif;
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <select required name="kecamatan" class="form-control">
                        <?php
                          if(is_object($kecamatan) || is_array($kecamatan)) :
                            foreach ($kecamatan as $row) :
                        ?>
                        <option <?=set_select('kecamatan', $row->id_kecamatan)?> value="<?=$row->id_kecamatan?>"><?=$row->kecamatan?></option>
                        <?php
                            endforeach;
                          endif;
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Desa</label>
                      <select required name="desa" class="form-control">
                        <?php
                          if(is_object($desa) || is_array($desa)) :
                            foreach ($desa as $row) :
                        ?>
                        <option <?=set_select('desa', $row->id_desa)?> value="<?=$row->id_desa?>"><?=$row->desa?></option>
                        <?php
                            endforeach;
                          endif;
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Banjar</label>
                      <select required name="banjar" class="form-control">
                        <?php
                          if(is_object($banjar) || is_array($banjar)) :
                            foreach ($banjar as $row) :
                        ?>
                        <option <?=set_select('banjar', $row->id_banjar)?> value="<?=$row->id_banjar?>"><?=$row->banjar?></option>
                        <?php
                            endforeach;
                          endif;
                        ?>
                      </select>
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

<script>
  
  function getdata(input)
  {
    $.getJSON( "<?=site_url('pindah/ajaxgetkepalakeluargabynkk/')?>" + input.value)
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