<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="icon" href="<?php echo base_url().'assets/Gambar/Website/Title_SMA.png';?>">

	<!-- Logo -->
    <link rel="icon" href="<?= base_url().'assets/Gambar/Website/Title_SMA.png';?>">

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= base_url().'assets/Template/Registrasi/fonts/material-icon/css/material-design-iconic-font.min.css';?>">

    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url().'assets/Template/Login/css/style.css';?>">

   
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<div class="main">
            <!-- Sign up form -->
            <section class="signup">
                <div class="container">
                    <div class="signup-content">

                        <div class="signup-form">
                            <p align='center'><a href="<?php echo base_url("User/dashboard");?>"><img width="150px" src="<?= base_url().'assets/Gambar/Website/Title_SMA.png';?>"></a></p>
                            
                            <h2 class="form-title">Sign In</h2>

                            <form method="POST" class="register-form" action="login" role="form" autocomplete="off" id="index">
                            
                                <!-- Alert Berhasil Registrasi-->
                                <?php if($this->session->flashdata('pesan') == TRUE):?>
                                    <div class="alert alert-info alert-success">
                                        <a href="login" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <br>
                                        <?php echo $this->session->flashdata('pesan');?>
                                    </div>
                                <?php endif; ?>
								<!----------------------->
								<!-- Alert Tidak ada Username-->
                                <?php if($this->session->flashdata('not_username') == TRUE):?>
                                    <div class="alert alert-info alert-danger">
                                        <a href="login" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <br>
                                        <?php echo $this->session->flashdata('not_username');?>
                                    </div>
                                <?php endif; ?>
								<!----------------------->
								<!-- Alert Username Tidak Aktif-->
                                <?php if($this->session->flashdata('not_aktif') == TRUE):?>
                                    <div class="alert alert-info alert-danger">
                                        <a href="login" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <br>
                                        <?php echo $this->session->flashdata('not_aktif');?>
                                    </div>
                                <?php endif; ?>
								<!----------------------->
                                <!-- Alert Username Tidak Aktif-->
                                <?php if($this->session->flashdata('wrong_pass') == TRUE):?>
                                    <div class="alert alert-info alert-danger">
                                        <a href="login" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <br>
                                        <?php echo $this->session->flashdata('wrong_pass');?>
                                    </div>
                                <?php endif; ?>
								<!----------------------->

                                <div class="form-group">
                                    <label for="username"><i class="zmdi zmdi-account material-icons-name"></i><font color="red" size="4px">*</font> </label>
                                    <input type="text" name="username" id="username" placeholder="Username" value="<?= set_value('username');?>"/>                                    
                                    <?= form_error('username','<small class="text-danger">','</small>');?>
                                </div>
                                <div class="form-group">
                                    <label for="pass"><i class="zmdi zmdi-lock"></i><font color="red" size="4px">*</font> </label>
                                    <input type="password" name="password" id="myInput1" placeholder="Password" value="<?= set_value('password');?>" />
                                    <?= form_error('password','<small class="text-danger">','</small>');?>
                                </div>

                                <div class="form-group ">
                                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" onclick="myFunction()" />
                                        <label for="agree-term" class="label-agree-term"><span><span></span></span>Show Password</label>
                                </div>
                                <div class="form-group ">
                                    <br>
                                    <input type="submit" name="login" id="login" class="form-submit" value="Login"/>
                                    
									<br>
									<br>
                                    <p>Don't have account ?<a href="<?= base_url().'Admin/register';?>" class="signup-image-link"> Create Account</a></p>
                                </div>

                            </form>
                        </div>
                    

                    </div>
                </div>
            </section>
        </div>
</body>
<!-- JS -->
<script src="<?= base_url().'assets/Template/Login/vendor/jquery/jquery.min.js';?>"></script>
    <script src="<?= base_url().'assets/Template/Login/js/main.js';?>"></script>
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