<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>


    <!-- Page Title -->
    <section class="page-title" style="background-image:url(<?= $about->about_page_1_img ? base_url('media/' . $about->about_page_1_img) : 'images/background/10.jpg' ?>);">
        <div class="auto-container">
            <h1><?= $about->about_page_1_big_title ?></h1>
            <ul class="page-breadcrumb">
                <li><a href="index.html"><?= $about->about_page_1_bread_1 ?></a></li>
                <li><?= $about->about_page_1_bread_2 ?></li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- About Section Two -->
    <section class="about-section-two style-two">
        <div class="pattern-layer" style="background-image:url(images/background/pattern-2.png)"></div>
        <div class="image-layer" style="background-image: url(<?= $about->about_page_3_img ? base_url('media/' . $about->about_page_3_img) : 'images/background/3.jpg' ?>);"></div>
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <div class="title">
                    <!-- Title Effect -->
                    <div class="title-effect">
                        <div class="bar bar-top"></div>
                        <div class="bar bar-right"></div>
                        <div class="bar bar-bottom"></div>
                        <div class="bar bar-left"></div>
                    </div>
                    <?= $about->about_page_2_big_title ?>
                </div>
                <h2><?= $about->about_page_2_small_title ?></h2>
            </div>
            
            <div class="row clearfix">
                
                <!-- Content Column -->
                <div class="content-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <h3><a href="about.html"><?= $about->about_page_2_small_title ?></a></h3>
                        <div class="text"><?= $about->about_page_2_desc ?></div>
                        <a href="<?= $about->about_page_2_btn_link ?>" class="read-more theme-btn"><?= $about->about_page_2_btn_text ?></a>
                    </div>
                </div>
                
                <!-- Image Column -->
                <div class="image-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="<?= $about->about_page_2_img_1 ? base_url('media/' .$about->about_page_2_img_1) : 'images/resource/alphabet-image.png' ?>" alt="<?= $about->about_page_2_img_1_alt ?>" />
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </section>

<!-- Counter Section -->
    <section class="counter-section alternate">
        <div class="auto-container">
            
            <!-- Fact Counter -->
            <div class="fact-counter style-two">
                <div class="row clearfix">

                    <!-- Column -->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="content">
                                <div class="icon"><img src="images/icons/counter-1.png" alt="" /></div>
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="3500" data-stop="<?= $about->about_page_3_num_1 ?>">0</span>+
                                </div>
                                <div class="counter-title"><?= $about->about_page_3_text_1 ?></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Column -->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="content">
                                <div class="icon"><img src="images/icons/counter-2.png" alt="" /></div>
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="2500" data-stop="<?= $about->about_page_3_num_2 ?>">0</span>+
                                </div>
                                <div class="counter-title"><?= $about->about_page_3_text_2 ?></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Column -->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="content">
                                <div class="icon"><img src="images/icons/counter-3.png" alt="" /></div>
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="3000" data-stop="<?= $about->about_page_3_num_3 ?>">0</span>+
                                </div>
                                <div class="counter-title"><?= $about->about_page_3_text_3 ?></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Column -->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="content">
                                <div class="icon"><img src="images/icons/counter-4.png" alt="" /></div>
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="3000" data-stop="<?= $about->about_page_3_num_4 ?>">0</span>+
                                </div>
                                <div class="counter-title"><?= $about->about_page_3_text_4 ?></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </section>
    <!-- End Counter Section -->

        <!-- Call To Action Section -->
    <section class="call-to-action-section style-two">
        <div class="auto-container">
            <div class="inner-container">
                <div class="image-layer wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms" style="background-image:url(<?= $about->about_page_1_img ? base_url('media/' . $about->about_page_1_img) : 'images/background/10.jpg' ?>);"></div>
                <div class="row clearfix">
                    
                    <!-- Column -->
                    <div class="column col-lg-6 col-md-12 col-sm-12">
                        <h4>Looking For Best Partner <br> For Your Next Construction Works?</h4>
                    </div>
                    <!-- Column -->
                    <div class="column col-lg-6 col-md-12 col-sm-12">
                        <a href="/about" class="theme-btn btn-style-three"><span class="txt">More About</span></a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End Call To Action Section -->
    
    <!-- Reason Section -->
    <section class="reason-section style-two">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Image Column -->
                <div class="image-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="<?= $about->about_page_2_img_1 ? base_url('media/' .$about->about_page_2_img_1) : 'images/resource/alphabet-image.png' ?>" alt="" />
                        </div>
                        <div class="image-text">
                            <div class="text"><?= $about->about_page_6_small_title ?></div>
                        </div>
                    </div>
                </div>
                <!-- Content Column -->
                <div class="content-column col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Sec Title -->
                        <div class="sec-title">
                            <div class="title">
                                <!-- Title Effect -->
                                <div class="title-effect">
                                    <div class="bar bar-top"></div>
                                    <div class="bar bar-right"></div>
                                    <div class="bar bar-bottom"></div>
                                    <div class="bar bar-left"></div>
                                </div>
                                <?= $about->about_page_6_big_title ?>
                            </div>
                            <h2><?= $about->about_page_6_small_title ?></h2>
                        </div>

                        <div class="row clearfix">
                            <div class="column col-lg-6 col-md-6 col-sm-12">
                                <ul class="list-style-one">
                                    <li><?= $about->about_page_6_title_1 ?></li>
                                    <li><?= $about->about_page_6_title_2 ?></li>
                                    <li><?= $about->about_page_6_title_3 ?></li>
                                </ul>
                            </div>
                            <div class="column col-lg-6 col-md-6 col-sm-12">
                                <ul class="list-style-one">
                                    <li><?= $about->about_page_6_title_4 ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Reason Section -->
    
    <!-- Video Section -->
    <section class="video-section">
        <div class="image-layer" style="background-image:url(https://via.placeholder.com/1143x700)"></div>
        <div class="pattern-layer" style="background-image:url(images/background/pattern-3.jpg)"></div>
        <div class="side-image-layer" style="background-image:url(<?= $about->about_page_1_img ? base_url('media/' . $about->about_page_1_img) : 'images/background/10.jpg' ?>);"></div>
        <div class="auto-container">
            
            <div class="inner-container">
                
                <!-- Fact Counter -->
                <div class="fact-counter style-two">
                    <div class="clearfix">

                        <!-- Column -->
                        <div class="column counter-column">
                            <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="content">
                                    <div class="icon"><img src="images/icons/counter-1.png" alt="" /></div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="3500" data-stop="<?= $about->about_page_3_num_1 ?>">0</span>+
                                    </div>
                                    <div class="counter-title"><?= $about->about_page_3_text_1 ?></div>
                                </div>
                            </div>
                        </div>

                        <!-- Column -->
                        <div class="column counter-column">
                            <div class="inner wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                                <div class="content">
                                    <div class="icon"><img src="images/icons/counter-2.png" alt="" /></div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="2500" data-stop="<?= $about->about_page_3_num_2 ?>">0</span>+
                                    </div>
                                    <div class="counter-title"><?= $about->about_page_3_text_2 ?></div>
                                </div>
                            </div>
                        </div>

                        <!-- Column -->
                        <div class="column counter-column">
                            <div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
                                <div class="content">
                                    <div class="icon"><img src="images/icons/counter-3.png" alt="" /></div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="3000" data-stop="<?= $about->about_page_3_num_3 ?>">0</span>+
                                    </div>
                                    <div class="counter-title"><?= $about->about_page_3_text_3 ?></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Column -->
                        <div class="column counter-column">
                            <div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
                                <div class="content">
                                    <div class="icon"><img src="images/icons/counter-4.png" alt="" /></div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="3000" data-stop="<?= $about->about_page_3_num_4 ?>">0</span>+
                                    </div>
                                    <div class="counter-title"><?= $about->about_page_3_text_4 ?></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <!-- Video Box -->
                <div class="video-box">
                    <div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <img src="<?= $about->about_page_9_img_1 ? base_url('media/' . $about->about_page_9_img_1) : 'images/resource/video-img.jpg' ?>" alt="<?= $about->about_page_9_img_1_alt ?>" />
                        <div class="overlay-box">
                            <div class="content">
                                <div class="play-box">
                                    <a href="<?= $about->about_page_9_video ? $about->about_page_9_video : '#' ?>" class="lightbox-image play-btn"><span class="fa fa-play"><i class="ripple"></i></span></a>
                                    <?= $about->about_page_9_big_title ?>
                                </div>
                                <h2><?= $about->about_page_9_small_title ?></h2>
                                <div class="text"><?= $about->about_page_9_desc ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- End Video Section -->
    
    <!-- Skill Section -->
    <section class="skill-section style-two" style="background-image:url(images/background/2.jpg)">
        <div class="image-layer" style="background-image:url(images/background/pattern-2.png)"></div>
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <div class="title">
                    <!-- Title Effect -->
                    <div class="title-effect">
                        <div class="bar bar-top"></div>
                        <div class="bar bar-right"></div>
                        <div class="bar bar-bottom"></div>
                        <div class="bar bar-left"></div>
                    </div>
                    Our Skills
                </div>
                <h2>We are giving you a chance <br> to build your dream</h2>
            </div>
            <div class="row clearfix">
                
                <!-- Skill Column -->
                <div class="skill-column col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        
                        <div class="skill-block">
                            <div class="bar-item">
                                <div class="skill-title">General Consulting</div>
                                <div class="skill-bar">
                                    <div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="99">0</span>%</div></div>
                                    <div class="bar-inner"><div class="bar progress-line" data-height="99"></div></div>
                                </div>
                            </div>
                            <div class="bar-item">
                                <div class="skill-title">Construction Management</div>
                                <div class="skill-bar">
                                    <div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="99">0</span>%</div></div>
                                    <div class="bar-inner"><div class="bar progress-line" data-height="99"></div></div>
                                </div>
                            </div>
                            <div class="bar-item">
                                <div class="skill-title">Design & Build</div>
                                <div class="skill-bar">
                                    <div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="60">0</span>%</div></div>
                                    <div class="bar-inner"><div class="bar progress-line" data-height="60"></div></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <!-- Image Column -->
                <div class="image-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="images/resource/accordian.png" alt="" />
                        </div>
                    </div>
                </div>
                
                <!-- Skill Column -->
                <div class="skill-column right-column col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        
                        <div class="skill-block">
                            <div class="bar-item">
                                <div class="skill-title">General Consulting</div>
                                <div class="skill-bar">
                                    <div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="65">0</span>%</div></div>
                                    <div class="bar-inner"><div class="bar progress-line" data-height="65"></div></div>
                                </div>
                            </div>
                            <div class="bar-item">
                                <div class="skill-title">Construction Management</div>
                                <div class="skill-bar">
                                    <div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="75">0</span>%</div></div>
                                    <div class="bar-inner"><div class="bar progress-line" data-height="75"></div></div>
                                </div>
                            </div>
                            <div class="bar-item">
                                <div class="skill-title">Design & Build</div>
                                <div class="skill-bar">
                                    <div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="90">0</span>%</div></div>
                                    <div class="bar-inner"><div class="bar progress-line" data-height="90"></div></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- End Skill Section -->
    
    <!-- Request Quote Section -->
    <section class="request-quote-section">
        <div class="image-layer" style="background-image: url(<?= $about->about_page_8_img ? base_url('media/' . $about->about_page_8_img) : 'images/background/6.jpg' ?>);"></div>
        <div class="auto-container">
            <div class="inner-container" style="background-image:url(images/background/pattern-5.png)">
                <div class="row clearfix">
                    
                    <!-- Form Column -->
                    <div class="form-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="title-box">
                                <h2><?= $about->about_page_8_big_title ?></h2>
                                <span class="title"><?= $about->about_page_8_small_title ?></span>
                                <span class="discount"><?= $about->about_page_8_num ?></span>
                                <div class="text"><?= $about->about_page_8_desc ?></div>
                            </div>
                            <style>
                                input[type="number"] {
                                    position: relative;
                                    display: block;
                                    width: 100%;
                                    font-size: 14px;
                                    color: #777777;
                                    line-height: 30px;
                                    padding: 14px 25px;
                                    background-color: #ffffff;
                                    height: 60px;
                                    border: 1px solid #bbbbbb;
                                    font-weight: 400;
                                    border-radius: 10px;
                                    -webkit-transition: all 300ms ease;
                                    -moz-transition: all 300ms ease;
                                    -ms-transition: all 300ms ease;
                                    -o-transition: all 300ms ease;
                                    transition: all 300ms ease;
                                }
                            </style>
                            
                            <!-- Default Form -->
                            <div class="default-form">
                                
                                    <div class="form-group">
                                        <input type="text" name="nama" value="" placeholder="Name" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="email" name="email" value="" placeholder="Email" required>
                                    </div>                                    
                                    <div class="form-group">
                                        <input type="number" name="telp" value="" placeholder="Phone Number" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="text" name="subject" value="" placeholder="Subject" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <textarea name="pesan" placeholder="Your Massage"></textarea>
                                    </div>
                                    
                                    <div class="form-group text-center">
                                        <button type="submit" class="theme-btn btn-style-four"><span class="txt"><?= $about->about_page_8_btn ?></span></button>
                                    </div>
                                
                            </div>
                            <!--End Default Form-->
                            
                        </div>
                    </div>
                    
                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image">
                                <img src="<?= $about->about_page_2_img_1 ? base_url('media/' .$about->about_page_2_img_1) : 'images/resource/alphabet-image.png' ?>" alt="" />
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="three-item-carousel owl-carousel owl-theme">
            
            </div>
        </div>
    </section>
    <!-- End Request Quote Section -->
    
    <!-- Default Section -->
    <section class="default-section style-two">
        <div class="auto-container">
            <div class="row clearfix">
                
                <!-- Testimonial Column -->
                <div class="testimonial-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Sec Title -->
                        <div class="sec-title">
                            <div class="title">
                                <!-- Title Effect -->
                                <div class="title-effect">
                                    <div class="bar bar-top"></div>
                                    <div class="bar bar-right"></div>
                                    <div class="bar bar-bottom"></div>
                                    <div class="bar bar-left"></div>
                                </div>
                                <?= $about->about_page_4_big_title ?>
                            </div>
                            <h2><?= $about->about_page_4_small_title ?></h2>
                        </div>
                        <div class="carousel-outer">
                            <div class="single-item-carousel owl-carousel owl-theme">
                                 <?php 
                                    if(isset($testimonials)):
                                    foreach($testimonials as $t): 
                                    ?>
                                <!-- Testimonial Block Two -->
                                <div class="testimonial-block-two">
                                    <div class="inner-box">
                                        <div class="author-image">
                                            <img src="<?= $t->portfolio_client_photo ? base_url('media/' . $t->portfolio_client_photo) : 'images/resource/thumb-2.jpg' ?>" alt="<?= $t->portfolio_client_photo_alt ?>" />
                                        </div>
                                        <div class="rating">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                        <div class="text"><?= $t->portfolio_testimonial ?></div>
                                        <h6><?= $t->portfolio_client ?></h6>
                                        <div class="quote-icon flaticon-quote-4"></div>
                                    </div>
                                </div>
                             <?php
                                    endforeach; 
                                    endif; 
                                ?>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <!-- Accordian Column -->
                <div class="accordian-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Sec Title -->


                        <div class="sec-title">
                            <div class="title">
                                <!-- Title Effect -->
                                <div class="title-effect">
                                    <div class="bar bar-top"></div>
                                    <div class="bar bar-right"></div>
                                    <div class="bar bar-bottom"></div>
                                    <div class="bar bar-left"></div>
                                </div>
                                Question & Answer
                            </div>
                            <h2>Get Some Frequently <br> Asked Question</h2>
                        </div>
                        
                        <ul class="accordion-box">
                            <!--Block-->
                             <?php 
                                if(isset($faqs)):
                                    foreach($faqs as $f): 
                            ?>
                            <li class="accordion block">
                                <div class="acc-btn"><?= $f->faq_home_question ?> <div class="icon fa fa-angle-right"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text"><?= $f->faq_home_answer ?></div>
                                    </div>
                                </div>
                            </li>
                             <?php
                                    endforeach; 
                                endif; 
                            ?>
                        </ul>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- End Default Section -->
    
    <!-- Clients Section -->
    <section class="clients-section">
        <div class="auto-container">
            
            <div class="sponsors-outer">
                <!-- Sponsors Carousel -->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <?php  
                        $recent_post = \App\Controllers\Template::getTwoRecentPost();
                        foreach($recent_post as $r):
                    ?>
                            <li class="slide-item"><figure class="image-box"><a href="<?= base_url($r->blog_slug) ?>"><img src="<?= $r->blog_image ? base_url('media/' . $r->blog_image) : 'images/resource/post-thumb-1.jpg'  ?>" alt="<?= $r->blog_image_alt ?>"></a></figure></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
        </div>
    </section>
    <!-- End Clients Section -->
    <?= $this->endSection() ?>

     <?= $this->section('js') ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
    $(document).ready(function() {
        $('body').on('click', '.btn-send-form', function() {
            let name = $('body').find('[name="nama"]').val()
            let email = $('body').find('[name="email"]').val()
            let telp = $('body').find('[name="telp"]').val()
            let message = $('body').find('[name="pesan"]').val()

            if(name && email && telp && message) {
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                    $.ajax({
                        type: 'post',
                        url: 'https://crm.bintorocorp.co.id/api/orderArchitect',
                        data: {
                            name,
                            email,
                            telp,
                            message
                        },
                        beforeSend() {
                            let timerInterval;
                            Swal.fire({
                                title: 'Silahkan Menunggu',
                                html: 'Kami sedang mengirim data',
                                timerProgressBar: true,
                                onBeforeOpen: () => {
                                    Swal.showLoading()
                                },
                                onClose: () => {
                                    clearInterval(timerInterval)
                                }
                                }).then((result) => {
                                if (
                                    /* Read more about handling dismissals below */
                                    result.dismiss === Swal.DismissReason.timer
                                ) {
                                    console.log('I was closed by the timer') // eslint-disable-line
                                }
                            })
                        },
                        success() {
                            $('body').find('[name="nama"]').val('')
                            $('body').find('[name="email"]').val('')
                            $('body').find('[name="telp"]').val('')
                            $('body').find('[name="pesan"]').val('')
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Data Berhasil Dikirim',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Email Tidak Valid',
                    })
                }

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Semua Data Harus Diisi',
                })
            }
        })
    })
    </script>
    <?= $this->endSection() ?>