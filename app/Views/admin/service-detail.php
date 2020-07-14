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
            <h1>Service Detail Page Template</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Service Detail Page Template</li>
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
                    <form action="<?= base_url('admin/jasa/seo/' . $service_detail->service_detail_page_id) ?>" method="POST">
                      <input type="hidden" name="act" value="seo">
                    <div class="card-body">
                    <div class="form-group">
                        <label>Focus Keyphrase</label>
                        <input type="text" class="form-control" value="<?= $service_detail_page->keyphrase ?>" name="focus_keyphrase" placeholder="Focus Keyphrase">
                    </div>
                    <div class="form-group">
                        <label>SEO Title</label>
                        <input type="text" class="form-control" value="<?= $service_detail_page->seo_title ?>" name="seo_title" placeholder="SEO Title">
                        <br>
                        <div class="progress">
                            <div class="progress-bar  <?= strlen(str_replace(' ', '', $service_detail_page->seo_title)) >= 42 && strlen(str_replace(' ', '', $service_detail_page->seo_title)) <= 63 ? 'bg-success' : 'bg-danger' ?> seo-title" role="progressbar" style="width: <?= (strlen(str_replace(' ', '', $service_detail_page->seo_title))/65)*100 ?>%" aria-valuenow="<?= strlen(str_replace(' ', '', $service_detail_page->seo_title)) ?>" aria-valuemin="0" aria-valuemax="65"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Meta description</label>
                        <textarea name="meta_description" class="form-control" placeholder="Meta Description"><?= $service_detail_page->meta_description ?></textarea>
                        <br>
                        <div class="progress">
                            <div class="progress-bar <?= strlen(str_replace(' ', '', $service_detail_page->meta_description)) >= 120 && strlen(str_replace(' ', '', $service_detail_page->meta_description)) <= 156 ? 'bg-success' : 'bg-danger' ?> meta-description" role="progressbar" style="width: <?= (strlen(str_replace(' ', '', $service_detail_page->meta_description))/160)*100 ?>%" aria-valuenow="<?= strlen(str_replace(' ', '', $service_detail_page->meta_description)) ?>" aria-valuemin="0" aria-valuemax="160"></div>
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
                            <div class="col-1 pr-0 text-danger title-problem <?= strlen(str_replace(' ', '', $service_detail_page->seo_title)) >= 42 && strlen(str_replace(' ', '', $service_detail_page->seo_title)) <= 63 ? 'd-none' : '' ?>"><i class="fas fa-circle"></i></div>
                            <div class="col-11 title-problem <?= strlen(str_replace(' ', '', $service_detail_page->seo_title)) >= 42 && strlen(str_replace(' ', '', $service_detail_page->seo_title)) <= 63 ? 'd-none' : '' ?>" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">seo title length:</p>
                              <p class="pt-0 mt-0 text-secondary">The seo title is too short (under 42 characters). Up to 63 characters are available. Use the space!</p>
                            </div>
                            <div class="col-1 pr-0 text-danger key-title-problem <?= strpos(strtolower($service_detail_page->seo_title), strtolower($service_detail_page->keyphrase)) !== false ? 'd-none' : '' ?>"><i class="fas fa-circle"></i></div>
                            <div class="col-11 key-title-problem <?= strpos(strtolower($service_detail_page->seo_title), strtolower($service_detail_page->keyphrase)) !== false ? 'd-none' : '' ?>" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase in seo title:</p>
                              <p class="pt-0 mt-0 text-secondary">no keyphrase appears in seo title</p>
                            </div>
                            <div class="col-1 pr-0 text-danger key-meta-problem <?= strpos(strtolower($service_detail_page->meta_description), strtolower($service_detail_page->keyphrase)) !== false ? 'd-none' : '' ?>"><i class="fas fa-circle"></i></div>
                            <div class="col-11 key-meta-problem <?= strpos(strtolower($service_detail_page->meta_description), strtolower($service_detail_page->keyphrase)) !== false ? 'd-none' : '' ?>" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase in meta description:</p>
                              <p class="pt-0 mt-0 text-secondary">no keyphrase appears in meta description</p>
                            </div>
                            <div class="col-1 pr-0 text-danger meta-problem <?= strlen(str_replace(' ', '', $service_detail_page->meta_description)) >= 120 && strlen(str_replace(' ', '', $service_detail_page->meta_description)) <= 156 ? 'd-none' : '' ?>"><i class="fas fa-circle"></i></div>
                            <div class="col-11 meta-problem <?= strlen(str_replace(' ', '', $service_detail_page->meta_description)) >= 120 && strlen(str_replace(' ', '', $service_detail_page->meta_description)) <= 156 ? 'd-none' : '' ?>" style="margin-left:-5%;">
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
                              <p class="pt-0 mt-0 text-secondary key-success"> <?= strlen(str_replace(' ', '', $service_detail_page->keyphrase)) >= 0 ? 'Good Job!' : '-' ?></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase density:</p>
                              <p class="pt-0 mt-0 text-secondary keyphrase-density-success"></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase in seo title:</p>
                              <p class="pt-0 mt-0 text-secondary key-title-success"><?= strpos(strtolower($service_detail_page->seo_title), strtolower($service_detail_page->keyphrase)) !== false ? 'keyphrase appears in seo title. Well Done!' : '-' ?></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">seo title length:</p>
                              <p class="pt-0 mt-0 text-secondary title-success"><?= strlen(str_replace(' ', '', $service_detail_page->seo_title)) >= 42 && strlen(str_replace(' ', '', $service_detail_page->seo_title)) <= 63 ? 'Well Done!' : '-' ?></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase in meta description:</p>
                              <p class="pt-0 mt-0 text-secondary key-meta-success"><?= strpos(strtolower($service_detail_page->meta_description), strtolower($service_detail_page->keyphrase)) !== false ? 'keyphrase appears in meta description. Well Done!' : '-' ?></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">meta description length:</p>
                              <p class="pt-0 mt-0 text-secondary meta-success"><?= strlen(str_replace(' ', '', $service_detail_page->meta_description)) >= 120 && strlen(str_replace(' ', '', $service_detail_page->meta_description)) <= 156 ? 'Well Done!' : '-' ?></p>
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
                    <div class="col-12" style="background-image: url(<?= $service_detail->service_detail_page_1_img ? base_url('media/' . $service_detail->service_detail_page_1_img) : base_url('images/main-slider/image-4.jpg') ?>); height:230px;">
                      <div class="row">
                        <div class="col-12 mb-3">
                          <button class="btn btn-warning float-right edit-1-img"><i class="fas fa-edit"></i></button>
                          </div>
                          <div class="col-md-6 col-sm-12">
                              <span style="display:block;" class="ml-3 1-big-title"><?= $service_detail->jasa_name ?></span>
                              <button class="btn btn-warning mt-4 ml-3 edit-1-title"><i class="fas fa-edit"></i></button>
                            <span class="d-block mt-2 ml-3 1-small-title"><?= $service_detail->service_detail_page_1_small_title ?></span>
                          </div>
                          <div class="col-md-6 col-sm-12 text-right">
                            <button class="btn btn-warning mt-4 mr-3 edit-1-bread"><i class="fas fa-edit"></i></button>
                            <div style="width: 100%;">
                              <span class="mr-3"><a href="<?= $service_detail->service_detail_page_1_bread_link ?>" class="1-bread-1"><?= $service_detail->service_detail_page_1_bread_1 ?></a></span>&nbsp;-&nbsp;<span class="mr-3 1-bread-2"><?= $service_detail->service_detail_page_1_bread_2 ?></span>
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
          <div class="col-12">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12" style="background-image: url(<?= $service_detail->service_detail_page_2_img ? base_url('media/' . $service_detail->service_detail_page_2_img) : base_url('images/background/2.jpg') ?>); height:auto;">
                      <div class="row">
                        <div class="col-12 mb-3">
                          <button class="btn btn-warning float-right edit-2-img"><i class="fas fa-edit"></i></button>
                          </div>
                          <div class="col-md-12 text-center">
                              <button class="btn btn-warning mt-4 ml-3 edit-2-title"><i class="fas fa-edit"></i></button>
                              <span style="display:block;" class="ml-3 2-big-title"><?= $service_detail->service_detail_page_2_big_title ?></span>
                            <span class="d-block mt-2 ml-3 2-small-title"><?= $service_detail->service_detail_page_2_small_title ?></span>
                          </div>
                          <div class="col-md-12 mt-3">
                              <div class="row">
                                  <div class="col-md-4 col-sm-12">
                                    <div class="card">
                                            <div class="card-body">
                                                <div style="width: 100%;">
                                                    <button class="btn btn-warning float-right mb-3 btn-2-button" position="1"><i class="fas fa-edit"></i></button><br>
                                                </div>
                                                <div style="width:100%" class="mt-4 text-center">
                                                    <button class="btn btn-primary" style="clear: both;" link="<?= $service_detail->service_detail_page_2_btn_1_link ?>"><?= $service_detail->service_detail_page_2_btn_1_text ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  <div class="col-md-4 col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div style="width: 100%;">
                                                <button class="btn btn-warning float-right mb-3 btn-2-button" position="2"><i class="fas fa-edit"></i></button><br>
                                            </div>
                                            <div style="width:100%" class="mt-4 text-center">
                                                <button class="btn btn-primary" style="clear: both;" link="<?= $service_detail->service_detail_page_2_btn_2_link ?>"><?= $service_detail->service_detail_page_2_btn_2_text ?></button>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-4 col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div style="width: 100%;">
                                                <button class="btn btn-warning float-right mb-3 btn-2-button" position="3"><i class="fas fa-edit"></i></button><br>
                                            </div>
                                            <div style="width:100%" class="mt-4 text-center">
                                                <button class="btn btn-primary" style="clear: both;" link="<?= $service_detail->service_detail_page_2_btn_3_link ?>"><?= $service_detail->service_detail_page_2_btn_3_text ?></button>
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
        </div>
        <div class="row">
            <div class="col-md-7 col-sm-12"></div>
            <div class="col-md-5 col-sm-12">
              <div class="card">
                <div class="card-body">
                  <button class="btn btn-warning d-block float-right edit-3-title"><i class="fas fa-edit"></i></button>
                  <span class="d-block 3-big-title"><?= $service_detail->service_detail_page_3_big_title ?></span>
                  <span class="d-block 3-small-title"><?= $service_detail->service_detail_page_3_small_title ?></span>
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
            <div class="col-md-7 col-sm-12"></div>
            <div class="col-md-5 col-sm-12">
              <div class="card">
                <div class="card-body">
                  <button class="btn btn-warning d-block float-right edit-4-title"><i class="fas fa-edit"></i></button>
                  <span class="d-block 4-big-title"><?= $service_detail->service_detail_page_4_big_title ?></span>
                  <span class="d-block 4-small-title"><?= $service_detail->service_detail_page_4_small_title ?></span>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row row-video-testimoni">
                      <div class="col-12 mb-3">
                          <button class="btn btn-primary btn-add-testimoni float-right">Add New Testimonial</button>
                      </div>
                      <?php 
                        if(isset($testimonial)):
                            foreach($testimonial as $t): 
                      ?>
                        <div class="col-md-6 col-sm-12">
                            <?= $t->service_testimoni_video ?>
                            <button class="d-block btn btn-danger btn-sm mx-auto btn-delete-testi" testi-id="<?= $t->service_testimoni_id ?>">Remove</button>
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
        <div class="row">
            <div class="col-md-7 col-sm-12"></div>
            <div class="col-md-5 col-sm-12">
              <div class="card">
                <div class="card-body">
                  <button class="btn btn-warning d-block float-right edit-5-title"><i class="fas fa-edit"></i></button>
                  <span class="d-block 5-big-title"><?= $service_detail->service_detail_page_5_big_title ?></span>
                  <span class="d-block 5-small-title"><?= $service_detail->service_detail_page_5_small_title ?></span>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <button class="btn btn-warning d-block edit-5-desc float-right"><i class="fas fa-edit"></i></button>
                    </div>
                    <div class="col-12">
                      <span class="d-block 5-desc text-center"><?= $service_detail->service_detail_page_5_desc ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                <div class="row mb-2">
                  <div class="col-12">
                    <button class="btn btn-primary btn-add-price float-right">Add New Price</button>
                  </div>
                </div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Luasan Rumah</th>
                      <th scope="col">Paket Minimalis</th>
                      <th scope="col">Paket Plus IMB</th>
                      <th scope="col">Paket Ekslusif</th>
                      <th scope="col">Pilihan</th>
                    </tr>
                  </thead>
                  <tbody class="body-price">
                    <?php 
                      if(isset($service_price)):
                        $no = 1;
                        foreach($service_price as $sp): 
                    ?>
                    <tr>
                      <th scope="row" class="no-price"><?= $no ?></th>
                      <td><?= $sp->service_price_luasan_rumah ?></td>
                      <td>Rp <?= $sp->service_price_paket_minimalis?></td>
                      <td>Rp <?= $sp->service_price_paket_plus_imb?></td>
                      <td>Rp <?= $sp->service_price_paket_ekslusif?></td>
                      <td>
                        <button class="btn btn-warning btn-sm btn-edit-price"
                        price-id="<?= $sp->service_price_id ?>"
                        luasan-rumah="<?= $sp->service_price_luasan_rumah ?>" 
                        paket-minimalis="<?= $sp->service_price_paket_minimalis?>" 
                        paket-plus-imb="<?= $sp->service_price_paket_plus_imb?>" 
                        paket-ekslusif="<?= $sp->service_price_paket_ekslusif?>"
                        no="<?= $no ?>">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger btn-delete-price" price-id="<?= $sp->service_price_id ?>>"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                    <?php
                      $no++;
                      endforeach;
                      endif; 
                    ?>
                  </tbody>
                </table>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12" style="background-image: url(<?= $service_detail->service_detail_page_6_img ? base_url('media/' . $service_detail->service_detail_page_6_img) : base_url('images/background/8.jpg') ?>); height:auto">
                      <div class="row">
                        <div class="col-12 mb-3">
                          <button class="btn btn-warning float-right edit-6-img"><i class="fas fa-edit"></i></button>
                          </div>
                          <div class="col-md-6 col-sm-12 text-center">
                              <button class="btn btn-warning mt-4 edit-6-title"><i class="fas fa-edit"></i></button>
                              <span style="display:block;" class="6-big-title"><?= $service_detail->service_detail_page_6_big_title ?></span>
                          </div>
                          <div class="col-md-6 col-sm-12 text-left">
                            <div class="row">
                              <div class="col-12">
                                <button class="btn d-block btn-warning mt-4 mr-3 edit-6-desc float-right"><i class="fas fa-edit"></i></button>
                              </div>
                              <div class="col-12">
                                <span class="d-block 6-desc"><?= $service_detail->service_detail_page_6_desc ?></span>
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
          <div class="col-12">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12" style="background-image: url(<?= $service_detail->service_detail_page_7_img ? base_url('media/' . $service_detail->service_detail_page_7_img) : base_url('media/architect-gede.png') ?>); background-repeat:no-repeat; background-size:contain; background-attachment:inherit; background-position:center; height:230px;">
                      <div class="row">
                        <div class="col-12 mb-3">
                          <button class="btn btn-warning float-right edit-7-img"><i class="fas fa-edit"></i></button>
                          </div>
                        </div>
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
                    <div class="col-12" style="background-image: url(<?= $service_detail->service_detail_page_8_img ? base_url('media/' . $service_detail->service_detail_page_8_img) : base_url('images/background/3.jpg') ?>); height:auto; min-height: 230px;">
                      <div class="row">
                        <div class="col-12 mb-3">
                          <button class="btn btn-warning float-right edit-8-img"><i class="fas fa-edit"></i></button>
                          </div>
                          <div class="col-12">
                            <button class="btn btn-warning mt-4 ml-3 edit-8-desc"><i class="fas fa-edit"></i></button>
                              <span style="display:block;" class="ml-3 8-desc"><?= $service_detail->service_detail_page_8_desc ?></span>
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
                <button class="btn btn-warning d-block float-right edit-9-title"><i class="fas fa-edit"></i></button><br>
                <span class="9-big-title d-block mb-3"><?= $service_detail->service_detail_page_9_big_title ?></span>
                <span class="9-desc"><?= $service_detail->service_detail_page_9_desc ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div style="width: 100%;">
                        <button class="btn btn-warning float-right mb-3 btn-9-button"><i class="fas fa-edit"></i></button><br>
                    </div>
                    <div style="width:100%" class="mt-4 text-center">
                        <button class="btn btn-primary" style="clear: both;" link="<?= $service_detail->service_detail_page_9_btn_link ?>"><?= $service_detail->service_detail_page_9_btn_text ?></button>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-12">
           <div class="card">
             <div class="card-body">
             <button class="btn btn-warning float-right mb-3 btn-13-img-1" img-alt="<?= $service_detail->service_detail_page_13_img_1_alt ?>"><i class="fas fa-edit"></i></button>
                <img style="width: 100%;" src="<?= $service_detail->service_detail_page_13_img_1 ? base_url('media/' . $service_detail->service_detail_page_13_img_1) : base_url('images/resource/alphabet-image.png') ?>">
             </div>
           </div>
          </div>
          <div class="col-md-6 col-sm-12">
              <div class="card">
                <div class="card-body">
                  <button class="btn btn-warning d-block float-right btn-13-edit"><i class="fas fa-edit"></i></button>
                  <span class="d-block 13-big-title"><?= $service_detail->service_detail_page_13_big_title ?></span>
                  <span class="d-block 13-small-title"><?= $service_detail->service_detail_page_13_small_title ?></span>
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
                            foreach($faqs as $f): 
                        ?>
                        <div class="col-lg-9 col-md-8">
                          <div class="card">
                            <div class="card-header" id="headingFaq<?= $f->faq_jasa_id ?>">
                              <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left font-weight-bolder text-dark faq-question" type="button" data-toggle="collapse" data-target="#collapseFaq<?= $f->faq_jasa_id ?>" aria-expanded="true" aria-controls="collapseFaq<?= $f->faq_jasa_id ?>">
                                  <?= $f->faq_jasa_question ?>
                                </button>
                              </h2>
                            </div>

                            <div id="collapseFaq<?= $f->faq_jasa_id ?>" class="collapse" aria-labelledby="headingFaq<?= $f->faq_jasa_id ?>" data-parent="#accordionExample">
                              <div class="card-body faq-answer">
                                <?= $f->faq_jasa_answer ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-4 mb-2">
                          <button class="btn btn-warning btn-edit-faq" faq-id="<?= $f->faq_jasa_id ?>"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-danger btn-delete-faq" faq-id="<?= $f->faq_jasa_id ?>"><i class="fas fa-trash"></i></button>
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
          <div class="col-12">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 text-center" style="background-image:url(<?= $service_detail->service_detail_page_10_img ? base_url('media/' . $service_detail->service_detail_page_10_img) : base_url('images/background/3.jpg') ?>)">
                      <button class="btn btn-warning float-right edit-10-img"><i class="fas fa-edit"></i></button>
                        <div class="row pt-5" style="clear: both;">
                          <div class="col-md-3 col-sm-12">
                            <div class="card">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-12">
                                    <button class="btn btn-warning float-right btn-10-edit" position="1"><i class="fas fa-edit"></i></button>
                                  </div>
                                </div>
                                  <div class="row">
                                    <div class="col-4">
                                      <h2 class="10-1-value"><?= $service_detail->service_detail_page_10_num_1 ?></h2>
                                    </div>
                                    <div class="col-8 text-left">
                                      <span class="10-1-text"><?= $service_detail->service_detail_page_10_text_1 ?></span>
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
                                    <button class="btn btn-warning float-right btn-10-edit" position="2"><i class="fas fa-edit"></i></button>
                                  </div>
                                </div>
                                  <div class="row">
                                    <div class="col-4">
                                      <h2 class="10-2-value"><?= $service_detail->service_detail_page_10_num_2 ?></h2>
                                    </div>
                                    <div class="col-8 text-left">
                                      <span class="10-2-text"><?= $service_detail->service_detail_page_10_text_2 ?></span>
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
                                    <button class="btn btn-warning float-right btn-10-edit" position="3"><i class="fas fa-edit"></i></button>
                                  </div>
                                </div>
                                  <div class="row">
                                    <div class="col-4">
                                      <h2 class="10-3-value"><?= $service_detail->service_detail_page_10_num_3 ?></h2>
                                    </div>
                                    <div class="col-8 text-left">
                                      <span class="10-3-text"><?= $service_detail->service_detail_page_10_text_3 ?></span>
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
                                    <button class="btn btn-warning float-right btn-10-edit" position="4"><i class="fas fa-edit"></i></button>
                                  </div>
                                </div>
                                  <div class="row">
                                    <div class="col-4">
                                      <h2 class="10-4-value"><?= $service_detail->service_detail_page_10_num_4 ?></h2>
                                    </div>
                                    <div class="col-8 text-left">
                                      <span class="10-4-text"><?= $service_detail->service_detail_page_10_text_4 ?></span>
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
                <button class="btn btn-warning d-block float-right btn-10-pros" pros-position="1"><i class="fas fa-edit"></i></button><br>
                <span class="pros-title d-block mb-3"><?= $service_detail->service_detail_page_10_pros_1_title ?></span>
                <span class="pros-desc"><?= $service_detail->service_detail_page_10_pros_1_desc ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning d-block float-right btn-10-pros" pros-position="2"><i class="fas fa-edit"></i></button><br>
                <span class="pros-title d-block mb-3"><?= $service_detail->service_detail_page_10_pros_2_title ?></span>
                <span class="pros-desc"><?= $service_detail->service_detail_page_10_pros_2_desc ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="card">
              <div class="card-body">
              <button class="btn btn-warning d-block float-right btn-10-pros" pros-position="3"><i class="fas fa-edit"></i></button><br>
                <span class="pros-title d-block mb-3"><?= $service_detail->service_detail_page_10_pros_3_title ?></span>
                <span class="pros-desc"><?= $service_detail->service_detail_page_10_pros_3_desc ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 text-center" style="background-image:url(<?= $service_detail->service_detail_page_11_img ? base_url('media/' . $service_detail->service_detail_page_11_img) : base_url('images/background/8.jpg') ?>)">
                      <button class="btn btn-warning float-right edit-11-img"><i class="fas fa-edit"></i></button>
                        <div class="row pt-5" style="clear: both;">
                        <div class="col-md-4 col-sm-12"></div>
                        <div class="col-md-4 col-sm-12"></div>
                        <div class="col-md-4 col-sm-12">
                          <div class="card">
                          <div class="card-body text-left">
                            <button class="btn btn-warning d-block float-right edit-11-title"><i class="fas fa-edit"></i></button>
                            <span class="d-block 11-big-title"><?= $service_detail->service_detail_page_11_big_title ?></span>
                            <span class="d-block 11-small-title"><?= $service_detail->service_detail_page_11_small_title ?></span>
                          </div>
                          </div>
                        </div>
                          <div class="col-md-6 col-sm-12">
                            <div class="card">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-12">
                                    <button class="btn btn-warning float-right btn-11-edit" position="1"><i class="fas fa-edit"></i></button>
                                  </div>
                                </div>
                                  <div class="row">
                                    <div class="col-12 text-center">
                                      <h2 class="11-1-value"><?= $service_detail->service_detail_page_11_title_1 ?></h2>
                                    </div>
                                    <div class="col-12 text-center">
                                      <span class="11-1-text"><?= $service_detail->service_detail_page_11_desc_1 ?></span>
                                    </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <div class="card">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-12">
                                    <button class="btn btn-warning float-right btn-11-edit" position="2"><i class="fas fa-edit"></i></button>
                                  </div>
                                </div>
                                  <div class="row">
                                    <div class="col-12 text-center">
                                      <h2 class="11-2-value"><?= $service_detail->service_detail_page_11_title_2 ?></h2>
                                    </div>
                                    <div class="col-12 text-center">
                                      <span class="11-2-text"><?= $service_detail->service_detail_page_11_desc_2 ?></span>
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
          <div class="col-12">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 text-center" style="background-image:url(<?= $service_detail->service_detail_page_12_img ? base_url('media/' . $service_detail->service_detail_page_12_img) : base_url('images/background/2.jpg') ?>)">
                      <button class="btn btn-warning float-right edit-12-img"><i class="fas fa-edit"></i></button>
                        <div class="row pt-5" style="clear: both;">
                        <div class="col-md-4 col-sm-12"></div>
                        <div class="col-md-4 col-sm-12"></div>
                        <div class="col-md-4 col-sm-12">
                          <div class="card">
                          <div class="card-body text-left">
                            <button class="btn btn-warning d-block float-right edit-12-title"><i class="fas fa-edit"></i></button>
                            <span class="d-block 12-big-title"><?= $service_detail->service_detail_page_12_big_title ?></span>
                            <span class="d-block 12-small-title"><?= $service_detail->service_detail_page_12_small_title ?></span>
                          </div>
                          </div>
                        </div>
                          <div class="col-md-12 col-sm-12">
                            <div class="card">
                              <div class="card-body">
                                <h4 class="text-center">List Services</h4>
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
    $('body').on('click', '.edit-1-img', function() {
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/jasa/tampilan/getEditBackground') ?>",
        data: {
          section: '1',
          id_jasa: "<?= $service_detail->jasa_id ?>"
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
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '1-background',
          image: image,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.edit-1-img').parent().parent().parent().attr('style', "background-image:url(<?= base_url('media') ?>" + "/" + image + "); height:230px;")
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.edit-1-title', function() {
      let small_title = $(this).parent().find('.1-small-title').html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Small Title</label>
          <input type="text" class="form-control value-small summernote-editor">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-1-save-title">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-small').summernote("code", small_title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-1-save-title', function() {
      let small_title = $(this).parent().find('.value-small').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '1-title',
          small_title: small_title,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
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
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '1-bread',
          bread_1,
          bread_2,
          bread_link,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.edit-1-bread').parent().find('.1-bread-1').html(bread_1)
          $('body').find('.edit-1-bread').parent().find('.1-bread-2').html(bread_2)
          $('body').find('.edit-1-bread').parent().find('.1-bread-1').attr('href', bread_link)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.edit-2-img', function() {
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/jasa/tampilan/getEditBackground') ?>",
        data: {
          section: '2',
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success(response) {
            $('.modal-title').text('Edit Background')
            $('.modal-body').html(response)
            $('.modal-data').modal('show')
        }
      })
    })

    $('body').on('click', '.choose-media-2-background', function() {
      let image = $(this).attr('image')
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '2-background',
          image: image,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.edit-2-img').parent().parent().parent().attr('style', "background-image:url(<?= base_url('media') ?>" + "/" + image + "); height:auto;")
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.edit-2-title', function() {
      let small_title = $(this).parent().find('.2-small-title').html()
      let big_title = $(this).parent().find('.2-big-title').html()
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
        <button class="float-right mt-3 btn btn-primary btn-2-save-title">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-big').summernote("code", big_title)
      $('body').find('.value-small').summernote("code", small_title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-2-save-title', function() {
      let small_title = $(this).parent().find('.value-small').summernote("code")
      let big_title = $(this).parent().find('.value-big').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '2-title',
          small_title: small_title,
          big_title: big_title,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.edit-2-title').parent().find('.2-big-title').html(big_title)
          $('body').find('.edit-2-title').parent().find('.2-small-title').html(small_title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-2-button',function() {
      let position = $(this).attr('position')
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
        <button class="float-right mt-3 btn btn-primary btn-2-save-button" position="${position}">Save</button>
      `)
      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-2-save-button', function() {
      let position = $(this).attr('position')
      let btn_text = $(this).parent().find('.value-value').val()
      let btn_link = $(this).parent().find('.value-link').val()
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: 'button',
          section: '2',
          text: btn_text,
          link: btn_link,
          position,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.btn-2-button[position="'+position+'"]').parent().parent().find('.btn-primary').text(btn_text)
          $('body').find('.btn-2-button[position="'+position+'"]').parent().parent().find('.btn-primary').attr('link', btn_link)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.edit-3-title', function() {
      let small_title = $(this).parent().find('.3-small-title').html()
      let big_title = $(this).parent().find('.3-big-title').html()
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
        <button class="float-right mt-3 btn btn-primary btn-3-save-title">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-big').summernote("code", big_title)
      $('body').find('.value-small').summernote("code", small_title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-3-save-title', function() {
      let small_title = $(this).parent().find('.value-small').summernote("code")
      let big_title = $(this).parent().find('.value-big').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '3-title',
          small_title,
          big_title,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.edit-3-title').parent().find('.3-big-title').html(big_title)
          $('body').find('.edit-3-title').parent().find('.3-small-title').html(small_title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.edit-4-title', function() {
      let small_title = $(this).parent().find('.4-small-title').html()
      let big_title = $(this).parent().find('.4-big-title').html()
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
        <button class="float-right mt-3 btn btn-primary btn-4-save-title">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-big').summernote("code", big_title)
      $('body').find('.value-small').summernote("code", small_title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-4-save-title', function() {
      let small_title = $(this).parent().find('.value-small').summernote("code")
      let big_title = $(this).parent().find('.value-big').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '4-title',
          small_title,
          big_title,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.edit-4-title').parent().find('.4-big-title').html(big_title)
          $('body').find('.edit-4-title').parent().find('.4-small-title').html(small_title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-delete-testi',function() {
      let testi_id = $(this).attr('testi-id')

      Swal.fire({
            title: 'Apakah anda ingin menghapus video testimoni tersebut ?',
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
                    url: "<?= base_url('admin/jasa/tampilan/update') ?>",
                    data: {
                        act: 'delete-testimoni',
                        testi_id
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
                      $('body').find('.btn-delete-testi[testi-id="'+testi_id+'"]').parent().remove()
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Video testimoni Berhasil Dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        });
    })

    $('body').on('click', '.btn-add-testimoni', function() {
      $('.modal-title').text('Video Testimoni')
      $('.modal-body').html(`
        <div class="form-group">
          <input type="text" class="form-control value-video summernote-video">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-save-video-testimoni">Save</button>
      `)
      setVideo('350px')

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-save-video-testimoni', function() {
      let testimoni = $(this).parent().find('.value-video').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: 'video-testimoni',
          testimoni,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success(response) {
          let new_testimonial = JSON.parse(response)
          $('body').find('.row-video-testimoni').append(`
          <div class="col-md-6 col-sm-12">
            ${new_testimonial.service_testimoni_video}
            <button class="d-block btn btn-danger btn-sm mx-auto btn-delete-testi" testi-id="${new_testimonial.service_testimoni_id}">Remove</button>
          </div>
          `)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.edit-5-title', function() {
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
        <button class="float-right mt-3 btn btn-primary btn-5-save-title">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-big').summernote("code", big_title)
      $('body').find('.value-small').summernote("code", small_title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-5-save-title', function() {
      let small_title = $(this).parent().find('.value-small').summernote("code")
      let big_title = $(this).parent().find('.value-big').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '5-title',
          small_title,
          big_title,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.edit-5-title').parent().find('.5-big-title').html(big_title)
          $('body').find('.edit-5-title').parent().find('.5-small-title').html(small_title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.edit-5-desc', function() {
      let desc = $(this).parent().parent().find('.5-desc').html()
      $('.modal-title').text('Edit Description')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Description</label>
          <input type="text" class="form-control value-desc summernote-editor">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-5-save-desc">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-desc').summernote("code", desc)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-5-save-desc', function() {
      let desc = $(this).parent().find('.value-desc').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '5-desc',
          desc,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.edit-5-desc').parent().parent().find('.5-desc').html(desc)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-edit-price', function() {
      let data = {
        price_id: $(this).attr('price-id'),
        luasan_rumah: $(this).attr('luasan-rumah'),
        paket_minimalis: $(this).attr('paket-minimalis'),
        paket_plus_imb: $(this).attr('paket-plus-imb'),
        paket_ekslusif: $(this).attr('paket-ekslusif'),
        no: $(this).attr('no')
      }

      $('.modal-title').text('Edit Paket Harga')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Luasan Rumah</label>
          <input type="text" class="form-control luasan-rumah" value="${data.luasan_rumah}">
        </div>
        <div class="form-group">
          <label>Paket Minimalis</label>
          <input type="text" class="form-control edit-price paket-minimalis" value="${data.paket_minimalis}">
        </div>
        <div class="form-group">
          <label>Paket Plus IMB</label>
          <input type="text" class="form-control edit-price paket-plus-imb" value="${data.paket_plus_imb}">
        </div>
        <div class="form-group">
          <label>Paket Ekslusif</label>
          <input type="text" class="form-control edit-price paket-ekslusif" value="${data.paket_ekslusif}">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-5-save-price" no="${data.no}" price-id="${data.price_id}">Save</button>
      `)

      numberonly()
      amount()

      $('.modal-data').modal('show')
      
    })

    $('body').on('click', '.btn-5-save-price', function() {
      let no = $(this).attr('no')
      let price_id = $(this).attr('price-id')
      let price = $(this).parent()
      let data = {
        service_price_luasan_rumah: price.find('.luasan-rumah').val(),
        service_price_paket_minimalis: price.find('.paket-minimalis').val(),
        service_price_paket_plus_imb: price.find('.paket-plus-imb').val(),
        service_price_paket_ekslusif: price.find('.paket-ekslusif').val(),
      }
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '5-price',
          data,
          price_id,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.btn-edit-price[price-id="'+price_id+'"]').parent().parent().html(`
          <th scope="row">${no}</th>
          <td>${data.service_price_luasan_rumah}</td>
          <td>Rp ${data.service_price_paket_minimalis}</td>
          <td>Rp ${data.service_price_paket_plus_imb}</td>
          <td>Rp ${data.service_price_paket_ekslusif}</td>
          <td>
            <button class="btn btn-warning btn-sm btn-edit-price"
            price-id="${price_id}"
            luasan-rumah="${data.service_price_luasan_rumah}" 
            paket-minimalis="${data.service_price_paket_minimalis}" 
            paket-plus-imb="${data.service_price_paket_plus_imb}" 
            paket-ekslusif="${data.service_price_paket_ekslusif}"
            no="${no}">
            <i class="fas fa-edit"></i>
          </button>
          <button class="btn btn-danger btn-delete-price" price-id="${price_id}"><i class="fas fa-trash"></i></button>
          </td>
          `)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-add-price', function() {
      $('.modal-title').text('Tambah Paket Harga')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Luasan Rumah</label>
          <input type="text" class="form-control luasan-rumah">
        </div>
        <div class="form-group">
          <label>Paket Minimalis</label>
          <input type="text" class="form-control edit-price paket-minimalis" required>
        </div>
        <div class="form-group">
          <label>Paket Plus IMB</label>
          <input type="text" class="form-control edit-price paket-plus-imb" required>
        </div>
        <div class="form-group">
          <label>Paket Ekslusif</label>
          <input type="text" class="form-control edit-price paket-ekslusif" required>
        </div>
        <button class="float-right mt-3 btn btn-primary btn-5-add-price">Save</button>
      `)

      numberonly()
      amount()

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-5-add-price', function() {
      let last_no = $('body').find('.no-price').last().text()
      let price = $(this).parent()
      let data = {
        jasa_id: "<?= $service_detail->jasa_id ?>",
        service_price_luasan_rumah: price.find('.luasan-rumah').val(), 
        service_price_paket_minimalis: price.find('.paket-minimalis').val(), 
        service_price_paket_plus_imb: price.find('.paket-plus-imb').val(), 
        service_price_paket_ekslusif: price.find('.paket-ekslusif').val() 
      }

      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '5-add-price',
          data
        },
        success(response) {
          $('body').find('.body-price').append(`
          <tr>
          <th scope="row">${parseInt(last_no) + 1}</th>
          <td>${data.service_price_luasan_rumah}</td>
          <td>Rp ${data.service_price_paket_minimalis}</td>
          <td>Rp ${data.service_price_paket_plus_imb}</td>
          <td>Rp ${data.service_price_paket_ekslusif}</td>
          <td>
            <button class="btn btn-warning btn-sm btn-edit-price"
            price-id="${response}"
            luasan-rumah="${data.service_price_luasan_rumah}" 
            paket-minimalis="${data.service_price_paket_minimalis}" 
            paket-plus-imb="${data.service_price_paket_plus_imb}" 
            paket-ekslusif="${data.service_price_paket_ekslusif}"
            no="${parseInt(last_no) + 1}">
            <i class="fas fa-edit"></i>
          </button>
          <button class="btn btn-danger btn-delete-price" price-id="${response}"><i class="fas fa-trash"></i></button>
          </td>
          </tr>
          `)
          $('.modal-data').modal('hide')
        }
      })

    })

    $('body').on('click', '.btn-delete-price',function() {
      let price_id = $(this).attr('price-id')

      Swal.fire({
            title: 'Apakah anda ingin menghapus data harga berikut ?',
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
                    url: "<?= base_url('admin/jasa/tampilan/update') ?>",
                    data: {
                        act: 'delete-price',
                        price_id
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
                      $('body').find('.btn-delete-price[price-id="'+price_id+'"]').parent().parent().remove()
                      $('body').find('.no-price').each(function(e,el) {
                          $(this).text(e + 1)
                      })
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data Harga Berhasil Dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        });
    })

    $('body').on('click', '.edit-6-img', function() {
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/jasa/tampilan/getEditBackground') ?>",
        data: {
          section: '6',
          id_jasa: "<?= $service_detail->jasa_id ?>"
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
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '6-background',
          image: image,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.edit-6-img').parent().parent().parent().attr('style', "background-image:url(<?= base_url('media') ?>" + "/" + image + "); height:auto;")
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.edit-6-title', function() {
      let big_title = $(this).parent().find('.6-big-title').html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Big Title</label>
          <input type="text" class="form-control value-big summernote-editor">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-6-save-title">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-big').summernote("code", big_title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-6-save-title', function() {
      let big_title = $(this).parent().find('.value-big').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '6-title',
          big_title,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.edit-6-title').parent().find('.6-big-title').html(big_title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.edit-6-desc', function() {
      let desc = $(this).parent().parent().find('.6-desc').html()
      $('.modal-title').text('Edit Description')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Description</label>
          <input type="text" class="form-control value-desc summernote-editor">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-6-save-desc">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-desc').summernote("code", desc)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-6-save-desc', function() {
      let desc = $(this).parent().find('.value-desc').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '6-desc',
          desc,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.edit-6-desc').parent().parent().find('.6-desc').html(desc)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.edit-7-img', function() {
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/jasa/tampilan/getEditBackground') ?>",
        data: {
          section: '7',
          id_jasa: "<?= $service_detail->jasa_id ?>"
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
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '7-background',
          image: image,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.edit-7-img').parent().parent().parent().attr('style', "background-image:url(<?= base_url('media') ?>" + "/" + image + "); background-repeat:no-repeat; background-size:contain; background-attachment:inherit; background-position:center; height:230px;")
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.edit-8-img', function() {
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/jasa/tampilan/getEditBackground') ?>",
        data: {
          section: '8',
          id_jasa: "<?= $service_detail->jasa_id ?>"
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
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '8-background',
          image: image,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.edit-8-img').parent().parent().parent().attr('style', "background-image:url(<?= base_url('media') ?>" + "/" + image + "); height: auto; min-height:230px;")
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.edit-8-desc', function() {
      let desc = $(this).parent().find('.8-desc').html()
      $('.modal-title').text('Edit Description')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Description</label>
          <input type="text" class="form-control value-desc summernote-editor">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-8-save-desc">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-desc').summernote("code", desc)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-8-save-desc', function() {
      let desc = $(this).parent().find('.value-desc').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '8-desc',
          desc,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.edit-8-desc').parent().find('.8-desc').html(desc)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.edit-9-title', function() {
      let big_title = $(this).parent().find('.9-big-title').html()
      let desc = $(this).parent().find('.9-desc').html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Big Title</label>
          <input type="text" class="form-control value-big summernote-editor">
        </div>
        <div class="form-group">
          <label>Description</label>
          <input type="text" class="form-control value-desc summernote-editor">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-9-save-title">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-big').summernote("code", big_title)
      $('body').find('.value-desc').summernote("code", desc)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-9-save-title', function() {
      let big_title = $(this).parent().find('.value-big').summernote("code")
      let desc = $(this).parent().find('.value-desc').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '9-title',
          big_title,
          desc,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.edit-9-title').parent().find('.9-big-title').html(big_title)
          $('body').find('.edit-9-title').parent().find('.9-desc').html(desc)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-9-button',function() {
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
        <button class="float-right mt-3 btn btn-primary btn-9-save-button">Save</button>
      `)
      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-9-save-button', function() {
      let btn_text = $(this).parent().find('.value-value').val()
      let btn_link = $(this).parent().find('.value-link').val()
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '9-button',
          section: '9',
          text: btn_text,
          link: btn_link,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.btn-9-button').parent().parent().find('.btn-primary').text(btn_text)
          $('body').find('.btn-9-button').parent().parent().find('.btn-primary').attr('link', btn_link)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-13-img-1',function() {
      $('.modal-title').text('Edit Gambar')
      let img_alt = $(this).attr('img-alt')
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/jasa/tampilan/getEditImage') ?>",
        data: {
          section: '13',
          img: '1',
          alt: img_alt,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success(response) {
          $('.modal-body').html(response)
          $('.modal-data').modal('show')
        }
      })
    })

    $('body').on('click', '.btn-save-alt-13-img-1', function() {
      let alt = $(this).parent().find('input').val()
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: 'alt',
          section: '13',
          img: '1',
          alt: alt,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.btn-save-alt-13-img-1').parent().prepend(`
            <div class="alert alert-success" role="alert">Alt Successfully Updated</div>
          `)
          $('body').find('.btn-13-img-1').attr('img-alt', alt)
          setTimeout(function() {
            $('.modal-data').modal('hide')
          },1000)
        }
      })
    })

    $('body').on('click', '.choose-media-13-img-1', function() {
      let media = $(this).attr('image')
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: 'change-media',
          section: '13',
          img: '1',
          media: media,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.btn-13-img-1').parent().find('img').attr('src', "<?= base_url('media') ?>" + "/" + media)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-13-edit', function() {
      let small_title = $(this).parent().find('.13-small-title').html()
      let big_title = $(this).parent().find('.13-big-title').html()
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
        <button class="float-right mt-3 btn btn-primary btn-13-save">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-small').summernote("code", small_title)
      $('body').find('.value-big').summernote("code", big_title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-13-save', function() {
      let small_title = $(this).parent().find('.value-small').summernote("code")
      let big_title = $(this).parent().find('.value-big').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '13-title',
          small_title: small_title,
          big_title: big_title,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.btn-13-edit').parent().find('.13-big-title').html(big_title)
          $('body').find('.btn-13-edit').parent().find('.13-small-title').html(small_title)
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
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: 'new-faq',
          question,
          answer,
          id_jasa: "<?= $service_detail->jasa_id ?>"
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
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
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
                    url: "<?= base_url('admin/jasa/tampilan/update') ?>",
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

    $('body').on('click', '.edit-10-img', function() {
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/jasa/tampilan/getEditBackground') ?>",
        data: {
          section: '10',
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success(response) {
            $('.modal-title').text('Edit Background')
            $('.modal-body').html(response)
            $('.modal-data').modal('show')
        }
      })
    })

    $('body').on('click', '.choose-media-10-background', function() {
      let image = $(this).attr('image')
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '10-background',
          image: image,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.edit-10-img').parent().attr('style', "background-image:url(<?= base_url('media') ?>" + "/" + image + ")")
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-10-edit', function() {
      let position = $(this).attr('position')
      let value = $(this).parent().parent().parent().find(`.10-${position}-value`).html()
      let text = $(this).parent().parent().parent().find(`.10-${position}-text`).html()
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
        <button class="float-right mt-3 btn btn-primary btn-10-save-text" position="${position}">Save</button>
      `)
      setSummernote('80px')
      $('.summernote-editor').summernote("code",text)
      $('.modal-data').modal('show')
    })

    $('body').on('click','.btn-10-save-text', function() {
      let position = $(this).attr('position')
      let value = $(this).parent().find('.value-value').val()
      let text = $(this).parent().find('.summernote-editor').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '10-text',
          position,
          value,
          text,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.btn-10-edit[position="'+position+'"]').parent().parent().parent().find(`.10-${position}-value`).html(value)
          $('body').find('.btn-10-edit[position="'+position+'"]').parent().parent().parent().find(`.10-${position}-text`).html(text)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-10-pros', function() {
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
        <button class="float-right mt-3 btn btn-primary btn-10-save-pros" position="${position}">Save</button>
      `)
      setSummernote('80px')
      $('.value-value').summernote("code",title)
      $('.value-desc').summernote("code",desc)
      $('.modal-data').modal('show')
    })

    $('body').on('click','.btn-10-save-pros', function() {
      let position = $(this).attr('position')
      let title = $(this).parent().find('.value-value').summernote("code")
      let desc = $(this).parent().find('.value-desc').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '10-pros',
          position: position,
          title: title,
          desc: desc,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.btn-10-pros[pros-position="'+position+'"]').parent().find('.pros-title').html(title)
          $('body').find('.btn-10-pros[pros-position="'+position+'"]').parent().find('.pros-desc').html(desc)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.edit-11-img', function() {
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/jasa/tampilan/getEditBackground') ?>",
        data: {
          section: '11',
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success(response) {
            $('.modal-title').text('Edit Background')
            $('.modal-body').html(response)
            $('.modal-data').modal('show')
        }
      })
    })

    $('body').on('click', '.choose-media-11-background', function() {
      let image = $(this).attr('image')
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '11-background',
          image: image,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.edit-11-img').parent().attr('style', "background-image:url(<?= base_url('media') ?>" + "/" + image + ");")
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.edit-11-title', function() {
      let small_title = $(this).parent().find('.11-small-title').html()
      let big_title = $(this).parent().find('.11-big-title').html()
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
        <button class="float-right mt-3 btn btn-primary btn-11-save-title">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-big').summernote("code", big_title)
      $('body').find('.value-small').summernote("code", small_title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-11-save-title', function() {
      let small_title = $(this).parent().find('.value-small').summernote("code")
      let big_title = $(this).parent().find('.value-big').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '11-title',
          small_title: small_title,
          big_title: big_title,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.edit-11-title').parent().find('.11-big-title').html(big_title)
          $('body').find('.edit-11-title').parent().find('.11-small-title').html(small_title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-11-edit', function() {
      let position = $(this).attr('position')
      let value = $(this).parent().parent().parent().find(`.11-${position}-value`).html()
      let text = $(this).parent().parent().parent().find(`.11-${position}-text`).html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control value-value" value="${value}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="summernote-editor"></textarea>
        </div>
        <button class="float-right mt-3 btn btn-primary btn-11-save-text" position="${position}">Save</button>
      `)
      setSummernote('80px')
      $('.summernote-editor').summernote("code",text)
      $('.modal-data').modal('show')
    })

    $('body').on('click','.btn-11-save-text', function() {
      let position = $(this).attr('position')
      let value = $(this).parent().find('.value-value').val()
      let text = $(this).parent().find('.summernote-editor').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '11-text',
          position,
          title: value,
          desc: text,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.btn-11-edit[position="'+position+'"]').parent().parent().parent().find(`.11-${position}-value`).html(value)
          $('body').find('.btn-11-edit[position="'+position+'"]').parent().parent().parent().find(`.11-${position}-text`).html(text)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.edit-12-img', function() {
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/jasa/tampilan/getEditBackground') ?>",
        data: {
          section: '12',
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success(response) {
            $('.modal-title').text('Edit Background')
            $('.modal-body').html(response)
            $('.modal-data').modal('show')
        }
      })
    })

    $('body').on('click', '.choose-media-12-background', function() {
      let image = $(this).attr('image')
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '12-background',
          image: image,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.edit-12-img').parent().attr('style', "background-image:url(<?= base_url('media') ?>" + "/" + image + ");")
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.edit-12-title', function() {
      let small_title = $(this).parent().find('.12-small-title').html()
      let big_title = $(this).parent().find('.12-big-title').html()
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
        <button class="float-right mt-3 btn btn-primary btn-12-save-title">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-big').summernote("code", big_title)
      $('body').find('.value-small').summernote("code", small_title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-12-save-title', function() {
      let small_title = $(this).parent().find('.value-small').summernote("code")
      let big_title = $(this).parent().find('.value-big').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/jasa/tampilan/update') ?>",
        data: {
          act: '12-title',
          small_title: small_title,
          big_title: big_title,
          id_jasa: "<?= $service_detail->jasa_id ?>"
        },
        success() {
          $('body').find('.edit-12-title').parent().find('.12-big-title').html(big_title)
          $('body').find('.edit-12-title').parent().find('.12-small-title').html(small_title)
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
      act: 'img_alt_id',
      page: 'service_detail',
      id: "<?= $service_detail_page->service_detail_page_id ?>"
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
      act: 'keyphrase-in-subheading-with-id',
      page: 'service_detail',
      id: "<?= $service_detail_page->service_detail_page_id ?>"
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
      act: 'internal-link-with-id',
      page: 'service_detail',
      id: "<?= $service_detail_page->service_detail_page_id ?>"
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
      act: 'outbond-link-with-id',
      page: 'service_detail',
      id: "<?= $service_detail_page->service_detail_page_id ?>"
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

function setVideo(height) {
$('.summernote-video').summernote({
    height: height,
    toolbar: [
        ['insert', ['video']]
    ],
})
}

function numberonly() {
    var input = document.querySelector('.edit-price');
    input.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9 \,]/, '');
    });
}

function amount() {
    $('.edit-price').on('keyup', function() {
        var nilai = $(this).val();
        $(this).val(formatRupiah(nilai));
    })
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