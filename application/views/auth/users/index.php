<section class="content">
  <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
          <div class="box-header">
            <h3 class="box-title"><?php echo $title ?>  &nbsp;&nbsp;<a href="<?php echo base_url('auth/users/tambah_user') ?>" class="btn btn-success">Tambah User</a></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Level</th>
                  <th width="12%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                 foreach ($users as $user) { ?>
                
                  <tr>
                    <td><?php echo $i++?>.</td>
                    <td><?php echo $user->nama ?></td>
                    <td><?php echo $user->email ?></td>
                    <td><?php echo $user->password ?></td>
                    <td><?php echo $user->level; ?></td>
                    <td>
                      <a href="<?php echo base_url('auth/users/edit_user/'.$user->id) ?>" class="btn btn-primary btn-md" title="edit"><i class="fa fa-edit"></i></a> || 
                      <a href="<?php echo base_url('auth/users/hapus_user/'.$user->id) ?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-md" title="hapus"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      <!-- /.box -->
    </div>
    <!-- /.col-->
  </div>
  <!-- ./row -->
</section>