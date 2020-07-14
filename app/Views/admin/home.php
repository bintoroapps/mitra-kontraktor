<?= $this->extend('admin/main') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('dash/plugins/summernote/summernote-bs4.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
  .problem-list {
    list-style: none;
  }
  .problem-list li::before {
    content: "•"; 
    color: red;
    display: inline-block; 
    width: 1em;
    margin-left: -1em;
  }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Home Page Template</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Home Page Template</li>
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
          <?php if(session()->get('success')): ?>
              <div class="alert alert-success" role="alert">
                  <?= session()->get('success') ?>
              </div>
          <?php endif; ?>
          <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left text-dark" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        SEO Analysis&nbsp;&nbsp;<i class="fas fa-angle-down"></i>
                        </button>
                    </h2>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <form action="<?= base_url('admin/tampilan-website/home') ?>" method="POST">
                      <input type="hidden" name="act" value="seo">
                    <div class="card-body">
                    <div class="form-group">
                        <label>Focus Keyphrase</label>
                        <input type="text" class="form-control" value="<?= $home->home_page_keyphrase ?>" name="focus_keyphrase" placeholder="Focus Keyphrase">
                    </div>
                    <div class="form-group">
                        <label>SEO Title</label>
                        <input type="text" class="form-control" value="<?= $home->home_page_seo_title ?>" name="seo_title" placeholder="SEO Title">
                        <br>
                        <div class="progress">
                            <div class="progress-bar  <?= strlen(str_replace(' ', '', $home->home_page_seo_title)) >= 42 && strlen(str_replace(' ', '', $home->home_page_seo_title)) <= 63 ? 'bg-success' : 'bg-danger' ?> seo-title" role="progressbar" style="width: <?= (strlen(str_replace(' ', '', $home->home_page_seo_title))/65)*100 ?>%" aria-valuenow="<?= strlen(str_replace(' ', '', $home->home_page_seo_title)) ?>" aria-valuemin="0" aria-valuemax="65"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Meta description</label>
                        <textarea name="meta_description" class="form-control" placeholder="Meta Description"><?= $home->home_page_meta_description ?></textarea>
                        <br>
                        <div class="progress">
                            <div class="progress-bar <?= strlen(str_replace(' ', '', $home->home_page_meta_description)) >= 120 && strlen(str_replace(' ', '', $home->home_page_meta_description)) <= 156 ? 'bg-success' : 'bg-danger' ?> meta-description" role="progressbar" style="width: <?= (strlen(str_replace(' ', '', $home->home_page_meta_description))/160)*100 ?>%" aria-valuenow="<?= strlen(str_replace(' ', '', $home->home_page_meta_description)) ?>" aria-valuemin="0" aria-valuemax="160"></div>
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-12">
                          <p>Analysis Result</p>
                        </div>
                        <div class="col-12">
                          <small>problems</small>
                          <div class="row mt-3 pl-3">
                            <div div class="col-1 pr-0 text-danger text-length-problem"><i class="fas fa-circle"></i></div>
                            <div class="col-11 text-length-problem" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">text length:</p>
                              <p class="pt-0 mt-0 text-secondary">This is below the recommended minimum of 900 words.</p>
                            </div>
                            <div div class="col-1 pr-0 text-danger outbond-link-problem"><i class="fas fa-circle"></i></div>
                            <div class="col-11 outbond-link-problem" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">outbond links:</p>
                              <p class="pt-0 mt-0 text-secondary">There is no outbond link on this page</p>
                            </div>
                            <div class="col-1 pr-0 text-danger internal-link-problem"><i class="fas fa-circle"></i></div>
                            <div class="col-11 internal-link-problem" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">internal links:</p>
                              <p class="pt-0 mt-0 text-secondary">There is no internal link on this page</p>
                            </div>
                            <div class="col-1 pr-0 text-danger keyphrase-density-problem"><i class="fas fa-circle"></i></div>
                            <div class="col-11 keyphrase-density-problem" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase density:</p>
                              <p class="pt-0 mt-0 text-secondary">keyphrase density is too many or too little</p>
                            </div>
                            <div class="col-1 pr-0 text-danger title-problem <?= strlen(str_replace(' ', '', $home->home_page_seo_title)) >= 42 && strlen(str_replace(' ', '', $home->home_page_seo_title)) <= 63 ? 'd-none' : '' ?>"><i class="fas fa-circle"></i></div>
                            <div class="col-11 title-problem <?= strlen(str_replace(' ', '', $home->home_page_seo_title)) >= 42 && strlen(str_replace(' ', '', $home->home_page_seo_title)) <= 63 ? 'd-none' : '' ?>" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">seo title length:</p>
                              <p class="pt-0 mt-0 text-secondary">The seo title is too short (under 42 characters). Up to 63 characters are available. Use the space!</p>
                            </div>
                            <div class="col-1 pr-0 text-danger key-title-problem <?= strpos(strtolower($home->home_page_seo_title), strtolower($home->home_page_keyphrase)) !== false ? 'd-none' : '' ?>"><i class="fas fa-circle"></i></div>
                            <div class="col-11 key-title-problem <?= strpos(strtolower($home->home_page_seo_title), strtolower($home->home_page_keyphrase)) !== false ? 'd-none' : '' ?>" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase in seo title:</p>
                              <p class="pt-0 mt-0 text-secondary">no keyphrase appears in seo title</p>
                            </div>
                            <div class="col-1 pr-0 text-danger key-meta-problem <?= strpos(strtolower($home->home_page_meta_description), strtolower($home->home_page_keyphrase)) !== false ? 'd-none' : '' ?>"><i class="fas fa-circle"></i></div>
                            <div class="col-11 key-meta-problem <?= strpos(strtolower($home->home_page_meta_description), strtolower($home->home_page_keyphrase)) !== false ? 'd-none' : '' ?>" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase in meta description:</p>
                              <p class="pt-0 mt-0 text-secondary">no keyphrase appears in meta description</p>
                            </div>
                            <div class="col-1 pr-0 text-danger meta-problem <?= strlen(str_replace(' ', '', $home->home_page_meta_description)) >= 120 && strlen(str_replace(' ', '', $home->home_page_meta_description)) <= 156 ? 'd-none' : '' ?>"><i class="fas fa-circle"></i></div>
                            <div class="col-11 meta-problem <?= strlen(str_replace(' ', '', $home->home_page_meta_description)) >= 120 && strlen(str_replace(' ', '', $home->home_page_meta_description)) <= 156 ? 'd-none' : '' ?>" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">meta description length:</p>
                              <p class="pt-0 mt-0 text-secondary">The meta description is too short (under 121 characters). Up to 156 characters are available. Use the space!</p>
                            </div>
                            <div class="col-1 pr-0 text-danger keyphrase-duplicate-problem <?= $keyphrase_check ? '' : 'd-none' ?>"><i class="fas fa-circle"></i></div>
                            <div class="col-11 keyphrase-duplicate-problem <?= $keyphrase_check ? '' : 'd-none' ?>" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">previously used keyphrase:</p>
                              <p class="pt-0 mt-0 text-secondary">This keyphrase is already used in another page!</p>
                            </div>
                            <div class="col-1 pr-0 text-danger keyphrase-subheading-problem"><i class="fas fa-circle"></i></div>
                            <div class="col-11 keyphrase-subheading-problem" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase in subheading:</p>
                              <p class="pt-0 mt-0 text-secondary">Theres is no keyphrase in any subheading</p>
                            </div>
                            <div class="col-1 pr-0 text-danger img-alt-problem"><i class="fas fa-circle"></i></div>
                            <div class="col-11 img-alt-problem" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">image alt attributes:</p>
                              <p class="pt-0 mt-0 text-secondary">image alt attributes amount are too many or too little</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <small>good result</small>
                          <div class="row mt-3 pl-3">
                          <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">text length:</p>
                              <p class="pt-0 mt-0 text-secondary text-length-success"></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">outbond links:</p>
                              <p class="pt-0 mt-0 text-secondary outbond-link-success"></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">internal links:</p>
                              <p class="pt-0 mt-0 text-secondary internal-link-success"></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase length:</p>
                              <p class="pt-0 mt-0 text-secondary key-success"> <?= strlen(str_replace(' ', '', $home->home_page_keyphrase)) >= 0 ? 'Good Job!' : '-' ?></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase density:</p>
                              <p class="pt-0 mt-0 text-secondary keyphrase-density-success"></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase in seo title:</p>
                              <p class="pt-0 mt-0 text-secondary key-title-success"><?= strpos(strtolower($home->home_page_seo_title), strtolower($home->home_page_keyphrase)) !== false ? 'keyphrase appears in seo title. Well Done!' : '-' ?></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">seo title length:</p>
                              <p class="pt-0 mt-0 text-secondary title-success"><?= strlen(str_replace(' ', '', $home->home_page_seo_title)) >= 42 && strlen(str_replace(' ', '', $home->home_page_seo_title)) <= 63 ? 'Well Done!' : '-' ?></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase in meta description:</p>
                              <p class="pt-0 mt-0 text-secondary key-meta-success"><?= strpos(strtolower($home->home_page_meta_description), strtolower($home->home_page_keyphrase)) !== false ? 'keyphrase appears in meta description. Well Done!' : '-' ?></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">meta description length:</p>
                              <p class="pt-0 mt-0 text-secondary meta-success"><?= strlen(str_replace(' ', '', $home->home_page_meta_description)) >= 120 && strlen(str_replace(' ', '', $home->home_page_meta_description)) <= 156 ? 'Well Done!' : '-' ?></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">previously used keyphrase:</p>
                              <p class="pt-0 mt-0 text-secondary keyphrase-duplicate-success"><?= $keyphrase_check ? '-' : 'You\'ve not used this keyphrase before, very good.' ?></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase in subheading:</p>
                              <p class="pt-0 mt-0 text-secondary keyphrase-subheading-success"></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">image alt attributes:</p>
                              <p class="pt-0 mt-0 text-secondary img-alt-success"></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                    </div>
                </div>
            </div>
          </div>
          <!--/.col (left) -->
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 text-center" style="background-image: url(<?= $first_header->home_page_header_image ? base_url('media/' . $first_header->home_page_header_image) : base_url('images/main-slider/image-4.jpg') ?>); height:160px;">
                        <button class="btn btn-warning float-right edit-header"><i class="fas fa-edit"></i></button>
                        <span style="display:block; margin-top:-20%; clear: both;"><?= $first_header->home_page_header_small_title ?></span>
                        <span><?= $first_header->home_page_header_big_title ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning float-right mb-3 btn-2-img-1" img-alt="<?= $home->home_page_2_image_1_alt ?>"><i class="fas fa-edit"></i></button>
                <img style="width: 100%;" src="<?= $home->home_page_2_image_1 ? base_url('media/' . $home->home_page_2_image_1) : base_url('images/resource/alphabet-image.png') ?>">
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning float-right mb-3 btn-2-big-title"><i class="fas fa-edit"></i></button>
               <span class="text-center d-block 2-big-title"><?= $home->home_page_2_big_title ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning float-right mb-3 btn-2-img-2" img-alt="<?= $home->home_page_2_image_2_alt ?>"><i class="fas fa-edit"></i></button>
                <img style="width: 100%;" src="<?= $home->home_page_2_image_2 ? base_url('media/' . $home->home_page_2_image_2) : base_url('images/resource/image-1.jpg') ?>">
              </div>
            </div>
          </div>
          <div class="col-md-5 col-sm-12">
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning float-right mb-3 btn-2-small-title"><i class="fas fa-edit"></i></button>
                <span class="text-left d-block 2-small-title"><?= $home->home_page_2_small_title ?></span>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning float-right mb-3 btn-2-desc"><i class="fas fa-edit"></i></button>
                <span class="d-block 2-desc"><?= $home->home_page_2_desc ?></span>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div style="width: 100%;">
                  <button class="btn btn-warning float-right mb-3 btn-2-button"><i class="fas fa-edit"></i></button><br>
                </div>
                <div style="width:100%" class="mt-4 text-center">
                  <button class="btn btn-primary" style="clear: both;" link="<?= $home->home_page_2_button_link ?>"><?= $home->home_page_2_button ?></button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 text-center" style="background-image:url(<?= $home->home_page_3_background ? base_url('media/' . $home->home_page_3_background) : base_url('images/background/2.jpg') ?>)">
                      <button class="btn btn-warning float-right btn-edit-3-background"><i class="fas fa-edit"></i></button>
                        <div style="width:100%; clear-both" class="pt-5 pb-5">
                          <button class="btn btn-warning edit-3-title" style="clear: both;"><i class="fas fa-edit"></i></button>
                          <span class="d-block 3-big-title"><?= $home->home_page_3_big_title ?></span>
                          <span style="clear: both;" class="d-block 3-small-title"><?= $home->home_page_3_small_title ?></span>
                        </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <h3 class="text-center">List Jasa</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 text-center" style="background-image:url(<?= $home->home_page_4_background ? base_url('media/' . $home->home_page_4_background) : base_url('images/background/3.jpg') ?>)">
                      <button class="btn btn-warning float-right btn-edit-4-background"><i class="fas fa-edit"></i></button>
                        <div class="row pt-5" style="clear: both;">
                          <div class="col-md-3 col-sm-12">
                            <div class="card">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-12">
                                    <button class="btn btn-warning float-right btn-4-edit" position="1"><i class="fas fa-edit"></i></button>
                                  </div>
                                </div>
                                  <div class="row">
                                    <div class="col-4">
                                      <h2 class="4-1-value"><?= $home->home_page_4_1_value ?></h2>
                                    </div>
                                    <div class="col-8 text-left">
                                      <span class="4-1-text"><?= $home->home_page_4_1_text ?></span>
                                    </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                            <div class="card">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-12">
                                    <button class="btn btn-warning float-right btn-4-edit" position="2"><i class="fas fa-edit"></i></button>
                                  </div>
                                </div>
                                  <div class="row">
                                    <div class="col-4">
                                      <h2 class="4-2-value"><?= $home->home_page_4_2_value ?></h2>
                                    </div>
                                    <div class="col-8 text-left">
                                      <span class="4-2-text"><?= $home->home_page_4_2_text ?></span>
                                    </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                            <div class="card">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-12">
                                    <button class="btn btn-warning float-right btn-4-edit" position="3"><i class="fas fa-edit"></i></button>
                                  </div>
                                </div>
                                  <div class="row">
                                    <div class="col-4">
                                      <h2 class="4-3-value"><?= $home->home_page_4_3_value ?></h2>
                                    </div>
                                    <div class="col-8 text-left">
                                      <span class="4-3-text"><?= $home->home_page_4_3_text ?></span>
                                    </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                            <div class="card">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-12">
                                    <button class="btn btn-warning float-right btn-4-edit" position="4"><i class="fas fa-edit"></i></button>
                                  </div>
                                </div>
                                  <div class="row">
                                    <div class="col-4">
                                      <h2 class="4-4-value"><?= $home->home_page_4_4_value ?></h2>
                                    </div>
                                    <div class="col-8 text-left">
                                      <span class="4-4-text"><?= $home->home_page_4_4_text ?></span>
                                    </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 col-sm-12"></div>
            <div class="col-md-5 col-sm-12">
              <div class="card">
                <div class="card-body">
                  <button class="btn btn-warning d-block float-right btn-5-edit"><i class="fas fa-edit"></i></button>
                  <span class="d-block 5-big-title"><?= $home->home_page_5_big_title ?></span>
                  <span class="d-block 5-small-title"><?= $home->home_page_5_small_title ?></span>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h3 class="text-center">List Portfolio</h3>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-12"></div>
          <div class="col-md-4 col-sm-12">
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning d-block float-right btn-6-edit"><i class="fas fa-edit"></i></button>
                <br>
                <span class="d-block text-center 6-small-title" style="clear: both;"><?= $home->home_page_6_small_title ?></span>
                <span class="d-block text-center 6-big-title" style="clear: both;"><?= $home->home_page_6_big_title ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12"></div>
          <div class="col-md-4 col-sm-12">
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning d-block float-right btn-6-team" team-position="1"><i class="fas fa-edit"></i></button><br>
                <?php if($first_team): ?>
                <img src="<?= $first_team->team_image ? base_url('media/' . $first_team->team_image) : base_url('images/background/4.jpg') ?>" class="card-img-top">
                <h3 class="text-center"><?= $first_team->team_name ?></h3>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning d-block float-right btn-6-team" team-position="2"><i class="fas fa-edit"></i></button><br>
                <?php if($second_team): ?>
                <img src="<?= $second_team->team_image ? base_url('media/' . $second_team->team_image) : base_url('images/background/4.jpg') ?>" class="card-img-top">
                <h3 class="text-center"><?= $second_team->team_name ?></h3>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="card">
              <div class="card-body">
              <button class="btn btn-warning d-block float-right btn-6-team" team-position="3"><i class="fas fa-edit"></i></button><br>
                <?php if($third_team): ?>
                  <img src="<?= $third_team->team_image ? base_url('media/' . $third_team->team_image) : base_url('images/background/4.jpg') ?>" class="card-img-top">
                <h3 class="text-center"><?= $third_team->team_name ?></h3>
                <?php endif;   ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7 col-sm-12">
            <div class="card">
              <div class="card-body" style="height:150px; background-position:cover; background-image: url(<?= $home->home_page_7_background ? base_url('media/' . $home->home_page_7_background) : base_url('images/background/4.jpg') ?>);">
                <button button class="btn btn-warning d-block float-right btn-edit-7-background"><i class="fas fa-edit"></i></button><br>
                <div class="row">
                  <div class="col-md-4 col-sm-10 mx-auto">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="text-center">Testimonial</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5 col-sm-12">
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning d-block float-right btn-7-edit"><i class="fas fa-edit"></i></button><br>
                <span class="d-block 7-big-title text-center" style="clear: both;"><?= $home->home_page_7_big_title ?></span>
                <span class="d-block 7-small-title text-right" style="clear: both;"><?= $home->home_page_7_small_title ?></span>
                <span class="d-block 7-desc text-right" style="clear: both;"><?= $home->home_page_7_desc ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-12">
           <div class="card">
             <div class="card-body">
             <button class="btn btn-warning float-right mb-3 btn-9-img-1" img-alt="<?= $home->home_page_9_image_1_alt ?>"><i class="fas fa-edit"></i></button>
                <img style="width: 100%;" src="<?= $home->home_page_9_image_1 ? base_url('media/' . $home->home_page_9_image_1) : base_url('images/resource/alphabet-image.png') ?>">
             </div>
           </div>
          </div>
          <div class="col-md-6 col-sm-12">
              <div class="card">
                <div class="card-body">
                  <button class="btn btn-warning d-block float-right btn-9-edit"><i class="fas fa-edit"></i></button>
                  <span class="d-block 9-big-title"><?= $home->home_page_9_big_title ?></span>
                  <span class="d-block 9-small-title"><?= $home->home_page_9_small_title ?></span>
                  <div class="row mt-3">
                    <div class="col-12">

                    </div>
                    <div class="col-12">
                      <!-- <button ></button> -->
                      <button class="btn btn-success d-block mb-3 btn-new-faq">Add New FAQ</button>
                      <div class="accordion" id="accordionExample">
                        <div class="row row-faq">
                        <?php 
                          if(isset($faqs)):
                            foreach($faqs as $faq): 
                        ?>
                        <div class="col-lg-9 col-md-8">
                          <div class="card">
                            <div class="card-header" id="headingFaq<?= $faq->faq_home_id ?>">
                              <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left font-weight-bolder text-dark faq-question" type="button" data-toggle="collapse" data-target="#collapseFaq<?= $faq->faq_home_id ?>" aria-expanded="true" aria-controls="collapseFaq<?= $faq->faq_home_id ?>">
                                  <?= $faq->faq_home_question ?>
                                </button>
                              </h2>
                            </div>

                            <div id="collapseFaq<?= $faq->faq_home_id ?>" class="collapse" aria-labelledby="headingFaq<?= $faq->faq_home_id ?>" data-parent="#accordionExample">
                              <div class="card-body faq-answer">
                                <?= $faq->faq_home_answer ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-4 mb-2">
                          <button class="btn btn-warning btn-edit-faq" faq-id="<?= $faq->faq_home_id ?>"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-danger btn-delete-faq" faq-id="<?= $faq->faq_home_id ?>"><i class="fas fa-trash"></i></button>
                        </div>
                        <?php
                            endforeach; 
                          endif; 
                        ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="card">
              <div class="card-body">
                <button button class="btn btn-warning d-block float-right btn-8-edit"><i class="fas fa-edit"></i></button><br>
                <span class="d-block 8-big-title" style="clear: both;"><?= $home->home_page_8_big_title ?></span>
                <span class="d-block 8-small-title" style="clear: both;"><?= $home->home_page_8_small_title ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12"></div>
          <div class="col-md-4 col-sm-12"></div>
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h3 class="text-center">Articles</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div div class="card">
              <div class="card-body">
                <h3 class="text-center">Client Logos</h3>
              </div>
            </div>
          </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Modal -->
<div class="modal fade modal-data" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
    </>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('dash/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
$(document).ready(function() {
  // ------------------- SEO ANALYSIS -------------------//
  checkImgAlt()
  keySubHead()
  internalLink()
  outbondLink()
  textLength()
  keyphraseDensity()

    $('input[name="focus_keyphrase"]').on('keyup', function(e) {
      let keyphrase = $(this).val()
      if(keyphrase.length > 0) {
        $('.key-success').text('Good Job!')
      } else {
        $('.key-success').text('-')
      }
      keyphraseCheck(keyphrase.toLowerCase())
    })
  
    $('input[name="seo_title"]').on('keyup', function(e) {
        let keyphrase = $('input[name="focus_keyphrase"]').val().toLowerCase()
        let seo_title = $(this).val()
        let seo_title_length = $(this).val().replace(new RegExp(" ", "g"), '').length
        let seo_title_width = (seo_title_length / parseInt($('.seo-title').attr('aria-valuemax'))) * 100

        if(seo_title_length >= 42 && seo_title_length <= 63) {
            $('.seo-title').removeClass('bg-success')
            $('.seo-title').removeClass('bg-danger')
            $('.seo-title').addClass('bg-success')
            $('.title-problem').removeClass('d-none')
            $('.title-problem').addClass('d-none')
            $('.title-success').text('Well Done!')
        } else {
            $('.seo-title').removeClass('bg-success')
            $('.seo-title').removeClass('bg-danger')
            $('.seo-title').addClass('bg-danger')
            $('.title-problem').removeClass('d-none')
            $('.title-success').text('-')
        }

        if(seo_title.toLowerCase().includes(keyphrase)) {
            $('.key-title-problem').removeClass('d-none')
            $('.key-title-problem').addClass('d-none')
            $('.key-title-success').text('keyphrase appears in seo title. Well Done!')
        } else {
            $('.key-title-problem').removeClass('d-none')
            $('.key-title-success').text('-')
        }

        $('.seo-title').attr('style', `width:${seo_title_width}%`)
        $('.seo-title').attr('aria-valuenow', seo_title_length)
    })

    $('textarea').on('keyup', function(e) {
        let keyphrase = $('input[name="focus_keyphrase"]').val().toLowerCase()
        let meta_description = $(this).val()
        let meta_description_length = $(this).val().replace(new RegExp(" ", "g"), '').length
        let meta_description_width = (meta_description_length / parseInt($('.meta-description').attr('aria-valuemax'))) * 100

        if(meta_description_length >= 120 && meta_description_length <= 156) {
            $('.meta-description').removeClass('bg-success')
            $('.meta-description').removeClass('bg-danger')
            $('.meta-description').addClass('bg-success')
            $('.meta-problem').removeClass('d-none')
            $('.meta-problem').addClass('d-none')
            $('.meta-success').text('Well Done !')
        } else {
            $('.meta-description').removeClass('bg-success')
            $('.meta-description').removeClass('bg-danger')
            $('.meta-description').addClass('bg-danger')
            $('.meta-problem').removeClass('d-none')
            $('.meta-success').text('-')
        }

        if(meta_description.toLowerCase().includes(keyphrase)) {
          $('.key-meta-problem').removeClass('d-none')
          $('.key-meta-problem').addClass('d-none')
          $('.key-meta-success').text('keyphrase appears in meta description. Well Done!')
        } else {
          $('.key-meta-problem').removeClass('d-none')
          $('.key-meta-success').text('-')
        }

        $('.meta-description').attr('style', `width:${meta_description_width}%`)
        $('.meta-description').attr('aria-valuenow', meta_description_length)
    })
// ------------------- END SEO ANALYSIS -------------------//

    $('.edit-header').on('click', function() {
      $('.modal-title').text('Edit Header')
      $.ajax({
        type: 'get',
        url: '<?= base_url('admin/tampilan-website/home/getHeader') ?>',
        data: {
          hehe: ''
        },
        success(response) {
          $('.modal-body').html(response)
          $('body').find('.col-form').removeClass('d-none')
          $('body').find('.col-form').addClass('d-none')
          $('.modal-data').modal('show')
        }
      })
    })

    $('body').on('click', '.edit-header-text', function() {
      $('body').find('.col-form-img').removeClass('d-none')
      $('body').find('.col-form-img').addClass('d-none')
      let header_small_title = $(this).parent().parent().find('.card-body').first().find('.1-small-title').html()
      let header_big_title = $(this).parent().parent().find('.card-body').first().find('.1-big-title').html()
      let id_header = $(this).attr('id-header')
      setSummernote('80px')
      $('body').find('.col-form').find('input[name="id-header"]').val(id_header)
      $('body').find('input[name="small-title"]').summernote("code", header_small_title)
      $('body').find('input[name="big-title"]').summernote("code", header_big_title)
      $('body').find('.col-form').removeClass('d-none')
    })

    $('body').on('click', '.edit-header-image', function() {
      $('body').find('.col-form').removeClass('d-none')
      $('body').find('.col-form').addClass('d-none')
      let id_header = $(this).attr('id-header')
      $('body').find('.col-form-img').find('input[name="id_header"]').val(id_header)
      $.ajax({
          type: 'get',
          url: '<?= base_url('admin/tampilan-website/home/getMedia' ) ?>',
          success(response) {
            $('body').find('.col-form-media').html(response)
            $('body').find('.col-form-img').removeClass('d-none')
          }
      })
    })

    $('body').on('click','.btn-save-header-text', function() {
      let id_header = $(this).parent().parent().find('input[name="id-header"]').val()
      let small_title = $(this).parent().parent().find('input[name="small-title"]').summernote("code")
      let big_title = $(this).parent().parent().find('input[name="big-title"]').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/newHeaderText') ?>",
        data: {
          id_header: id_header,
          small_title: small_title,
          big_title: big_title
        },
        beforeSend() {
          $('body').find('.btn-save-header-text').text('loading..')
        },
        success() {
          $('body').find('.col-form').addClass('d-none')
          $('body').find('.btn-save-header-text').text('Save')
          $('body').find('.col-header-' + id_header).find('.1-small-title').html(small_title)
          $('body').find('.col-header-' + id_header).find('.1-big-title').first().html(big_title)
        }
      })
    })

    $('body').on('click', '.choose-media-header', function() {
      let media = $(this).attr('image')
      let id_header = $(this).parent().parent().parent().find('input[name="id_header"]').val()
      $.ajax({
        type: 'post',
        url: '<?= base_url('admin/tampilan-website/home/changeMediaHeader') ?>',
        data: {
          media: media,
          id_header: id_header
        },
        success() {
          $('body').find('.col-form-img').addClass('d-none')
          $('body').find('img[header-img-id="'+id_header+'"]').attr('src', "<?= base_url('media') ?>" + "/" + media)
        }
      })
    })

    $('.btn-2-img-1').on('click', function() {
      $('.modal-title').text('Edit Gambar')
      let img_alt = $(this).attr('img-alt')
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/tampilan-website/home/getEditImage') ?>",
        data: {
          section: '2',
          img: '1',
          alt: img_alt
        },
        success(response) {
          $('.modal-body').html(response)
          $('.modal-data').modal('show')
        }
      })
    })

    $('body').on('click', '.choose-media-2-img-1', function() {
      let media = $(this).attr('image')
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/changeMedia2Img1') ?>",
        data: {
          section: '2',
          img: '1',
          media: media
        },
        success() {
          $('body').find('.btn-2-img-1').parent().find('img').attr('src', "<?= base_url('media') ?>" + "/" + media)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-save-alt-2-img-1', function() {
      let alt = $(this).parent().find('input').val()
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/changeMedia2Alt1') ?>",
        data: {
          section: '2',
          img: '1',
          alt: alt
        },
        success() {
          $('body').find('.btn-save-alt-2-img-1').parent().prepend(`
            <div class="alert alert-success" role="alert">Alt Successfully Updated</div>
          `)
          $('body').find('.btn-2-img-1').attr('img-alt', alt)
          setTimeout(function() {
            $('.modal-data').modal('hide')
          },1000)
        }
      })
    })

    $('body').on('click', '.btn-2-big-title', function() {
      let big_title = $(this).parent().find('.2-big-title').html()
      $('.modal-body').html(`
        <input type="text" class="form-control value-value summernote-editor">
        <button class="float-right mt-3 btn btn-primary btn-2-save-big-title">Save</button>
      `)
      setSummernote('80px')
      $('.value-value').summernote("code", big_title)
      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-2-save-big-title', function() {
      let big_title = $(this).parent().find('.value-value').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/updateHome') ?>",
        data: {
          act: '2-big-title',
          big_title: big_title
        },
        success() {
          $('body').find('.btn-2-big-title').parent().find('.2-big-title').html(big_title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('.btn-2-img-2').on('click', function() {
      $('.modal-title').text('Edit Gambar')
      let img_alt = $(this).attr('img-alt')
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/tampilan-website/home/getEditImage') ?>",
        data: {
          section: '2',
          img: '2',
          alt: img_alt
        },
        success(response) {
          $('.modal-body').html(response)
          $('.modal-data').modal('show')
        }
      })
    })

    $('body').on('click', '.choose-media-2-img-2', function() {
      let media = $(this).attr('image')
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/changeMedia2Img1') ?>",
        data: {
          section: '2',
          img: '2',
          media: media
        },
        success() {
          $('body').find('.btn-2-img-2').parent().find('img').attr('src', "<?= base_url('media') ?>" + "/" + media)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-save-alt-2-img-2', function() {
      let alt = $(this).parent().find('input').val()
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/changeMedia2Alt1') ?>",
        data: {
          section: '2',
          img: '2',
          alt: alt
        },
        success() {
          $('body').find('.btn-save-alt-2-img-2').parent().prepend(`
            <div class="alert alert-success" role="alert">Alt Successfully Updated</div>
          `)
          $('body').find('.btn-2-img-2').attr('img-alt', alt)
          setTimeout(function() {
            $('.modal-data').modal('hide')
          },1000)
        }
      })
    })

    $('body').on('click', '.btn-2-small-title', function() {
      let small_title = $(this).parent().find('.2-small-title').html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <input type="text" class="form-control value-value summernote-editor">
        <button class="float-right mt-3 btn btn-primary btn-2-save-small-title">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-value').summernote("code", small_title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-2-save-small-title', function() {
      let small_title = $(this).parent().find('.value-value').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/updateHome') ?>",
        data: {
          act: '2-small-title',
          small_title: small_title
        },
        success() {
          $('body').find('.btn-2-small-title').parent().find('.2-small-title').html(small_title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-2-desc', function() {
      let desc = $(this).parent().find('.2-desc').html()
      $('.modal-title').text('Edit Deksripsi')
      $('.modal-body').html(`
        <textarea class="form-control value-value summernote-editor"></textarea>
        <button class="float-right mt-3 btn btn-primary btn-2-save-desc">Save</button>
      `)
      setSummernote('100px')
      $('body').find('.value-value').summernote("code", desc)
      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-2-save-desc', function() {
      let desc = $(this).parent().find('.value-value').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/updateHome') ?>",
        data: {
          act: '2-desc',
          desc: desc
        },
        success() {
          $('body').find('.btn-2-desc').parent().find('.2-desc').html(desc)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-2-button',function() {
      let btn_text = $(this).parent().parent().find('.btn-primary').text()
      let btn_link = $(this).parent().parent().find('.btn-primary').attr('link')
      $('.modal-title').text('Edit Text Button')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Teks Tombol</label>
          <input type="text" class="form-control value-value" value="${btn_text}">
        </div>
        <div class="form-group">
          <label>Link Tombol</label>
          <input type="text" class="form-control value-link" value="${btn_link}">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-2-save-button">Save</button>
      `)
      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-2-save-button', function() {
      let btn_text = $(this).parent().find('.value-value').val()
      let btn_link = $(this).parent().find('.value-link').val()
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/updateHome') ?>",
        data: {
          act: '2-button',
          text: btn_text,
          link: btn_link
        },
        success() {
          $('body').find('.btn-2-button').parent().parent().find('.btn-primary').text(btn_text)
          $('body').find('.btn-2-button').parent().parent().find('.btn-primary').attr('link', btn_link)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-edit-3-background', function() {
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/tampilan-website/home/getEditBackground') ?>",
        data: {
          section: '3'
        },
        success(response) {
            $('.modal-title').text('Edit Background')
            $('.modal-body').html(response)
            $('.modal-data').modal('show')
        }
      })
    })

    $('body').on('click', '.choose-media-3-background', function() {
      let image = $(this).attr('image')
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/updateHome') ?>",
        data: {
          act: '3-background',
          image: image
        },
        success() {
          $('body').find('.btn-edit-3-background').parent().attr('style', "background-image:url(<?= base_url('media') ?>" + "/" + image + ")")
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.edit-3-title', function() {
      let big_title = $(this).parent().find('.3-big-title').html()
      let small_title = $(this).parent().find('.3-small-title').html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Big Title</label>  
          <input type="text" class="form-control value-value-big summernote-editor">
        </div>
        <div class="form-group">
          <label>Small Title</label>  
          <input type="text" class="form-control value-value-small summernote-editor">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-3-save-title">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-value-big').summernote("code", big_title)
      $('body').find('.value-value-small').summernote("code", small_title)
      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-3-save-title', function() {
      let big_title = $(this).parent().find('.value-value-big').summernote("code")
      let small_title = $(this).parent().find('.value-value-small').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/updateHome') ?>",
        data: {
          act: '3-title',
          big_title: big_title,
          small_title: small_title
        },
        success() {
          $('body').find('.edit-3-title').parent().find('.3-small-title').html(small_title)
          $('body').find('.edit-3-title').parent().find('.3-big-title').html(big_title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-4-edit', function() {
      let position = $(this).attr('position')
      let value = $(this).parent().parent().parent().find(`.4-${position}-value`).html()
      let text = $(this).parent().parent().parent().find(`.4-${position}-text`).html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
            <label>Value</label>
            <input type="number" class="form-control value-value" value="${value}">
        </div>
        <div class="form-group">
            <label>Text</label>
            <textarea class="summernote-editor"></textarea>
        </div>
        <button class="float-right mt-3 btn btn-primary btn-4-save-text" position="${position}">Save</button>
      `)
      setSummernote('80px')
      $('.summernote-editor').summernote("code",text)
      $('.modal-data').modal('show')
    })

    $('body').on('click','.btn-4-save-text', function() {
      let position = $(this).attr('position')
      let value = $(this).parent().find('.value-value').val()
      let text = $(this).parent().find('.summernote-editor').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/updateHome') ?>",
        data: {
          act: '4-text',
          position: position,
          value: value,
          text: text
        },
        success() {
          $('body').find('.btn-4-edit[position="'+position+'"]').parent().parent().parent().find(`.4-${position}-value`).html(value)
          $('body').find('.btn-4-edit[position="'+position+'"]').parent().parent().parent().find(`.4-${position}-text`).html(text)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-edit-4-background', function() {
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/tampilan-website/home/getEditBackground') ?>",
        data: {
          section: '4'
        },
        success(response) {
            $('.modal-title').text('Edit Background')
            $('.modal-body').html(response)
            $('.modal-data').modal('show')
        }
      })
    })

    $('body').on('click', '.choose-media-4-background', function() {
      let image = $(this).attr('image')
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/updateHome') ?>",
        data: {
          act: '4-background',
          image: image
        },
        success() {
          $('body').find('.btn-edit-4-background').parent().attr('style', "background-image:url(<?= base_url('media') ?>" + "/" + image + ")")
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-5-edit', function() {
      let small_title = $(this).parent().find('.5-small-title').html()
      let big_title = $(this).parent().find('.5-big-title').html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Big Title</label>
          <input type="text" class="form-control value-big summernote-editor">
        </div>
        <div class="form-group">
          <label>Small Title</label>
          <input type="text" class="form-control value-small summernote-editor">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-5-save">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-small').summernote("code", small_title)
      $('body').find('.value-big').summernote("code", big_title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-5-save', function() {
      let small_title = $(this).parent().find('.value-small').summernote("code")
      let big_title = $(this).parent().find('.value-big').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/updateHome') ?>",
        data: {
          act: '5-text',
          small_title: small_title,
          big_title: big_title
        },
        success() {
          $('body').find('.btn-5-edit').parent().find('.5-big-title').html(big_title)
          $('body').find('.btn-5-edit').parent().find('.5-small-title').html(small_title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-6-edit', function() {
      let small_title = $(this).parent().find('.6-small-title').html()
      let big_title = $(this).parent().find('.6-big-title').html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Big Title</label>
          <input type="text" class="form-control value-big summernote-editor">
        </div>
        <div class="form-group">
          <label>Small Title</label>
          <input type="text" class="form-control value-small summernote-editor">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-6-save">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-small').summernote("code", small_title)
      $('body').find('.value-big').summernote("code", big_title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-6-save', function() {
      let small_title = $(this).parent().find('.value-small').summernote("code")
      let big_title = $(this).parent().find('.value-big').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/updateHome') ?>",
        data: {
          act: '6-text',
          small_title: small_title,
          big_title: big_title
        },
        success() {
          $('body').find('.btn-6-edit').parent().find('.6-big-title').html(big_title)
          $('body').find('.btn-6-edit').parent().find('.6-small-title').html(small_title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-7-edit', function() {
      let small_title = $(this).parent().find('.7-small-title').html()
      let big_title = $(this).parent().find('.7-big-title').html()
      let desc = $(this).parent().find('.7-desc').html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Big Title</label>
          <input type="text" class="form-control value-big summernote-editor">
        </div>
        <div class="form-group">
          <label>Small Title</label>
          <input type="text" class="form-control value-small summernote-editor">
        </div>
        <div class="form-group">
          <label>Description</label>
          <textarea type="text" class="form-control value-desc summernote-editor"></textarea>
        </div>
        <button class="float-right mt-3 btn btn-primary btn-7-save">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-small').summernote("code", small_title)
      $('body').find('.value-big').summernote("code", big_title)
      $('body').find('.value-desc').summernote("code", desc)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-7-save', function() {
      let small_title = $(this).parent().find('.value-small').summernote("code")
      let big_title = $(this).parent().find('.value-big').summernote("code")
      let desc = $(this).parent().find('.value-desc').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/updateHome') ?>",
        data: {
          act: '7-text',
          small_title: small_title,
          big_title: big_title,
          desc: desc
        },
        success() {
          $('body').find('.btn-7-edit').parent().find('.7-big-title').html(big_title)
          $('body').find('.btn-7-edit').parent().find('.7-small-title').html(small_title)
          $('body').find('.btn-7-edit').parent().find('.7-desc').html(desc)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-edit-7-background', function() {
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/tampilan-website/home/getEditBackground') ?>",
        data: {
          section: '7'
        },
        success(response) {
            $('.modal-title').text('Edit Background')
            $('.modal-body').html(response)
            $('.modal-data').modal('show')
        }
      })
    })

    $('body').on('click', '.choose-media-7-background', function() {
      let image = $(this).attr('image')
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/updateHome') ?>",
        data: {
          act: '7-background',
          image: image
        },
        success() {
          $('body').find('.btn-edit-7-background').parent().attr('style', "height:150px; background-image:url(<?= base_url('media') ?>" + "/" + image + ")")
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-6-team', function() {
      let position = $(this).attr('team-position')
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/tampilan-website/home/getTeamOption') ?>",
        success(response) {
          let teams = JSON.parse(response)
          let option = '<form action="/admin/tampilan-website/home" method="post"><input type="hidden" name="act" value="team"><input type="hidden" name="position" value="'+position+'"><div class="form-group"><select class="form-control select-team" name="id_team">'
          for(let i = 0; i <= teams.length - 1; i++) {
            option += '<option value="'+teams[i].team_id+'">'+teams[i].team_name+' - '+teams[i].team_role+'</option>'
          }
           option += '</select></div><button type="submit" class="float-right mt-3 btn btn-primary btn-6-save-team" position="'+position+'">Save</button></form>';
           $('.modal-title').text('Edit Team')
           $('.modal-body').html(option)
           $('.modal-data').modal('show')
        }
           
      })
    })

    $('body').on('click', '.btn-8-edit', function() {
      let small_title = $(this).parent().find('.8-small-title').html()
      let big_title = $(this).parent().find('.8-big-title').html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Big Title</label>
          <input type="text" class="form-control value-big summernote-editor">
        </div>
        <div class="form-group">
          <label>Small Title</label>
          <input type="text" class="form-control value-small summernote-editor">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-8-save">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-small').summernote("code", small_title)
      $('body').find('.value-big').summernote("code", big_title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-8-save', function() {
      let small_title = $(this).parent().find('.value-small').summernote("code")
      let big_title = $(this).parent().find('.value-big').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/updateHome') ?>",
        data: {
          act: '8-text',
          small_title: small_title,
          big_title: big_title
        },
        success() {
          $('body').find('.btn-8-edit').parent().find('.8-big-title').html(big_title)
          $('body').find('.btn-8-edit').parent().find('.8-small-title').html(small_title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-9-img-1',function() {
      $('.modal-title').text('Edit Gambar')
      let img_alt = $(this).attr('img-alt')
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/tampilan-website/home/getEditImage') ?>",
        data: {
          section: '9',
          img: '1',
          alt: img_alt
        },
        success(response) {
          $('.modal-body').html(response)
          $('.modal-data').modal('show')
        }
      })
    })

    $('body').on('click', '.btn-save-alt-9-img-1', function() {
      let alt = $(this).parent().find('input').val()
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/changeMedia2Alt1') ?>",
        data: {
          section: '9',
          img: '1',
          alt: alt
        },
        success() {
          $('body').find('.btn-save-alt-9-img-1').parent().prepend(`
            <div class="alert alert-success" role="alert">Alt Successfully Updated</div>
          `)
          $('body').find('.btn-9-img-1').attr('img-alt', alt)
          setTimeout(function() {
            $('.modal-data').modal('hide')
          },1000)
        }
      })
    })

    $('body').on('click', '.choose-media-9-img-1', function() {
      let media = $(this).attr('image')
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/changeMedia2Img1') ?>",
        data: {
          section: '9',
          img: '1',
          media: media
        },
        success() {
          $('body').find('.btn-9-img-1').parent().find('img').attr('src', "<?= base_url('media') ?>" + "/" + media)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-9-edit', function() {
      let small_title = $(this).parent().find('.9-small-title').html()
      let big_title = $(this).parent().find('.9-big-title').html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Big Title</label>
          <input type="text" class="form-control value-big summernote-editor">
        </div>
        <div class="form-group">
          <label>Small Title</label>
          <input type="text" class="form-control value-small summernote-editor">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-9-save">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-small').summernote("code", small_title)
      $('body').find('.value-big').summernote("code", big_title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-9-save', function() {
      let small_title = $(this).parent().find('.value-small').summernote("code")
      let big_title = $(this).parent().find('.value-big').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/updateHome') ?>",
        data: {
          act: '9-text',
          small_title: small_title,
          big_title: big_title
        },
        success() {
          $('body').find('.btn-9-edit').parent().find('.9-big-title').html(big_title)
          $('body').find('.btn-9-edit').parent().find('.9-small-title').html(small_title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-new-faq', function() {
      $('.modal-title').text('Add New FAQ')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Pertanyaan</label>
          <input type="text" class="form-control value-question">
        </div>
        <div class="form-group">
          <label>Jawaban</label>
          <input type="text" class="form-control value-answer summernote-editor">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-faq-save">Save</button>
      `)
      setSummernote('80px')
      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-faq-save', function() {
      let question = $(this).parent().find('.value-question').val()
      let answer = $(this).parent().find('.value-answer').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/updateHome') ?>",
        data: {
          act: 'new-faq',
          question,
          answer
        },
        success(response) {
          $('body').find('.row-faq').append(response)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-edit-faq', function() {
      let id_faq = $(this).attr('faq-id')
      let question = $(this).parent().parent().find('button[data-target="#collapseFaq' + id_faq + '"]').html().trim()
      let asnwer = $(this).parent().parent().find('div[id="collapseFaq' + id_faq + '"]').find('.faq-answer').html().trim()
      $('.modal-title').text('Edit FAQ')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Pertanyaan</label>
          <input type="text" class="form-control value-question" value="${question}">
        </div>
        <div class="form-group">
          <label>Jawaban</label>
          <input type="text" class="form-control value-answer summernote-editor">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-faq-update" faq-id="${id_faq}">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-answer').summernote("code", asnwer)
      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-faq-update', function() {
      let faq_id = $(this).attr('faq-id')
      let question = $(this).parent().find('.value-question').val()
      let answer = $(this).parent().find('.value-answer').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/home/updateHome') ?>",
        data: {
          act: 'update-faq',
          faq_id,
          question,
          answer
        },
        success(response) {
          $('body').find('button[data-target="#collapseFaq' + faq_id + '"]').html(question)
          $('body').find('div[id="collapseFaq' + faq_id + '"]').find('.faq-answer').html(answer)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-delete-faq',function() {
      let faq_id = $(this).attr('faq-id')

      Swal.fire({
            title: 'Apakah anda ingin menghapus pertanyaan dan jawaban tersebut ?',
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
                    url: "<?= base_url('admin/tampilan-website/home/updateHome') ?>",
                    data: {
                        act: 'delete-faq',
                        faq_id
                    },
                    beforeSend: function() {
                        let timerInterval;
                        Swal.fire({
                            title: 'Silahkan Menunggu',
                            html: 'Kami sedang menghapus data',
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
                      $('body').find('#headingFaq' + faq_id).parent().parent().remove()
                      $('body').find('.btn-edit-faq[faq-id="'+faq_id+'"]').parent().remove()
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Pertanyaan dan Jawaban Berhasil Dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        });
    })


})

// ----------------- SEO ANALYSIS SUPPORT FUNCTIONS -------------- //
function checkImgAlt() {
  $.ajax({
    type: 'get',
    url: "<?= base_url('admin/seo/analysis') ?>",
    async: true,
    data: {
      act: 'img_alt',
      page: 'home'
    }
  }).then(res => {
    if(res == 'green') {
      $('body').find('.img-alt-success').text('Good Job!')
      $('body').find('.img-alt-problem').removeClass('d-none')
      $('body').find('.img-alt-problem').addClass('d-none')
    } else {
      $('body').find('.img-alt-success').text('-')
      $('body').find('.img-alt-problem').removeClass('d-none')
    }
  }).catch(err => {
    console.log(er)
  })
}

function keySubHead() {
  $.ajax({
    type: 'get',
    url: "<?= base_url('admin/seo/analysis') ?>",
    async: true,
    data: {
      act: 'keyphrase-in-subheading',
      page: 'home'
    }
  }).then(res => {
    if(res == 'green') {
      $('body').find('.keyphrase-subheading-success').text('1 of your higher-level subheadings reflect the topic of your copy. Good job!')
      $('body').find('.keyphrase-subheading-problem').removeClass('d-none')
      $('body').find('.keyphrase-subheading-problem').addClass('d-none')
    } else {
      $('body').find('.keyphrase-subheading-success').text('-')
      $('body').find('.keyphrase-subheading-problem').removeClass('d-none')
    }
  }).catch(err => {
    console.log(err)
  })
}

function internalLink() {
  $.ajax({
    type: 'get',
    url: "<?= base_url('admin/seo/analysis') ?>",
    async: true,
    data: {
      act: 'internal-link',
      page: 'home'
    }
  }).then(res => {
    if(res == 'green') {
      $('body').find('.internal-link-success').text('You have enough internal links. Good job!')
      $('body').find('.internal-link-problem').removeClass('d-none')
      $('body').find('.internal-link-problem').addClass('d-none')
    } else {
      $('body').find('.internal-link-success').text('-')
      $('body').find('.internal-link-problem').removeClass('d-none')
    }
  }).catch(err => {
    console.log(err)
  })
}

function outbondLink() {
  $.ajax({
    type: 'get',
    url: "<?= base_url('admin/seo/analysis') ?>",
    async: true,
    data: {
      act: 'outbond-link',
      page: 'home'
    }
  }).then(res => {
    if(res == 'green') {
      $('body').find('.outbond-link-success').text('Good job!')
      $('body').find('.outbond-link-problem').removeClass('d-none')
      $('body').find('.outbond-link-problem').addClass('d-none')
    } else {
      $('body').find('.outbond-link-success').text('-')
      $('body').find('.outbond-link-problem').removeClass('d-none')
    }
  }).catch(err => {
    console.log(err)
  })
}

function textLength() {
  $.ajax({
    type: 'get',
    url: "<?= base_url('admin/seo/analysis') ?>",
    async: true,
    data: {
      act: 'text-length',
      page: 'home'
    }
  }).then(res => {
    if(res == 'green') {
      $('body').find('.text-length-success').text('Good Job!')
      $('body').find('.text-length-problem').removeClass('d-none')
      $('body').find('.text-length-problem').addClass('d-none')
    } else {
      $('body').find('.text-length-success').text('-')
      $('body').find('.text-length-problem').removeClass('d-none')
    }
  }).catch(err => {
    console.log(err)
  })
}

function keyphraseDensity() {
  $.ajax({
    type: 'get',
    url: "<?= base_url('admin/seo/analysis') ?>",
    async: true,
    data: {
      act: 'keyphrase-density',
      page: 'home'
    }
  }).then(res => {
    if(res == 'green') {
      $('body').find('.keyphrase-density-success').text('Good Job!')
      $('body').find('.keyphrase-density-problem').removeClass('d-none')
      $('body').find('.keyphrase-density-problem').addClass('d-none')
    } else {
      $('body').find('.keyphrase-density-success').text('-')
      $('body').find('.keyphrase-density-problem').removeClass('d-none')
    }
  }).catch(err => {
    console.log(err)
  })
}

function keyphraseCheck(keyphr) {
  $.ajax({
    type: 'get',
    async: true,
    url: "<?= base_url('admin/tampilan-website/home/keyphrase-check') ?>",
    data: {
      keyphr
    }
  }).then(res => {
    if(res == 'true') {
      $('body').find('.keyphrase-duplicate-success').text('-')
      $('body').find('.keyphrase-duplicate-problem').removeClass('d-none')
    } else {
      $('body').find('.keyphrase-duplicate-success').text('You\'ve not used this keyphrase before, very good.')
      $('body').find('.keyphrase-duplicate-problem').removeClass('d-none')
      $('body').find('.keyphrase-duplicate-problem').addClass('d-none')
    }
  }).catch(e => {
    console.log(e)
  })
}
// ----------------- END SEO ANALYSIS SUPPORT FUNCTIONS -------------- //

function setSummernote(height) {
  $('.summernote-editor').summernote({
    height: height,
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol','paragraph']],
        ['insert', ['link']],
        ['view', ['codeview']],
    ],
  })
}
</script>
<?= $this->endSection() ?>