                        <center><?php echo $this->session->flashdata('message') ?></center>
                        <h2 class="text-center mb-2">Add Barang</h2>

                        <?php echo form_open_multipart('admin/add_barang') ?>
                          <div class="form-group row">
                            <label class="col-sm-3">Nama Barang</label> <?php echo form_error('barang', '<p class="text-danger">','</p>') ?>
                            <input type="text" id="barang" class="form-control col-sm-5" placeholder="Nama Barang" name="barang" value="<?php echo set_value('barang') ?>">
                          </div>
                         <div class="form-group row">
                            <label class="col-sm-3">Keterangan</label> <?php echo form_error('keterangan', '<p class="text-danger">','</p>') ?>
                            <input type="text" id="keterangan" class="form-control col-sm-5" placeholder="Keterangan" name="keterangan" value="<?php echo set_value('keterangan') ?>">
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3">Kategori</label> <?php echo form_error('idKategori', '<p class="text-danger">','</p>') ?>
                           <select name="idKategori" class="col-sm-5">
                               <option value="">Pilih Kategori</option>
                               <?php foreach ($kategori as $kat) { ?>
                                <option value="<?php echo $kat['id_kategori'] ?>"><?php echo $kat['nama_kategori'] ?></option>
                                <?php } ?>
                           </select>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3">Harga</label> <?php echo form_error('harga', '<p class="text-danger">','</p>') ?>
                            <input type="text" id="harga" class="form-control col-sm-5" placeholder="Harga Barang" name="harga" value="<?php echo set_value('harga') ?>">
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3">Stok</label>
                            <input type="number" id="stok" min="1" placeholder="Stok Barang" name="stok" value="1" class="col-sm-1">
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3">Image</label>
                            <input type="file" class="col-sm-5" id="image" name="image" placeholder="Choose Image">
                          </div>
                          <div class="form-group row">
                              <div class="col-sm-8">
                                  <center><button type="submit" class="btn btn-primary">Add Barang</button> 
                                <?php echo anchor('admin', ' <button type="button" class="btn btn-warning">Back</button>') ?>  </center> 
                              </div>
                          </div>
   
                        <?php echo form_close(); ?>
                    		
                    	 </div>  
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->