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
            <p>Deskripsi penjelasan event</p>
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
        <div class="col-md-10 offset-1">
            <div class="card card-row card-default">
            
            <div class="card-body">
                <div class="card card-light card-outline">
                <div class="card-header">
                    <h5 class="card-title">Detail Event</h5>
                    <div class="card-tools">
                      <a href="Event/tambah" class="btn btn-tool">
                      <a href="Event/tambah" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah Event Baru</a>
                      </a>
                    </div>
                </div>
                <div class="card-body">
                  
                  <table class="table" width="100%">
                    <thead>
                      <tr>
                        <th style="width: 80%">Informasi Event</th>
                        <th style="width: 20% !important">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    // button
                    $btnText = "Tambah Event";
                    $btnColor = "btn-primary";
                    
                    
                    if ( $event->num_rows() > 0 ) {

                      foreach ( $event->result() AS $evn) {

                        $gambar = "";
                        if ( $evn->foto ) {

                          $gambar = base_url('assets/Gambar/Upload/Event/'. $evn->foto);
                        } else {
                          // default
                          $gambar = base_url('assets/Gambar/Website/default_event_null.png');
                        }
                    ?>

                    <tr>
                      <td>
                        <div class="row">
                            
                            <div class="col-md-3">
                              <img src="<?php echo $gambar ?>" alt="" style="width: 100%; border: 1.5px solid #e0e0e0; border-radius: 5px">
                            </div>
                            <div class="col-md-9">
                              <label for="" style="font-size: 18px;"><?php echo ucfirst($evn->nama_event) ?></label> <br>
                              <small>"<?php echo $evn->deskripsi_event ?>"</small> <br><hr style="margin: 5px">
                              <label style="font-size: 13px"><i class="far fa-calendar-alt"></i> <?php echo $evn->tanggal_event ?> &emsp; | &emsp; <i class="fa fa-building"></i> <?php echo $evn->lokasi ?>  &emsp; | &emsp; 
                                  <?php if($evn->status=="pending"){?>
                                    <span class="badge badge-info"><?php echo $evn->status ?></span>
                                  <?php } else if($evn->status=="accept"){?>
                                    <span class="badge badge-success"><?php echo $evn->status ?></span>
                                  <?php } else if($evn->status=="decline"){?>
                                    <span class="badge badge-danger"><?php echo $evn->status ?></span>
                                  <?php }?>
                              </label>  

                            </div> 
                        </div>
                      </td>
                      <td>
                        <br>
                        <small>Ubah Informasi Event</small><br>
                        <a href="<?= base_url() . 'alumni/event/edit/'. $evn->id_event?>" class="btn btn-sm btn-warning">Sunting</a>
                        &nbsp;
                        <a href="<?= base_url() . 'alumni/event/onDelete/'. $evn->id_event?>" class="btn btn-sm btn-warning">Hapus</a>
                      </td>
                    </tr>

                    <?php 
                    
                      }// end foreach

                      } else { // end if
                      ?>
                        <div class="col-md-9">
                            <div class="text-center">
                              <img style="width: 450px" src="<?= base_url('assets/Gambar/Website/default_event_null.png')?>">
                              <h4 style="margin: 5px">Belum ada Event yang tersedia</h4>
                              <small>Masukkan Event yang akan datang......</small> <br><br>
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
