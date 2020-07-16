<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>
<!-- Page Title -->
    <section class="page-title" style="background-image:url(<?= $contact->contact_page_1_img ? base_url('media/' . $contact->contact_page_1_img) : base_url('images/background/10.jpg') ?>);">
        <div class="auto-container">
            <h1><?= $contact->contact_page_1_big_title ?></h1>
            <span class="title"><?= $contact->contact_page_1_small_title ?></span>
            <ul class="page-breadcrumb">
                    <li><a href="<?= $contact->contact_page_1_bread_link ?>"><?= $contact->contact_page_1_bread_1 ?></a></li>
                    <li><?= $contact->contact_page_1_bread_2 ?></li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->
    
    <!-- Contact Map Section -->
    <section class="map-section">
        <div class="auto-container">
            <!-- Social Outer -->
            <div class="map-outer">
                <div class="map-canvas">
                    <?= $company->company_map ?>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Contact Map Section -->
    
    <!-- Contact Info Section -->
    <section class="contact-info-section">
        <div class="auto-container">
            <div class="row clearfix">
                
                <!-- Info Box -->
                <div class="info-box col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon"><img src="images/icons/contact-1.png" alt="" /></div>
                        <h5>Mail us for information</h5>
                        <a class="email" href="mailto:<?= $company->company_email ?>"><?= $company->company_email ?></a>
                    </div>
                </div>
                
                <!-- Info Box -->
                <div class="info-box col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon"><img src="images/icons/contact-2.png" alt="" /></div>
                        <h5>Working hours</h5>
                        <div class="text"><?= $company->company_workinghours ?></div>
                    </div>
                </div>
                
                <!-- Info Box -->
                <div class="info-box col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon"><img src="images/icons/contact-3.png" alt="" /></div>
                        <h5>Call for help</h5>
                        <a class="phone" href="tel:+62<?= $company->company_telp ?>">+62<?= $company->company_telp ?></a>
                    </div>
                </div>
                
                <!-- Info Box -->
                <div class="info-box col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon"><img src="images/icons/contact-4.png" alt="" /></div>
                        <h5>Address:</h5>
                        <div class="text"><?= $company->company_address ?></div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- End Contact Info Section -->
    
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
                                <h2><?= $about->about_page_8_big_title ?></h2>
                                <div class="text"><?= $about->about_page_8_small_title ?></div>
                            </div>
                            
                            <!-- Default Form -->
                            <div class="default-form contact-form">
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
                               
                                    <div class="form-group">
                                        <input type="text" name="name" value="" placeholder="Name" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="email" name="email" value="" placeholder="Email" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="text" name="telp" value="" placeholder="Phone Number" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <textarea name="message" placeholder="Your Massage"></textarea>
                                    </div>
                                    
                                    <div class="form-group text-center">
                                        <button type="submit" class="theme-btn btn-style-four" name="submit-form"><span class="txt"><?= $contact->contact_page_2_btn ?></span></button>
                                    </div>
                            
                            </div>
                            <!--End Default Form-->
                            
                        </div>
                    </div>
                    
                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image">
                                <img src="<?php echo base_url('media/' . $contact->contact_page_quote_img) ?>" alt="<?= $contact->contact_page_quote_img ?>" />
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
    <section class="clients-section style-two">
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
                    Amazing Partners
                </div>
                <h2>Our Best Partners <br> Let’s See</h2>
            </div>
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
<!--Google Map APi Key-->
<script src="https://maps.google.com/maps/api/js?key=AIzaSyBKS14AnP3HCIVlUpPKtGp7CbYuMtcXE2o"></script>
<script src="<?= base_url('js/map-script.js') ?>"></script>
<!--End Google Map APi-->
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