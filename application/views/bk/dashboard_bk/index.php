
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('bk/dashboard_bk')?>">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        
        <!-- bagian jumlah -->
        <div class="row">
          

            <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-info"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Informasi</span>
                <span class="info-box-number">
                  <?php echo $header['informasi'] ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-calendar"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Event</span>
                <span class="info-box-number"><?php echo $header['event'] ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-briefcase"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Loker</span>
                <span class="info-box-number"><?php echo $header['lowongan'] ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-graduation-cap"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Alumni</span>
                <span class="info-box-number"><?php echo $record['total_alumni'] ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->


        </div>
        <!-- /.row -->

        
        <!-- bagian statistik -->
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">

                <div class="card card-body">
                    <!-- Bagian -->
                    <div class="row">
                    
                        <div class="col-12 col-sm-12 col-md-7">
                            <h3>Alumni</h3>
                            <small>Statistik Terkini</small> <br><br>

                            <div class="position-relative mb-4">
                                <canvas id="tracer-chart" height="200"></canvas>
                            </div>

                            <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                    <i class="fas fa-square text-primary"></i> Kerja
                                </span>

                                <span>
                                    <i class="fas fa-square text-gray"></i> Kuliah
                                </span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-5">

                            <?php
                            
                                $alumni = $record['total_alumni'];
                                $percentase_kerja = intval( $record['total_kerja']/$alumni * 100 );
                                $percentase_kuliah = intval( $record['total_kuliah']/$alumni * 100 );
                                $percentase_kerjakuliah = intval( $record['total_kerjakuliah']/$alumni * 100 );
                            ?>
                            <p class="">
                                <strong>Rincian Lebih Lanjut</strong> <br>
                                <small>Histori kerja, kuliah, dan dilakukan dua-duanya</small>
                            </p>
                            

                            <div class="progress-group">
                            Kerja
                            <span class="float-right"><b><?php echo $record['total_kerja'] ?></b>/<?php echo $alumni ?></span>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-success" style="width: <?php echo $percentase_kerja ?>%"></div>
                            </div>
                            </div>
                            <!-- /.progress-group -->
                            
                            <div class="progress-group">
                            Kuliah
                            <span class="float-right"><b><?php echo $record['total_kuliah'] ?></b>/<?php echo $alumni ?></span>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-warning" style="width: <?php echo $percentase_kuliah ?>%"></div>
                            </div>
                            </div>
                            <!-- /.progress-group -->

                            <div class="progress-group">
                            Kerja dan Kuliah
                            <span class="float-right"><b><?php echo $record['total_kerjakuliah'] ?></b>/<?php echo $alumni ?></span>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-info" style="width: <?php echo $percentase_kerjakuliah ?>%"></div>
                            </div>
                            </div>

                        </div>
                    
                    </div>
                </div>
            </div>
        </div>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <br><br>