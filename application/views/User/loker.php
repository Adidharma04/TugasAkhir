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
    <div class="breadcumb-area bg-img"  style="background-image: url(<?php echo base_url().'assets/Gambar/Website/Dashboard/bgloker.jpg';?>);">
        <div class="bradcumbContent">
            <h2>Sharing Lowongan Pekerjaan</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Top Popular Courses Area Start ##### -->
    <div class="top-popular-courses-area mt-50 section-padding-100-70">
        <div class="container">
            <div class="row">
                <?php $no = 1; foreach ($loker as $job) : ?>
                <?php if ($job->status == "accept") : ?>
                    <div class="col-12 col-lg-6">
                        <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                            <div class="popular-course-content">
                                <h5><?= $job->nama_pekerjaan ?></h5>
                                <span><?= $job->alamat ?>  |  Ditambahkan pada <?= date('d F Y', strtotime($job->created_at)) ?></span>
                                <p><?= $job->deskripsi_pekerjaan ?></p>
                            </div>
                            <div class="popular-course-thumb bg-img" style="background-image: url(
                                <?php if($job->foto == "") : ?>
                                <?= base_url('assets/Gambar/Website/default_job.png') ?>
                                <?php else : ?>
                                    <?= base_url('assets/Gambar/Upload/loker/') . $job->foto ?>
                                <?php endif?>);"></div>
                        </div>
                    </div>
                    
                <?php endif ?>
                <!-- Single Top Popular Course -->
                
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <div class="call-to-action-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content d-flex align-items-center justify-content-between flex-wrap">
                        <h3>Ingin menambakan informasi lowongan pekerjaan ? Klik disini</h3>
                        <a href="<?= base_url("Alumni/sharing_loker/tambah")?>" class="btn academy-btn">More!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Course Area End ##### -->       
    <!-- <footer> -->
    <?php $this->load->view('Template/User/footer')?>
</body>

</html>