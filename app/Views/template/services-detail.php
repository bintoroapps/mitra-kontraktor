<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>
<!-- Page Title -->
    <section class="page-title" style="background-image:url(<?= $service->service_detail_page_1_img ? base_url('media/' . $service->service_detail_page_1_img)  :  base_url('images/background/10.jpg') ?>);">
        <div class="auto-container">
             <h1><?= $service->jasa_name ?></h1>
             <span class="title"><?= $service->service_detail_page_1_small_title ?></span>
            <ul class="page-breadcrumb">
                <li><a href="<?= $service->service_detail_page_1_bread_link  ?>"><?= $service->service_detail_page_1_bread_1 ?></a></li>
                <li><?= $service->service_detail_page_1_bread_2 ?></li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->
    
    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container left-sidebar">
        <div class="auto-container">
            <div class="row clearfix">
                
                <!-- Sidebar Side -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar sticky-top">
                                                             <?php 
                                        if(isset($jasa)):
                                            foreach($jasa as $j): 
                                    ?>
                        <!-- Categories Widget -->
                        <div class="sidebar-widget categories-widget">
                            <div class="widget-content">
                                <ul class="blog-cat">

                                    <li><a href="<?= base_url($j->jasa_slug) ?>"><?= strtoupper($j->jasa_name) ?></a></li>
                                    <?php
                                        endforeach; 
                                        endif; 
                                    ?> 
                                </ul>
                            </div>
                        </div>
                        
                        <!-- Brochures Widget -->
                        <div class="sidebar-widget brochures-widget">
                            <div class="widget-content">
                                <div class="sidebar-title">
                                    <h3><?= $service->service_detail_page_2_big_title ?></h3>
                                </div>
                                <div class="text"><?= $service->service_detail_page_2_small_title ?></div>
                                
                                <!-- Broucher Box -->
                                <div class="broucher-box">
                                    <a href="#" class="overlay-link"></a>
                                    <div class="broucher-inner">
                                        <span class="file-icon fa fa-whatsapp"></span>
                                        <?= $service->service_detail_page_2_btn_1_text ?>
                                    </div>
                                </div>
                                
                                <!-- Broucher Box -->
                                <div class="broucher-box">
                                    <a href="#" class="overlay-link"></a>
                                    <div class="broucher-inner">
                                        <span class="file-icon fa fa-check"></span>
                                        <?= $service->service_detail_page_2_btn_2_text ?>
                                    </div>
                                </div>
                                
                                <!-- Broucher Box -->
                                <div class="broucher-box">
                                    <a href="#" class="overlay-link"></a>
                                    <div class="broucher-inner">
                                        <span class="file-icon fa fa-phone"></span>
                                        <?= $service->service_detail_page_2_btn_3_text ?>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <!-- Contact Widget -->
                        <div class="sidebar-widget contact-widget">
                            <div class="widget-content">
                                <div class="sidebar-title">
                                    <h3>Contact</h3>
                                </div>
                                
                                <ul>
                                    <li>
                                        <span class="icon flaticon-road-sign"></span>
                                        <strong>Address</strong>
                                        <?= $company->company_address ?>
                                    </li>
                                    <li>
                                        <span class="icon flaticon-email-6"></span>
                                        <strong>Send Your Mail At</strong>
                                        <a href="mailto:<?= $company->company_email ?>"><?= $company->company_email ?></a>
                                    </li>
                                    <li>
                                        <span class="icon flaticon-clock-4"></span>
                                        <strong>Working Hours</strong>
                                        <?= $company->company_workinghours ?>
                                    </li>
                                </ul>
                                
                            </div>
                        </div>
                        
                    </aside>
                </div>
                


                <!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="service-detail">
                        <div class="inner-box">
                            <div class="image">
                                <img src="<?php echo $service->jasa_img ? base_url('media/' . $service->jasa_img) : base_url('images/logo-2.png') ?>" alt="" />
                            </div>
                            <div class="lower-content">
                                <div class="icon-box">
                                    <span class="icon flaticon-null-3"></span>
                                </div>
                                <h3><?php echo $service->jasa_name ?></h3>
                                <div class="text">
                                    <p><?php echo $service->jasa_desc?></p>
                                    <div class="row clearfix">
                                         
                                            <div class="auto-container">
                                                <div class="sec-title text-right">
                                                    <span class="float-text"><?php echo $service->service_detail_page_5_big_title ?></span>
                                                    <h2><?php echo $service->service_detail_page_5_small_title ?></h2>
                                                </div>
                                                <div class="sec-title text-center">
                                                    <p ><?php echo $service->service_detail_page_5_desc ?></p>
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
                             
                                    </div>

                                       
                                </div>
                            </div>
                        </div>
                        

                        
                    </div>
                </div>

                
            </div>
        </div>
    </div>
        <!-- Project Related Section -->

        <div class="auto-container" style="margin-top: -100px;">
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
                    <?= $service->service_detail_page_3_big_title ?>
                </div>
                <h2><?= $service->service_detail_page_3_small_title ?></h2>
            </div>
            
            <div class="three-item-carousel owl-carousel owl-theme">
                
                <!-- Gallery Block -->
                  <?php 
                    if(isset($portfolio)):
                        foreach($portfolio as $p):
                ?>
                <div class="gallery-block">
                    <div class="inner-box">

                        <figure class="image-box">
                            <img src="<?= $p->portfolio_main_image ? base_url('media/' . $p->portfolio_main_image) : 'images/gallery/1.jpg' ?>" alt="<?= $p->portfolio_main_image_alt ?>">
                            <!-- Overlay Box -->
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="content">
                                        <h6><a href="<?= base_url('projects/' . $p->portfolio_slug) ?>"><?= $p->portfolio_title ?></a></h6>
                                        <div class="category"><?= $p->portfolio_client ?></div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= $p->portfolio_main_image ? base_url('media/' . $p->portfolio_main_image) : 'images/gallery/1.jpg' ?>" data-fancybox="gallery-1" data-caption="" class="link"><span class="icon flaticon-full-screen"></span></a>
                        </figure>
                    </div>
                </div>
                  <?php
                    endforeach;
                    endif;
                ?>
            
            </div>
             <a href="<?= base_url('projects') ?>" class="theme-btn btn-style-one" style="margin-left: 500px;">All Projects</a>
        </div>

    <!-- End Project Related Section -->
        <!-- Apa kata customer kami Section -->
 
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

    <!--End Apa kata customer kami Section -->
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