<?= $this->extend('admin/main') ?>

<?= $this->section('css') ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('dash/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('dash/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jasa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Testimonial</li>
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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title float-right"><a href="#" class="btn btn-primary">Add New Testimonial</a></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>Nama Klien</th>
                        <th>Project</th>
                        <th>Testimonial</th>
                        <th>Pilihan</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php 
                          if(isset($testi)):
                              foreach($testi as $t):
                      ?>
                      <tr>
                        <td><?= $t->testimonial_name ?></td>
                        <td></td>
                        <td><?= $t->testimonial_desc ?></td>
                        <td class="text-center">
                            <a href="#" class="btn btn-primary btn-sm" title="lihat detail testimoni"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-warning btn-sm" title="edit testimoni"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-danger btn-sm btn-delete-testimonial" testimonial-id="<?= $t->testimonial_id ?>" title="hapus testimoni"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>
                      <?php
                          endforeach;
                       endif; 
                      ?>
                      </tbody>
                    </table>
                </div>
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
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<!-- DataTables -->
<script src="<?= base_url('dash/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('dash/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('dash/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('dash/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
$(document).ready(function() {
    $('#example2').DataTable({
        columnDefs: [
            { width: 100, targets: 0 },
            { width: 100, targets: 1 },
            { width: 100, targets: 3 },
        ],
    })

    // $('body').on('click', '.btn-delete-jasa', function() {
    //     let jasa_id = $(this).attr('jasa-id')
    //     Swal.fire({
    //         title: 'Do you want to delete this jasa ?',
    //         text: "",
    //         type: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes'
    //     }).then((result) => {
    //         if (result.value) {
    //             $.ajax({
    //                 type: "POST",
    //                 url: "/admin/jasa/delete",
    //                 data: {
    //                     jasa_id: jasa_id
    //                 },
    //                 beforeSend: function() {
    //                     let timerInterval;
    //                     Swal.fire({
    //                         title: 'Please Wait',
    //                         html: 'Kami Sedang Menghapus Jasa',
    //                         timerProgressBar: true,
    //                         onBeforeOpen: () => {
    //                             Swal.showLoading()
    //                         },
    //                         onClose: () => {
    //                             clearInterval(timerInterval)
    //                         }
    //                         }).then((result) => {
    //                         if (
    //                             /* Read more about handling dismissals below */
    //                             result.dismiss === Swal.DismissReason.timer
    //                         ) {
    //                             console.log('I was closed by the timer') // eslint-disable-line
    //                         }
    //                         })
    //                 },
    //                 success: function(response) {
    //                     $('body').find('.btn-delete-jasa[jasa-id="' + jasa_id + '"]').parent().parent().remove()
    //                     Swal.fire({
    //                         position: 'center',
    //                         icon: 'success',
    //                         title: 'Jasa Sukses Dihapus',
    //                         showConfirmButton: false,
    //                         timer: 1500
    //                     });
    //                 }
    //             });
    //         }
    //     });
    // })
})
</script>

<?= $this->endSection() ?>