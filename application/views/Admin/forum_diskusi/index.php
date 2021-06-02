<?php

    $topik_aktif = "keseluruhan";

    if ( $this->input->get('tipe') ) {

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
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard_admin') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Forum Diskusi</li>
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
                <div class="row">
                    <div class="col-md-4">
                        <!-- DIRECT CHAT -->
                        <div class="card direct-chat direct-chat-warning">
                            <div class="card-header">
                                <h3 class="card-title">Topik Forum Diskusi</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages">
                                    <a href="javascript:;" data-toggle="modal" data-target="#tambah-topik" class="btn btn-primary">Tambah Topik</a>
                                    <hr>
                                    <ul>
                                        <?php foreach ($topik->result_array() as $row) : ?>
                                            <li style="border-bottom: 1px solid #e0e0e0; padding: 5px"><?php echo $row['nama'] ?> <br> <small>Pembuatan <?php echo date('d M Y H.i A', strtotime($row['created_at'])) ?></small></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div><!-- /.chat Message -->
                            </div><!-- /.card body -->

                            <!-- Modal tambah topik -->
                            <div class="modal fade" id="tambah-topik">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">

                                        <form action="<?php echo base_url('admin/forum_diskusi/prosestambah') ?>" method="POST">
                                            <div class="modal-body">
                                                <h3 style="margin: 0px">Tambah topik baru</h3>
                                                <small>Isi form topik baru dibawah ini</small> <br><br>

                                                <div class="form-group">
                                                    <label for="">Nama Topik Baru</label>
                                                    <textarea name="topik" id="" class="form-control" placeholder="Masukkan topik baru . . ." required=""></textarea>
                                                </div>

                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

                        </div><!-- /.direct chat -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-8">
                        <!-- Custom Tabs -->
                        <div class="card">
                            <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3">Forum Diskusi</h3>
                                <ul class="nav nav-pills ml-auto p-2">
                                    <li class="nav-item"><a class="nav-link <?php if ( $topik_aktif == "keseluruhan" ) echo 'active'; ?>" href="?tipe=keseluruhan">Semua Forum Diskusi</a></li>
                                    
                                    <?php foreach ($topik->result_array() as $row) : ?>
                                    <li class="nav-item"><a class="nav-link <?php if ( $topik_aktif == $row['nama'] ) echo 'active'; ?>" href="?tipe=<?php echo $row['nama'] ?>"><?php echo $row['nama'] ?></a></li>
                                    <?php endforeach; ?>
                                    
                                </ul>
                            </div><!-- /.card-header -->
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="<?php echo base_url('admin/Forum_diskusi/tambahForum/') ?>">
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
                                            foreach ( $forum->result_array() AS $rowF ) {

                                                if ( $topik_aktif == "keseluruhan" ) {

                                                    array_push( $nilaiyangmuncul, $rowF );

                                                } else if ( $rowF['nama'] == $topik_aktif ){

                                                    array_push( $nilaiyangmuncul, $rowF );
                                                }
                                            }

                                        foreach ($nilaiyangmuncul as $row) { ?>
                                            <a href="<?php echo base_url('admin/forum_diskusi/discuss/' . $row['id_forum']) ?>">
                                                <div class="card" style="padding: 5px">
                                                    <div class="row">

                                                        <div class="col-md-9">
                                                            <div for="" style="font-weight: bold; color: #000">
                                                                <?php echo $row['nama_forum'] ?>
                                                            </div>

                                                            <?php 
                                                            
                                                            if ( $level == "staff" || $level == "bk" ) {

                                                                echo '
                                                                    <div class="text-sm">
                                                                    <a href="'.base_url('admin/forum_diskusi/editForum/').$row['id_forum'].'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"> </i>Sunting</a> &nbsp;
                                                                    <a href="#" data-toggle="modal" data-target="#action-hapus-'.$row['id_forum'].'" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Hapus</a>
                                                                    </div>

                                                                    <!-- Modal delete -->
                                                                    <div class="modal fade" id="action-hapus-'.$row['id_forum'].'">
                                                                        <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                            <b>Hapus</b>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <label>
                                                                                Apakah anda yakin ingin menghapus forum ?
                                                                                <br>- '.$row['nama_forum'].'
                                                                            </label> <br>
                                                                            <small>Data yang di hapus tidak bisa di kembalikan.</small>
                                                                            </div>
                                                                            <div class="modal-footer justify-content-between">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                                            <a href="'.base_url('admin/forum_diskusi/hapusForum/').$row['id_forum'].'" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.modal-content -->
                                                                        </div>
                                                                        <!-- /.modal-dialog -->
                                                                    </div>
                                                                    <!-- /.modal -->

                                                                ';
                                                                
                                                            } else {

                                                                if ( $row['id_profile'] == $id_profile ) {

                                                                    // tampilkan button
                                                                    echo '
                                                                        <div class="text-sm">
                                                                            <a href="">Sunting</a> &emsp;
                                                                            <a href="">Hapus</a>
                                                                        </div>';
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
                                                                    
                                                                    if ( $row['id_topik'] != 1)  {

                                                                        if ( ($row['id_topik'] % 2) == 0 ) {

                                                                            $color = "badge badge-warning";
                                                                        }
                                                                            if ( ($row['id_topik'] % 3) == 0 ) {

                                                                                $color = "badge badge-info";
                                                                            }
                                                                                if ( ($row['id_topik'] % 4) == 0 ) {

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
    <br><br>
