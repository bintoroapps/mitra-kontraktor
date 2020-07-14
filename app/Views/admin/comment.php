<?= $this->extend('admin/main') ?>

<?= $this->section('css') ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('dash/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('dash/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Komentar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Komentar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        <?php if(session()->get('success')): ?>
            <div class="form-group">
                <div class="alert alert-success" role="alert">
                    <?= session()->get('success') ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if(isset($validation)): ?>
          <div class="alert alert-danger" role="alert">
            <?= $validation->listErrors() ?>
          </div>
        <?php endif; ?>
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Artikel</th>
                  <th>Komentar</th>
                  <th>ID Dibalas</th>
                  <th>Waktu</th>
                  <th>Pilihan</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    if(isset($comments)):
                        foreach($comments as $c):
                ?>
                <tr>
                  <td><?= $c->blog_comment_id ?></td>
                  <td><?= $c->blog_comment_user ?></td>
                  <td><?= $c->blog_title ?></td>
                  <td><?= $c->blog_comment_content ?></td>
                  <td class="text-center"><?= $c->reply_id ? $c->reply_id : '-' ?></td>
                  <td><?= date('d-m-Y H:i:s', strtotime($c->blog_comment_created)) ?></td>
                  <td class="text-center">
                      <button class="btn btn-warning btn-sm btn-reply-comment" comment-id="<?= $c->blog_comment_id ?>" blog-id="<?= $c->blog_id ?>" reply-id="<?= $c->reply_id ?>" title="balas komentar"><i class="fas fa-reply"></i></button>
                      <button class="btn btn-danger btn-sm btn-delete-comment" comment-id="<?= $c->blog_comment_id ?>" title="hapus komentar"><i class="fas fa-trash"></i></button>
                  </td>
                </tr>
                <?php
                    endforeach;
                 endif; 
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Modal -->
  <div class="modal fade" id="modal-default" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="<?= base_url('admin/komentar') ?>" method="POST">
            
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<!-- DataTables -->
<script src="<?= base_url('dash/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('dash/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('dash/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('dash/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


<script>
$(document).ready(function() {
     $('#example2').DataTable({
         "order": [[0, "desc"]]
     })

    $('.btn-reply-comment').on('click', function() {
        let comment_id = $(this).attr('comment-id')
        let blog_id = $(this).attr('blog-id')
        let reply_id = $(this).attr('reply-id')
        $('.modal-title').text('Balas Komentar')
        $('form').html(`
            <div class="modal-body">
                <div class="form-group">
                    <textarea class="form-control" name="reply" placeholder="tulis balasan di sini"></textarea>
                    <input type="hidden" name="comment_id" value="${comment_id}">
                    <input type="hidden" name="blog_id" value="${blog_id}">
                    <input type="hidden" name="reply_id" value="${reply_id}">
                </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Reply</button>
            </div>
        `)
        $('.modal').modal('show')
    })

    $('body').on('click', '.btn-delete-comment', function() {
        let comment_id = $(this).attr('comment-id')
        Swal.fire({
            title: 'Do you want to delete this comment ?',
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
                    url: "/admin/komentar/delete",
                    data: {
                        comment_id: comment_id
                    },
                    beforeSend: function() {
                        let timerInterval;
                        Swal.fire({
                            title: 'Please Wait',
                            html: 'Kami Sedang Menghapus Komentar',
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
                        $('body').find('.btn-delete-comment[comment-id="' + comment_id + '"]').parent().parent().remove()
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Komentar Sukses Dihapus',
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