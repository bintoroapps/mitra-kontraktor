<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>
<!--Page Title-->
<section class="page-title" style="background-image:url(<?= $service->service_detail_page_1_img ? base_url('media/' . $service->service_detail_page_1_img)  :  base_url('images/background/10.jpg') ?>);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1><?= $service->jasa_name ?></h1>
                    <span class="title"><?= $service->service_detail_page_1_small_title ?></span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="<?= $service->service_detail_page_1_bread_link  ?>"><?= $service->service_detail_page_1_bread_1 ?></a></li>
                    <li><?= $service->service_detail_page_1_bread_2 ?></li>
                </ul>
            </div>
        </div>
    </section>
     <!--End Page Title-->
    <!-- Section 2 -->
    <style>
        .upper-box-special::before {
            background-color:unset !important;
        }
    </style>
    <section class="services-section">
        <div class="upper-box upper-box-special" style="background-image: url(<?= $service->service_detail_page_2_img ? base_url('media/' . $service->service_detail_page_2_img) : base_url('images/background/2.jpg') ?>); padding-bottom: 100px;">
            <div class="auto-container">
                <div class="sec-title text-center light">
                    <h2><?= $service->service_detail_page_2_big_title ?></h2>
                    <p class="mt-3 text-white"><?= $service->service_detail_page_2_small_title ?></p>
                </div>
                <div class="sec-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 text-center mb-2">
                            <a href="<?= $service->service_detail_page_2_btn_1_link ?>" class="theme-btn btn-style-one" target="_blank"><?= $service->service_detail_page_2_btn_1_text ?></a>
                        </div>
                        <div class="col-md-4 col-sm-12 text-center mb-2">
                            <a href="<?= $service->service_detail_page_2_btn_2_link ?>" class="theme-btn btn-style-one" target="_blank"><?= $service->service_detail_page_2_btn_2_text ?></a>
                        </div>
                        <div class="col-md-4 col-sm-12 text-center mb-2">
                            <a href="<?= $service->service_detail_page_2_btn_3_link ?>" class="theme-btn btn-style-one"><?= $service->service_detail_page_2_btn_3_text ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Section 2 -->
    <!-- Project Section -->
    <section class="projects-section">
        <div class="auto-container">
            <div class="sec-title text-right">
                <span class="float-text"><?= $service->service_detail_page_3_big_title ?></span>
                <h2><?= $service->service_detail_page_3_small_title ?></h2>
            </div>
        </div>

        <div class="inner-container">
            <div class="projects-carousel owl-carousel owl-theme">
                <!-- Project Block -->
                <?php 
                    if(isset($portfolio)):
                        foreach($portfolio as $p):
                ?>
                <div class="project-block">
                    <div class="image-box">
                        <figure class="image"><img  loading="lazy" src="<?= $p->portfolio_main_image ? base_url('media/' . $p->portfolio_main_image) : 'images/gallery/1.jpg' ?>" alt="<?= $p->portfolio_main_image_alt ?>"></figure>
                        <div class="overlay-box">
                            <h4><a href="<?= base_url('projects/' . $p->portfolio_slug) ?>"><?= $p->portfolio_title ?> <br>Project</a></h4>
                            <div class="btn-box">
                                <a href="<?= $p->portfolio_main_image ? base_url('media/' . $p->portfolio_main_image) : 'images/gallery/1.jpg' ?>" alt="<?= $p->portfolio_main_image_alt ?>" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                <a href="<?= base_url('projects/' . $p->portfolio_slug) ?>"><i class="fa fa-external-link"></i></a>
                            </div>
                            <span class="tag"><?= $p->portfolio_client ?></span>
                        </div>
                    </div>
                </div>
                <?php
                        endforeach;
                    endif;
                ?>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                <a href="<?= base_url('projects') ?>" class="theme-btn btn-style-one">All Projects</a>
                </div>
            </div>
        </div>
    </section>
    <!--End Project Section -->
    <!-- Apa kata customer kami Section -->
    <section class="team-section">
        <div class="auto-container">
            <div class="sec-title text-right">
                <span class="float-text"><?= $service->service_detail_page_4_big_title ?></span>
                <h2><?= $service->service_detail_page_4_small_title ?></h2>
            </div>>

            <div class="row clearfix">
                <?php 
                    if(isset($video)): 
                        foreach($video as $v):
                ?>
                <div class="col-md-6 col-sm-12">
                   <?= $v->service_testimoni_video ?>
                </div>
                <?php
                        endforeach;
                    endif; 
                ?>
            </div>
        </div>
    </section>
    <!--End Apa kata customer kami Section -->
    <!-- Paket Harga Section -->
    <section class="team-section">
        <div class="auto-container">
            <div class="sec-title text-right">
                <span class="float-text"><?= $service->service_detail_page_5_big_title ?></span>
                <h2><?= $service->service_detail_page_5_small_title ?></h2>
            </div>
            <div class="sec-title text-center">
                <p style="font-size:14px;"><?= $service->service_detail_page_5_desc ?></p>
            </div>

            <div class="row clearfix">
                <div class="col-12">
                <div class="table-responsive">
                <table class="table">
                    <thead style="background-color: #ff8a00; color:white;">
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Luasan Rumah</th>
                        <th scope="col">Paket Minimalis</th>
                        <th scope="col">Paket Plus IMB</th>
                        <th scope="col">Paket Ekslusif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if(isset($price)):
                                $no = 1;
                                foreach($price as $p): 
                        ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $p->service_price_luasan_rumah ?></td>
                            <td>Rp <?= $p->service_price_paket_minimalis ?></td>
                            <td>Rp <?= $p->service_price_paket_plus_imb ?></td>
                            <td>Rp <?= $p->service_price_paket_ekslusif ?></td>
                        </tr>
                        <?php 
                            $no++;
                            endforeach;
                            endif; 
                        ?>
                    </tbody>
                </table>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Paket Harga Section -->
    <!-- Process Section -->
    <section class="process-section pb-5" style="background-image: url(<?= $service->service_detail_page_6_img ? base_url('media/' . $service->service_detail_page_6_img) : base_url('images/background/8.jpg') ?>);">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h2 class="text-center"><?= $service->service_detail_page_6_big_title ?></h2>
                </div>
                <div class="col-md-6 col-sm-12">
                    <?= $service->service_detail_page_6_desc ?>
                </div>
            </div>
        </div>
    </section>
    <!--End Process Section -->
    <!-- Big Logo Section -->
    <section class="fun-fact-section pt-4 pb-4">
        <div class="outer-box" style="background-image: url(<?= $service->service_detail_page_7_img ? base_url('media/' . $service->service_detail_page_7_img) :  base_url('media/architect-gede.png') ?>); background-size:contain; background-attachment:inherit;">
            <div class="auto-container">
                <div class="fact-counter">
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Big Logo Section -->
    <!-- Fun Fact Section -->
    <section class="fun-fact-section">
        <div class="outer-box" style="background-image: url(<?= $service->service_detail_page_8_img ? base_url('media/' . $service->service_detail_page_8_img) : base_url('images/background/3.jpg') ?>);">
            <div class="auto-container">
                <div class="fact-counter">
                    <div class="row">
                        <div class="col-12">
                            <p style="font-size: 15px;"><?= $service->service_detail_page_8_desc ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Fun Fact Section -->
    <!-- CTA Section -->
    <section class="team-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-md-8 col-sm-12 bg-light pt-5 pb-5">
                        <div class="row">
                            <div class="col-3">
                                <div class="text-center rounded-circle float-right" style="background-color: #ff8a00; padding-top:10px; padding-bottom:10px; width:69px; height:72px;">
                                    <p class="text-white" style="font-size: 28px; padding-top:16%;"><span class="icon flaticon-telephone"></span></p>
                                </div>
                            </div>
                            <div class="col-7">
                                <h4><?= $service->service_detail_page_9_big_title ?></h4>
                                <p class="mt-2"><?= $service->service_detail_page_9_desc ?></p>
                            </div>
                        </div>
                </div>
                <div class="col-md-4 col-sm-12 text-center">
                    <a href="<?= $service->service_detail_page_9_btn_link ?>" class="theme-btn btn-style-one" target="_blank" style="margin-top: 17%;"><?= $service->service_detail_page_9_btn_text ?></a>
                </div>
            </div>
        </div>
    </section>
    <!-- End CTA Section -->
    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="auto-container">
            <div class="row">
                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image-box">
                            <figure class="image"><img  loading="lazy" src="<?= $service->service_detail_page_13_img_1 ? base_url('media/' . $service->service_detail_page_13_img_1) : 'images/resource/faq-img.jpg' ?>" alt="<?= $service->service_detail_page_13_img_1_alt ?>"></figure>
                        </div>
                    </div>
                </div>

                <div class="accordion-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="float-text"><?= $service->service_detail_page_13_big_title ?></span>
                            <h2><?= $service->service_detail_page_13_small_title ?></h2>
                        </div>
                        <ul class="accordion-box">
                            <!--Block-->
                            <?php 
                                if(isset($faqs)):
                                    foreach($faqs as $f): 
                            ?>
                            <li class="accordion block">
                                <div class="acc-btn"><?= $f->faq_jasa_question ?> <div class="icon fa fa-plus-square"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text"><?= $f->faq_jasa_answer ?></div>
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
    <!--End FAQ Section -->
    <!-- Fun Fact And Features -->
    <section class="fun-fact-and-features alternate"  style="background-image: url(<?= $service->service_detail_page_10_img ? base_url('media/' . $service->service_detail_page_10_img) :  base_url('images/background/3.jpg') ?>);">
        <div class="outer-box">
            <div class="auto-container">
                <!-- Fact Counter -->
                <div class="fact-counter">
                    <div class="row">
                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="<?= $service->service_detail_page_10_num_1 ?>">0</span></div>
                                <h4 class="counter-title"><?= $service->service_detail_page_10_text_1 ?></h4>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="<?= $service->service_detail_page_10_num_2 ?>">0</span></div>
                                <h4 class="counter-title"><?= $service->service_detail_page_10_text_2 ?></h4>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="<?= $service->service_detail_page_10_num_3 ?>">0</span></div>
                                <h4 class="counter-title"><?= $service->service_detail_page_10_text_3 ?></h4>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="1200ms">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="<?= $service->service_detail_page_10_num_4 ?>">0</span></div>
                                <h4 class="counter-title"><?= $service->service_detail_page_10_text_4 ?></h4>
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
                                <h3><a href="#"><?= $service->service_detail_page_10_pros_1_title ?></a></h3>
                                <div class="text"><?= $service->service_detail_page_10_pros_1_desc ?></div>
                                <!-- <div class="link-box"><a href="service-detail.html">Read More</a></div> -->
                            </div>
                        </div>

                        <!-- Feature Block -->
                        <div class="feature-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box"><span class="icon flaticon-plan"></span></div>
                                <h3><a href="#"><?= $service->service_detail_page_10_pros_2_title ?></a></h3>
                                <div class="text"><?= $service->service_detail_page_10_pros_2_desc ?></div>
                                <!-- <div class="link-box"><a href="service-detail.html">Read More</a></div> -->
                            </div>
                        </div>

                        <!-- Feature Block -->
                        <div class="feature-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box"><span class="icon flaticon-sketch-3"></span></div>
                                <h3><a href="#"><?= $service->service_detail_page_10_pros_3_title ?></a></h3>
                                <div class="text"><?= $service->service_detail_page_10_pros_3_desc ?></div>
                                <!-- <div class="link-box"><a href="service-detail.html">Read More</a></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Fun Fact Section -->
    <!-- Process Section -->
    <section class="process-section pb-5" style="background-image: url(<?= $service->service_detail_page_11_img ? base_url('media/' .$service->service_detail_page_11_img) : base_url('images/background/8.jpg') ?>);">
        <div class="auto-container pb-5">
            <div class="sec-title text-right light">
                <span class="float-text"><?= $service->service_detail_page_11_big_title ?></span>
                <h2><?= $service->service_detail_page_11_small_title ?></h2>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 mb-5">
                    <div class="text-center rounded-circle mx-auto" style="background-color: #ff8a00; padding-top:10px; padding-bottom:10px; width:69px; height:72px;">
                        <p class="text-white" style="font-size: 28px; padding-top:16%;"><span class="icon flaticon-maps-and-flags"></span></p>
                    </div>
                    <h5 class="text-center text-white mt-4"><?= $service->service_detail_page_11_title_1 ?></h5>
                    <h6 class="text-center text-white mt-2"><?= $service->service_detail_page_11_desc_1 ?></h6>
                </div>
                <div class="col-md-6 col-sm-12 mb-5">
                    <div class="text-center rounded-circle mx-auto" style="background-color: #ff8a00; padding-top:10px; padding-bottom:10px; width:69px; height:72px;">
                        <p class="text-white" style="font-size: 28px; padding-top:16%;"><span class="icon flaticon-maps-and-flags"></span></p>
                    </div>
                    <h5 class="text-center text-white mt-4"><?= $service->service_detail_page_11_title_2 ?></h5>
                    <h6 class="text-center text-white mt-2"><?= $service->service_detail_page_11_desc_2 ?></h6>
                </div>
            </div>
        </div>
    </section>
    <!--End Process Section -->
    <!-- Services Section -->
    <section class="services-section">
        <div class="upper-box" style="background-image: url(<?= $service->service_detail_page_12_img ? base_url('media/' . $service->service_detail_page_12_img) : base_url('images/background/2.jpg') ?>);">
            <div class="auto-container">
                <div class="sec-title text-right light">
                    <span class="float-text"><?= $service->service_detail_page_12_big_title ?></span>
                    <h2><?= $service->service_detail_page_12_small_title ?></h2>
                </div>
            </div>
        </div>

        <div class="services-box">
            <div class="auto-container">
                <div class="services-carousel owl-carousel owl-theme">
                    <!-- Service Block -->
                    <?php 
                        if(isset($jasa)):
                            foreach($jasa as $j): 
                    ?> 
                    <div class="service-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="service-detail.html"><img  loading="lazy" src="<?= $j->jasa_img ? base_url('media/' . $j->jasa_img) : 'images/resource/service-1.jpg' ?>" alt="<?= $j->jasa_img_alt ?>"></a></figure>
                            </div>
                            <div class="lower-content">
                                <h3><a href="<?= base_url($j->jasa_slug) ?>"><?= $j->jasa_name ?></a></h3>
                                <div class="text"><?= $j->jasa_desc ?></div>
                                <div class="link-box">
                                    <a href="<?= base_url($j->jasa_slug) ?>">Selengkapnya<i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                            endforeach; 
                        endif; 
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!--End Services Section -->
<?= $this->endSection() ?>