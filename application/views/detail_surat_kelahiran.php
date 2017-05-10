  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Surat Kelahiran |
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
            <div class="box box-danger">
              <div class="box-body box-profile">
                <img style="margin: 0 auto;" class="img-responsive"

                <?php
                  if(is_null($row->foto_anak) || $row->foto_anak=="") :
                ?>
                src="<?=base_url()?>assets/dist/img/no-image.jpg"

                <?php
                  else:
                ?>
                src="<?=base_url()?>assets/img/fotopenduduk/<?=$row->foto_anak?>"

                <?php
                  endif;
                ?>

                alt="Program Picture">
                <hr/>
                <button type="button" class="btn btn-default btn-block" onClick="window.location.href='<?=site_url('surat_kelahiran/cetak/'.$row->id_surat_lahir)?>'">
                  <i class="fa fa-print text-green"></i> Print Surat
                </button>
                <button type="button" class="btn btn-default btn-block" onClick="window.location.href='<?=site_url('surat_kelahiran')?>'">
                  <i class="fa fa-reply"></i> Kembali
                </button>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <!-- About Me Box -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-quote-right margin-r-5"></i> Deskripsi</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <strong>Nomer Surat Kantor</strong>
                    <p><?=$row->no_surat_kantor?></p>
                    <hr/>
                    <strong>Kepala Lingkungan</strong>
                    <p><?=$row->nama_kaling?></p>
                    <hr/>
                    <strong>Nomer Surat Kaling</strong>
                    <p><?=$row->no_surat_kaling?></p>
                    <hr/>
                    <strong>Nama Lengkap</strong>
                    <p><?php echo $row->nama_anak . " (" . $row->nik . ")"?></p>
                    <hr/>
                    <strong>Tempat Lahir</strong>
                    <p><?=$row->tempat_lahir_anak?></p>
                    <hr/>
                    <strong>Tanggal Lahir</strong>
                    <p>
                      <?php
                        $date=date_create($row->tgl_lahir_anak);
                        $newdate=date_format($date,"d-m-Y");
                        echo $newdate;
                      ?>
                    </p>
                    <hr/>
                    <strong>Jenis Kelamin</strong>
                    <p>
                      <?php
                        if($row->jk_anak == 1) :
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
                        if(is_null($row->alamat_anak) || $row->alamat_anak=="") :
                          echo "-";
                        else:
                          echo $row->alamat_anak;
                        endif;
                      ?>
                    </p>
                  </div>
                  <div class="col-md-6">
                    <strong>Nama Ayah</strong>
                    <p><?php echo $row->nama_ayah . " (" . $row->nik_ayah . ")"?></p>
                    <hr/>
                    <strong>Tempat Lahir Ayah</strong>
                    <p><?=$row->tempat_lahir_ayah?></p>
                    <hr/>
                    <strong>Tanggal Lahir Ayah</strong>
                    <p>
                      <?php
                        $date=date_create($row->tgl_lahir_ayah);
                        $newdate=date_format($date,"d-m-Y");
                        echo $newdate;
                      ?>
                    </p>
                    <hr/>
                    <strong>Pekerjaan Ayah</strong>
                    <p>
                      <?php
                        if(is_null($row->pekerjaan_ayah) || $row->pekerjaan_ayah=="") :
                          echo "-";
                        else:
                          echo $row->pekerjaan_ayah;
                        endif;
                      ?>
                    </p>
                    <hr/>
                    <strong>Alamat Ayah</strong>
                    <p>
                      <?php
                        if(is_null($row->alamat_ayah) || $row->alamat_ayah=="") :
                          echo "-";
                        else:
                          echo $row->alamat_ayah;
                        endif;
                      ?>
                    </p>
                    <hr/>
                    <strong>Nama Ibu</strong>
                    <p><?php echo $row->nama_ibu . " (" . $row->nik_ibu . ")"?></p>
                    <hr/>
                    <strong>Tempat Lahir Ibu</strong>
                    <p><?=$row->tempat_lahir_ibu?></p>
                    <hr/>
                    <strong>Tanggal Lahir Ibu</strong>
                    <p>
                      <?php
                        $date=date_create($row->tgl_lahir_ibu);
                        $newdate=date_format($date,"d-m-Y");
                        echo $newdate;
                      ?>
                    </p>
                    <hr/>
                    <strong>Pekerjaan Ibu</strong>
                    <p>
                      <?php
                        if(is_null($row->pekerjaan_ibu) || $row->pekerjaan_ibu=="") :
                          echo "-";
                        else:
                          echo $row->pekerjaan_ibu;
                        endif;
                      ?>
                    </p>
                    <hr/>
                    <strong>Alamat Ibu</strong>
                    <p>
                      <?php
                        if(is_null($row->alamat_ibu) || $row->alamat_ibu=="") :
                          echo "-";
                        else:
                          echo $row->alamat_ibu;
                        endif;
                      ?>
                    </p>
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