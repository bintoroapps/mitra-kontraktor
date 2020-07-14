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
            <h1>Edit Anggota Tim</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Edit Anggota Tim</li>
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
                <h3 class="card-title">Form Edit Anggota Tim</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url('admin/team/edit/' . $team->team_id) ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <?php if(isset($validation)): ?>
                        <div class="form-group">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(session()->get('error')): ?>
                        <div class="form-group">
                            <div class="alert alert-danger" role="alert">
                                <?= session()->get('error') ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?= set_value('nama', $team->team_name) ?>" placeholder="Nama Anggota">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Foto Profil</label>
                            <input type="file" class="form-control" name="foto_profil" value="<?= set_value('foto_profil') ?>" placeholder="Foto Profil">
                            </div>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control role-val">
                                <?php 
                                    if(isset($role)):
                                        foreach($role as $r): 
                                ?>
                                <option value="<?= $r->team_role ?>" <?= set_value('role', $team->team_role) == $r->team_role ? 'selected' : '' ?>><?= $r->team_role ?></option>
                                <?php 
                                    endforeach;
                                    endif; 
                                ?>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                            <label>New Role</label><br>
                            <button type="button" class="btn btn-warning btn-new-role">New Role</button>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Link Facebook</label>
                            <input type="text" class="form-control" name="link_facebook" value="<?= set_value('link_facebook', $team->team_facebook ? $team->team_facebook : '' ) ?>" placeholder="Link Facebook">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Link Twitter</label>
                            <input type="text" class="form-control" name="link_twitter" value="<?= set_value('link_twitter', $team->team_twitter ? $team->team_twitter : '') ?>" placeholder="Link Twitter">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Link Google Plus</label>
                            <input type="text" class="form-control" name="link_google_plus" value="<?= set_value('link_google_plus', $team->team_google_plus ? $team->team_google_plus : '') ?>" placeholder="Link Google Plus">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Link Instagram</label>
                            <input type="text" class="form-control" name="link_instagram" value="<?= set_value('link_instagram', $team->team_instagram ?  $team->team_instagram : '') ?>" placeholder="Link Instagram">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                            <label>Nomor Whatsapp</label>
                            <input type="number" class="form-control" name="nomor_whatsapp" value="<?= set_value('nomor_whatsapp', $team->team_whatsapp ? $team->team_whatsapp : '') ?>" placeholder="Nomor Whatsapp">
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" name="save" value="save-as" class="btn btn-primary">Update</button>
                  <button type="submit" name="save" value="save-as-webp" class="btn btn-success">Update & Convert Image to Webp</button>
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
  <div class="modal fade modal-role" id="modal-default" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="Role Baru"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control new-role-val" placeholder="Role Baru">
            </div>             
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-tambah-role">Tambah Role</button>
            </div>
        </div>  
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
  $(document).ready(function() {

    $('.btn-new-role').on('click', function() {
        $('.new-role-val').val('')
        $('.modal-role').modal('show')
    })

    $('.btn-tambah-role').on('click', function() {
        let role = $('.new-role-val').val()
        $('body').find('.role-val').replaceWith(`
            <input type="text" class="form-control role-val" name="role" value="${role}" readonly>
        `)
        $('.modal-role').modal('hide')
    })

  })
</script>
<?= $this->endSection() ?>