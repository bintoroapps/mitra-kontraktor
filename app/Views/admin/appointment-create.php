<?= $this->extend('admin/main') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Appointment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Tambah Appointment</li>
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
                <h3 class="card-title">Form Tambah Appointment</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url('admin/appointment/create') ?>" method="POST">
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
                                <label>Nama Klien</label>
                                <input type="text" class="form-control" name="klien" value="<?= set_value('klien') ?>" placeholder="Nama Klien">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Nama Arsitek</label>
                            <input type="text" class="form-control" name="arsitek" value="<?= set_value('arsitek') ?>" placeholder="Nama Arsitek">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Tanggal Survey</label>
                            <input type="text" class="form-control datepicker" name="tgl_survey" value="<?= set_value('tgl_survey') ?>" placeholder="Tanggal Survey" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Jam Survey</label>
                            <input type="time" class="form-control" name="jam_survey" value="<?= set_value('jam_survey') ?>" placeholder="Jam Survey">
                            </div>
                        </div>
                        <div class="col-12">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Survey"><?= set_value('deskripsi') ?></textarea>
                        </div>
                    </div>
                </div>
                
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Add</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
  $(document).ready(function() {
    $(".datepicker").datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true,
        weekStart: 1
    });
  })
</script>
<?= $this->endSection() ?>