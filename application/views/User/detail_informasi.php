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
    <div class="breadcumb-area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            <h2>Detail Informasi</h2>
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
                            <?php foreach ($informasi_umum as $ig) : ?>
                                <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="300ms">
                                    <!-- Post Thumb -->
                                    <div class="blog-post-thumb mb-50">
                                    <img src="<?= base_url('assets/images/berita/') . $ig->foto ?>" alt="" style="width:600px; height:400px;">
                                    </div>
                                    <!-- Post Title -->
                                    <a class="post-title"><?= $ig->nama_informasi ?></a>
                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                    <span> Ditambahkan pada |  <?= date('d F Y', strtotime($ig->created_at)) ?></span>
                                    </div>
                                    <!-- Post Excerpt -->
                                    <p><?= $ig->deskripsi_informasi ?></p>
                                </div>
                            </div>

                <div class="col-12 col-md-4">
                    <div class="academy-blog-sidebar">
                        <!-- Blog Post Widget -->
                        <div class="blog-post-search-widget mb-30">
                            <form action="#" method="post">
                                <input type="search" name="search" id="Search" placeholder="Search">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>

                        <!-- Blog Post Catagories -->
                        <div class="blog-post-categories mb-30">
                            <h5>Categories</h5>
                            <ul>
                                <li><a href="#">Courses</a></li>
                                <li><a href="#">Education</a></li>
                                <li><a href="#">Teachers</a></li>
                                <li><a href="#">Uncategorized</a></li>
                            </ul>
                        </div>

                        <!-- Latest Blog Posts Area -->
                        <div class="latest-blog-posts mb-30">
                            <h5>Latest Posts</h5>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex mb-30">
                                <div class="latest-blog-post-thumb">
                                    <img src="img/blog-img/lb-1.jpg" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="#" class="post-title">
                                        <h6>New Courses for you</h6>
                                    </a>
                                    <a href="#" class="post-date">March 18, 2018</a>
                                </div>
                            </div>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex mb-30">
                                <div class="latest-blog-post-thumb">
                                    <img src="img/blog-img/lb-2.jpg" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="#" class="post-title">
                                        <h6>A great way to start</h6>
                                    </a>
                                    <a href="#" class="post-date">March 18, 2018</a>
                                </div>
                            </div>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex mb-30">
                                <div class="latest-blog-post-thumb">
                                    <img src="img/blog-img/lb-3.jpg" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="#" class="post-title">
                                        <h6>New Courses for you</h6>
                                    </a>
                                    <a href="#" class="post-date">March 18, 2018</a>
                                </div>
                            </div>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex">
                                <div class="latest-blog-post-thumb">
                                    <img src="img/blog-img/lb-4.jpg" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="#" class="post-title">
                                        <h6>Start your training</h6>
                                    </a>
                                    <a href="#" class="post-date">March 18, 2018</a>
                                </div>
                            </div>
                        </div>

                        <!-- Add Widget -->
                        <div class="add-widget">
                            <a href="#"><img src="img/blog-img/add.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->    
    <!-- <footer> -->
    <?php $this->load->view('Template/User/footer')?>
</body>

</html>