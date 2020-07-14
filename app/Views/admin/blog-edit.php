<?= $this->extend('admin/main') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('dash/plugins/summernote/summernote-bs4.css') ?>">
<link rel="stylesheet" href="<?= base_url('dash/plugins/jquery-tagsInput/jquery.tagsinput.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Artikel</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Edit Artikel</li>
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
                <h3 class="card-title">Form Tambah Artikel</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url('admin/artikel/edit/' . $blog->blog_id) ?>" method="POST" enctype="multipart/form-data">
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
                            <label>Judul</label>
                            <input type="text" class="form-control" name="judul" value="<?= set_value('judul', $blog->blog_title) ?>" placeholder="Judul Artikel">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Gambar Utama</label>
                            <input type="file" class="form-control" name="gambar_utama" value="<?= set_value('gambar_utama') ?>" placeholder="Gambar Utama">
                            </div>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori_name" class="form-control kategori-val">
                                <option value="" selected disabled>--Pilih Kategori--</option>
                                <?php 
                                    if($category):
                                        foreach($category as $c): 
                                ?>
                                <option value="<?= $c->blog_category_id ?>" <?= set_value('kategori_name', $blog->blog_category_id) == $c->blog_category_id ? 'selected' : '' ?>><?= $c->blog_category_name ?></option>
                                <?php 
                                    endforeach;
                                    endif; 
                                ?>
                            </select>
                            <input type="hidden" class="kategori_tipe" name="kategori_tipe" value="select"> 
                            </div>
                        </div>
                        <?php
                            $tag_array = json_decode($blog->blog_tags, true);
                            $tags = '';
                            for($i = 0; $i <= count($tag_array) - 1; $i++) {
                                $tags .= $tag_array[$i] . ',';
                            }
                            $tags = substr($tags, 0,-1);
                        ?>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                            <label>New Kategori</label>
                            <button type="button" class="btn btn-warning btn-new-category">New Category</button>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label>Tags</label>
                            <input  class="form-control tags" name="tags" value="<?= set_value('tags', $tags) ?>" placeholder="Tags">
                            </div>
                        </div>
                        <div class="col-12">
                            <label>Isi Konten</label>
                            <textarea name="konten" class="textarea"><?= set_value('konten', $blog->blog_content) ?></textarea>
                        </div>
                    </div>
                </div>
                
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-success" name="submit_type" value="draft">Save as Draft</button>
                  <button type="submit" class="btn btn-primary" name="submit_type" value="post">Save & Post</button>
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
<script src="<?= base_url('dash/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<script src="<?= base_url('dash/plugins/jquery-tagsInput/jquery.tagsinput.js') ?>"></script>
<script>
  $(document).ready(function() {
    // Summernote
    $('.textarea').summernote({
        height:350,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']]
        ],
    })

    $('.tags').tagsInput({
        'width': '100%',
        'height': '80px'
    });

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

  })
</script>
<?= $this->endSection() ?>