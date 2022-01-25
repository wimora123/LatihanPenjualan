                <center> <?php echo $this->session->flashdata('message') ?></center>
                <h2 class="text-center">Add Menu</h2>
                          <?php echo form_open_multipart('admin/add_menu' ,"class='bg-light text-white pt-4 pb-4'") ?>
                          <?php echo form_error('menu', '<p class="text-danger ml-2">','</p>') ?>
                          <div class="form-group row">
                            <label class="col-sm-3 ml-2">Nama Menu</label>
                            <input type="text" id="menu" class="form-control col-sm-5" placeholder="Nama menu" name="menu" value="<?php echo set_value('menu') ?>">
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-8">
                                <center><button type="submit" class="btn btn-primary mr-1">Add menu</button>
                            <?php echo anchor('admin', ' <button type="button" class="btn btn-warning">Back</button>') ?> </center> 
                            </div>
                          </div>
   
                        <?php echo form_close(); ?>

                        <div class="row">
                          <div class="col-sm-7">
                            <h2 class="text-center mt-2">List of Menu</h2>
                              <table class="table table-striped table-hover">
                                <thead align="center">
                                  <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody align="center">
                                  <?php $no=1; 
                                  foreach($menu AS $mn) { ?>
                                  <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $mn['menu'] ?></td>
                                    <td><button type="button" class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#modalEditMenu<?php echo $mn['id_menu'] ?>">Edit Menu</button></td>
                                    <!-- Modal -->
                                  <?php echo form_open_multipart('admin/edit_menu') ?>
                                  <div class="modal fade" id="modalEditMenu<?php echo $mn['id_menu'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <center><h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5></center>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                                  <div class="form-group row">
                                                    <label class="col-sm-3">Nama Menu</label>
                                                    <input type="hidden" name="idMenu" value="<?php echo $mn['id_menu'] ?>">
                                                    <input type="text" id="menu" class="form-control col-sm-9" placeholder="Nama Menu" name="menu" value="<?php echo $mn['menu'] ?>">
                                                  </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary">Edit Menu</button>
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
                        
