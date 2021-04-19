<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>

</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sharing Loker </h1>
            <p>Deskripsi Sharing Loker</p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Alumni/dashboard_alumni') ?>">Home</a></li>
              <li class="breadcrumb-item active">Sharing Loker </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">

        <div class="row">
          <div class="col-md-10 offset-1">
            <div class="card card-row card-default">

              <div class="card-body">
                <div class="card card-light card-outline">
                  <div class="card-header">
                    <h5 class="card-title">Detail Sharing Loker</h5>
                    <div class="card-tools">
                      <a href="sharing_loker/tambah" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah Sharing Loker Baru</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <table class="table" width="100%">
                      <thead>
                        <tr>
                          <th style="width: 80%">Sharing Loker</th>
                          <th style="width: 20% !important">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // button
                        $btnText = "Tambah Informasi";
                        $btnColor = "btn-primary";


                        if ($loker->num_rows() > 0) {

                          foreach ($loker->result() as $jv) {
                            $gambar = "";
                            if ($jv->foto) {

                              $gambar = base_url('assets/Gambar/Upload/Loker/' . $jv->foto);
                            } else {
                              // default
                              $gambar = base_url('assets/Gambar/Website/default_loker_null.png');
                            }
                        ?>

                            <tr>
                              <td>
                                <div class="row">
                                  <div class="col-md-3">
                                    <img src="<?php echo $gambar ?>" alt="" style="width: 100%; border: 1.5px solid #e0e0e0; border-radius: 5px">
                                  </div>
                                  <div class="col-md-9">
                                    <label for="" style="font-size: 18px;"><?php echo ucfirst($jv->nama_pekerjaan) ?></label> <br>
                                    <small>"<?php echo $jv->deskripsi_pekerjaan ?>"</small> <br>
                                    <hr style="margin: 5px">
                                    <label style="font-size: 13px"><i class="far fa-calendar-alt"></i> <?php echo $jv->created_at ?>
                                      <?php if ($jv->status == "pending") { ?>
                                        <span class="badge badge-info"><?php echo $jv->status ?></span>
                                      <?php } else if ($jv->status == "accept") { ?>
                                        <span class="badge badge-success"><?php echo $jv->status ?></span>
                                      <?php } else if ($jv->status == "decline") { ?>
                                        <span class="badge badge-danger"><?php echo $jv->status ?></span>
                                      <?php } ?>
                                    </label>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <br>
                                <small>Ubah Sharing Loker</small><br>
                                <a href="<?= base_url() . 'alumni/sharing_loker/edit/' . $jv->id_loker ?>" class="btn btn-sm btn-warning">Sunting</a>
                                &nbsp;
                                <a href="#" data-toggle="modal" data-target="#action-delete-<?php echo $jv->id_loker ?>" class="btn btn-sm btn-warning">Hapus</a>
                              </td>
                            </tr>
                            <!-- Modal delete -->
                            <div class="modal fade" id="action-delete-<?php echo $jv->id_loker ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <b>Hapus Data</b>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <label for="">Nama Pekerjaan : <span class="text-bold"><?php echo $jv->nama_pekerjaan ?></span></label> <br>

                                    <hr>
                                    <label>
                                      Apakah anda yakin ingin menghapus informasi loker <?php echo $jv->nama_pekerjaan ?> ?
                                    </label> <br>
                                    <small>Informasi Loker yang telah dihapus tidak dapat dipulihkan kembali.</small>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <a href="<?php echo base_url('alumni/sharing_loker/onDelete/' . $jv->id_loker) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Sekarang</a>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                          <?php
                          } // end foreach

                        } else { // end if
                          ?>
                          <div class="col-md-9">
                            <div class="text-center">
                              <img style="width: 250px" src="<?= base_url('assets/Gambar/Website/default_loker_null.png') ?>">
                              <h4 style="margin: 5px">Belum ada Sharing Loker</h4>
                              <small>Masukkan Loker yang akan datang......</small> <br><br>
                            </div>
                          </div>
                        <?php
                        }
                        ?>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</body>

</html>