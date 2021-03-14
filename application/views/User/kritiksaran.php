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
     <div class="breadcumb-area bg-img"  style="background-image: url(<?php echo base_url().'assets/Gambar/Website/Dashboard/bgloker.jpg';?>);">
        <div class="bradcumbContent">
            <h2>Sharing Lowongan Pekerjaan</h2>
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
                                        <img src="<?php echo base_url().'assets/Gambar/Website/Dashboard/contohloker1.jpg';?>" alt="">
                                    </div>
                                    <!-- Post Title -->
                                    <a href="#" class="post-title">Kementrian BUMN</a>
                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <p>By <a href="#">Ika Wahyu F</a> | <a href="#">March 14, 2021</a> | <a href="#">3 comments</a></p>
                                    </div>
                                    <!-- Post Excerpt -->
                                    <p>Proses perencanaan rekrutmen ini sudah dilakukan sejak lebih dari satu tahun lalu,
                                     dimulai dari identifikasi kebutuhan setiap BUMN, kemudian kebutuhan industri, 
                                     hingga kompetensi serta lokasi kerja.Bagi calon pelamar, terlebih dahulu membuat 
                                     akun di situs yang telah tertera di akhir berita ini.Saat mendaftar, peserta wajib memasukkan NIK KTP berdasarkan kepemilikannya.</p>
                                </div>
                            </div>

                            <!-- Single Blog Start -->
                            <div class="col-12">
                                <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="300ms">
                                    <!-- Post Thumb -->
                                    <div class="blog-post-thumb mb-50">
                                        <img src="<?php echo base_url().'assets/Gambar/Website/Dashboard/contohloker2.jpg';?>" alt="">
                                    </div>
                                    <!-- Post Title -->
                                    <a href="#" class="post-title">Dinas Perdagangan Surabaya</a>
                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <p>By <a href="#">Febri</a> | <a href="#">March 13, 2021</a> | <a href="#">6 comments</a></p>
                                    </div>
                                    <!-- Post Excerpt -->
                                    <p>Persyaratan <br>
                                    a. Pria/ Wanita
                                    b. Pendidikan minimal S1 Teknik Perencanaan Wilayah & Kota/ Planologi<br>
                                    c. Menguasai analisa perencanaan pembangunan kota<br>
                                    d. Mampu mendesain dan membuat analisa geoaspal dengan SIG secara teknis dan prosedural (dasar, lanjur, menengah)<br>
                                    e. Mampu menjabarkan konsep desain secara sistematis ke dalam kerangka acuan desain SIG berdasarkan rumusan yang telah ditentukan, baik secara lisan maupun tulisan</p>
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
                            <h5>Lokasi</h5>
                            <ul>
                                <li><a href="#">Surabaya</a></li>
                                <li><a href="#">Jakarta</a></li>
                                <li><a href="#">Sidoarjo</a></li>
                                <li><a href="#">Gresik</a></li>
                            </ul>
                        </div>

                        <!-- Latest Blog Posts Area -->
                        <div class="blog-post-categories mb-30">
                            <h5>Bidang Industri</h5>
                            <ul>
                                <li><a href="#">Administrasi</a></li>
                                <li><a href="#">Apoteker</a></li>
                                <li><a href="#">Perbankan</a></li>
                                <li><a href="#">Programmer</a></li>
                            </ul>
                        </div>

                        <!-- Add Widget -->
                        <div class="add-widget">
                            <a href="#"><img src="<?php echo base_url().'assets/Gambar/Website/Dashboard/loker.jpg';?>" alt=""></a>
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