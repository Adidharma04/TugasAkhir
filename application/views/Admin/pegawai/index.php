    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Informasi Pegawai</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/dashboard_admin') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Data Pegawai</li>
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
                                <h3 class="card-title">Table Informasi Pegawai</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Induk (Opsional)</th>
                                            <th>Nama Pegawai</th>
                                            <th>Alamat Pegawai</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach ($profil_pegawai as $pgw) : ?>
                                        <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $pgw->no_induk ?></td>
                                                <td><?= $pgw->nama ?></td>
                                                <td><?= $pgw->alamat ?></td>
                                                <td>
                                                    <a href="<?= base_url().'Admin/pegawai/detail/'.$pgw->id_pegawai ?>" class="btn btn-xs btn-info"><i class="fas fa-eye"></i> Detail</a>
                                                    <a href="<?= base_url().'Admin/pegawai/edit/'.$pgw->id_pegawai ?>" class="btn btn-xs btn-success"><i class="fas fa-pencil-square-o"></i>Edit</a>
                                                    <a href="#"  data-toggle="modal" data-target="#action-delete-<?php echo $pgw->id_pegawai ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                                    <!-- Modal delete -->
                                                    <div class="modal fade" id="action-delete-<?php echo $pgw->id_pegawai ?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <b>Hapus data Pegawai</b>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="">NIK : <span class="text-bold"><?php echo $pgw->no_induk ?></span></label> <br>
                                                                <label for="">NAMA : <span class="text-bold"><?php echo $pgw->nama ?></span></label>
                                                                <hr>
                                                                <label>
                                                                    Apakah anda yakin ingin menghapus pegawai atas nama <?php echo $pgw->nama ?> ? 
                                                                </label> <br>
                                                                <small>Pegawai yang telah dihapus tidak dapat dipulihkan kembali.</small>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                                <a href="<?php echo base_url('admin/pegawai/onDelete/'. $pgw->id_profile) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Sekarang</a>
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
                                            <th>No Induk (Opsional)</th>
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