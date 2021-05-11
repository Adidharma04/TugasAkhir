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
                        <h1 class="m-0">Forum Detail Diskusi</h1>
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

                <?php echo $this->session->flashdata('msg') ?>

                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <div class="card card-body">
                            <h3 style="margin: 0px"><?php echo $detail->nama_forum ?></h3>
                            <p class="text-sm text-muted">
                                <i class="fas fa-calendar"></i>&nbsp; <?php echo date('d F Y H.i A') ?>
                                &emsp;|&emsp;
                                <i class="fas fa-user"></i> &nbsp;<?php echo $detail->username ?>
                            </p>

                            <div class="card card-body">
                                <p class="text-sm text-muted">
                                    <?php
                                    $gambar = "";
                                    if ($detail->foto) {

                                        $gambar = base_url('assets/Gambar/Upload/Forum/' . $detail->foto);
                                    } else {
                                        // default
                                        $gambar = base_url('assets/Gambar/Website/default_forum_null.png');
                                    }
                                    ?>
                                    <img src="<?php echo $gambar ?>" alt="" style="width: 50%; border: 1.5px solid #e0e0e0; border-radius: 5px">
                                    <hr>
                                    <?php echo $detail->deskripsi ?>
                                </p>
                            </div>
                        </div>


                        <h5 class="text-muted">Diskusi</h5>
                        <div class="card card-body">


                            <div class="row" style="border-bottom: 2px solid #e0e0e0">

                                <div class="col-md-10">

                                    <form action="<?php echo base_url('admin/forum_diskusi/tambahDetailForum')?>" method="POST">
                                        <h5>Komentar</h5>
                                        <div class="form-group">
                                            <input type="hidden" name="id_forum" value="<?php echo $detail->id_forum ?>">
                                            <textarea name="notes" id="notes" class="form-control" placeholder="Pertanyaan, Informasi detail atau lainnya . . ." value="<?= set_value('notes'); ?>"></textarea>
                                            <small>Komentari forum diatas</small>
                                            <?= form_error('notes', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group text-right">

                                            <button class="btn btn-primary btn-xs">Tambahkan Komentar</button>
                                        </div>

                                    </form>
                                </div>

                            </div>

                            <?php foreach ($diskusi->result_array() as $row) { ?>
                                <div class="row" style="border-bottom: 1px solid #e0e0e0; padding: 5px">
                                    <div class="col-md-6">

                                        <div for="" style="margin: 0px"><label for=""><?php echo $row['username'] ?></label></div>
                                        <small>"<?php echo $row['notes'] ?>"</small>
                                    </div>
                                    <div class="col-md-3">
                                        <small>pada </small><br>
                                        <?php echo date('d M Y H.i A', strtotime($row['created_at'])) ?>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="#" data-toggle="modal" data-target="#action-edit-<?php echo $row['id_detail_forum'] ?>" class="btn btn-primary"><i class="fa fa-pencil"> Sunting</i></a> &nbsp;
                                        <a href="#" data-toggle="modal" data-target="#action-delete-<?php echo $row['id_detail_forum'] ?>" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
                                    </div>
                                </div>

                                <!-- Modal edit -->
                                <div class="modal fade" id="action-edit-<?php echo $row['id_detail_forum'] ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <form action="<?php echo base_url('admin/forum_diskusi/editDetailForum/'. $row['id_detail_forum']) ?>" method="POST" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <b>Edit Komentar</b>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id_forum" value="<?php echo $row['id_forum']?>" />
                                                <label>
                                                    Komentar
                                                </label>
                                                <i class="fa fa-book"></i>
                                                <textarea type="text" class="form-control" id="notes" name="notes" cols="10" rows="6" placeholder="Masukkan Komentar"><?= $row['notes'] ?></textarea>
                                                <small>Masukkan Komentar </small>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                <button class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->


                                <!-- Modal delete -->
                                <div class="modal fade" id="action-delete-<?php echo $row['id_detail_forum'] ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <b>Hapus Komentar</b>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <label>
                                                    Apakah anda yakin ingin menghapus komentar
                                                    <br>
                                                    <?php echo " ' ".$row['notes']." ' "?>
                                                </label> 
                                                <br>
                                                <small>From<?php echo " : ".$row['username']?> </small>
                                                <br>
                                                <br>
                                                <small> <b>Yakin tetap ingin menghapus ?</b> </small>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                <a href="<?= base_url('admin/forum_diskusi/hapusDetailForum/').$row['id_detail_forum'].'/'.$row['id_forum']?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            <?php } ?>
                        </div>
                    </div>
                </div>

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

    <!-- AdminLTE App -->
    <script src="<?= base_url("assets/Template/Admin/dist/js/adminlte.min.js") ?>"></script>
    <!-- AdminLTE for demo purposes -->

</body>

</html>