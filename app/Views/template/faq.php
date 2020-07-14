<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>
<!--Page Title-->
<section class="page-title" style="background-image:url(<?= $faq->faq_page_1_img ? base_url('media/' . $faq->faq_page_1_img) : 'images/background/10.jpg' ?>);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1><?= $faq->faq_page_1_big_title ?></h1>
                    <span class="title"><?= $faq->faq_page_1_small_title ?></span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="<?= $faq->faq_page_1_bread_link ?>"><?= $faq->faq_page_1_bread_1 ?></a></li>
                    <li><?= $faq->faq_page_1_bread_2 ?></li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="auto-container">
            <div class="row">
                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image-box">
                            <figure class="image"><img  loading="lazy" src="<?= $faq->faq_page_2_img_1 ? base_url('media/' . $faq->faq_page_2_img_1) : 'images/resource/faq-img.jpg' ?>" alt="<?= $faq->faq_page_2_img_1_alt ?>"></figure>
                        </div>
                    </div>
                </div>

                <div class="accordion-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="float-text"><?= $faq->faq_page_2_big_title ?></span>
                            <h2><?= $faq->faq_page_2_small_title ?></h2>
                        </div>
                        <ul class="accordion-box">
                            <style>
                                .text-answer-faq li {
                                    list-style: inherit !important;
                                }
                            </style>
                            <!--Block-->
                            <?php 
                                if(isset($faqs)):
                                    foreach($faqs as $f): 
                            ?>
                            <li class="accordion block">
                                <div class="acc-btn"><?= $f->faq_question ?> <div class="icon fa fa-plus-square"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text text-answer-faq"><?= $f->faq_answer ?></div>
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
        </div>
    </section>
    <!--End FAQ Section -->

    <!-- Faq Form Section -->
    <section class="faq-form-section">
        <div class="auto-container">
            <div class="sec-title">
                <span class="float-text"><?= $faq->faq_page_3_big_title ?></span>
                <h2><?= $faq->faq_page_3_small_title ?></h2>
            </div>


            <!-- Faq Form -->
            <div class="faq-form">
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
                        <div class="form-group col-lg-6 col-md-12">
                            <input type="text" name="nama" placeholder="Nama" required>
                        </div>

                        <div class="form-group col-lg-6 col-md-12">
                            <input type="email" name="email" placeholder="Email" required>
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <input type="number" name="telp" placeholder="Telp" required>
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <textarea name="pesan" placeholder="Pesan"></textarea>
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <button class="theme-btn btn-style-three btn-send-form" type="button" name="submit-form"><?= $faq->faq_page_3_btn ?></button>
                        </div>
                    </div>
            </div>
        </div>
    </section>
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