  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SI Administrasi Kependudukan
        <small>Edit Data Kelahiran</small>
      </h1>
    </section>

    <!-- Main content -->
      <section class="content">
        <div class="row">
        <?php echo form_open('kelahiran/edit/'.$data->id_kelahiran, array('method' => 'POST', 'role' => 'form', 'enctype' => 'multipart/form-data'));?>
        <?php echo validation_errors();?>
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-success">
              <div class="box-body box-profile">
                <lavel>Preview</lavel>
                <img style="margin: 0 auto;" class="img-responsive"

                <?php
                  if(is_null($data->foto) || $data->foto=="") :
                ?>
                src="<?=base_url()?>assets/dist/img/no-image.jpg"

                <?php
                  else:
                ?>
                src="<?=base_url()?>assets/img/fotopenduduk/<?=$data->foto?>"

                <?php
                  endif;
                ?>

                alt="Program Picture">
                <hr>
                <lavel>Browse Foto :</lavel>
                <input name="foto" type="file" id="foto">
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
                <h3 class="box-title"><i class="fa fa-edit margin-r-5"></i>Edit Data Kelahiran</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <label>NIK</label>
                  <input required name="nik" type="text" class="form-control" value="<?=$data->nik?>">
                </div>
                <div class="form-group">
                  <label>NKK</label>
                  <input required name="nkk" type="text" class="form-control" value="<?=$data->no_kk?>">
                </div>
                <div class="form-group">
                  <label>Periode Data</label>
                  <input required name="periode_data" type="text" class="form-control" value="<?=$data->periode_data?>">
                </div>
                <div class="form-group">
                  <label>Status Dalam Keluarga</label>
                  <select required name="status_kk" class="form-control">
                    <option value="<?=$data->status_kk?>" selected><?=$data->status_keluarga?></option>
                    <?php
                      if(is_object($shdk) || is_array($shdk)) :
                        foreach ($shdk as $row) :
                    ?>
                    <option value="<?=$row->id_shdk?>"><?=$row->shdk?></option>
                    <?php
                        endforeach;
                      endif;
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input required name="nama" type="text" class="form-control" value="<?=$data->nama_penduduk?>">
                </div>                
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input required name="tempat_lahir" type="text" class="form-control" value="<?=$data->tempat_lahir?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tanggal Lahir</label><br>
                      <div class='input-group date'>
                        <div class='input-group-addon'>
                          <i class='fa fa-calendar'></i>
                        </div>
                        <input required name="tanggal_lahir" type='text' class='form-control pull-right' id='datepicker' value="<?php
                            $date=date_create($data->tgl_lahir);
                            $newdate=date_format($date,"d-m-Y");
                            echo $newdate; 
                          ?>
                        ">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="jenis_kelamin" class="minimal" checked value="1"> Laki-laki
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="jenis_kelamin" class="minimal" value="0"> Perempuan
                  </label>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input required name="alamat" type="text" class="form-control" value="<?=$data->alamat_saat_ini?>">
                </div>
                <div class="form-group">
                  <label>Agama</label>
                  <select required name="agama" class="form-control">
                    <option value="<?=$data->id_agama?>" selected><?=$data->agama?></option>
                    <?php
                      if(is_object($agama) || is_array($agama)) :
                        foreach ($agama as $row) :
                    ?>
                    <option value="<?=$row->id_agama?>"><?=$row->agama?></option>
                    <?php
                        endforeach;
                      endif;
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Pendidikan</label>
                  <select required name="pendidikan" class="form-control">
                    <option value="<?=$data->id_pendidikan?>" selected><?=$data->pendidikan?></option>
                    <?php
                      if(is_object($pendidikan) || is_array($pendidikan)) :
                        foreach ($pendidikan as $row) :
                    ?>
                    <option value="<?=$row->id_pendidikan?>"><?=$row->pend_akhir?></option>
                    <?php
                        endforeach;
                      endif;
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Pekerjaan</label>
                  <input name="pekerjaan" type="text" class="form-control" value="<?=$data->pekerjaan?>">
                </div>
                <div class="form-group">
                  <label>Telepon</label>
                  <input name="telepon" type="text" class="form-control" value="<?=$data->telepon?>">
                </div>
                <div class="form-group">
                  <label>Status Perkawinan</label>
                  <select required name="status_kawin" class="form-control">
                    <option value="<?=$data->status_kawin?>" selected><?=$data->status_perkawinan?></option>
                    <?php
                      if(is_object($kawin) || is_array($kawin)) :
                        foreach ($kawin as $row) :
                    ?>
                    <option value="<?=$row->id_status_kawin?>"><?=$row->status_kawin?></option>
                    <?php
                        endforeach;
                      endif;
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Kewarganegaraan</label>
                  <input required name="kewarganegaraan" type="text" class="form-control" value="<?=$data->kewarganegaraan?>">
                </div>
                <div class="form-group">
                  <label>Status Kependudukan</label>
                  <select required name="status_kependudukan" class="form-control">
                    <option value="<?=$data->status_kependudukan?>" selected><?=$data->status_penduduk?></option>
                    <?php
                      if(is_object($kependudukan) || is_array($kependudukan)) :
                        foreach ($kependudukan as $row) :
                    ?>
                    <option value="<?=$row->id_status_kependudukan?>"><?=$row->status_kependudukan?></option>
                    <?php
                        endforeach;
                      endif;
                    ?>
                  </select>
                </div>
                <hr/>
                <div class="form-group">
                  <label>NIK Ayah</label>
                  <div class="row">
                    <div class="col-md-6">
                      <input required id="ayah" name="nik_ayah" type="text" class="form-control" value="<?=$data->nik_ayah?>" placeholder="nama ayah" onblur="getdata(this)">
                    </div>
                    <div class="col-md-6">
                      <input required id="nama_ayah" name="nama_ayah" type="text" class="form-control" value="<?=$data->nama_ayah?>" placeholder="nama ayah" readonly>
                      <input type="hidden" id="id_ayah" name="id_ayah" type="text" class="form-control" value="<?=$data->id_ayah?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>NIK Ibu</label>
                  <div class="row">
                    <div class="col-md-6">
                      <input required id="ibu" name="nik_ibu" type="text" class="form-control" value="<?=$data->nik_ibu?>" placeholder="nama ibu" onblur="getdata(this)">
                    </div>
                    <div class="col-md-6">
                      <input required id="nama_ibu" name="nama_ibu" type="text" class="form-control" value="<?=$data->nama_ibu?>" placeholder="nama ibu" readonly>
                      <input type="hidden" id="id_ibu" name="id_ibu" type="text" class="form-control" value="<?=$data->id_ibu?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>NIK Saksi I</label>
                  <div class="row">
                    <div class="col-md-6">
                      <input required id="saksi_I" name="nik_saksi_I" type="text" class="form-control" value="<?=$data->nik_saksi1?>" placeholder="nama saksi 1" onblur="getdata(this)">
                    </div>
                    <div class="col-md-6">
                      <input required id="nama_saksi_I" name="nama_saksi_I" type="text" class="form-control" value="<?=$data->nama_saksi1?>" placeholder="nama saksi 1" readonly>
                      <input type="hidden" id="id_saksi_I" name="id_saksi_I" type="text" class="form-control" value="<?=$data->id_saksi1?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>NIK Saksi II</label>
                  <div class="row">
                    <div class="col-md-6">
                      <input required id="saksi_II" name="nik_saksi_II" type="text" class="form-control" value="<?=$data->nik_saksi2?>" placeholder="nama saksi 2" onblur="getdata(this)">
                    </div>
                    <div class="col-md-6">
                      <input required id="nama_saksi_II" name="nama_saksi_II" type="text" class="form-control" value="<?=$data->nama_saksi2?>" placeholder="nama saksi 2" readonly>
                      <input type="hidden" id="id_saksi_II" name="id_saksi_II" type="text" class="form-control" value="<?=$data->id_saksi2?>">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="hidden" name="id_penduduk" type="text" class="form-control" value="<?=$data->id_penduduk?>">
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