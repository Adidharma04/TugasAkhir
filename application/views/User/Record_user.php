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
    <?php $this->load->view('Template/User/navbar')?>

    <!-- <Body> -->
     <!-- ##### Breadcumb Area Start ##### -->
     <div class="breadcumb-area bg-img" style="background-image: url(<?php echo base_url().'assets/Gambar/Website/Dashboard/bgkuliah.jpg';?>);">
        <div class="bradcumbContent">
            <h2>Track Record Kuliah</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### About Us Area Start ##### -->
    <section class="about-us-area mt-50 section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                        <span>SMANIS</span>
                        <h3>Rekam Jejak Alumni</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Us Area End ##### -->

    <!-- ##### Team Area Start ##### -->
    <section class="teachers-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <!-- Single Teachers -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-teachers-area text-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                        <!-- Thumbnail -->
                        <div class="teachers-thumbnail">
                            <img src="<?php echo base_url().'assets/Gambar/Website/Dashboard/sisca.jpg';?>" alt="">
                        </div>
                        <!-- Meta Info -->
                        <div class="teachers-info mt-30">
                            <h5>Sisca Ainun Nafisah</h5>
                            <span>D3 Akutansi</span><br>
                            <span>Politeknik Keuangan Negara STAN</span><br>
                            <span>Tahun Masuk : 2018</span><br>
                            <span>Tahun Lulus :2021</span><br>
                            <span>KEDINASAN</span>
                        </div>
                    </div>
                </div>
                <!-- Single Teachers -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-teachers-area text-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                        <!-- Thumbnail -->
                        <div class="teachers-thumbnail">
                            <img src="<?php echo base_url().'assets/Gambar/Website/Dashboard/sisca.jpg';?>" alt="">
                        </div>
                        <!-- Meta Info -->
                        <div class="teachers-info mt-30">
                            <h5>Sisca Ainun Nafisah</h5>
                            <span>D3 Akutansi</span><br>
                            <span>Politeknik Keuangan Negara STAN</span><br>
                            <span>Tahun Masuk : 2018</span><br>
                            <span>Tahun Lulus :2021</span><br>
                            <span>KEDINASAN</span>
                        </div>
                    </div>
                </div>
                <!-- Single Teachers -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-teachers-area text-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                        <!-- Thumbnail -->
                        <div class="teachers-thumbnail">
                            <img src="<?php echo base_url().'assets/Gambar/Website/Dashboard/sisca.jpg';?>" alt="">
                        </div>
                        <!-- Meta Info -->
                        <div class="teachers-info mt-30">
                            <h5>Sisca Ainun Nafisah</h5>
                            <span>D3 Akutansi</span><br>
                            <span>Politeknik Keuangan Negara STAN</span><br>
                            <span>Tahun Masuk : 2018</span><br>
                            <span>Tahun Lulus :2021</span><br>
                            <span>KEDINASAN</span>
                        </div>
                    </div>
                </div>
                <!-- Single Teachers -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-teachers-area text-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                        <!-- Thumbnail -->
                        <div class="teachers-thumbnail">
                            <img src="<?php echo base_url().'assets/Gambar/Website/Dashboard/sisca.jpg';?>" alt="">
                        </div>
                        <!-- Meta Info -->
                        <div class="teachers-info mt-30">
                            <h5>Sisca Ainun Nafisah</h5>
                            <span>D3 Akutansi</span><br>
                            <span>Politeknik Keuangan Negara STAN</span><br>
                            <span>Tahun Masuk : 2018</span><br>
                            <span>Tahun Lulus :2021</span><br>
                            <span>KEDINASAN</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="view-all text-center wow fadeInUp" data-wow-delay="800ms">
                        <a href="#" class="btn academy-btn">All Record</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->     
    <!-- <footer> -->
    <?php $this->load->view('Template/User/footer')?>
</body>

</html>