<?php echo $this->extend('template/main-detail') ?>

<?php echo $this->section('content') ?>
    <!-- Page Title -->
    <section class="page-title" style="background-image:url(<?= $header->project_page_1_img ? base_url('media/' . $header->project_page_1_img) :  base_url('images/background/10.jpg') ?>);">
        <div class="auto-container">
            <h1><?= $header->project_page_1_big_title ?></h1>
            <span class="title"><?= $header->project_page_1_small_title ?></span>
            <ul class="page-breadcrumb">
                <li><a href="<?= $header->project_page_1_bread_link ?>"><?= $header->project_page_1_bread_1 ?></a></li>
                <li><?= $header->project_page_1_bread_2 ?></li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->
    
    <!-- Gallery Detail Section -->
    <section class="gallery-detail-section">
        <div class="auto-container">
            <div class="inner-container">
                <div class="inner-box">
                    <div class="carousel-boxed">
                        <div class="single-item-carousel owl-carousel owl-theme">
                            <?php 
                                if(isset($image)):
                                    $no = 1;
                                    foreach($image as $i): 
                            ?>
                            <div class="slide">
                                <div class="image">
                                    <img src="<?= $i->portfolio_images_name ? base_url('media/' . $i->portfolio_images_name) : base_url('images/resource/project-thumb-1.jpg') ?>" alt="<?= $project->portfolio_title ?>" />
                                </div>
                            </div>
                             <?php 
                                 $no++;
                                 endforeach;
                                 endif; 
                            ?>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="title"><?= $detail->project_detail_page_3_title_1 ?></div>
                        <h2><?= $detail->project_detail_page_3_title_1 ?></h2>
                        <div class="row clearfix">
                            <div class="column col-lg-8 col-md-12 col-sm-12">
                                <p><?= $project->portfolio_description ?></p>
                               
                            </div>
                            <div class="column col-lg-4 col-md-12 col-sm-12">
                                <div class="project-info-boxed">
                                     <h3><?= $detail->project_detail_page_3_title_2 ?></h3>
                                    <p><?= $project->portfolio_information ?></p>
                                    <ul>
                                        <li><span>Client:</span><?= $project->portfolio_client ?></li>
                                        <li><span>Location:</span><?= $project->portfolio_location ?></li>
                                        <li><span>Area:</span><?= $project->portfolio_surface_area ?></li>
                                        <li><span>Finish Date:</span><?= $project->portfolio_year_completed ?></li>
                                        <li><span>Value:</span>Rp <?= $project->portfolio_value ?></li>
                                        <li><span>Construtor:</span><?= $project->portfolio_architect ?></li>
                                    </ul>
                                </div>
                                <br>
                             <div class="solution-box" style="background-image:url(images/resource/solution.jpg)">
                            <div class="inner">
                                <div class="title"><?= $detail->project_detail_page_7_small_title ?></div>
                                <h2><?= $detail->project_detail_page_7_big_title ?></h2>
                                <div class="text"><?= $detail->project_detail_page_7_desc ?></div>
                                <a class="solution-btn theme-btn" href="<?= $detail->project_detail_page_7_link ? $detail->project_detail_page_7_link : '#' ?>"><?= $detail->project_detail_page_7_btn ?></a>
                            </div>
                        </div>
                            </div>
                        </div>
                        <h3><?= $detail->project_detail_page_4_title ?></h3>
                        <p><?= $project->portfolio_challenge ?></p>
                        <div class="row clearfix">
                            <div class="column col-lg-5 col-md-12 col-sm-12">
                                <h3>What We Did</h3>
                                <p><?= $project->portfolio_what_we_did ?></p>
                                <h3><?= $detail->project_detail_page_6_title ?></h3>
                                <p><?= $project->portfolio_result ?></p>
                            </div>
                            <div class="column col-lg-7 col-md-12 col-sm-12">
                                <div class="chart-image">
                                    <img src="images/resource/chart.png" alt="" />
                                </div>
                            </div>
                        </div>
                        <p>importance of working collaboratively. Working as one team, we’ve been able to focus on attacking costs, improving customer service, and managing continuous improvement across all aspects of our operations.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Gallery Detail Section -->
    
    <!-- Project Related Section -->
    <section class="project-related-section">
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
                    Related Project
                </div>
                <h2>Our More Projects Check <br> Now Dears</h2>
            </div>
            
            <div class="three-item-carousel owl-carousel owl-theme">
                                
                <!-- Gallery Block -->
                <div class="gallery-block">
                    <div class="inner-box">


                        <figure class="image-box">
                    <?php 
                        if(isset($all_project)):
                            $no = 1;
                            foreach($all_project as $a): 
                    ?>
                            <img src="<?= $a->portfolio_main_image ? base_url('media/' . $a->portfolio_main_image) : base_url('images/gallery/2-7.jpg') ?>" alt="">
                            <!-- Overlay Box -->
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="content">
                                        <h6><a href="<?= base_url('projects/' . $a->portfolio_slug) ?>"><?= $a->portfolio_title ?></a></h6>
                                        <div class="category"><?= ucwords(strtolower($a->portfolio_category_name)) ?></div>
                                    </div>
                                </div>
                            </div>
                            <a href="https://via.placeholder.com/370x370" data-fancybox="gallery-1" data-caption="" class="link"><span class="icon flaticon-full-screen"></span></a>
                     <?php
                       $no++;
                        endforeach;
                        endif; 
                        ?>
                        </figure>

     
                    </div>
                </div>
                
            </div>
            
        </div>
    </section>
    <!-- End Project Related Section -->
    
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

<?= $this->section('js') ?>
<script>
 $(document).ready(function() {
     $('.btn-load-photo').on('click', function() {
         $.ajax({
            type: 'get',
            url: "<?= base_url('projectsimageloadmore') ?>",
            data: {
                id_project: "<?= $project->portfolio_id ?>"
            },
            beforeSend() {
                $('.btn-load-photo').text('loading...')
            },
            success(response) {
                $('.show-more-images').html(response)
                $('.btn-load-photo').remove()
            }
         })
     })
 })   
</script>
<?php echo $this->endSection() ?>