                        <center><?php echo $this->session->flashdata('message') ?></center>
                        <h2 class="text-center mb-2">List Barang</h2>

                        <div class="row">
                          <div class="col-sm-10">
                            <?php echo form_open_multipart('admin/edit_barang') ?>

                             <table class="table table-bordered table-striped">
                               <thead align="center">
                                 <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Keterangan</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Gambar</th>
                                    <th colspan="2">Action</th>
                               </tr>
                               </thead>
                               <tbody>
                                  <?php $no=1; foreach ($barang AS $brg) { ?>
                                  <tr>
                                     <input type="hidden" name="idPesan">
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $brg['nama_barang'] ?></td>
                                    <td><?php echo $brg['keterangan'] ?></td>
                                    <td><?php echo $brg['nama_kategori'] ?></td>
                                    <td><?php echo number_format($brg['harga']); ?></td>
                                    <td><?php echo $brg['stok'] ?></td>
                                    <td><img class="img-responsive" width="123" height="96" src="<?php echo base_url('assets/images/'.$brg['gambar']) ?>"></td>
                                    <td><a class="btn btn-success" href="<?php echo site_url('admin/editBarang/' .$brg['id_barang']) ?>">Edit</a></td>
                                    <td><a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')" href="<?php echo site_url('admin/deleteBarang/'.$brg['id_barang']) ?>">Delete</a></td>
                                  </tr>
                               </tbody>
                             

                              <?php $no++; } ?>
                            </table>
   
                            <?php echo form_close(); ?>
                          </div>
                        </div>
                    		
                    	 </div>  
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->