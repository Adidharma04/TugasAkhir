<!DOCTYPE html>
<html lang="en">
    <head>

    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url().'assets/Template/User/academy/style.css';?>">
    <link rel="icon" href="<?php echo base_url().'assets/Gambar/Website/Title_SMA.png';?>">
        <script language='JavaScript'>
            var txt = " Tracer Study - Smanis";
            var speed = 200;
            var refresh = null;
            function action() {
                document.title = txt;
                txt = txt.substring(1, txt.length) + txt.charAt(0);
                refresh = setTimeout("action()", speed);
            }
            action();
        </script>
</head>
<body>
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>

    <!-- <Header> -->
    <?php $this->load->view('Template/user/navbar')?>

    <!-- <Body> -->
    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
            <div class="hero-slides owl-carousel">

                <!-- Single Hero Slide -->
                <div class="single-hero-slide bg-img" style="background-image: url(<?php echo base_url().'assets/Gambar/Website/Dashboard/home.jpg';?>);">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="hero-slides-content">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Hero Slide -->
                <div class="single-hero-slide bg-img" style="background-image: url(<?php echo base_url().'assets/Gambar/Website/Dashboard/home2.jpg';?>);">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="hero-slides-content">
                                    <h4 data-animation="fadeInUp" data-delay="100ms">Explore more info here</h4>
                                    <h2 data-animation="fadeInUp" data-delay="400ms">Welcome to  <br>Smanis Tracer Study</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- ##### Hero Area End ##### -->
    <!-- ##### Top Feature Area Start ##### -->
    <div class="top-features-area wow fadeInUp" data-wow-delay="300ms">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="features-content">
                        <div class="row no-gutters">
                            <!-- Single Top Features -->
                            <div class="col-12 col-md-4">
                                <div class="single-top-features d-flex align-items-center justify-content-center">
                                    <!-- <img src="<?php echo base_url().'assets/Gambar/Website/Dashboard/logo1.png';?>" style="width:100px; height:100px;"></img> -->
                                    <h5>Bekerja</h5>
                                </div>
                            </div>
                            <!-- Single Top Features -->
                            <div class="col-12 col-md-4">
                                <div class="single-top-features d-flex align-items-center justify-content-center">
                                <!-- <img src="<?php echo base_url().'assets/Gambar/Website/Dashboard/logo2.png';?>" style="width:100px; height:100px;"></img> -->
                                    <h5>Kuliah</h5>
                                </div>
                            </div>
                            <!-- Single Top Features -->
                            <div class="col-12 col-md-4">
                                <div class="single-top-features d-flex align-items-center justify-content-center">
                                <!-- <img src="<?php echo base_url().'assets/Gambar/Website/Dashboard/logo3.png';?>" style="width:80px; height:80px;"></img> -->
                                    <h5>Lainnya</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Top Feature Area End ##### --> 
    <!-- ##### Course Area Start ##### -->
    <div class="academy-courses-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Single Course Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <div class="course-icon">
                            <i class="icon-id-card"></i>
                        </div>
                        <div class="course-content">
                            <p>Mempermudah alumni saling berkomunikasi</p>
                        </div>
                    </div>
                </div>
                <!-- Single Course Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                        <div class="course-icon">
                            <i class="icon-worldwide"></i>
                        </div>
                        <div class="course-content">
                            <p>Mempermudah alumni berbagi informasi</p>
                        </div>
                    </div>
                </div>
                <!-- Single Course Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <div class="course-icon">
                            <i class="icon-map"></i>
                        </div>
                        <div class="course-content">
                            <p>Mempermudah alumni berbagi pengalaman kerja</p>
                        </div>
                    </div>
                </div>
                <!-- Single Course Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="600ms">
                        <div class="course-icon">
                            <i class="icon-like"></i>
                        </div>
                        <div class="course-content">
                            <p>Mempermudah alumni berbagi informasi mengenai perkuliahan</p>
                        </div>
                    </div>
                </div>
                <!-- Single Course Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="700ms">
                        <div class="course-icon">
                            <i class="icon-responsive"></i>
                        </div>
                        <div class="course-content">
                            <p>Mengetahui kegiatan yang diadakan alumni</p>
                        </div>
                    </div>
                </div>
                <!-- Single Course Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="800ms">
                        <div class="course-icon">
                            <i class="icon-message"></i>
                        </div>
                        <div class="course-content">
                            <p>Meningkatkan akreditasi sekolah</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Course Area End ##### -->       
    <!-- <footer> -->
    <?php $this->load->view('Template/user/footer')?>
</body>

</html>