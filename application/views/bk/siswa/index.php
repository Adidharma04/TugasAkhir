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
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Informasi Siswa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('bk/dashboard_bk') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Table Siswa</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                                <?php echo $this->session->flashdata('msg') ?>
                            <br>
                            <div class="card-header">
                                <h3 class="card-title">Table Informasi Siswa</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="col-md-3">
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nis</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Foto</th>
                                            <th>Opsi</th>
                                            <th>Status Alumni</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach ($information_student as $swa) : ?>
                                        <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $swa->nis ?></td>
                                                <td><?= $swa->nama ?></td>
                                                <td><?= $swa->alamat ?></td>
                                                <td>
                                                    <?php if($swa->foto == ""): ?>
                                                        <img src="<?= base_url('assets/Gambar/Website/default_siswa.jpg')?>" style= "width:70px; height:70px;" >
                                                    <?php else: ?>
                                                        <img src="<?= base_url('assets/Gambar/Upload/siswa/') . $swa->foto ?>" style= "width:70px; height:70px;" >
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                <a href="<?= base_url().'bk/siswa/detail/'.$swa->id_student ?>" class="btn btn-info"><i class="fas fa-eye"></i> Detail</a>
                                                </td>
                                                <td>
                            
                            <?php 
                            
                              $colorBtn = "";
                              $textBtn = "";
                              if ( ($swa->verifikasi_alumni == "diterima") ) {

                                echo '<small>Telah dikonfirmasi</small>';

                                $colorBtn = "btn-primary";
                                $textBtn  = "Konfirmasi Ulang";
                              } else {

                                echo '<small>Mohon dikonfirmasi</small>';
                                $colorBtn = "btn-default";
                                $textBtn  = "Konfirmasi Alumni";
                              }
                            ?>
                            <a href="javascript:;" data-toggle="modal" data-target="#konfirmasi-<?php echo $swa->id_student ?>" class="btn <?php echo $colorBtn ?>"><i class="fas fa-eye"></i><?php echo $textBtn ?></a>
                            
                            <!-- Modal delete -->
                            <div class="modal fade" id="konfirmasi-<?php echo $swa->id_student ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <b>Konfirmasi Alumni</b>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">

                                      <!-- Accept -->
                                      <div class="col-md-6 text-center" style="border-right: 1px solid #e0e0e0">
                                        <?php echo pemanggilanSVG( "diterima" ) ?>
                                        <h6><b>Alumni Disetujui</b></h6>
                                        <small>Klik tombol dibawah ini untuk mensetujui alumni</small> <br><br>
                                        <a href="<?php echo base_url('bk/siswa/processVerify/'. $swa->id_student.'?verifikasi_alumni=diterima') ?>" class="btn btn-success btn-sm">Setujui</a>
                                      </div>

                                      <!-- Ditolak -->
                                      <div class="col-md-6 text-center" style="border-right: 1px solid #e0e0e0">
                                        <?php echo pemanggilanSVG( "pengajuan" ) ?>
                                        <h6><b>Ditolak</b></h6>
                                        <small>Klik tombol dibawah ini untuk menolak informasi</small> <br><br>
                                        <a href="<?php echo base_url('bk/siswa/processVerify/'. $swa->id_student.'?verifikasi_alumni=pengajuan') ?>" class="btn btn-danger btn-sm">Ditolak</a>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nis</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Foto</th>
                                            <th>Opsi</th>
                                            <th>Status Alumni</th>  
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
</body>
<!-- jQuery -->
<script src="<?= base_url("assets/Template/Admin/plugins/jquery/jquery.min.js") ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url("assets/Template/Admin/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url("assets/Template/Admin/plugins/datatables/jquery.dataTables.min.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/datatables-buttons/js/dataTables.buttons.min.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/jszip/jszip.min.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/pdfmake/pdfmake.min.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/pdfmake/vfs_fonts.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/datatables-buttons/js/buttons.html5.min.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/datatables-buttons/js/buttons.print.min.js") ?>"></script>
<script src="<?= base_url("assets/Template/Admin/plugins/datatables-buttons/js/buttons.colVis.min.js") ?>"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

</html>

<?php 


  function pemanggilanSVG( $type ) {

    if ( $type == "accept" ) {

      return '<svg style="width: 135px" id="ee370ff1-147c-4ceb-b530-4ba4072ed128" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800.12205 541.4453"><path d="M931.831,368.72265c-.83984.69-1.68017,1.35-2.54,2H717.15087q-2.37012-.975-4.71973-2a249.80684,249.80684,0,0,1-61.87012-38.52c-12.37011-10.48-23.75-21.3-32-31.44-11.50976-14.15-22.10986-29.57-27.04-47.13995-4.91992-17.57-3.45019-37.71,7.54-52.28a46.79519,46.79519,0,0,1,12.3501-11.31c.79-.5,1.58985-.98,2.40967-1.43,13.18018-7.4,29.81006-9.2,44.65039-5.37,21.25,5.49,38.90967,20.82,51.50977,38.8,12.60009,17.97,20.78027,38.61,28.83984,59.02,8.18018-36.43,32.95019-69.06,66.41016-85.65,33.45019-16.59,75.01025-16.39,107.75,1.58a108.29189,108.29189,0,0,1,27.55029,21.7c.78955.85,1.56006,1.72,2.31982,2.6,15.96973,18.49,25.96,42.17,26.77979,66.59C970.68114,317.33264,956.10106,348.93267,931.831,368.72265Z" transform="translate(-199.93898 -179.27735)" fill="#f2f2f2"/><path d="M725.63085,370.72265h-3c-.03955-.67-.08985-1.33-.1499-2a224.18,224.18,0,0,0-6.56006-38.74,238.8167,238.8167,0,0,0-38.31006-80.46,228.5998,228.5998,0,0,0-65.5-60.46,1.42,1.42,0,0,1-.69971-1.03,1.49571,1.49571,0,0,1,2.21-1.56,2.25584,2.25584,0,0,1,.19971.13,226.457,226.457,0,0,1,40.12012,31.12,240.89806,240.89806,0,0,1,51.71,74.13,233.59238,233.59238,0,0,1,19.82031,76.87C725.53124,369.39263,725.581,370.06268,725.63085,370.72265Z" transform="translate(-199.93898 -179.27735)" fill="#fff"/><path d="M942.85106,219.28265a.18442.18442,0,0,1-.06982.02c-2.18994.4-4.39014.82-6.57031,1.27a296.83934,296.83934,0,0,0-52.33008,15.89,308.80792,308.80792,0,0,0-48.5,25,313.78428,313.78428,0,0,0-43.44971,33.08,307.5251,307.5251,0,0,0-36.99023,40.12,297.483,297.483,0,0,0-22.60987,34.06c-.37988.66-.75,1.33-1.12011,2h-3.42969c.35986-.67.73-1.34,1.10986-2a299.923,299.923,0,0,1,27.98-41.33,310.83961,310.83961,0,0,1,38.31006-39.75,317.8396,317.8396,0,0,1,44.37988-32.28,311.85339,311.85339,0,0,1,49.52-24.16,297.10379,297.10379,0,0,1,51.4502-14.52c.48974-.09.96973-.18,1.46-.27C943.86083,216.07263,944.66112,218.89263,942.85106,219.28265Z" transform="translate(-199.93898 -179.27735)" fill="#fff"/><path d="M397.61864,376.66758c5.33472-10.07067,6.21531-23.18724-.41809-32.45416-3.94861-5.51625-10.114-9.13731-16.5831-11.17974s-13.29352-2.64274-20.05919-3.13909c-6.69738-.49134-13.51391-.88463-20.05622.63013s-12.87936,5.21528-16.06641,11.12621c-5.384,9.98545-.47945,22.78941-4.43391,33.42231-3.629,9.75779-13.95725,15.46248-24.11029,17.76466s-20.7502,2.05718-30.90827,4.337-20.50358,7.93161-24.19689,17.66525c-2.67075,7.03869-1.3438,15.14634,2.17543,21.8015s9.03083,12.04315,14.88123,16.78118c8.72778,7.06833,18.9387,13.122,30.153,13.73469,11.81633.64564,23.37009-4.97924,31.87484-13.20795s14.29474-18.86236,18.92069-29.75469c2.93464-6.91,5.70733-14.34655,11.58833-19.01277,4.32141-3.42878,9.81777-4.93092,15.14811-6.35168l6.03579-1.60878a41.44067,41.44067,0,0,0,25.89412-20.25286Q397.53861,376.81864,397.61864,376.66758Z" transform="translate(-199.93898 -179.27735)" fill="#2f2e41"/><polygon points="150.079 528.665 137.82 528.665 131.987 481.377 150.082 481.377 150.079 528.665" fill="#ffb8b8"/><path d="M129.06244,525.16164h23.64387a0,0,0,0,1,0,0v14.88687a0,0,0,0,1,0,0H114.17558a0,0,0,0,1,0,0v0A14.88686,14.88686,0,0,1,129.06244,525.16164Z" fill="#2f2e41"/><polygon points="252.079 528.665 239.82 528.665 233.987 481.377 252.082 481.377 252.079 528.665" fill="#ffb8b8"/><path d="M231.06244,525.16164h23.64387a0,0,0,0,1,0,0v14.88687a0,0,0,0,1,0,0H216.17558a0,0,0,0,1,0,0v0A14.88686,14.88686,0,0,1,231.06244,525.16164Z" fill="#2f2e41"/><path d="M373.58482,670.35742a4.83433,4.83433,0,0,1-.512-.02749l-49.87738-5.34411a4.69083,4.69083,0,0,1-4.06331-5.75129l44.16249-167.97008A4.71833,4.71833,0,0,1,366.84,487.772l40.968-11.42012a4.722,4.722,0,0,1,4.54861,1.4821c26.34037,29.71022,46.19019,95.57108,61.227,178.585a4.69166,4.69166,0,0,1-4.02183,5.48968l-40.86771,5.21789a4.67848,4.67848,0,0,1-5.17081-3.62687l-19.88367-88.64816a3.64829,3.64829,0,0,0-7.13744.08245l-18.33031,91.651A4.66624,4.66624,0,0,1,373.58482,670.35742Z" transform="translate(-199.93898 -179.27735)" fill="#2f2e41"/><circle cx="166.05906" cy="195.89412" r="24.56103" fill="#ffb8b8"/><path d="M365.31214,491.73677a4.68072,4.68072,0,0,1-4.52138-3.48538L346.015,432.74183a16.77836,16.77836,0,0,1,10.11005-19.96459c11.894-4.64277,23.22577-6.3651,33.68038-5.12119h0c9.29189,1.1075,20.75451,56.11828,19.99615,57.29195l3.66683,10.99972a4.69093,4.69093,0,0,1-3.44212,6.0648l-43.695,9.61228A4.732,4.732,0,0,1,365.31214,491.73677Z" transform="translate(-199.93898 -179.27735)" fill="#ccc"/><path d="M378.55437,548.5036a7.61039,7.61039,0,0,0-7.36811-9.04937l-8.51288-25.67-8.70071,11.03671,9.41789,22.68464a7.65163,7.65163,0,0,0,15.16381.998Z" transform="translate(-199.93898 -179.27735)" fill="#ffb8b8"/><path d="M488.00168,486.81137a7.61039,7.61039,0,0,0-11.385-2.56171L454.061,469.32786l-.02058,14.05386,21.42241,12.01539a7.65163,7.65163,0,0,0,12.53883-8.58574Z" transform="translate(-199.93898 -179.27735)" fill="#ffb8b8"/><path d="M360.7065,536.64362a4.6899,4.6899,0,0,1-4.45394-3.21767l-19.95679-42.21646a24.39872,24.39872,0,0,1-1.23475-7.66906l6-54.87133a12.059,12.059,0,0,1,24.02994-1.45563l-9.17975,62.631,14.64881,38.44a4.68142,4.68142,0,0,1-2.47839,5.225l-5.278,2.63948A4.68456,4.68456,0,0,1,360.7065,536.64362Z" transform="translate(-199.93898 -179.27735)" fill="#ccc"/><path d="M467.29051,492.35386a4.681,4.681,0,0,1-2.115-.50387l-39.68768-20.04705a24.36835,24.36835,0,0,1-6.289-4.56031l-38.73694-38.86239a12.05881,12.05881,0,0,1,15.99239-17.99389l41.96249,46.60271,33.263,21.11994a4.67994,4.67994,0,0,1,1.933,5.45l-1.875,5.59554a4.692,4.692,0,0,1-4.44732,3.19934Z" transform="translate(-199.93898 -179.27735)" fill="#ccc"/><path d="M338.061,362.473a28.60013,28.60013,0,0,0,16.89515,10.63127,29.8702,29.8702,0,0,0,20.06006-2.87413c4.94657-2.67271,8.905-6.68407,12.782-10.63335,1.618-1.64821,3.3414-3.549,3.26-5.79747-.12611-3.48365-4.31416-5.38825-7.90863-6.148a56.43491,56.43491,0,0,0-35.03266,3.93979c-4.88,2.26681-9.96448,6.3679-9.23175,11.46579" transform="translate(-199.93898 -179.27735)" fill="#2f2e41"/><path d="M983.061,368.72265h-482a17.02412,17.02412,0,0,0-17,17v186a17.02411,17.02411,0,0,0,17,17h482a17.0241,17.0241,0,0,0,17-17v-186A17.02411,17.02411,0,0,0,983.061,368.72265Zm15,203a15.01828,15.01828,0,0,1-15,15h-482a15.01828,15.01828,0,0,1-15-15v-186a15.01828,15.01828,0,0,1,15-15h482a15.01828,15.01828,0,0,1,15,15Z" transform="translate(-199.93898 -179.27735)" fill="#3f3d56"/><path d="M588.5747,536.72265a58,58,0,1,1,58-58A58.06566,58.06566,0,0,1,588.5747,536.72265Zm0-114a56,56,0,1,0,56,56A56.06353,56.06353,0,0,0,588.5747,422.72265Z" transform="translate(-199.93898 -179.27735)" fill="#3f3d56"/><path d="M940.04724,441.72265h-231a12.4967,12.4967,0,0,0-12.48,12.01,4.01078,4.01078,0,0,0-.02.49,12.51762,12.51762,0,0,0,12.5,12.5h231a12.5,12.5,0,0,0,0-25Z" transform="translate(-199.93898 -179.27735)" fill="#00bfa6"/><path d="M940.04724,490.72265h-231a12.4967,12.4967,0,0,0-12.48,12.01,4.01078,4.01078,0,0,0-.02.49,12.51762,12.51762,0,0,0,12.5,12.5h231a12.5,12.5,0,0,0,0-25Z" transform="translate(-199.93898 -179.27735)" fill="#00bfa6"/><path d="M582.10406,504.06438a7.45991,7.45991,0,0,1-4.48864-1.491l-.08027-.06027-16.904-12.94229a7.51006,7.51006,0,1,1,9.13524-11.92273l10.94913,8.39563,25.87453-33.74415a7.50978,7.50978,0,0,1,10.52941-1.38993l-.16087.21843.165-.21525a7.51849,7.51849,0,0,1,1.38994,10.52948L588.07894,501.1335A7.5131,7.5131,0,0,1,582.10406,504.06438Z" transform="translate(-199.93898 -179.27735)" fill="#00bfa6"/><path d="M581.939,720.72265h-381a1,1,0,0,1,0-2h381a1,1,0,0,1,0,2Z" transform="translate(-199.93898 -179.27735)" fill="#3f3d56"/><path d="M883.19672,323.67208a198.22844,198.22844,0,0,0-62.84517,1.41695,202.3421,202.3421,0,0,0-59.17277,20.68847,195.19962,195.19962,0,0,0-29.529,19.50926c-1.50813,1.2048.62683,3.31522,2.12132,2.12132a193.80848,193.80848,0,0,1,53.78714-30.23554,199.64709,199.64709,0,0,1,60.06423-12.18517,191.075,191.075,0,0,1,34.77677,1.57754,1.55392,1.55392,0,0,0,1.84518-1.04765,1.50922,1.50922,0,0,0-1.04766-1.84518Z" transform="translate(-199.93898 -179.27735)" fill="#fff"/></svg>';
    } else {


      return '<svg style="width: 135px" id="f4dfef0e-e963-4752-8b60-16883a06d9db" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1080.0487 748.00219"><title>cancel</title><path d="M832.20759,587.46822c0,67.693-40.24241,91.32887-89.88394,91.32887s-89.88394-23.63587-89.88394-91.32887,89.88394-153.80916,89.88394-153.80916S832.20759,519.77523,832.20759,587.46822Z" transform="translate(-59.97565 -75.99891)" fill="#f50057"/><polygon points="679.994 535.79 718.305 465.702 680.138 526.903 680.552 501.43 706.956 450.722 680.662 494.688 681.406 448.873 709.68 408.504 681.523 441.669 681.988 357.66 679.191 464.109 650.56 420.284 678.845 473.092 676.166 524.259 676.087 522.901 642.948 476.597 675.986 527.699 675.651 534.098 675.591 534.195 675.619 534.72 668.823 603 677.902 603 678.992 597.484 711.949 546.507 679.074 592.443 679.994 535.79" fill="#3f3d56"/><path d="M1140.02435,369.81269c0,129.31047-76.873,174.46085-171.7007,174.46085s-171.7007-45.15038-171.7007-174.46085S968.32365,75.99891,968.32365,75.99891,1140.02435,240.50222,1140.02435,369.81269Z" transform="translate(-59.97565 -75.99891)" fill="#f2f2f2"/><polygon points="902.093 448.494 903.851 340.273 977.035 206.388 904.127 323.296 904.918 274.635 955.355 177.771 905.127 261.758 905.127 261.759 906.549 174.24 960.558 97.124 906.772 160.478 907.661 0 902.078 212.444 902.537 203.68 847.625 119.628 901.656 220.503 896.54 318.246 896.387 315.652 833.084 227.2 896.196 324.817 895.556 337.041 895.441 337.225 895.494 338.228 882.513 586.21 899.856 586.21 901.937 458.123 964.894 360.745 902.093 448.494" fill="#3f3d56"/><path d="M1132.97565,640.5574c0,38.59549-250.36912,183.44369-543.05156,183.44369S59.97565,749.0362,59.97565,710.44071s231.44239,7.27952,524.12483,7.27952S1132.97565,601.96192,1132.97565,640.5574Z" transform="translate(-59.97565 -75.99891)" fill="#3f3d56"/><path d="M1132.97565,640.5574c0,38.59549-250.36912,183.44369-543.05156,183.44369S59.97565,749.0362,59.97565,710.44071s231.44239,7.27952,524.12483,7.27952S1132.97565,601.96192,1132.97565,640.5574Z" transform="translate(-59.97565 -75.99891)" opacity="0.1"/><path d="M1132.97565,640.5574c0,38.59549-250.36912,139.76663-543.05156,139.76663S59.97565,749.0362,59.97565,710.44071,291.418,674.04316,584.10048,674.04316,1132.97565,601.96192,1132.97565,640.5574Z" transform="translate(-59.97565 -75.99891)" fill="#3f3d56"/><ellipse cx="535.87833" cy="641.77394" rx="225.04403" ry="17.40672" opacity="0.1"/><path d="M417.57367,368.96457s65.88345,1.22006,53.68281,12.81067-57.953,0-57.953,0Z" transform="translate(-59.97565 -75.99891)" fill="#a0616a"/><path d="M280.30415,228.18183s26.60021-4.75031,35.84921,16.72359,28.244,82.71589,28.244,82.71589,50.83308,33.64785,60.079,32.54232,25.05178,1.15023,22.15247,11.2372-1.6122,21.52484-8.28694,22.92668-17.29058-11.97954-25.415-5.53421-80.53015-17.09648-85.17856-21.97431-43.27878-110.50134-43.27878-110.50134S266.01479,227.83769,280.30415,228.18183Z" transform="translate(-59.97565 -75.99891)" fill="#f50057"/><polygon points="277.379 605.607 280.429 631.228 254.808 637.939 240.167 631.228 240.167 608.657 277.379 605.607" fill="#a0616a"/><polygon points="208.445 622.078 211.495 647.699 185.874 654.41 171.233 647.699 171.233 625.128 208.445 622.078" fill="#a0616a"/><path d="M339.7946,401.60128l11.59061,42.0922L368.4661,529.098s4.88026,20.74108-4.88025,45.75239S336.13441,681.60593,339.7946,686.48618s-41.48217,8.54045-40.87214,3.66019,6.71036-71.98376,6.71036-71.98376,8.54044-59.1731,12.81067-66.49348-19.521-25.62134-19.521-25.62134-6.10031,70.15367-15.25079,76.254S275.74125,702.957,271.471,704.17711s-35.38185,6.10032-39.042,0,0-107.97565,0-107.97565,20.74108-77.47406,16.47086-88.45463-1.8301-57.953-1.8301-57.953-15.86083-35.99189-7.32038-54.90287Z" transform="translate(-59.97565 -75.99891)" fill="#2f2e41"/><path d="M337.96451,167.349s-25.62134,31.72166-24.40128,45.75239-40.26211-25.62134-40.26211-25.62134,29.89157-40.2621,29.89157-48.80255S337.96451,167.349,337.96451,167.349Z" transform="translate(-59.97565 -75.99891)" fill="#a0616a"/><circle cx="277.68384" cy="62.98363" r="40.26211" fill="#a0616a"/><path d="M236.19284,378.78c-1.824,6.79577-4.08719,14.50047-3.76385,20.99122.20746,4.20313,11.36489,6.96045,26.79255,8.76616,14.30529,1.67758,32.283,2.53161,48.62569,2.97085,17.16021.46363,32.50245.46363,39.87779.46363,21.96115,0,4.27022-14.03074-4.27023-20.74109s-6.71035-101.87533-6.10031-114.076-5.49029-47.58249-5.49029-54.29285-14.35407-24.22438-14.35407-24.22438-3.33686,9.58362-16.75756-3.227-31.11163-16.47086-31.11163-16.47086c-13.4207,4.88025-35.99188,58.56306-37.21194,67.71354-.49417,3.71507-.08542,22.742.74422,44.46523,1.20174,31.75216,3.30029,69.2874,4.74606,73.27093C239.06,367.531,237.7973,372.80166,236.19284,378.78Z" transform="translate(-59.97565 -75.99891)" fill="#f50057"/><polygon points="241.387 338.413 245.657 353.664 229.186 370.745 223.696 346.953 241.387 338.413" fill="#a0616a"/><path d="M306.85288,700.51692s12.81067,14.64076,22.57118,4.88025,9.15048-15.86083,10.98058-15.86083,29.28153,24.40128,29.28153,24.40128,46.97245,10.98057,21.35111,18.911-98.21513,2.44013-98.21513,0-1.8301-34.77182,4.88025-34.77182Z" transform="translate(-59.97565 -75.99891)" fill="#2f2e41"/><path d="M237.91927,716.98778s12.81067,14.64076,22.57118,4.88025,9.15048-15.86083,10.98058-15.86083,29.28153,24.40128,29.28153,24.40128,46.97246,10.98057,21.35112,18.911-98.21514,2.44013-98.21514,0-1.8301-34.77182,4.88025-34.77182Z" transform="translate(-59.97565 -75.99891)" fill="#2f2e41"/><path d="M292.45633,171.12178c-1.30065.84028-2.99385,1.69175-4.29617.85407a194.661,194.661,0,0,1-10.803-37.40333c-.82225-4.49515-1.393-9.49233,1.10424-13.3194.9849-1.50939,2.40274-2.74371,3.12416-4.39532,1.09254-2.50124.37345-5.39643.73641-8.10163.76042-5.66737,6.11775-9.62022,11.505-11.5373s11.23835-2.51176,16.37345-5.02733c4.87591-2.38861,8.78111-6.35,13.3025-9.35611s10.31287-5.0615,15.34812-3.03018c4.45436,1.797,7.229,6.33734,11.43921,8.64913,2.8571,1.5688,6.17272,2.00534,9.36187,2.67875a59.9218,59.9218,0,0,1,24.33972,11.30812,17.67252,17.67252,0,0,1,4.42964,4.56639c5.40289,8.8953-4.27062,20.98885-.00283,30.48113l-9.22662-7.28052a32.13074,32.13074,0,0,0-8.24035-5.237c-3.05623-1.15765-6.67559-1.29745-9.45179.42692-3.89609,2.42-4.95269,7.47582-6.3137,11.8557s-4.3705,9.23676-8.95561,9.12455c-6.23545-.15259-8.41611-8.85468-14.012-11.60979-3.6479-1.796-8.23962-.61324-11.34953,2.00618-3.10968,2.61923-4.97572,6.41973-6.34429,10.24826-.85526,2.39254-1.65774,5.08957-3.1768,7.16346-1.6754,2.28735-3.81829,2.47136-5.60773,4.17946C301.08225,162.81226,298.21838,167.39921,292.45633,171.12178Z" transform="translate(-59.97565 -75.99891)" fill="#2f2e41"/><path d="M236.19284,378.78c7.58272,10.99889,16.12928,22.34547,23.0287,29.75738,14.30529,1.67758,32.283,2.53161,48.62569,2.97085a38.52679,38.52679,0,0,0-10.75486-9.90691C289.162,396.721,270.251,338.768,270.251,338.768s23.18122-59.78313,29.28154-82.35431-17.69093-35.38185-17.69093-35.38185C270.861,211.88135,251.95,233.23247,251.95,233.23247s-9.65075,29.1107-18.7768,57.88593c1.20174,31.75216,3.30029,69.2874,4.74606,73.27093C239.06,367.531,237.7973,372.80166,236.19284,378.78Z" transform="translate(-59.97565 -75.99891)" opacity="0.1"/><path d="M280.01148,216.15157s23.79124,12.81067,17.69092,35.38185-29.28153,82.35431-29.28153,82.35431,18.911,57.953,26.8414,62.83329,18.911,16.47086,10.37055,22.57118-14.64077,15.86083-20.74109,12.81067-6.10032-20.13105-16.47086-20.13105-52.46275-63.44332-53.07278-70.15367,34.77182-113.46594,34.77182-113.46594S269.0309,207.00109,280.01148,216.15157Z" transform="translate(-59.97565 -75.99891)" fill="#f50057"/><path d="M774.7215,382.89095l-6.8628-6.86279a21.34485,21.34485,0,0,0-30.18617,0L604.55734,509.14335,471.44215,376.02816a21.34485,21.34485,0,0,0-30.18617,0l-6.86279,6.86279a21.34484,21.34484,0,0,0,0,30.18618L567.50837,546.19232,434.39319,679.3075a21.34484,21.34484,0,0,0,0,30.18618l6.86279,6.86279a21.34485,21.34485,0,0,0,30.18617,0L604.55734,583.24128,737.67253,716.35647a21.34485,21.34485,0,0,0,30.18617,0l6.8628-6.86279a21.34486,21.34486,0,0,0,0-30.18618L641.60631,546.19232,774.7215,413.07713A21.34486,21.34486,0,0,0,774.7215,382.89095Z" transform="translate(-59.97565 -75.99891)" fill="#ff6584"/><path d="M429.6427,686.54463,558.80505,557.38235l-1.24334-1.24334L434.39317,679.30748A21.2598,21.2598,0,0,0,429.6427,686.54463Z" transform="translate(-59.97565 -75.99891)" opacity="0.1"/><path d="M432.5526,387.21818a21.34488,21.34488,0,0,1,30.18621,0L595.854,520.33335,728.96915,387.21818a21.34488,21.34488,0,0,1,30.18621,0l6.86279,6.86279a21.34354,21.34354,0,0,1,4.75047,22.949l3.95289-3.95289a21.34479,21.34479,0,0,0,0-30.18614l-6.86279-6.86279a21.3449,21.3449,0,0,0-30.18621,0L604.55734,509.14331,471.44217,376.02814a21.3449,21.3449,0,0,0-30.18621,0l-6.86279,6.86279a21.2598,21.2598,0,0,0-4.75047,7.23715Z" transform="translate(-59.97565 -75.99891)" opacity="0.1"/><path d="M642.84968,547.43565l-9.94669,9.9467L766.01815,690.49752a21.34356,21.34356,0,0,1,4.75047,22.94907l3.95289-3.953a21.34479,21.34479,0,0,0,0-30.18614Z" transform="translate(-59.97565 -75.99891)" opacity="0.1"/><path d="M214.97565,636.19129c0,56.22159-33.42284,75.85206-74.652,75.85206s-74.652-19.63047-74.652-75.85206,74.652-127.7443,74.652-127.7443S214.97565,579.96971,214.97565,636.19129Z" transform="translate(-59.97565 -75.99891)" fill="#f50057"/><polygon points="78.393 580.392 110.212 522.181 78.513 573.011 78.857 551.854 100.786 509.739 78.948 546.255 79.566 508.204 103.048 474.675 79.663 502.221 80.049 432.448 77.726 520.858 53.947 484.46 77.438 528.318 75.214 570.815 75.148 569.687 47.625 531.23 75.064 573.672 74.786 578.987 74.736 579.067 74.759 579.503 69.115 636.212 76.656 636.212 77.561 631.631 104.933 589.293 77.629 627.444 78.393 580.392" fill="#3f3d56"/></svg>';
    }

  }


?>