<div class="row">
    <div class="col-12 mb-3">
        <form id="form-background-<?= $section ?>" action="<?= base_url('admin/tampilan-website/faq') ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="act" value="<?= $section ?>_background">
            <label>Upload Gambar Baru</label>
            <input type="file" name="image_<?= $section ?>" class="form-control" accept="image/*" required>
            <button type="submit" name="save" value="save-as" class="float-right mt-3 btn btn-primary btn-background-<?= $section ?>">Upload & Save</button>
            <button type="submit" name="save" value="save-as-webp" class="float-right mt-3 mr-2 btn btn-success btn-background-<?= $section ?>">Upload & Save as Webp</button>
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
        <div class="col-md-2 col-md-4 choose-media-<?= $section ?>-background" style="cursor: pointer;" image="<?= $m->media_name ?>">
            <img src="<?= base_url('media/' . $m->media_name) ?>" style="width: 100%;">
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>