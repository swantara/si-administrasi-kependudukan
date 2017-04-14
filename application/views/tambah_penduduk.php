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
        <?php echo form_open('penduduk/tambah', array('method' => 'POST', 'role' => 'form', 'enctype' => 'multipart/form-data'));?>
        <?php echo validation_errors();?>
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-success">
              <div class="box-body box-profile">
                <lavel>Preview</lavel>
                <img style="margin: 0 auto;" class="img-responsive" src="<?=base_url()?>assets/dist/img/no-image.jpg" alt="Program Picture">
                <hr>
                <lavel>Browse Foto :</lavel>
                <input name="foto" type="file" id="fotoArtikel">
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
                <h3 class="box-title"><i class="fa fa-user-plus margin-r-5"></i>Tambah Data Penduduk</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <label>NIK</label>
                  <input required name="nik" type="text" class="form-control" value="<?=set_value('nik')?>" placeholder="1">
                </div>
                <div class="form-group">
                  <label>NKK</label>
                  <input required name="nkk" type="text" class="form-control" value="<?=set_value('nkk')?>" placeholder="2">
                </div>
                <div class="form-group">
                  <label>Periode Data</label>
                  <input required name="periode_data" type="text" class="form-control" value="<?php echo date("Y");?>">
                </div>
                <div class="form-group">
                  <label>Status KK</label>
                  <select required name="status_kk" class="form-control">
                    <?php
                      if(is_object($shdk) || is_array($shdk)) :
                        foreach ($shdk as $row) :
                    ?>
                    <option <?=set_select('status_kk', $row->id_shdk)?> value="<?=$row->id_shdk?>"><?=$row->shdk?></option>
                    <?php
                        endforeach;
                      endif;
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input required name="nama" type="text" class="form-control" value="<?=set_value('nama')?>" placeholder="4">
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input required name="tempat_lahir" type="text" class="form-control" value="<?=set_value('tempat_lahir')?>" placeholder="5">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tanggal Lahir</label><br>
                      <div class='input-group date'>
                        <div class='input-group-addon'>
                          <i class='fa fa-calendar'></i>
                        </div>
                        <input required name="tanggal_lahir" type='text' class='form-control pull-right' id='datepicker' value="<?=set_value('tanggal_lahir')?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="jenis_kelamin" class="minimal" <?=set_radio('jenis_kelamin', 1, TRUE)?> value="1"> Laki-laki
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="jenis_kelamin" class="minimal" <?=set_radio('jenis_kelamin', 0)?> value="0"> Perempuan
                  </label>
                </div>  
                <div class="form-group">
                  <label>Alamat</label>
                  <input required name="alamat" type="text" class="form-control" value="<?=set_value('alamat')?>" placeholder="6">
                </div>
                <div class="form-group">
                  <label>Agama</label>
                  <select required name="agama" class="form-control">
                    <?php
                      if(is_object($agama) || is_array($agama)) :
                        foreach ($agama as $row) :
                    ?>
                    <option <?=set_select('agama', $row->id_agama)?> value="<?=$row->id_agama?>"><?=$row->agama?></option>
                    <?php
                        endforeach;
                      endif;
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Pendidikan</label>
                  <select required name="pendidikan" class="form-control">
                    <?php
                      if(is_object($pendidikan) || is_array($pendidikan)) :
                        foreach ($pendidikan as $row) :
                    ?>
                    <option <?=set_select('pendidikan', $row->id_pendidikan)?> value="<?=$row->id_pendidikan?>"><?=$row->pend_akhir?></option>
                    <?php
                        endforeach;
                      endif;
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Pekerjaan</label>
                  <input required name="pekerjaan" type="text" class="form-control" value="<?=set_value('pekerjaan')?>" placeholder="7">
                </div>
                <div class="form-group">
                  <label>Telepon</label>
                  <input required name="telepon" type="text" class="form-control" value="<?=set_value('telepon')?>" placeholder="8">
                </div>
                <div class="form-group">
                  <label>Status Perkawinan</label>
                  <select required name="status_kawin" class="form-control">
                    <?php
                      if(is_object($kawin) || is_array($kawin)) :
                        foreach ($kawin as $row) :
                    ?>
                    <option <?=set_select('status_kawin', $row->id_status_kawin)?> value="<?=$row->id_status_kawin?>"><?=$row->status_kawin?></option>
                    <?php
                        endforeach;
                      endif;
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nama Ayah</label>
                  <input required name="nama_ayah" type="text" class="form-control" value="<?=set_value('nama_ayah')?>" placeholder="9">
                </div>
                <div class="form-group">
                  <label>Nama Ibu</label>
                  <input required name="nama_ibu" type="text" class="form-control" value="<?=set_value('nama_ibu')?>" placeholder="10">
                </div>
                <div class="form-group">
                  <label>Kewarganegaraan</label>
                  <input required name="kewarganegaraan" type="text" class="form-control" value="<?=set_value('kewarganegaraan')?>" placeholder="11">
                </div>
                <div class="form-group">
                  <label>Status Kependudukan</label>
                  <select required name="status_kependudukan" class="form-control">
                    <?php
                      if(is_object($kependudukan) || is_array($kependudukan)) :
                        foreach ($kependudukan as $row) :
                    ?>
                    <option <?=set_select('status_kependudukan', $row->id_status_kependudukan)?> value="<?=$row->id_status_kependudukan?>"><?=$row->status_kependudukan?></option>
                    <?php
                        endforeach;
                      endif;
                    ?>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?=site_url('penduduk')?>" class="btn btn-default"><i class="fa fa-close"></i> Cancel</a>
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