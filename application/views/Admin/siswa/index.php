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
                            <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/dashboard_admin') ?>">Home</a></li>
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
                                <a href='<?php echo base_url('Admin/siswa/tambah') ?>'><button type="button" class="btn btn-outline-primary btn-block"><i class="fa fa-plus"></i> Tambah</button></a>   
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
                                                    <a href="<?= base_url().'Admin/siswa/detail/'.$swa->id_student ?>" class="btn btn-info"><i class="fas fa-eye"></i> Detail</a>
                                                    <a href="<?= base_url().'Admin/siswa/edit/'.$swa->id_student ?>" class="btn btn-success"><i class="fas fa-pencil-square-o"></i>Edit</a>
                                                    <a href="#"  data-toggle="modal" data-target="#action-delete-<?php echo $swa->id_student ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                                    <!-- Modal delete -->
                                                    <div class="modal fade" id="action-delete-<?php echo $swa->id_student ?>">
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