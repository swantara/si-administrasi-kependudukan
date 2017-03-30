  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SI Administrasi Kependudukan
        <small>Data Penduduk</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="<?=site_url('penduduk/tambah')?>" class="btn btn-success"><i class="fa fa-user-plus"></i> Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIK</th>
                  <th>NKK</th>
                  <th>Tanggal Input</th>
                  <th>Nama Lengkap</th>
                  <th>TTL</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Status Perkawinan</th>
                  <th style="width: 10px;">Act</th>
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
                  <td><?=$row->nik?></td>
                  <td><?=$row->no_kk?></td>
                  <td><?=$row->created_at?></td>
                  <td><?=$row->nama?></td>
                  <td><?php echo $row->tempat_lahir . ", " . $row->tgl_lahir?></td>
                  <td><?=$row->jk?></td>
                  <td><?=$row->alamat_saat_ini?></td>
                  <td><?=$row->status_kawin?></td>
                  <td>
                    <div class="btn-group-vertical">
                      <button type="button" class="btn btn-default" onClick="window.location.href='<?=site_url('penduduk/detail/'.$row->id_penduduk)?>'">
                        <div class="pull-left">
                          <i class="fa fa-eye"></i> Detail
                        </div>
                      </button>
                      <button type="button" class="btn btn-default" onClick="window.location.href='<?=site_url('penduduk/edit/'.$row->id_penduduk)?>'">
                        <div class="pull-left">
                          <i class="fa fa-edit"></i> Ubah
                        </div>
                      </button>
                      <button type="button" class="btn btn-danger" onClick="window.location.href='<?=site_url('penduduk/hapus/'.$row->id_penduduk)?>'">
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
                  <th>NIK</th>
                  <th>NKK</th>
                  <th>Tanggal Input</th>
                  <th>Nama Lengkap</th>
                  <th>TTL</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Status Perkawinan</th>
                  <th>Act</th>
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