<?php if(isset($header)): ?>
<div class="row">
    <?php foreach($header as $h): ?>
    <div class="col-md-4 col-sm-12 col-header-<?= $h->home_page_header_id ?>">
        <div class="card">
            <img header-img-id="<?= $h->home_page_header_id ?>" src="<?= $h->home_page_header_image ? base_url('media/' . $h->home_page_header_image) : base_url('images/main-slider/image-4.jpg') ?>" class="card-img-top" alt="<?= $h->home_page_header_small_title ?>">
            <div class="card-body">
                <span class="card-text 1-small-title"><?= $h->home_page_header_small_title ?></span><br>
                <span class="card-title mx-auto 1-big-title"><?= $h->home_page_header_big_title ?></span>
            </div>
            <div class="card-body">
                <span style="cursor: pointer;" class="card-link edit-header-text" id-header="<?= $h->home_page_header_id ?>">Edit Text</span>
                <span style="cursor: pointer;" class="card-link edit-header-image" id-header="<?= $h->home_page_header_id ?>">Edit Gambar</span>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <div class="col-12 col-form d-none">
        <input type="hidden" name="id-header">
        <div class="form-group">
            <label>Small Title</label>
            <input type="text" name="small-title" class="form-control summernote-editor">
        </div>
        <div class="form-group">
            <label>Big Title</label>
            <input type="text" name="big-title" class="form-control summernote-editor">
        </div>
        <div class="form-group">
            <button class="float-right btn btn-primary btn-save-header-text">save</button>
        </div>
    </div>
    <div class="col-12 col-form-img d-none">
        <div class="row">
            <div class="col-12 mb-3">
                <form action="<?= base_url('admin/tampilan-website/home') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="act" value="header_image">
                    <input type="hidden" name="id_header">
                    <label>Upload Gambar Baru</label>
                    <input type="file" name="image_header" class="form-control" accept="image/*" required>
                    <button type="submit" name="save" class="btn btn-primary mt-3 float-right" value="save-as">Upload & Save</button>
                    <button type="submit" name="save" class="btn btn-success mt-3 float-right mr-2" value="save-as-webp">Upload & Save as Webp</button>
                </form>
            </div>
        </div>
        <div class="col-12 col-form-media">
            
        </div>
    </div>
</div>
<?php endif; ?>