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
            <h1 class="m-0">Penilaian</h1>
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
      <div class="row">
          <div class="col-md-8">
            <div class="card">
            <?php echo $this->session->flashdata('msg') ?>
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-comment"></i>
                  Kritik dan Saran
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <blockquote class="quote-danger">
                  <p><b>Kritik</b></p>
                  <p>Kirtik :</p>
                  <small>Last update <cite title="Source Title">sa</cite></small>
                </blockquote>
                <blockquote class="quote-primary">
                <p><b>Saran</b></p>
                  <p>Saran :</p>
                  <small>Last update <cite title="Source Title">sa</cite></small>
                </blockquote>
                <div class="row">
                  <div class="col-md-2">
                  <a href="<?= base_url("Alumni/penilaian/tambah")?>" class="btn btn-primary">Tambah</a>
                </div>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
          <div class="col-md-6">
            
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
       
      </div><!-- /.container-fluid -->

      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</body>
</html>
