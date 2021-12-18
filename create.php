    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main Row -->
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="d-lg-inline">Tambah Data Customer</h4>
                        </div>

                        <div class="card-body">
                            <form action="<?= site_url('customer/create') ?>" method="POST" role="form">
                                <div class="form-group row">
                                    <label for="NIK" class="col-sm-2 col-form-label">NIK</label>
                                    <div class="col-10">
                                        <input type="text" name="NIK" id="NIK" class="form-control" value="<?= set_value('NIK') ?>">
                                        <?= form_error('NIK') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-10">
                                        <input type="text" name="Nama" id="Nama" class="form-control" value="<?= set_value('Nama') ?>">
                                        <?= form_error('Nama') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                                    <a href="<?= site_url('customer') ?>" class="btn btn-default btn-block">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Row End -->
        </div>
    </section>
    <!-- Main Content End -->
</div>