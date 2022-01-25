							<div class="row">
								<div class="col-sm-7">
							<center><?php echo $this->session->flashdata('message') ?></center>
							<center><h2 class="text-center">My Profile</h2></center>
									<div class="card">
						      		<center><img width="227" height="255" class="card mt-2" src="<?php echo base_url('assets/images/'.$user['image']) ?>" alt="Card image cap"></center>
							           <div class="card-body">
							            <h5 class="card-title"><?php echo $user['nama_user']; ?></h5>
							            <p class="card-text"><?php echo $user['email']; ?></p>
							            <p class="text-muted">Member since <?php echo date('d F Y', strtotime($user['date_created'])); ?> 	
							            </p>
							        	</div>
						    		</div>

								</div>
							</div>
                    	</div>	
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
                    	