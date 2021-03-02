<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="icon" href="<?php echo base_url().'assets/Gambar/Website/Title_SMA.png';?>">
	 <!-- Logo -->
	 <link rel="icon" href="<?= base_url().'assets/images/Logo/logo_utama.png';?>">
   
   <!-- Font Icon -->
   <link rel="stylesheet" href="<?= base_url().'assets/Template/Registrasi/fonts/material-icon/css/material-design-iconic-font.min.css';?>">

   <!-- Main css -->
   <link rel="stylesheet" href="<?= base_url().'assets/Template/Registrasi/css/style.css';?>">
</head>
<body>
<div class="main">
            <!-- Sign up form -->
            <section class="signup">
                <div class="container">
                    <div class="signup-content">

                        <div class="signup-form">
                                    <p><img width="100px" src="<?= base_url().'assets/Gambar/Website/Title_SMA.png';?>"></p>
                                    <p>
                                        Selamat Datang di Sistem Pencatatan Ikatan Alumni 
                                    <br>
                                    <br>
                                        Silahkan isi data kalian, sesuai dengan syarat berikut ini:
                                    <br>
                                    <br>
                                    <li> Masukkan Nama Panjang anda</li>
                                    <br>
									<li> Masukkan Email anda</li>
									<br>
                                    <li> Masukkan NIS anda</li>
                                    <br>
                                    <li> Masukkan Password 6 karakter atau lebih</li>
                                    <br>
                                        <b><font color="black" size="2px">Note : (<font color="red" size="4px">*</font>) wajib diisi</font></b>
                                    </p>
                                    <a href="<?= base_url().'Admin/login';?>" class="signup-image-link">I am already account</a>
                        </div>

                        <div class="signup-form">
                            <!-- Alert Nama Tidak Tersedia-->
                            <?php if($this->session->flashdata('not_available_nama') == TRUE):?>
                                    <div class="alert alert-info alert-danger">
                                        <a href="login" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <br>
                                        <?php echo $this->session->flashdata('not_available_nama');?>
                                    </div>
                                <?php endif; ?>
                                <!----------------------->
                                <!-- Alert Nama Tidak Tersedia-->
                                <?php if($this->session->flashdata('not_available_nis') == TRUE):?>
                                    <div class="alert alert-info alert-danger">
                                        <a href="login" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <br>
                                        <?php echo $this->session->flashdata('not_available_nis');?>
                                    </div>
                                <?php endif; ?>
                                <!----------------------->
                                <!-- Alert Nama Tidak Tersedia-->
                                <?php if($this->session->flashdata('not_alumni') == TRUE):?>
                                        <div class="alert alert-info alert-danger">
                                            <a href="login" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <br>
                                            <?php echo $this->session->flashdata('not_alumni');?>
                                        </div>
                                <?php endif; ?>
                                <!----------------------->
                            <h2 class="form-title">Sign Up</h2>
                            <form method="POST" class="register-form" action="register" role="form" autocomplete="off" id="formlogin">

                                <div class="form-group">
                                    <label for="name"><i class="zmdi zmdi-account material-icons-name"></i><font color="red" size="4px">*</font> </label>
                                    <input type="text" name="nama" id="name" placeholder="Nama" value="<?= set_value('nama');?>"/>                                    
                                    <?= form_error('nama','<small class="text-danger">','</small>');?>
                                </div>
                                <div class="form-group">
                                    <label for="email"><i class="zmdi zmdi-email"> </i> <font color="red" size="4px">*</font></label>
                                    <input type="email" name="email" id="email" placeholder="Email" value="<?= set_value('email');?>"/>
                                    <?= form_error('email','<small class="text-danger">','</small>');?>
								</div>
								<div class="form-group">
                                    <label for="no_induk"><i class="zmdi zmdi-account-box-mail"> </i> <font color="red" size="4px">*</font></label>
                                    <input type="number" name="no_induk" id="no_induk" placeholder="NIS" value="<?= set_value('no_induk');?>"/>
                                    <?= form_error('no_induk','<small class="text-danger">','</small>');?>
								</div>
								<div class="form-group">
                                    <label for="username"><i class="zmdi zmdi-account-add"> </i> <font color="red" size="4px">*</font></label>
                                    <input type="username" name="username" id="username" placeholder="Username" value="<?= set_value('username');?>"/>
                                    <?= form_error('username','<small class="text-danger">','</small>');?>
                                </div>
                                <div class="form-group">
                                    <label for="password1"><i class="zmdi zmdi-lock"></i><font color="red" size="4px">*</font> </label>
                                    <input type="password" name="password1" id="myInput1" placeholder="Password" />
                                    <?= form_error('password1','<small class="text-danger">','</small>');?>
                                </div>
                                <div class="form-group">
                                    <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i><font color="red" size="4px">*</font> </label>
                                    <input type="password" name="password2" id="myInput2" placeholder="Repeat your password" />
                                </div>


                                <div class="form-group ">
                                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" onclick="myFunction()" />
                                        <label for="agree-term" class="label-agree-term"><span><span></span></span>Show Password</label>
                                </div>
                                
                                <div class="form-group form-button">
                                    <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                                </div>
                                
                            </form>
                        </div>
          
                    </div>
                </div>
            </section>
        </div>
	
	
</body>
    <!-- JS -->
    <script src="<?= base_url().'assets/Template/Registrasi/vendor/jquery/jquery.min.js';?>"></script>
    <script src="<?= base_url().'assets/Template/Registrasi/js/main.js';?>"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("myInput1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            var y = document.getElementById("myInput2");
            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
        }
    </script> 
</html>