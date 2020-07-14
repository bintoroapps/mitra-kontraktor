<?= $this->extend('admin/main') ?>

<?= $this->section('css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tracking Code</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Tracking Code</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url('admin/tracking-code') ?>" method="POST">
                <div class="card-body">
                    <?php if(session('message')): ?>
                        <div class="form-group">
                            <div class="alert alert-success" role="alert">
                                <?= session('message') ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                            <label>Google Analytics</label>
                            <textarea name="google_analytics" class="form-control" rows="6" placeholder="masukkan kode di sini"><?= $code->google_analytic ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                            <label>Google Tags</label>
                            <textarea name="google_tags" class="form-control" rows="6" placeholder="masukkan kode di sini"><?= $code->google_tags ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                            <label>Google Searh Console</label>
                            <textarea name="google_search_console" class="form-control" rows="6" placeholder="masukkan kode di sini"><?= $code->google_search_console ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                            <label>Facebook Pixel</label>
                            <textarea name="facebook_pixel" class="form-control" rows="6" placeholder="masukkan kode di sini"><?= $code->facebook_pixel ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
     <!-- Modal -->
<?= $this->endSection() ?>