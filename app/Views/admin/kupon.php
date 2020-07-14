<?= $this->extend('admin/main') ?>

<?= $this->section('css') ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('dash/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('dash/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kupon</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Kupon</li>
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
            <div class="card-header">
                <button class="btn btn-primary btn-add-jasa float-right">Add New Kupon</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Kode</th>
                  <th>Diskon</th>
                  <th>Masa Berlaku</th>
                  <th>Pilihan</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    if(isset($kupon)):
                        foreach($kupon as $k):
                ?>
                <tr>
                  <td><?= $k->kupon_name ?></td>
                  <td><?= $k->kupon_kode ?></td>
                  <td><?= $k->kupon_diskon ?>%</td>
                  <td><?= date('d-m-Y', strtotime($k->kupon_awal)) ?> - <?= date('d-m-Y', strtotime($k->kupon_akhir)) ?></td>
                  <td class="text-center">
                      <button class="btn btn-warning btn-sm btn-edit-kupon" kupon-id="<?= $k->kupon_id ?>" kupon-name="<?= $k->kupon_name ?>" kupon-kode="<?= $k->kupon_kode ?>" kupon-diskon="<?= $k->kupon_diskon ?>" kupon-mulai="<?= date('d-m-Y', strtotime($k->kupon_awal)) ?>" kupon-akhir="<?= date('d-m-Y', strtotime($k->kupon_akhir)) ?>" title="edit kupon"><i class="fas fa-edit"></i></button>
                      <button class="btn btn-danger btn-sm btn-delete-kupon" kupon-id="<?= $k->kupon_id ?>" title="hapus kupon"><i class="fas fa-trash"></i></button>
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
        <form action="<?= base_url('admin/kupon') ?>" method="POST">
            
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


<script>
$(document).ready(function() {
    $('#example2').DataTable()

    $('.btn-add-jasa').on('click', function() {
        $('.modal-title').text('Tambah Kupon')
        $('form').html(`
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control">
                    <input type="hidden" name="act" value="add">
                </div>
                <div class="form-group">
                    <label>Kode</label>
                    <input type="text" name="kode" class="form-control">
                </div>
                <div class="form-group">
                    <label>Mulai Berlaku</label>
                    <input type="text" name="mulai_berlaku" class="form-control datepicker" readonly>
                </div>
                <div class="form-group">
                    <label>Selesai Berlaku</label>
                    <input type="text" name="selesai_berlaku" class="form-control datepicker" readonly>
                </div>
                <div class="form-group">
                    <label>Diskon (%)</label>
                    <input type="number" name="diskon" class="form-control">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        `)
        datepicker()
        $('.modal').modal('show')
    })

    $('body').on('click', '.btn-edit-kupon', function() {
      let kupon_id = $(this).attr('kupon-id')
      let kupon_name = $(this).attr('kupon-name')
      let kupon_kode = $(this).attr('kupon-kode')
      let kupon_diskon = $(this).attr('kupon-diskon')
      let kupon_mulai = $(this).attr('kupon-mulai')
      let kupon_akhir = $(this).attr('kupon-akhir')
      $('.modal-title').text('Edit Kupon')
      $('form').html(`
          <div class="modal-body">
              <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" value="${kupon_name}">
                  <input type="hidden" name="kupon_id" value="${kupon_id}">
                  <input type="hidden" name="act" value="edit">
              </div>
              <div class="form-group">
                  <label>Kode</label>
                  <input type="text" name="kode" class="form-control" value="${kupon_kode}">
              </div>
              <div class="form-group">
                  <label>Mulai Berlaku</label>
                  <input type="text" name="mulai_berlaku" class="form-control datepicker" value="${kupon_mulai}" readonly>
              </div>
              <div class="form-group">
                  <label>Selesai Berlaku</label>
                  <input type="text" name="selesai_berlaku" class="form-control datepicker" value="${kupon_akhir}" readonly>
              </div>
              <div class="form-group">
                  <label>Diskon (%)</label>
                  <input type="number" name="diskon" value="${kupon_diskon}" class="form-control">
              </div>
          </div>
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        `)
        datepicker()
        $('.modal').modal('show')
    })

    $('body').on('click', '.btn-delete-kupon', function() {
        let kupon_id = $(this).attr('kupon-id')
        Swal.fire({
            title: 'Do you want to delete this kupon ?',
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
                    url: "/admin/kupon/delete",
                    data: {
                        kupon_id: kupon_id
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
                        $('body').find('.btn-delete-kupon[kupon-id="' + kupon_id + '"]').parent().parent().remove()
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Kupon Sukses Dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        });
    })
})

function datepicker() {
  $(".datepicker").datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
      todayHighlight: true,
      weekStart: 1
  });
}
</script>

<?= $this->endSection() ?>