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
            <h1 class="m-0">Event</h1>
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
            <div class="card card-row card-default">
            <div class="card-header bg-info">
                <h3 class="card-title">
                Event
                </h3>
            </div>
            <div class="card-body">
                <div class="card card-light card-outline">
                <div class="card-header">
                    <h5 class="card-title">Detail Event</h5>
                    <div class="card-tools">
                    <a href="#" class="btn btn-tool">
                        <i class="fas fa-pen"></i>
                    </a>
                    </div>
                </div>
                <div class="card-body">
                    <p>Nama Event &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</p>
                    <hr>
                    <p>Deskripsi Event &nbsp;:</p>
                    <hr>
                    <p>Lokasi Event &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</p>
                    <hr>
                    <p>Tanggal Event &nbsp;&nbsp;&nbsp;&nbsp;:</p>
                    <hr>
                    <p>Foto Event &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</p>
                    <hr>
                    <p>Jenis Event &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</p>
                    
                </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                  <a href="<?= base_url("Alumni/Event/tambah")?>" class="btn btn-primary">Tambah</a>
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
</body>
</html>
