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
            <h1>FAQ Page Template</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">FAQ Page Template</li>
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
                    <form action="<?= base_url('admin/tampilan-website/faq') ?>" method="POST">
                      <input type="hidden" name="act" value="seo">
                    <div class="card-body">
                    <div class="form-group">
                        <label>Focus Keyphrase</label>
                        <input type="text" class="form-control" value="<?= $faq->keyphrase ?>" name="focus_keyphrase" placeholder="Focus Keyphrase">
                    </div>
                    <div class="form-group">
                        <label>SEO Title</label>
                        <input type="text" class="form-control" value="<?= $faq->seo_title ?>" name="seo_title" placeholder="SEO Title">
                        <br>
                        <div class="progress">
                            <div class="progress-bar  <?= strlen(str_replace(' ', '', $faq->seo_title)) >= 42 && strlen(str_replace(' ', '', $faq->seo_title)) <= 63 ? 'bg-success' : 'bg-danger' ?> seo-title" role="progressbar" style="width: <?= (strlen(str_replace(' ', '', $faq->seo_title))/65)*100 ?>%" aria-valuenow="<?= strlen(str_replace(' ', '', $faq->seo_title)) ?>" aria-valuemin="0" aria-valuemax="65"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Meta description</label>
                        <textarea name="meta_description" class="form-control" placeholder="Meta Description"><?= $faq->meta_description ?></textarea>
                        <br>
                        <div class="progress">
                            <div class="progress-bar <?= strlen(str_replace(' ', '', $faq->meta_description)) >= 120 && strlen(str_replace(' ', '', $faq->meta_description)) <= 156 ? 'bg-success' : 'bg-danger' ?> meta-description" role="progressbar" style="width: <?= (strlen(str_replace(' ', '', $faq->meta_description))/160)*100 ?>%" aria-valuenow="<?= strlen(str_replace(' ', '', $faq->meta_description)) ?>" aria-valuemin="0" aria-valuemax="160"></div>
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
                            <div class="col-1 pr-0 text-danger title-problem <?= strlen(str_replace(' ', '', $faq->seo_title)) >= 42 && strlen(str_replace(' ', '', $faq->seo_title)) <= 63 ? 'd-none' : '' ?>"><i class="fas fa-circle"></i></div>
                            <div class="col-11 title-problem <?= strlen(str_replace(' ', '', $faq->seo_title)) >= 42 && strlen(str_replace(' ', '', $faq->seo_title)) <= 63 ? 'd-none' : '' ?>" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">seo title length:</p>
                              <p class="pt-0 mt-0 text-secondary">The seo title is too short (under 42 characters). Up to 63 characters are available. Use the space!</p>
                            </div>
                            <div class="col-1 pr-0 text-danger key-title-problem <?= strpos(strtolower($faq->seo_title), strtolower($faq->keyphrase)) !== false ? 'd-none' : '' ?>"><i class="fas fa-circle"></i></div>
                            <div class="col-11 key-title-problem <?= strpos(strtolower($faq->seo_title), strtolower($faq->keyphrase)) !== false ? 'd-none' : '' ?>" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase in seo title:</p>
                              <p class="pt-0 mt-0 text-secondary">no keyphrase appears in seo title</p>
                            </div>
                            <div class="col-1 pr-0 text-danger key-meta-problem <?= strpos(strtolower($faq->meta_description), strtolower($faq->keyphrase)) !== false ? 'd-none' : '' ?>"><i class="fas fa-circle"></i></div>
                            <div class="col-11 key-meta-problem <?= strpos(strtolower($faq->meta_description), strtolower($faq->keyphrase)) !== false ? 'd-none' : '' ?>" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase in meta description:</p>
                              <p class="pt-0 mt-0 text-secondary">no keyphrase appears in meta description</p>
                            </div>
                            <div class="col-1 pr-0 text-danger meta-problem <?= strlen(str_replace(' ', '', $faq->meta_description)) >= 120 && strlen(str_replace(' ', '', $faq->meta_description)) <= 156 ? 'd-none' : '' ?>"><i class="fas fa-circle"></i></div>
                            <div class="col-11 meta-problem <?= strlen(str_replace(' ', '', $faq->meta_description)) >= 120 && strlen(str_replace(' ', '', $faq->meta_description)) <= 156 ? 'd-none' : '' ?>" style="margin-left:-5%;">
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
                              <p class="pt-0 mt-0 text-secondary key-success"> <?= strlen(str_replace(' ', '', $faq->keyphrase)) >= 0 ? 'Good Job!' : '-' ?></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase density:</p>
                              <p class="pt-0 mt-0 text-secondary keyphrase-density-success"></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase in seo title:</p>
                              <p class="pt-0 mt-0 text-secondary key-title-success"><?= strpos(strtolower($faq->seo_title), strtolower($faq->keyphrase)) !== false ? 'keyphrase appears in seo title. Well Done!' : '-' ?></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">seo title length:</p>
                              <p class="pt-0 mt-0 text-secondary title-success"><?= strlen(str_replace(' ', '', $faq->seo_title)) >= 42 && strlen(str_replace(' ', '', $faq->seo_title)) <= 63 ? 'Well Done!' : '-' ?></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">keyphrase in meta description:</p>
                              <p class="pt-0 mt-0 text-secondary key-meta-success"><?= strpos(strtolower($faq->meta_description), strtolower($faq->keyphrase)) !== false ? 'keyphrase appears in meta description. Well Done!' : '-' ?></p>
                            </div>
                            <div class="col-1 pr-0 text-success"><i class="fas fa-circle"></i></div>
                            <div class="col-11" style="margin-left:-5%;">
                              <p class="mt-0 pt-0 pb-0 mb-0 font-weight-bold">meta description length:</p>
                              <p class="pt-0 mt-0 text-secondary meta-success"><?= strlen(str_replace(' ', '', $faq->meta_description)) >= 120 && strlen(str_replace(' ', '', $faq->meta_description)) <= 156 ? 'Well Done!' : '-' ?></p>
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
                    <div class="col-12" style="background-image: url(<?= $faq->faq_page_1_img ? base_url('media/' . $faq->faq_page_1_img) : base_url('images/main-slider/image-4.jpg') ?>); height:230px;">
                      <div class="row">
                        <div class="col-12 mb-3">
                          <button class="btn btn-warning float-right edit-1-img"><i class="fas fa-edit"></i></button>
                          </div>
                          <div class="col-md-6 col-sm-12">
                          <button class="btn btn-warning mt-4 ml-3 edit-1-title"><i class="fas fa-edit"></i></button>
                            <span style="display:block;" class="ml-3 1-big-title"><?= $faq->faq_page_1_big_title ?></span>
                            <span class="d-block mt-2 ml-3 1-small-title"><?= $faq->faq_page_1_small_title ?></span>
                          </div>
                          <div class="col-md-6 col-sm-12 text-right">
                            <button class="btn btn-warning mt-4 mr-3 edit-1-bread"><i class="fas fa-edit"></i></button>
                            <div style="width: 100%;">
                              <span class="mr-3"><a href="<?= $faq->faq_page_1_bread_link ?>" class="1-bread-1"><?= $faq->faq_page_1_bread_1 ?></a></span>&nbsp;-&nbsp;<span class="mr-3 1-bread-2"><?= $faq->faq_page_1_bread_2 ?></span>
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
             <button class="btn btn-warning float-right mb-3 btn-2-img-1" img-alt="<?= $faq->faq_page_2_img_1_alt ?>"><i class="fas fa-edit"></i></button>
                <img style="width: 100%;" src="<?= $faq->faq_page_2_img_1 ? base_url('media/' . $faq->faq_page_2_img_1) : base_url('images/resource/alphabet-image.png') ?>">
             </div>
           </div>
          </div>
          <div class="col-md-6 col-sm-12">
              <div class="card">
                <div class="card-body">
                  <button class="btn btn-warning d-block float-right btn-2-edit"><i class="fas fa-edit"></i></button>
                  <span class="d-block 2-big-title"><?= $faq->faq_page_2_big_title ?></span>
                  <span class="d-block 2-small-title"><?= $faq->faq_page_2_small_title ?></span>
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
                            <div class="card-header" id="headingFaq<?= $f->faq_id ?>">
                              <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left font-weight-bolder text-dark faq-question" type="button" data-toggle="collapse" data-target="#collapseFaq<?= $f->faq_id ?>" aria-expanded="true" aria-controls="collapseFaq<?= $f->faq_id ?>">
                                  <?= $f->faq_question ?>
                                </button>
                              </h2>
                            </div>

                            <div id="collapseFaq<?= $f->faq_id ?>" class="collapse" aria-labelledby="headingFaq<?= $f->faq_id ?>" data-parent="#accordionExample">
                              <div class="card-body faq-answer">
                                <?= $f->faq_answer ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-4 mb-2">
                          <button class="btn btn-warning btn-edit-faq" faq-id="<?= $f->faq_id ?>"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-danger btn-delete-faq" faq-id="<?= $f->faq_id ?>"><i class="fas fa-trash"></i></button>
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
                <button class="btn btn-warning d-block float-right btn-3-edit" "><i class="fas fa-edit"></i></button><br>
                <span class="3-big-title d-block mb-3"><?= $faq->faq_page_3_big_title ?></span>
                <span class="3-small-title"><?= $faq->faq_page_3_small_title ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h3 class="text-center">FORM</h3>
                <div class="row">
                  <div class="col-md-4 col-sm-12">
                    <button class="btn btn-warning d-block mb-3 float-right btn-edit-form"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-primary d-block" style="width: 100%;"><?= $faq->faq_page_3_btn ?></button>
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

    $('body').on('click', '.edit-1-img', function() {
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/tampilan-website/faq/getEditBackground') ?>",
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
        url: "<?= base_url('admin/tampilan-website/faq/update') ?>",
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
        url: "<?= base_url('admin/tampilan-website/faq/update') ?>",
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
        url: "<?= base_url('admin/tampilan-website/faq/update') ?>",
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
    
    $('body').on('click', '.btn-2-img-1',function() {
      $('.modal-title').text('Edit Gambar')
      let img_alt = $(this).attr('img-alt')
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/tampilan-website/faq/getEditImage') ?>",
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
        url: "<?= base_url('admin/tampilan-website/faq/update') ?>",
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
        url: "<?= base_url('admin/tampilan-website/faq/update') ?>",
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

    $('body').on('click', '.btn-2-edit', function() {
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
        <button class="float-right mt-3 btn btn-primary btn-2-save">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-small').summernote("code", small_title)
      $('body').find('.value-big').summernote("code", big_title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-2-save', function() {
      let small_title = $(this).parent().find('.value-small').summernote("code")
      let big_title = $(this).parent().find('.value-big').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/faq/update') ?>",
        data: {
          act: '2-title',
          small_title: small_title,
          big_title: big_title
        },
        success() {
          $('body').find('.btn-2-edit').parent().find('.2-big-title').html(big_title)
          $('body').find('.btn-2-edit').parent().find('.2-small-title').html(small_title)
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
        url: "<?= base_url('admin/tampilan-website/faq/update') ?>",
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
        url: "<?= base_url('admin/tampilan-website/faq/update') ?>",
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
                    url: "<?= base_url('admin/tampilan-website/faq/update') ?>",
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

    $('body').on('click', '.btn-3-edit', function() {
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
        <button class="float-right mt-3 btn btn-primary btn-3-save">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-small').summernote("code", small_title)
      $('body').find('.value-big').summernote("code", big_title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-3-save', function() {
      let small_title = $(this).parent().find('.value-small').summernote("code")
      let big_title = $(this).parent().find('.value-big').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/faq/update') ?>",
        data: {
          act: '3-title',
          small_title: small_title,
          big_title: big_title
        },
        success() {
          $('body').find('.btn-3-edit').parent().find('.3-big-title').html(big_title)
          $('body').find('.btn-3-edit').parent().find('.3-small-title').html(small_title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-edit-form', function() {
      let btn_text = $(this).parent().find('.btn-primary').html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Button Text</label>
          <input type="text" class="form-control value-btn" value="${btn_text}">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-form-save">Save</button>
      `)
      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-form-save', function() {
      let btn_text = $(this).parent().find('.value-btn').val()
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/faq/update') ?>",
        data: {
          act: 'btn-form',
          btn_text
        },
        success() {
          $('body').find('.btn-edit-form').parent().find('.btn-primary').html(btn_text)
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
      page: 'faq'
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
      page: 'faq'
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
      page: 'faq'
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
      page: 'faq'
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
      page: 'faq'
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
      page: 'faq'
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
    url: "<?= base_url('admin/tampilan-website/faq/keyphrase-check') ?>",
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