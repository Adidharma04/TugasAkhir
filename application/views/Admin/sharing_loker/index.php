
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Informasi Lowongan Pekerjaan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard_admin') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Table Loker</li>
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
                                <h3 class="card-title">Table Informasi Lowongan Pekerjaan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="col-md-3">
                                <a href='<?php echo base_url('admin/sharing_loker/tambah') ?>'><button type="button" class="btn btn-outline-primary btn-block"><i class="fa fa-plus"></i> Tambah</button></a>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Dibuat oleh</th>
                                            <th>Pekerjaan</th>
                                            <th>Alamat</th>
                                            <th>Status</th>
                                            <th>Foto</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($loker->result() as $job) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td>
                                                    <?php if ( $job->level == "staff" ) { ?>
                                                    
                                                    <small>Dibuat oleh : </small> <br>
                                                    <span for=""><?php echo $job->username ?></span>

                                                    <?php } else { ?>
                                                <a target="_blank" href="<?php echo base_url('admin/siswa/detail/' . $job->id_siswa) ?>"><?= $job->nama . ' <br> <small>NIS : ' . $job->nis . '</small>' ?></a></td>
                                                <?php } ?>
                                                </td>
                                                <td><?= $job->nama_pekerjaan ?></td>
                                                <td><?= $job->alamat ?></td>
                                                <td>
                                                    <?php
                                                        if ($job->status == "decline") {

                                                            $styleBadge = "badge badge-danger";
                                                        } elseif ($job->status == "pending") {

                                                            $styleBadge = "badge badge-info";
                                                        } else {

                                                            $styleBadge = "badge badge-success";
                                                        }
                                                    ?>
                                                    <label class="<?php echo $styleBadge ?>"><?php echo $job->status ?></label>
                                                </td>
                                                <td>
                                                    <?php if ($job->foto == "") : ?>
                                                        <img src="<?= base_url('assets/Gambar/Website/default_job.png') ?>" style="width:70px; height:70px;">
                                                    <?php else : ?>
                                                        <img src="<?= base_url('assets/Gambar/Upload/Loker/') . $job->foto ?>" style="width:70px; height:70px;">
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url() . 'admin/sharing_loker/detail/' . $job->id_loker ?>" class="btn btn-xs btn-info"><i class="fas fa-eye"></i> Detail</a>
                                                    <a href="<?= base_url() . 'admin/sharing_loker/edit/' . $job->id_loker ?>" class="btn btn-xs btn-success"><i class="fas fa-pencil-square-o"></i>Edit</a>
                                                    <a href="#" data-toggle="modal" data-target="#action-delete-<?php echo $job->id_loker ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                                </td>
                                                <!-- Modal delete -->
                                                <div class="modal fade" id="action-delete-<?php echo $job->id_loker ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <b>Hapus</b>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <label for="">Nama Pekerjaan : <span class="text-bold"><?php echo $job->nama_pekerjaan ?></span></label> <br>

                                                                    <hr>
                                                                    <label>
                                                                        Apakah anda yakin ingin menghapus informasi loker <?php echo $job->nama_pekerjaan ?> ?
                                                                    </label> <br>
                                                                    <small>Informasi Loker yang telah dihapus tidak dapat dipulihkan kembali.</small>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                                    <a href="<?php echo base_url('admin/sharing_loker/onDelete/' . $job->id_loker) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Sekarang</a>
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
                                            <th>Pekerjaan</th>
                                            <th>Alamat</th>
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