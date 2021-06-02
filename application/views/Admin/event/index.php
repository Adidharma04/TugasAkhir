  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Event</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard_admin') ?>">Home</a></li>
              <li class="breadcrumb-item active">Table Event</li>
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
              <div class="card-header">
                <h3 class="card-title">Table Event</h3>
              </div>
              <!-- /.card-header -->
              <div class="col-md-3">
                <a href='<?php echo base_url('admin/event/tambah') ?>'><button type="button" class="btn btn-outline-primary btn-block"><i class="fa fa-plus"></i> Tambah</button></a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Dibuat oleh</th>
                      <th>Event</th>
                      <th>Tanggal Event</th>
                      <th>Lokasi</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($event->result() as $evn) : ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td>
                        <?php if ( $evn->level == "staff" ) { ?>                          
                        
                         <small>Dibuat oleh : </small> <br>
                            <span for=""><?php echo $evn->username ?></span>
                          <?php } else { ?>
                          <a target="_blank" href="<?php echo base_url('admin/siswa/detail/' . $evn->id_siswa) ?>"><?= $evn->nama . ' <br> <small>NIS : ' . $evn->nis . '</small>' ?></a></td>
                          <?php } ?>

                        <td><?= $evn->nama_event ?></td>
                        <td><?= date('d F Y', strtotime($evn->tanggal_event)) ?></td>
                        <td><?= $evn->lokasi ?></td>
                        <td>
                            <?php

                            if ($evn->status == "decline") {

                              $styleBadge = "badge badge-danger";
                            } elseif ($evn->status == "pending") {

                              $styleBadge = "badge badge-info";
                            } else {

                              $styleBadge = "badge badge-success";
                            }
                            ?>
                            <label class="<?php echo $styleBadge ?>"><?php echo $evn->status ?></label>
                        </td>
                        <td>
                          <a href="<?= base_url() . 'admin/event/detail/' . $evn->id_event ?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i> Detail</a>
                          <a href="<?= base_url() . 'admin/event/edit/' . $evn->id_event ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i>Edit</a>
                          <a href="#" data-toggle="modal" data-target="#action-delete-<?php echo $evn->id_event ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                        <!-- Modal delete -->
                        <div class="modal fade" id="action-delete-<?php echo $evn->id_event ?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <b>Hapus</b>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <label for="">Nama Event : <span class="text-bold"><?php echo $evn->nama_event ?></span></label> <br>

                                  <hr>
                                  <label>
                                    Apakah anda yakin ingin menghapus Event ini <?php echo $evn->nama_event ?> ?
                                  </label> <br>
                                  <small>Event yang telah dihapus tidak dapat dipulihkan kembali.</small>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                  <a href="<?php echo base_url('admin/event/onDelete/' . $evn->id_event) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Sekarang</a>
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
                      <th>Event</th>
                      <th>Tanggal Event</th>
                      <th>Lokasi</th>
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