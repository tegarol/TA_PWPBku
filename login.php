<body class="hold-transition login-page">
    <div class="login-box">
        <div img src="assets/dist/img/foto.jpg" class="img-fluid" alt="...">
        <div class="login-logo">
            <a href="<?= base_url('auth'); ?>"><b>Layanan Customer Service</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <img src="assets/dist/img/images.png" class="img-fluid" alt="...">
                <p class="login-box-msg">Silahkan Login terlebih Dahulu</p>

                <?= $this->session->flashdata('message'); ?>

                <form action="<?= base_url('auth'); ?>" method="post">
                    <div class="input-group mb-3">
                        <input id="Email" name="Email" type="email" class="form-control" placeholder="Email" value="<?= set_value('Email'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="Password" name="Password" type="password" class="form-control" placeholder="Password">
                        <?= form_error('Password', '<small class="text-danger">', '</small>'); ?>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Log In</button>
                        </div>
                        <!-- /.col -->
                    </div>

                     <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                          <label class="form-check-label" for="inlineFormCheck">
                            Remember me
                          </label>
                        </div>
                      </div>

                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                        <a href="<?= base_url('auth/registration'); ?>" class="btn btn-block btn-info">
                            <i class="fab fa-facebook mr-2"></i> Register</a>
                        <a href="#" class="btn btn-block btn-success">
                            <i class="fab fa-google-plus mr-2"></i> I forgot my password
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->