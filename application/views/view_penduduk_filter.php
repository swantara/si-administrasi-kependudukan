  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Penduduk |
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
              <a style="margin-right: 5px;" href="<?=site_url('penduduk/tambah')?>" class="btn btn-default"><i class="fa fa-user-plus text-green"></i> Tambah Data</a>
              <a href="<?=site_url('penduduk')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                      <input type="radio" name="jenis_kelamin" id="jenis_kelamin" class="minimal" <?=set_radio('jenis_kelamin', 2, TRUE)?> value="2"> Semua
                    </small>
                    <small class="radio-inline">
                      <input type="radio" name="jenis_kelamin" id="jenis_kelamin" class="minimal" <?=set_radio('jenis_kelamin', 1)?> value="1"> Laki-laki
                    </small>
                    <small class="radio-inline">
                      <input type="radio" name="jenis_kelamin" id="jenis_kelamin" class="minimal" <?=set_radio('jenis_kelamin', 0)?> value="0"> Perempuan
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
                  <th>Tanggal Lahir</th>
                  <th>Tempat Lahir</th>
                  <th>No Kartu Keluarga</th>
                  <th>No Induk Kependudukan</th>
                  <th>Nama Lengkap</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Status Perkawinan</th>
                  <th style="width: 10px;">Aksi</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                  <th>Tanggal Lahir</th>
                  <th>Tempat Lahir</th>
                  <th>No. Kartu Keluarga</th>
                  <th>No Induk Kependudukan</th>
                  <th>Nama Lengkap</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Status Perkawinan</th>
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
        $.post( "http://localhost/si-administrasi-kependudukan/index.php/penduduk/pencarianservice/", 
        { 
          nama: "",
        })
        .done(function( datax ) {
            // console.log(datax);
            table = $('#example77').DataTable({
                data: dataSet
                // columns: [
                //     { title: "Tanggal Lahir" },
                //     { title: "Tempat Lahir" },
                //     { title: "No. Kartu Keluarga" },
                //     { title: "No Induk Kependudukan" },
                //     { title: "Nama Lengkap" },
                //     { title: "Jenis Kelamin" },
                //     { title: "no_kk" },
                //     { title: "nik" },
                //     { title: "nama_penduduk" },
                //     { title: "no_kk" },
                //     { title: "nik" },
                //     { title: "nama_penduduk" },
                //     { title: "no_kk" },
                //     { title: "nik" },
                //     { title: "nama_penduduk" },
                //     { title: "no_kk" },
                //     { title: "nik" },
                //     { title: "nama_penduduk" },
                //     { title: "no_kk" },
                //     { title: "nik" },
                //     { title: "nama_penduduk" }
                // ]
            });
        });
    });

    function filter()
    {
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
        if($('#status_kk').val() == "1"){
          tag.html(tag.html() + " Status Hubungan Dalam Keluarga : <u>Kepala Keluarga</u>, ");
        }
        else if($('#status_kk').val() == "2"){
          tag.html(tag.html() + " Status Hubungan Dalam Keluarga : <u>Istri</u>, ");
        }
        else if($('#status_kk').val() == "3"){
          tag.html(tag.html() + " Status Hubungan Dalam Keluarga : <u>Anak</u>, ");
        }
        else if($('#status_kk').val() == "4"){
          tag.html(tag.html() + " Status Hubungan Dalam Keluarga : <u>Cucu</u>, ");
        }
        else if($('#status_kk').val() == "5"){
          tag.html(tag.html() + " Status Hubungan Dalam Keluarga : <u>Orang Tua</u>, ");
        }
        else if($('#status_kk').val() == "6"){
          tag.html(tag.html() + " Status Hubungan Dalam Keluarga : <u>Mertua</u>, ");
        }
        else if($('#status_kk').val() == "7"){
          tag.html(tag.html() + " Status Hubungan Dalam Keluarga : <u>Menantu</u>, ");
        }
        else if($('#status_kk').val() == "8"){
          tag.html(tag.html() + " Status Hubungan Dalam Keluarga : <u>Pembantu</u>, ");
        }
        else if($('#status_kk').val() == "9"){
          tag.html(tag.html() + " Status Hubungan Dalam Keluarga : <u>Famili Lain</u>, ");
        }
        else if($('#status_kk').val() == "10"){
          tag.html(tag.html() + " Status Hubungan Dalam Keluarga : <u>Lainnya</u>, ");
        }
        else if($('#status_kk').val() == "11"){
          tag.html(tag.html() + " Status Hubungan Dalam Keluarga : <u>Suami</u>, ");
        }
      }
      if($('#tempat_lahir').val() != ""){
        tag.html(tag.html() + " Tempat Lahir : <u>" + $('#tempat_lahir').val() + "</u>, ");
      }
      if($('#datepicker').val() != ""){
        tag.html(tag.html() + " Tanggal Lahir : <u>" + $('#datepicker').val() + "</u>, ");
      }
      if($('#jenis_kelamin').val() != ""){
        if($('#jenis_kelamin').val() == "1"){
          tag.html(tag.html() + " Jenis Kelamin : <u>Laki-laki</u>, ");
        }
        else if($('#jenis_kelamin').val() == "0"){
          tag.html(tag.html() + " Jenis Kelamin : <u>Perempuan</u>, ");
        }
      }
      if($('#alamat').val() != ""){
        tag.html(tag.html() + " Alamat : <u>" + $('#alamat').val() + "</u>, ");
      }
      if($('#agama').val() != ""){
        if($('#agama').val() == "1"){
          tag.html(tag.html() + " Agama : <u>Islam</u>, ");
        }
        else if($('#agama').val() == "2"){
          tag.html(tag.html() + " Agama : <u>Hindu</u>, ");
        }
        else if($('#agama').val() == "3"){
          tag.html(tag.html() + " Agama : <u>Kristen</u>, ");
        }
        else if($('#agama').val() == "4"){
          tag.html(tag.html() + " Agama : <u>Katholik</u>, ");
        }
        else if($('#agama').val() == "5"){
          tag.html(tag.html() + " Agama : <u>Buddha</u>, ");
        }
      }
      if($('#pendidikan').val() != ""){
        if($('#pendidikan').val() == "1"){
          tag.html(tag.html() + " Pendidikan : <u>Tidak / Belum Sekolah</u>, ");
        }
        else if($('#pendidikan').val() == "2"){
          tag.html(tag.html() + " Pendidikan : <u>Belum Tamat SD / Sederajat</u>, ");
        }
        else if($('#pendidikan').val() == "3"){
          tag.html(tag.html() + " Pendidikan : <u>Tamat SD / Sederajat</u>, ");
        }
        else if($('#pendidikan').val() == "4"){
          tag.html(tag.html() + " Pendidikan : <u>SLTP / Sederajat</u>, ");
        }
        else if($('#pendidikan').val() == "5"){
          tag.html(tag.html() + " Pendidikan : <u>SLTA / Sederajat</u>, ");
        }
        else if($('#pendidikan').val() == "6"){
          tag.html(tag.html() + " Pendidikan : <u>Akademi / Diploma III / Sederajat</u>, ");
        }
        else if($('#pendidikan').val() == "7"){
          tag.html(tag.html() + " Pendidikan : <u>Diploma IV / Strata I</u>, ");
        }
        else if($('#pendidikan').val() == "8"){
          tag.html(tag.html() + " Pendidikan : <u>Diploma I / II</u>, ");
        }
        else if($('#pendidikan').val() == "9"){
          tag.html(tag.html() + " Pendidikan : <u>Strata II</u>, ");
        }
        else if($('#pendidikan').val() == "10"){
          tag.html(tag.html() + " Pendidikan : <u>Strata III</u>, ");
        }
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
        if($('#status_kependudukan').val() == "1"){
          tag.html(tag.html() + " Status Kependudukan : <u>Penduduk Asli</u>, ");
        }
        else if($('#status_kependudukan').val() == "2"){
          tag.html(tag.html() + " Status Kependudukan : <u>Pendatang</u>, ");
        }
        else if($('#status_kependudukan').val() == "3"){
          tag.html(tag.html() + " Status Kependudukan : <u>Pindah</u>, ");
        }
        else if($('#status_kependudukan').val() == "4"){
          tag.html(tag.html() + " Status Kependudukan : <u>Meninggal</u>, ");
        }
      }
      if($('#status_kawin').val() != ""){
        if($('#status_kawin').val() == "1"){
          tag.html(tag.html() + " Status Perkawinan : <u>Jomblo</u>, ");
        }
        else if($('#status_kawin').val() == "2"){
          tag.html(tag.html() + " Status Perkawinan : <u>Cuma Dianggep Kakak</u>, ");
        }
        else if($('#status_kawin').val() == "3"){
          tag.html(tag.html() + " Status Perkawinan : <u>Ngenes</u>, ");
        }
        else if($('#status_kawin').val() == "4"){
          tag.html(tag.html() + " Status Perkawinan : <u>Tersangkut Masa Lalu</u>, ");
        }
      }
      if($('#kewarganegaraan').val() != ""){
        tag.html(tag.html() + " Kewarganegaraan : <u>" + $('#kewarganegaraan').val() + "</u>, ");
      }
      if($('#no_kk').val() == "" && $('#nik').val() == "" && $('#nama_penduduk').val() == "" && $('#periode').val() == "" && $('#status_kk').val() == "" && $('#tempat_lahir').val() == "" && $('#datepicker').val() == "Invalid+Date" && $('#jenis_kelamin').val() == "2" && $('#alamat').val() == "" && $('#agama').val() == "" && $('#pendidikan').val() == "" && $('#pekerjaan').val() == "" && $('#telepon').val() == "" && $('#nama_ayah').val() == "" && $('#nama_ibu').val() == "" && $('#status_kependudukan').val() == "" && $('#status_kawin').val() == "" && $('#kewarganegaraan').val() == "")
        console.log("meong");
        $.post( "http://localhost/si-administrasi-kependudukan/index.php/penduduk/pencarianservice/", 
        { 
          no_kk: $('#no_kk').val(),
          nik: $('#nik').val(),
          nama_penduduk: $('#nama_penduduk').val(),
          periode: $('#periode').val(),
          status_kk: $('#status_kk').val(),
          tempat_lahir: $('#tempat_lahir').val(),
          datepicker: $('#datepicker').val(),
          jenis_kelamin: $('#jenis_kelamin').val(),
          alamat: $('#alamat').val(),
          agama: $('#agama').val(),
          pendidikan: $('#pendidikan').val(),
          pekerjaan: $('#pekerjaan').val(),
          telepon: $('#telepon').val(),
          nama_ayah: $('#nama_ayah').val(),
          nama_ibu: $('#nama_ibu').val(),
          status_kependudukan: $('#status_kependudukan').val(),
          status_kawin: $('#status_kawin').val(),
          kewarganegaraan: $('#kewarganegaraan').val()
        })
        .done(function( datax ) {
            // console.log(datax);
            //var datatable = $('#dataTables-example').dataTable().api();
            table.rows().clear();
            

            $.each(JSON.parse(datax), function(index, value){
                table.row.add([value[0], value[1], value[2], value[3], value[4], value[5], value[6], value[7], value[8], value[9], value[10], value[11], value[12], value[13], value[14], value[15], value[16], value[17]]).draw();
            });



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