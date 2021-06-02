  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard_admin') ?>">Home</a></li>
              <li class="breadcrumb-item active">Data Pengguna</li>
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
              <div class="card-header">
                <h3 class="card-title">Table Data Pengguna</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Terakhir Login</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($profile as $prf) : ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $prf->username ?></td>
                        <td><?= $prf->level ?></td>
                        <td><?= $prf->last_logged ?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Terakhir Login</th>
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