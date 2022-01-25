 <div class="container mt-2 pt-1 pb-2">
    <div class="row">
        <div class="col-sm-12">


        <?php
        $grandTotal=0;
        $pesanan=$this->cart->contents();
        if($pesanan) { ?>
         	<?php foreach($pesanan AS $psn) { 
         		$grandTotal=$grandTotal+($psn['qty'] * $psn['price']);
        	 } ?>

         	<center><div class="btn btn-success mb-2">Total: Rp. <?php echo number_format($grandTotal,2,',','.'); ?></div></center>

  

        	<center><h3 class="mt-1 pb-2">Input Alamat Pembayaran</h3></center>
	        <?php echo form_open_multipart('shoppingCart/pembayaran'); ?>
			  <div class="form-group row">
			  	<div class="col-sm-2">
			     	
			    </div>
			    <div class="col-sm-2">
			    	<label for="Nama" class="col-form-label">Atas Nama</label>
			    </div>
			    <div class="col-sm-8">
			      <input readonly type="text" name="name" class="form-control" value="<?php echo $user['nama_user'] ?>">
			    </div>
			  </div>
			  <div class="form-group row">
			  	<div class="col-sm-2">
			     	<?php echo form_error('alamat', '<p class="text-danger col-form-label">','</p>') ?>
			    </div>
			  	<div class="col-sm-2">
			  		<label for="Alamat" class="col-form-label">Alamat Lengkap</label>
			  	</div>
			  	<div class="col-sm-8">
			  	<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo set_value('alamat'); ?>">
			  	</div> 
			  </div>
			  <div class="form-group row">
			  	<div class="col-sm-2">
			     	<?php echo form_error('telp1', '<p class="text-danger col-form-label">','</p>') ?>
			    </div>
			  	<div class="col-sm-2">
			  		<label for="telp1" class="col-form-label">Nomor Telepon</label>
			  	</div>
			  	<div class="col-sm-8">
			  	<input type="text" name="telp1" class="form-control" placeholder="Telepon 1" value="<?php echo set_value('telp1'); ?>">
			  	</div> 
			  </div>
			  <div class="form-group row">
			  	<div class="col-sm-2">
			     	<?php echo form_error('telp2', '<p class="text-danger col-form-label">','</p>') ?>
			    </div>
			  	<div class="col-sm-2">
			  		<label for="telp2" class="col-form-label">Nomor Telepon 2</label>
			  	</div>
			  	<div class="col-sm-8">
			  	<input type="text" name="telp2" class="form-control" placeholder="Telepon 2" value="<?php echo set_value('telp2'); ?>">
			  	</div> 
			  </div>

			  <div class="form-group row">
			  	<div class="col-sm-2">
			     	
			    </div>
			  	<div class="col-sm-2">
			  		  <label for="Jasa Pengiriman" class="col-sm-2 col-form-label">Jasa Pengiriman</label>
			  	</div>
			  	<div class="col-sm-8">
			  		<select class="form-control" name="pengiriman">
				      	<option>Gojek</option>
				      	<option>Grab</option>
				      	<option>Tiki</option>
				      	<option>JNE</option>
				     </select>
			  	</div> 
			  </div>

			   <div class="form-group row">
			  	<div class="col-sm-2">
			     	
			    </div>
			  	<div class="col-sm-2">
			  		<label for="Metode Pembayaran" class="col-sm-2 col-form-label">Jasa Pengiriman</label>
			  	</div>
			  	<div class="col-sm-8">
			  		<select class="form-control" name="metodePembayaran">
				      	<option>BCA</option>
				      	<option>BNI</option>
				      	<option>BRI</option>
				      	<option>Mandiri</option>
			      </select>
			  	</div> 
			  </div>
			  
			  <div class="form-group">
			    <center><button type="submit" class="btn btn-info">Lanjut Pemesanan</button>
			    	<a class="btn btn-warning ml-2" href="<?php echo site_url('shoppingCart')?>">Kembali ke Detail</a>
			    </center>
			  </div>
			<?php echo form_close(); ?>

		 <?php } else { ?>

         	<a class="btn btn-danger danger mb-2" href="<?php echo site_url('user') ?>">Maaf, anda harus belanja dulu</a>

        <?php } ?>

        </div>
    </div>
</div>