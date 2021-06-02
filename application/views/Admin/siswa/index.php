    
    <link rel="stylesheet" href="https://www.jqueryscript.net/demo/Year-Picker-Text-Input/yearpicker.css">
    <script src="https://www.jqueryscript.net/demo/Year-Picker-Text-Input/yearpicker.js"></script>
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Siswa / Alumni</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard_admin') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Data Siswa atau Alumni</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-3">

                        <div class="card">
                        
                            <div class="card-body">
                            
                                <h6>Data Siswa / Alumni</h6>

                                <?php
                                
                                    $tahun = date('Y');
                                    $filter_tahun = $this->input->get('tahun');


                                    $query_filter = "";

                                    if ( $filter_tahun == true ) {

                                        $tahun = $filter_tahun;
                                        $query_filter = "?tahun=". $filter_tahun;
                                    }
                                ?>
                                <h3><?php echo $tahun ?></h3>

                                <form action="" method="GET">

                                <input type="text" name="tahun" class="yearpicker form-control" value="<?php echo $tahun ?>" />
                                <button class="btn btn-xs btn-default"><i class="fa fa-calendar"></i> Tampilkan</button>
                                <a href="<?php echo base_url('admin/siswa') ?>" class="btn btn-xs btn-default">Reset Filter</a>
                                </form>

                                <hr>
                                <small>Tahun yang dipilih</small>


                                <div class="text-center">
                                    <canvas id="donutChart" style="width: 100%; height: 300px"></canvas>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                                <?php echo $this->session->flashdata('msg') ?>
                            <br>
                            <div class="card-header">
                                <h3 class="card-title">Table Informasi Siswa</h3>
                            </div>
                            <div class="card-body">
                                <a href="<?php echo base_url('admin/siswa/exportToPDF/'. $query_filter) ?>" class="btn btn-danger"><i class="fas fa-pdf"></i>Cetak PDF</a>
                                <small>Klik untuk mengekspor data siswa</small><br>

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nis</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                        
                                        $jumlahAlumni = 0;
                                        $jumlahSiswa  = 0;
                                        foreach ($profil_siswa as $swa) :
                                            

                                            
                                            if ( $swa->verifikasi_alumni == "diterima" ) $jumlahAlumni++;
                                            else $jumlahSiswa++;
                                        ?>
                                        <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $swa->nis ?></td>
                                                <td><?= $swa->nama ?></td>
                                                <td>
                                                    <?php

                                                        $colorBadge = "";
                                                        $textBadge = "";
                                                        if ( $swa->verifikasi_alumni == "diterima" ) {

                                                            $colorBadge = "primary";
                                                            $textBadge  = "Alumni";
                                                        } else {

                                                            $colorBadge = "warning";
                                                            $textBadge  = "Siswa";
                                                        }
                                                    ?>
                                                    <label for="" class="badge badge-<?php echo $colorBadge ?>"><?php echo $textBadge ?></label>
                                                    
                                                </td>
                                                <td>
                                                    <a href="<?= base_url().'admin/siswa/detail/'.$swa->id_siswa ?>" class="btn btn-xs btn-info"><i class="fas fa-eye"></i> Detail</a>
                                                    <a href="<?= base_url().'admin/siswa/edit/'.$swa->id_siswa ?>" class="btn btn-xs btn-success"><i class="fas fa-pencil-square-o"></i>Edit</a>
                                                    <a href="#"  data-toggle="modal" data-target="#action-delete-<?php echo $swa->id_siswa ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                                    <!-- Modal delete -->
                                                    <div class="modal fade" id="action-delete-<?php echo $swa->id_siswa ?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="">NIS : <span class="text-bold"><?php echo $swa->nis ?></span></label> <br>
                                                                <label for="">NAMA : <span class="text-bold"><?php echo $swa->nama ?></span></label>
                                                                <hr>
                                                                <label>
                                                                    Apakah anda yakin ingin menghapus siswa atas nama <?php echo $swa->nama ?> ? 
                                                                </label> <br>
                                                                <small>Siswa yang telah dihapus tidak dapat dipulihkan kembali.</small>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                                <a href="<?php echo base_url('admin/siswa/onDelete/'. $swa->id_profile) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Sekarang</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->
                                                </td>
                                        </tr>
                                        <?php                                         
                                        endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nis</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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

<br><br>
  <!-- ChartJS -->
  <script src="<?php echo base_url() ?>assets/Template/Admin/plugins/chart.js/Chart.min.js"></script>
    
    <script>
        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData        = {
        labels: [
            'Alumni', 
            'Siswa',
        ],
        datasets: [
            {
            data: [<?php echo $jumlahAlumni ?>, <?php echo $jumlahSiswa ?>],
            backgroundColor : ['#2196f3', '#ef5350'],
            }
        ]
        }
        var donutOptions     = {
          maintainAspectRatio : false,
          responsive : false,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
          type: 'doughnut',
          data: donutData,
          options: donutOptions      
        })





        $('.yearpicker').yearpicker();
    
    </script>