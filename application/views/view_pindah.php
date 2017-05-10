  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Penduduk Pindah |
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
          <div class="box">
            <div class="box-header">
              <a href="<?=site_url('pindah/tambah')?>" class="btn btn-success"><i class="fa fa-user-plus"></i> Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tanggal Pindah</th>
                  <th>No Kartu Keluarga</th>
                  <th>No Induk Kependudukan</th>
                  <th>Nama</th>
                  <th>Alasan Pindah</th>
                  <th>Alamat Tujuan</th>
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
                      $date=date_create($row->tgl_pindah);
                      $newdate=date_format($date,"d-m-Y");
                      echo $newdate;
                    ?>
                  </td>
                  <td><?=$row->no_kk?></td>
                  <td><?=$row->nik?></td>
                  <td><?=$row->nama_penduduk?></td>
                  <td><?=$row->alasan_pindah?></td>
                  <td><?=$row->alamat_tujuan?></td>
                  <td>
                    <div class="btn-group-vertical">
                      <button type="button" class="btn btn-default" onClick="window.location.href='<?=site_url('pindah/detail/'.$row->id_pindah)?>'">
                        <div class="pull-left">
                          <i class="fa fa-eye"></i> Detail
                        </div>
                      </button>
                      <button type="button" class="btn btn-default" onClick="window.location.href='<?=site_url('pindah/edit/'.$row->id_pindah)?>'">
                        <div class="pull-left">
                          <i class="fa fa-edit"></i> Ubah
                        </div>
                      </button>
                      <button type="button" class="btn btn-danger" onClick="window.location.href='<?=site_url('pindah/hapus/'.$row->id_pindah)?>'">
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
                  <th>Tanggal Pindah</th>
                  <th>No Kartu Keluarga</th>
                  <th>No Induk Kependudukan</th>
                  <th>Nama</th>
                  <th>Alasan Pindah</th>
                  <th>Alamat Tujuan</th>
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