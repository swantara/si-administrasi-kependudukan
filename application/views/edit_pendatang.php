  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Penduduk Pendatang |
        <small>SI Administrasi Kependudukan</small>
      </h1>
    </section>

    <!-- Main content -->
      <section class="content">
        <div class="row">
        <?php echo form_open('pendatang/edit/'.$data->id_pendatang, array('method' => 'POST', 'role' => 'form', 'enctype' => 'multipart/form-data'));?>
        <?php echo validation_errors();?>
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-danger">
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
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-edit margin-r-5"></i>Edit Data Pendatang</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">                
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>No Induk Kependudukan</label>
                      <input required name="nik" type="text" class="form-control" value="<?=$data->nik?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>No Kartu Keluarga</label>
                      <input required name="nkk" type="text" class="form-control" value="<?=$data->no_kk?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Periode Data</label>
                      <input required name="periode_data" type="text" class="form-control" value="<?=$data->periode_data?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Nama</label>
                      <input required name="nama" type="text" class="form-control" value="<?=$data->nama_penduduk?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Status Hubungan Dalam Keluarga</label>
                      <select required name="status_kk" class="form-control">
                        <?php
                          if(is_object($shdk) || is_array($shdk)) :
                            foreach ($shdk as $row) :
                        ?>
                        <option <?php if($data->status_kk==$row->id_shdk) : echo "selected"; endif; ?> value="<?=$row->id_shdk?>"><?=$row->shdk?></option>
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
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Agama</label>
                      <select required name="agama" class="form-control">
                        <?php
                          if(is_object($agama) || is_array($agama)) :
                            foreach ($agama as $row) :
                        ?>
                        <option <?php if($data->agama==$row->id_agama) : echo "selected"; endif; ?> value="<?=$row->id_agama?>"><?=$row->agama?></option>
                        <?php
                            endforeach;
                          endif;
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Pendidikan</label>
                      <select required name="pendidikan" class="form-control">
                        <?php
                          if(is_object($pendidikan) || is_array($pendidikan)) :
                            foreach ($pendidikan as $row) :
                        ?>
                        <option <?php if($data->pendidikan==$row->id_pendidikan) : echo "selected"; endif; ?> value="<?=$row->id_pendidikan?>"><?=$row->pend_akhir?></option>
                        <?php
                            endforeach;
                          endif;
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Pekerjaan</label>
                      <input required name="pekerjaan" type="text" class="form-control" value="<?=$data->pekerjaan?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Telepon</label>
                      <input required name="telepon" type="text" class="form-control" value="<?=$data->telepon?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Kewarganegaraan</label>
                  <input required name="kewarganegaraan" type="text" class="form-control" value="<?=$data->kewarganegaraan?>">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status Kependudukan</label>
                      <select required name="status_kependudukan" class="form-control">
                        <?php
                          if(is_object($kependudukan) || is_array($kependudukan)) :
                            foreach ($kependudukan as $row) :
                        ?>
                        <option <?php if($data->status_penduduk==$row->id_status_kependudukan) : echo "selected"; endif; ?> value="<?=$row->id_status_kependudukan?>"><?=$row->status_kependudukan?></option>
                        <?php
                            endforeach;
                          endif;
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status Perkawinan</label>
                      <select required name="status_kawin" class="form-control">
                        <?php
                          if(is_object($kawin) || is_array($kawin)) :
                            foreach ($kawin as $row) :
                        ?>
                        <option <?php if($data->status_perkawinan==$row->id_status_kawin) : echo "selected"; endif; ?> value="<?=$row->id_status_kawin?>"><?=$row->status_kawin?></option>
                        <?php
                            endforeach;
                          endif;
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <hr/>                 
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tanggal Datang</label><br>
                      <div class='input-group date'>
                        <div class='input-group-addon'>
                          <i class='fa fa-calendar'></i>
                        </div>
                        <input required name="tanggal_datang" type='text' class='form-control pull-right' id='datepicker' value="<?php
                            $date=date_create($data->tgl_datang);
                            $newdate=date_format($date,"d-m-Y");
                            echo $newdate; 
                          ?>
                        ">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">                    
                    <div class="form-group">
                      <label>Alamat Asal</label>
                      <input required name="alamat_asal" type="text" class="form-control" value="<?=$data->alamat_asal?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Provinsi</label>
                      <select required name="provinsi" class="form-control">
                        <option value="<?=$data->id_provinsi?>" selected><?=$data->provinsi?></option>
                        <?php
                          if(is_object($provinsi) || is_array($provinsi)) :
                            foreach ($provinsi as $row) :
                        ?>
                        <option value="<?=$row->id_provinsi?>"><?=$row->provinsi?></option>
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
                        <option value="<?=$data->id_kabupaten?>" selected><?=$data->kabupaten?></option>
                        <?php
                          if(is_object($kabupaten) || is_array($kabupaten)) :
                            foreach ($kabupaten as $row) :
                        ?>
                        <option value="<?=$row->id_kabupaten?>"><?=$row->kabupaten?></option>
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
                        <option value="<?=$data->id_kecamatan?>" selected><?=$data->kecamatan?></option>
                        <?php
                          if(is_object($kecamatan) || is_array($kecamatan)) :
                            foreach ($kecamatan as $row) :
                        ?>
                        <option value="<?=$row->id_kecamatan?>"><?=$row->kecamatan?></option>
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
                        <option value="<?=$data->id_desa?>" selected><?=$data->desa?></option>
                        <?php
                          if(is_object($desa) || is_array($desa)) :
                            foreach ($desa as $row) :
                        ?>
                        <option value="<?=$row->id_desa?>"><?=$row->desa?></option>
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
                        <option value="<?=$data->id_banjar?>" selected><?=$data->banjar?></option>
                        <?php
                          if(is_object($banjar) || is_array($banjar)) :
                            foreach ($banjar as $row) :
                        ?>
                        <option value="<?=$row->id_banjar?>"><?=$row->banjar?></option>
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
                  <input required name="keterangan" type="text" class="form-control" value="<?=$data->keterangan?>">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="hidden" name="id_penduduk" type="text" class="form-control" value="<?=$data->id_penduduk?>">
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

  <script>

  $(document).ready(function() {
    $('#data_penduduk').addClass("active");
    $('#pendatang').addClass("active");
  });

</script>