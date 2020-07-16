<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>
<!-- Page Title -->
    <section class="page-title" style="background-image:url(<?= $faq->faq_page_1_img ? base_url('media/' . $faq->faq_page_1_img) : 'images/background/10.jpg' ?>);">
        <div class="auto-container">
            <h1><?= $faq->faq_page_1_big_title ?></h1>
            <ul class="page-breadcrumb">
                <li><a href="<?= $faq->faq_page_1_bread_link ?>"><?= $faq->faq_page_1_bread_1 ?></a></li>
                <li><?= $faq->faq_page_1_bread_2 ?></li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->
    
    <!-- Faq's Page Section -->
    <section class="faq-page-section">
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
                    <?= $faq->faq_page_2_big_title ?>
                </div>
                <h2><?= $faq->faq_page_2_small_title ?></h2>
            </div>
            <div class="row clearfix">
                
                <!-- Column -->
                <div class="column col-lg-6 col-md-12 col-sm-12">
                    
                    <ul class="accordion-box">
                        <!--Block-->
                         <?php 
                                if(isset($faqs)):
                                    foreach($faqs as $f): 
                            ?>
                        <li class="accordion block">
                            <div class="acc-btn"><?= $f->faq_question ?> <div class="icon fa fa-angle-right"></div></div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text"><?= $f->faq_answer ?></div>
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
    </section>
    <!-- End Faq's Page Section -->
    
    <!-- Request Quote Section -->
    <section class="request-quote-section">
        <div class="image-layer" style="background-image:url(https://via.placeholder.com/1920x650)"></div>
        <div class="auto-container">
            <div class="inner-container" style="background-image:url(images/background/pattern-5.png)">
                <div class="row clearfix">
                    
                    <!-- Form Column -->
                    <div class="form-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="title-box">
                                <h2><?= $faq->faq_page_3_big_title ?></h2>
                                <div class="text"><?= $faq->faq_page_3_small_title ?></div>
                            </div>
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
                            <!-- Default Form -->
                            <div class="default-form">
                               
                                    <div class="form-group">
                                        <input type="text" name="name" value="" placeholder="Name" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="email" name="email" value="" placeholder="Email" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="number" name="telp" value="" placeholder="Phone Number" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="subject" value="" placeholder="Subject" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <textarea name="message" placeholder="Your Massage"></textarea>
                                    </div>
                                    
                                    <div class="form-group text-center">
                                        <button type="submit" class="theme-btn btn-style-four" name="submit-form"><span class="txt"><?= $faq->faq_page_3_btn ?></span></button>
                                    </div>
                                
                            </div>
                            <!--End Default Form-->
                            
                        </div>
                    </div>
                    
                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image">
                                <img src="<?= $faq->faq_page_2_img_1 ? base_url('media/' . $faq->faq_page_2_img_1) : 'images/resource/faq-img.jpg' ?>" alt="<?= $faq->faq_page_2_img_1_alt ?>" />
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="three-item-carousel owl-carousel owl-theme">
            
            </div>
        </div>
    </section>
    <!-- End Request Quote Section -->
    
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