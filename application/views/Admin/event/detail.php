
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Detail Event</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Detail Event</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Default box -->

        <div class="col-md-12 col-lg-9 d-flex align-items-stretch">
          <div class="card bg-light">
            <div class="card-header text-muted border-bottom-0">
                <h2><?= $event->nama_event ?></h2>
                <hr>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-6">
                  <ul class="ml-5 mb-0 fa-ul text-muted">
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope fa-1x"></i> </span><b><h6>Deskripsi Kegiatan</h6></b></li>
                    <span align="justify"> <p ><?= $event->deskripsi_event ?></p></span>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar fa-1x"></i> </span><b><h6>Tanggal Kegiatan</h6></b></li>
                    <span align="justify"><p><?= $event->tanggal_event ?></p></span>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-map-marker fa-1x"></i> </span><b><h6>Lokasi</h6></b> </li>
                    <span align="justify"><p><?= $event->lokasi ?></p></span>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-clock-o fa-1x"></i> </span><b><h6>Status</h6></b> </li>
                    <span align="justify"><p><?= $event->status ?></p></span>
                    <br>
                  </ul>
                </div>
                <div class="col-md-4 ">
                    <?php if ($event->foto == "") : ?>
                      <img src="<?= base_url('assets/Gambar/Website/default_event_null.png') ?>" style="width:100%; height:100%;">
                    <?php else : ?>
                      <img src="<?= base_url('assets/Gambar/Upload/Event/') . $event->foto ?>" style="width:100%; height:width:150px;" >
                    <?php endif ?>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-right">
                <a href="<?= base_url() . 'admin/event' ?>" class="btn btn-sm btn-primary">
                  <i class="fas fa-arrow-left"></i> Kembali
                </a>
              </div>
            </div>
          </div>
        </div>

      </section>
      <!-- /.content -->
    </div>
    <br><br>