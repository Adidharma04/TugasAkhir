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
              <h1>Edit Tracer Kuliah</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Tracer Kuliah</li>
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
            <h3 class="card-title">Form Edit Tracer Kuliah</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            
            <input type="hidden" name="id" value="<?php echo $tracer['id_kuliah'] ?>" />
            <input type="hidden" name="tipe" value="<?php echo $tipe ?>" />
            <div class="row">
                  <div class="col-md-4">
                  <label>Nama Kampus</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                        </div>
                        <input type="text" class="form-control" id="nama_kampus" name="nama_kampus" placeholder="Masukkan Nama Kampus" value="<?php echo $tracer['nama_kampus']?>">
                    </div>
                    <?= form_error('nama_kampus','<small class="text-danger">','</small>');?>
                  </div>
                  <div class="col-md-4">
                  <label>Prodi(Program Study)</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                        </div>
                        <input type="text" class="form-control" name="program_studi" id="program_studi" placeholder="Masukkan Program Study" value="<?php echo $tracer['program_studi']?>">
                    </div>
                    <?= form_error('program_studi','<small class="text-danger">','</small>');?>
                  </div>
                  <div class="col-md-4">
                  <label>Jurusan</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                        </div>
                        <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Masukkan Jurusan" value="<?php echo $tracer['jurusan']?>" >
                    </div>
                    <?= form_error('jurusan','<small class="text-danger">','</small>');?>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                    <label>Tahun Masuk</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="Masukkan Tahun Masuk" value="<?php echo $tracer['tahun_masuk']?>">
                    </div>
                    <?= form_error('tahun_masuk','<small class="text-danger">','</small>');?>
                  </div>
                  <div class="col-md-6">
                    <label>Tahun lulus</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus" placeholder="Masukkan Tahun Lulus" value="<?php echo $tracer['tahun_lulus']?>" >
                    </div>
                    <?= form_error('tahun_lulus','<small class="text-danger">','</small>');?>
                  </div>
                  
              </div>
               <!-- Batas Baris -->
               <div class="form-group">
                    <label for="status">Jalur Penerimaan</label>
                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="snmptn" <?php if ( $tracer['jalur_penerimaan'] == "snmptn" ) echo 'checked'; ?> > SNMPTN 
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="sbmptn" <?php if ( $tracer['jalur_penerimaan'] == "sbmptn" ) echo 'checked'; ?>> SBMPTN
                    </div>

                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="snmpn" <?php if ( $tracer['jalur_penerimaan'] == "snmpn" ) echo 'checked'; ?>> SNMPN
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="sbmpn" <?php if ( $tracer['jalur_penerimaan'] == "sbmpn" ) echo 'checked'; ?>> SBMPN
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="mandiri" <?php if ( $tracer['jalur_penerimaan'] == "mandiri" ) echo 'checked'; ?>> Mandiri
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="ikatan_dinas" <?php if ( $tracer['jalur_penerimaan'] == "ikatan_dinas" ) echo 'checked'; ?>> Ikatan Dinas
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jalur_penerimaan" value="kedinasan" <?php if ( $tracer['jalur_penerimaan'] == "kedinasan" ) echo 'checked'; ?>> Kedinasan
                    </div>
                    <?= form_error('jalur_penerimaan','<small class="text-danger">','</small>');?>
                </div>
              <div class="row">
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <span> <a href="<?= base_url("alumni/tracer")?>" class="btn btn-danger">Cancel</a></span>
                  </div>
              </div>

            </form>
          </div>
          <!-- /.card-body -->
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