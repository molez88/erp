<section class="content">
  <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
          <div class="box-header">
            <h3 class="box-title"><?php echo $title ?>  &nbsp;&nbsp;<a href="<?php echo base_url('auth/requirtments/tambah_requirtment') ?>" class="btn btn-success">Tambah Requitment Pegawai</a></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Vacancy</th>
                  <th>Job Title</th>
                  <th>Penempatan</th>
                  <th>Nama</th>
                  <th width="12%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($reqs as $req) { ?>
                
                  <tr>
                    <td><?php echo $req->vacancy ?></td>
                    <td><?php echo $req->job ?></td>
                    <td><?php echo $req->lokasi ?></td>
                    <td><?php echo $req->nama; ?></td>
                    <td>
                      <a href="<?php echo base_url('auth/requirtments/edit_requirtment/'.$req->id) ?>" class="btn btn-primary btn-md" title="edit"><i class="fa fa-edit"></i></a> || 
                      <a href="<?php echo base_url('auth/requirtments/hapus_requirtment/'.$req->id) ?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-md" title="hapus"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Vacancy</th>
                  <th>Job Title</th>
                  <th>Penempatan</th>
                  <th>Nama</th>
                  <th width="12%">Aksi</th>
                </tr>
              </tfoot>
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