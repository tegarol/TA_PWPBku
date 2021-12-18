<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="<?= base_url('auth/registration'); ?>"><b>Layanan Customer Service</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register</p>

                <form action="<?= base_url('auth/registration'); ?>" method="post">
                    <div class="input-group mb-3">
                        <input id="Username" name="Username" type="text" class="form-control" placeholder="Full name" value="<?= set_value('Username'); ?>">
                        <?= form_error('Username', '<small class="text-danger">', '</small>'); ?>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="Email" name="Email" type="email" class="form-control" placeholder="Email" value="<?= set_value('Email'); ?>">
                        <?= form_error('Email', '<small class="text-danger">', '</small>'); ?>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="Password1" name="Password1" type="password" class="form-control" placeholder="Password">
                        <?= form_error('Password1', '<small class="text-danger">', '</small>'); ?>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="Password2" name="Password2" type="password" class="form-control" placeholder="Retype password">
                        <?= form_error('Password2', '<small class="text-danger">', '</small>'); ?>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="<?= base_url('auth'); ?>" class="btn btn-block btn-success">
                        <i class="fab fa-facebook mr-2"></i>
                        Already have a membership
                    </a>
                </div>
            </div>
        </div>
    </div>