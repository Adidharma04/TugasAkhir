<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/Template/User/academy/style.css'; ?>">
    <link rel="icon" href="<?php echo base_url() . 'assets/Gambar/Website/Title_SMA.png'; ?>">
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
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>

    <!-- <Header> -->
    <?php $this->load->view('Template/User/navbar') ?>

    <!-- <Body> -->
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img" style="background-image: url(<?php echo base_url() . 'assets/Gambar/Website/Dashboard/breadcumb.jpg'; ?>);">
        <div class="bradcumbContent">
            <h2>Detail Sharing Lowongan Pekerjaan</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area mt-50 section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="academy-blog-posts">
                        <div class="row">
                            <!-- Single Blog Start -->
                            <div class="col-12">
                                <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="300ms">
                                    <!-- Post Thumb -->
                                    <div class="blog-post-thumb mb-50">
                                        <img src="
                                    <?php if ($loker->foto == "") : ?>
                                        <?= base_url('assets/Gambar/Website/default_loker_null.png') ?>
                                    <?php else : ?>
                                    <?= base_url('assets/Gambar/Upload/Loker/') . $loker->foto ?>
                                    <?php endif ?>
                                    " alt="" style="width:600px; height:500px;">
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <!-- Post Title -->
                                            <a class="post-title"><?= $loker->nama_pekerjaan ?></a>
                                            <!-- Post Meta -->
                                            <div class="post-meta">
                                                <span> Ditambahkan pada | <?= date('d F Y', strtotime($loker->created_at)) ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <span class="fa-li"><i class="fas fa-lg fa-paperclip fa-1x"></i> </span>
                                            <b><h6>Tautan</h6></b>
                                            <?php if ($loker->berkas == "") : ?>
                                                <small>Tidak tersedia</small>
                                            <?php else : ?>
                                                <span align="justify">
                                                    <p><a href="<?= base_url('assets/Gambar/Upload/Loker/') . $loker->berkas ?>"><?= $loker->berkas ?></a> </p>
                                                </span>
                                            <?php endif ?>
                                        </div>
                                    </div>

                                    <!-- Post Excerpt -->
                                    <p><?= $loker->deskripsi_pekerjaan ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- Add Widget -->
                        <div class="add-widget">
                            <a href="#"><img src="img/blog-img/add.png" alt=""></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="academy-blog-sidebar">
                        <!-- Blog Post Widget -->

                        <!-- Blog Post Catagories -->
                        <div class="blog-post-categories mb-30">
                            <h5>Informasi terkait :</h5>
                            <ul>
                                <li><a href="<?php echo base_url() . 'User/dashboard_user' ?>">Beranda</a></li>
                                <li><a href="<?php echo base_url() . 'User/event_user' ?>">Event</a></li>
                                <li><a href="<?php echo base_url() . 'User/informasi_umum' ?>">Informasi Kuliah</a></li>
                                <li><a href="<?php echo base_url() . 'User/kritik_saran_user' ?>">Kritik dan Saran</a></li>
                                <li><a href="<?php echo base_url() . 'User/Record_user' ?>">Tracer</a></li>
                            </ul>
                        </div>

                        <!-- Latest Blog Posts Area -->
                        <div class="latest-blog-posts mb-30">
                            <h5>Latest Posts</h5>
                            <?php foreach( $latepost AS $row ) :
                            
                                if ( $loker->id_loker != $row->id_loker ) {
                            ?>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex mb-30">
                                <div class="latest-blog-post-thumb">
                                <a href="<?= base_url().'User/Loker/detail/'.$row->id_loker?>" class="post-title">
                                    <img src="
                                    <?php if ($loker->foto == "") : ?>
                                        <?= base_url('assets/Gambar/Website/default_loker_null.png') ?>
                                    <?php else : ?>
                                    <?= base_url('assets/Gambar/Upload/Loker/') . $loker->foto ?>
                                    <?php endif ?>
                                    " alt="" style="width:100px; height:80px;">
                                </a>
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="<?= base_url().'User/Sharing_loker/detail/'.$row->id_loker?>" class="post-title">
                                        <h6><?php echo $row->nama_pekerjaan ?></h6>
                                    </a>
                                    <a href="#" class="post-date"><?php echo date('d F, Y', strtotime( $row->created_at )) ?></a>
                                </div>
                            </div>
                            <?php } 
                                endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->
    <!-- <footer> -->
    <?php $this->load->view('Template/User/footer') ?>
</body>

</html>