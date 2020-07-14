<?php
if (!isset($_SERVER['HTTP_ACCEPT_ENCODING'])) {
    ob_start();            
}
elseif (strpos(' ' . $_SERVER['HTTP_ACCEPT_ENCODING'], 'x-gzip') == false) {
    if (strpos(' ' . $_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') == false) {
        ob_start();
    }
    elseif(!ob_start("ob_gzhandler")) {
        ob_start();
    }   
}
elseif(!ob_start("ob_gzhandler")) {
    ob_start();
}
$tracking_code = \App\Controllers\Template::trackingCode();
?>
<!DOCTYPE html>
<html>
<head>
    <?= $tracking_code->google_analytic ?>
<?= $tracking_code->google_tags ?>
<?= $tracking_code->google_search_console ?>
<meta charset="utf-8">
<title>Mitra Kontraktor</title>

<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;700&family=Great+Vibes&family=Montserrat:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- Color Switcher Mockup -->
<link href="css/color-switcher-design.css" rel="stylesheet">

<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="<?= isset($seo) ? $seo->meta_description : '' ?>"/>
<link rel="canonical" href="<?= base_url() ?>" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?= isset($seo) ? $seo->seo_title : '' ?>" />
<meta property="og:description" content="<?= isset($seo) ? $seo->meta_description : '' ?>" />
<meta property="og:url" content="<?= base_url() ?>" />
<meta property="og:site_name" content="<?= isset($seo) ? $seo->seo_title : '' ?>" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:description" content="<?= isset($seo) ? $seo->meta_description : '' ?>" />
<meta name="twitter:title" content="<?= isset($seo) ? $seo->seo_title : '' ?>" />
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
<?= $tracking_code->facebook_pixel ?>

</head>

<body>
<?php
    $company_data = \App\Controllers\Template::companyData();
?>
<div class="page-wrapper">
    
    <!-- Preloader -->
    <!-- <div class="preloader"></div> -->
    
    <!-- Main Header / Header Style Two -->
    <header class="main-header header-style-two">
    
        <!-- Header Top Two -->
        <div class="header-top-two">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <!-- Top Left -->
                    <div class="top-left clearfix">
                        <ul class="top-list">
                            <li><span class="icon flaticon-maps-and-flags"></span>Jakarta Selatan, DKI Jakarta, Indonesia</li>
                            <li><span class="icon flaticon-telephone"></span><a href="tel:+6281340008080">+6281340008080</a></li>
                        </ul>
                    </div>
                    
                    <!-- Top Right -->
                    <div class="top-right clearfix">
                        <!-- Social Box -->
                        <ul class="social-box">
                            <li><a href="#" class="fa fa-facebook-f"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google"></a></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <!--Header Lower-->
        <div class="header-lower">
            
            <div class="auto-container">
                <div class="clearfix">

                    <!-- Logo Box -->
                    <div class="pull-left logo-box">
                        <div class="logo"><a href="<?= base_url() ?>"><img  loading="lazy" src="<?= $company_data->media_id ? base_url('media/' . $company_data->media_name) : base_url('images/logo-2.png') ?>" alt="" title=""></a></div>
                    </div>
                
                    <div class="nav-outer clearfix">
                        <!-- Mobile Navigation Toggler -->
                        <div class="mobile-nav-toggler"><span class="icon flaticon-menu-2"></span></div>
                        <!-- Main Menu -->
                        <nav class="main-menu show navbar-expand-md">
                            <div class="navbar-header">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                              <?php
                                $request = \Config\Services::request();
                            ?>
                            <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                               <ul class="navigation clearfix">
                                    <li><a href="/">Home</a></li>
                                    <li class="<?= $request->uri->getSegment(1) == 'about-us' || $request->uri->getSegment(1) == 'faq' || $request->uri->getSegment(1) == 'team'  ? 'current' : '' ?> dropdown"><a href="#">About</a>
                                        <ul>
                                            <li><a href="/about-us">About Us</a></li>
                                            <li><a href="/faq">FAQ's</a></li>
                                            <li><a href="/team">Our Team</a></li>
                                        </ul>
                                    </li>
                                    <li class="<?= $request->uri->getSegment(1) == 'services' ? 'current' : '' ?>"><a href="/services">Services</a>
                                    </li>
                                    <li class="<?= $request->uri->getSegment(1) == 'projects' ? 'current' : '' ?>"><a href="/projects">Projects</a>
                                    </li>
                                    <li class="<?= $request->uri->getSegment(1) == 'blog' ? 'current' : '' ?>"><a href="/blog">Blog</a></li>
                                    <li class="<?= $request->uri->getSegment(1) == 'contact' ? 'current' : '' ?>"><a href="/contact">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->

                        <!-- Options Box -->
                        <div class="options-box clearfix">
                            
                            
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Lower -->
    
    </header>
    <!-- End Main Header -->

    <!-- Main Content -->
    <?= $this->renderSection('content') ?>
    <!-- End Main Content -->

   <!-- Main Footer / Style Two -->
    <footer class="main-footer style-two" style="background-image: url(<?= $company_data->company_footer ? base_url('media/' . $company_data->company_footer) : base_url('images/background/5.jpg') ?>);">
        <div class="auto-container">
            <!--Widgets Section-->
            <div class="widgets-section">
                <div class="row clearfix">
                    
                    <!-- Column -->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">
                            
                            <!-- Footer Column -->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget logo-widget">
                                    <div class="widget-content">
                                        <div class="logo">
                                            <a href="<?= base_url() ?>"><img loading="lazy" src="<?= $company_data->media_id ? base_url('media/' . $company_data->media_name) : base_url('images/logo-2.png') ?>" alt=""></a>
                                        </div>
                                        <div class="text">
                                            <p><?= $company_data->company_description ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Footer Column -->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
                                    <h4>Useful Links</h4>
                                    <ul class="list-link-two">
                                            <li><a href="<?= base_url('about-us') ?>">About</a></li>
                                            <li><a href="<?= base_url('services') ?>">Services</a></li>
                                            <li><a href="<?= base_url('projects') ?>">Project</a></li>
                                            <li><a href="<?= base_url('blog') ?>">Blog</a></li>
                                            <li><a href="<?= base_url('contact') ?>">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <!-- Column -->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">
                            
                            <!-- Footer Column -->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget news-widget">
                                    <h4>Resent Post</h4>
                                    <!-- Footer Column -->
                                    <div class="widget-content">
                                        <div class="post">
                                            <div class="thumb"><a href="news-detail.html"><img src="images/resource/post-thumb-1.jpg" alt=""></a></div>
                                            <h6><a href="news-detail.html">On these beams, we build dreams.</a></h6>
                                            <span class="date">24 APRIL 2019</span>
                                        </div>

                                        <div class="post">
                                            <div class="thumb"><a href="news-detail.html"><img src="images/resource/post-thumb-2.jpg" alt=""></a></div>
                                            <h6><a href="news-detail.html">Satisfection for the customer.</a></h6>
                                            <span class="date">24 APRIL 2019</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Footer Column -->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget contact-widget">
                                    <h4>Contact Us</h4>
                                    <ul>
                                        <li>
                                            <span class="icon flaticon-world"></span>
                                            <strong>25BT, San Rojartar,</strong>
                                            New York, United States
                                        </li>
                                        <li>
                                            <span class="icon flaticon-email-3"></span>
                                            <strong>Send Your Mail At</strong>
                                            <a href="mailto:construction@Support.com">Construction@Support.Com</a>
                                        </li>
                                        <li>
                                            <span class="icon flaticon-clock-3"></span>
                                            <strong>Working Hours</strong>
                                            Mon-Sat:9.30am To 7.00pm
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom style-two">
            <div class="auto-container">
                <div class="row clearfix">
                    <!-- Column -->
                    <div class="column col-lg-6 col-md-12 col-sm-12">
                        <div class="copyright">&copy; All rights reserved by <a href="https://bintorocorp.co.id">Bintorocorp.</a></div>
                    </div>
                    <!-- Column -->
                    <div class="column col-lg-6 col-md-12 col-sm-12">
                        <!-- Social Box -->
                        <ul class="social-box">
                            <li><a href="<?= $company_data->company_facebook ? $company_data->company_facebook : '#' ?>" target="_blank" class="fa fa-facebook"></a></li>
                            <li><a href="<?= $company_data->company_youtube ? $company_data->company_youtube : '#' ?>" target="_blank" class="fa fa-youtube"></a></li>
                            <li><a href="<?= $company_data->company_instagram ? $company_data->company_instagram : '#' ?>" target="_blank" class="fa fa-instagram"></a></li>
                            <li><a href="<?= $company_data->company_whatsapp ? 'https://api.whatsapp.com/send?phone=62' . str_ireplace(' ', '', $company_data->company_whatsapp) : '#' ?>" target="_blank" class="fa fa-whatsapp"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
    </footer>
    <!-- End Main Footer -->
    
</div>
<!--End pagewrapper-->

<!-- Header Search -->
<div class="search-popup">
    <button class="close-search style-two"><span class="flaticon-multiply"></span></button>
    <button class="close-search"><span class="flaticon-multiply"></span></button>
    <form method="post" action="blog.html">
        <div class="form-group">
            <input type="search" name="search-field" value="" placeholder="Search Here" required="">
            <button type="submit"><i class="fa fa-search"></i></button>
        </div>
    </form>
</div>
<!-- End Header Search -->

<!-- Color Palate / Color Switcher -->
<div class="color-palate">
    <div class="color-trigger">
        <i class="fa fa-gear"></i>
    </div>
    <div class="color-palate-head">
        <h6>Choose Layout</h6>
    </div>
    
    <ul class="rtl-version option-box"> <li class="rtl">RTL Version</li> <li>LTR Version</li> </ul>
    
    <a href="#" class="purchase-btn">Purchase now $17</a>
    
    <div class="palate-foo">
        <span>You will find much more options for colors and styling in admin panel. This color picker is used only for demonstation purposes.</span>
    </div>

</div>

<!--Scroll to top-->
<div class="back-to-top scroll-to-target show-back-to-top" data-target="html">TOP</div>

<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/appear.js"></script>
<script src="js/nav-tool.js"></script>
<script src="js/mixitup.js"></script>
<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/tilt.jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/script.js"></script>
<script src="js/color-settings.js"></script>

</body>
</html>