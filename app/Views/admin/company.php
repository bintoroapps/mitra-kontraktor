<?= $this->extend('admin/main') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil Perusahaan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('/admin/dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Profile Perusahaan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= $company->media_id ? base_url('media/' . $company->media_name) : base_url('dash/dist/img/user4-128x128.jpg') ?>"
                       alt="Company profile picture">
                </div>

                <p class="text-muted text-center"><?= $company->company_name ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Detail Perusahaan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <strong><i class="fas fa-phone mr-1"></i> No. Telepon</strong>
                  <p class="text-muted"><?= $company->company_telp ?></p>
                  <hr>
                  <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                  <p class="text-muted"><?= $company->company_email ?></p>
                  <hr>
                  <strong><i class="fab fa-facebook mr-1"></i> Facebook</strong>
                  <p class="text-muted"><a class="text-muted" href="<?= $company->company_facebook ? $company->company_facebook : '#' ?>" target="_blank">Link Facebook</a></p>
                  <hr>
                  <strong><i class="fab fa-youtube mr-1"></i> Youtube</strong>
                  <p class="text-muted"><a class="text-muted" href="<?= $company->company_youtube ? $company->company_youtube : '#' ?>" target="_blank">Link Youtube</a></p>
                  <hr>
                  <strong><i class="fab fa-instagram mr-1"></i> Instagram</strong>
                  <p class="text-muted"><a class="text-muted" href="<?= $company->company_instagram ? $company->company_instagram : '#' ?>" target="_blank">Link Google Plus</a></p>
                  <hr>
                  <strong><i class="fas fa-envelope mr-1"></i>No Whatsapp</strong>
                  <p class="text-muted"><?= $company->company_whatsapp ?></p>
                  <hr>
                  <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                  <p class="text-muted"><?= $company->company_address ?></p>
                  <hr>
                  <strong><i class="fas fa-map-marker-alt mr-1"></i> Deskripsi</strong>
                  <p class="text-muted"><?= $company->company_description ?></p
                  <hr>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
          <?php if(isset($validation)): ?>
            <div class="form-group row">
                <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    <?= $validation->listErrors() ?>
                </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if(session()->get('success')): ?>
              <div class="form-group row">
                <div class="col-12">
                  <div class="alert alert-success" role="alert">
                      <?= session()->get('success') ?>
                  </div>
                </div>
              </div>
            <?php endif; ?>
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                  <li class="nav-item"><a class="nav-link" href="#footer" data-toggle="tab">Footer Image</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <h3>Belum tau mau diisi apa</h3>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" method="post" action="<?= base_url('admin/company-profile') ?>" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="Nama Perusahaan" value="<?= set_value('nama', $company->company_name ? $company->company_name : '') ?>" name="nama">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="Email Perusahaan" value="<?= set_value('email', $company->company_email ? $company->company_email : '') ?>" name="email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Logo</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="logo" placeholder="Logo Perusahaan" accept="image/*">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No. Telepon</label>
                        <div class="col-sm-10">
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">+62</label>
                            </div>
                            <input type="text" class="form-control no-telpon" name="telp" value="<?= set_value('telp', $company->company_telp ? $company->company_telp : '') ?>" placeholder="No. Telepon Perusahaan">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Link Facebook</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="facebook" value="<?= set_value('facebook', $company->company_facebook ? $company->company_facebook : '') ?>" placeholder="Link Facebook Perusahaan">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Link Youtube</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="youtube" value="<?= set_value('youtube', $company->company_youtube ? $company->company_youtube : '') ?>" placeholder="Link Youtube Perusahaan">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Link Instagram</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="instagram" value="<?= set_value('instagram', $company->company_instagram ? $company->company_instagram : '') ?>" placeholder="Link Instagram Perusahaan">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No. Whatsapp</label>
                        <div class="col-sm-10">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">+62</label>
                            </div>
                            <input type="text" class="form-control no-telpon" name="whatsapp" value="<?= set_value('whatsapp', $company->company_whatsapp ? $company->company_whatsapp : '') ?>" placeholder="No. Whatsapp Perusahaan">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Embed Google Maps</label>
                        <div class="col-sm-10">
                            <textarea name="embed_google_maps" cols="30" rows="10" class="form-control" placeholder="Embed Google Maps"><?= set_value('embed_google_maps', $company->company_map ? $company->company_map : '') ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea name="alamat" cols="30" rows="10" class="form-control" placeholder="Alamat Perusahaan"><?= set_value('alamat', $company->company_address) ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi" cols="30" rows="10" class="form-control" placeholder="Deskripsi Perusahaan"><?= set_value('deskripsi', $company->company_description ? $company->company_description : '') ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" name="save" value="save-as" class="btn btn-danger">Simpan</button>
                          <button type="submit" name="save" value="save-as-webp" class="btn ml-1 btn-success">Simpan Logo Webp</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane" id="footer">
                    <form class="form-horizontal" method="post" action="<?= base_url('admin/company-profile') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="act" value="footer">
                      <div class="form-group row">
                        <div class="col-12 mb-3">
                          <input type="file" class="form-control" name="footer" required>
                          <button type="submit" name="save" value="save-as" class="btn btn-primary float-right d-block mt-2">Save</button>
                          <button type="submit" name="save" value="save-as-webp" class="btn mr-2 btn-success float-right d-block mt-2">Save as Webp</button>
                        </div>
                        <div class="col-12">
                          <img style="width: 100%;" src="<?= $company->company_footer ? base_url('media/' . $company->company_footer) : base_url('images/background/5.jpg') ?>">
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
$(document).ready(function() {
  $('.no-telpon').on('change, keyup', function() {
    var currentInput = $(this).val();
    var fixedInput = currentInput.replace(/[A-Za-z!@#$%^&*()]/g, '');
    $(this).val(fixedInput);
});
})
</script>
<?= $this->endSection() ?>