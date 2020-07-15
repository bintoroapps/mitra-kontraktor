<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>
<!-- Page Title -->
    <section class="page-title" style="background-image:url(<?= $blog->blog_page_1_img ? base_url('media/' . $blog->blog_page_1_img) : base_url('images/background/10.jpg') ?>);">
        <div class="auto-container">
            <h1><?= $blog->blog_page_1_big_title ?></h1>
            <span class="title"><?= $blog->blog_page_1_small_title ?></span>
            <ul class="page-breadcrumb">
                <li><a href="<?= $blog->blog_page_1_bread_link ?>"><?= $blog->blog_page_1_bread_1 ?></a></li>
                <li><?= $blog->blog_page_1_bread_2 ?></li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->
    
    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                
                <!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="blog-classic">
                         <?php 
                            if(isset($blogs)):
                                foreach($blogs as $b): 
                        ?>
                        <!-- News Block Four -->
                        <div class="news-block-four" blog-post="<?= $b->blog_post ?>">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="<?= base_url($b->blog_slug) ?>"><img src="<?= $b->blog_image ? base_url('media/' . $b->blog_image) : base_url('images/resource/blog-post-1.jpg') ?>" alt="<?= $b->blog_title ?>" /></a>
                                    <div class="post-date">
                                        <span><?= date('d', strtotime($b->blog_post)) ?> <?= \App\Controllers\Template::bulan(date('m', strtotime($b->blog_post))) ?> <?= date('Y', strtotime($b->blog_post)) ?></span>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <h4><a href="<?= base_url($b->blog_slug) ?>"><?= $b->blog_title ?></a></h4>
                                    <div class="text">Today we can tell you, thanks to your passion, hardwork creativity, and expertise, you delivered us the most beautiful house great looks. Good work, highly recommend these guys for small or larger projects. Thanks Igor, Vasily & tht team.</div>
                                    <div class="lower-box clearfix">
                                        <a href="news-detail.html" class="theme-btn btn-style-four"><span class="txt">Read More</span></a>
                                        <ul class="post-meta">
                                            <li><a href="<?= base_url($b->blog_slug) ?>"><span class="icon fa fa-comments"></span><?= \App\Controllers\Template::blog_comment($b->blog_id) ?> Comments</a></li>
                                            <li><span class="icon fa fa-user"></span>By <?= $b->lastname ? $b->firstname . ' ' . $b->lastname : $b->firstname ?></li>
                                        </ul>
                                        <!-- Social Box -->
                                        <ul class="social-box">
                                            <li class="share">Share :</li>
                                            <li><a href="#" class="fa fa-facebook-f"></a></li>
                                            <li><a href="#" class="fa fa-linkedin"></a></li>
                                            <li><a href="#" class="fa fa-twitter"></a></li>
                                            <li><a href="#" class="fa fa-google"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                <?php 
                            endforeach;
                            endif; 
                        ?>   
                        <!--Styled Pagination-->
                        <ul class="styled-pagination text-center">
                             <?php 
                                if(isset($count) && $count > 5): 
                            ?>
                           <li class="active"><button class="btn btn-outline-dark rounded-0 btn-load-more">load more</button></li>
                            <?php 
                                endif; 
                            ?>
                        </ul>                
                        <!--End Styled Pagination-->

                    </div>
                </div>
                
                <!-- Sidebar Side -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar sticky-top">
                        
                        <!-- Search -->
                        <div class="sidebar-widget search-box">
                            <form method="GET" action="<?= base_url('blog') ?>">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="Search here..." required>
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
                        </div>
                        
                        <!-- category -->
                        <div class="sidebar-widget category-widget">
                            <div class="sidebar-title">
                                <h3>Categories</h3>
                            </div>

                            <ul class="cat-list">
                                <?php 
                                    if(isset($category)):
                                        foreach($category as $c): 
                                ?>
                                <li><a href="<?= base_url('blog?category=' . $c->blog_category_slug) ?>"><?= ucwords(strtolower($c->blog_category_name)) ?></a></li>
                                <?php
                                    endforeach;
                                    endif; 
                                ?>
                            </ul>
                        </div>
                        
                        <!-- Popular Posts -->
                        <div class="sidebar-widget popular-posts">
                            <div class="sidebar-title"><h3>Recent news</h3></div>
                             <?php 
                                    if(isset($recent)):
                                        foreach($recent as $r): 
                                ?>
                            <article class="post">
                                <figure class="post-thumb"><img src="<?= $r->blog_image ? base_url('media/' . $r->blog_image) : base_url('images/resource/post-thumb-3.jpg') ?>" alt="<?= $r->blog_title ?>"><a href="<?= base_url($r->blog_slug) ?>" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
                                <div class="text"><a href="<?= base_url($r->blog_slug) ?>"><?= $r->blog_title ?></a></div>
                                <div class="post-info">By <?= $r->lastname ? $r->firstname . ' ' . $r->lastname : $r->firstname ?></div>
                            </article>
                               <?php
                                    endforeach; 
                                    endif; 
                                ?>

                        </div>
                        
                        <!-- category -->
                        <div class="sidebar-widget category-widget">
                            <div class="sidebar-title">
                                <h3>Keywords</h3>
                            </div>
                             <?php 
                                    if(isset($tags)):
                                        for($i = 0; $i <= count($tags) - 1; $i++): 
                                ?>
                            <ul class="cat-list">
                                    <li><a href="<?= base_url('blog?tags=' . $tags[$i]) ?>"><?= $tags[$i] ?></a></li>
                                <?php 
                                        endfor;
                                    endif; 
                                ?> 
                            </ul>
                        </div>
                        
                        <!--Solution Box-->
                        <div class="solution-box" style="background-image:url(images/resource/solution.jpg)">
                            <div class="inner">
                                <div class="title">Quick Contact</div>
                                <h2>Get Solution</h2>
                                <div class="text">Contact us at the Constration office nearest to you or submit a business inquiry online.</div>
                                <a class="solution-btn theme-btn" href="/contact">Contact Us</a>
                            </div>
                        </div>
                        
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sidebar Page Container -->
    
    <!-- Clients Section -->
    <section class="clients-section">
        <div class="auto-container">
            <div class="sponsors-outer">
                <!-- Sponsors Carousel -->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="https://via.placeholder.com/180x135" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="https://via.placeholder.com/180x135" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="https://via.placeholder.com/180x135" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="https://via.placeholder.com/180x135" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="https://via.placeholder.com/180x135" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="https://via.placeholder.com/180x135" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="https://via.placeholder.com/180x135" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="https://via.placeholder.com/180x135" alt=""></a></figure></li>
                </ul>
            </div>
            
        </div>
    </section>
    <!-- End Clients Section -->
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