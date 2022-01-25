							<?php echo $this->session->flashdata('message') ?>
							<h2 class="text-center">Invoice</h2>

							<table class="table table-bordered table-hover table-striped">	
								<thead align="center">	
									<tr>
										<th>ID Invoice</th>
										<th>Nama Pemesan</th>
										<th>Alamat Pengiriman</th>
										<th>Tanggal Pemesanan</th>
										<th>Batas Pembayaran</th>
										<th>Aksi</th>
									</tr>
							</thead>
							<tbody>	
								<!-- Apabila invoicenya tidak 0 -->
								<?php if($invoice) { ?>
									<?php foreach($invoice AS $inv) { ?>
										<tr>
											<td><?php echo $inv['id_invoice'] ?></td>
											<td><?php echo $inv['nama_lengkap'] ?></td>
											<td><?php echo $inv['alamat'] ?></td>
											<td><?php echo date('d F Y',  strtotime($inv['tanggal_pesan']));   ?> at <?php echo date('h:i:sa',  strtotime($inv['tanggal_pesan']));   ?></td>
											<td><?php echo date('d F Y',  strtotime($inv['batas_bayar']));   ?> at <?php echo date('h:i:sa',  strtotime($inv['batas_bayar']));   ?></td>
											<td> <?php echo anchor('invoice/detailInvoice/'.$inv['id_invoice'], '<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
										</tr>

									<?php } ?>
								<?php } else {  ?>
								<tr>
									<td colspan="6"><center><h3 class="text-danger bold">Invoice masih kosong</h3></center></td>
								</tr>
								<?php } ?>
							</tbody>

							</table>

                    	</div>	
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->