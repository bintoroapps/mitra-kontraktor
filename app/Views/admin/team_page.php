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
            <h1>Team Page Template</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Team Page Template</li>
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
                    <div class="col-12" style="background-image: url(<?= $team->team_page_1_img ? base_url('media/' . $team->team_page_1_img) : base_url('images/main-slider/image-4.jpg') ?>); height:230px;">
                      <div class="row">
                        <div class="col-12 mb-3">
                          <button class="btn btn-warning float-right edit-1-img"><i class="fas fa-edit"></i></button>
                          </div>
                          <div class="col-md-6 col-sm-12">
                          <button class="btn btn-warning mt-4 ml-3 edit-1-title"><i class="fas fa-edit"></i></button>
                            <span style="display:block;" class="ml-3 1-big-title"><?= $team->team_page_1_big_title ?></span>
                            <span class="d-block mt-2 ml-3 1-small-title"><?= $team->team_page_1_small_title ?></span>
                          </div>
                          <div class="col-md-6 col-sm-12 text-right">
                            <button class="btn btn-warning mt-4 mr-3 edit-1-bread"><i class="fas fa-edit"></i></button>
                            <div style="width: 100%;">
                              <span class="mr-3"><a href="<?= $team->team_page_1_bread_link ?>" class="1-bread-1"><?= $team->team_page_1_bread_1 ?></a></span>&nbsp;-&nbsp;<span class="mr-3 1-bread-2"><?= $team->team_page_1_bread_2 ?></span>
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
            <button class="btn btn-primary btn-add-team-category float-right">Add Team Category</button>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-12 col-team-category">
            <?php 
              if(isset($team_category)): 
                foreach($team_category as $t):
            ?>
            <div class="row">
              <div class="col-md-8 col-sm-12"></div>
              <div class="col-md-4 col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <button class="btn btn-danger d-block float-right btn-2-delete" team-category-id="<?= $t->team_category_id ?>"><i class="fas fa-trash"></i></button>
                    <button class="btn btn-warning d-block float-right btn-2-edit mr-2" team-category-id="<?= $t->team_category_id ?>"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-success d-block float-right btn-2-add mr-2" team-category-id="<?= $t->team_category_id ?>"><i class="fas fa-user-plus"></i></button><br>
                    <span class="2-name d-block mb-3"><?= $t->team_category_name ?></span>
                  </div>
                </div>
              </div>
              <div class="col-12">
                  <div class="row row-team-member" team-category-id="<?= $t->team_category_id ?>">
                    <?php 
                      $teams = \App\Controllers\TeamPageController::getTeamByTeamCategoryId($t->team_category_id);
                      foreach($teams as $te):
                    ?>
                    <div class="col-md-4 col-sm-12">
                      <div class="card">
                          <div class="card-body">
                            <img src="<?= $te->team_image ? base_url('media/' . $te->team_image) : base_url('images/background/4.jpg') ?>" class="card-img-top">
                            <h3 class="text-center"><?= $te->team_name ?></h3>
                            <button class="d-block mx-auto btn-delete-team btn btn-danger btn-sm" id-team="<?= $te->team_id ?>">Remove</button>
                          </div>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  </div>
              </div>
            </div>
            <?php
                endforeach; 
              endif; 
            ?>
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
    $('body').on('click', '.edit-1-img', function() {
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/tampilan-website/team/getEditBackground') ?>",
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
        url: "<?= base_url('admin/tampilan-website/team/update') ?>",
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
        url: "<?= base_url('admin/tampilan-website/team/update') ?>",
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
        url: "<?= base_url('admin/tampilan-website/team/update') ?>",
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

    $('body').on('click', '.btn-add-team-category', function() {
      $('.modal-title').text('Add New Team Category')
      $('.modal-body').html(`
        <div class="form-group">
          <input type="text" class="form-control value-team-category" placeholder="Team Category Name">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-save-team-category">Save</button>
      `)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-save-team-category', function() {
      let team_category = $(this).parent().find('.value-team-category').val()
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/team/update') ?>",
        data: {
          act: 'add-team-category',
          team_category
        },
        success(response) {
          $('body').find('.col-team-category').prepend(response)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-2-add', function() {
      let team_category_id = $(this).attr('team-category-id')
      $.ajax({
        type: 'get',
        url: "<?= base_url('admin/tampilan-website/team/update') ?>",
        data: {
          act: 'get-team-null'
        },
        success(response) {
          $('.modal-title').text('Add New Team')
          let select_option = '<div class="form-group"><select class="form-control select-team"><option value="" selected disabled>--Pilih Team</option>'
          if(response) {
            let resp = JSON.parse(response)
            resp.forEach(res => {
              select_option += `
              <option value="${res.team_id}">${res.team_name}</option>
              `
            })
          }
          select_option += `</select><button class="float-right mt-3 btn btn-primary btn-insert-new-team" team-category-id="${team_category_id}">Save</button></div>`
          $('.modal-body').html(select_option)
          $('.modal-data').modal('show')
        }
      })
    })

    $('body').on('click', '.btn-insert-new-team', function() {
      let team_id = $(this).parent().find('.select-team').val()
      let team_category_id = $(this).attr('team-category-id')
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/team/update') ?>",
        data: {
          act: 'add-team-to-category',
          team_id,
          team_category_id
        },
        success(response) {
          $('body').find('.row-team-member[team-category-id="'+team_category_id+'"]').prepend(response)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-2-delete',function() {
      let team_category_id = $(this).attr('team-category-id')

      Swal.fire({
            title: 'Apakah anda ingin menghapus kategori tersebut ?',
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
                    url: "<?= base_url('admin/tampilan-website/team/update') ?>",
                    data: {
                        act: 'delete-team-category',
                        team_category_id
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
                      $('body').find('.btn-2-delete[team-category-id="'+team_category_id+'"]').parent().parent().parent().parent().remove()
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Kategori Berhasil Dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        });
    })

    $('body').on('click', '.btn-delete-team',function() {
      let id_team = $(this).attr('id-team')

      Swal.fire({
            title: 'Apakah anda ingin menghapus anggota tim dari kategori tersebut ?',
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
                    url: "<?= base_url('admin/tampilan-website/team/update') ?>",
                    data: {
                        act: 'delete-team-member',
                        id_team
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
                      $('body').find('.btn-delete-team[id-team="'+id_team+'"]').parent().parent().parent().remove()
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Anggota Tim Berhasil Dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        });
    })

    $('body').on('click', '.btn-2-edit', function() {
      let team_category_id = $(this).attr('team-category-id')
      let name = $(this).parent().find('.2-name').html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Title</label>
          <input type="text" class="form-control value-title summernote-editor">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-2-save-title" team-category-id="${team_category_id}">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-title').summernote("code", name)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-2-save-title', function() {
      let name = $(this).parent().find('.value-title').summernote("code")
      let team_category_id = $(this).attr('team-category-id')
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/tampilan-website/team/update') ?>",
        data: {
          act: '2-name',
          name,
          team_category_id
        },
        success() {
          $('body').find('.btn-2-edit[team-category-id="'+team_category_id+'"]').parent().find('.2-name').html(name)
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