<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-8 offset-sm-2">
                                <div class="p-5">
                                    <div class="text-center">
                                        <?php echo $this->session->flashdata('message') ?>
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <?php echo form_open_multipart('', 'class="user"') ?>
                                    
                                        <div class="form-group">
                                            <?php echo form_error('email', '<p class="text-danger">','</p>') ?>
                                            <input type="email" class="form-control form-control-user" placeholder="Alamat Email" name="email">
                                        </div>
                                        <div class="form-group">
                                             <?php echo form_error('password', '<p class="text-danger">','</p>') ?>
                                            <input type="password" class="form-control form-control-user" name ="password" placeholder="Password">
                                        </div>
                                        <button type="submit" class="form-control btn btn-primary">Login</button>
                                    <?php echo form_close() ?>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('auth/registrasi') ?>">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
