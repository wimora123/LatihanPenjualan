							<div class="row">
								<div class="col-sm-6">
								<center><?php echo $this->session->flashdata('message') ?></center>
							<h2 class="text-center">Role Access: <b class="text-info"><?php echo $role['nama_role']; ?></b></h2>
									<table class="table table-striped table-hover">
										<thead align="center">
											<tr>
												<th>No</th>
												<th>Nama User</th>
												<th>Akses</th>
											</tr>
										</thead>
										<tbody align="center">
											<?php $no=1; 
											foreach($menu AS $mn) { ?>
											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $mn['menu'] ?></td>
												<td><input class="checkRole" type="checkbox" name="is_active" <?php echo check_access($role['id_role'], $mn['id_menu']) ?> data-roleID='<?php echo $role['id_role']; ?>' data-menuID='<?php echo $mn['id_menu']; ?>'></td>
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
                    	