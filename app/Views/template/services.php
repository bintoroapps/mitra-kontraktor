<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>
        <!-- Page Title -->
    <section class="page-title" style="background-image:url(<?= $service->service_page_1_img ? base_url('media/' . $service->service_page_1_img) : 'images/background/10.jpg' ?>);">
        <div class="auto-container">
            <h1><?= $service->service_page_1_big_title ?></h1>
            <span class="title"><?= $service->service_page_1_small_title ?></span>
            <ul class="page-breadcrumb">
                <li><a href="<?= $service->service_page_1_bread_link ?>"><?= $service->service_page_1_bread_1 ?></a></li>
                <li><?= $service->service_page_1_bread_2 ?></li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->
    
    <!-- Services Section Four -->
    <section class="services-section-four">
        <div class="auto-container">
                <span class="float-text"><?= $service->service_page_2_big_title ?></span>
                <h2><?= $service->service_page_2_small_title ?></h2>
            <div class="row clearfix">
                <?php 
                    if(isset($jasa)):
                        foreach($jasa as $j): 
                ?>
                <!-- Service Block Four -->
                <div class="service-block-four col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="<?= base_url($j->jasa_slug) ?>"><img src="<?= $j->jasa_img ? base_url('media/' . $j->jasa_img) : 'images/resource/service-4.jpg' ?>" alt="<?= $j->jasa_name ?>" /></a>
                        </div>
                        <div class="lower-content">
                            <div class="icon-box">
                                <span class="icon flaticon-null-3"></span>
                            </div>
                            <h5><a href="<?= base_url($j->jasa_slug) ?>"><?= strtoupper($j->jasa_name) ?></a></h5>
                            <div class="text"></div>
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
    <!-- End Services Section Four -->
        
     <!-- Video Section -->
    <section class="video-section">
        <div class="image-layer" style="background-image:url(https://via.placeholder.com/1143x700)"></div>
        <div class="pattern-layer" style="background-image:url(images/background/pattern-3.jpg)"></div>
        <div class="side-image-layer" style="background-image: url(<?= $service->service_page_3_img ? base_url('media/' . $service->service_page_3_img) : 'images/background/3.jpg' ?>);"></div>
        <div class="auto-container">
            
            <div class="inner-container">
                
                <!-- Fact Counter -->
                <div class="fact-counter style-two">
                    <div class="clearfix">

                        <!-- Column -->
                        <div class="column counter-column">
                            <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="content">
                                    <div class="icon"><img src="images/icons/counter-1.png" alt="" /></div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="3500" data-stop="<?= $service->service_page_3_num_1 ?>">0</span>+
                                    </div>
                                    <div class="counter-title"><?= $service->service_page_3_text_1 ?></div>
                                </div>
                            </div>
                        </div>

                        <!-- Column -->
                        <div class="column counter-column">
                            <div class="inner wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                                <div class="content">
                                    <div class="icon"><img src="images/icons/counter-2.png" alt="" /></div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="2500" data-stop="<?= $service->service_page_3_num_2 ?>">0</span>+
                                    </div>
                                    <div class="counter-title"><?= $service->service_page_3_text_2 ?></div>
                                </div>
                            </div>
                        </div>

                        <!-- Column -->
                        <div class="column counter-column">
                            <div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
                                <div class="content">
                                    <div class="icon"><img src="images/icons/counter-3.png" alt="" /></div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="3000" data-stop="<?= $service->service_page_3_num_3 ?>">0</span>+
                                    </div>
                                    <div class="counter-title"><?= $service->service_page_3_text_3 ?></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Column -->
                        <div class="column counter-column">
                            <div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
                                <div class="content">
                                    <div class="icon"><img src="images/icons/counter-4.png" alt="" /></div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="3000" data-stop="<?= $service->service_page_3_num_4 ?>">0</span>+
                                    </div>
                                    <div class="counter-title"><?= $service->service_page_3_text_4 ?></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <!-- Video Box -->
                <div class="video-box">
                    <div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <img src="<?= $about->about_page_9_img_1 ? base_url('media/' . $about->about_page_9_img_1) : 'images/resource/video-img.jpg' ?>" alt="<?= $about->about_page_9_img_1_alt ?>" />
                        <div class="overlay-box">
                            <div class="content" style="margin-top: -100px;margin-left:-100px;">
                                <h2> - <?= $service->service_page_3_pros_1_title ?></h2>
                                <div class="text"><?= $service->service_page_3_pros_1_desc ?></div>
                                <h2> - <?= $service->service_page_3_pros_2_title ?></h2>
                                <div class="text"><?= $service->service_page_3_pros_2_desc ?></div>
                                <h2> - <?= $service->service_page_3_pros_3_title ?></h2>
                                <div class="text"><?= $service->service_page_3_pros_3_desc ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- End Video Section -->
    <!-- Request Quote Section -->
    <section class="request-quote-section">
        <div class="image-layer" style="background-image:url(https://via.placeholder.com/1920x650)"></div>
        <div class="auto-container">
            <div class="inner-container" style="background-image:url(images/background/pattern-5.png)">
                <div class="row clearfix">
                    
                    <!-- Form Column -->
                    <div class="form-column col-lg-6 col-md-12 col-sm-12">
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
                        <div class="inner-column">
                            <div class="title-box">
                                <h2><?= $service->service_page_5_big_title ?></h2>
                                <div class="text"><?= $service->service_page_5_med_title ?></div>
                            </div>
                            
                            <!-- Default Form -->
                            <div class="default-form">
                             
                                    <div class="form-group">
                                        <input type="text" name="nama" value="" placeholder="Name" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="number" name="telp" value="" placeholder="Phone number" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="email" name="email" value="" placeholder="Email" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <textarea name="pesan" placeholder="Your Massage"></textarea>
                                    </div>
                                    
                                    <div class="form-group text-center">
                                        <button type="submit" class="theme-btn btn-style-four" name="submit-form"><span class="txt"><?= $service->service_page_5_btn ?></span></button>
                                    </div>
                               
                            </div>
                            <!--End Default Form-->
                            
                        </div>
                    </div>
                    
                    <!-- need support -->
                             <div class="info-column col-lg-4 col-md-12 col-sm-12" style="margin-top: 125px;margin-left: 50px;">
                                    <div class="inner-column">
                                        <h4><?= $service->service_page_5_small_title ?></h4>
                                        <ul class="contact-info">
                                            <li><?= $service->service_page_5_det_1 ?></li>
                                            <li><?= $service->service_page_5_det_2 ?></li>
                                            <li><?= $service->service_page_5_det_3 ?></li>
                                        </ul>
                                    </div>
                            </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Request Quote Section -->
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