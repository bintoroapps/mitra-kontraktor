<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>
<!--Page Title-->
<section class="page-title" style="background-image:url(<?= $header->project_page_1_img ? base_url('media/' . $header->project_page_1_img) :  base_url('images/background/10.jpg') ?>);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1><?= $header->project_page_1_big_title ?></h1>
                    <span class="title"><?= $header->project_page_1_small_title ?></span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="<?= $header->project_page_1_bread_link ?>"><?= $header->project_page_1_bread_1 ?></a></li>
                    <li><?= $header->project_page_1_bread_2 ?></li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!--Project Detail Section-->
    <section class="project-details-section">
        <div class="project-detail">
            <div class="auto-container">
                <!-- Upper Box -->
                <div class="upper-box">
                    <!--Project Tabs-->
                    <div class="project-tabs tabs-box clearfix">
                        <!--Tab Btns-->
                        <ul class="tab-btns tab-buttons clearfix">
                            <?php 
                                if(isset($image)):
                                    $no = 1;
                                    foreach($image as $i): 
                            ?>
                            <li data-tab="#tab-<?= $no ?>" class="tab-btn <?= $no == 1 ? 'active-btn' : '' ?>">
                                <img  loading="lazy" src="<?= $i->portfolio_images_name ? base_url('media/' . $i->portfolio_images_name) : base_url('images/resource/project-thumb-1.jpg') ?>" alt="<?= $project->portfolio_title ?>">
                            </li>
                            <?php 
                                        $no++;
                                    endforeach;
                                endif; 
                            ?>
                        </ul>

                        <!--Tabs Container-->
                        <div class="tabs-content">
                            <!--Tab / Active Tab-->
                            <?php 
                                if(isset($image)):
                                    $no = 1;
                                    foreach($image as $i): 
                            ?>
                            <div class="tab <?= $no == 1 ? 'active-tab' : '' ?>" id="tab-<?= $no ?>">
                                <figure class="image"><a href="<?= $i->portfolio_images_name ? base_url('media/' . $i->portfolio_images_name) : base_url('images/resource/project-single-1.jp') ?>" class="lightbox-image" data-fancybox="images"><img  loading="lazy" src="<?= $i->portfolio_images_name ? base_url('media/' . $i->portfolio_images_name) : base_url('images/resource/project-single-1.jp') ?>" alt="<?= $project->portfolio_title ?>"></a></figure>
                            </div>
                            <?php 
                                        $no++;
                                    endforeach;
                                endif; 
                            ?>
                        </div>
                    </div>
                    <?php if($btn_load): ?>
                    <button class="theme-btn btn-style-one btn-load-photo">Lihat Foto Selengkapnya</button>
                    <?php endif; ?>
                    <div class="row show-more-images"></div>
                </div>


                <!--Lower Content-->
                <div class="lower-content">
                    <div class="row clearfix">
                        <!--Content Column-->
                        <div class="content-column col-lg-8 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <h2><?= $detail->project_detail_page_3_title_1 ?></h2>
                                <p><?= $project->portfolio_description ?></p>
                                <h4><?= $detail->project_detail_page_4_title ?></h4>
                                <p><?= $project->portfolio_challenge ?></p>
                                <ul class="list-style-one">
                                    <?php 
                                        if(!empty(json_decode($project->portfolio_challenge_detail, true))):
                                            for($i = 0; $i <= count(json_decode($project->portfolio_challenge_detail, true)) - 1; $i++): 
                                    ?>
                                        <li><?= json_decode($project->portfolio_challenge_detail, true)[$i] ?></li>
                                    <?php
                                            endfor; 
                                        endif; ?>
                                </ul>
                                <h4><?= $detail->project_detail_page_5_title ?></h4>
                                <p><?= $project->portfolio_what_we_did ?></p>
                                <h4><?= $detail->project_detail_page_6_title ?></h4>
                                <p><?= $project->portfolio_result ?></p>
                            </div>
                        </div>

                        <!--Info Column-->
                        <div class="info-column col-lg-4 col-md-12 col-sm-12 ">
                            <div class="inner-column wow fadeInRight">
                                <h3><?= $detail->project_detail_page_3_title_2 ?></h3>
                                <p><?= $project->portfolio_information ?></p>
                                <ul class="info-list">
                                    <li><strong>Klien :</strong> <?= $project->portfolio_client ?></li>
                                    <li><strong>Lokasi :</strong> <?= $project->portfolio_location ?></li>
                                    <li><strong>Luas Area :</strong> <?= $project->portfolio_surface_area ?> m2</li>
                                    <li><strong>Tahun Selesai :</strong> <?= $project->portfolio_year_completed ?></li>
                                    <li><strong>Nilai :</strong> Rp <?= $project->portfolio_value ?></li>
                                    <li><strong>Arsitek :</strong> <?= $project->portfolio_architect ?></li>
                                </ul>

                                <!--Help Box-->
                                <div class="help-box-two">
                                    <div class="inner">
                                        <span class="title"><?= $detail->project_detail_page_7_small_title ?></span>
                                        <h2><?= $detail->project_detail_page_7_big_title ?></h2>
                                        <div class="text"><?= $detail->project_detail_page_7_desc ?></div>
                                        <a class="theme-btn btn-style-two" href="<?= $detail->project_detail_page_7_link ? $detail->project_detail_page_7_link : '#' ?>"><?= $detail->project_detail_page_7_btn ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Portfolio Details-->
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
<?= $this->endSection() ?>