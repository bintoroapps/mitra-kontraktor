<?php 
    if($media):
        foreach($media as $m):  
?>
<div class="col-md-3 col-sm-6 mb-3 col-media" media-id="<?= $m->media_id ?>">
    <a href="<?= base_url('media/' . $m->media_name) ?>" data-fancybox><img src="<?= base_url('media/' . $m->media_name) ?>" style="width:100%;" alt="<?= $m->media_name ?>" class="img-thumbnail"></a>
</div>
<?php
        endforeach;
    endif; 
?>
<?php if($count > 12): ?>
    <div class="col-md-12 col-load-more text-center">
        <button class="btn btn-primary btn-load-more">Load More</button>
    </div>
<?php endif; ?>