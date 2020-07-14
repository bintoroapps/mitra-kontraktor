<?php 
    if(isset($blogs)):
        foreach($blogs as $b): 
?>
<div class="news-block-two wow fadeIn" blog-id="<?= $b->blog_id ?>">
    <div class="inner-box">
        <div class="image-box">
            <figure class="image"><a href="<?= base_url('blog/' . $b->blog_slug) ?>"><img  loading="lazy" src="<?= $b->blog_image ? base_url('media/' . $b->blog_image) : base_url('images/resource/blog-post-1.jpg') ?>" alt="<?= $b->blog_title ?>"></a></figure>
        </div>
        <div class="caption-box">
            <div class="inner">
                <h3><a href="<?= base_url('blog/' . $b->blog_slug) ?>"><?= $b->blog_title ?></a></h3>
                <ul class="info">
                    <li><?= date('d', strtotime($b->blog_post)) ?> <?= \App\Controllers\Template::bulan(date('m', strtotime($b->blog_post))) ?> <?= date('Y', strtotime($b->blog_post)) ?>,</li>
                    <li><a href="<?= base_url('blog/' . $b->blog_slug) ?>"><?= $b->lastname ? $b->firstname . ' ' . $b->lastname : $b->firstname ?>,</a></li>
                    <li><a href="<?= base_url('blog/' . $b->blog_slug) ?>"><?= \App\Controllers\Template::blog_comment($b->blog_id) ?> Komentar</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php 
        endforeach;
    endif; 
?>