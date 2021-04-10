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
            <h1 class="m-0">Informasi Umum</h1>
            <p>Deskripsi penjelasan Informasi Umum</p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Alumni/dashboard_alumni')?>">Home</a></li>
              <li class="breadcrumb-item active">Informasi Umum </li>
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
        <div class="col-md-10 offset-1">
            <div class="card card-row card-default">
            
            <div class="card-body">
                <div class="card card-light card-outline">
                <div class="card-header">
                    <h5 class="card-title">Detail Informasi</h5>
                    <div class="card-tools">
                    <a href="informasi_umum/tambah" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah Informasi Baru</a>
                    </div>
                </div>
                <div class="card-body">
                  <table class="table" width="100%">
                    <thead>
                      <tr>
                        <th style="width: 80%">Informasi Umum</th>
                        <th style="width: 20% !important">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    // button
                    $btnText = "Tambah Informasi";
                    $btnColor = "btn-primary";
                    
                    
                    if ( $informasi_umum->num_rows() > 0 ) {

                      foreach ( $informasi_umum->result() AS $ifu) {
                        $gambar = "";
                        if ( $ifu->foto ) {

                          $gambar = base_url('assets/Gambar/Upload/Informasi/'. $ifu->foto);
                        } else {
                          // default
                          $gambar = base_url('assets/Gambar/Website/default_information_null.png');
                        }
                    ?>

                    <tr>
                        <td>
                          <div class="row">
                            <div class="col-md-3">
                            <img src="<?php echo $gambar ?>" alt="" style="width: 100px; border: 1.5px solid #e0e0e0; border-radius: 5px">
                            </div>
                            <div class="col-md-9">
                              <label for="" style="font-size: 18px;"><?php echo ucfirst($ifu->nama_informasi) ?></label> <br>
                              <small>"<?php echo $ifu->deskripsi_informasi ?>"</small> <br><hr style="margin: 5px">
                              <label style="font-size: 13px"><i class="far fa-calendar-alt"></i> <?php echo $ifu->created_at ?> <span class="badge badge-danger"><?php echo $ifu->status ?></span> </label>  
                            </div>
                          </div>
                        </td>
                        <td>
                          <br>
                          <small>Ubah Informasi Umum</small><br>
                          <a href="<?= base_url() . 'alumni/informasi_umum/edit/'. $ifu->id_general?>" class="btn btn-sm btn-warning">Sunting</a>
                          &nbsp;
                          <a href="<?= base_url() . 'alumni/informasi_umum/onDelete/'. $ifu->id_general?>" class="btn btn-sm btn-warning">Hapus</a>
                        </td>
                    </tr>
                    <?php  
                      }// end foreach

                      }else { // end if
                    ?>
                      <div class="col-md-9">
                          <div class="text-center">
                            <img style="width: 250px" src="<?= base_url('assets/Gambar/Website/default_information_null.png')?>">
                            <h4 style="margin: 5px">Belum ada Informasi Umum</h4>
                            <small>Masukkan Informasi Umum yang akan datang......</small> <br><br>
                          </div>
                      </div>
                    <?php 
                    }
                    ?>
                  </table>
                    
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
</body>
</html>
