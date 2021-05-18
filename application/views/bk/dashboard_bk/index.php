<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/dist/css/adminlte.min.css' ?>">
</head>
<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
<!-- Content Wrapper. Contains page content -->
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
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Pegawai</span>
                <span class="info-box-number">
                  <?php echo $header['pegawai'] ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

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
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

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
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

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
<!-- jQuery -->
<script src="<?= base_url("assets/Template/Admin/plugins/jquery/jquery.min.js")?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url("assets/Template/Admin/plugins/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
<!-- ChartJS -->
<script src="<?= base_url("assets/Template/Admin/plugins/chart.js/Chart.min.js")?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url("assets/Template/Admin/dist/js/adminlte.min.js")?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url("assets/Template/Admin/dist/js/demo.js")?>"></script>
<!-- Page specific script -->






<script>

$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $tracer = $('#tracer-chart')
  var tracerChart  = new Chart($tracer, {
    type   : 'bar',
    data   : {
      labels  : [
          <?php
            
            foreach ( $tracer AS $data ) {

                echo $data['tahun'].',';
            }
        ?>
      ],
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor    : '#007bff',
          data           : [

            <?php
            
                foreach ( $tracer AS $data ) {

                    echo $data['kerja'].',';
                }
            ?>

          ]
        },
        {
          backgroundColor: '#ced4da',
          borderColor    : '#ced4da',
          data           : [


            <?php
            
                foreach ( $tracer AS $data ) {

                    echo $data['kuliah'].',';
                }
            ?>

          ]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }
              return value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })
})


</script>
</body>
</html>
