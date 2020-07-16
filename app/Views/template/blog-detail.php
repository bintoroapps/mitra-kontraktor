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
                    <div class="news-detail">
                        <div class="inner-box">
                            <div class="image">
                                <img src="<?= $content->blog_image ? base_url('media/' . $content->blog_image) : base_url('images/resource/blog-post-1.jpg') ?>" alt="" />
                                <div class="post-date">
                                    <span><?= date('d', strtotime($content->blog_post)) ?> <?= \App\Controllers\Template::bulan(date('m', strtotime($content->blog_post))) ?> <?= date('Y', strtotime($content->blog_post)) ?></span>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><?= $content->blog_title ?></h3>
                                <ul class="post-meta">
                                    <li><span class="icon fa fa-comments"></span><?= \App\Controllers\Template::blog_comment($content->blog_id) ?> Comments</li>
                                    <li><span class="icon fa fa-user"></span>By <?= $content->lastname ? $content->firstname . ' ' . $content->lastname : $content->firstname ?></li>
                                </ul>
                                <div class="text">
                                    <p><?= $content->blog_content ?></p>
                                </div>
                                <!-- Post Share Options-->
<!--                                 <div class="post-share-options">
                                    <div class="post-share-inner clearfix">
                                        <div class="pull-left tags"><span class="fa fa-tags"></span><a href="#">Industry,</a> <a href="#">Insights, </a><a href="#">Modern,</a><a href="#">Responsive</a></div>
                                        <ul class="social-box pull-right">
                                            <li class="share">Share :</li>
                                            <li><a href="#"><span class="fa fa-facebook-f"></span></a></li>
                                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                            <li><a href="#"><span class="fa fa-pinterest-p"></span></a></li>
                                            <li><a href="#"><span class="fa fa-dribbble"></span></a></li>
                                        </ul>
                                    </div>
                                </div> -->
                                <!-- More Posts -->
<!--                                 <div class="more-posts">
                                    <div class="clearfix">
                                        <div class="prev pull-left"><a href="#"><span class="fa fa-angle-double-left"></span>&nbsp; Previous Post</a></div>
                                        <div class="next pull-right"><a href="#">Newer Post &nbsp;<span class="fa fa-angle-double-right"></span></a></div>
                                        </ul>
                                    </div>
                                </div> -->
                                
                            </div>
                        </div>
                    
                        <!-- Comments Area -->
                        <div class="comments-area">
                            <div class="group-title">
                                <h4>Comments (<?= \App\Controllers\Template::blog_comment($content->blog_id) ?>)</h4>
                            </div>
                             <?php 
                                if(isset($comment)):
                                    foreach($comment as $c): 
                            ?>
                            <div class="comment-box">
                                <div class="comment">
                                    <div class="author-thumb"><!-- <img src="images/resource/author-1.jpg" alt=""> --></div>
                                    <div class="comment-info clearfix"><strong><?= $c->blog_comment_user ?></strong><div class="comment-time"><?= \App\Controllers\Template::bulan(date('m', strtotime($c->blog_comment_created))) ?> <?= date('d, Y', strtotime($c->blog_comment_created)) ?></div></div>
                                    <div class="text"><?= $c->blog_comment_content ?></div>
                                    <a class="theme-btn reply-btn" href="#"> Reply</a>
                                </div>
                            </div>
                                                            <?php 
                                $reply = \App\Controllers\Template::getReplyComment($c->blog_comment_id);
                                foreach($reply as $r): 
                            ?>
                            <div class="comment-box reply-comment">
                                <div class="comment">
                                    <div class="author-thumb"><!-- <img src="images/resource/author-2.jpg" alt=""> --></div>
                                    <div class="comment-info clearfix"><strong><?= $r->blog_comment_user ?> </strong><div class="comment-time"><?= \App\Controllers\Template::bulan(date('m', strtotime($r->blog_comment_created))) ?> <?= date('d, Y', strtotime($r->blog_comment_created)) ?></div></div>
                                    <div class="text"><?= $r->blog_comment_content ?></div>
                                    <a class="theme-btn reply-btn" href="#"> Reply</a>
                                </div>
                            </div>
                          <?php
                                endforeach;
                                endforeach; 
                                endif; 
                            ?>
                            
                        </div>
                        
                        <!-- Comment Form -->
                        <div class="comment-form">
                            <div class="group-title"><h4>Leave Comment</h4></div>
                            
                            <!--Comment Form-->
                                <div class="row clearfix">
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="username" placeholder="Full Name*" required>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Email Address*" required>
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea class="" name="message" placeholder="Massage"></textarea>
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <button class="theme-btn btn-style-three" type="submit" name="submit-form"><span class="txt">Submit Your Comment</span></button>
                                    </div>
                                    
                                </div>
                        </div>
                        <!--End Comment Form -->
                    
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
                                <div class="text"><a href="blog-detail.html"><?= $r->blog_title ?></a></div>
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
                                <h3>Our Archives</h3>
                            </div>

                            <ul class="cat-list">
                                <li><a href="#">January 09, 2020</a></li>
                                <li><a href="#">March 30, 2020</a></li>
                                <li><a href="#">June 25, 2020</a></li>
                            </ul>
                        </div>
                        
                        <!--Solution Box-->
                        <div class="solution-box" style="background-image:url(<?= $blog->blog_page_1_img ? base_url('media/' . $blog->blog_page_1_img) : base_url('images/background/10.jpg') ?>);">
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
                    <?php 
                        if(isset($client_logo)):
                            foreach($client_logo as  $c): 
                    ?>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img  loading="lazy" src="<?=  base_url('media/' . $c->portfolio_client_logo) ?>" alt="<?= $c->portfolio_client_logo_alt ?>"></a></figure></li>
                    <?php
                            endforeach; 
                        endif; 
                    ?>
                </ul>
            </div>
            
        </div>
    </section>
    <!-- End Clients Section -->
<?= $this->endSection() ?>