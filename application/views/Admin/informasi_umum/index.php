    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Informasi Tentang Perkuliahan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard_admin') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Table Informasi</li>
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
                                <h3 class="card-title">Table Informasi Perkuliahan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="col-md-3">
                                <a href='<?php echo base_url('admin/informasi_umum/tambah') ?>'><button type="button" class="btn btn-outline-primary btn-block"><i class="fa fa-plus"></i> Tambah</button></a>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Dibuat oleh</th>
                                            <th>Informasi</th>
                                            <th>Status</th>
                                            <th>Foto</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($informasi_umum->result() as $ig) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td>
                                                    <?php if ( $ig->level == "staff" ) { ?>
                                                    
                                                    <small>Dibuat oleh : </small> <br>
                                                    <span for=""><?php echo $ig->username ?></span>

                                                    <?php } else { ?>
                                                
                                                    <a target="_blank" href="<?php echo base_url('admin/siswa/detail/' . $ig->id_siswa) ?>"><?= $ig->nama . ' <br> <small>NIS : ' . $ig->nis . '</small>' ?></a>

                                                    <?php } ?>
                                                </td>
                                                <td><?= $ig->nama_informasi ?></td>
                                                <td>
                                                    <?php
                                                    if ($ig->status == "decline") {

                                                        $styleBadge = "badge badge-danger";
                                                    } elseif ($ig->status == "pending") {

                                                        $styleBadge = "badge badge-info";
                                                    } else {

                                                        $styleBadge = "badge badge-success";
                                                    }
                                                    ?>
                                                    <label class="<?php echo $styleBadge ?>"><?php echo $ig->status ?></label>
                                                </td>
                                                <td>
                                                    <?php if ($ig->foto == "") : ?>
                                                        <img src="<?= base_url('assets/Gambar/Website/default_information_null.png') ?>" style="width:70px; height:70px;">
                                                    <?php else : ?>
                                                        <img src="<?= base_url('assets/Gambar/Upload/Informasi/') . $ig->foto ?>" style="width:70px; height:70px;">
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url() . 'admin/informasi_umum/detail/' . $ig->id_umum ?>" class="btn btn-xs btn-info"><i class="fas fa-eye"></i> Detail</a>
                                                    <a href="<?= base_url() . 'admin/informasi_umum/edit/' . $ig->id_umum ?>" class="btn btn-xs btn-success"><i class="fas fa-pencil-square-o"></i>Edit</a>
                                                    <a href="#" data-toggle="modal" data-target="#action-delete-<?php echo $ig->id_umum ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                                </td>
                                                <!-- Modal delete -->
                                                <div class="modal fade" id="action-delete-<?php echo $ig->id_umum ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <b>Hapus</b>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <label for="">Informasi : <span class="text-bold"><?php echo $ig->nama_informasi ?></span></label> <br>

                                                                    <hr>
                                                                    <label>
                                                                        Apakah anda yakin ingin menghapus informasi <?php echo $ig->nama_informasi ?> ?
                                                                    </label> <br>
                                                                    <small>Informasi yang telah dihapus tidak dapat dipulihkan kembali.</small>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                                    <a href="<?php echo base_url('admin/informasi_umum/onDelete/' . $ig->id_umum) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Sekarang</a>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Dibuat oleh</th>
                                            <th>Informasi</th>
                                            <th>Status</th>
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
    <br><br>