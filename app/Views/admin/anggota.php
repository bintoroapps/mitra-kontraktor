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
            <h1>Anggota</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Anggota</li>
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
              <h3 class="card-title float-right">
                <a href="<?= base_url('admin/anggota/role') ?>" class="btn btn-success">Role Anggota</a>
                <a href="<?= base_url('admin/anggota/create') ?>" class="btn btn-primary">Tambah Anggota</a>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="d-none">ID</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Pilihan</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    if(isset($anggota)):
                        foreach($anggota as $a):
                ?>
                <tr>
                  <td class="d-none"><?= $a->id ?></td>
                  <td><?= $a->lastname ? $a->firstname . ' ' . $a->lastname : $a->firstname ?></td>
                  <td><?= $a->email ?></td>
                  <td><?= strtoupper($a->role_name) ?></td>
                  <td class="user-status"><?= $a->status == 'aktif' ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Non Aktif</span>' ?></td>
                  <td class="text-center">
                     <button class="btn btn-info btn-sm btn-change-status" anggota-id="<?= $a->id ?>" anggota-status="<?= $a->status ?>" title="ubah status anggota"><i class="fas fa-recycle"></i></button>
                      <a href="<?= base_url('admin/anggota/edit/' . $a->id) ?>" class="btn btn-warning btn-sm" title="edit anggota"><i class="fas fa-edit"></i></a>
                      <button class="btn btn-danger btn-sm btn-delete-anggota" anggota-id="<?= $a->id ?>" title="hapus anggota"><i class="fas fa-trash"></i></button>
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

    $('body').on('click', '.btn-change-status', function() {
        let anggota_id = $(this).attr('anggota-id')
        let anggota_status = $(this).attr('anggota-status')
        Swal.fire({
            title: `Apakah anda ingin mengubah status user ini menjadi ${anggota_status == 'aktif' ? 'NON AKTIF' : 'AKTIF'} ?`,
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
                    url: "/admin/anggota/change-status",
                    data: {
                        anggota_status: anggota_status == 'aktif' ? 'nonaktif' : 'aktif',
                        anggota_id: anggota_id
                    },
                    beforeSend: function() {
                        let timerInterval;
                        Swal.fire({
                            title: 'Please Wait',
                            html: 'Kami Sedang Mengubah Status User',
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
                        $('body').find('.btn-change-status[anggota-id="' + anggota_id + '"]').attr('anggota-status', anggota_status == 'aktif' ? 'nonaktif' : 'aktif')
                        $('body').find('.btn-change-status[anggota-id="' + anggota_id + '"]').parent().parent().find('.user-status').html(anggota_status == 'aktif' ? `<span class="badge badge-danger">Non Aktif</span>` : `<span class="badge badge-success">Aktif</span>`)
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Status User Berhasil Diubah',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        });
    })

    $('body').on('click', '.btn-delete-anggota', function() {
        let anggota_id = $(this).attr('anggota-id')
        Swal.fire({
            title: `Apakah anda ingin menghapus user ini ?`,
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
                    url: "/admin/anggota/delete",
                    data: {
                        anggota_id: anggota_id
                    },
                    beforeSend: function() {
                        let timerInterval;
                        Swal.fire({
                            title: 'Please Wait',
                            html: 'Kami Sedang Menghapus User',
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
                        $('body').find('.btn-delete-anggota[anggota-id="' + anggota_id + '"]').parent().parent().remove()
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'User Berhasil Dihapus',
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