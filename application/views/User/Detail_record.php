<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

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



    <style>
       :root{
    --color1: #FD8F33;
    --color2: #0DC8AB;
    --color3: #05B0DE;
    --color4: #8E7CCC;
}
.main-timeline{
    font-family: 'Source Sans Pro', sans-serif;
    position: relative;
}
.main-timeline:after{
    content: '';
    display: block;
    clear: both;
}
.main-timeline .timeline{
    width: 50.1%;
    padding: 20px 0 20px 100px;
    float: right;
    position: relative;
    z-index: 1;
}
.main-timeline .timeline:before,
.main-timeline .timeline:after{
    content: '';
    background: var(--color1);
    height: 100%;
    width: 28px;
    position: absolute;
    left: -11px;
    top: 0;
}
.main-timeline .timeline:after{
    background: var(--color1);
    height: 18px;
    width: 200px;
    box-shadow: 0 0 10px -5px #000;
    transform:  translateY(-50%);
    top: 50%;
    left: -90px;
}
.main-timeline .timeline-content{
    color: #517d82;
    background-color: var(--color1);
    padding: 0 0 0 80px;
    box-shadow: 0 0 20px -10px #000;
    border-radius: 10px;
    display: block;
}
.main-timeline .timeline-content:hover{
    color: #517d82;
    text-decoration: none;
}
.main-timeline .timeline-icon{
    color: #fff;
    background-color: var(--color1);
    font-size: 35px;
    text-align: center;
    line-height: 62px;
    height: 60px;
    width: 60px;
    border-radius: 50%;
    transform: translateY(-50%);
    position: absolute;
    left: -100px;
    top: 50%;
    z-index: 1;
}
.main-timeline .timeline-year{
    color: #517d82;
    background-color: #fff;
    font-size: 40px;
    font-weight: 600;
    text-align: center;
    line-height: 93px;
    height: 113px;
    width: 113px;
    border: 6px solid var(--color1);
    box-shadow: 0 0 10px -5px #000;
    border-radius: 50%;
    transform: translateY(-50%);
    position: absolute;
    left: 50px;
    top: 50%;
    z-index: 1;
}
.main-timeline .inner-content{
    background-color: #fff;
    padding: 10px;
}
.main-timeline .title{
    color: var(--color1);
    font-size: 22px;
    font-weight: 600;
    margin: 0 0 5px 0;
}
.main-timeline .description{
    font-size: 14px;
    letter-spacing: 1px;
    margin: 0;
}
.main-timeline .timeline:nth-child(even){
    padding: 20px 100px 20px 0;
    float: left;
}
.main-timeline .timeline:nth-child(even):before{
    left: auto;
    right: -14.5px;
}
.main-timeline .timeline:nth-child(even):after{
    left: auto;
    right: -90px;
}
.main-timeline .timeline:nth-child(even) .timeline-content{ padding: 0 80px 0 0; }
.main-timeline .timeline:nth-child(even) .timeline-icon{
    left: auto;
    right: -100px;
}
.main-timeline .timeline:nth-child(even) .timeline-year{
    left: auto;
    right: 50px;
}
.main-timeline .timeline:nth-child(4n+2):before,
.main-timeline .timeline:nth-child(4n+2):after{
    background: var(--color2);
}
.main-timeline .timeline:nth-child(4n+2) .timeline-content,
.main-timeline .timeline:nth-child(4n+2) .timeline-icon{
    background-color: var(--color2);
}
.main-timeline .timeline:nth-child(4n+2) .timeline-year{ border-color: var(--color2); }
.main-timeline .timeline:nth-child(4n+2) .title{ color: var(--color2); }
.main-timeline .timeline:nth-child(4n+3):before,
.main-timeline .timeline:nth-child(4n+3):after{
    background: var(--color3);
}
.main-timeline .timeline:nth-child(4n+3) .timeline-content,
.main-timeline .timeline:nth-child(4n+3) .timeline-icon{
    background-color: var(--color3);
}
.main-timeline .timeline:nth-child(4n+3) .timeline-year{ border-color: var(--color3); }
.main-timeline .timeline:nth-child(4n+3) .title{ color: var(--color3); }
.main-timeline .timeline:nth-child(4n+4):before,
.main-timeline .timeline:nth-child(4n+4):after{
    background: var(--color4);
}
.main-timeline .timeline:nth-child(4n+4) .timeline-content,
.main-timeline .timeline:nth-child(4n+4) .timeline-icon{
    background-color: var(--color4);
}
.main-timeline .timeline:nth-child(4n+4) .timeline-year{ border-color: var(--color4); }
.main-timeline .timeline:nth-child(4n+4) .title{ color: var(--color4); }
@media only screen and (max-width:1200px){
    .main-timeline .timeline:before{ left: -12.5px; }
    .main-timeline .timeline:nth-child(even):before{ right: -14px; }
}
@media only screen and (max-width:990px){
    .main-timeline .timeline:before{ left: -12.5px; }
}
@media only screen and (max-width:767px){
    .main-timeline .timeline,
    .main-timeline .timeline:nth-child(even){
        width: 100%;
        padding: 20px 0 20px 37px;
    }
    .main-timeline .timeline:before{ left: 0; }
    .main-timeline .timeline:nth-child(even):before{
        right: auto;
        left: 0;
    }
    .main-timeline .timeline:after,
    .main-timeline .timeline:nth-child(even) .timeline:after{
        display: none;
    }
    .main-timeline .timeline-icon,
    .main-timeline .timeline:nth-child(even) .timeline-icon{
        left: 0;
        display: none;
    }
    .main-timeline .timeline-year,
    .main-timeline .timeline:nth-child(even) .timeline-year{
        height: 75px;
        width: 75px;
        line-height: 60px;
        font-size: 25px;
        left: 1px;
    }
    .main-timeline .timeline-content,
    .main-timeline .timeline:nth-child(even) .timeline-content{
        padding: 0 0 0 40px;
    }
}
    </style>
</head>

<body>
    <!-- ##### Preloader ##### -->
    <!-- <div id="preloader">
        <i class="circle-preloader"></i>
    </div> -->

    <!-- <Header> -->
    <?php $this->load->view('Template/user/navbar') ?>

    <!-- <Body> -->
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img" style="background-image: url(<?php echo base_url() . 'assets/Gambar/Website/Dashboard/bgkuliah.jpg'; ?>);">
        <div class="bradcumbContent">
            <h2>Track Record</h2>
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
                        <h3>Detail Rekam Jejak Alumni</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Us Area End ##### -->
            <div class="row">
            <div class="col-md-12">
                <div class="main-timeline">
                <?php if (count($tracer) > 0) { ?>

                <?php foreach ($tracer as $item) {


                    $nama = "";
                    $caption = "";
                    $deskripsi = "";
                    $tanggal_pembuatan = "";


                    // style 
                    $color = "";
                    $icon  = "";


                    // menampung segala jenis id baik {kerja, kuliah}
                    $id_tracer = "";


                    if ($item['tipe_tracer'] == "kerja") {

                        $nama    = $item['data']['nama_perusahaan'];
                        $caption = "Bekerja";

                        $deskripsi = "Bekerja sebagai  <b>" . $item['data']['jabatan'] . "</b> pada <b>" . $item['data']['tahun_masuk'] . "</b> dengan alamat <b>" . ucfirst($item['data']['alamat_perusahaan'] . '</b>');
                        $tanggal_pembuatan = date('d M Y H.i A', strtotime($item['data']['created_at']));

                        $color = "bg-blue";
                        $icon  = "fa fa-briefcase";


                        // replace id
                        $id_tracer = $item['data']['id_kerja'];
                    } else if ($item['tipe_tracer'] == "kuliah") {

                        $nama = $item['data']['nama_kampus'];
                        $caption = "Pendidikan";

                        $deskripsi = "Kuliah di <b>" . ucfirst($nama) . "</b> jurusan <b>" . $item['data']['jurusan'] ."</b> pada tahun <b>" . $item['data']['tahun_masuk'] . '</b> dengan keahlian atau program studi <b>' . $item['data']['program_studi'] . '</b> Diterima jalur';

                        $tanggal_pembuatan = date('d M Y H.i A', strtotime($item['data']['created_at']));

                        $color = "bg-yellow";
                        $icon = "fa fa-graduation-cap";

                        // replace id
                        $id_tracer = $item['data']['id_kuliah'];
                    }
                    ?>
                    <div class="timeline">
                        <a href="" class="timeline-content">
                            <div class="timeline-icon">
                                <i class="fa <?php echo $icon . ' ' . $color ?>"></i>
                            </div>
                            <div class="timeline-year"><i class="fa <?php echo $icon . ' ' . $color ?>"></i></div>
                            <div class="inner-content">
                                <h3 class="title"> <?php echo $caption ?> - di  <?php echo ucfirst($nama) ?></h3>
                                <?php echo $deskripsi ?>
                                <?php if ($item['tipe_tracer'] == "kuliah") { ?>
                                <label class="badge badge-success"><?php echo ucfirst($item['data']['jalur_penerimaan']) ?></label>
                                <?php } ?>
                            </div>
                        </a>
                    </div>
                    <?php } // end foreach 
                    ?>
                    <?php } ?>
                </div>
                <br>
            </div>
            </div>
    <!-- <footer> -->
    <?php $this->load->view('Template/user/footer') ?>
</body>

</html>