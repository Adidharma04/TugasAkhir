<?php

    $topik_aktif = "keseluruhan";

    if ( $this->input->get('tipe') ) {

        $topik_aktif = $this->input->get('tipe');
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css' ?>">
    <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css' ?>">
    <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css' ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/dist/css/adminlte.min.css' ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Forum Diskusi jenis <?php echo $topik_aktif ?></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/dashboard_admin') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- /.card -->
                <?php echo $this->session->flashdata('msg') ?>
                <div class="row">
                    <div class="col-md-4">
                        <!-- DIRECT CHAT -->
                        <div class="card direct-chat direct-chat-warning">
                            <div class="card-header">
                                <h3 class="card-title">Topik Forum Diskusi</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages">
                                    <a href="javascript:;" data-toggle="modal" data-target="#tambah-topik" class="btn btn-primary">Tambah Topik</a>
                                    <hr>
                                    <ul>
                                        <?php foreach ($topik->result_array() as $row) : ?>
                                            <li style="border-bottom: 1px solid #e0e0e0; padding: 5px"><?php echo $row['nama'] ?> <br> <small>Pembuatan <?php echo date('d M Y H.i A', strtotime($row['created_at'])) ?></small></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div><!-- /.chat Message -->
                            </div><!-- /.card body -->

                            <!-- Modal tambah topik -->
                            <div class="modal fade" id="tambah-topik">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">

                                        <form action="<?php echo base_url('admin/forum_diskusi/prosestambah') ?>" method="POST">
                                            <div class="modal-body">
                                                <h3 style="margin: 0px">Tambah topik baru</h3>
                                                <small>Isi form topik baru dibawah ini</small> <br><br>

                                                <div class="form-group">
                                                    <label for="">Nama Topik Baru</label>
                                                    <textarea name="topik" id="" class="form-control" placeholder="Masukkan topik baru . . ." required=""></textarea>
                                                </div>

                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                                                <button class="btn btn-warning btn-sm"><i class="fa fa-power-off"></i> Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

                        </div><!-- /.direct chat -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-8">
                        <!-- Custom Tabs -->
                        <div class="card">
                            <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3">Forum Diskusi</h3>
                                <ul class="nav nav-pills ml-auto p-2">
                                    <li class="nav-item"><a class="nav-link <?php if ( $topik_aktif == "keseluruhan" ) echo 'active'; ?>" href="?tipe=keseluruhan">Semua Forum Diskusi</a></li>
                                    
                                    <?php foreach ($topik->result_array() as $row) : ?>
                                    <li class="nav-item"><a class="nav-link <?php if ( $topik_aktif == $row['nama'] ) echo 'active'; ?>" href="?tipe=<?php echo $row['nama'] ?>"><?php echo $row['nama'] ?></a></li>
                                    <?php endforeach; ?>
                                    
                                </ul>
                            </div><!-- /.card-header -->
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="<?php echo base_url('admin/Forum_diskusi/tambahForum/') ?>">
                                        <button class="btn btn-primary" style="margin-left: 20px;">
                                            Tambahkan Forum
                                        </button>
                                    </a>
                                </div>
                            </div>
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
                                            foreach ( $forum->result_array() AS $rowF ) {

                                                if ( $topik_aktif == "keseluruhan" ) {

                                                    array_push( $nilaiyangmuncul, $rowF );

                                                } else if ( $rowF['nama'] == $topik_aktif ){

                                                    array_push( $nilaiyangmuncul, $rowF );
                                                }
                                            }

                                        foreach ($nilaiyangmuncul as $row) { ?>
                                            <a href="<?php echo base_url('admin/forum_diskusi/discuss/' . $row['id_forum']) ?>">
                                                <div class="card" style="padding: 5px">
                                                    <div class="row">

                                                        <div class="col-md-9">
                                                            <div for="" style="font-weight: bold; color: #000">
                                                                <?php echo $row['nama_forum'] ?>
                                                            </div>

                                                            <?php 
                                                            
                                                            if ( $level == "staff" || $level == "bk" ) {

                                                                echo '
                                                                    <div class="text-sm">
                                                                    <a href="'.base_url('Admin/forum_diskusi/editForum/').$row['id_forum'].'" class="btn btn-primary"><i class="fa fa-pencil"> Sunting</i></a> &nbsp;
                                                                    <a href="'.base_url('Admin/forum_diskusi/hapusForum/').$row['id_forum'].'" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
                                                                    </div>

                                                                ';
                                                                
                                                            } else {

                                                                if ( $row['id_profile'] == $id_profile ) {

                                                                    // tampilkan button
                                                                    echo '
                                                                        <div class="text-sm">
                                                                            <a href="">Sunting</a> &emsp;
                                                                            <a href="">Hapus</a>
                                                                        </div>';
                                                                }
                                                            }
                                                                
                                                            ?>
                                                            
                                                            <!-- End Button -->

                                                            <div class="text-sm text-muted" style="margin: 0px">
                                                                <marquee behavior="" direction="">Forum dibuka pada <?php echo date('d F Y H.i A', strtotime($row['tanggal_forum'])) ?> &emsp;|&emsp; dibuat oleh <label for=""><?php echo $row['username'] ?></label></marquee>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div>

                                                                <?php

                                                                    $color = "badge badge-primary";
                                                                    
                                                                    if ( $row['id_topik'] != 1)  {

                                                                        if ( ($row['id_topik'] % 2) == 0 ) {

                                                                            $color = "badge badge-warning";
                                                                        }
                                                                            if ( ($row['id_topik'] % 3) == 0 ) {

                                                                                $color = "badge badge-info";
                                                                            }
                                                                                if ( ($row['id_topik'] % 4) == 0 ) {

                                                                                    $color = "badge badge-success";
                                                                                }
                                                                    }
                                                                ?>

                                                                <span for="" class="<?php echo $color ?>"><?php echo $row['nama'] ?></span><br>
                                                                <small class="text-muted">Terdapat 10 Partisipan</small>
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
    <!-- jQuery -->
    <script src="<?= base_url("assets/Template/Admin/plugins/jquery/jquery.min.js") ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url("assets/Template/Admin/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
    <!-- ChartJS -->
    <script src="<?= base_url("assets/Template/Admin/plugins/chart.js/Chart.min.js") ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url("assets/Template/Admin/dist/js/adminlte.min.js") ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url("assets/Template/Admin/dist/js/demo.js") ?>"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

            var areaChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                        label: 'Digital Goods',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label: 'Electronics',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            var areaChart = new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            })

            //---------------------
            //- STACKED BAR CHART -
            //---------------------
            var stackedBarChartCanvas = $('#stackedBarChart1').get(0).getContext('2d')
            var stackedBarChartData = $.extend(true, {}, barChartData)

            var stackedBarChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }

            var stackedBarChart = new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: stackedBarChartData,
                options: stackedBarChartOptions
            })

            //---------------------
            //- STACKED BAR CHART -
            //---------------------
            var stackedBarChartCanvas = $('#stackedBarChart2').get(0).getContext('2d')
            var stackedBarChartData = $.extend(true, {}, barChartData)

            var stackedBarChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }

            var stackedBarChart = new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: stackedBarChartData,
                options: stackedBarChartOptions
            })

            //---------------------
            //- STACKED BAR CHART -
            //---------------------
            var stackedBarChartCanvas = $('#stackedBarChart3').get(0).getContext('2d')
            var stackedBarChartData = $.extend(true, {}, barChartData)

            var stackedBarChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }

            var stackedBarChart = new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: stackedBarChartData,
                options: stackedBarChartOptions
            })

        })
    </script>
</body>

</html>