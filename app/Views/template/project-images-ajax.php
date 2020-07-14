<?php 
    if(isset($images)):
        foreach($images as $i): 
?>
<div class="project-block all col-lg-4 col-md-6 col-sm-12 mb-3">
    <div class="image-box">
        <figure class="image"><img  loading="lazy" src="<?= $i->portfolio_images_name ? base_url('media/' . $i->portfolio_images_name) : base_url('images/gallery/2-7.jpg') ?>" alt=""></figure>
        <div class="overlay-box">
            <div class="btn-box">
                <a href="<?= $i->portfolio_images_name? base_url('media/' . $i->portfolio_images_name) : base_url('images/gallery/2-7.jpg') ?>" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
            </div>
        </div>
    </div>
</div>
<?php
        endforeach;
    endif; 
?>