                        <center><?php echo $this->session->flashdata('message') ?></center>
                        <h2 class="text-center mb-2">Edit Barang</h2>

                        <?php echo form_open_multipart('admin/editBarang/'.$barang['id_barang']) ?>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-3">
                                <label>Nama Barang</label> 
                              </div>
                              <div class="col-sm-9">
                                <?php echo form_error('barang', '<p class="text-danger">','</p>') ?>
                                <input type="hidden" id="idBarang" name="idBarang" value="<?php echo $barang['id_barang'] ?>">
                                 <input type="text" id="barang" class="form-control" placeholder="Nama Barang" name="barang" value="<?php echo $barang['nama_barang'] ?>">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-3">
                                <label>Keterangan</label> <?php echo form_error('keterangan', '<p class="text-danger">','</p>') ?>
                              </div>
                              <div class="col-sm-9">
                                 <input type="text" id="keterangan" class="form-control" placeholder="Keterangan" name="keterangan" value="<?php echo $barang['keterangan'] ?>">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-3">
                                <label>Kategori</label> <?php echo form_error('idKategori', '<p class="text-danger">','</p>') ?>
                              </div>
                              <div class="col-sm-9">
                                <select name="idKategori">
                                   <option value="<?php echo $barang['id_kategori'] ?>"><?php echo $barang['nama_kategori'] ?></option>
                                     <option value="">Pilih Kategori</option>
                                     <?php foreach ($kategori as $kat) { ?>
                                      <option value="<?php echo $kat['id_kategori'] ?>"><?php echo $kat['nama_kategori'] ?></option>
                                      <?php } ?>
                                 </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-3">
                                <label>Harga</label> <?php echo form_error('harga', '<p class="text-danger">','</p>') ?>
                              </div>
                              <div class="col-sm-9">
                                <input type="text" id="harga" class="form-control" placeholder="Harga Barang" name="harga" value="<?php echo $barang['harga']; ?>">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-3">
                               <label>Stok</label>
                              </div>
                              <div class="col-sm-9">
                                <input type="number" id="stok" min="1" placeholder="Stok Barang" name="stok" value="<?php echo $barang['stok'] ?>" class="col-sm-1">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-3">
                                <label>Image</label>
                              </div>
                              <div class="col-sm-9">
                                <input type="file" id="image" name="image" placeholder="Choose Image">
                                <input type="hidden"  id="oldImage"  name="oldImage"  value="<?php echo $barang['gambar']   ?>">
                                <br/> <br/>
                              <img width="97" height="108" src="<?php echo base_url('assets/images/' .$barang['gambar']) ?>">
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                          <center><button type="submit" class="btn btn-primary">Edit Barang</button> 
                                <?php echo anchor('admin/all_barang', ' <button type="button" class="btn btn-warning">Back</button>') ?>  </center> 
                          </div>
                        <?php echo form_close(); ?>
                    		
                    	 </div>  
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->