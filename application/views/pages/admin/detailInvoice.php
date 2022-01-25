                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                   	<div class="card">
					  <div class="card-header">
					  	<h5 class="text-info">Detail Invoice: <strong><?php echo $invoice['id_invoice'] ?></strong></h5>
					  </div>
					  <div class="card-body">


					  	<div class="row">
					  		<div class="col-md-12">
					  			<table class="table table-striped">
					  				<h5 class="text-info">Atas Nama: <strong><?php echo $invoice['nama_lengkap'] ?></strong></h5>
					  				<thead>
					  					<tr>
						  					<th>ID Barang</th>
						  					<th>Nama Barang</th>
						  					<th>Jumlah Pesanan</th>
						  					<th>Harga Satuan</th>
						  					<th>Total</th>
						  				</tr>
					  				</thead>

					  				<tbody>
						  			<?php 
							  		$subtotal=0; 
							 		foreach ($pesanan AS $psn) { 
							 			$total=$psn['harga']*$psn['jumlah'];
						 				// $subtotal=$subtotal+$total;
						 				$subtotal += $total;
						 				?>
					 					<tr>
						  					<td><strong><?php echo $psn['id_barang'] ?></strong></td>
						  					<td><strong><?php echo $psn['nama_barang'] ?></strong></td>
						  					<td><strong><?php echo $psn['jumlah'] ?></strong></td>
						  					<td><strong>Rp. <?php echo number_format($psn['harga'], 2,',','.') ?></strong></td>
						  					<td class="bg-success text-white"><strong>Rp. <?php echo number_format($total, 2,',','.') ?></strong></td>
						  				</tr>
						  				<tr>	
						 			<?php } ?>
						 			<tr>
						 			<td colspan="4" align="right"><strong>Grand Total</strong></td>
						 			<td><strong>Rp. <?php echo number_format($subtotal, 2,',','.') ?></strong></td>
						 		</tr>

						 			</tr>
					  				</tbody>
					  			</table>
					  			<center><a href="<?php echo site_url('invoice');?>" class="btn btn-secondary">Back</a></center>
					  		</div>
					  	</div>

					  </div>
					  
					</div>


                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->