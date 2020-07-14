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
                    <div class="blog-detail">
                        <!-- News Block -->
                        <div class="news-block-two">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img  loading="lazy" src="<?= $content->blog_image ? base_url('media/' . $content->blog_image) : base_url('images/resource/blog-post-1.jpg') ?>" alt=""></figure>
                                </div>
                                <div class="caption-box">
                                    <div class="inner">
                                        <h3><?= $content->blog_title ?></h3>
                                        <ul class="info">
                                            <li><?= date('d', strtotime($content->blog_post)) ?> <?= \App\Controllers\Template::bulan(date('m', strtotime($content->blog_post))) ?> <?= date('Y', strtotime($content->blog_post)) ?>,</li>
                                            <li><a href="<?= base_url($content->blog_slug) ?>"><?= $content->lastname ? $content->firstname . ' ' . $content->lastname : $content->firstname ?>,</a></li>
                                            <li><a href="<?= base_url($content->blog_slug) ?>"><?= \App\Controllers\Template::blog_comment($content->blog_id) ?> Komentar</a></li>
                                        </ul>
                                        <?= $content->blog_content ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="tags clearfix">
                            <span class="title">Tags:</span>
                            <ul>
                                <?php 
                                    if($content->blog_tags):
                                        for($i = 0; $i <= count(json_decode($content->blog_tags, true)) - 1; $i++):
                                ?>
                                <li><a href="<?= base_url('blog?tags=' . json_decode($content->blog_tags, true)[$i]) ?>"><?= json_decode($content->blog_tags, true)[$i] ?></a></li>
                                <?php
                                        endfor; 
                                    endif; 
                                ?>
                            </ul>
                        </div>

                        <!-- Share Option -->
                        <!-- <div class="share-option">
                            <span class="title">Share This:</span>
                            <ul class="social-icon-colored clearfix">
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google Plus</a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i>Pinterest</a></li>
                                <li class="mail"><a href="#"><i class="fa fa-envelope"></i>Mail to Friends</a></li>
                            </ul>
                        </div> -->
                        <!-- Comments Area -->
                        <div class="comments-area">
                            <div class="group-title"><h2>Komentar (<?= \App\Controllers\Template::blog_comment($content->blog_id) ?>)</h2></div>
                            <?php 
                                if(isset($comment)):
                                    foreach($comment as $c): 
                            ?>
                            <div class="comment-box">
                                <div class="comment pl-0">
                                    <!-- <div class="author-thumb"><img  loading="lazy" src="<?= base_url('images/resource/thumb-4.jpg') ?>" alt=""></div> -->
                                    <div class="comment-info">
                                        <div class="name"><?= $c->blog_comment_user ?></div>
                                        <div class="date"><?= \App\Controllers\Template::bulan(date('m', strtotime($c->blog_comment_created))) ?> <?= date('d, Y', strtotime($c->blog_comment_created)) ?></div>
                                    </div>
                                    <div class="text"><?= $c->blog_comment_content ?></div>
                                    <a href="#" class="reply-btn">Reply</a>
                                </div>
                            </div>
                            <?php 
                                $reply = \App\Controllers\Template::getReplyComment($c->blog_comment_id);
                                foreach($reply as $r): 
                            ?>
                            <div class="comment-box reply-comment">
                                <div class="comment pl-0">
                                    <!-- <div class="author-thumb"><img  loading="lazy" src="<?= base_url('images/resource/thumb-5.jpg') ?>" alt=""></div> -->
                                    <div class="comment-info">
                                    <div class="name"><?= $r->blog_comment_user ?></div>
                                        <div class="date"><?= \App\Controllers\Template::bulan(date('m', strtotime($r->blog_comment_created))) ?> <?= date('d, Y', strtotime($r->blog_comment_created)) ?></div>
                                    </div>

                                    <div class="text"><?= $r->blog_comment_content ?></div>
                                    <a href="#" class="reply-btn">Reply</a>
                                </div>
                            </div>
                            <?php
                                        endforeach;
                                    endforeach; 
                                endif; 
                            ?>
                        </div>

                        <!--Comment Form-->
                        <div class="comment-form">
                            <div class="group-title">
                                <h2>Leave a Comment</h2>
                            </div>
                            <form method="post" action="blog.html">
                                <div class="form-group">
                                    <input type="text" name="username" placeholder="Name" required="">
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Mail Address" required="">
                                </div>

                                <div class="form-group">
                                    <textarea name="message" placeholder="Your Comments"></textarea>
                                </div>

                                <div class="form-group">
                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form">Post Comment</button>
                                </div>
                            </form>
                        </div>
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