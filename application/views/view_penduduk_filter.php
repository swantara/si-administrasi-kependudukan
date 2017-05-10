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
        <?php echo form_open('penduduk/pencarian', array('method' => 'POST', 'role' => 'form'));?>
        <?php echo validation_errors();?>
          <!-- /.col -->
          <div class="col-md-12">
            <!-- About Me Box -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <a style="margin-right: 5px;" href="<?=site_url('penduduk/tambah')?>" class="btn btn-default"><i class="fa fa-user-plus text-green"></i> Tambah Data</a>
                <a href="<?=site_url('penduduk/pencarian')?>" class="btn btn-default"><i class="fa fa-search text-blue"></i> Pencarian Lanjutan</a>
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
        <div class="col-md-12">
          <div class="box box-danger">
            <div class="box-body">
              <h4>Hasil Pencarian Berdasarkan :</h4>
              <h5>No Kartu Keluarga : <u>123456789</u>; No Induk Kependudukan : <u>12345678</u>; Status Hubungan Dalam Keluarga : <u>Kepala Keluarga</u>; Status Perkawinan : <u>Jomblo</u></h5>
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

  <script type="text/javascript">
    $(document).ready(function() {
      $('#example77').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": $.fn.dataTable.pipeline( {
                url: "<?=site_url('penduduk/ajaxviewpenduduk')?>",
                pages: 5 // number of pages to cache
            } )
          /*"language": {
            "sSearch": "Cari Data ",
              "lengthMenu": "Tampilkan _MENU_ data per halaman",
              "zeroRecords": "Maaf Data tidak ditemukan",
              "info": "Tampilkan halaman _PAGE_ dari _PAGES_ (_TOTAL_ rumah)",
              "infoEmpty": "Tidak ada data yang tersedia",
              "infoFiltered": "(Mencari dari _MAX_ data yang ada)"
            }*/
        } );
    } );
    //
    // Pipelining function for DataTables. To be used to the `ajax` option of DataTables
    //
    $.fn.dataTable.pipeline = function ( opts ) {
        // Configuration options
        var conf = $.extend( {
            pages: 5,     // number of pages to cache
            url: '',      // script url
            data: null,   // function or object with parameters to send to the server
                          // matching how `ajax.data` works in DataTables
            method: 'GET' // Ajax HTTP method
        }, opts );
     
        // Private variables for storing the cache
        var cacheLower = -1;
        var cacheUpper = null;
        var cacheLastRequest = null;
        var cacheLastJson = null;
     
        return function ( request, drawCallback, settings ) {
            var ajax          = false;
            var requestStart  = request.start;
            var drawStart     = request.start;
            var requestLength = request.length;
            var requestEnd    = requestStart + requestLength;
             
            if ( settings.clearCache ) {
                // API requested that the cache be cleared
                ajax = true;
                settings.clearCache = false;
            }
            else if ( cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper ) {
                // outside cached data - need to make a request
                ajax = true;
            }
            else if ( JSON.stringify( request.order )   !== JSON.stringify( cacheLastRequest.order ) ||
                      JSON.stringify( request.columns ) !== JSON.stringify( cacheLastRequest.columns ) ||
                      JSON.stringify( request.search )  !== JSON.stringify( cacheLastRequest.search )
            ) {
                // properties changed (ordering, columns, searching)
                ajax = true;
            }
             
            // Store the request for checking next time around
            cacheLastRequest = $.extend( true, {}, request );
     
            if ( ajax ) {
                // Need data from the server
                if ( requestStart < cacheLower ) {
                    requestStart = requestStart - (requestLength*(conf.pages-1));
     
                    if ( requestStart < 0 ) {
                        requestStart = 0;
                    }
                }
                 
                cacheLower = requestStart;
                cacheUpper = requestStart + (requestLength * conf.pages);
     
                request.start = requestStart;
                request.length = requestLength*conf.pages;
     
                // Provide the same `data` options as DataTables.
                if ( $.isFunction ( conf.data ) ) {
                    // As a function it is executed with the data object as an arg
                    // for manipulation. If an object is returned, it is used as the
                    // data object to submit
                    var d = conf.data( request );
                    if ( d ) {
                        $.extend( request, d );
                    }
                }
                else if ( $.isPlainObject( conf.data ) ) {
                    // As an object, the data given extends the default
                    $.extend( request, conf.data );
                }
     
                settings.jqXHR = $.ajax( {
                    "type":     conf.method,
                    "url":      conf.url,
                    "data":     request,
                    "dataType": "json",
                    "cache":    false,
                    "success":  function ( json ) {
                        cacheLastJson = $.extend(true, {}, json);
     
                        if ( cacheLower != drawStart ) {
                            json.data.splice( 0, drawStart-cacheLower );
                        }
                        json.data.splice( requestLength, json.data.length );
                         
                        drawCallback( json );
                    }
                } );
            }
            else {
                json = $.extend( true, {}, cacheLastJson );
                json.draw = request.draw; // Update the echo for each response
                json.data.splice( 0, requestStart-cacheLower );
                json.data.splice( requestLength, json.data.length );
     
                drawCallback(json);
            }
        }
    };
     
    // Register an API method that will empty the pipelined data, forcing an Ajax
    // fetch on the next draw (i.e. `table.clearPipeline().draw()`)
    $.fn.dataTable.Api.register( 'clearPipeline()', function () {
        return this.iterator( 'table', function ( settings ) {
            settings.clearCache = true;
        } );
    } );
    
  </script>