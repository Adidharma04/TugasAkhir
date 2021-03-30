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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/dashboard_admin')?>">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      

      <div class="container-fluid">
        
          <!-- /.row -->
          <div class="row">
            <div class="col-8">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2>Profile Akun <?php echo ucfirst($this->session->userdata('sess_level')) ?><h2>
                  <hr>
                </div>
                <div class="card-body pt-0" style="padding-right:70.7px;">
                  <div class="row">
                    
                    <div class="col-6 text-center">

                      <?php
                      
                        $img = "";
                        $sess_img = $this->session->userdata('sess_foto');

                        if ( !$sess_img == "" ) {

                          // foto default 
                          if ( $this->session->userdata('sess_gender') == "laki-laki" ) {

                            $img = base_url('assets/Gambar/Website/male.png');
                          } else {

                            $img = base_url('assets/Gambar/Website/female.png');
                          }
                        } else {

                          // terdapat foto
                          $img = base_url('assets/Gambar/Upload/siswa/'. $sess_img);
                        }
                      ?>

                        <img src="<?= $img ?>" style="width: 200px; border-radius: 5px; border: 1.5px solid #e0e0e0">

                    </div>

                    <div class="col-6">
                      <h4 class="lead"><b><?php echo ucfirst($this->session->userdata('sess_name')) ?></b></h4>
                      
                      <p class="text-muted text-sm"><b>Tanggal Lahir: </b> <?php echo ucfirst($this->session->userdata('sess_tanggal_lahir')) ?></p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building fa-1x"></i> </span><h6><b>Alamat</b><h6></li>
                          <span align="justify"> <p ><?php echo ucfirst($this->session->userdata('sess_alamat')) ?></p></span>
                          
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope fa-1x"></i> </span><h6><b>Email</b><h6></li>
                          <span align="justify"> <p ><?php echo ucfirst($this->session->userdata('sess_email')) ?></p></span>
                          
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone fa-1x"></i> </span><h6><b>No telfon</b><h6></li>
                          <span align="justify"> <p ><?php echo ucfirst($this->session->userdata('sess_telfon')) ?></p></span>
                          <br>
                      </ul>
                    </div>

                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="<?= base_url() . 'Admin/edit_profile' ?>" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> Edit Profile
                    </a>
                    <a href="<?= base_url() . 'Admin/edit_profile' ?>" class="btn btn-sm btn-primary">
                      <i class="fas fa-key"></i> Change Password
                    </a>
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
