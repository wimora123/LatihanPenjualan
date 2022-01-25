                        <center> <?php echo $this->session->flashdata('message') ?></center>
                        <h2 class="text-center">Add Kategori</h2>
                        <?php echo form_open_multipart('admin/add_kategori') ?>
                        <?php echo form_error('kategori', '<p class="text-danger">','</p>') ?>
                          <div class="form-group row">
                            <label class="col-sm-3">Nama Kategori</label>
                            <input type="text" id="kategori" class="form-control col-sm-5" placeholder="Nama kategori" name="kategori" value="<?php echo set_value('kategori') ?>">
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-8">
                                <center><button type="submit" class="btn btn-primary mr-1">Add kategori</button>
                            <?php echo anchor('admin', ' <button type="button" class="btn btn-warning">Back</button>') ?> </center> 
                            </div>
                          </div>
   
                        <?php echo form_close(); ?>
                        
                        <div class="row">
                          <div class="col-sm-7">
                              <table class="table table-striped table-hover">
                                <thead align="center">
                                  <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody align="center">
                                  <?php $no=1; 
                                  foreach($kategori AS $kat) { ?>
                                  <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $kat['nama_kategori'] ?></td>
                                    <td><button type="button" class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#modaleditKategori<?php echo $kat['id_kategori'] ?>">Edit Kategori</button></td>

                                  <?php echo form_open_multipart('admin/edit_kategori') ?>
                                  <div class="modal fade" id="modaleditKategori<?php echo $kat['id_kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <center><h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5></center>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                                  <div class="form-group row">
                                                    <label class="col-sm-3">Nama Kategori</label>
                                                    <input type="hidden" name="idKategori" value="<?php echo $kat['id_kategori'] ?>">
                                                    <input type="text" id="kategori" class="form-control col-sm-9" placeholder="Nama Kategori" name="kategori" value="<?php echo $kat['nama_kategori'] ?>">
                                                  </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary">Edit Kategori</button>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <?php echo form_close(); ?>
                                  </tr>
                                  <?php  $no++; } ?>
                                </tbody>
                              </table>
                          </div>
                        </div>

                      </div>  
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
                        
