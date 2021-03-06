<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin//plugins/daterangepicker/daterangepicker.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/dist/css/adminlte.min.css' ?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/plugins/select2/css/select2.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url() . 'assets/Template/Admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css' ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Data Siswa</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Siswa</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-header" style="background-color:blanchedalmond">
            <h3 class="card-title">Form Edit Siswa</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <?php echo $this->session->flashdata('msg') ?>

            <form action="" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <label>Nis</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                    </div>
                    <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan Nomer Induk Siswa" value="<?= $information_student->nis; ?>">
                    <?= form_error('nis', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="nama">Nama</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="<?= $information_student->nama; ?>">
                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <!-- Batas Baris -->
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="6" placeholder="Masukkan Alamat"> <?= $information_student->alamat; ?></textarea>
                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <!-- Batas Baris -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tanggal lahir:(Month/Day/Year)</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $information_student->tanggal_lahir; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Tempat lahir:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                    </div>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="<?= $information_student->tempat_lahir; ?>">
                    <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <!-- Batas Baris -->
              <div class="row">
                  <div class="col-md-4">
                      <label>Email:</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                          </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Examample@gmail.com" value="<?= $information_student->email; ?>">
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <label>No Telfon</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                          </div>
                        <input type="number" class="form-control" id="no_telfon" name="no_telfon" placeholder="08xxxxxxx" value="<?= $information_student->no_telfon; ?>">
                      </div>
                  </div>
                  <div class="col-md-4">
                    <label>Tahun Lulus</label>
                    <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                          </div>
                        <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus" placeholder="Masukkan Tahun Lulus" value="<?= $information_student->tahun_lulus; ?>">
                        <?= form_error('tahun_lulus', '<small class="text-danger">', '</small>'); ?>
                    </div>
                  </div>
               </div>
              <!-- Batas Baris -->
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <h4>Foto Siswa</h4>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="foto" value="<?= $information_student->foto; ?>">
                        <label class="custom-file-label" for="foto">
                          <?php
                          $img = base_url('assets/Gambar/Website/default_siswa.jpg');
                          if ($information_student->foto == "") : ?>
                            Choose File
                          <?php else : ?>
                            <?= $information_student->foto;
                            $img = base_url('assets/Gambar/Upload/Siswa/' . $information_student->foto); ?>
                          <?php endif ?>
                        </label>
                      </div>
                    </div>
                    <small>Tambahkan foto apabila dibutuhkan</small>
                  </div>
                </div>
                <div class="col-md-4">
                  <img src="<?php echo $img ?>" alt="preview" style="width: 30%; border-radius: 5px; border: 2px solid #e0e0e0">
                </div>
              </div>
              <!-- Batas Baris -->
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <?php if ($information_student->jurusan == "ipa") : ?>
                      <div class="form-check">
                        <input type="radio" name="jurusan" value="ipa" checked> Ipa
                      </div>
                      <div class="form-check">
                        <input type="radio" name="jurusan" value="ips"> Ips
                      </div>
                    <?php else : ?>
                      <div class="form-check">
                        <input type="radio" name="jurusan" value="ipa"> Ipa
                      </div>
                      <div class="form-check">
                        <input type="radio" name="jurusan" value="ipa" checked> Ips
                      </div>
                    <?php endif ?>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="alumni">Verifikasi Alumni</label>
                      <?php if ($information_student->verifikasi_alumni == "null") : ?>
                          <div class="form-check">
                            <input type="radio" name="verifikasi_alumni" value="null" checked> Kosong
                          </div>
                          <div class="form-check">
                            <input type="radio" name="verifikasi_alumni" value="pengajuan"> Pengajuan
                          </div>
                          <div class="form-check">
                            <input type="radio" name="verifikasi_alumni" value="diterima"> Diterima
                          </div>
                      <?php elseif ($information_student->verifikasi_alumni == "pengajuan") : ?>
                          <div class="form-check">
                            <input type="radio" name="verifikasi_alumni" value="null" > Kosong
                          </div>
                          <div class="form-check">
                            <input type="radio" name="verifikasi_alumni" value="pengajuan" checked> Pengajuan
                          </div>
                          <div class="form-check">
                            <input type="radio" name="verifikasi_alumni" value="diterima"> Diterima
                          </div>
                      <?php else : ?>
                          <div class="form-check">
                            <input type="radio" name="verifikasi_alumni" value="null" > Kosong
                          </div>
                          <div class="form-check">
                            <input type="radio" name="verifikasi_alumni" value="pengajuan"> Pengajuan
                          </div>
                          <div class="form-check">
                            <input type="radio" name="verifikasi_alumni" value="diterima" checked> Diterima
                          </div>
                      <?php endif ?>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="gender">Jenis Kelamin</label>
                      <?php if ($information_student->jenis_kelamin == "laki") : ?>
                          <div class="form-check">
                            <input type="radio" name="jenis_kelamin" value="laki" checked> Laki-Laki
                          </div>
                          <div class="form-check">
                            <input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan
                          </div>
                      <?php else : ?>
                          <div class="form-check">
                            <input type="radio" name="jenis_kelamin" value="laki"> Laki-Laki
                          </div>
                          <div class="form-check">
                            <input type="radio" name="jenis_kelamin" value="perempuan" checked> Perempuan
                          </div>
                      <?php endif ?>
                  </div>
                </div>

              </div>
              <!-- Batas Baris -->
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            SMAN 1 PLOSO JOMBANG
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
</body>
<!-- Select2 -->
<script src="<?= base_url('assets/Template/Admin/plugins/select2/js/select2.full.min.js') ?>"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url('assets/Template/Admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/Template/Admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
      format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function() {
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function() {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false;

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template");
  previewNode.id = "";
  var previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  });

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() {
      myDropzone.enqueueFile(file);
    };
  });

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
  });

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
  });

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
  });

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
  };
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true);
  };
  // DropzoneJS Demo Code End
</script>

</html>