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
    <!-- <div id="preloader">
        <i class="circle-preloader"></i>
    </div> -->

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
    <section class="about-us-area mt-50 section-padding-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                        <br>
                        <span>SMANIS</span>
                        <h3>Rekam Jejak Alumni</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Us Area End ##### -->
    
    <section class="teachers-area section-padding-0-100">
    
    <div class="col-12">
</div>
<div class="col-12">
<div class="academy-cool-facts-area mb-50">
<div class="row">



<div class="col-12 col-sm-6 col-md-3">
<div class="single-cool-fact text-center">
<i class="icon-assistance"></i>
<h3><span class="counter"><?php echo $total_alumni ?></span></h3>
<p>Total Alumni</p>
</div>
</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="single-cool-fact text-center">
<i class="icon-id-card"></i>
<h3><span class="counter"><?php echo $total_kerja ?></span></h3>
<p>Kerja</p>
</div>
</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="single-cool-fact text-center">
<i class="icon-message"></i>
<h3><span class="counter"><?php echo $total_kuliah ?></span></h3>
<p>Kuliah</p>
</div>
</div>


<div class="col-12 col-sm-6 col-md-3">
<div class="single-cool-fact text-center">
<i class="icon-agenda-1"></i>
<h3><span class="counter"><?php echo $total_lainnya ?></span></h3>
<p>Lainnya</p>
</div>
</div>
</div>
</div>
</div>
    
    </section>



    <section class="teachers-area section-padding-0-100">
            
        <div class="container">
            
            <div class="row">
            
                <div class="col-12 col-sm-3">
                    <h4>Lihat Tahun Kelulusan : </h4>
                    
                </div>
            
            </div>
            
            <form method="GET">
            <div class="row">

                <div class="col-12 col-sm-3">
                    
                    <select name="tahun" class="form-control" id="">
                        
                        <option value="">Pilih tahun</option>
                        <?php 

                            $filter_tahun = $this->input->get('tahun');
                            $nama_alumni  = $this->input->get('nama');

                            $tahun_sekarang = substr(date('Y'), 2, 2);
                            for ( $i = 16; $i <=  intval($tahun_sekarang); $i++){

                                $nilai = (20).$i;
                                $status_selected = "";

                                if ( $nilai == $filter_tahun ) {

                                    $status_selected = 'selected="selected"';
                                }

                         ?>
                        <option value="<?php echo '20'.$i ?>" <?php echo $status_selected ?>><?php echo '20'.$i ?></option>

                        <?php } ?>
                    </select>
                    <small>Pilih tahun untuk memfilter kelulusan</small>
                </div>
                <div class="col-12 col-sm-3">
                    <input type="text" name="nama" class="form-control" value="<?php echo $nama_alumni ?>" placeholder="Cari nama . . .">
                </div>
                <div class="col-12 col-sm-2">
                    <a href="<?php echo base_url('User/record_user') ?>" class="btn btn-secondary"> Reset</a>
                    <button class="btn btn-primary">Lihat</button>
                </div>
            
            </div>
            </form>
        </div>
    
    </section>

    <!-- ##### Team Area Start ##### -->
    <section class="teachers-area section-padding-0-100">
        <div class="container">
            <div class="row">

                <?php 
                
                if ( $alumni->num_rows() != 0 ) { ?>    
                

                <?php
                
                
                $nomor = 1;
                foreach ( $alumni->result_array() AS $row ) :
                
                    $status_tampil = false;

                    // cek apakah user melakukan filter
                    if ( $filter_tahun ) {


                        // apakah user melakukan filter nama ?
                        if ( $nama_alumni ) {


                            // jika user melakuan filter maka pencocokan tahun lulus dengan filter tahun
                            if ( ($filter_tahun == $row['tahun_lulus']) && (strtolower($nama_alumni) == strtolower($row['nama'])) ) {

                                // jika iya : true
                                $status_tampil = true;
                            } else {

                                $status_tampil = false;

                            }

                        } else {


                            // jika user melakuan filter maka pencocokan tahun lulus dengan filter tahun
                            if ( $filter_tahun == $row['tahun_lulus'] ) {

                                // jika iya : true
                                $status_tampil = true;
                            } else {

                                $status_tampil = false;

                            }
                        }
                        
                    } else {

                         // apakah user melakukan filter nama ?
                         if ( $nama_alumni ) {


                            // jika user melakuan filter maka pencocokan tahun lulus dengan filter tahun
                            if ( (strtolower($nama_alumni) == strtolower($row['nama'])) ) {

                                // jika iya : true
                                $status_tampil = true;
                            } else {

                                $status_tampil = false;

                            }
                        } else {


                            // selalu true dikarenakan user tidak melkukan filter apapun
                            $status_tampil = true;

                        }

                    }
                    



                    // cek kondisi tampil
                    if ( $status_tampil == true ) {
                
                ?>
                <!-- Single Teachers -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-teachers-area text-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                        <!-- Thumbnail -->
                        <div class="teachers-thumbnail">

                            <?php
                            
                            
                                $foto = "";
                                if ( $row['foto'] ) {

                                    $foto = base_url('assets/Gambar/Upload/Siswa/'. $row['foto']);
                                } else {

                                    $foto = base_url('assets/Gambar/Upload/Siswa/png-clipart-professional-computer-icons-avatar-job-avatar-heroes-computer.png');
                                }
                            ?>

                            <img src="<?php echo $foto;?>" alt="" style="width: 250px; height: 300px; object-fit: cover">
                        </div>
                        <!-- Meta Info -->
                        <div class="teachers-info mt-30">
                            <h5><?php echo $row['nama'] ?></h5>
                            <span>D3 Akutansi</span><br>
                            <span>Politeknik Keuangan Negara STAN</span><br>
                            <span>Tahun Masuk : <?php echo $row['tahun_lulus'] ?></span><br>
                            <span>Tahun Lulus :2021</span><br>
                            <span>KEDINASAN</span>
                        </div>
                    </div>
                </div>

                <?php }
            
                $nomor++;
                endforeach; ?>

                <?php } else { ?>

                    <div class="col-12 col-md-12 text-center">
                    
                        <h4>Kosong</h4>
                    </div>


                <?php } ?>
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