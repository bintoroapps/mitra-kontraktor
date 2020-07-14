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
            <h1>Tim</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Tim</li>
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
                <a href="<?= base_url('admin/team/create') ?>" class="btn btn-primary btn-add-jasa float-right">Tambah Anggota Tim</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Gambar Profil</th>
                  <th>Jabatan</th>
                  <th>Facebook</th>
                  <th>Twitter</th>
                  <th>Google Plus</th>
                  <th>Instagram</th>
                  <th>Whatsapp</th>
                  <th>Pilihan</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    if(isset($teams)):
                        foreach($teams as $t):
                ?>
                <tr>
                  <td><?= $t->team_name ?></td>
                  <td><?= $t->team_image ? '<img width="150" src="'.base_url('media/' . $t->team_image).'">' : '-' ?></td>
                  <td><?= $t->team_role ?></td>
                  <td><?= $t->team_facebook ? '<a href="'.$t->team_facebook.'" target="_blank">Link</a>' : '-' ?></td>
                  <td><?= $t->team_twitter ? '<a href="'.$t->team_twitter.'" target="_blank">Link</a>' : '-' ?></td>
                  <td><?= $t->team_google_plus ? '<a href="'.$t->team_google_plus.'" target="_blank">Link</a>' : '-' ?></td>
                  <td><?= $t->team_instagram ? '<a href="'.$t->team_instagram.'" target="_blank">Link</a>' : '-' ?></td>
                  <td><?= $t->team_whatsapp ? $t->team_whatsapp : '-' ?></td>
                  <td class="text-center">
                      <a href="<?= base_url('admin/team/edit/' . $t->team_id) ?>" class="btn btn-warning btn-sm"  title="edit tim"><i class="fas fa-edit"></i></a>
                      <button class="btn btn-danger btn-sm btn-delete-team" team-id="<?= $t->team_id ?>" title="hapus tim"><i class="fas fa-trash"></i></button>
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
      "ordering": false
    })

    $('body').on('click', '.btn-delete-team', function() {
        let team_id = $(this).attr('team-id')
        Swal.fire({
            title: 'Apakah anda ingin menghapus anggota tim ini ?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "/admin/team/delete",
                    data: {
                        team_id: team_id
                    },
                    beforeSend: function() {
                        let timerInterval;
                        Swal.fire({
                            title: 'Please Wait',
                            html: 'Kami Sedang Menghapus Anggota Tim',
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
                        $('body').find('.btn-delete-team[team-id="' + team_id + '"]').parent().parent().remove()
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Anggota Tim Sukses Dihapus',
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