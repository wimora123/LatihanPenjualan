    <!-- /.container-fluid -->
                <div class="container mt-2 pt-1 pb-2">
                	<div class="row">
                		<div class="col-sm-12">

                		    <?php $grandTotal=0;
                		    if($items) { ?>
                		    <?php echo form_open_multipart('shoppingCart/update_cart') ?>
                		    <h4 align="center" class="">Shopping Cart</h4>
				            <table class="table table-striped">
				                <thead>
				                    <tr>
				                        <th>Barang</th>
				                        <th>Foto</th>
				                        <th>Harga</th>
				                        <th>Qty</th>
				                        <th>Subtotal</th>
				                        <th>Aksi</th>
				                    </tr>
				                </thead>
				                <tbody id="detail_cart">
				                <?php foreach($items AS $item) { 
				                	$grandTotal=$grandTotal+($item['qty']*$item['price']);
				                	?>
						         <tr>
									<td><?php echo $item['name'] ?></td>
									<td><img width="74" height="68" src="<?php echo base_url('assets/images/'.$item['image']); ?>"></td>
									<td><?php echo number_format($item['price'],2,',','.') ?></td>
									<td>
										<input min="1" type="number" name="qty[]" value="<?php echo $item['qty'] ?>">
										<!-- Butuh 2 inputan id dan rowid untuk menembak qty sesuai dengan id -->
										<input type="hidden" name="rowid[]" value="<?php echo $item ['rowid']?>">
                						<input type="hidden" name="id[]" value="<?php echo $item ['id']?>">
									</td>
									<td><?php echo number_format($item['qty'] * $item['price'],2,',','.') ?></td>
									<td><a class="btn btn-danger btn-sm" href="<?php echo site_url('shoppingCart/delete_cart/'.$item['rowid']) ?>">Batal</a></td>
									<td>
								</tr>
						         <?php } ?>
						         <tr>
						         	<td colspan="4" align="center">Total Belanja</td>
						         	<td colspan="1">Rp. <?php echo number_format( $grandTotal, 2, ',','.'); ?></td>
						         	<td colspan="1"></td>
						         </tr>
				                </tbody>
				            </table>

				             <center><button type="submit" class="btn btn-success mr-2">Lanjut ke Pembayaran</button> <a class="btn btn-md btn-warning mr-2" href="<?php echo site_url('user') ?>">Kembali Belanja</a></center> 

				            <?php echo form_close() ?>
				            <?php } else { ?>
					   
				             <center><a href="<?php echo site_url('user') ?>" class="btn btn-danger btn-lg">Maaf, keranjang anda masih kosong. Silahkan belanja dulu</a></center>
				             <center><img class="img-responsive" src="<?php echo base_url('assets/images/emptyCart.png') ?>" width="473" height="327"></center>
				            <?php } ?>
                		</div>
                		
                	</div>
                	
                </div>