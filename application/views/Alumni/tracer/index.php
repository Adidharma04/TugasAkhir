<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
 
</head>
<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

            <h1 class="m-0">Halaman Informasi Tracer</h1>
            <p>Deskripsi penjelasan event</p>
            <a href="" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah Tracer Baru</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Alumni/dashboard_alumni')?>">Home</a></li>
              <li class="breadcrumb-item active">Penilaian </li>
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

            <hr>

            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-red">Tracer Riwayat</span>
              </div>
              <!-- /.timeline-label -->


              <?php if ( count($tracer) > 0 ) { ?>

                <?php foreach ( $tracer as $item ) {
                  
                  
                    $nama = "";
                    $caption = "";
                    $deskripsi = "";
                    $tanggal_pembuatan = "";


                    // style 
                    $color = "";
                    $icon  = "";

                    if ( $item['tipe_tracer'] == "kerja" ) {
                      
                        $nama    = $item['data']['nama_perusahaan'];
                        $caption = "Pernah Bekerja";

                        $deskripsi = "Bekerja di salah satu perusahaan ". $item['data']['jenis_perusahaan']. " pada tanggal ".$item['data']['tahun_masuk']." yaitu ". $item['data']['nama_perusahaan'];
                        $tanggal_pembuatan = date('d M Y H.i A', strtotime($item['data']['created_at']));

                        $color = "bg-blue";
                        $icon  = "fas fa-briefcase";
                    
                    
                    } else if ( $item['tipe_tracer'] == "kuliah" ) {

                      $nama = $item['data']['nama_kampus'];
                      $caption = "Menempuh Pendidikan";

                      $deskripsi = "Melakukan studi di salah satu kampus ". $nama . " jurusan ". $item['data']['jurusan'].' dengan keahlian atau program studi '.
                        $item['data']['program_studi'];

                      $tanggal_pembuatan = date('d M Y H.i A', strtotime($item['data']['created_at']));

                      $color = "bg-yellow";
                      $icon = "fas fa-graduation-cap";
                    }


                ?>


                  
                  <!-- Tracer  -->
                  <div>
                    <i class="<?php echo $icon.' '.$color ?>"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="fas fa-clock"></i> dibuat pada  <?php echo $tanggal_pembuatan ?></span>
                      <h3 class="timeline-header"><a href="#"><?php echo $nama ?></a> - <?php echo $caption ?></h3>

                      <div class="timeline-body">
                        <?php echo $deskripsi ?>

                        <label class="badge badge-success">Label</label>
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-sm">Read more</a>
                        <a class="btn btn-danger btn-sm">Delete</a>
                      </div>
                    </div>
                  </div>
                  <!-- END Tracer -->



                <?php } // end foreach ?>
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
</body>
</html>
