  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SI Administrasi Kependudukan
        <small>Data Kelahiran</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="<?=site_url('kelahiran/tambah')?>" class="btn btn-success"><i class="fa fa-user-plus"></i> Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIK</th>
                  <th>Kewarganegaraan</th>
                  <th>Nama Ibu</th>
                  <th>Nama Ayah</th>
                  <th>Saksi I</th>
                  <th>Saksi II</th>
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
                  <td><?=$row->nama?></td>
                  <td><?=$row->nama_ibu?></td>
                  <td><?=$row->nama_ayah?></td>
                  <td><?=$row->nama_saksi1?></td>
                  <td><?=$row->nama_saksi2?></td>
                  <td>
                    <div class="btn-group-vertical">
                      <button type="button" class="btn btn-default" onClick="window.location.href='<?=site_url('kelahiran/detail/'.$row->id_kelahiran)?>'">
                        <div class="pull-left">
                          <i class="fa fa-eye"></i> Detail
                        </div>
                      </button>
                      <button type="button" class="btn btn-default" onClick="window.location.href='<?=site_url('kelahiran/edit/'.$row->id_kelahiran)?>'">
                        <div class="pull-left">
                          <i class="fa fa-edit"></i> Ubah
                        </div>
                      </button>
                      <button type="button" class="btn btn-danger" onClick="window.location.href='<?=site_url('kelahiran/hapus/'.$row->id_kelahiran)?>'">
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
                  <th>Kewarganegaraan</th>
                  <th>Nama Ibu</th>
                  <th>Nama Ayah</th>
                  <th>Saksi I</th>
                  <th>Saksi II</th>
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