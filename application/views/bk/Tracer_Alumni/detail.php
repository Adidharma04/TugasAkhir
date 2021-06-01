
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

            <h1 class="m-0">Detail Tracer Alumni</h1><br>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Alumni/dashboard_alumni') ?>">Home</a></li>
              <li class="breadcrumb-item active">Tracer </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <?php echo $this->session->flashdata('msg') ?>
            <hr>

            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-red">Tracer Riwayat</span>
              </div>
              <!-- /.timeline-label -->

              <?php if (count($tracer) > 0) { ?>

                <?php foreach ($tracer as $item) {


                  $nama = "";
                  $caption = "";
                  $deskripsi = "";
                  $tanggal_pembuatan = "";


                  // style 
                  $color = "";
                  $icon  = "";


                  // menampung segala jenis id baik {kerja, kuliah}
                  $id_tracer = "";


                  if ($item['tipe_tracer'] == "kerja") {

                    $nama    = $item['data']['nama_perusahaan'];
                    $caption = "Bekerja";

                    $deskripsi = "Bekerja sebagai  <b>" . $item['data']['jabatan'] . "</b> pada <b>" . $item['data']['tahun_masuk'] . "</b> dengan alamat <b>" . ucfirst($item['data']['alamat_perusahaan'] . '</b>');
                    $tanggal_pembuatan = date('d M Y H.i A', strtotime($item['data']['created_at']));

                    $color = "bg-blue";
                    $icon  = "fas fa-briefcase";


                    // replace id
                    $id_tracer = $item['data']['id_kerja'];
                  } else if ($item['tipe_tracer'] == "kuliah") {

                    $nama = $item['data']['nama_kampus'];
                    $caption = "Pendidikan";

                    $deskripsi = "Kuliah di <b>" . ucfirst($nama) . "</b> jurusan <b>" .  $item['data']['jurusan'] . "</b> pada <b>" . $item['data']['tahun_masuk'] .  '</b> dengan keahlian atau program studi <b>' . $item['data']['program_studi'] . '</b> Diterima jalur';

                    $tanggal_pembuatan = date('d M Y H.i A', strtotime($item['data']['created_at']));

                    $color = "bg-yellow";
                    $icon = "fas fa-graduation-cap";

                    // replace id
                    $id_tracer = $item['data']['id_kuliah'];
                  }
                ?>

                  <!-- Tracer  -->
                  <div>
                    <i class="<?php echo $icon . ' ' . $color ?>"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="fas fa-clock"></i> dibuat pada <?php echo $tanggal_pembuatan ?></span>
                      <h3 class="timeline-header"> <?php echo $caption ?> - di <a href="#"><?php echo ucfirst($nama) ?></a></h3>
                      <div class="timeline-body">
                        <?php echo $deskripsi ?>
                        <?php if ($item['tipe_tracer'] == "kuliah") { ?>
                          <label class="badge badge-success"><?php echo ucfirst($item['data']['jalur_penerimaan']) ?></label>
                        <?php } ?>
                      </div>
                      <div class="timeline-footer">
                        
                      </div>
                    </div>
                  </div>
                  <!-- END Tracer -->



                <?php } // end foreach 
                ?>
              <?php } ?>
              <!-- timeline item -->
              <!-- <div>
                <i class="fas fa-user bg-green"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                  <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                </div>
              </div> -->
              <!-- END timeline item -->


              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <br><br>