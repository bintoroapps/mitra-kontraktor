<?= $this->extend('admin/main') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Social Media</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('/admin/dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Social Media</li>
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
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                 <thead>
                     <th>Social Media</th>
                     <th>Link/Deksripsi</th>
                     <th>Pilihan</th>
                 </thead>
                  <tbody>
                      <?php 
                        if(isset($socmed)):
                            foreach($socmed as $s): 
                      ?>
                        <tr>
                            <td><?= $s->social_media_name ?></td>
                            <td class="socmed-content"><?= $s->social_media_content ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm btn-edit-socmed" socmed-id="<?= $s->social_media_id ?>" socmed-content="<?= $s->social_media_content ?>"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                      <?php
                            endforeach;
                         endif; 
                      ?>
                  </tbody>
                </table>
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
  <!-- Modal -->
<div class="modal fade modal-socmed id="modal-default" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Link/Deskripsi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control link-form">
                    <input type="hidden" class="social-media-id-form">
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <button class="btn btn-success btn-save-form float-right">Save</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
$(document).ready(function() {
    $('.btn-edit-socmed').on('click', function() {
        let socmed_id = $(this).attr('socmed-id')
        let socment_content = $(this).attr('socmed-content')
        $('.link-form').val(socment_content)
        $('.social-media-id-form').val(socmed_id)

        $('.modal-socmed').modal('show')
    })

    $('body').on('click', '.btn-save-form', function() {
        let socmed_new_id = $('.social-media-id-form').val()
        let socmed_content_new = $('.link-form').val()

        Swal.fire({
            title: `Do you want to edit link/description ?`,
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "/admin/social-media/edit",
                    data: {
                        socmed_id: socmed_new_id,
                        socmed_content: socmed_content_new
                    },
                    beforeSend: function() {
                        let timerInterval;
                        Swal.fire({
                            title: 'Please Wait',
                            html: 'Kami Sedang Mengedit Link/Deskripsi Social Media Anda',
                            timerProgressBar: true,
                            onBeforeOpen: () => {
                                Swal.showLoading()
                            },
                            onClose: () => {
                                clearInterval(timerInterval)
                            }
                            }).then((result) => {
                            if (
                                /* Read more about handling dismissals below */
                                result.dismiss === Swal.DismissReason.timer
                            ) {
                                console.log('I was closed by the timer') // eslint-disable-line
                            }
                            })
                    },
                    success: function(response) {
                        $('.modal-socmed').modal('hide')
                        $('body').find('.btn-edit-socmed[socmed-id="' + socmed_new_id + '"]').attr('socmed-content', socmed_content_new)
                        $('body').find('.btn-edit-socmed[socmed-id="' + socmed_new_id + '"]').parent().parent().find('.socmed-content').html(socmed_content_new)
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Social Media Sukses Diupdate',
                            showConfirmButton: false,
                            timer: 1500
                        });

                    }
                });
            }
        });
    })
})
</script>
<?= $this->endSection() ?>