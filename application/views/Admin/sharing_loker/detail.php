
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Detail Loker</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Detail Info Loker</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Default box -->

        <div class="col-12 col-lg-9 d-flex align-items-stretch">
          <div class="card bg-light">
            <div class="card-header text-muted border-bottom-0">
                <h2><?= $loker->nama_pekerjaan ?></h2>
                <hr>
            </div>
            <div class="card-body pt-0" style="padding-right:120.7px;">
              <div class="row">
                <div class="col-7">
                  <ul class="ml-5 mb-0 fa-ul text-muted">
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope fa-1x"></i> </span><b><h6>Deskripsi Pekerjaan</h6></b></li>
                    <span align="justify"> <p ><?= $loker->deskripsi_pekerjaan ?></p></span>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building fa-1x"></i> </span><b><h6>Alamat Perusahaan</h6></b></li>
                    <span align="justify"><p><?= $loker->alamat ?></p></span>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-clock-o fa-1x"></i> </span><b><h6>Status</h6></b> </li>
                    <span align="justify"><p><?= $loker->status ?></p></span>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar fa-1x"></i> </span><b><h6>Tanggal ditambahkan</h6></b> </li>
                    <span align="justify"><?= date('d F Y', strtotime($loker->created_at)) ?></p></span>
                  </ul>
                </div>
                <div class="col-5 text-center">
                    <?php if ($loker->foto == "") : ?>
                      <img src="<?= base_url('assets/Gambar/Website/default_job.png') ?>" style="width:230px; height:300px;">
                    <?php else : ?>
                      <img src="<?= base_url('assets/Gambar/Upload/Loker/') . $loker->foto ?>" style="width:300px; height:300px;">
                    <?php endif ?>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-right">
                <a href="<?= base_url() . 'Admin/sharing_loker' ?>" class="btn btn-sm btn-primary">
                  <i class="fas fa-arrow-left"></i> Kembali
                </a>
              </div>
            </div>
          </div>
        </div>

      </section>
      <!-- /.content -->
    </div>