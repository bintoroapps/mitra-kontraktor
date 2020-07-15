<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>
<!-- Page Title -->
    <section class="page-title" style="background-image:url(<?= $project->project_page_1_img ? base_url('media/' . $project->project_page_1_img) :  base_url('images/background/10.jpg') ?>);">
        <div class="auto-container">
            <h1><?= $project->project_page_1_big_title ?></h1>
            <span class="title"><?= $project->project_page_1_small_title ?></span>
            <ul class="page-breadcrumb">
                <li><a href="<?= $project->project_page_1_bread_link ?>"><?= $project->project_page_1_bread_1 ?></a></li>
                <li><?= $project->project_page_1_bread_2 ?></li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->
    
    <!-- Gallery Section -->
    <section class="gallery-section">
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
                    Projects
                </div>
                <h2>Our Latest Projects Check <br> Now Dears</h2>
            </div>
            <!--MixitUp Galery-->
            <div class="mixitup-gallery">
                
                <!--Filter-->
                <div class="filters clearfix">
                    
                    <ul class="filter-tabs filter-btns text-center clearfix">
                        <li class="active filter" data-role="button" data-filter="all">All Cases</li>
                        <?php 
                            if(isset($category)):
                                foreach($category as $c): 
                        ?>

                            <li class="filter" data-role="button" data-filter=".<?= str_replace(' ','-',strtolower($c->portfolio_category_name)) ?>"><?= strtoupper($c->portfolio_category_name) ?></li>
                        <?php
                            endforeach;
                            endif; 
                        ?>  
                    </ul>
                    
                </div>
                
                <div class="filter-list row clearfix">
                    <?php 
                        if(isset($all_project)):
                            $no = 1;
                            foreach($all_project as $a): 
                    ?>
                    <?php if($no == 2): ?>
                    <!-- Gallery Block -->
                    <div class="gallery-block mix all <?= str_replace(' ','-',strtolower($a->portfolio_category_name))  ?> col-lg-8 col-md-6 col-sm-12" project-id="<?= $a->portfolio_id ?> col-lg-4 col-md-4 col-sm-12">
                        <?php else: ?>
                    <div class="gallery-block mix all <?= str_replace(' ','-',strtolower($a->portfolio_category_name))  ?> col-lg-8 col-md-6 col-sm-12" project-id="<?= $a->portfolio_id ?> col-lg-4 col-md-4 col-sm-12">
                        <?php endif; ?>


                        <div class="inner-box">
                            <figure class="image-box">
                                <?php if($no == 1): ?>
                                <img src="<?= $a->portfolio_main_image ? base_url('media/' . $a->portfolio_main_image) : base_url('images/gallery/2-7.jpg') ?>" alt="">
                                <?php elseif($no == 2): ?>
                                <img src="<?= $a->portfolio_main_image ? base_url('media/' . $a->portfolio_main_image) : base_url('images/gallery/2-7.jpg') ?>" alt="">
                                <?php else: ?>
                                 <img src="<?= $a->portfolio_main_image ? base_url('media/' . $a->portfolio_main_image) : base_url('images/gallery/2-7.jpg') ?>" alt="">
                                 <?php endif; ?>

                                <!-- Overlay Box -->
                                <div class="overlay-box">
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <h6><a href="<?= base_url('projects/' . $a->portfolio_slug) ?>"><?= $a->portfolio_title ?></a></h6>
                                            <div class="category"><?= ucwords(strtolower($a->portfolio_category_name)) ?></div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= $a->portfolio_main_image ? base_url('media/' . $a->portfolio_main_image) : base_url('images/gallery/2-7.jpg') ?>" data-fancybox="gallery-1" data-caption="" class="link"><span class="icon flaticon-full-screen"></span></a>
                            </figure>
                        </div>


                    </div>
                    </div>
                 <?php
                       $no++;
                        endforeach;
                        endif; 
                    ?>
            </div>
            
            <!--Styled Pagination-->
            <ul class="styled-pagination text-center">
                <li class="prev"><a href="#"><span class="fa fa-angle-double-left"></span> Prev</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#" class="active">2</a></li>
                <li><a href="#">3</a></li>
                <li class="next"><a href="#">Next <span class="fa fa-angle-double-right"></span></a></li>
            </ul>                
            <!--End Styled Pagination-->
            
        </div>
    </section>
    <!-- End Gallery Section -->
    
    
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
$(document).ready(function() {
    $('body').on('click', '.btn-load-more', function() {
        let project_id = $('body').find('.project-block').last().attr('project-id')
        $.ajax({
            type: 'get',
            url: '<?= base_url('projectsloadmore') ?>',
            data: {
                project_id: project_id
            },
            beforeSend() {
                $('body').find('.btn-load-more').html('loading...')
            },
            success(response) {
                if(response.length > 200) {
                    $('body').find('.row-project').append(response)
                    $('body').find('.btn-load-more').html('load more')
                    $('body').find('.filter-btns').find('filter[data-filter="all"]').click()
                } else {
                    $('body').find('.btn-load-more').remove()
                }
            }

        })
    })
})
</script>
<?= $this->endSection() ?>