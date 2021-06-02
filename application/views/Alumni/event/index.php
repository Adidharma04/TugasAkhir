
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Event</h1>
            <p>Berbagi event menarik untuk Smanis Tracer Study</p>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('alumni/dashboard_alumni') ?>">Home</a></li>
              <li class="breadcrumb-item active">Table Event</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10 ">
            <div class="card card-row card-default">
              <?php echo $this->session->flashdata('msg') ?>
              <div class="card-body">
                <div class="card card-light card-outline">
                  <div class="card-header">
                    <h5 class="card-title">Event yang anda tambahkan</h5>
                    <div class="card-tools">
                      <a href="event/tambah" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah Event Baru</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <table class="table" width="100%">
                      <thead>
                        <tr>
                          <th style="width: 80%">Event</th>
                          <th style="width: 20% !important">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // button
                        $btnText = "Tambah Event";
                        $btnColor = "btn-primary";


                        if ($event->num_rows() > 0) {

                          foreach ($event->result() as $evn) {
                            $gambar = "";
                            if ($evn->foto) {

                              $gambar = base_url('assets/Gambar/Upload/Event/' . $evn->foto);
                            } else {
                              // default
                              $gambar = base_url('assets/Gambar/Website/default_event_null.png');
                            }
                        ?>

                            <tr>
                              <td>
                                <div class="row">
                                  <div class="col-md-3">
                                    <img src="<?php echo $gambar ?>" alt="" style="width: 100%; border: 1.5px solid #e0e0e0; border-radius: 5px">
                                  </div>
                                  <div class="col-md-9">
                                    <label for="" style="font-size: 18px;"><?php echo ucfirst($evn->nama_event) ?></label> <br>

                                    <small>"<?php echo $evn->deskripsi_event ?>"</small> <br>
                                    <hr style="margin: 5px">

                                    <label style="font-size: 13px"><i class="far fa-calendar-alt"></i> <?php echo $evn->created_at ?>
                                      <?php if ($evn->status == "pending") { ?>
                                        <span class="badge badge-info"><?php echo $evn->status ?></span>
                                      <?php } else if ($evn->status == "accept") { ?>
                                        <span class="badge badge-success"><?php echo $evn->status ?></span>
                                      <?php } else if ($evn->status == "decline") { ?>
                                        <span class="badge badge-danger"><?php echo $evn->status ?></span>
                                      <?php } ?>
                                    </label>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <br>
                                <?php
                                if($evn->status == "accept" || $evn->status == "decline" ){
                                  echo '<span class="badge badge-warning">Telah dikonfirmasi</span>'; 
                                }
                                elseif ($evn->status == "pending"){
                                ?>
                                 <a href="<?= base_url() .'alumni/event/edit/' . $evn->id_event?>" class="btn btn-xs btn-primary">Edit</a>
                                 &nbsp;
                                 <a href="#"  data-toggle="modal" data-target="#action-delete-<?php echo $evn->id_event ?>" class="btn btn-xs btn-danger">Hapus</a>
                                 <?php }?>
                              </td>
                              <!-- Modal delete -->
                            <div class="modal fade" id="action-delete-<?php echo $evn->id_event ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <b>Hapus Data</b>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <label for="">Nama Event : <span class="text"><?php echo $evn->nama_event ?></span></label> <br>
                                    <hr>
                                    <label>
                                      Apakah anda yakin ingin menghapus Event ini <?php echo $evn->nama_event ?> ?
                                    </label> <br>
                                    <small>Event yang telah dihapus tidak dapat dipulihkan kembali.</small>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <a href="<?php echo base_url('alumni/event/onDelete/' . $evn->id_event) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Sekarang</a>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            </tr>
                          <?php
                          } // end foreach

                        } else { // end if
                          ?>
                          <div class="col-md-9">
                            <div class="text-center">
                              <div class="col-md-12">
                                <img style="width: 250px" src="<?= base_url('assets/Gambar/Website/default_event_null.png') ?>">
                                <h4 style="margin: 5px">Belum ada Event</h4>
                                <small>Masukkan Event yang akan datang......</small> <br><br>
                              </div>
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
  <br><br>