<?= $this->extend('admin/main') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Portfolio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('/admin/dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Portfolio</li>
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
                      <td style="width: 1%;">Nama</td>
                      <td>:</td>
                      <td><?= $portfolio->portfolio_title ?></td>
                    </tr>
                    <tr>
                      <td>Nama Klien</td>
                      <td>:</td>
                      <td><?= $portfolio->portfolio_client ?></td>
                    </tr>
                    <tr>
                      <td>Pekerjaan Klien</td>
                      <td>:</td>
                      <td><?= $portfolio->portfolio_client_job ? $portfolio->portfolio_client_job : '-' ?></td>
                    </tr>
                    <tr>
                      <td>Testimoni Klien</td>
                      <td>:</td>
                      <td><?= $portfolio->portfolio_testimonial ? $portfolio->portfolio_testimonial : '-' ?></td>
                    </tr>
                    <tr>
                      <td>Foto Klien</td>
                      <td>:</td>
                      <td><?= $portfolio->portfolio_client_photo ? '<img src="'.$portfolio->portfolio_client_photo.'" width="100px">' : '-' ?></td>
                    </tr>
                    <tr>
                      <td>Logo Klien</td>
                      <td>:</td>
                      <td><?= $portfolio->portfolio_client_logo ? '<img src="'.$portfolio->portfolio_client_logo.'" width="100px">' : '-' ?></td>
                    </tr>
                    <tr>
                      <td>Lokasi</td>
                      <td>:</td>
                      <td><?= $portfolio->portfolio_location ?></td>
                    </tr>
                    <tr>
                      <td>Luas Area</td>
                      <td>:</td>
                      <td><?= $portfolio->portfolio_surface_area ?> m2</td>
                    </tr>
                    <tr>
                      <td>Tahun Selesai</td>
                      <td>:</td>
                      <td><?= $portfolio->portfolio_year_completed ?></td>
                    </tr>
                    <tr>
                      <td>Nilai Project</td>
                      <td>:</td>
                      <td>Rp <?= $portfolio->portfolio_value ?></td>
                    </tr>
                    <tr>
                      <td>Arsitek</td>
                      <td>:</td>
                      <td><?= $portfolio->portfolio_architect ?></td>
                    </tr>
                    <tr>
                      <td>Informasi</td>
                      <td>:</td>
                      <td><?= $portfolio->portfolio_information ?></td>
                    </tr>
                    <tr>
                      <td>Deskripsi</td>
                      <td>:</td>
                      <td><?= $portfolio->portfolio_description ?></td>
                    </tr>
                    <tr>
                      <td>Tantangan</td>
                      <td>:</td>
                      <td><?= $portfolio->portfolio_challenge ?></td>
                    </tr>
                    <tr>
                      <td>Poin Tantangan</td>
                      <td>:</td>
                      <td>
                        <?php if(!empty(json_decode($portfolio->portfolio_challenge_detail, true))): ?>
                      <ul>
                          <?php 
                                  for($i = 0; $i <= count(json_decode($portfolio->portfolio_challenge_detail, true)) - 1; $i++): 
                          ?>
                              <li><?= json_decode($portfolio->portfolio_challenge_detail, true)[$i] ?></li>
                          <?php
                                  endfor;
                               ?>
                      </ul>
                            <?php 
                            else:
                              echo '-';
                            endif; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Solusi</td>
                      <td>:</td>
                      <td><?= $portfolio->portfolio_what_we_did ?></td>
                    </tr>
                    <tr>
                      <td>Hasil</td>
                      <td>:</td>
                      <td><?= $portfolio->portfolio_result ?></td>
                    </tr>
                    <tr>
                      <td>Gambar Utama</td>
                      <td>:</td>
                      <td><img src="<?= base_url('media/' . $portfolio->portfolio_main_image) ?>" width="300"></td>
                    </tr>
                  </tbody>
                    <tr>
                      <td>Gambar-Gambar Lain</td>
                      <td>:</td>
                      <td>
                          <?php 
                            if($portfolio_images):
                                foreach($portfolio_images as $pi):
                            ?>
                            <img src="<?= base_url('media/' . $pi->portfolio_images_name) ?>" width="300">
                          <?php
                            endforeach;
                             endif; 
                            ?>
                      </td>
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