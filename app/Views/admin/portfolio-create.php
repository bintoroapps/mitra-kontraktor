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
            <h1>Tambah Portfolio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Tambah Portfolio</li>
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
                <h3 class="card-title">Form Tambah Portfolio</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url('admin/portfolio/create') ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <?php if(isset($validation)): ?>
                        <div class="form-group">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(session()->get('error')): ?>
                        <div class="form-group">
                            <div class="alert alert-danger" role="alert">
                                <?= session()->get('error') ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?= set_value('name') ?>" placeholder="Nama Portfolio">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Nama Klien</label>
                            <input type="text" class="form-control" name="klien" value="<?= set_value('klien') ?>" placeholder="Nama Klien">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Pekerjaan Klien</label>
                            <input type="text" class="form-control" name="pekerjaan_klien" value="<?= set_value('pekerjaan_klien') ?>" placeholder="Pekerjaan Klien">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Testimoni Klien</label>
                            <textarea class="form-control" name="testimoni_klien" placeholder="Testimoni Klien"><?= set_value('testimoni_klien') ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Foto Klien</label>
                            <input type="file" class="form-control" name="foto_klien" value="<?= set_value('foto_klien') ?>" placeholder="Foto Klien"  accept="image/*">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Logo Klien</label>
                            <input type="file" class="form-control" name="logo_klien" value="<?= set_value('logo_klien') ?>" placeholder="Logo Klien"  accept="image/*">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" class="form-control" name="lokasi" value="<?= set_value('lokasi') ?>" placeholder="Lokasi">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Luas Area (m2)</label>
                            <input type="text" class="form-control luas-area format-rupiah" name="luas_area" value="<?= set_value('luas_area') ?>" placeholder="Luas Area (m2)">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Tahun Selesai</label>
                            <input type="number" class="form-control" name="tahun_selesai" value="<?= set_value('tahun_selesai') ?>" placeholder="Tahun Selesai">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Nilai Project (Rp)</label>
                            <input type="text" class="form-control nilai-project format-rupiah" name="nilai_project" value="<?= set_value('tahun_selesai') ?>" placeholder="Nilai Project (Rp)">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Arsitek</label>
                            <input type="text" class="form-control" name="arsitek" value="<?= set_value('arsitek') ?>" placeholder="Arsitek">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Informasi</label>
                            <textarea name="informasi" class="form-control" placeholder="Informasi Project"><?= set_value('informasi') ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Project"><?= set_value('deskripsi') ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Tantangan</label>
                                <textarea name="tantangan" class="form-control" placeholder="Tantangan Project"><?= set_value('tantangan') ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Poin-Poin Tantangan</label>
                                <button type="button" class="btn d-block btn-success mb-2 btn-add-point-challenge">Tambah</button>
                                <div class="row">
                                    <div class="col-12 col-point-challenge">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="point_challenge[]" required placeholder="Poin Ke-1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Solusi</label>
                                <textarea name="solusi" class="form-control" placeholder="Solusi dari Tantangan"><?= set_value('solusi') ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Hasil</label>
                                <textarea name="hasil" class="form-control" placeholder="Hasil Project"><?= set_value('hasil') ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Gambar Utama</label>
                                <input type="file" class="form-control" name="main_image" accept="image/*" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Gambar-Gambar Lain (Multiple)</label>
                                <input type="file" class="form-control" name="other_image[]" multiple accept="image/*">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori_name" class="form-control kategori-val">
                                <option value="" selected disabled>--Pilih Kategori--</option>
                                <?php 
                                    if($category):
                                        foreach($category as $c): 
                                ?>
                                <option value="<?= $c->portfolio_category_id ?>" <?= set_value('kategori_name') == $c->portfolio_category_id ? 'selected' : '' ?>><?= $c->portfolio_category_name ?></option>
                                <?php 
                                    endforeach;
                                    endif; 
                                ?>
                            </select>
                            <input type="hidden" class="kategori_tipe" name="kategori_tipe" value="select"> 
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                            <label>New Kategori</label>
                            <button type="button" class="btn btn-warning btn-new-category">New Category</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" name="save" value="save-as" class="btn btn-primary">Add New</button>
                  <button type="submit" name="save" value="save-as-webp" class="btn btn-success">Add New with Converting Image</button>
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
    <!-- Modal -->
  <div class="modal fade modal-kategori" id="modal-default" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="Kategori Baru"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control new-kategori-val" placeholder="Kategori Baru">
            </div>             
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-tambah-kategori">Tambah Kategori</button>
            </div>
        </div>  
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
$(document).ready(function() {
  luasArea()
  nilaiProject()
  toRupiah()

  $('.btn-new-category').on('click', function() {
        $('.new-kategori-val').val('')
        $('.modal-kategori').modal('show')
    })

  $('.btn-tambah-kategori').on('click', function() {
        let kategori = $('.new-kategori-val').val()
        $('body').find('.kategori_tipe').val('new')
        $('body').find('.kategori-val').replaceWith(`
            <input type="text" class="form-control kategori-val" name="kategori_name" value="${kategori}" readonly>
        `)
        $('.modal-kategori').modal('hide')
    })

    $('.btn-add-point-challenge').on('click', function() {
        $('.col-point-challenge').append(`
            <div class="form-group">
                <input type="text" class="form-control" name="point_challenge[]" required placeholder="Poin Ke-1">
            </div>
        `)

        $('[name="point_challenge[]"]').each(function(e){
            $(this).attr('placeholder', `Poin Ke-${e+1}`)
        })
    })
})

function toRupiah() {
  $('.format-rupiah').on('keyup', function() {
    let formatted = formatRupiah($(this).val())
    $(this).val(formatted)
  })
}

function luasArea() {
  var input = document.querySelector('.luas-area');
  input.addEventListener('input', function() {
      this.value = this.value.replace(/[^0-9 \,]/, '');
  });
}

function nilaiProject() {
  var input = document.querySelector('.nilai-project');
  input.addEventListener('input', function() {
      this.value = this.value.replace(/[^0-9 \,]/, '');
  });
}

const formatRupiah = angka => {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return rupiah;
}
</script>
<?= $this->endSection() ?>