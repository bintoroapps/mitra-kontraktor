<?= $this->extend('admin/main') ?>

<?= $this->section('css') ?>
<!-- <link rel="stylesheet" href="<?= base_url('dash/plugins/summernote/summernote-bs4.css') ?>"> -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Jasa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Tambah Jasa</li>
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
                <h3 class="card-title">Form Tambah Jasa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url('admin/jasa/create') ?>" method="POST" enctype="multipart/form-data">
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
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= set_value('name') ?>" placeholder="Nama Jasa">
                  </div>
                  <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" class="form-control" name="gambar" accept="image/*">
                  </div>
                  <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control textarea"><?= set_value('deskripsi') ?></textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" name="save" value="save-as" class="btn btn-primary">Submit</button>
                  <button type="submit" name="save" value="save-as-webp" class="btn btn-success">Submit With Converting Image</button>
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
  </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<!-- <script src="<?= base_url('dash/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<script>
$(document).ready(function() {
    $('.textarea').summernote({
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture']]
        ],
    })
})
</script> -->
<?= $this->endSection() ?>