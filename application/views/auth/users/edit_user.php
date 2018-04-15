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
          <form method="POST" action="<?php echo base_url('auth/users/update') ?>">
            <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
            <label>Nama</label>
            <div class="form-group">
              <input type="text" class="form-control" name="nama" value="<?php echo $user['nama'] ?>" required>
            </div>
            <label>Email</label>
            <div class="form-group">
              <input type="email" class="form-control" name="email" value="<?php echo $user['email'] ?>" required>
            </div>
            <label>Password</label>
            <div class="form-group">
              <input type="text" class="form-control" name="password" value="<?php echo $user['password'] ?>" required>
            </div>
            <label>Level</label>
            <div class="form-group">
              <select name="level" class="form-control">
                <option value="0">--Level--</option>
                <option value="admin" <?php if($user['level']== 'admin')echo "selected"; ?>>Admin</option>
                <option value="hrd" <?php if($user['level']== 'hrd')echo "selected"; ?>>HRD</option>
              </select>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Update</button>
              <a href="<?php echo base_url('auth/users') ?>" class="btn btn-default btn-block">Batal</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>