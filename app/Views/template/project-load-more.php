<?php 
    if(isset($all_project)):
        foreach($all_project as $a): 
?>
<div class="project-block all mix <?= str_replace(' ','-',strtolower($a->portfolio_category_name))  ?> col-lg-4 col-md-6 col-sm-12" project-id="<?= $a->portfolio_id ?>" style="display:inline-block;">
    <div class="image-box">
        <figure class="image"><img  loading="lazy" src="<?= $a->portfolio_main_image ? base_url('media/' . $a->portfolio_main_image) : base_url('images/gallery/2-7.jpg') ?>" alt=""></figure>
        <div class="overlay-box">
            <h4><a href="<?= base_url('projects/' . $a->portfolio_slug) ?>"><?= $a->portfolio_title ?> <br>Project</a></h4>
            <div class="btn-box">
                <a href="<?= $a->portfolio_main_image ? base_url('media/' . $a->portfolio_main_image) : base_url('images/gallery/2-7.jpg') ?>" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                <a href="<?= base_url('projects/' . $a->portfolio_slug) ?>"><i class="fa fa-external-link"></i></a>
            </div>
            <span class="tag"><?= ucwords(strtolower($a->portfolio_category_name)) ?></span>
        </div>
    </div>
</div>
<?php
        endforeach;
    endif; 
?>