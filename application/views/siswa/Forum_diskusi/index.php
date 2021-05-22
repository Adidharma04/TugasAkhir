
<?php

$topik_aktif = "keseluruhan";

if ($this->input->get('tipe')) {

    $topik_aktif = $this->input->get('tipe');
}

?>
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
            <h2>Forum Diskusi</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.card -->
            <?php echo $this->session->flashdata('msg') ?>

            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">Forum Diskusi</h3>
                        <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link <?php if ($topik_aktif == "keseluruhan") echo 'active'; ?>" href="?tipe=keseluruhan">Semua Forum Diskusi</a></li>

                            <?php foreach ($topik->result_array() as $row) : ?>
                                <li class="nav-item"><a class="nav-link <?php if ($topik_aktif == $row['nama']) echo 'active'; ?>" href="?tipe=<?php echo $row['nama'] ?>"><?php echo $row['nama'] ?></a></li>
                            <?php endforeach; ?>

                        </ul>
                    </div><!-- /.card-header -->
                    <br>
                    
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active">

                                <?php

                                $id_profile = $this->session->userdata('sess_id_profile');
                                $level      = $this->session->userdata('sess_level');
                                ?>

                                <?php

                                $nilaiyangmuncul = array();

                                // filter 
                                foreach ($forum->result_array() as $rowF) {

                                    if ($topik_aktif == "keseluruhan") {

                                        array_push($nilaiyangmuncul, $rowF);
                                    } else if ($rowF['nama'] == $topik_aktif) {

                                        array_push($nilaiyangmuncul, $rowF);
                                    }
                                }

                                foreach ($nilaiyangmuncul as $row) { ?>
                                    <a href="<?php echo base_url('siswa/forum_diskusi/discuss/' . $row['id_forum']) ?>">
                                        <div class="card" style="padding: 5px">
                                            <div class="row">

                                                <div class="col-md-9">
                                                    <div for="" style="font-weight: bold; color: #000">
                                                        <?php echo $row['nama_forum'] ?>
                                                    </div>

                                                    <div class="text-sm text-muted" style="margin: 0px">
                                                        <marquee behavior="" direction="">Forum dibuka pada <?php echo date('d F Y H.i A', strtotime($row['tanggal_forum'])) ?> &emsp;|&emsp; dibuat oleh <label for=""><?php echo $row['username'] ?></label></marquee>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div>

                                                        <?php

                                                        $color = "badge badge-primary";

                                                        if ($row['id_topik'] != 1) {

                                                            if (($row['id_topik'] % 2) == 0) {

                                                                $color = "badge badge-warning";
                                                            }
                                                            if (($row['id_topik'] % 3) == 0) {

                                                                $color = "badge badge-info";
                                                            }
                                                            if (($row['id_topik'] % 4) == 0) {

                                                                $color = "badge badge-success";
                                                            }
                                                        }
                                                        ?>

                                                        <span for="" class="<?php echo $color ?>"><?php echo $row['nama'] ?></span><br>
                                                        <small class="text-muted">Terdapat Komen</small>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- ./card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
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