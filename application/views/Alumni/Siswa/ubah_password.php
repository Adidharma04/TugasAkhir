
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ubah Kata Sandi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard_admin')?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Kata Sandi </li>
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
            <div class="col-md-8 ">
                <?php echo $this->session->flashdata('msg') ?>
                <div class="card">
                    <div class="card-body">


                        <div class="row">
                            <div class="col-md-5 text-center">
                              <img src="<?= base_url().'assets/Gambar/Website/default_password_null.png';?>" style="width:100%;">
                                <h5 style="margin: 2px">Keamanan</h5>
                                <label for="">Mengubah kata sandi lama</label>
                            </div>
                            <div class="col-md-7">
                            
                                <h5>Form</h5>

                                <form action="<?php echo base_url('alumni/siswa/prosesubahpassword') ?>" method="POST">
                                
                                
                                
                                    <div class="form-group">
                                        <label>Kata Sandi Lama</label>
                                        <input type="text" name="old_password" class="form-control" placeholder="Masukkan kata sandi lama . . " required="" />
                                        <small>Berisi kata sandi lama anda</small>
                                    </div>



                                    <div class="form-group">
                                        <label>Kata Sandi Baru</label>
                                        <input type="text" name="new_password" class="form-control" placeholder="Masukkan kata sandi baru . . " required="" />
                                        <small>Berisi kata sandi baru anda</small>
                                    </div>


                                    <div class="form-group text-right">
                                        <button type="reset" class="btn btn-default btn-sm">Reset Form</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Simpan dan Perbarui</button>
                                    </div>
                                
                                
                                
                                </form>
                            
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
      </div><!-- /.container-fluid -->
<br><br>
