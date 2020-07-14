<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>
<!--Page Title-->
<section class="page-title" style="background-image:url(<?= $blog->blog_page_1_img ? base_url('media/' . $blog->blog_page_1_img) : base_url('images/background/10.jpg') ?>);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1><?= $blog->blog_page_1_big_title ?></h1>
                    <span class="title"><?= $blog->blog_page_1_small_title ?></span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="<?= $blog->blog_page_1_bread_link ?>"><?= $blog->blog_page_1_bread_1 ?></a></li>
                    <li><?= $blog->blog_page_1_bread_2 ?></li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="blog-classic row-blog">
                        <!-- News Block -->
                        <?php 
                            if(isset($blogs)):
                                foreach($blogs as $b): 
                        ?>
                        <div class="news-block-two wow fadeIn" blog-post="<?= $b->blog_post ?>">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="<?= base_url($b->blog_slug) ?>"><img  loading="lazy" src="<?= $b->blog_image ? base_url('media/' . $b->blog_image) : base_url('images/resource/blog-post-1.jpg') ?>" alt="<?= $b->blog_title ?>"></a></figure>
                                </div>
                                <div class="caption-box">
                                    <div class="inner">
                                        <h3><a href="<?= base_url($b->blog_slug) ?>"><?= $b->blog_title ?></a></h3>
                                        <ul class="info">
                                            <li><?= date('d', strtotime($b->blog_post)) ?> <?= \App\Controllers\Template::bulan(date('m', strtotime($b->blog_post))) ?> <?= date('Y', strtotime($b->blog_post)) ?>,</li>
                                            <li><a href="<?= base_url($b->blog_slug) ?>"><?= $b->lastname ? $b->firstname . ' ' . $b->lastname : $b->firstname ?>,</a></li>
                                            <li><a href="<?= base_url($b->blog_slug) ?>"><?= \App\Controllers\Template::blog_comment($b->blog_id) ?> Komentar</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                                endforeach;
                            endif; 
                        ?>
                    </div>

                    <!--Post Share Options-->
                    <div class="styled-pagination">
                        <ul class="clearfix">
                            <?php 
                                if(isset($count) && $count > 5): 
                            ?>
                            <li class="active"><button class="btn btn-outline-dark rounded-0 btn-load-more">load more</button></li>
                            <?php 
                                endif; 
                            ?>
                        </ul>
                    </div>

                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar default-sidebar">

                        <!--search box-->
                        <div class="sidebar-widget search-box">
                            <form method="get" action="<?= base_url('blog') ?>">
                                <div class="form-group">
                                    <input type="search" name="search" placeholder="Search....." required="Wajib diisi">
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
                        </div>

                        <!-- Categories -->
                        <div class="sidebar-widget categories">
                            <div class="sidebar-title"><h3>Kategori</h3></div>
                            <ul class="cat-list">
                                <?php 
                                    if(isset($category)):
                                        foreach($category as $c): 
                                ?>
                                <li class="<?= isset($_GET['category']) && $_GET['category'] == $c->blog_category_slug ? 'active' : '' ?>"><a href="<?= base_url('blog?category=' . $c->blog_category_slug) ?>"><?= ucwords(strtolower($c->blog_category_name)) ?> <span><?= \App\Controllers\Template::blogCategoryCount($c->blog_category_id) ?></span></a></li>
                                <?php
                                        endforeach;
                                    endif; 
                                ?>
                            </ul>
                        </div>

                         <!-- Latest News -->
                        <div class="sidebar-widget latest-news">
                            <div class="sidebar-title"><h3>Artikel Terbaru</h3></div>
                            <div class="widget-content">
                                <?php 
                                    if(isset($recent)):
                                        foreach($recent as $r): 
                                ?>
                                <article class="post">
                                    <div class="post-thumb"><a href="<?= base_url($r->blog_slug) ?>"><img  loading="lazy" src="<?= $r->blog_image ? base_url('media/' . $r->blog_image) : base_url('images/resource/post-thumb-3.jpg') ?>" alt="<?= $r->blog_title ?>"></a></div>
                                    <h3><a href="<?= base_url($r->blog_slug) ?>"><?= $r->blog_title ?></a></h3>
                                    <div class="post-info">by <?= $r->lastname ? $r->firstname . ' ' . $r->lastname : $r->firstname ?></div>
                                </article>
                                <?php
                                        endforeach; 
                                    endif; 
                                ?>
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="sidebar-widget tags">
                            <div class="sidebar-title"><h3>Keywords</h3></div>
                            <ul class="tag-list clearfix">
                                <?php 
                                    if(isset($tags)):
                                        for($i = 0; $i <= count($tags) - 1; $i++): 
                                ?>
                                    <li><a href="<?= base_url('blog?tags=' . $tags[$i]) ?>"><?= $tags[$i] ?></a></li>
                                <?php 
                                        endfor;
                                    endif; 
                                ?> 
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sidebar Container -->
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script>
$(document).ready(function() {
    $('body').on('click', '.btn-load-more', function() {
        let blog_post = $('body').find('.news-block-two').last().attr('blog-post')
        $.ajax({
            type: 'get',
            url: '<?= base_url('blogloadmore') ?>',
            data: {
                blog_post: blog_post,
                category: "<?= isset($_GET['category']) ? $_GET['category'] : '' ?>",
                tags: "<?= isset($_GET['tags']) ? $_GET['tags'] : '' ?>",
                search: "<?= isset($_GET['search']) ? $_GET['search'] : '' ?>"
            },
            beforeSend() {
                $('body').find('.btn-load-more').html('loading..')
            },
            success(response) {
                if(response.length > 200) {
                    $('body').find('.row-blog').append(response)
                    $('body').find('.btn-load-more').html('load more')
                } else {
                    $('body').find('.btn-load-more').remove()
                }
            }
        })
    })
})
</script>
<?= $this->endSection() ?>