<section class="content">
  <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
          <div class="box-header">
            <h3 class="box-title"><?php echo $title ?>  &nbsp;&nbsp;<a href="<?php echo base_url('auth/calon_pegawai/tambah_calon_pegawai') ?>" class="btn btn-success">Tambah Pegawai</a></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th width="12%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($pegawais as $pegawai) { ?>
                
                  <tr>
                    <td><?php echo $pegawai->nama; ?></td>
                    <td><?php echo $pegawai->email ?></td>
                    <td><?php echo $pegawai->gender ?></td>
                    <td>
                      <a href="<?php echo base_url('auth/calon_pegawai/edit_calon_pegawai/'.$pegawai->id_pegawai) ?>" class="btn btn-primary btn-md" title="edit"><i class="fa fa-edit"></i></a> || 
                      <a href="<?php echo base_url('auth/calon_pegawai/hapus_calon_pegawai/'.$pegawai->id_pegawai) ?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-md" title="hapus"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Gender</th>
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