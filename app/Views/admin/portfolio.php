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
            <h1>Portfolio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Portfolio</li>
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
                <a href="<?= base_url('admin/portfolio/create') ?>" class="btn btn-primary btn-add-jasa float-right">Add New Portfolio</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Klien</th>
                  <th>Kategori</th>
                  <th>Tahun Selesai</th>
                  <th>Pilihan</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    if(isset($portfolio)):
                        foreach($portfolio as $p):
                ?>
                <tr>
                  <td><?= $p->portfolio_title?></td>
                  <td><?= $p->portfolio_client ?></td>
                  <td><?= ucwords(strtolower($p->portfolio_category_name)) ?></td>
                  <td><?= $p->portfolio_year_completed ?></td>
                  <td class="text-center">
                      <a href="<?= base_url('admin/portfolio/layout/' . $p->portfolio_id) ?>" class="btn btn-success btn-sm"  title="kihat layout"><i class="fas fa-newspaper"></i></a>
                      <a href="<?= base_url('admin/portfolio/detail/' . $p->portfolio_id) ?>" class="btn btn-primary btn-sm"  title="detail portfolio"><i class="fas fa-eye"></i></a>
                      <a href="<?= base_url('admin/portfolio/edit/' . $p->portfolio_id) ?>" class="btn btn-warning btn-sm"  title="edit portfolio"><i class="fas fa-edit"></i></a>
                      <button class="btn btn-danger btn-sm btn-delete-portfolio" portfolio-id="<?= $p->portfolio_id ?>" title="hapus portfolio"><i class="fas fa-trash"></i></button>
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

    $('body').on('click', '.btn-delete-portfolio', function() {
        let portfolio_id = $(this).attr('portfolio-id')
        Swal.fire({
            title: 'Do you want to delete this portfolio ?',
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
                    url: "/admin/portfolio/delete",
                    data: {
                        portfolio_id: portfolio_id
                    },
                    beforeSend: function() {
                        let timerInterval;
                        Swal.fire({
                            title: 'Please Wait',
                            html: 'Kami Sedang Menghapus Portfolio',
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
                        $('body').find('.btn-delete-portfolio[portfolio-id="' + portfolio_id + '"]').parent().parent().remove()
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Portfolio Sukses Dihapus',
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