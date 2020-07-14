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
            <h1>Edit Anggota</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Edit Anggota</li>
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
                <h3 class="card-title">Form Edit Anggota</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url('admin/anggota/edit/' . $anggota->id) ?>" method="POST">
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
                                <label>Nama Awal</label>
                                <input type="text" class="form-control" name="nama_awal" value="<?= set_value('nama_awal', $anggota->firstname) ?>" placeholder="Nama Awal">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Nama Akhir</label>
                            <input type="text" class="form-control" name="nama_akhir" value="<?= set_value('nama_akhir', $anggota->lastname) ?>" placeholder="Nama Akhir">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="<?= set_value('email', $anggota->email) ?>" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control">
                                <?php 
                                    if(isset($role)):
                                        foreach($role as $r): 
                                ?>
                                <option value="<?= $r->role_id ?>" <?= set_value('role', $anggota->role_id) == $r->role_id ? 'selected' : '' ?>><?= strtoupper($r->role_name) ?></option>
                                <?php 
                                        endforeach;
                                    endif; 
                                ?>
                            </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="aktif" <?= set_value('status', $anggota->status) == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                                <option value="nonaktif" <?= set_value('status', $anggota->status) == 'nonaktif' ? 'selected' : '' ?>>Non Aktif</option>
                            </select>
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
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= $this->endSection() ?>