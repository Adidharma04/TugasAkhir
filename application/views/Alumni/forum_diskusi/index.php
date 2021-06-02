<?php

$topik_aktif = "keseluruhan";

if ($this->input->get('tipe')) {

    $topik_aktif = $this->input->get('tipe');
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Forum Diskusi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('alumni/dashboard_alumni') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.card -->
            <?php echo $this->session->flashdata('msg') ?>

            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">Forum Diskusi</h3>
                        <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link <?php if ($topik_aktif == "keseluruhan") echo 'active'; ?>" href="?tipe=keseluruhan">Semua Forum Diskusi</a></li>

                            <?php foreach ($topik->result_array() as $row) : ?>
                                <li class="nav-item"><a class="nav-link <?php if ($topik_aktif == $row['nama']) echo 'active'; ?>" href="?tipe=<?php echo $row['nama'] ?>"><?php echo $row['nama'] ?></a></li>
                            <?php endforeach; ?>

                        </ul>
                    </div><!-- /.card-header -->
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="<?php echo base_url('alumni/Forum_diskusi/tambahForum/') ?>">
                                <button class="btn btn-primary" style="margin-left: 20px;">
                                    Tambahkan Forum
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active">

                                <?php

                                $id_profile = $this->session->userdata('sess_id_profile');
                                $level      = $this->session->userdata('sess_level');
                                ?>

                                <?php

                                $nilaiyangmuncul = array();

                                // filter 
                                foreach ($forum->result_array() as $rowF) {

                                    if ($topik_aktif == "keseluruhan") {

                                        array_push($nilaiyangmuncul, $rowF);
                                    } else if ($rowF['nama'] == $topik_aktif) {

                                        array_push($nilaiyangmuncul, $rowF);
                                    }
                                }

                                foreach ($nilaiyangmuncul as $row) { ?>
                                    <a href="<?php echo base_url('alumni/forum_diskusi/discuss/' . $row['id_forum']) ?>">
                                        <div class="card" style="padding: 5px">
                                            <div class="row">

                                                <div class="col-md-9">
                                                    <div for="" style="font-weight: bold; color: #000">
                                                        <?php echo $row['nama_forum'] ?>
                                                    </div>



                                                    <?php

                                                    if ($level == "staff_it" || $level=="bk") {

                                                        echo '
                                                                    <div class="text-sm">
                                                                        <a href="' . base_url('alumni/forum_diskusi/editForum/') . $row['id_forum'] . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil"> </i>Sunting</a> &nbsp;
                                                                        <a href="#" data-toggle="modal" data-target="#action-hapus-' . $row['id_forum'] . '" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Hapus</a>
                                                                    </div>

                                                                ';
                                                    } else {

                                                        if ($row['id_profile'] == $id_profile) {

                                                            // tampilkan button
                                                            echo '
                                                                        <div class="text-sm">
                                                                        <a href="' . base_url('alumni/forum_diskusi/editForum/') . $row['id_forum'] . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil"> </i> Sunting</a> &emsp;
                                                                        <a href="#" data-toggle="modal" data-target="#action-hapus-' . $row['id_forum'] . '" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
                                                                        </div>
                                                                        
                                                                        <!-- Modal delete -->
                                                                        <div class="modal fade" id="action-hapus-' . $row['id_forum'] . '">
                                                                            <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <b>Hapus Forum </b>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                <label>
                                                                                   Apakah anda yakin ingin menghapus Forum
                                                                                   <br> 
                                                                                         "'.$row['nama_forum'].'"
                                                                                </label> 
                                                                                <br>
                                                                                <small>Data yang telah dihapus tidak bisa di pulihkan kembali.</small>
                                                                                </div>
                                                                                <div class="modal-footer justify-content-between">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                                                <a href="' . base_url('alumni/forum_diskusi/hapusForum/') . $row['id_forum'] . '" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                                                                </div>
                                                                            </div>
                                                                            <!-- /.modal-content -->
                                                                            </div>
                                                                            <!-- /.modal-dialog -->
                                                                        </div>
                                                                        <!-- /.modal -->
                                                                        ';
                                                        }
                                                    }

                                                    ?>

                                                    <!-- End Button -->

                                                    <div class="text-sm text-muted" style="margin: 0px">
                                                        <marquee behavior="" direction="">Forum di buat pada <?php echo date('d F Y H.i A', strtotime($row['tanggal_forum'])) ?> &emsp;|&emsp; dibuat oleh <label for=""><?php echo $row['username'] ?></label></marquee>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div>

                                                        <?php

                                                        $color = "badge badge-primary";

                                                        if ($row['id_topik'] != 1) {

                                                            if (($row['id_topik'] % 2) == 0) {

                                                                $color = "badge badge-warning";
                                                            }
                                                            if (($row['id_topik'] % 3) == 0) {

                                                                $color = "badge badge-info";
                                                            }
                                                            if (($row['id_topik'] % 4) == 0) {

                                                                $color = "badge badge-success";
                                                            }
                                                        }
                                                        ?>

                                                        <span for="" class="<?php echo $color ?>"><?php echo $row['nama'] ?></span><br>
                                                        <small class="text-muted">Terdapat Komen</small>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- ./card -->
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