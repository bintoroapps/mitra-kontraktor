<?= $this->extend('admin/main') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Media</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('/admin/dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Media</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                        <div class="row row-media">
                            <?php 
                                if($media):
                                    foreach($media as $m):  
                            ?>
                            <div class="col-md-3 col-sm-6 mb-3 col-media" media-id="<?= $m->media_id ?>">
                                <a href="<?= base_url('media/' . $m->media_name) ?>" data-fancybox><img src="<?= base_url('media/' . $m->media_name) ?>" style="width:100%;" alt="<?= $m->media_name ?>" class="img-thumbnail"></a>
                            </div>
                            <?php
                                    endforeach;
                                endif; 
                            ?>
                            <?php if($count > 12): ?>
                                <div class="col-md-12 col-load-more text-center">
                                  <button class="btn btn-primary btn-load-more">Load More</button>
                                </div>
                            <?php endif; ?>
                        </div>
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
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script>
$(document).ready(function() {
    $('body').on('click', '.btn-load-more', function() {
        let last_id = $('.col-media').last().attr('media-id')
        $.ajax({
            type: 'get',
            url: '/admin/media/load-more',
            data: {
                last_id: last_id
            },
            beforeSend: function() {
                $('.btn-load-more').text('loading..')
            },
            success: function(response) {
                $('body').find('.col-load-more').remove()
                $('.row-media').append(response)
            }
        })
    })
})
</script>
<?= $this->endSection() ?>