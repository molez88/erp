<section class="content-header">
  <h1>
    <?php echo $title ?>
  </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
      	<div class="box-header with-border">
        	<h3 class="box-title">Informasi</h3>
      	</div>
      	<div class="box-body custom-box-body">
      		<form action="<?php echo base_url('pegawai/absen/save') ?>" method="POST">
      			<div class="row">
      				<div class="col-md-5">
      					<input type="text" class="form-control" name="note" placeholder="keterangan ...">
      				</div>
      				<div class="col-md-2">
      					<button type="submit" class="btn btn-primary" name="btn" value="in" <?php echo $info['in'] ?>>ABSEN MASUK</button>
      				</div>
      				<div class="col-md-2">
      					<button type="submit" class="btn btn-primary" name="btn" value="out" <?php echo $info['out'] ?>>ABSEN KELUAR</button>
      				</div>
      			</div>
      		</form>
      	</div>
      </div>
      <div class="box">
      	<div class="box-header with-border">
        	<h3 class="box-title">List Absensi</h3>
      	</div>
      	<div class="box-body">
      		<table id="example1" class="table table-bordered table-striped">
	            <thead>
		            <tr>
		              <th>Tanggal</th>
		              <th>Jam Masuk</th>
		              <th>Jam Keluar</th>
		              <th>Keterangan</th>
		            </tr>
	            </thead>
	            <tbody>
	            <?php foreach ($abs as $ab) { ?>
	            	<tr>
	                	<td><?php echo $ab->tanggal ?></td>
	                	<td><?php echo $ab->jam_masuk ?></td>
	                	<td><?php echo $ab->jam_keluar ?></td>
	                	<td><?php echo $ab->note ?></td>
	              	</tr>
	            <?php } ?>
	              	
	            </tbody>
	            <tfoot>
		            <tr>
		              <th>Tanggal</th>
		              <th>Jam Masuk</th>
		              <th>Jam Keluar</th>
		              <th>Keterangan</th>
	            </tfoot>
	        </table>
      	</div>
      </div>
    </div>
</section>