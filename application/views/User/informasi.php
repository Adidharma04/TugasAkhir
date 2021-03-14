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
     <div class="breadcumb-area bg-img"  style="background-image: url(<?php echo base_url().'assets/Gambar/Website/Dashboard/bg-4.jpg';?>);">
        <div class="bradcumbContent">
            <h2>Informasi</h2>
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
                                        <img src="<?php echo base_url().'assets/Gambar/Website/Dashboard/snmptn.jpg';?>" alt="">
                                    </div>
                                    <!-- Post Title -->
                                    <a href="#" class="post-title">SNMPTN</a>
                                    <!-- Post Excerpt -->
                                    <p>Seleksi Nasional Masuk Perguruan Tinggi Negeri atau biasa disingkat SNMPTN maupun 
                                    SNMPTN Premium adalah salah satu bentuk jalur seleksi penerimaan mahasiswa untuk 
                                    memasuki perguruan tinggi negeri yang dilaksanakan serentak seluruh Indonesia, 
                                    selain seleksi mandiri serta Seleksi Bersama Masuk Perguruan Tinggi Negeri.</p>
                                </div>
                            </div>

                            <!-- Single Blog Start -->
                            <div class="col-12">
                                <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="400ms">
                                    <!-- Post Thumb -->
                                    <div class="blog-post-thumb mb-50">
                                        <img src="<?php echo base_url().'assets/Gambar/Website/Dashboard/sbmptn.jpg';?>" alt="">
                                    </div>
                                    <!-- Post Title -->
                                    <a href="#" class="post-title">SBMPTN</a>
                                    <!-- Post Excerpt -->
                                    <p>Seleksi Bersama perguruan Tinggi Negeri atau disingkat SBMPTN merupakan seleksi bersama dalam penerimaan 
                                    mahasiswa baru di lingkungan perguruan tinggi negeri menggunakan pola ujian tertulis secara nasional yang 
                                    selama ini telah menunjukkan berbagai keuntungan dan keunggulan, baik bagi calon mahasiswa, 
                                    perguruan tinggi negeri, maupun kepentingan nasional. Bagi calon mahasiswa, ujian tertulis sangat 
                                    menguntungkan karena lebih efisien, murah, dan fleksibel karena adanya mekanisme lintas wilayah.</p>
                                </div>
                            </div>

                            <!-- Single Blog Start -->
                            <div class="col-12">
                                <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="500ms">
                                   <!-- Post Thumb -->
                                   <div class="blog-post-thumb mb-50">
                                        <img src="<?php echo base_url().'assets/Gambar/Website/Dashboard/beasiswa.jpg';?>" alt="">
                                    </div>
                                    <!-- Post Title -->
                                    <a href="#" class="post-title">Beasiswa Pendidikan Pemuda Indonesia</a>
                                    <!-- Post Excerpt -->
                                    <p>1. Untuk kategori beasiswa berprestasi, siswa mendapatkan subsidi biaya pendidikan secara tunai sebesar Rp 300.000,00 per bulan dalam 1 semester.<br>
                                    2. Untuk kategori beasiswa kurang mampu, siswa mendapatkan uang tunai sebesar Rp 300.000,00 per bulan dalam 1 semester. Memperoleh kesempatan menjadi Duta Event Hunter Indonesia.<br>
                                    3. Kelas pengembangan bernama Serial Class Skill Development (Leadership Class, Public Speaking Class, dan Personal Branding Class).<br>
                                    4. Sertifikat Serial Class Skill Development.<br>
                                    5. Seragam Eksklusif Beasiswa PPI.<br>
                                    6. Goodie Bag Eksklusif Beasiswa PPI.<br>
                                    7. Berkesempatan mengikuti program Event Hunter Indonesia baik nasional maupun internasional.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Pagination Area Start -->
                    <div class="academy-pagination-area wow fadeInUp" data-wow-delay="400ms">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="academy-blog-sidebar">
                        <!-- Blog Post Widget -->
                        <div class="blog-post-search-widget mb-30">
                            <form action="#" method="post">
                                <input type="search" name="search more information" id="Search" placeholder="Search">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>

                        <!-- Blog Post Catagories -->
                        <div class="blog-post-categories mb-30">
                            <h5>Kategori</h5>
                            <ul>
                                <li><a href="#">Info Karir</a></li>
                                <li><a href="#">Info SBMPTN</a></li>
                                <li><a href="#">Info Beasiswa</a></li>
                                <li><a href="#">Training&Workshop</a></li>
                            </ul>
                        </div>

                        <!-- Latest Blog Posts Area -->
                        <div class="latest-blog-posts mb-30">
                            <h5>Informasi Terbaru</h5>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex mb-30">
                                <div class="latest-blog-post-thumb">
                                    <img src="<?php echo base_url().'assets/Gambar/Website/Dashboard/bea1.jpeg';?>" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="#" class="post-title">
                                        <h6>Program Beasiswa Gerakan Indonesia</h6>
                                    </a>
                                    <a href="#" class="post-date">March 18, 2021</a>
                                </div>
                            </div>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex mb-30">
                                <div class="latest-blog-post-thumb">
                                    <img src="<?php echo base_url().'assets/Gambar/Website/Dashboard/bea2.jpeg';?>" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="#" class="post-title">
                                        <h6>Beasiswa Mindo School</h6>
                                    </a>
                                    <a href="#" class="post-date">March 18, 2021</a>
                                </div>
                            </div>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex mb-30">
                                <div class="latest-blog-post-thumb">
                                    <img src="<?php echo base_url().'assets/Gambar/Website/Dashboard/bea3.jpeg';?>" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="#" class="post-title">
                                        <h6>Beasiswa Pasca Pandemi</h6>
                                    </a>
                                    <a href="#" class="post-date">March 18, 2021</a>
                                </div>
                            </div>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex">
                                <div class="latest-blog-post-thumb">
                                    <img src="<?php echo base_url().'assets/Gambar/Website/Dashboard/bea4.png';?>" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="#" class="post-title">
                                        <h6>Beasiswa Keguruan Lumina</h6>
                                    </a>
                                    <a href="#" class="post-date">March 18, 2021</a>
                                </div>
                            </div>
                        </div>

                        <!-- Add Widget -->
                        <div class="add-widget">
                            <a href="#"><img src="<?php echo base_url().'assets/Gambar/Website/Dashboard/infonya.jpg';?>" alt=""></a>
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