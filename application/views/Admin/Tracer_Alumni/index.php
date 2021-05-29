<link rel="stylesheet" href="https://www.jqueryscript.net/demo/Year-Picker-Text-Input/yearpicker.css">
<script src="https://www.jqueryscript.net/demo/Year-Picker-Text-Input/yearpicker.js"></script>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rekap Data Tracer Alumni</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/dashboard_admin') ?>">Home</a></li>
              <li class="breadcrumb-item active">Tracer Alumni</li>
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

          			<h6>Jumlah</h6>
          			<h3><?php 

                  $tahun = date('Y');

                  $filter = $this->input->get('tahun');
                  if ( $filter ) {

                    $tahun = $filter;
                  }


                  // cek filter graduate
                  $filter_graduate = "";
                  if ( $this->input->get('graduate') ) {

                    $filter_graduate = $this->input->get('graduate');
                  }

                  echo $tahun.'<small style="font-size: 12px"> &emsp;Kuliah dan Kerja</small>' ?></h3>

                <form action="" method="GET">

                <input type="hidden" name="graduate" value="<?php echo $filter_graduate ?>">
                <input type="text" name="tahun" class="yearpicker form-control" value="<?php echo $tahun ?>" />
                <button class="btn btn-xs btn-default"><i class="fa fa-calendar"></i> Tampilkan</button>
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
              <div class="card-header">
                <h3 class="card-title">Tracer Alumni</h3> 

                <?php
                
                
                  $tahun_graduate = date('Y');

                  $filter_graduate = $this->input->get('graduate');
                  if ( $filter_graduate ) {

                    $tahun_graduate = $filter_graduate;
                  }
                


                  // cek filter tahun kerja + kuliah
                  $filter_kulker = "";
                  if ( $filter ) {

                    $filter_kulker = $tahun;
                  }
                
                ?>

                <form action="" method="GET">
                
                <input type="hidden" name="tahun" value="<?php echo $filter_kulker ?>">
                <input type="text" name="graduate" class="yearpicker form-control" value="<?php echo $tahun_graduate ?>" />
                <small>Lihat kelulusan</small>
                <button class="btn btn-xs btn-default"><i class="fa fa-calendar"></i> Tampilkan</button>
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Alumni</th>
                      <th>NIS</th>
                      <th>Tahun Lulus</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; 
                    

                    foreach ($tracer_alumni->result() as $tkul) :
                    
                      
                    ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><a target="_blank" href="<?php echo base_url('admin/tracer_alumni/detail/'. $tkul->id_profile) ?>"><?= $tkul->nama ?></a></td>
                        <td><?= $tkul->nis ?></td>
                        <td><?= $tkul->tahun_lulus?></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th>No</th>
                                        <th>Nama Alumni</th>
                                        <th>NIS</th>
                                        <th>Tahun Lulus</th>
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
            'Kerja', 
            'Kuliah',
        ],
        datasets: [
            {
            data: [<?php echo $tracer_kuliahkerja['kerja'] ?>, <?php echo $tracer_kuliahkerja['kuliah'] ?>],
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