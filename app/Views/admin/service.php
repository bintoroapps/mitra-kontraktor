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
            <h1>Service Page Template</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Service Page Template</li>
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
          <!--/.col (left) -->
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12" style="background-image: url(<?= $service->service_page_1_img ? base_url('media/' . $service->service_page_1_img) : base_url('images/main-slider/image-4.jpg') ?>); height:230px;">
                      <div class="row">
                        <div class="col-12 mb-3">
                          <button class="btn btn-warning float-right edit-1-img"><i class="fas fa-edit"></i></button>
                          </div>
                          <div class="col-md-6 col-sm-12">
                          <button class="btn btn-warning mt-4 ml-3 edit-1-title"><i class="fas fa-edit"></i></button>
                            <span style="display:block;" class="ml-3 1-big-title"><?= $service->service_page_1_big_title ?></span>
                            <span class="d-block mt-2 ml-3 1-small-title"><?= $service->service_page_1_small_title ?></span>
                          </div>
                          <div class="col-md-6 col-sm-12 text-right">
                            <button class="btn btn-warning mt-4 mr-3 edit-1-bread"><i class="fas fa-edit"></i></button>
                            <div style="width: 100%;">
                              <span class="mr-3"><a href="<?= $service->service_page_1_bread_link ?>" class="1-bread-1"><?= $service->service_page_1_bread_1 ?></a></span>&nbsp;-&nbsp;<span class="mr-3 1-bread-2"><?= $service->service_page_1_bread_2 ?></span>
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
                <button class="btn btn-warning d-block float-right btn-2-edit" "><i class="fas fa-edit"></i></button><br>
                <span class="2-big-title d-block mb-3"><?= $service->service_page_2_big_title ?></span>
                <span class="2-small-title"><?= $service->service_page_2_small_title ?></span>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h3 class="text-center">LIST JASA</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 text-center" style="background-image:url(<?= $service->service_page_3_img ? base_url('media/' . $service->service_page_3_img) : base_url('images/background/3.jpg') ?>)">
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
                                      <h2 class="3-1-value"><?= $service->service_page_3_num_1 ?></h2>
                                    </div>
                                    <div class="col-8 text-left">
                                      <span class="3-1-text"><?= $service->service_page_3_text_1 ?></span>
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
                                      <h2 class="3-2-value"><?= $service->service_page_3_num_2 ?></h2>
                                    </div>
                                    <div class="col-8 text-left">
                                      <span class="3-2-text"><?= $service->service_page_3_text_2 ?></span>
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
                                      <h2 class="3-3-value"><?= $service->service_page_3_num_3 ?></h2>
                                    </div>
                                    <div class="col-8 text-left">
                                      <span class="3-3-text"><?= $service->service_page_3_text_3 ?></span>
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
                                      <h2 class="3-4-value"><?= $service->service_page_3_num_4 ?></h2>
                                    </div>
                                    <div class="col-8 text-left">
                                      <span class="3-4-text"><?= $service->service_page_3_text_4 ?></span>
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
                <span class="pros-title d-block mb-3"><?= $service->service_page_3_pros_1_title ?></span>
                <span class="pros-desc"><?= $service->service_page_3_pros_1_desc ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning d-block float-right btn-3-pros" pros-position="2"><i class="fas fa-edit"></i></button><br>
                <span class="pros-title d-block mb-3"><?= $service->service_page_3_pros_2_title ?></span>
                <span class="pros-desc"><?= $service->service_page_3_pros_2_desc ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="card">
              <div class="card-body">
              <button class="btn btn-warning d-block float-right btn-3-pros" pros-position="3"><i class="fas fa-edit"></i></button><br>
                <span class="pros-title d-block mb-3"><?= $service->service_page_3_pros_3_title ?></span>
                <span class="pros-desc"><?= $service->service_page_3_pros_3_desc ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <button class="btn btn-success float-right add-slider">Add Image</button>
                  </div>
                </div>
              <div class="row mt-3 row-slider">
              <?php 
                if(isset($slider)):
                  foreach($slider as $s): 
              ?>
                <div class="col-md-3 col-sm-4">
                  <div class="card">
                      <img src="<?= $s->service_slider_img ? base_url('media/' . $s->service_slider_img) : base_url('images/resource/special-4.jpg') ?>" class="card-img-top">
                      <div class="card-body">
                        <span style="cursor: pointer;" class="d-block text-center remove-slider" slider-id="<?= $s->service_slider_id ?>">Remove</span>
                      </div>
                  </div>
                </div>
              <?php
                  endforeach; 
                endif; 
              ?>
            </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning float-right mb-3 btn-4-edit"><i class="fas fa-edit"></i></button>
                <span class="text-left d-block 4-big-title"><?= $service->service_page_4_big_title ?></span><br>
                <span class="text-left d-block 4-med-title"><?= $service->service_page_4_med_title ?></span><br>
                <span class="text-left d-block 4-small-title"><?= $service->service_page_4_small_title ?></span><br>
                <span class="text-left d-block 4-desc"><?= $service->service_page_4_desc ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning d-block float-right btn-5-edit" "><i class="fas fa-edit"></i></button><br>
                <span class="5-big-title d-block mb-3"><?= $service->service_page_5_big_title ?></span>
                <span class="5-med-title"><?= $service->service_page_5_med_title ?></span>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <button class="btn btn-warning d-block float-right btn-5-edit-desc" "><i class="fas fa-edit"></i></button><br>
                <span class="5-small-title d-block mb-3"><?= $service->service_page_5_small_title ?></span>
                <span class="5-desc-1 d-block mb-3"><?= $service->service_page_5_det_1 ?></span>
                <span class="5-desc-2 d-block mb-3"><?= $service->service_page_5_det_2 ?></span>
                <span class="5-desc-3 d-block mb-3"><?= $service->service_page_5_det_3 ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h3 class="text-center">FORM</h3>
                  <div class="row">
                    <div class="col-md-16 col-sm-12">
                        <button class="btn btn-warning d-block btn-edit-form mb-2 ml-4"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-primary"><?= $service->service_page_5_btn ?></button>
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
<script>
$(document).ready(function() {
    $('body').on('click', '.edit-1-img', function() {
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/tampilan-website/service/getEditBackground') ?>",
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
        url: "<?= base_url('admin/tampilan-website/service/update') ?>",
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
        url: "<?= base_url('admin/tampilan-website/service/update') ?>",
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
        url: "<?= base_url('admin/tampilan-website/service/update') ?>",
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

    $('body').on('click', '.btn-2-edit', function() {
      let small_title = $(this).parent().find('.2-small-title').html()
      let big_title = $(this).parent().find('.2-big-title').html()
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
        <button class="float-right mt-3 btn btn-primary btn-2-save">Save</button>
      `)
      setSummernote('80px')
      $('.value-big').summernote("code",big_title)
      $('.value-small').summernote("code",small_title)
      $('.modal-data').modal('show')
    })

    $('body').on('click','.btn-2-save', function() {
      let big_title = $(this).parent().find('.value-big').summernote("code")
      let small_title = $(this).parent().find('.value-small').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/service/update') ?>",
        data: {
          act: '2-title',
          big_title,
          small_title
        },
        success() {
          $('body').find('.btn-2-edit').parent().find('.2-big-title').html(big_title)
          $('body').find('.btn-2-edit').parent().find('.2-small-title').html(small_title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-edit-3-background', function() {
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/tampilan-website/service/getEditBackground') ?>",
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
        url: "<?= base_url('admin/tampilan-website/service/update') ?>",
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
        url: "<?= base_url('admin/tampilan-website/service/update') ?>",
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
        url: "<?= base_url('admin/tampilan-website/service/update') ?>",
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
      let small_title = $(this).parent().find('.4-small-title').html()
      let med_title = $(this).parent().find('.4-med-title').html()
      let big_title = $(this).parent().find('.4-big-title').html()
      let desc = $(this).parent().find('.4-desc').html()
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
            <input type="text" class="form-control summernote-editor value-desc">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-4-save">Save</button>
      `)
      setSummernote('80px')
      $('.value-big').summernote("code",big_title)
      $('.value-med').summernote("code",med_title)
      $('.value-small').summernote("code",small_title)
      $('.value-desc').summernote("code",desc)
      $('.modal-data').modal('show')
    })

    $('body').on('click','.btn-4-save', function() {
      let big_title = $(this).parent().find('.value-big').summernote("code")
      let med_title = $(this).parent().find('.value-med').summernote("code")
      let small_title = $(this).parent().find('.value-small').summernote("code")
      let desc = $(this).parent().find('.value-desc').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/service/update') ?>",
        data: {
          act: '4-title',
          big_title,
          med_title,
          small_title,
          desc
        },
        success() {
          $('body').find('.btn-4-edit').parent().find('.4-big-title').html(big_title)
          $('body').find('.btn-4-edit').parent().find('.4-med-title').html(med_title)
          $('body').find('.btn-4-edit').parent().find('.4-small-title').html(small_title)
          $('body').find('.btn-4-edit').parent().find('.4-desc').html(desc)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.remove-slider', function() {
      let slider_id = $(this).attr('slider-id')
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/service/update') ?>",
        data: {
          act: 'remove-slider',
          slider_id,
        },
        success() {
          $('body').find('.remove-slider[slider-id="' + slider_id + '"]').parent().parent().parent().remove()
        }
      })
    })

    $('body').on('click', '.add-slider', function() {
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/tampilan-website/service/getAddSlider') ?>",  
        success(response) {
          $('.modal-title').text('Add New Image')
          $('.modal-body').html(response)
          $('.modal-data').modal('show')
        }
      })
    })

    $('body').on('click', '.choose-media-add-slider', function() {
      let media = $(this).attr('image')
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/service/update') ?>",
        data: {
          act: 'add-slider',
          media: media
        },
        success(response) {
          $('body').find('.row-slider').append(response)
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
        url: "<?= base_url('admin/tampilan-website/service/update') ?>",
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

    $('body').on('click', '.btn-5-edit', function() {
      let med_title = $(this).parent().find('.5-med-title').html()
      let big_title = $(this).parent().find('.5-big-title').html()
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
        <button class="float-right mt-3 btn btn-primary btn-5-save">Save</button>
      `)
      setSummernote('80px')
      $('.value-big').summernote("code",big_title)
      $('.value-med').summernote("code",med_title)
      $('.modal-data').modal('show')
    })

    $('body').on('click','.btn-5-save', function() {
      let big_title = $(this).parent().find('.value-big').summernote("code")
      let med_title = $(this).parent().find('.value-med').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/service/update') ?>",
        data: {
          act: '5-title',
          big_title,
          med_title
        },
        success() {
          $('body').find('.btn-5-edit').parent().find('.5-big-title').html(big_title)
          $('body').find('.btn-5-edit').parent().find('.5-med-title').html(med_title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-5-edit-desc', function() {
      let small_title = $(this).parent().find('.5-small-title').html()
      let desc_1 = $(this).parent().find('.5-desc-1').html()
      let desc_2 = $(this).parent().find('.5-desc-2').html()
      let desc_3 = $(this).parent().find('.5-desc-3').html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
            <label>Small Title</label>
            <input type="text" class="form-control summernote-editor value-small">
        </div>
        <div class="form-group">
            <label>Detail 1</label>
            <input type="text" class="form-control summernote-editor value-det-1">
        </div>
        <div class="form-group">
            <label>Detail 2</label>
            <input type="text" class="form-control summernote-editor value-det-2">
        </div>
        <div class="form-group">
            <label>Detail 3</label>
            <input type="text" class="form-control summernote-editor value-det-3">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-5-save-desc">Save</button>
      `)
      setSummernote('80px')
      $('.value-small').summernote("code",small_title)
      $('.value-det-1').summernote("code",desc_1)
      $('.value-det-2').summernote("code",desc_2)
      $('.value-det-3').summernote("code",desc_3)
      $('.modal-data').modal('show')
    })

    $('body').on('click','.btn-5-save-desc', function() {
      let small_title = $(this).parent().find('.value-small').summernote("code")
      let det_1 = $(this).parent().find('.value-det-1').summernote("code")
      let det_2 = $(this).parent().find('.value-det-2').summernote("code")
      let det_3 = $(this).parent().find('.value-det-3').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/service/update') ?>",
        data: {
          act: '5-desc',
          small_title,
          det_1,
          det_2,
          det_3
        },
        success() {
          $('body').find('.btn-5-edit-desc').parent().find('.5-small-title').html(small_title)
          $('body').find('.btn-5-edit-desc').parent().find('.5-desc-1').html(det_1)
          $('body').find('.btn-5-edit-desc').parent().find('.5-desc-2').html(det_2)
          $('body').find('.btn-5-edit-desc').parent().find('.5-desc-3').html(det_3)
          $('.modal-data').modal('hide')
        }
      })
    })
})

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