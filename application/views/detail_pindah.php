  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Penduduk Pindah |
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
        <?php
          if(is_object($data) || is_array($data)) :
            foreach ($data as $row) :
        ?>
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-success">
              <div class="box-body box-profile">
                <img style="margin: 0 auto;" class="img-responsive"

                <?php
                  if(is_null($row->foto) || $row->foto=="") :
                ?>
                src="<?=base_url()?>assets/dist/img/no-image.jpg"

                <?php
                  else:
                ?>
                src="<?=base_url()?>assets/img/fotopenduduk/<?=$row->foto?>"

                <?php
                  endif;
                ?>

                alt="Program Picture">
                <hr/>
                <button type="button" class="btn btn-default btn-block" onClick="window.location.href='<?=site_url('pindah/edit/'.$row->id_pindah)?>'">
                  <i class="fa fa-edit"></i> Edit
                </button>
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
                <h3 class="box-title"><i class="fa fa-quote-right margin-r-5"></i> Deskripsi</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <strong>No Induk Kependudukan</strong>
                    <p><?=$row->nik?></p>
                    <hr/>
                    <strong>No Kartu Keluarga</strong>
                    <p><?=$row->no_kk?></p>
                    <hr/>
                    <strong>Periode Data</strong>
                    <p><?=$row->periode_data?></p>
                    <hr/>
                    <strong>Nama Kepala Keluarga</strong>
                    <p><?=$row->nama_penduduk?></p>
                    <hr/>
                    <strong>Tempat/Tanggal Lahir</strong>
                    <p>
                      <?php
                        $date=date_create($row->tgl_lahir);
                        $newdate=date_format($date,"d-m-Y");
                        echo $row->tempat_lahir . ", " . $newdate;
                      ?>
                    </p>
                    <hr/>
                    <strong>Jenis Kelamin</strong>
                    <p>
                      <?php
                        if($row->jk == 1) :
                          echo "Laki-laki";
                        else:
                          echo "Perempuan";
                        endif;
                      ?>
                    </p>
                    <hr/>
                    <strong>Alamat</strong>
                    <p>
                      <?php
                        if(is_null($row->alamat_saat_ini) || $row->alamat_saat_ini=="") :
                          echo "-";
                        else:
                          echo $row->alamat_saat_ini;
                        endif;
                      ?>
                    </p>
                    <hr/>
                    <strong>Agama</strong>
                    <p><?=$row->agama?></p>
                    <hr/>
                    <strong>Pekerjaan</strong>
                    <p>
                      <?php
                        if(is_null($row->pekerjaan) || $row->pekerjaan=="") :
                          echo "-";
                        else:
                          echo $row->pekerjaan;
                        endif;
                      ?>
                    </p>
                    <hr/>
                    <strong>Status Perkawinan</strong>
                    <p><?=$row->status_perkawinan?></p>
                  </div>
                  <div class="col-md-6">
                    <strong>Status Hubungan Dalam Keluarga</strong>
                    <p><?=$row->status_keluarga?></p>
                    <hr/>
                    <strong>Tanggal Pindah</strong>
                    <p>
                      <?php
                        $date=date_create($row->tgl_pindah);
                        $newdate=date_format($date,"d-m-Y");
                        echo $newdate;
                      ?>
                    </p>
                    <hr/>
                    <strong>Alasan Pindah</strong>
                    <p><?=$row->alasan_pindah?></p>
                    <hr/>
                    <strong>Alamat Tujuan</strong>
                    <p><?=$row->alamat_tujuan?></p>
                    <hr/>
                    <strong>Provinsi Tujuan</strong>
                    <p><?=$row->provinsi?></p>
                    <hr/>
                    <strong>Kabupaten Tujuan</strong>
                    <p><?=$row->kabupaten?></p>
                    <hr/>
                    <strong>Kecamatan Tujuan</strong>
                    <p><?=$row->kecamatan?></p>
                    <hr/>
                    <strong>Desa Tujuan</strong>
                    <p><?=$row->desa?></p>
                    <hr/>
                    <strong>Banjar Tujuan</strong>
                    <p><?=$row->banjar?></p>
                    <hr/>
                    <strong>Keterangan</strong>
                    <p><?=$row->keterangan?></p>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        <?php
            endforeach;
          endif;
        ?>
        </div>
        <!-- /.row -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->