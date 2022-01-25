                       <div class="row">
                         <div class="col-sm-10">
                            <center><?php echo $this->session->flashdata('message') ?></center>
                            <h2 class="text-center mb-2">Edit Profile</h2>

                          <?php echo form_open_multipart('admin/editProfile') ?>
                          <div class="form-group">
                            <!-- Readonly untuk memastikan bahwa data ini ga bisa diedit -->
                            <label class="">Email</label>
                            <input type="text" class="form-control " name="email" id="email" placeholder="Email" value="<?php echo $user['email'] ?>" readonly>
                          </div>
                          <div class="form-group">
                            <label>Full Name</label> 
                              <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" value="<?php echo $user['nama_user'] ?>"><?php echo form_error('name', '<p class="text-danger pl-1">','</p>') ?>
                          </div>
                          <div class="form-group">
                            <label class="">Picture</label>
                            <div class=""> 
                              <div class="row">

                                <div class="col-sm-3">
                                  <img src="<?php echo base_url('assets/images/'.$user['image']) ?>" class="img-thumbnail">
                                </div>

                                <!-- Butuh jquery untuk manipulas input image -->
                                <div class="col-sm-9">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input imageEdit" id="image" name="image">
                                    <label class="custom-file-label labelEditImage" for="image">Choose file</label>
                                    <input type="hidden"  id="oldImage" name="oldImage" value="<?php echo $user['image']   ?>">
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>

       
                        <center><button type="submit" class="btn btn-primary">Edit Profile</button></center>
                

                        <?php echo form_close() ?>
                         </div>
                       </div>
                    		
                    	 </div>  
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->