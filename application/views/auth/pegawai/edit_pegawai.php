<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $title ?>
          </h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <button type="button" class="btn btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
            title="Collapse">
            <i class="fa fa-minus"></i></button>
          </div>
          <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body pad">
          <form method="POST" action="<?php echo base_url('auth/pegawai/update') ?>">
            <input type="hidden" name="id" value="<?php echo $pegawai['id_pegawai'] ?>">
            <label>Nama</label>
            <div class="form-group">
              <input type="text" class="form-control" name="nama" value="<?php echo $pegawai['nama'] ?>" readonly>
            </div>
            <label>Email</label>
            <div class="form-group">
              <input type="email" class="form-control" name="email" value="<?php echo $pegawai['email'] ?>" readonly>
            </div>
            <label>Jenis Kelamin</label>
            <div class="form-group">
              <div class="radio">
                <label>
                  <input <?php if($pegawai['gender'] == 'laki-laki') echo 'checked' ?> type="radio" name="gender" value="laki-laki" disabled>Laki-laki
                </label>
              </div>
              <div class="radio">
                <label>
                  <input <?php if($pegawai['gender'] == 'perempuan') echo 'checked' ?> type="radio" name="gender" value="perempuan" disabled>Perempuan
                </label>
              </div>
            </div>

            <label>Password</label>
            <div class="form-group">
              <input type="password" class="form-control" name="password" value="<?php echo $pegawai['password'] ?>" required>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Update</button>
              <a href="<?php echo base_url('auth/calon_pegawai') ?>" class="btn btn-default btn-block">Batal</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>