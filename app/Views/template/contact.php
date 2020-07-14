<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>
<!--Page Title-->
<section class="page-title" style="background-image:url(<?= $contact->contact_page_1_img ? base_url('media/' . $contact->contact_page_1_img) : base_url('images/background/10.jpg') ?>);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1><?= $contact->contact_page_1_big_title ?></h1>
                    <span class="title"><?= $contact->contact_page_1_small_title ?></span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="<?= $contact->contact_page_1_bread_link ?>"><?= $contact->contact_page_1_bread_1 ?></a></li>
                    <li><?= $contact->contact_page_1_bread_2 ?></li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Contact Page Section -->
    <section class="contact-page-section">
        <div class="auto-container">
            <div class="row">
                <!-- Form Column -->
                <div class="form-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="float-text"><?= $contact->contact_page_2_big_title ?></span>
                            <h2><?= $contact->contact_page_2_small_title ?></h2>
                        </div>

                        <div class="contact-form">
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
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <input type="text" name="nama" placeholder="Nama" required="">
                                </div>

                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <input type="number" name="telp" placeholder="No. Telp" required="">
                                </div>

                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <input type="email" name="email" placeholder="Email" required="">
                                </div>

                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <textarea name="pesan" placeholder="Pesan"></textarea>
                                </div>

                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <button class="theme-btn btn-style-three btn-send-form" type="button" name="submit-form"><?= $contact->contact_page_2_btn ?></button>
                                </div>
                            </div>
                        </div>

                        <div class="contact-info">
                            <div class="row">
                                <div class="info-block col-lg-4 col-md-4 col-sm-12">
                                    <div class="inner">
                                        <h4>Lokasi</h4>
                                        <p><?= $company->company_address ?></p>
                                    </div>
                                </div>

                                <div class="info-block col-lg-4 col-md-4 col-sm-12">
                                    <div class="inner">
                                        <h4>Hubungi Kami</h4>
                                        <p><?= $company->company_telp ?></p>
                                    </div>

                                </div>

                                <div class="info-block col-lg-4 col-md-4 col-sm-12">
                                    <div class="inner">
                                        <h4>Email</h4>
                                        <p><a href="#"><?= $company->company_email ?></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" col-lg-5 col-md-12 col-sm-12" style="padding-top: 100px;;">
               <?= $company->company_map ?>
                </div>
            </div>
        </div>
    </section>
    <!--End Contact Page Section -->

    <!--Clients Section-->
    <section class="clients-section style-two">
        <div class="auto-container">
            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
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
    <!--End Clients Section-->
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