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
            <h1>Appointment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Appointment</li>
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
            <!-- <div class="card-header">
                <a href="<?= base_url('admin/appointment/create') ?>" class="btn btn-primary btn-add-jasa float-right">Add New Appointment</a>
            </div> -->
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="d-none">ID</th>
                  <th>Nama Klien</th>
                  <th>Email</th>
                  <th>Arsitek</th>
                  <th>Tgl Survey</th>
                  <th>Jam Survey</th>
                  <th>Keterangan</th>
                  <th>Pilihan</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    if(isset($appointment)):
                        foreach($appointment as $a):
                ?>
                <tr>
                  <td class="d-none"><?= $a->appointment_id ?></td>
                  <td><?= $a->appointment_client ?></td>
                  <td><?= $a->appointment_email ?></td>
                  <td><?= $a->appointment_arsitek ?></td>
                  <td><?= date('d-m-Y', strtotime($a->appointment_date)) ?></td>
                  <td><?= date('H:i', strtotime($a->appointment_time)) ?></td>
                  <td><?= $a->appointment_description ?></td>
                  <td class="text-center">
                      <a href="<?= base_url('admin/appointment/edit/' . $a->appointment_id) ?>" class="btn btn-warning btn-sm" title="edit appointment"><i class="fas fa-edit"></i></a>
                      <button class="btn btn-danger btn-sm btn-delete-appointment" appointment-id="<?= $a->appointment_id ?>" title="hapus appointment"><i class="fas fa-trash"></i></button>
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

    $('body').on('click', '.btn-delete-appointment', function() {
        let appointment_id = $(this).attr('appointment-id')
        Swal.fire({
            title: 'Do you want to delete this appointment ?',
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
                    url: "/admin/appointment/delete",
                    data: {
                        appointment_id: appointment_id
                    },
                    beforeSend: function() {
                        let timerInterval;
                        Swal.fire({
                            title: 'Please Wait',
                            html: 'Kami Sedang Menghapus Kupon',
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
                        $('body').find('.btn-delete-appointment[appointment-id="' + appointment_id + '"]').parent().parent().remove()
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Appointment Sukses Dihapus',
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