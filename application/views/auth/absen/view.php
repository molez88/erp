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
        	<h3 class="box-title"><?php echo $nama['nama'] ?></h3>
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
	            <?php foreach ($details as $detail) { ?>
	            	<tr>
	                	<td><?php echo $detail['tanggal'] ?></td>
	                	<td><?php echo $detail['jam_masuk'] ?></td>
	                	<td><?php echo $detail['jam_keluar'] ?></td>
	                	<td><?php echo $detail['note'] ?></td>
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