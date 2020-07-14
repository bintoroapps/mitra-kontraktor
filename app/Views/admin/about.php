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
            <h1>About Page Template</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">About Page Template</li>
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
                    <form action="<?= base_url('admin/tampilan-website/about') ?>" method="POST">
                      <input type="hidden" name="act" value="seo">
                    <div class="card-body">
                    <div class="form-group">
                        <label>Focus Keyphrase</label>
                        <input type="text" class="form-control" value="<?= $about->keyphrase ?>" name="focus_keyphrase" placeholder="Focus Keyphrase">
                    </div>
                    <div class="form-group">
                        <label>SEO Title</label>
                        <input type="text" class="form-control" value="<?= $about->seo_title ?>" name="seo_title" placeholder="SEO Title">
                        <br>
                        <div class="progress">
                            <div class="progress-bar  <?= strlen(str_replace(' ', '', $about->seo_title)) >= 42 && strlen(str_replace(' ', '', $about->seo_title)) <= 63 ? 'bg-success' : 'bg-danger' ?> seo-title" role="progressbar" style="width: <?= (strlen(str_replace(' ', '', $about->seo_title))/65)*100 ?>%" aria-valuenow="<?= strlen(str_replace(' ', '', $about->seo_title)) ?>" aria-valuemin="0" aria-valuemax="65"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Meta description</label>
                        <textarea name="meta_description" class="form-control" placeholder="Meta Description"><?= $about->meta_description ?></textarea>
                        <br>
                        <div class="progress">
                            <div class="progress-bar <?= strlen(str_replace(' ', '', $about->meta_description)) >= 120 && strlen(str_replace(' ', '', $about->meta_description)) <= 156 ? 'bg-success' : 'bg-danger' ?> meta-description" role="progressbar" style="width: <?= (strlen(str_replace(' ', '', $about->meta_description))/160)*100 ?>%" aria-valuenow="<?= strlen(str_replace(' ', '', $about->meta_description)) ?>" aria-valuemin="0" aria-valuemax="160"></div>
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
                            <div class="col-1 pr-0 text-danger title-problem <?= strlen(str_replace(' ', '', $about->seo_title)) >= 42 && strlen(str_replace(' ', '', $about->seo_title)) <= 63 ? 'd-none' : '' ?>"><i class="fas fa-circle"></i></div>
                            <div class="col-11 title-problem <?= strlen(str_replace(' ', '', $about->seo_title)) >= 42 && strlen(str_replace(' ', '', $about->seo_title)) <= 63 ? 'd-none' : '' ?>" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">seo title length:</p>
                              <p class="pt-0 mt-0 text-secondary">The seo title is too short (under 42 characters). Up to 63 characters are available. Use the space!</p>
                            </div>
                            <div class="col-1 pr-0 text-danger key-title-problem <?= strpos(strtolower($about->seo_title), strtolower($about->keyphrase)) !== false ? 'd-none' : '' ?>"><i class="fas fa-circle"></i></div>
                            <div class="col-11 key-title-problem <?= strpos(strtolower($about->seo_title), strtolower($about->keyphrase)) !== false ? 'd-none' : '' ?>" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase in seo title:</p>
                              <p class="pt-0 mt-0 text-secondary">no keyphrase appears in seo title</p>
                            </div>
                            <div class="col-1 pr-0 text-danger key-meta-problem <?= strpos(strtolower($about->meta_description), strtolower($about->keyphrase)) !== false ? 'd-none' : '' ?>"><i class="fas fa-circle"></i></div>
                            <div class="col-11 key-meta-problem <?= strpos(strtolower($about->meta_description), strtolower($about->keyphrase)) !== false ? 'd-none' : '' ?>" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase in meta description:</p>
                              <p class="pt-0 mt-0 text-secondary">no keyphrase appears in meta description</p>
                            </div>
                            <div class="col-1 pr-0 text-danger meta-problem <?= strlen(str_replace(' ', '', $about->meta_description)) >= 120 && strlen(str_replace(' ', '', $about->meta_description)) <= 156 ? 'd-none' : '' ?>"><i class="fas fa-circle"></i></div>
                            <div class="col-11 meta-problem <?= strlen(str_replace(' ', '', $about->meta_description)) >= 120 && strlen(str_replace(' ', '', $about->meta_description)) <= 156 ? 'd-none' : '' ?>" style="margin-left:-5%;">
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
                              <p class="pt-0 mt-0 text-secondary key-success"> <?= strlen(str_replace(' ', '', $about->keyphrase)) >= 0 ? 'Good Job!' : '-' ?></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase density:</p>
                              <p class="pt-0 mt-0 text-secondary keyphrase-density-success"></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase in seo title:</p>
                              <p class="pt-0 mt-0 text-secondary key-title-success"><?= strpos(strtolower($about->seo_title), strtolower($about->keyphrase)) !== false ? 'keyphrase appears in seo title. Well Done!' : '-' ?></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">seo title length:</p>
                              <p class="pt-0 mt-0 text-secondary title-success"><?= strlen(str_replace(' ', '', $about->seo_title)) >= 42 && strlen(str_replace(' ', '', $about->seo_title)) <= 63 ? 'Well Done!' : '-' ?></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase in meta description:</p>
                              <p class="pt-0 mt-0 text-secondary key-meta-success"><?= strpos(strtolower($about->meta_description), strtolower($about->keyphrase)) !== false ? 'keyphrase appears in meta description. Well Done!' : '-' ?></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">meta description length:</p>
                              <p class="pt-0 mt-0 text-secondary meta-success"><?= strlen(str_replace(' ', '', $about->meta_description)) >= 120 && strlen(str_replace(' ', '', $about->meta_description)) <= 156 ? 'Well Done!' : '-' ?></p>
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
                    <div class="col-12" style="background-image: url(<?= $about->about_page_1_img ? base_url('media/' . $about->about_page_1_img) : base_url('images/main-slider/image-4.jpg') ?>); height:230px;">
                      <div class="row">
                        <div class="col-12 mb-3">
                          <button class="btn btn-warning float-right edit-1-img"><i class="fas fa-edit"></i></button>
                          </div>
                          <div class="col-md-6 col-sm-12">
                          <button class="btn btn-warning mt-4 ml-3 edit-1-title"><i class="fas fa-edit"></i></button>
                            <span style="display:block;" class="ml-3 1-big-title"><?= $about->about_page_1_big_title ?></span>
                            <span class="d-block mt-2 ml-3 1-small-title"><?= $about->about_page_1_small_title ?></span>
                          </div>
                          <div class="col-md-6 col-sm-12 text-right">
                            <button class="btn btn-warning mt-4 mr-3 edit-1-bread"><i class="fas fa-edit"></i></button>
                            <div style="width: 100%;">
                              <span class="mr-3"><a href="<?= $about->about_page_1_bread_link ?>" class="1-bread-1"><?= $about->about_page_1_bread_1 ?></a></span>&nbsp;-&nbsp;<span class="mr-3 1-bread-2"><?= $about->about_page_1_bread_2 ?></span>
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
          <div class="col-md-4 col-sm-12">
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning float-right mb-3 btn-2-img-1" img-alt="<?= $about->about_page_2_img_1_alt ?>"><i class="fas fa-edit"></i></button>
                <img style="width: 100%;" src="<?= $about->about_page_2_img_1 ? base_url('media/' . $about->about_page_2_img_1) : base_url('images/resource/alphabet-image.png') ?>">
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning float-right mb-3 btn-2-big-title"><i class="fas fa-edit"></i></button>
               <span class="text-center d-block 2-big-title"><?= $about->about_page_2_big_title ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning float-right mb-3 btn-2-img-2" img-alt="<?= $about->about_page_2_img_2_alt ?>"><i class="fas fa-edit"></i></button>
                <img style="width: 100%;" src="<?= $about->about_page_2_img_2 ? base_url('media/' . $about->about_page_2_img_2) : base_url('images/resource/image-1.jpg') ?>">
              </div>
            </div>
          </div>
          <div class="col-md-5 col-sm-12">
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning float-right mb-3 btn-2-small-title"><i class="fas fa-edit"></i></button>
                <span class="text-left d-block 2-small-title"><?= $about->about_page_2_small_title ?></span>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning float-right mb-3 btn-2-desc"><i class="fas fa-edit"></i></button>
                <span class="d-block 2-desc"><?= $about->about_page_2_desc ?></span>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div style="width: 100%;">
                  <button class="btn btn-warning float-right mb-3 btn-2-button"><i class="fas fa-edit"></i></button><br>
                </div>
                <div style="width:100%" class="mt-4 text-center">
                  <button class="btn btn-primary" style="clear: both;" link="<?= $about->about_page_2_btn_link ?>"><?= $about->about_page_2_btn_text ?></button>
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
                    <div class="col-12 text-center" style="background-image:url(<?= $about->about_page_3_img ? base_url('media/' . $about->about_page_3_img) : base_url('images/background/3.jpg') ?>)">
                      <button class="btn btn-warning float-right btn-edit-3-background"><i class="fas fa-edit"></i></button>
                        <div class="row pt-5" style="clear: both;">
                          <div class="col-md-3 col-sm-12">
                            <div class="card">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-12">
                                    <button class="btn btn-warning float-right btn-3-edit" position="1"><i class="fas fa-edit"></i></button>
                                  </div>
                                </div>
                                  <div class="row">
                                    <div class="col-4">
                                      <h2 class="3-1-value"><?= $about->about_page_3_num_1 ?></h2>
                                    </div>
                                    <div class="col-8 text-left">
                                      <span class="3-1-text"><?= $about->about_page_3_text_1 ?></span>
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
                                    <button class="btn btn-warning float-right btn-3-edit" position="2"><i class="fas fa-edit"></i></button>
                                  </div>
                                </div>
                                  <div class="row">
                                    <div class="col-4">
                                      <h2 class="3-2-value"><?= $about->about_page_3_num_2 ?></h2>
                                    </div>
                                    <div class="col-8 text-left">
                                      <span class="3-2-text"><?= $about->about_page_3_text_2 ?></span>
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
                                    <button class="btn btn-warning float-right btn-3-edit" position="3"><i class="fas fa-edit"></i></button>
                                  </div>
                                </div>
                                  <div class="row">
                                    <div class="col-4">
                                      <h2 class="3-3-value"><?= $about->about_page_3_num_3 ?></h2>
                                    </div>
                                    <div class="col-8 text-left">
                                      <span class="3-3-text"><?= $about->about_page_3_text_3 ?></span>
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
                                    <button class="btn btn-warning float-right btn-3-edit" position="4"><i class="fas fa-edit"></i></button>
                                  </div>
                                </div>
                                  <div class="row">
                                    <div class="col-4">
                                      <h2 class="3-4-value"><?= $about->about_page_3_num_4 ?></h2>
                                    </div>
                                    <div class="col-8 text-left">
                                      <span class="3-4-text"><?= $about->about_page_3_text_4 ?></span>
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
          <div class="col-md-4 col-sm-12">
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning d-block float-right btn-3-pros" pros-position="1"><i class="fas fa-edit"></i></button><br>
                <span class="pros-title d-block mb-3"><?= $about->about_page_3_pros_1_title ?></span>
                <span class="pros-desc"><?= $about->about_page_3_pros_1_desc ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning d-block float-right btn-3-pros" pros-position="2"><i class="fas fa-edit"></i></button><br>
                <span class="pros-title d-block mb-3"><?= $about->about_page_3_pros_2_title ?></span>
                <span class="pros-desc"><?= $about->about_page_3_pros_2_desc ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="card">
              <div class="card-body">
              <button class="btn btn-warning d-block float-right btn-3-pros" pros-position="3"><i class="fas fa-edit"></i></button><br>
                <span class="pros-title d-block mb-3"><?= $about->about_page_3_pros_3_title ?></span>
                <span class="pros-desc"><?= $about->about_page_3_pros_3_desc ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning d-block float-right btn-4-edit"><i class="fas fa-edit"></i></button><br>
                <span class="4-big-title d-block mb-3"><?= $about->about_page_4_big_title ?></span>
                <span class="4-small-title"><?= $about->about_page_4_small_title ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h3 class="text-center">Testimonials</h3>
            </div>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h3 class="text-center">Client Logos</h3>
            </div>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12" style="background-image:url(<?= $about->about_page_6_img ? base_url('media/' . $about->about_page_6_img) : base_url('images/background/8.jpg') ?>)">
                      <button class="btn btn-warning float-right btn-edit-6-background"><i class="fas fa-edit"></i></button>
                        <div class="row pt-5" style="clear: both;">
                        <div class="col-12">
                          <div class="row">
                            <div class="col-md-3 col-sm-12">
                              <div class="card">
                                <div class="card-body">
                                <button class="btn btn-warning float-right btn-6-title d-block"><i class="fas fa-edit"></i></button><br>
                                    <span class="d-block 6-big-title mt-3"><?= $about->about_page_6_big_title ?></span>
                                    <span class="d-block 6-small-title mt-3"><?= $about->about_page_6_small_title ?></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                          <div class="col-md-3 col-sm-12">
                            <div class="card">
                              <div class="card-body">
                                    <button class="btn btn-warning float-right btn-6-edit d-block" position="1"><i class="fas fa-edit"></i></button><br>
                                    <span class="d-block 6-title mt-3"><?= $about->about_page_6_title_1 ?></span>
                                    <span class="d-block 6-desc mt-3"><?= $about->about_page_6_desc_1 ?></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                            <div class="card">
                              <div class="card-body">
                                    <button class="btn btn-warning float-right btn-6-edit d-block" position="2"><i class="fas fa-edit"></i></button><br>
                                    <span class="d-block 6-title mt-3"><?= $about->about_page_6_title_2 ?></span>
                                    <span class="d-block 6-desc mt-3"><?= $about->about_page_6_desc_2 ?></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                            <div class="card">
                              <div class="card-body">
                                    <button class="btn btn-warning float-right btn-6-edit d-block" position="3"><i class="fas fa-edit"></i></button><br>
                                    <span class="d-block 6-title mt-3"><?= $about->about_page_6_title_3 ?></span>
                                    <span class="d-block 6-desc mt-3"><?= $about->about_page_6_desc_3 ?></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-sm-12">
                            <div class="card">
                              <div class="card-body">
                                    <button class="btn btn-warning float-right btn-6-edit d-block" position="4"><i class="fas fa-edit"></i></button><br>
                                    <span class="d-block 6-title mt-3"><?= $about->about_page_6_title_4 ?></span>
                                    <span class="d-block 6-desc mt-3"><?= $about->about_page_6_desc_4 ?></span>
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
          <div class="col-md-4 col-sm-12">
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning d-block float-right btn-7-edit" "><i class="fas fa-edit"></i></button><br>
                <span class="7-big-title d-block mb-3"><?= $about->about_page_7_big_title ?></span>
                <span class="7-small-title"><?= $about->about_page_7_small_title ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h3 class="text-center">Our Teams</h3>
            </div>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12" style="background-image:url(<?= $about->about_page_8_img ? base_url('media/' . $about->about_page_8_img) : base_url('images/background/6.jpg') ?>)">
                      <button class="btn btn-warning float-right btn-edit-8-background"><i class="fas fa-edit"></i></button>
                        <div class="row pt-5" style="clear: both;">
                          <div class="col-md-6 col-sm-12">
                            <div class="card">
                              <div class="card-body">
                                    <button class="btn btn-warning float-right btn-8-edit d-block"><i class="fas fa-edit"></i></button><br>
                                    <span class="d-block 8-small-title mt-3"><?= $about->about_page_8_small_title ?></span>
                                    <span class="d-block 8-big-title mt-3"><?= $about->about_page_8_big_title ?></span>
                                    <span class="d-block 8-num mt-3"><?= $about->about_page_8_num ?></span>
                                    <span class="d-block 8-desc mt-3"><?= $about->about_page_8_desc ?></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <div class="card">
                              <div class="card-body">
                                  <h4 class="text-center">FORM</h4>
                                    <button class="btn btn-warning mb-0 mx-auto mt-4 btn-8-edit-btn d-block"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-primary mt-2 mx-auto d-block"><?= $about->about_page_8_btn ?></button>
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
          <div class="col-md-6 col-sm-12">
            <div class="card">
              <div class="card-body">
              <button class="btn btn-warning float-right btn-9-video d-block" link="<?= $about->about_page_9_video ?>"><i class="fas fa-link"></i></button>
                <button class="btn btn-warning float-right btn-9-video-image mr-2" img-alt="<?= $about->about_page_9_img_1_alt ?>"><i class="fas fa-edit"></i></button>
                <br><br>
                <img style="width:100%"; src="<?= $about->about_page_9_img_1 ? base_url('media/' . $about->about_page_9_img_1) : base_url('images/resource/video-img.jpg') ?>" alt="<?= $about->about_page_9_img_1_alt ?>">
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning float-right btn-9-edit d-block"><i class="fas fa-edit"></i></button><br>
                <span class="d-block 9-big-title mt-3"><?= $about->about_page_9_big_title ?></span>
                <span class="d-block 9-med-title mt-3"><?= $about->about_page_9_med_title ?></span>
                <span class="d-block 9-small-title mt-3"><?= $about->about_page_9_small_title ?></span>
                <span class="d-block 9-desc mt-3"><?= $about->about_page_9_desc ?></span>
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


    $('body').on('click', '.edit-1-img', function() {
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/tampilan-website/about/getEditBackground') ?>",
        data: {
          section: '1'
        },
        success(response) {
            $('.modal-title').text('Edit Background')
            $('.modal-body').html(response)
            $('.modal-data').modal('show')
        }
      })
    })

    $('body').on('click', '.choose-media-1-background', function() {
      let image = $(this).attr('image')
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: '1-background',
          image: image
        },
        success() {
          $('body').find('.edit-1-img').parent().parent().parent().attr('style', "background-image:url(<?= base_url('media') ?>" + "/" + image + "); height:230px;")
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.edit-1-title', function() {
      let small_title = $(this).parent().find('.1-small-title').html()
      let big_title = $(this).parent().find('.1-big-title').html()
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
        <button class="float-right mt-3 btn btn-primary btn-1-save-title">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-small').summernote("code", small_title)
      $('body').find('.value-big').summernote("code", big_title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-1-save-title', function() {
      let small_title = $(this).parent().find('.value-small').summernote("code")
      let big_title = $(this).parent().find('.value-big').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: '1-title',
          small_title: small_title,
          big_title: big_title
        },
        success() {
          $('body').find('.edit-1-title').parent().find('.1-big-title').html(big_title)
          $('body').find('.edit-1-title').parent().find('.1-small-title').html(small_title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.edit-1-bread', function() {
      let bread_1 = $(this).parent().find('.1-bread-1').html()
      let bread_2 = $(this).parent().find('.1-bread-2').html()
      let bread_link = $(this).parent().find('.1-bread-1').attr('href')
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Bread 1</label>
          <input type="text" class="form-control bread-1 summernote-editor">
        </div>
        <div class="form-group">
          <label>Bread 2</label>
          <input type="text" class="form-control bread-2 summernote-editor">
        </div>
        <div class="form-group">
          <label>Bread Link</label>
          <input type="text" class="form-control bread-link" value="${bread_link}">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-1-save-bread">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.bread-1').summernote("code", bread_1)
      $('body').find('.bread-2').summernote("code", bread_2)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-1-save-bread', function() {
      let bread_1 = $(this).parent().find('.bread-1').summernote("code")
      let bread_2 = $(this).parent().find('.bread-2').summernote("code")
      let bread_link = $(this).parent().find('.bread-link').val()
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: '1-bread',
          bread_1,
          bread_2,
          bread_link
        },
        success() {
          $('body').find('.edit-1-bread').parent().find('.1-bread-1').html(bread_1)
          $('body').find('.edit-1-bread').parent().find('.1-bread-2').html(bread_2)
          $('body').find('.edit-1-bread').parent().find('.1-bread-1').attr('href', bread_link)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('.btn-2-img-1').on('click', function() {
      $('.modal-title').text('Edit Gambar')
      let img_alt = $(this).attr('img-alt')
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/tampilan-website/about/getEditImage') ?>",
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

    $('body').on('click', '.btn-save-alt-2-img-1', function() {
      let alt = $(this).parent().find('input').val()
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: 'alt',
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

    $('body').on('click', '.choose-media-2-img-1', function() {
      let media = $(this).attr('image')
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: 'change-media',
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
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: 'big-title',
          section: '2',
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
        url: "<?= base_url('admin/tampilan-website/about/getEditImage') ?>",
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

    $('body').on('click', '.btn-save-alt-2-img-2', function() {
      let alt = $(this).parent().find('input').val()
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: 'alt',
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

    $('body').on('click', '.choose-media-2-img-2', function() {
      let media = $(this).attr('image')
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: 'change-media',
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
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: 'small-title',
          section: '2',
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
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: 'desc',
          section: '2',
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
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: 'button',
          section: '2',
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
        url: "<?= base_url('admin/tampilan-website/about/getEditBackground') ?>",
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
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
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

    $('body').on('click', '.btn-3-edit', function() {
      let position = $(this).attr('position')
      let value = $(this).parent().parent().parent().find(`.3-${position}-value`).html()
      let text = $(this).parent().parent().parent().find(`.3-${position}-text`).html()
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
        <button class="float-right mt-3 btn btn-primary btn-3-save-text" position="${position}">Save</button>
      `)
      setSummernote('80px')
      $('.summernote-editor').summernote("code",text)
      $('.modal-data').modal('show')
    })

    $('body').on('click','.btn-3-save-text', function() {
      let position = $(this).attr('position')
      let value = $(this).parent().find('.value-value').val()
      let text = $(this).parent().find('.summernote-editor').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: '3-text',
          position: position,
          value: value,
          text: text
        },
        success() {
          $('body').find('.btn-3-edit[position="'+position+'"]').parent().parent().parent().find(`.3-${position}-value`).html(value)
          $('body').find('.btn-3-edit[position="'+position+'"]').parent().parent().parent().find(`.3-${position}-text`).html(text)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-3-pros', function() {
      let position = $(this).attr('pros-position')
      let title = $(this).parent().find('.pros-title').html()
      let desc = $(this).parent().find('.pros-desc').html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control summernote-editor value-value">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="summernote-editor value-desc"></textarea>
        </div>
        <button class="float-right mt-3 btn btn-primary btn-3-save-pros" position="${position}">Save</button>
      `)
      setSummernote('80px')
      $('.value-value').summernote("code",title)
      $('.value-desc').summernote("code",desc)
      $('.modal-data').modal('show')
    })

    $('body').on('click','.btn-3-save-pros', function() {
      let position = $(this).attr('position')
      let title = $(this).parent().find('.value-value').summernote("code")
      let desc = $(this).parent().find('.value-desc').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: '3-pros',
          position: position,
          title: title,
          desc: desc
        },
        success() {
          $('body').find('.btn-3-pros[pros-position="'+position+'"]').parent().find('.pros-title').html(title)
          $('body').find('.btn-3-pros[pros-position="'+position+'"]').parent().find('.pros-desc').html(desc)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-4-edit', function() {
      let big_title = $(this).parent().find('.4-big-title').html()
      let small_title = $(this).parent().find('.4-small-title').html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
            <label>Big Title</label>
            <input type="text" class="form-control summernote-editor value-big">
        </div>
        <div class="form-group">
            <label>Small Title</label>
            <input type="text" class="form-control summernote-editor value-small">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-4-save">Save</button>
      `)
      setSummernote('80px')
      $('.value-big').summernote("code",big_title)
      $('.value-small').summernote("code",small_title)
      $('.modal-data').modal('show')
    })

    $('body').on('click','.btn-4-save', function() {
      let big_title = $(this).parent().find('.value-big').summernote("code")
      let small_title = $(this).parent().find('.value-small').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: '4-title',
          small_title,
          big_title
        },
        success() {
          $('body').find('.btn-4-edit').parent().find('.4-big-title').html(big_title)
          $('body').find('.btn-4-edit').parent().find('.4-small-title').html(small_title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-edit-6-background', function() {
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/tampilan-website/about/getEditBackground') ?>",
        data: {
          section: '6'
        },
        success(response) {
            $('.modal-title').text('Edit Background')
            $('.modal-body').html(response)
            $('.modal-data').modal('show')
        }
      })
    })

    $('body').on('click', '.choose-media-6-background', function() {
      let image = $(this).attr('image')
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: '6-background',
          image: image
        },
        success() {
          $('body').find('.btn-edit-6-background').parent().attr('style', "background-image:url(<?= base_url('media') ?>" + "/" + image + ")")
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-6-edit', function() {
      let position = $(this).attr('position')
      let title = $(this).parent().find('.6-title').html()
      let desc = $(this).parent().find('.6-desc').html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control summernote-editor value-title">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="summernote-editor value-desc"></textarea>
        </div>
        <button class="float-right mt-3 btn btn-primary btn-6-save" position="${position}">Save</button>
      `)
      setSummernote('80px')
      $('.value-title').summernote("code",title)
      $('.value-desc').summernote("code",desc)
      $('.modal-data').modal('show')
    })

    $('body').on('click','.btn-6-save', function() {
      let position = $(this).attr('position')
      let title = $(this).parent().find('.value-title').summernote("code")
      let desc = $(this).parent().find('.value-desc').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: '6-text',
          position,
          title,
          desc
        },
        success() {
          $('body').find('.btn-6-edit[position="'+position+'"]').parent().find('.6-title').html(title)
          $('body').find('.btn-6-edit[position="'+position+'"]').parent().find('.6-desc').html(desc)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-6-title', function() {
      let small_title = $(this).parent().find('.6-small-title').html()
      let big_title = $(this).parent().find('.6-big-title').html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
            <label>Big Title</label>
            <input type="text" class="form-control summernote-editor value-big">
        </div>
        <div class="form-group">
            <label>Small Title</label>
            <input type="text" class="form-control summernote-editor value-small">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-6-save-title">Save</button>
      `)
      setSummernote('80px')
      $('.value-big').summernote("code",big_title)
      $('.value-small').summernote("code",small_title)
      $('.modal-data').modal('show')
    })

    $('body').on('click','.btn-6-save-title', function() {
      let big_title = $(this).parent().find('.value-big').summernote("code")
      let small_title = $(this).parent().find('.value-small').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: '6-title',
          big_title,
          small_title
        },
        success() {
          $('body').find('.btn-6-title').parent().find('.6-big-title').html(big_title)
          $('body').find('.btn-6-title').parent().find('.6-small-title').html(small_title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-7-edit', function() {
      let small_title = $(this).parent().find('.7-small-title').html()
      let big_title = $(this).parent().find('.7-big-title').html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
            <label>Big Title</label>
            <input type="text" class="form-control summernote-editor value-big">
        </div>
        <div class="form-group">
            <label>Small Title</label>
            <input type="text" class="form-control summernote-editor value-small">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-7-save">Save</button>
      `)
      setSummernote('80px')
      $('.value-big').summernote("code",big_title)
      $('.value-small').summernote("code",small_title)
      $('.modal-data').modal('show')
    })

    $('body').on('click','.btn-7-save', function() {
      let big_title = $(this).parent().find('.value-big').summernote("code")
      let small_title = $(this).parent().find('.value-small').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: '7-title',
          big_title,
          small_title
        },
        success() {
          $('body').find('.btn-7-edit').parent().find('.7-big-title').html(big_title)
          $('body').find('.btn-7-edit').parent().find('.7-small-title').html(small_title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-edit-8-background', function() {
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/tampilan-website/about/getEditBackground') ?>",
        data: {
          section: '8'
        },
        success(response) {
            $('.modal-title').text('Edit Background')
            $('.modal-body').html(response)
            $('.modal-data').modal('show')
        }
      })
    })

    $('body').on('click', '.choose-media-8-background', function() {
      let image = $(this).attr('image')
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: '8-background',
          image: image
        },
        success() {
          $('body').find('.btn-edit-8-background').parent().attr('style', "background-image:url(<?= base_url('media') ?>" + "/" + image + ")")
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-8-edit', function() {
      let small_title = $(this).parent().find('.8-small-title').html()
      let big_title = $(this).parent().find('.8-big-title').html()
      let num = $(this).parent().find('.8-num').html()
      let desc = $(this).parent().find('.8-desc').html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
            <label>Small Title</label>
            <input type="text" class="form-control summernote-editor value-small">
        </div>
        <div class="form-group">
            <label>Big Title</label>
            <input type="text" class="form-control summernote-editor value-big">
        </div>
        <div class="form-group">
            <label>Middle Value</label>
            <input type="text" class="form-control summernote-editor value-mid">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control summernote-editor value-desc"></textarea>
        </div>
        <button class="float-right mt-3 btn btn-primary btn-8-save">Save</button>
      `)
      setSummernote('80px')
      $('.value-big').summernote("code",big_title)
      $('.value-small').summernote("code",small_title)
      $('.value-mid').summernote("code",num)
      $('.value-desc').summernote("code",desc)
      $('.modal-data').modal('show')
    })

    $('body').on('click','.btn-8-save', function() {
      let big_title = $(this).parent().find('.value-big').summernote("code")
      let small_title = $(this).parent().find('.value-small').summernote("code")
      let mid = $(this).parent().find('.value-mid').summernote("code")
      let desc = $(this).parent().find('.value-desc').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: '8-text',
          big_title,
          small_title,
          mid,
          desc
        },
        success() {
          $('body').find('.btn-8-edit').parent().find('.8-big-title').html(big_title)
          $('body').find('.btn-8-edit').parent().find('.8-small-title').html(small_title)
          $('body').find('.btn-8-edit').parent().find('.8-num').html(mid)
          $('body').find('.btn-8-edit').parent().find('.8-desc').html(desc)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-8-edit-btn', function() {
      let btn_text = $(this).parent().find('.btn-primary').html()
      $('.modal-title').text('Edit Button Text')
      $('.modal-body').html(`
        <div class="form-group">
            <label>Button Text</label>
            <input type="text" class="form-control value-btn" value="${btn_text}">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-8-save-btn">Save</button>
      `)
      $('.modal-data').modal('show')
    })

    $('body').on('click','.btn-8-save-btn', function() {
      let btn_text = $(this).parent().find('.value-btn').val()
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: '8-btn',
          btn_text
        },
        success() {
          $('body').find('.btn-8-edit-btn').parent().find('.btn-primary').html(btn_text)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-9-video', function() {
      let link = $(this).attr('link')
      $('.modal-title').text('Edit Link Video')
      $('.modal-body').html(`
        <div class="form-group">
            <label>Link Video</label>
            <input type="text" class="form-control value-link" value="${link}">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-9-save-video">Save</button>
      `)
      $('.modal-data').modal('show')
    })

    $('body').on('click','.btn-9-save-video', function() {
      let link = $(this).parent().find('.value-link').val()
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: '9-video',
          link
        },
        success() {
          $('body').find('.btn-9-video').attr('link', link)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-9-edit', function() {
      let small_title = $(this).parent().find('.9-small-title').html()
      let med_title = $(this).parent().find('.9-med-title').html()
      let big_title = $(this).parent().find('.9-big-title').html()
      let desc = $(this).parent().find('.9-desc').html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
            <label>Big Title</label>
            <input type="text" class="form-control summernote-editor value-big">
        </div>
        <div class="form-group">
            <label>Medium Title</label>
            <input type="text" class="form-control summernote-editor value-med">
        </div>
        <div class="form-group">
            <label>Small Title</label>
            <input type="text" class="form-control summernote-editor value-small">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control summernote-editor value-desc"></textarea>
        </div>
        <button class="float-right mt-3 btn btn-primary btn-9-save">Save</button>
      `)
      setSummernote('80px')
      $('.value-big').summernote("code",big_title)
      $('.value-med').summernote("code",med_title)
      $('.value-small').summernote("code",small_title)
      $('.value-desc').summernote("code",desc)
      $('.modal-data').modal('show')
    })

    $('body').on('click','.btn-9-save', function() {
      let big_title = $(this).parent().find('.value-big').summernote("code")
      let med_title = $(this).parent().find('.value-med').summernote("code")
      let small_title = $(this).parent().find('.value-small').summernote("code")
      let desc = $(this).parent().find('.value-desc').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: '9-text',
          big_title,
          small_title,
          med_title,
          desc
        },
        success() {
          $('body').find('.btn-9-edit').parent().find('.9-big-title').html(big_title)
          $('body').find('.btn-9-edit').parent().find('.9-med-title').html(med_title)
          $('body').find('.btn-9-edit').parent().find('.9-small-title').html(small_title)
          $('body').find('.btn-9-edit').parent().find('.9-desc').html(desc)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-9-video-image',function() {
      $('.modal-title').text('Edit Gambar')
      let img_alt = $(this).attr('img-alt')
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/tampilan-website/about/getEditImage') ?>",
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
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: 'alt',
          section: '9',
          img: '1',
          alt: alt
        },
        success() {
          $('body').find('.btn-save-alt-9-img-1').parent().prepend(`
            <div class="alert alert-success" role="alert">Alt Successfully Updated</div>
          `)
          $('body').find('.btn-9-video-image').attr('img-alt', alt)
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
        url: "<?= base_url('admin/tampilan-website/about/update') ?>",
        data: {
          act: 'change-media',
          section: '9',
          img: '1',
          media: media
        },
        success() {
          $('body').find('.btn-9-video-image').parent().find('img').attr('src', "<?= base_url('media') ?>" + "/" + media)
          $('.modal-data').modal('hide')
        }
      })
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
      page: 'about'
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
      page: 'about'
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
      page: 'about'
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
      page: 'page'
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
      page: 'about'
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
      page: 'about'
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
    url: "<?= base_url('admin/tampilan-website/about/keyphrase-check') ?>",
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