<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>
<!--Page Title-->
<section class="page-title" style="background-image:url(<?= $service->service_page_1_img ? base_url('media/' . $service->service_page_1_img) : 'images/background/10.jpg' ?>);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1><?= $service->service_page_1_big_title ?></h1>
                    <span class="title"><?= $service->service_page_1_small_title ?></span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="<?= $service->service_page_1_bread_link ?>"><?= $service->service_page_1_bread_1 ?></a></li>
                    <li><?= $service->service_page_1_bread_2 ?></li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Specialize Section -->
    <section class="specialize-section">
        <div class="auto-container">
            <div class="sec-title">
                <span class="float-text"><?= $service->service_page_2_big_title ?></span>
                <h2><?= $service->service_page_2_small_title ?></h2>
            </div>

            <div class="services-carousel-two owl-carousel owl-theme">
                <!-- Service Block -->
                <?php 
                    if(isset($jasa)):
                        foreach($jasa as $j): 
                ?>
                <div class="service-block-two">
                    <div class="inner-box">
                        <div class="image-box"><figure class="image"><a href="<?= base_url($j->jasa_slug) ?>"><img  loading="lazy" src="<?= $j->jasa_img ? base_url('media/' . $j->jasa_img) : 'images/resource/service-4.jpg' ?>" alt="<?= $j->jasa_name ?>"></a></figure></div>
                        <div class="caption-box">
                            <h3><a href="<?= base_url($j->jasa_slug) ?>"><?= strtoupper($j->jasa_name) ?></a></h3>
                            <div class="link-box"><a href="<?= base_url($j->jasa_slug) ?>">Selengkapnya <i class="fa fa-angle-double-right"></i></a></div>
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
    <!-- End Specialize Section -->

     <!-- Fun Fact And Features -->
    <section class="fun-fact-and-features"  style="background-image: url(<?= $service->service_page_3_img ? base_url('media/' . $service->service_page_3_img) : 'images/background/3.jpg' ?>);">
        <div class="outer-box">
            <div class="auto-container">
                <!-- Fact Counter -->
                <div class="fact-counter">
                    <div class="row">
                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="<?= $service->service_page_3_num_1 ?>">0</span></div>
                                <h4 class="counter-title"><?= $service->service_page_3_text_1 ?></h4>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="<?= $service->service_page_3_num_2 ?>">0</span></div>
                                <h4 class="counter-title"><?= $service->service_page_3_text_2 ?></h4>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="<?= $service->service_page_3_num_3 ?>">0</span></div>
                                <h4 class="counter-title"><?= $service->service_page_3_text_3 ?></h4>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="1200ms">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="<?= $service->service_page_3_num_4 ?>">0</span></div>
                                <h4 class="counter-title"><?= $service->service_page_3_text_4 ?></h4>
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
                                <h3><a href="#"><?= $service->service_page_3_pros_1_title ?></a></h3>
                                <div class="text"><?= $service->service_page_3_pros_1_desc ?></div>
                                <!-- <div class="link-box"><a href="service-detail.html">Read More</a></div> -->
                            </div>
                        </div>

                        <!-- Feature Block -->
                        <div class="feature-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box"><span class="icon flaticon-plan"></span></div>
                                <h3><a href="#"><?= $service->service_page_3_pros_2_title ?></a></h3>
                                <div class="text"><?= $service->service_page_3_pros_2_desc ?></div>
                                <!-- <div class="link-box"><a href="service-detail.html">Read More</a></div> -->
                            </div>
                        </div>

                        <!-- Feature Block -->
                        <div class="feature-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box"><span class="icon flaticon-sketch-3"></span></div>
                                <h3><a href="#"><?= $service->service_page_3_pros_3_title ?></a></h3>
                                <div class="text"><?= $service->service_page_3_pros_3_desc ?></div>
                                <!-- <div class="link-box"><a href="service-detail.html">Read More</a></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Fun Fact Section -->

    <!-- Specialize Section -->
    <section class="specialize-section-two alternate">
        <div class="auto-container">
            <div class="row">
                <!-- Title Column -->
                <div class="title-column col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="float-text"><?= $service->service_page_4_big_title ?></span>
                            <h2><?= $service->service_page_4_med_title ?></h2>
                        </div>

                        <div class="text-box">
                            <h4><?= $service->service_page_4_small_title ?></h4>
                            <p><?= $service->service_page_4_desc ?></p>
                        </div>
                        <div class="link-box">
                            <!-- <a href="#">Read More <i class="fa fa-angle-double-right"></i></a> -->
                        </div>
                    </div>
                </div>

                <!-- Carousel Column -->
                <div class="carousel-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="carousel-outer">
                            <ul class="image-carousel owl-carousel owl-theme">
                                <?php 
                                    if(isset($slider)):
                                        foreach($slider as $s):
                                 ?>
                                    <li><a href="<?= $s->service_slider_img ? base_url('media/' . $s->service_slider_img) : 'images/resource/special-4.jpg' ?>" class="lightbox-image"><img  loading="lazy" src="<?= $s->service_slider_img ? base_url('media/' . $s->service_slider_img) : 'images/resource/special-4.jpg' ?>" alt="<?= $s->service_slider_alt ?>"></a></li>
                                <?php
                                        endforeach;
                                    endif; 
                                ?>
                            </ul>

                            <ul class="thumbs-carousel owl-carousel owl-theme">
                                <?php 
                                    if(isset($slider)):
                                        foreach($slider as $s): 
                                ?>
                                <li class="thumb-box">
                                    <figure><img  loading="lazy" src="<?= $s->service_slider_img ? base_url('media/' . $s->service_slider_img) : 'images/resource/special-4.jpg' ?>" alt=""></figure>
                                    <div class="overlay"><span class="icon fa fa-arrows-alt"></span></div>
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

        </div>
    </section>
    <!-- End Specialize Section -->

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="inner-container">
            <div class="sec-title">
                <span class="float-text"><?= $service->service_page_5_big_title ?></span>
                <h2><?= $service->service_page_5_med_title ?></h2>
            </div>

            <div class="row">
                <!-- Info Column -->
                <div class="info-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h4><?= $service->service_page_5_small_title ?></h4>
                        <ul class="contact-info">
                            <li><?= $service->service_page_5_det_1 ?></li>
                            <li><?= $service->service_page_5_det_2 ?></li>
                            <li><?= $service->service_page_5_det_3 ?></li>
                        </ul>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="form-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Contact Form -->
                        <div class="contact-form">
                            <style>
                                input[type="number"] {
                                    position: relative;
                                    display: block;
                                    width: 100%;
                                    font-size: 13px;
                                    color: #777777;
                                    line-height: 19px;
                                    padding: 10px 0px;
                                    background-color: transparent;
                                    font-weight: 400;
                                    height: 40px;
                                    border-bottom: 1px solid #e1e1e1;
                                    -webkit-transition: all 300ms ease;
                                    -moz-transition: all 300ms ease;
                                    -ms-transition: all 300ms ease;
                                    -o-transition: all 300ms ease;
                                    transition: all 300ms ease;
                                }
                            </style>
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12">
                                        <input type="text" name="nama" placeholder="Name" required>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <input type="number" name="telp" placeholder="No. Telepon">
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12">
                                        <input type="email" name="email" placeholder="Email" required>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12">
                                        <textarea name="pesan" placeholder="Pesan"></textarea>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12">
                                        <button class="theme-btn btn-style-three btn-send-form" type="button" name="submit-form"><?= $service->service_page_5_btn ?></button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Contact Section -->
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