<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>
<!--Page Title-->
<section class="page-title" style="background-image:url(<?= $project->project_page_1_img ? base_url('media/' . $project->project_page_1_img) :  base_url('images/background/10.jpg') ?>);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1><?= $project->project_page_1_big_title ?></h1>
                    <span class="title"><?= $project->project_page_1_small_title ?></span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="<?= $project->project_page_1_bread_link ?>"><?= $project->project_page_1_bread_1 ?></a></li>
                    <li><?= $project->project_page_1_bread_2 ?></li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Projects Section -->
    <section class="projects-section alternate">
        <div class="auto-container">
             <!--MixitUp Galery-->
            <div class="mixitup-gallery">
                <!--Filter-->
                <div class="filters text-center clearfix">
                    <ul class="filter-tabs filter-btns clearfix">
                        <li class="active filter" data-role="button" data-filter="all">All</li>
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

                <div class="filter-list row row-project">
                    <!-- Project Block -->
                    <?php 
                        if(isset($all_project)):
                            $no = 1;
                            foreach($all_project as $a): 
                    ?>
                    <?php if($no == 2): ?>
                    <div class="project-block all mix <?= str_replace(' ','-',strtolower($a->portfolio_category_name))  ?> col-lg-8 col-md-6 col-sm-12" project-id="<?= $a->portfolio_id ?>">
                    <?php else: ?>
                    <div class="project-block all mix <?= str_replace(' ','-',strtolower($a->portfolio_category_name))  ?> col-lg-4 col-md-6 col-sm-12" project-id="<?= $a->portfolio_id ?>">
                    <?php endif; ?>
                        <div class="image-box">
                            <figure class="image">
                                <?php if($no == 1): ?>
                                <img loading="lazy" style="width: inherit; height:490px; object-fit:none;" class="mx-auto" src="<?= $a->portfolio_main_image ? base_url('media/' . $a->portfolio_main_image) : base_url('images/gallery/2-7.jpg') ?>" alt="">
                                <?php elseif($no == 2): ?>
                                <img loading="lazy" class="mx-auto" style="width: auto; height:490px;" src="<?= $a->portfolio_main_image ? base_url('media/' . $a->portfolio_main_image) : base_url('images/gallery/2-7.jpg') ?>" alt="">
                                <?php else: ?>
                                <img  loading="lazy" src="<?= $a->portfolio_main_image ? base_url('media/' . $a->portfolio_main_image) : base_url('images/gallery/2-7.jpg') ?>" alt="">
                                <?php endif; ?>
                            </figure>
                            <div class="overlay-box">
                                <h4><a href="<?= base_url('projects/' . $a->portfolio_slug) ?>"><?= $a->portfolio_title ?> <br>Project</a></h4>
                                <div class="btn-box">
                                    <a href="<?= $a->portfolio_main_image ? base_url('media/' . $a->portfolio_main_image) : base_url('images/gallery/2-7.jpg') ?>" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                    <a href="<?= base_url('projects/' . $a->portfolio_slug) ?>"><i class="fa fa-external-link"></i></a>
                                </div>
                                <span class="tag"><?= ucwords(strtolower($a->portfolio_category_name)) ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                                $no++;
                            endforeach;
                        endif; 
                    ?>

                </div>
            </div>
            
            <?php 
                if(isset($count_project) && $count_project > 6):
            ?>
            <!--Post Share Options-->
            <div class="styled-pagination">
                <ul class="clearfix">
                    <li class="active"><button class="btn btn-outline-dark rounded-0 btn-load-more">load more</button></li>
                </ul>
            </div>
            <?php 
                endif; 
            ?>
        </div>
    </section>
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