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
          <form method="POST" action="<?php echo base_url('auth/requirtments/save') ?>">
            <label>Vacancy</label>
            <div class="form-group">
              <input type="text" class="form-control" name="vacancy" required>
            </div>
            <label>Job Title</label>
            <div class="form-group">
              <select name="id_job" class="form-control">
                <option value="0">--Pilih Job Title--</option>
                <?php foreach ($jobs as $job) { ?>
                  <option value="<?php echo $job->id_job ?>"><?php echo $job->job ?></option>
                <?php } ?>
              </select>
            </div>
            <label>Penempatan</label>
            <div class="form-group">
              <select name="id_lokasi" class="form-control">
                <option value="0">--Pilih Penempatan--</option>
                <?php foreach ($loks as $lok) { ?>
                  <option value="<?php echo $lok->id_lokasi ?>"><?php echo $lok->lokasi ?></option>
                <?php } ?>
              </select>
            </div>
            <label>Calon Pegawai</label>
            <div class="form-group">
              <select name="id_pegawai" class="form-control">
                <option value="0">--Pilih Calon Pegawai--</option>
                <?php foreach ($pegawais as $pegawai) { ?>
                  <option value="<?php echo $pegawai->id_pegawai ?>"><?php echo $pegawai->nama ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Simpan</button>
              <button type="reset" class="btn btn-default btn-block">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>