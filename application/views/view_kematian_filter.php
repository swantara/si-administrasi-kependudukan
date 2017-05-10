  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Penduduk Meninggal |
        <small>SI Administrasi Kependudukan</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php 
        if($this->session->flashdata('alert') !== null):
          if($this->session->flashdata('alert') == 'save'):
      ?>
      <!-- Info alert -->
      <div id="alert" class="alert alert-success alert-styled-left alert-arrow-left alert-component animated shake">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
        <h6 class="alert-heading text-semibold">Data Berhasil di Tambahkan</h6>    
      </div>
      <!-- /info alert -->
      <?php
          elseif($this->session->flashdata('alert') == "update"):
      ?>
      <!-- Info alert -->
      <div id="alert" class="alert alert-info alert-styled-left alert-arrow-left alert-component animated shake">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
        <h6 class="alert-heading text-semibold">Data Berhasil di Ubah</h6>  
      </div>
      <!-- /info alert -->
      <?php
          else:
      ?>
      <!-- Info alert -->
      <div id="alert" class="alert alert-danger alert-styled-left alert-arrow-left alert-component animated shake">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
        <h6 class="alert-heading text-semibold">Data Berhasil di Hapus</h6>
      </div>
      <!-- /info alert -->
      <?php
          endif;
        endif;
      ?>

      <div class="row">
        <?php echo form_open('kematian/pencarian', array('method' => 'POST', 'role' => 'form'));?>
        <?php echo validation_errors();?>
          <!-- /.col -->
          <div class="col-md-12">
            <!-- About Me Box -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <a style="margin-right: 5px;" href="<?=site_url('kematian/tambah')?>" class="btn btn-default"><i class="fa fa-user-plus text-green"></i> Tambah Data</a>
                <a href="<?=site_url('kematian/pencarian')?>" class="btn btn-default"><i class="fa fa-search text-blue"></i> Pencarian Lanjutan</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <small>No Kartu Keluarga</small>
                      <input name="no_kk" type="text" class="form-control input-sm" value="<?=set_value('no_kk')?>"  placeholder="No Kartu Keluarga">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <small>No Induk Kependudukan</small>
                      <input name="nik" type="text" class="form-control input-sm" value="<?=set_value('nik')?>"  placeholder="No Induk Kependudukan">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <small>Nama</small>
                      <input name="nama_penduduk" type="text" class="form-control input-sm" value="<?=set_value('nama_penduduk')?>" placeholder="Nama Penduduk">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <small>Periode Data</small>
                      <input name="periode" type="text" class="form-control input-sm" value="<?=set_value('periode')?>" placeholder="Periode Data">
                    </div>                   
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <small>Status Hubungan Dalam Keluarga</small>
                      <select name="status_kk" class="form-control input-sm">
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
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <small>Tempat Lahir</small>
                      <input name="tempat_lahir" type="text" class="form-control input-sm" value="<?=set_value('tempat_lahir')?>" placeholder="Tempat Lahir">
                    </div>                   
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <small>Tanggal Lahir</small><br>
                      <div class='input-group date'>
                        <div class='input-group-addon'>
                          <i class='fa fa-calendar'></i>
                        </div>
                        <input required name="tanggal_lahir" type='text' class='form-control pull-right input-sm' id='datepicker' value="<?=set_value('tanggal_lahir')?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <small>Jenis Kelamin</small><br>
                      <small class="radio-inline">
                        <input type="radio" name="jenis_kelamin" class="minimal" <?=set_radio('jenis_kelamin', 1, TRUE)?> value="1"> Laki-laki
                      </small>
                      <small class="radio-inline">
                        <input type="radio" name="jenis_kelamin" class="minimal" <?=set_radio('jenis_kelamin', 0)?> value="0"> Perempuan
                      </small>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <small>Alamat</small>
                      <input name="alamat" type="text" class="form-control input-sm" value="<?=set_value('alamat')?>" placeholder="Alamat">
                    </div>                   
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <small>Agama</small>
                      <select name="agama" class="form-control input-sm">
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
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <small>Pendidikan</small>
                      <select name="pendidikan" class="form-control input-sm">
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
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <small>Pekerjaan</small>
                      <input name="pekerjaan" type="text" class="form-control input-sm" value="<?=set_value('pekerjaan')?>" placeholder="Pekerjaan">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <small>Telepon</small>
                      <input name="telepon" type="text" class="form-control input-sm" value="<?=set_value('telepon')?>" placeholder="Telepon">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <small>Nama Ayah</small>
                      <input name="nama_ayah" type="text" class="form-control input-sm" value="<?=set_value('nama_ayah')?>" placeholder="Nama Ayah">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <small>Nama Ibu</small>
                      <input name="nama_ibu" type="text" class="form-control input-sm" value="<?=set_value('nama_ibu')?>" placeholder="Nama Ibu">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <small>Status Kependudukan</small>
                      <select name="status_kependudukan" class="form-control input-sm">
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
                  <div class="col-md-3">
                    <div class="form-group">
                      <small>Status Perkawinan</small>
                      <select name="status_kawin" class="form-control input-sm">
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
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <small>Kewarganegaraan</small>
                      <input name="kewarganegaraan" type="text" class="form-control input-sm" value="<?=set_value('kewarganegaraan')?>" placeholder="Kewarganegaraan">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default pull-right"><i class="fa fa-arrow-right text-green"></i> Cari Data</button>
                <button style="margin-right: 5px;" type="reset" class="btn btn-default pull-right"><i class="fa fa-refresh"></i> Reset</button>
              </div>
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </form>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <a style="margin-right: 5px;" href="<?=site_url('kematian/tambah')?>" class="btn btn-default"><i class="fa fa-user-plus text-green"></i> Tambah Data</a>
              <a href="<?=site_url('kematian/pencarian')?>" class="btn btn-default"><i class="fa fa-search text-blue"></i> Pencarian Lanjutan</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tanggal Meninggal</th>
                  <th>No Kartu Keluarga</th>
                  <th>No Induk Kependudukan</th>
                  <th>Nama</th>
                  <th>Tempat Meninggal</th>
                  <th>Penyebab</th>
                  <th>Keterangan</th>
                  <th style="width: 10px;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  if(is_object($data) || is_array($data)) :
                    $no = 1;
                    foreach ($data as $row) :
                ?>
                <tr>
                  <input name='id' id='id' value='".$id."' type='hidden'>
                  <td>
                    <?php
                      $date=date_create($row->tgl_meninggal);
                      $newdate=date_format($date,"d-m-Y");
                      echo $newdate;
                    ?>
                  </td>
                  <td><?=$row->no_kk?></td>
                  <td><?=$row->nik?></td>
                  <td><?=$row->nama_penduduk?></td>
                  <td><?=$row->tempat_meninggal?></td>
                  <td><?=$row->penyebab?></td>
                  <td><?=$row->keterangan?></td>
                  <td>
                    <div class="btn-group-vertical">
                      <button type="button" class="btn btn-default" onClick="window.location.href='<?=site_url('kematian/detail/'.$row->id_kematian)?>'">
                        <div class="pull-left">
                          <i class="fa fa-eye"></i> Detail
                        </div>
                      </button>
                      <button type="button" class="btn btn-default" onClick="window.location.href='<?=site_url('kematian/edit/'.$row->id_kematian)?>'">
                        <div class="pull-left">
                          <i class="fa fa-edit"></i> Ubah
                        </div>
                      </button>
                      <button type="button" class="btn btn-danger" onClick="window.location.href='<?=site_url('kematian/hapus/'.$row->id_kematian)?>'">
                        <div class="pull-left">
                          <i class="fa fa-trash"></i> Hapus
                        </div>
                      </button>
                    </div>
                  </td>
                </tr>
                <?php
                    endforeach;
                  endif;
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Tanggal Meninggal</th>
                  <th>No Kartu Keluarga</th>
                  <th>No Induk Kependudukan</th>
                  <th>Nama</th>
                  <th>Tempat Meninggal</th>
                  <th>Penyebab</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
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