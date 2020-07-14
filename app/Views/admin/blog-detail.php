<?= $this->extend('admin/main') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Artikel</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('/admin/dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Detail Artikel</li>
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
                  <tbody>
                    <tr>
                      <td>Judul</td>
                      <td>:</td>
                      <td><?= $blog->blog_title ?></td>
                    </tr>
                    <tr>
                      <td>Kategori</td>
                      <td>:</td>
                      <td><?= $blog->blog_category_name ?></td>
                    </tr>
                    <?php
                        $tag_array = json_decode($blog->blog_tags, true);
                        $tags = '';
                        for($i = 0; $i <= count($tag_array) - 1; $i++) {
                            $tags .= $tag_array[$i] . ', ';
                        }
                        $tags = substr($tags, 0,-2);
                    ?>
                    <tr>
                      <td>Tags</td>
                      <td>:</td>
                      <td><?= $tags ?></td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td>:</td>
                      <td><?= ucwords($blog->blog_status) ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Post</td>
                      <td>:</td>
                      <td><?= $blog->blog_post ? date('d-m-Y', strtotime($blog->blog_post)) : '-' ?></td>
                    </tr>
                    <tr>
                      <td>Konten</td>
                      <td>:</td>
                      <td><?= $blog->blog_content ?></td>
                    </tr>
                    <tr>
                      <td>Gambar Utama</td>
                      <td>:</td>
                      <td><img src="<?= base_url('media/' . $blog->blog_image) ?>" width="300"></td>
                    </tr>
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
<?= $this->endSection() ?>