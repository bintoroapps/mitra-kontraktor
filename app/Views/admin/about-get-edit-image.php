<div class="row">
    <div class="col-12 mb-3">
        <label>Img Alt</label>
        <input type="text" class="form-control" name="img_alt" value="<?= $alt ?>">
        <button type="button" class="btn btn-primary mt-3 float-right btn-save-alt-<?= $section ?>-img-<?= $img ?>">Save</button>
    </div>
    <div class="col-12 mb-3">
        <form id="form-img-<?= $section ?>-<?= $img ?>" action="<?= base_url('admin/tampilan-website/about') ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="act" value="<?= $section ?>_img_<?= $img ?>">
            <label>Upload Gambar Baru</label>
            <input type="file" name="image_<?= $section ?>_<?= $img ?>" class="form-control" accept="image/*" required>
            <button type="submit" name="save" value="save-as" class="float-right mt-3 btn btn-primary btn-img-<?= $section ?>-<?= $img ?>">Upload & Save</button>
            <button type="submit" name="save" value="save-as-webp" class="float-right mt-3 mr-2 btn btn-success btn-img-<?= $section ?>-<?= $img ?>">Upload & Save</button>
        </form>
    </div>
</div>
<?php if(isset($media)): ?>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label>Pilih dari Media</label>
        </div>
    </div>
    <?php foreach($media as $m): ?>
        <div class="col-md-2 col-md-4 choose-media-<?= $section ?>-img-<?= $img ?>" style="cursor: pointer;" image="<?= $m->media_name ?>">
            <img src="<?= base_url('media/' . $m->media_name) ?>" style="width: 100%;">
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>