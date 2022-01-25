                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                    	<div class="col-sm-3 bg-dark">
                    		<h3 class="text-center text-white mt-2">Kategori</h3>

                    		<ul class="nav flex-column">
                    		<?php foreach ($kategori AS $kat) { ?>
							  <li class="nav-item">
							    <a class="nav-link text-white" href="<?php echo site_url('user/kategori/'.$kat['id_kategori']) ?>"><?php echo $kat['nama_kategori'] ?></a>
							  </li>
							<?php } ?>
							</ul>
                    	</div>	
   
                    	<div class="col-sm-9">
		                   <div class="row">

		                   	<?php
		                   	$token_name = $this->security->get_csrf_token_name();
							$token_hash = $this->security->get_csrf_hash();
		                   	 foreach ($specificKategori AS $brg) { ?>
		                   		<div class="col-sm-4 mt-2">
			                   		<div class="card">
			                   			<input type="hidden" id="csrf" name="<?php echo $token_name; ?>" value="<?php echo $token_hash; ?>" />
									  <img width="220" height="292" class="card-img-top" src="<?php echo base_url('assets/images/'.$brg['gambar']) ?>" alt="Card image cap">
									  <div class="card-body">
									    <h5 class="card-title"><?php echo $brg['nama_barang'] ?></h5>
									    <p class="card-text"><?php echo $brg['keterangan'] ?>.</p>
									    <h5 class="card-text">Rp. <?php echo number_format($brg['harga'],2,',','.') ?></h5>
									    <input type="number" name="qty" value="1" min="1" id="<?php echo $brg['id_barang'] ?>">
									    <br/><br/>
									    <?php if($this->session->userdata('email')) { ?>
									    <button type="button" name="add_cart" class="btn btn-primary add_cart" data-idBarang="<?php echo $brg['id_barang'] ?>" data-namaBarang="<?php echo $brg['nama_barang'] ?>" data-photo="<?php echo $brg['gambar'] ?>" data-harga="<?php echo $brg['harga'] ?>">Buy</button>
									    <a href="<?php echo site_url('shoppingCart/detail_product/'.$brg['id_barang']) ?>" class="btn btn-success">Detail</a>
									    <?php } else { ?>
									    <button type="button" class="btn btn-primary">Buy</button>
									    <a href="#" class="btn btn-success" disabled>Detail</a>
									    <?php } ?>
									  </div>
									</div>	
		                   		</div>
		                   	<?php } ?>

		                   </div>
                    	</div>	
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->