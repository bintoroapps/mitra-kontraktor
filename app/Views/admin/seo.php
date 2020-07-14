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
            <h1>SEO Analysis</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">SEO Analysis</li>
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
                <h3 class="card-title">SEO Analysis</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url('admin/seo/update') ?>" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label>Focus Keyphrase</label>
                    <input type="text" class="form-control" name="focus_keyphrase" placeholder="Focus Keyphrase">
                  </div>
                  <div class="form-group">
                    <label>SEO Title</label>
                    <input type="text" class="form-control" name="seo_title" placeholder="SEO Title">
                    <br>
                    <div class="progress">
                        <div class="progress-bar bg-success seo-title" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="65"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Meta description</label>
                    <textarea name="meta_description" class="form-control" placeholder="Meta Description"></textarea>
                    <br>
                    <div class="progress">
                        <div class="progress-bar bg-danger meta-description" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="160"></div>
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
  </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
$(document).ready(function() {
    $('input[name="seo_title"]').on('keyup', function(e) {
        let seo_title_length = $(this).val().length
        let seo_title_width = (seo_title_length / parseInt($('.seo-title').attr('aria-valuemax'))) * 100

        if(seo_title_length >= 41 && seo_title_length <= 61) {
            $('.seo-title').removeClass('bg-success')
            $('.seo-title').removeClass('bg-danger')
            $('.seo-title').addClass('bg-success')
        } else {
            $('.seo-title').removeClass('bg-success')
            $('.seo-title').removeClass('bg-danger')
            $('.seo-title').addClass('bg-danger')
        }

        $('.seo-title').attr('style', `width:${seo_title_width}%`)
        $('.seo-title').attr('aria-valuenow', seo_title_length)
    })

    $('textarea').on('keyup', function(e) {
        let meta_description_length = $(this).val().length
        let meta_description_width = (meta_description_length / parseInt($('.meta-description').attr('aria-valuemax'))) * 100

        if(meta_description_length >= 120 && meta_description_length <= 156) {
            $('.meta-description').removeClass('bg-success')
            $('.meta-description').removeClass('bg-danger')
            $('.meta-description').addClass('bg-success')
        } else {
            $('.meta-description').removeClass('bg-success')
            $('.meta-description').removeClass('bg-danger')
            $('.meta-description').addClass('bg-danger')
        }

        $('.meta-description').attr('style', `width:${meta_description_width}%`)
        $('.meta-description').attr('aria-valuenow', meta_description_length)
    })
})
</script>
<?= $this->endSection() ?>