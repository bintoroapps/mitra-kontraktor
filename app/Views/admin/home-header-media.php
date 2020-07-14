<?php if(isset($media)): ?>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label>Pilih dari Media</label>
        </div>
    </div>
    <?php foreach($media as $m): ?>
        <div class="col-md-2 col-md-4 choose-media-header" style="cursor: pointer;" image="<?= $m->media_name ?>">
            <img src="<?= base_url('media/' . $m->media_name) ?>" style="width: 100%;">
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>