  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Surat Kelahiran |
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
        <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <a style="margin-right: 5px;" href="<?=site_url('surat_kelahiran/tambah')?>" class="btn btn-default"><i class="fa fa-user-plus text-green"></i> Tambah Data</a>
              <a href="<?=site_url('surat_kelahiran/pencarian')?>" class="btn btn-default"><i class="fa fa-search text-blue"></i> Pencarian Lanjutan</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tanggal Surat</th>
                  <th>No Kartu Penduduk</th>
                  <th>No Induk Kependudukan</th>
                  <th>Nama</th>
                  <th>Nama Kaling</th>
                  <th>No Surat Kaling</th>
                  <th>No Surat Kantor</th>
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
                  <td>
                    <?php
                      $date=date_create($row->tgl_surat);
                      $newdate=date_format($date,"d-m-Y");
                      echo $newdate;
                    ?>
                  </td>
                  <td><?=$row->no_kk?></td>
                  <td><?=$row->nik?></td>
                  <td><?=$row->nama_anak?></td>
                  <td><?=$row->nama_kaling?></td>
                  <td><?=$row->no_surat_kaling?></td>
                  <td><?=$row->no_surat_kantor?></td>
                  <td>
                    <div class="btn-group-vertical">
                      <button type="button" class="btn btn-default" onClick="window.location.href='<?=site_url('surat_kelahiran/detail/'.$row->id_surat_lahir)?>'">
                        <div class="pull-left">
                          <i class="fa fa-eye"></i> Detail
                        </div>
                      </button>
                      <button type="button" class="btn btn-default" onClick="window.location.href='<?=site_url('surat_kelahiran/cetak/'.$row->id_surat_lahir)?>'">
                        <div class="pull-left">
                          <i class="fa fa-print text-green"></i> Print
                        </div>
                      </button>
                      <button type="button" class="btn btn-danger" onClick="window.location.href='<?=site_url('surat_kelahiran/hapus/'.$row->id_surat_lahir)?>'">
                        <div class="pull-left">
                          <i class="fa fa-trash"></i> Hapus
                        </div>
                      </button>
                    </div>
                  </td>
                </tr>
                <?php
                    endforeach;
                    $no++;
                  endif;
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Tanggal Surat</th>
                  <th>No Kartu Penduduk</th>
                  <th>No Induk Kependudukan</th>
                  <th>Nama</th>
                  <th>Nama Kaling</th>
                  <th>No Surat Kaling</th>
                  <th>No Surat Kantor</th>
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

    $(document).ready(function() {
      $('#surat').addClass("active");
      $('#surat_kelahiran').addClass("active");
    });

  </script>