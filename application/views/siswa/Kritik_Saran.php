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
    <?php $this->load->view('Template/siswa/navbar')?>

    <!-- <Body> -->
    <div class="breadcumb-area bg-img" style="background-image: url(<?php echo base_url().'assets/Gambar/Website/Dashboard/breadcumb.jpg';?>);">
        <div class="bradcumbContent">
            <h2>Kritik dan Saran</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Top Popular Courses Area Start ##### -->
    <div class="top-popular-courses-area mt-50 section-padding-100-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                        <span>Kritik dan Saran Membangun</span>
                        <h3>Dari Alumni SMA Negeri Ploso</h3>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php $no = 1; foreach ($penilaian->result() as $pnl) : ?>
                <!-- Single Top Popular Course -->
                <div class="col-12 col-lg-6">
                    <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                        <div class="popular-course-content">
                            <span >Oleh Alumni  |  Pada : <?= date('d F Y', strtotime($pnl->created_at)) ?></span>
                            <p> Kritik :  <?= $pnl->kritik ?></p>
                            <p> Saran  : <?= $pnl->saran ?></p>
                            </div>
                    <div class="popular-course-thumb bg-img" style="background-image: url(<?php echo base_url().'assets/Gambar/Website/Dashboard/kritiksaran.png';?>);"></div>
                    </div>
                </div>
                <?php endforeach ?>
        </div>
    </div>
    <!-- ##### Top Popular Courses Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <div class="call-to-action-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content d-flex align-items-center justify-content-between flex-wrap">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Course Area End ##### -->       
    <!-- <footer> -->
    <?php $this->load->view('Template/siswa/footer')?>
</body>

</html>