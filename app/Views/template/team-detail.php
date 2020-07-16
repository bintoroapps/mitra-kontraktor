<?php echo  $this->extend('template/main-detail') ?>


<?php echo  $this->section('content') ?>
  <!-- Page Title -->
    <section class="page-title" style="background-image:url(<?php echo $team_detail->title_page_1 ? base_url('media/' . $team_detail->title_page_1) : 'images/background/10.jpg' ?>);">
        <div class="auto-container">
            <h1><?php echo $team_detail->header_container_1;?></h1>
            <ul class="page-breadcrumb">
                <li><a href="<?php echo $team_detail->link_breadcumb_1;?>"><?php echo $team_detail->breadcumb_1;?></a></li>
                <li><?php echo $team_detail->breadcumb_2;?></li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->
    
    <!-- Team Detail Section -->
    <section class="team-single-section">
        <div class="auto-container">
            <div class="row clearfix">
                  <?php 
                        if(isset($team)):
                        foreach($team as $t): 
                      ?>
                <!-- Image Column -->
                <div class="image-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="<?= $t->team_image ? base_url('media/' . $t->team_image) : base_url('images/resource/project-thumb-1.jpg') ?>" alt="<?= $t->team_image ?>" />
                        </div>
                    </div>
                </div>
                
                <!-- Content Column -->
                <div class="content-column col-lg-8 col-md-12 col-sm-12">

                    <div class="inner-column">
                        <h2><?php echo $t->team_name;?> <span class="category"><?php echo $t->team_role?></span></h2>
                        <ul class="post-meta">
<!--                             <li><span class="icon flaticon-email-6"></span> <a href="mailto:manzil@gmail.com">manzil@gmail.com</a></li>
                            <li><span class="icon flaticon-24-hours-phone-service"></span> <a href="tel:000-000-0000">000 - 000 - 0000</a></li>
                            <li><span class="icon fa fa-whatsapp"></span> <a href="tel:999-999-9999">999 - 999 - 9999</a></li> -->
                        </ul>
                        <div class="text">
                            <p><?php echo $t->team_bio?></p>
                        </div>
                        <div class="row clearfix">
                            <div class="column col-lg-6 col-md-6 col-sm-12">
                                <ul class="list-style-one">
                                    <li><?php echo $t->team_expertise_1?></li>
                                    <li><?php echo $t->team_expertise_2?></li>
                                    <li><?php echo $t->team_expertise_3?></li>
                                </ul>
                            </div>
                            <div class="column col-lg-6 col-md-6 col-sm-12">
                                <ul class="list-style-one">
                                    <li><?php echo $t->team_expertise_4?></li>
                                    <li><?php echo $t->team_expertise_5?></li>
                                    <li><?php echo $t->team_expertise_6?></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Social Box -->
                        <ul class="social-icon-one">
                            <li><a href="<?= $t->team_facebook ? $t->team_facebook : '#' ?>" class="fa fa-facebook-f"></a></li>
                            <li><a href="<?= $t->team_twitter ? $t->team_twitter : '#' ?>" class="fa fa-twitter"></a></li>
                            <li><a href="<?= $t->team_instagram ? $t->team_instagram : '#' ?>" class="fa fa-twitter"></a></li>
                            <li><a href="<?= $t->team_google_plus ? $t->team_google_plus : '#' ?>" class="fa fa-google-plus"></a></li>
                        </ul>
                    </div>

                </div>
                
            </div>
                      <?php
                        endforeach; 
                        endif; 
                      ?>
        </div>
    </section>
    <!-- End Team Detail Section -->
            
    <!-- Request Quote Section Two -->
    <section class="request-quote-section-two">
        <div class="image-layer" style="background-image:url(<?php echo $team_detail->title_page_1 ? base_url('media/' . $team_detail->title_page_1) : 'images/background/10.jpg' ?>);"></div>
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
                <img src="images/resource/quote-1.png" alt="" />
            </div>
            <!-- Inner Container -->
            <div class="inner-container" style="background-image:url(images/background/pattern-5.png)">
                <!-- Title Box -->
                <div class="title-box">
                    <h2><?= $about->about_page_8_big_title ?></h2>
                    <div class="text"><?= $about->about_page_8_small_title ?></div>
                </div>
                
                <!-- Default Form -->
                <div class="default-form">
                    <form method="post" action="blog.html">
                        <div class="row clearfix">
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
                                    <input type="number" name="telp" value="" placeholder="Phone Number" required>
                                </div>
                            </div>
                            
                            <!-- Column -->
                            <div class="column col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <textarea name="message" placeholder="Your Massage"></textarea>
                                </div>
                                
                                    <div class="form-group text-center">
                                        <button type="submit" class="theme-btn btn-style-four" name="form-submit"><span class="txt"><?= $about->about_page_8_btn ?></span></button>
                                    </div>
                            </div>
                            
                        </div>
                    </form>
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
<?php echo $this->endSection() ?>

<?php echo $this->section('js') ?>
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
    <?php echo $this->endSection() ?>