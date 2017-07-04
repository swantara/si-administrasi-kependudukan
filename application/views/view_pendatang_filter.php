  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Penduduk Pendatang |
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
        <form>
        <div class="col-md-12">
          <!-- About Me Box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <a style="margin-right: 5px;" href="<?=site_url('pendatang/tambah')?>" class="btn btn-default"><i class="fa fa-user-plus text-green"></i> Tambah Data</a>
              <a href="<?=site_url('pendatang')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <small>No Kartu Keluarga</small>
                    <input name="no_kk" id="no_kk" type="text" class="form-control input-sm" value="<?=set_value('no_kk')?>"  placeholder="No Kartu Keluarga">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <small>No Induk Kependudukan</small>
                    <input name="nik" id="nik" type="text" class="form-control input-sm" value="<?=set_value('nik')?>"  placeholder="No Induk Kependudukan">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <small>Nama</small>
                    <input name="nama_penduduk" id="nama_penduduk" type="text" class="form-control input-sm" value="<?=set_value('nama_penduduk')?>" placeholder="Nama Penduduk">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <small>Periode Data</small>
                    <input name="periode" id="periode" type="text" class="form-control input-sm" value="<?=set_value('periode')?>" placeholder="Periode Data">
                  </div>                   
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <small>Status Hubungan Dalam Keluarga</small>
                    <select name="status_kk" id="status_kk" class="form-control input-sm">
                      <option <?=set_select('status_kk', "")?> value="">Pilih Semua</option>
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
                    <input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control input-sm" value="<?=set_value('tempat_lahir')?>" placeholder="Tempat Lahir">
                  </div>                   
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <small>Tanggal Lahir</small><br>
                    <div class='input-group date'>
                      <div class='input-group-addon'>
                        <i class='fa fa-calendar'></i>
                      </div>
                      <input name="tanggal_lahir" type='text' class='form-control pull-right input-sm' id='datepicker' value="<?=set_value('tanggal_lahir')?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <small>Jenis Kelamin</small><br>
                    <small class="radio-inline">
                      <input type="radio" name="jenis_kelamin" id="jenis_kelamin2" class="minimal" checked> Semua
                    </small>
                    <small class="radio-inline">
                      <input type="radio" name="jenis_kelamin" id="jenis_kelamin1" class="minimal" > Laki-laki
                    </small>
                    <small class="radio-inline">
                      <input type="radio" name="jenis_kelamin" id="jenis_kelamin0" class="minimal" > Perempuan
                    </small>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <small>Alamat</small>
                    <input name="alamat" id="alamat" type="text" class="form-control input-sm" value="<?=set_value('alamat')?>" placeholder="Alamat">
                  </div>                   
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <small>Agama</small>
                    <select name="agama" id="agama" class="form-control input-sm">
                      <option <?=set_select('agama', "")?> value="">Pilih Semua</option>
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
                    <select name="pendidikan" id="pendidikan" class="form-control input-sm">
                      <option <?=set_select('pendidikan', "")?> value="">Pilih Semua</option>
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
                    <input name="pekerjaan" id="pekerjaan" type="text" class="form-control input-sm" value="<?=set_value('pekerjaan')?>" placeholder="Pekerjaan">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <small>Telepon</small>
                    <input name="telepon" id="telepon" type="text" class="form-control input-sm" value="<?=set_value('telepon')?>" placeholder="Telepon">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <small>Nama Ayah</small>
                    <input name="nama_ayah" id="nama_ayah" type="text" class="form-control input-sm" value="<?=set_value('nama_ayah')?>" placeholder="Nama Ayah">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <small>Nama Ibu</small>
                    <input name="nama_ibu" id="nama_ibu" type="text" class="form-control input-sm" value="<?=set_value('nama_ibu')?>" placeholder="Nama Ibu">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <small>Status Kependudukan</small>
                    <select name="status_kependudukan" id="status_kependudukan" class="form-control input-sm">
                      <option <?=set_select('status_kependudukan', "")?> value="">Pilih Semua</option>
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
                    <select name="status_kawin" id="status_kawin" class="form-control input-sm">
                      <option <?=set_select('status_kawin', "")?> value="">Pilih Semua</option>
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
                    <input name="kewarganegaraan" id="kewarganegaraan" type="text" class="form-control input-sm" value="<?=set_value('kewarganegaraan')?>" placeholder="Kewarganegaraan">
                  </div>
                </div>
              </div>
              <hr/>              
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <small>Tanggal Datang</small><br>
                    <div class='input-group date'>
                      <div class='input-group-addon'>
                        <i class='fa fa-calendar'></i>
                      </div>
                      <input name="tanggal_pindah" type='text' class='form-control pull-right input-sm' id='kedatangan_datepicker' value="<?=set_value('tanggal_pindah')?>">
                    </div>
                  </div>
                </div>                
                <div class="col-md-3">
                  <div class="form-group">
                    <small>Alamat Asal</small>
                    <input name="alamat_asal" id="alamat_asal" type="text" class="form-control input-sm" value="<?=set_value('alamat_asal')?>" placeholder="Alamat Asal">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <small>Provinsi Asal</small>
                    <select name="provinsi" id="provinsi" class="form-control input-sm" onchange="getkabupaten(this)">
                      <option <?=set_select('provinsi', "")?> value="">Semua Provinsi</option>
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
                <div class="col-md-3">
                  <div class="form-group">
                    <small>Kabupaten Asal</small>
                    <select name="kabupaten" id="kabupaten" class="form-control input-sm" onchange="getkecamatan(this)">
                      <option <?=set_select('kabupaten', "")?> value="">Semua Kabupaten</option>
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
              </div>              
              <div class="row">              
                <div class="col-md-3">
                  <div class="form-group">
                    <small>Kecamatan Asal</small>
                    <select name="kecamatan" id="kecamatan" class="form-control input-sm" onchange="getdesa(this)">
                      <option <?=set_select('kecamatan', "")?> value="">Semua Kecamatan</option>
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
                <div class="col-md-3">
                  <div class="form-group">
                    <small>Desa Asal</small>
                    <select name="desa" id="desa" class="form-control input-sm" onchange="getbanjar(this)">
                      <option <?=set_select('desa', "")?> value="">Semua Desa</option>
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
                <div class="col-md-3">
                  <div class="form-group">
                    <small>Banjar Asal</small>
                    <select name="banjar" id="banjar" class="form-control input-sm">
                      <option <?=set_select('banjar', "")?> value="">Semua Banjar</option>
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
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="button" onclick="filter()" class="btn btn-default pull-right"><i class="fa fa-search text-blue"></i> Cari Data</button>
              <button style="margin-right: 5px;" type="reset" class="btn btn-default pull-right"><i class="fa fa-refresh"></i> Reset</button>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        </form>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-danger">
            <div class="box-body">
              <h4>Hasil Pencarian Berdasarkan :</h4>
              <h5 id="filter_tag">Silahkan lakukan pencarian lebih dulu.</h5>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example77" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tanggal Datang</th>
                  <th>No Kartu Keluarga</th>
                  <th>No Induk Kependudukan</th>
                  <th>Nama</th>
                  <th>Alamat Asal</th>
                  <th>Provinsi</th>
                  <th>Kabupaten</th>
                  <th>Keterangan</th>
                  <th style="width: 10px;">Aksi</th>
                </tr>
                </thead>
                <tfoot>
                <tr>                  
                  <th>Tanggal Datang</th>
                  <th>No Kartu Keluarga</th>
                  <th>No Induk Kependudukan</th>
                  <th>Nama</th>
                  <th>Alamat Asal</th>
                  <th>Provinsi</th>
                  <th>Kabupaten</th>
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

  <script>
    var tag = $('#filter_tag');
    var table = null;
    var dataSet = [
        ["-", "-", "-", "-", "-", "-", "-", "-", "-"]
    ];
    $(document).ready(function() {
        $('#data_penduduk').addClass("active");
        $('#pendatang').addClass("active");
        table = $('#example77').DataTable({
            data: dataSet
        });
    });

    function filter()
    {
      var jk = 2;
      tag.html(''); 
      if($('#no_kk').val() != ""){
        tag.html(tag.html() + " No Kartu Keluarga : <u>" + $('#no_kk').val() + "</u>, ");
      }
      if($('#nik').val() != ""){
        tag.html(tag.html() + " No Induk Kependudukan : <u>" + $('#nik').val() + "</u>, ");
      }
      if($('#nama_penduduk').val() != ""){
        tag.html(tag.html() + " Nama Penduduk : <u>" + $('#nama_penduduk').val() + "</u>, ");
      }
      if($('#periode').val() != ""){
        tag.html(tag.html() + " Periode Data : <u>" + $('#periode').val() + "</u>, ");
      }
      if($('#status_kk').val() != ""){
        <?php
          if(is_object($shdk) || is_array($shdk)) :
            $filter = '';
            foreach ($shdk as $row) :
              $filter = $filter.'if($("#status_kk").val() == "'.$row->id_shdk.'"){
                  tag.html(tag.html() + " Status Hubungan Dalam Keluarga : <u>'.$row->shdk.'</u>, ");
                }
                else ';
            endforeach;
            $filter = substr($filter, 0, strlen($filter) - 5);
            echo $filter;
          endif;
        ?>
      }
      if($('#tempat_lahir').val() != ""){
        tag.html(tag.html() + " Tempat Lahir : <u>" + $('#tempat_lahir').val() + "</u>, ");
      }
      if($('#datepicker').val() != ""){
        tag.html(tag.html() + " Tanggal Lahir : <u>" + $('#datepicker').val() + "</u>, ");
      }      
      if($('#jenis_kelamin1').is(':checked')){
        jk = 1;
        tag.html(tag.html() + " Jenis Kelamin : <u>Laki-laki</u>, ");
      }
      else if($('#jenis_kelamin0').is(':checked')){
        jk = 0;
        tag.html(tag.html() + " Jenis Kelamin : <u>Perempuan</u>, ");
      }
      else if($('#jenis_kelamin2').is(':checked')){
        jk = 2;
      }
      if($('#alamat').val() != ""){
        tag.html(tag.html() + " Alamat : <u>" + $('#alamat').val() + "</u>, ");
      }
      if($('#agama').val() != ""){
        <?php
          if(is_object($agama) || is_array($agama)) :
            $filter = '';
            foreach ($agama as $row) :
              $filter = $filter.'if($("#agama").val() == "'.$row->id_agama.'"){
                tag.html(tag.html() + " Agama : <u>'.$row->agama.'</u>, ");
              }
              else ';
            endforeach;
            $filter = substr($filter, 0, strlen($filter) - 5);
            echo $filter;
          endif;
        ?>
      }
      if($('#pendidikan').val() != ""){
        <?php
          if(is_object($pendidikan) || is_array($pendidikan)) :
            $filter = '';
            foreach ($pendidikan as $row) :
              $filter = $filter.'if($("#pendidikan").val() == "'.$row->id_pendidikan.'"){
                tag.html(tag.html() + " Pendidikan : <u>'.$row->pend_akhir.'</u>, ");
              }
              else ';
            endforeach;
            $filter = substr($filter, 0, strlen($filter) - 5);
            echo $filter;
          endif;
        ?>
      }
      if($('#pekerjaan').val() != ""){
        tag.html(tag.html() + " Pekerjaan : <u>" + $('#pekerjaan').val() + "</u>, ");
      }
      if($('#telepon').val() != ""){
        tag.html(tag.html() + " Telepon : <u>" + $('#telepon').val() + "</u>, ");
      }
      if($('#nama_ayah').val() != ""){
        tag.html(tag.html() + " Nama Ayah : <u>" + $('#nama_ayah').val() + "</u>, ");
      }
      if($('#nama_ibu').val() != ""){
        tag.html(tag.html() + " Nama Ibu : <u>" + $('#nama_ibu').val() + "</u>, ");
      }
      if($('#status_kependudukan').val() != ""){
        <?php
          if(is_object($kependudukan) || is_array($kependudukan)) :
            $filter = '';
            foreach ($kependudukan as $row) :
              $filter = $filter.'if($("#status_kependudukan").val() == "'.$row->id_status_kependudukan.'"){
                tag.html(tag.html() + " Status Kependudukan : <u>'.$row->status_kependudukan.'</u>, ");
              }
              else ';
            endforeach;
            $filter = substr($filter, 0, strlen($filter) - 5);
            echo $filter;
          endif;
        ?>
      }
      if($('#status_kawin').val() != ""){
        <?php
          if(is_object($kawin) || is_array($kawin)) :
            $filter = '';
            foreach ($kawin as $row) :
              $filter = $filter.'if($("#status_kawin").val() == "'.$row->id_status_kawin.'"){
                tag.html(tag.html() + " Status Perkawinan : <u>'.$row->status_kawin.'</u>, ");
              }
              else ';
            endforeach;
            $filter = substr($filter, 0, strlen($filter) - 5);
            echo $filter;
          endif;
        ?>
      }
      if($('#kewarganegaraan').val() != ""){
        tag.html(tag.html() + " Kewarganegaraan : <u>" + $('#kewarganegaraan').val() + "</u>, ");
      }
      if($('#kedatangan_datepicker').val() != ""){
        tag.html(tag.html() + " Tanggal Datang : <u>" + $('#kedatangan_datepicker').val() + "</u>, ");
      }
      if($('#alamat_asal').val() != ""){
        tag.html(tag.html() + " Alamat Asal : <u>" + $('#alamat_asal').val() + "</u>, ");
      }
      if($('#provinsi').val() != ""){
        <?php
          if(is_object($provinsi) || is_array($provinsi)) :
            $filter = '';
            foreach ($provinsi as $row) :
              $filter = $filter.'if($("#provinsi").val() == "'.$row->id_provinsi.'"){
                tag.html(tag.html() + " Provinsi Asal : <u>'.$row->provinsi.'</u>, ");
              }
              else ';
            endforeach;
            $filter = substr($filter, 0, strlen($filter) - 5);
            echo $filter;
          endif;
        ?>
      }
      if($('#kabupaten').val() != ""){
        <?php
          if(is_object($kabupaten) || is_array($kabupaten)) :
            $filter = '';
            foreach ($kabupaten as $row) :
              $filter = $filter.'if($("#kabupaten").val() == "'.$row->id_kabupaten.'"){
                tag.html(tag.html() + " Kabupaten Asal : <u>'.$row->kabupaten.'</u>, ");
              }
              else ';
            endforeach;
            $filter = substr($filter, 0, strlen($filter) - 5);
            echo $filter;
          endif;
        ?>
      }
      if($('#kecamatan').val() != ""){
        <?php
          if(is_object($kecamatan) || is_array($kecamatan)) :
            $filter = '';
            foreach ($kecamatan as $row) :
              $filter = $filter.'if($("#kecamatan").val() == "'.$row->id_kecamatan.'"){
                tag.html(tag.html() + " Kecamatan Asal : <u>'.$row->kecamatan.'</u>, ");
              }
              else ';
            endforeach;
            $filter = substr($filter, 0, strlen($filter) - 5);
            echo $filter;
          endif;
        ?>
      }
      if($('#desa').val() != ""){
        <?php
          if(is_object($desa) || is_array($desa)) :
            $filter = '';
            foreach ($desa as $row) :
              $filter = $filter.'if($("#desa").val() == "'.$row->id_desa.'"){
                tag.html(tag.html() + " Desa Asal : <u>'.$row->desa.'</u>, ");
              }
              else ';
            endforeach;
            $filter = substr($filter, 0, strlen($filter) - 5);
            echo $filter;
          endif;
        ?>
      }
      if($('#banjar').val() != ""){
        <?php
          if(is_object($banjar) || is_array($banjar)) :
            $filter = '';
            foreach ($banjar as $row) :
              $filter = $filter.'if($("#banjar").val() == "'.$row->id_banjar.'"){
                tag.html(tag.html() + " Banjar Asal : <u>'.$row->banjar.'</u>, ");
              }
              else ';
            endforeach;
            $filter = substr($filter, 0, strlen($filter) - 5);
            echo $filter;
          endif;
        ?>
      }
      tag.html(tag.html().substr(0, tag.html().length - 2));
      if($('#no_kk').val() == "" && $('#nik').val() == "" && $('#nama_penduduk').val() == "" && $('#periode').val() == "" && $('#status_kk').val() == "" && $('#tempat_lahir').val() == "" && $('#datepicker').val() == "" && jk == "2" && $('#alamat').val() == "" && $('#agama').val() == "" && $('#pendidikan').val() == "" && $('#pekerjaan').val() == "" && $('#telepon').val() == "" && $('#nama_ayah').val() == "" && $('#nama_ibu').val() == "" && $('#status_kependudukan').val() == "" && $('#status_kawin').val() == "" && $('#kewarganegaraan').val() == "" && $('#kedatangan_datepicker').val() == "" && $('#alamat_asal').val() == "" && $('#provinsi').val() == "" && $('#kabupaten').val() == "" && $('#kecamatan').val() == "" && $('#desa').val() == "" && $('#banjar').val() == ""){
        tag.html(tag.html() + " Menampilkan seluruh data pendatang.");
      }
      // console.log($('#datepicker').val());
      $.post( "http://localhost/si-administrasi-kependudukan/index.php/pendatang/pencarianservice/", 
      { 
        no_kk: $('#no_kk').val(),
        nik: $('#nik').val(),
        nama_penduduk: $('#nama_penduduk').val(),
        periode: $('#periode').val(),
        status_kk: $('#status_kk').val(),
        tempat_lahir: $('#tempat_lahir').val(),
        datepicker: $('#datepicker').val(),
        jenis_kelamin: jk,
        alamat: $('#alamat').val(),
        agama: $('#agama').val(),
        pendidikan: $('#pendidikan').val(),
        pekerjaan: $('#pekerjaan').val(),
        telepon: $('#telepon').val(),
        nama_ayah: $('#nama_ayah').val(),
        nama_ibu: $('#nama_ibu').val(),
        status_kependudukan: $('#status_kependudukan').val(),
        status_kawin: $('#status_kawin').val(),
        kewarganegaraan: $('#kewarganegaraan').val(),
        kedatangan_datepicker: $('#kedatangan_datepicker').val(),
        alamat_asal: $('#alamat_asal').val(),
        provinsi: $('#provinsi').val(),
        kabupaten: $('#kabupaten').val(),
        kecamatan: $('#kecamatan').val(),
        desa: $('#desa').val(),
        banjar: $('#banjar').val()
      })
      .done(function( datax ) {
          // console.log(datax);
          //var datatable = $('#dataTables-example').dataTable().api();
          table.rows().clear();
          

          if(datax == "meong")
          {
            table.row.add(["-", "-", "-", "-", "-", "-", "-", "-", "-"]).draw();
            alert("Data tidak ditemukan");
          }
          else
          {
            $.each(JSON.parse(datax), function(index, value){
                table.row.add([value[0], value[1], value[2], value[3], value[4], value[5], value[6], value[7], value[8], value[9], value[10], value[11], value[12], value[13], value[14], value[15], value[16], value[17]]).draw();
            });
          }

          //table.row.add();
          // table = $('#dataTables-example').DataTable({
          //     data: JSON.parse(datax),
          //     columns: [
          //         { title: "Nama" },
          //         { title: "Kasus" },
          //         { title: "Status" }
          //     ]
          // });
      });
    }
  </script>

  <!-- select option limiter -->
  <script> 

  var kabupaten = $('#kabupaten');
  var kecamatan = $('#kecamatan');
  var desa = $('#desa');
  var banjar = $('#banjar');

  function getkabupaten(input)
  {
    $.getJSON( "<?=site_url('pendatang/ajaxgetkabupatenbyprovinsi/')?>" + input.value)
      .done(function( data ) {
        if(data != false)
        {
          kabupaten.empty();
          kabupaten.append($("<option></option>").attr("value","").text("Semua Kabupaten"));

          $.each(data, function(key, value) {   
            kabupaten
              .append($("<option></option>")
              .attr("value",value.id_kabupaten)
              .text(value.kabupaten));
          });
        }
        else
        {
          kabupaten.empty();
          kabupaten.append($("<option></option>").attr("value","").text("Semua Kabupaten"));
          kabupaten.append($("<option></option>").attr("disabled","disabled").text("*Kabupaten tidak ditemukan"));
        }
      });
  }

  function getkecamatan(input)
  {
    $.getJSON( "<?=site_url('pendatang/ajaxgetkecamatanbykabupaten/')?>" + input.value)
      .done(function( data ) {
        if(data != false)
        {
          kecamatan.empty();
          kecamatan.append($("<option></option>").attr("value","").text("Semua Kecamatan"));

          $.each(data, function(key, value) {   
            kecamatan
              .append($("<option></option>")
              .attr("value",value.id_kecamatan)
              .text(value.kecamatan));
          });
        }
        else
        {
          kecamatan.empty();
          kecamatan.append($("<option></option>").attr("value","").text("Semua Kecamatan"));
          kecamatan.append($("<option></option>").attr("disabled","disabled").text("*Kecamatan tidak ditemukan"));
        }
      });
  }

  function getdesa(input)
  {
    $.getJSON( "<?=site_url('pendatang/ajaxgetdesabykecamatan/')?>" + input.value)
      .done(function( data ) {
        if(data != false)
        {
          desa.empty();
          desa.append($("<option></option>").attr("value","").text("Semua Desa"));

          $.each(data, function(key, value) {   
            desa
              .append($("<option></option>")
              .attr("value",value.id_desa)
              .text(value.desa));
          });
        }
        else
        {
          desa.empty();
          desa.append($("<option></option>").attr("value","").text("Semua Desa"));
          desa.append($("<option></option>").attr("disabled","disabled").text("*Desa tidak ditemukan"));
        }
      });
  }

  function getbanjar(input)
  {
    $.getJSON( "<?=site_url('pendatang/ajaxgetbanjarbydesa/')?>" + input.value)
      .done(function( data ) {
        if(data != false)
        {
          banjar.empty();
          banjar.append($("<option></option>").attr("value","").text("Semua Banjar"));

          $.each(data, function(key, value) {   
            banjar
              .append($("<option></option>")
              .attr("value",value.id_banjar)
              .text(value.banjar));
          });
        }
        else
        {
          banjar.empty();
          banjar.append($("<option></option>").attr("value","").text("Semua Banjar"));
          banjar.append($("<option></option>").attr("disabled","disabled").text("*Banjar tidak Ditemukan"));
        }
      });
  }

  </script>