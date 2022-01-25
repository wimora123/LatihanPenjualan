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
                                        <h1 class="h4 text-gray-900 mb-4">Registrasi</h1>
                                    </div>
                                    <?php echo form_open_multipart('auth/registrasi', 'class="user"') ?>
                                    <div class="form-group">
                                        <label>Full Name</label> <?php echo form_error('name', '<p class="text-danger">', '</p>') ?>
                                        <input type="text" class="form-control form-control-user" placeholder="Nama Lengkap" name="name" value="<?php echo set_value('name') ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label> <?php echo form_error('email', '<p class="text-danger">', '</p>') ?>
                                        <input type="email" class="form-control form-control-user" placeholder="Alamat Email" name="email" value="<?php echo set_value('email') ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label> <?php echo form_error('password1', '<p class="text-danger">', '</p>') ?>
                                        <input type="password" class="form-control form-control-user" name ="password1" placeholder="Password" value="<?php echo set_value('password1') ?>">
                                    </div>
                                     <div class="form-group">
                                        <label>Repeat Password</label> <?php echo form_error('password2', '<p class="text-danger">', '</p>') ?>
                                        <input type="password" class="form-control form-control-user" name ="password2" placeholder="Repeat Password" value="<?php echo set_value('password2') ?>">
                                    </div>
                                    <button type="submit" class="form-control btn btn-primary">Registrasi</button>
                                    <?php echo form_close() ?>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('auth') ?>">Already have an account? Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
