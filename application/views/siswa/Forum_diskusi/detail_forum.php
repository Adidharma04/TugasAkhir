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
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img"  style="background-image: url(<?php echo base_url().'assets/Gambar/Website/Dashboard/bgloker.jpg';?>);">
        <div class="bradcumbContent">
            <h2>Forum Diskusi Detail</h2>
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
                                        <?php
                                        $gambar = "";
                                        if ($detail->foto) {

                                            $gambar = base_url('assets/Gambar/Upload/Forum/' . $detail->foto);
                                        } else {
                                            // default
                                            $gambar = base_url('assets/Gambar/Website/default_forum_null.png');
                                        }
                                        ?>
                                        <img src="<?php echo $gambar ?>" alt="">
                                    </div>
                                    <!-- Post Title -->
                                    <font color="#0436ea"><h3><?php echo $detail->nama_forum ?></h3></font>
                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <p>By <?php echo $detail->username ?> | <?php echo date('d F Y H.i A') ?> | 3 comments</p>
                                    </div>
                                    <!-- Post Excerpt -->
                                    <h3><i><u> Deskripsi Forum</u> </i></h3>
                                    <p><?php echo $detail->deskripsi ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3>Diskusi</h3>
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="academy-blog-posts">
                        <div class="row">
                            <!-- Single Blog Start -->
                            <div class="col-12">
                                <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="300ms">
                                    <!-- Post Title -->
                                    <?php foreach ($diskusi->result_array() as $row) { ?>
                                        <font color="#0436ea"><h3><?php echo $row['notes'] ?></h3></font>
                                        <!-- Post Meta -->
                                        <div class="post-meta">
                                            <p>By <?php echo $row['username'] ?> | <?php echo date('d F Y H.i A') ?> </p>
                                        </div>
                                        <hr>   
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->  

<br>
<br>
<br>
<br>
<br>
<br>
 <!-- <footer> -->
 <?php $this->load->view('Template/siswa/footer')?>
</body>

</html>