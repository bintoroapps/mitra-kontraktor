<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>
<!--Page Title-->
<section class="page-title" style="background-image:url(<?= $about->about_page_1_img ? base_url('media/' . $about->about_page_1_img) : 'images/background/10.jpg' ?>);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1><?= $about->about_page_1_big_title ?></h1>
                    <span class="title"><?= $about->about_page_1_small_title ?></span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="<?= $about->about_page_1_bread_link ?>"><?= $about->about_page_1_bread_1 ?></a></li>
                    <li><?= $about->about_page_1_bread_2 ?></li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- About Section -->
    <section class="about-section" style="background-image: url(images/background/1.jpg);">
        <div class="auto-container">
            <div class="row no-gutters">
                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="title-box wow fadeInLeft" data-wow-delay='1200ms'>
                            <h2><?= $about->about_page_2_big_title ?></h2>
                        </div>
                        <div class="image-box wow fadeInRight" data-wow-delay='600ms'>
                            <figure class="alphabet-img"><img  loading="lazy" src="<?= $about->about_page_2_img_1 ? base_url('media/' .$about->about_page_2_img_1) : 'images/resource/alphabet-image.png' ?>" alt="<?= $about->about_page_2_img_1_alt ?>"></figure>
                            <figure class="image"><img  loading="lazy" src="<?= $about->about_page_2_img_2 ? base_url('media/' . $about->about_page_2_img_2) : 'images/resource/image-1.jpg' ?>" alt="<?= $about->about_page_2_img_2_alt ?>"></figure>
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInLeft">
                        <div class="content-box">
                            <div class="title">
                                <h2><?= $about->about_page_2_small_title ?></h2>
                            </div>
                            <div class="text"><?= $about->about_page_2_desc ?></div>
                            <div class="link-box"><a href="<?= $about->about_page_2_btn_link ?>" class="theme-btn btn-style-one"><?= $about->about_page_2_btn_text ?></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End About Section -->

    <!-- Fun Fact And Features -->
    <section class="fun-fact-and-features alternate"  style="background-image: url(<?= $about->about_page_3_img ? base_url('media/' . $about->about_page_3_img) : 'images/background/3.jpg' ?>);">
        <div class="outer-box">
            <div class="auto-container">
                <!-- Fact Counter -->
                <div class="fact-counter">
                    <div class="row">
                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="<?= $about->about_page_3_num_1 ?>">0</span></div>
                                <h4 class="counter-title"><?= $about->about_page_3_text_1 ?></h4>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="<?= $about->about_page_3_num_2 ?>">0</span></div>
                                <h4 class="counter-title"><?= $about->about_page_3_text_2 ?></h4>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="<?= $about->about_page_3_num_3 ?>">0</span></div>
                                <h4 class="counter-title"><?= $about->about_page_3_text_3 ?></h4>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="1200ms">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="<?= $about->about_page_3_num_4 ?>">0</span></div>
                                <h4 class="counter-title"><?= $about->about_page_3_text_4 ?></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features -->
                <div class="features">
                    <div class="row">
                        <!-- Feature Block -->
                        <div class="feature-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box"><span class="icon flaticon-decorating"></span></div>
                                <h3><a href="#"><?= $about->about_page_3_pros_1_title ?></a></h3>
                                <div class="text"><?= $about->about_page_3_pros_1_desc ?></div>
                                <!-- <div class="link-box"><a href="service-detail.html">Read More</a></div> -->
                            </div>
                        </div>

                        <!-- Feature Block -->
                        <div class="feature-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box"><span class="icon flaticon-plan"></span></div>
                                <h3><a href="#"><?= $about->about_page_3_pros_2_title ?></a></h3>
                                <div class="text"><?= $about->about_page_3_pros_2_desc ?></div>
                                <!-- <div class="link-box"><a href="service-detail.html">Read More</a></div> -->
                            </div>
                        </div>

                        <!-- Feature Block -->
                        <div class="feature-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box"><span class="icon flaticon-sketch-3"></span></div>
                                <h3><a href="#"><?= $about->about_page_3_pros_3_title ?></a></h3>
                                <div class="text"><?= $about->about_page_3_pros_3_desc ?></div>
                                <!-- <div class="link-box"><a href="service-detail.html">Read More</a></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Fun Fact Section -->

    <!-- Testimonial Section Two-->
    <section class="testimonial-section-two">
        <div class="auto-container">
            <div class="sec-title">
                <span class="float-text"><?= $about->about_page_4_big_title ?></span>
                <h2><?= $about->about_page_4_small_title ?></h2>
            </div>

            <div class="testimonial-carousel-two owl-carousel owl-theme">
                <!-- Testimonial block two -->
                <?php 
                    if(isset($testimonials)):
                        foreach($testimonials as $t): 
                ?>
                <div class="testimonial-block-two">
                    <div class="inner-box">
                        <div class="text"><?= $t->portfolio_testimonial ?></div>
                        <div class="info-box">
                            <div class="thumb"><img  loading="lazy" src="<?= $t->portfolio_client_photo ? base_url('media/' . $t->portfolio_client_photo) : 'images/resource/thumb-2.jpg' ?>" alt="<?= $t->portfolio_client_photo_alt ?>"></div>
                            <h5 class="name"><?= $t->portfolio_client ?></h5>
                            <span class="date"><?= \App\Controllers\Template::bulan(date('m', strtotime($t->portfolio_created)))  ?> <?= date('d - Y', strtotime($t->portfolio_created)) ?></span>
                        </div>
                    </div>
                </div>
                <?php
                        endforeach; 
                    endif; 
                ?>
            </div>
        </div>
    </section>
    <!--End Testimonial Section Two-->

    <!--Clients Section-->
    <section class="clients-section style-two">
        <div class="auto-container">
            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <?php 
                        if(isset($client_logo)):
                            foreach($client_logo as $c): 
                    ?>
                    <li class="slide-item"><figure class="image-box"><a href="<?= base_url('projects/' . $porfolio_slug) ?>"><img  loading="lazy" src="<?= $c->portfolio_client_logo ? base_url('media/' .$c->portfolio_client_logo) : 'images/clients/1.png' ?>" alt="<?= $c->portfolio_client_logo_alt ?>"></a></figure></li>
                    <?php
                            endforeach; 
                        endif; 
                    ?>
                </ul>
            </div>
        </div>
    </section>
    <!--End Clients Section-->

     <!-- Process Section -->
    <section class="process-section" style="background-image: url(<?= $about->about_page_6_img ? base_url('media/' . $about->about_page_6_img) : 'images/background/8.jpg' ?>);">
        <div class="auto-container">
            <div class="sec-title light">
                <span class="float-text"><?= $about->about_page_6_big_title ?></span>
                <h2><?= $about->about_page_6_small_title ?></h2>
            </div>
            <div class="row">
                <!-- Process Block -->
                <div class="process-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <span class="count">01</span>
                        <h4><a href="#"><?= $about->about_page_6_title_1 ?></a></h4>
                        <div class="text"><?= $about->about_page_6_desc_1 ?></div>
                        <!-- <div class="link-box"><a href="service-detail.html">Read More</a></div> -->
                    </div>
                </div>
                <div class="process-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <span class="count">02</span>
                        <h4><a href="#"><?= $about->about_page_6_title_2 ?></a></h4>
                        <div class="text"><?= $about->about_page_6_desc_2 ?></div>
                        <!-- <div class="link-box"><a href="service-detail.html">Read More</a></div> -->
                    </div>
                </div>
                <div class="process-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <span class="count">03</span>
                        <h4><a href="#"><?= $about->about_page_6_title_3 ?></a></h4>
                        <div class="text"><?= $about->about_page_6_desc_3 ?></div>
                        <!-- <div class="link-box"><a href="service-detail.html">Read More</a></div> -->
                    </div>
                </div>
                <div class="process-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <span class="count">04</span>
                        <h4><a href="#"><?= $about->about_page_6_title_4 ?></a></h4>
                        <div class="text"><?= $about->about_page_6_desc_4 ?>></div>
                        <!-- <div class="link-box"><a href="service-detail.html">Read More</a></div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Process Section -->

    <!-- Team Section -->
    <section class="team-section">
        <div class="auto-container">
            <div class="sec-title">
                <span class="float-text"><?= $about->about_page_7_big_title ?></span>
                <h2><?= $about->about_page_7_small_title ?></h2>
            </div>

            <div class="row clearfix">
                <!-- Team Block -->
                <?php 
                    if(isset($team)):
                        foreach($team as $t): 
                ?>
                <div class="team-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <div class="image"><a href="<?= base_url('team') ?>"><img  loading="lazy" src="<?= $t->team_image ? base_url('media/' . $t->team_image) : 'images/resource/team-1.jpg' ?>" alt="<?= $t->team_image_alt ?>"></a></div>
                            <ul class="social-links">
                                <li><a href="<?= $t->team_facebook ? $t->team_facebook : '#' ?>"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="<?= $t->team_twitter ? $t->team_twitter : '#' ?>"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="<?= $t->team_google_plus ? $t->team_google_plus : '#' ?>"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="<?= $t->team_instagram ? $t->team_instagram : '#' ?>"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="<?= $t->team_whatsapp ? $t->team_whatsapp : '#' ?>"><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                            <h3 class="name"><a href="<?= base_url('team') ?>"><?= $t->team_name ?></a></h3>
                        </div>
                        <span class="designation"><?= $t->team_role ?></span>
                    </div>
                </div>
                <?php
                        endforeach; 
                    endif; 
                ?>

            </div>
        </div>
    </section>
    <!--End Team Section -->

    <!-- Offer Section -->
    <section class="offer-section" style="background-image: url(<?= $about->about_page_8_img ? base_url('media/' . $about->about_page_8_img) : 'images/background/6.jpg' ?>);">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <span class="title"><?= $about->about_page_8_small_title ?></span>
                        <h2><?= $about->about_page_8_big_title ?></h2>
                        <span class="discount"><?= $about->about_page_8_num ?></span>
                        <div class="text"><?= $about->about_page_8_desc ?></div>
                    </div>
                </div>

                <div class="form-column order-last col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="discount-form">
                            <!--Comment Form-->
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
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="text" name="nama" placeholder="Nama" required>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Email" required>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="number" name="telp" placeholder="No. Telp" required>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="pesan" placeholder="Pesan"></textarea>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group text-center">
                                        <button type="button" class="theme-btn btn-style-one btn-send-form" name="submit-form"><?= $about->about_page_8_btn ?></button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Offer Section -->

    <!-- Video Section -->
    <section class="video-section style-two">
        <div class="outer-box">
            <div class="auto-container">
                <div class="row">
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title">
                                <span class="float-text"><?= $about->about_page_9_big_title ?></span>
                                <h2><?= $about->about_page_9_med_title ?></h2>
                            </div>
                            <span class="title"><?= $about->about_page_9_small_title ?></span>
                            <div class="text"><?= $about->about_page_9_desc ?></div>
                        </div>
                    </div>

                    <!-- Video Column -->
                    <div class="video-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="video-box">
                                 <figure class="image"><img  loading="lazy" src="<?= $about->about_page_9_img_1 ? base_url('media/' . $about->about_page_9_img_1) : 'images/resource/video-img.jpg' ?>" alt="<?= $about->about_page_9_img_1_alt ?>">
                                    <a href="<?= $about->about_page_9_video ? $about->about_page_9_video : '#' ?>" class="link" data-fancybox="gallery" data-caption=""><span class="icon fa fa-play"></span></a>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Video Section -->
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