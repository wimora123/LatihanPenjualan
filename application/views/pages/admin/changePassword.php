                       <div class="row">
                         <div class="col-sm-10">
                             <center> <?php echo $this->session->flashdata('message') ?></center>
                              <center><?php echo form_open_multipart('admin/changePassword')  ?></center>

                              <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="password" class="form-control" name="currentPassword" id="currentPassword" placeholder=""><?php echo form_error('currentPassword', '<p class="text-danger">','</p>') ?>
                              </div>

                              <div class="form-group">
                                <label for="current_password">New Password</label>
                                <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder=""><?php echo form_error('newPassword', '<p class="text-danger">','</p>') ?>
                              </div>

                              <div class="form-group">
                                <label for="repeat_password">Repeat Password</label>
                                <input type="password" class="form-control" name="repeatPassword" id="repeatPassword" placeholder=""><?php echo form_error('repeatPassword', '<p class="text-danger">','</p>') ?>
                              </div>

                               <div class="form-group">
                                  <button type="submit" class="btn btn-primary">Change Password</button>
                              </div>


                              <?php echo form_close(); ?>
                         </div>
                       </div>
                    		
                    	 </div>  
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->