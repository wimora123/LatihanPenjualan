							<div class="row">
								<div class="col-sm-6">
								<?php echo form_error('role', '<p class="text-center text-danger">','</p>') ?>
								<center><?php echo $this->session->flashdata('message') ?></center>
							<h2 class="text-center">Role Access</h2>
							<!-- Button trigger modal -->
							<center><button type="button" class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#modalAddRole">
							  Add Role
							</button></center>

							<!-- Modal -->
							<div class="modal fade" id="modalAddRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <center><h5 class="modal-title" id="exampleModalLabel">Add Role</h5></center>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <?php echo form_open_multipart('admin/role') ?>
							      <div class="modal-body">
		                          <div class="form-group row">
		                            <label class="col-sm-3">Nama Role</label>
		                            <input type="text" id="role" class="form-control col-sm-9" placeholder="Nama Role" name="role" value="<?php echo set_value('role') ?>">
		                          </div>
							      </div>
							      <div class="modal-footer">
							        <button type="submit" class="btn btn-primary">Add Role</button>
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							      </div>
							        <?php echo form_close(); ?>
							    </div>
							  </div>
							</div>
									<table class="table table-striped table-hover">
										<thead align="center">
											<tr>
												<th>No</th>
												<th>Role</th>
												<th colspan="2">Action</th>
											</tr>
										</thead>
										<tbody align="center">
											<?php $no=1; foreach($role AS $rl) { ?>
											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $rl['nama_role'] ?></td>
												<td><a class="btn btn-warning" href="<?php echo site_url('admin/roleAccess/'.$rl['id_role']) ?>" >Akses</a></td>
												<td><button type="button" class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#modaleditRole<?php echo $rl['id_role'] ?>">Edit Role</button></td>
												 <?php echo form_open_multipart('admin/edit_role') ?>
				                                  <div class="modal fade" id="modaleditRole<?php echo $rl['id_role'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				                                    <div class="modal-dialog" role="document">
				                                      <div class="modal-content">
				                                        <div class="modal-header">
				                                          <center><h5 class="modal-title" id="exampleModalLabel">Edit Role</h5></center>
				                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                                            <span aria-hidden="true">&times;</span>
				                                          </button>
				                                        </div>
				                                        <div class="modal-body">
		                                                  <div class="form-group row">
		                                                    <label class="col-sm-3">Nama Role</label>
		                                                    <input type="hidden" name="idRole" value="<?php echo $rl['id_role'] ?>">
		                                                    <input type="text" id="role" class="form-control col-sm-9" placeholder="Nama Role" name="role" value="<?php echo $rl['nama_role'] ?>">
		                                                  </div>
				                                        </div>
				                                        <div class="modal-footer">
				                                          <button type="submit" class="btn btn-primary">Edit Role</button>
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
                    	