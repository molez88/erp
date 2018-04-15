<section class="content">
  <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
          <div class="box-header">
            <h3 class="box-title"><?php echo $title ?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th width="12%">Jumlah</th>
                  <th width="6%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($abs as $ab) { ?>
                
                  <tr>
                    <td><?php echo $ab->nama ?></td>
                    <td><?php echo $ab->email ?></td>
                    <td><?php echo $ab->jumlah ?></td>
                    <td>
                      <a href="<?php echo base_url('auth/absen/detail/'.$ab->id_pegawai) ?>" class="btn btn-default btn-md" title="edit"><i class="fa fa-eye"></i></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th width="12%">Jumlah</th>
                  <th width="6%">Aksi</th>
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