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
            <h1>Portfolio Detail Page Template</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Portfolio Detail Page Template</li>
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
                    <h3 class="text-center">Header</h3>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-warning d-block float-right btn-3-edit" position="1"><i class="fas fa-edit"></i></button><br>
                        <span class="3-1-title d-block mb-3"><?= $portfolio_detail->project_detail_page_3_title_1 ?></span>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-warning d-block float-right btn-4-edit"><i class="fas fa-edit"></i></button><br>
                        <span class="4-title d-block mb-3"><?= $portfolio_detail->project_detail_page_4_title ?></span>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-warning d-block float-right btn-5-edit"><i class="fas fa-edit"></i></button><br>
                        <span class="5-title d-block mb-3"><?= $portfolio_detail->project_detail_page_5_title ?></span>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-warning d-block float-right btn-6-edit"><i class="fas fa-edit"></i></button><br>
                        <span class="6-title d-block mb-3"><?= $portfolio_detail->project_detail_page_6_title ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-warning d-block float-right btn-3-edit" position="2"><i class="fas fa-edit"></i></button><br>
                        <span class="3-2-title d-block mb-3"><?= $portfolio_detail->project_detail_page_3_title_2 ?></span>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-warning d-block float-right btn-7-edit" link="<?= $portfolio_detail->project_detail_page_7_link ?>"><i class="fas fa-edit"></i></button><br>
                        <span class="7-big-title d-block mb-3"><?= $portfolio_detail->project_detail_page_7_big_title ?></span>
                        <span class="7-desc d-block mb-3"><?= $portfolio_detail->project_detail_page_7_desc ?></span>
                        <button class="btn btn-primary d-block mx-auto"><?= $portfolio_detail->project_detail_page_7_btn ?></button>
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

    $('body').on('click', '.btn-3-edit', function() {
      let position = $(this).attr('position')
      let title = $(this).parent().find(`.3-${position}-title`).html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Title</label>
          <input type="text" class="form-control value-title summernote-editor">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-3-save-title" position="${position}">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-title').summernote("code", title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-3-save-title', function() {
      let position = $(this).attr('position')
      let title = $(this).parent().find('.value-title').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/portfolio/tampilan/update') ?>",
        data: {
          act: '3-title',
          title,
          position,
          id_portfolio: "<?= $portfolio_detail->portfolio_id ?>"
        },
        success() {
          $('body').find('.btn-3-edit[position="'+position+'"]').parent().find(`.3-${position}-title`).html(title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-4-edit', function() {
      let title = $(this).parent().find(`.4-title`).html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Title</label>
          <input type="text" class="form-control value-title summernote-editor">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-4-save-title">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-title').summernote("code", title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-4-save-title', function() {
      let title = $(this).parent().find('.value-title').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/portfolio/tampilan/update') ?>",
        data: {
          act: '4-title',
          title,
          id_portfolio: "<?= $portfolio_detail->portfolio_id ?>"
        },
        success() {
          $('body').find('.btn-4-edit').parent().find(`.4-title`).html(title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-5-edit', function() {
      let title = $(this).parent().find(`.5-title`).html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Title</label>
          <input type="text" class="form-control value-title summernote-editor">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-5-save-title">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-title').summernote("code", title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-5-save-title', function() {
      let title = $(this).parent().find('.value-title').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/portfolio/tampilan/update') ?>",
        data: {
          act: '5-title',
          title,
          id_portfolio: "<?= $portfolio_detail->portfolio_id ?>"
        },
        success() {
          $('body').find('.btn-5-edit').parent().find(`.5-title`).html(title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-6-edit', function() {
      let title = $(this).parent().find(`.6-title`).html()
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Title</label>
          <input type="text" class="form-control value-title summernote-editor">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-6-save-title">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-title').summernote("code", title)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-6-save-title', function() {
      let title = $(this).parent().find('.value-title').summernote("code")
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/portfolio/tampilan/update') ?>",
        data: {
          act: '6-title',
          title,
          id_portfolio: "<?= $portfolio_detail->portfolio_id ?>"
        },
        success() {
          $('body').find('.btn-6-edit').parent().find(`.6-title`).html(title)
          $('.modal-data').modal('hide')
        }
      })
    })

    $('body').on('click', '.btn-7-edit', function() {
      let big_title = $(this).parent().find(`.7-big-title`).html()
      let desc = $(this).parent().find(`.7-desc`).html()
      let btn_text = $(this).parent().find(`.btn-primary`).html()
      let btn_link = $(this).attr('link')
      $('.modal-title').text('Edit Text')
      $('.modal-body').html(`
        <div class="form-group">
          <label>Title</label>
          <input type="text" class="form-control value-title summernote-editor">
        </div>
        <div class="form-group">
          <label>Description</label>
          <input type="text" class="form-control value-description summernote-editor">
        </div>
        <div class="form-group">
          <label>Button Text</label>
          <input type="text" class="form-control value-btn-text" value="${btn_text}">
        </div>
        <div class="form-group">
          <label>Button Link</label>
          <input type="text" class="form-control value-btn-link" value="${btn_link}">
        </div>
        <button class="float-right mt-3 btn btn-primary btn-7-save-title">Save</button>
      `)
      setSummernote('80px')
      $('body').find('.value-title').summernote("code", big_title)
      $('body').find('.value-description').summernote("code", desc)

      $('.modal-data').modal('show')
    })

    $('body').on('click', '.btn-7-save-title', function() {
      let title = $(this).parent().find('.value-title').summernote("code")
      let desc = $(this).parent().find('.value-description').summernote("code")
      let btn_text = $(this).parent().find('.value-btn-text').val()
      let btn_link = $(this).parent().find('.value-btn-link').val()
      $.ajax({
        type: 'post',
        url: "<?= base_url('admin/portfolio/tampilan/update') ?>",
        data: {
          act: '7-title',
          title,
          desc,
          btn_text,
          btn_link,
          id_portfolio: "<?= $portfolio_detail->portfolio_id ?>"
        },
        success() {
          $('body').find('.btn-7-edit').parent().find(`.7-big-title`).html(title)
          $('body').find('.btn-7-edit').parent().find(`.7-desc`).html(desc)
          $('body').find('.btn-7-edit').parent().find(`.btn-primary`).html(btn_text)
          $('body').find('.btn-7-edit').attr('link', btn_link)
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