<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>
<!-- Page Title -->
    <section class="page-title" style="background-image:url(<?= $team->team_page_1_img ? base_url('media/' . $team->team_page_1_img) : 'images/background/10.jpg' ?>);">
        <div class="auto-container">
            <h1><?= $team->team_page_1_big_title ?></h1>
            <span class="title"><?= $team->team_page_1_small_title ?></span>

            <ul class="page-breadcrumb">
                <li><a href="<?= $team->team_page_1_bread_link ?>"><?= $team->team_page_1_bread_1 ?></a></li>
                <li><?= $team->team_page_1_bread_2 ?></li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->
    
    <!-- Team Page Section -->
    <section class="team-page-section">
         <?php 
            if(isset($team_category)):
                foreach($team_category as $t): 
        ?>

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
                   <?= strtoupper($t->team_category_name) ?>
                </div>
                <h2><?= ucwords(strtolower($t->team_category_name)) ?></h2>
            </div>
            <div class="row clearfix">
                 <?php 
                        $teams = \App\Controllers\Template::getTeamByTeamCategoryId($t->team_category_id);
                            foreach($teams as $t): 
                    ?>
                <!-- Team Block -->
                <div class="team-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <img src="<?= base_url('team') ?>"><img  loading="lazy" src="<?= $t->team_image ? base_url('media/' . $t->team_image) : 'images/resource/team-1.jpg' ?>" alt="<?= $t->team_name ?>" />
                            <!-- Social Box -->
                            <ul class="social-box">
                                <li><a href="<?= $t->team_facebook ? $t->team_facebook : '#' ?>" class="fa fa-facebook-f"></a></li>
                                <li><a href="<?= $t->team_twitter ? $t->team_twitter : '#' ?>" class="fa fa-twitter"></a></li>
                                <li><a href="<?= $t->team_instagram ? $t->team_instagram : '#' ?>" class="fa fa-instagram"></a></li>
                                <li><a href="<?= $t->team_google_plus ? $t->team_google_plus : '#' ?>" class="fa fa-google-plus"></a></li>
                            </ul>
                        </div>
                        <div class="lower-content">
                            <h5><a href="<?= base_url('team') ?>"><?= $t->team_name ?></a></h5>
                            <div class="designation"><?= $t->team_role ?></div>
                            <!-- Arrows -->
                            <a href="<?= base_url('team') ?>" class="team-arrows-right">
                                <div class="chevron"></div>
                                <div class="chevron"></div>
                                <div class="chevron"></div>
                                <div class="chevron"></div>
                            </a>
                            
                        </div>
                    </div>
                </div>
                
             <?php
                        endforeach;
                    ?>
            </div>
        </div>
                <?php
                endforeach; 
            endif; 
        ?>
    </section>
            
    <!-- Request Quote Section Two -->
    <section class="request-quote-section-two">
        <div class="image-layer" style="background-image:url(<?= $team->team_page_1_img ? base_url('media/' . $team->team_page_1_img) : 'images/background/10.jpg' ?>);"></div>
        <div class="auto-container">
            <div class="content-box">
                <div class="play-box">
                    <a href="<?= $about->about_page_9_video ? $about->about_page_9_video : '#' ?>" class="lightbox-image play-btn"><span class="fa fa-play"><i class="ripple"></i></span></a>
                    <?= $about->about_page_9_big_title ?>
                </div>
                <h2><?= $about->about_page_9_small_title ?></h2>
                <div class="text"><?= $about->about_page_9_desc ?></div>
            </div>
            <!-- Side Image -->
            <div class="side-image wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                <!-- <img src="<?= $about->about_page_9_img_1 ? base_url('media/' . $about->about_page_9_img_1) : 'images/resource/video-img.jpg' ?>" alt="<?= $about->about_page_9_img_1_alt ?>" /> -->
            </div>
            <!-- Inner Container -->
            <div class="inner-container" style="background-image:url(images/background/pattern-5.png)">
                <!-- Title Box -->
                <div class="title-box">
                    <h2><?= $about->about_page_8_big_title ?></h2>
                    <div class="text"><?= $about->about_page_8_desc ?></div>
                </div>
                
                <!-- Default Form -->
                <div class="default-form">
                        <div class="row clearfix">
                        
                            <!-- Column -->
                            <div class="column col-lg-6 col-md-12 col-sm-12">
                                <!-- Form Group -->
                                <div class="form-group">
                                    <input type="text" name="nama" value="" placeholder="Name" required>
                                </div>
                                
                                <div class="form-group">
                                    <input type="email" name="email" value="" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="telp" value="" placeholder="Phone Number" required>
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" name="subject" value="" placeholder="Subject" required>
                                </div>
                            </div>
                            
                            <!-- Column -->
                            <div class="column col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <textarea name="message" placeholder="Your Massage"></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="theme-btn btn-style-four" name="submit-form"><span class="txt"><?= $about->about_page_8_btn ?></span></button>
                                </div>
                            </div>
                        </div>
                  
                </div>
                <!--End Default Form-->
                
            </div>
            
        </div>
    </section>
    <!-- End Request Quote Section Two -->
    
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
    <!--End Team Section -->
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