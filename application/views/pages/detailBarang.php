                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                   	<div class="card">
					  <div class="card-header">
					  	Detail Produk
					  </div>
					  <div class="card-body">


					  	<div class="row">
					  		<div class="col-md-4">
					  			<center><img style="width:310px; height: 290px" class="img-responsive card-img-top" src="<?php echo base_url('assets/images/'. $detailBarang['gambar']) ?>"></center>
					  		</div>
					  		<div class="col-md-8">
					  			<table class="table table-striped">
					  				<tr>
					  					<td>Nama Produk</td>
					  					<td><strong><?php echo $detailBarang['nama_barang'] ?></strong></td>
					  				</tr>
					  				<tr>
					  					<td>Keterangan</td>
					  					<td><strong><?php echo $detailBarang['keterangan'] ?></strong></td>
					  				</tr>
					  				<tr>
					  					<td>Kategori</td>
					  					<td><strong><?php echo $detailBarang['nama_kategori'] ?></strong></td>
					  				</tr>
					  				<tr>
					  					<td>Stok</td>
					  					<td><strong><?php echo $detailBarang['stok'] ?></strong></td>
					  				</tr>
					  				<tr>
					  					<td>Harga</td>
					  					<td><strong class="btn btn-success">Rp. <?php echo number_format($detailBarang['harga'], 2,',','.') ?></strong></td>
					  				</tr>
					  				<tr>
					  					<td>Input QTY</td>
					  					<td><input type="number" name="qty" value="1" min="1" id="<?php echo $detailBarang['id_barang'] ?>"></td>
					  				</tr>
					  			</table>
					  			<center><button type="button" name="add_cart" class="btn btn-primary add_cart" data-idBarang="<?php echo $detailBarang['id_barang'] ?>" data-namaBarang="<?php echo $detailBarang['nama_barang'] ?>" data-photo="<?php echo $detailBarang['gambar'] ?>" data-harga="<?php echo $detailBarang['harga'] ?>">Buy</button>
								<a href="<?php echo site_url('user');?>" class="btn btn-secondary">Back</a></center>
					  		</div>
					  	</div>

					  </div>
					  
					</div>


                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->