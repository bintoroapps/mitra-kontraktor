<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>
<!--Page Title-->
<section class="page-title" style="background-image:url(<?= $team->team_page_1_img ? base_url('media/' . $team->team_page_1_img) : 'images/background/10.jpg' ?>);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1><?= $team->team_page_1_big_title ?></h1>
                    <span class="title"><?= $team->team_page_1_small_title ?></span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="<?= $team->team_page_1_bread_link ?>"><?= $team->team_page_1_bread_1 ?></a></li>
                    <li><?= $team->team_page_1_bread_2 ?></li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

        <!-- Team Section -->
    <section class="team-section">
        <?php 
            if(isset($team_category)):
                foreach($team_category as $t): 
        ?>
            <div class="auto-container">
                <div class="sec-title text-right">
                    <span class="float-text"><?= strtoupper($t->team_category_name) ?></span>
                    <h2><?= ucwords(strtolower($t->team_category_name)) ?></h2>
                </div>
            </div>
            <div class="auto-container">
                <div class="row clearfix">
                    <!-- Team Block -->
                    <?php 
                        $teams = \App\Controllers\Template::getTeamByTeamCategoryId($t->team_category_id);
                            foreach($teams as $t): 
                    ?>
                    <div class="team-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="image"><a href="<?= base_url('team') ?>"><img  loading="lazy" src="<?= $t->team_image ? base_url('media/' . $t->team_image) : 'images/resource/team-1.jpg' ?>" alt="<?= $t->team_name ?>"></a></div>
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
                    ?>
                </div>
            </div>
        <?php
                endforeach; 
            endif; 
        ?>
    </section>
    <!--End Team Section -->
<?= $this->endSection() ?>