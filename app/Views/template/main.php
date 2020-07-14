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
<html lang="en">
<head>
<?= $tracking_code->google_analytic ?>
<?= $tracking_code->google_tags ?>
<?= $tracking_code->google_search_console ?>
<meta charset="utf-8">
<title>MItra Kontraktor</title>
<!-- Stylesheets -->
<link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet">
<link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
<link href="<?= base_url('css/responsive.css') ?>" rel="stylesheet">

<!--Color Themes-->
<link id="theme-color-file" href="<?= base_url('css/color-themes/default-theme.css') ?>" rel="stylesheet">

<link rel="shortcut icon" href="<?= base_url('images/favicon.png') ?>" type="image/x-icon">
<link rel="icon" href="<?= base_url('images/favicon.png') ?>" type="image/x-icon">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> -->
<style>
.float-whatsapp{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	left:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:16px;
}
</style>
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

        <!-- Main Header-->
    <header class="main-header header-style-four">
        <div class="header-top">
            <div class="auto-container clearfix">
                <div class="top-right">
                    <ul class="contact-info">
                        <li><span>PHONE :</span> +62<?= $company_data->company_telp ?></li>
                        <li><span>EMAIL :</span> <a href="#"><?= $company_data->company_email ?></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="header-lower">
            <div class="auto-container">
                <div class="main-box clearfix">
                    <div class="logo-box">
                    <div class="logo"><a href="<?= base_url() ?>"><img  loading="lazy" src="<?= $company_data->media_id ? base_url('media/' . $company_data->media_name) : base_url('images/logo-2.png') ?>" alt="" title=""></a></div>
                    </div>

                    <div class="nav-outer">
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md ">
                            <div class="navbar-header">
                                <!-- Toggle Button -->
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon flaticon-menu-button"></span>
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
                        </nav><!-- Main Menu End-->

                        <!-- Outer Box-->
                        <!-- <div class="outer-box"> -->
                            <!--Search Box-->
                            <!-- <div class="search-box-outer">
                                <div class="dropdown">
                                    <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                                    <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                        <li class="panel-outer">
                                            <div class="form-container">
                                                <form method="post" action="blog.html">
                                                    <div class="form-group">
                                                        <input type="search" name="field-name" value="" placeholder="Search Here" required>
                                                        <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--End Main Header -->

    <!-- Main Content -->
    <?= $this->renderSection('content') ?>
    <!-- End Main Content -->

    <!-- Main Footer -->
    <footer class="main-footer alternate" style="background-image: url(<?= $company_data->company_footer ? base_url('media/' . $company_data->company_footer) : base_url('images/background/5.jpg') ?>);">
        <div class="auto-container">
            <!--Widgets Section-->
            <div class="widgets-section">
                <div class="row">
                    <!--Big Column-->
                    <div class="big-column col-xl-7 col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <!--Footer Column-->
                            <div class="footer-column col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget about-widget">
                                    <div class="footer-logo">
                                        <figure>
                                            <a href="<?= base_url() ?>"><img  loading="lazy" src="<?= $company_data->media_id ? base_url('media/' . $company_data->media_name) : base_url('images/logo-2.png') ?>" alt=""></a>
                                        </figure>
                                    </div>
                                    <div class="widget-content">
                                        <div class="text"><?= $company_data->company_description ?></div>
                                    </div>
                                </div>
                            </div>

                            <!--Footer Column-->
                            <div class="footer-column col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget recent-posts">
                                    <h2 class="widget-title">Recent Posts</h2>
                                     <!--Footer Column-->
                                    <div class="widget-content">
                                    <?php  
                                            $recent_post = \App\Controllers\Template::getTwoRecentPost();
                                            foreach($recent_post as $r):
                                        ?>
                                        <div class="post">
                                            <div class="thumb"><a href="<?= base_url($r->blog_slug) ?>"><img  loading="lazy" src="<?= $r->blog_image ? base_url('media/' . $r->blog_image) : 'images/resource/post-thumb-1.jpg'  ?>" alt="<?= $r->blog_image_alt ?>"></a></div>
                                            <h4><a href="<?= base_url($r->blog_slug) ?>"><?= $r->blog_title ?></a></h4>
                                            <ul class="info">
                                                <li><?= date('d F', strtotime($r->blog_post)) ?></li>
                                                <li><?= \App\Controllers\Template::blog_comment($r->blog_id) ?> Komentar</li>
                                            </ul>
                                        </div>
                                            <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Big Column-->
                    <div class="big-column col-xl-5 col-lg-12 col-md-12 col-sm-12">
                        <div class="row clearfix">
                            <div class="footer-column col-xl-5 col-lg-6 col-md-6 col-sm-12">
                                 <div class="footer-widget links-widget">
                                    <h2 class="widget-title">Useful links</h2>
                                    <div class="widget-content">
                                        <ul class="list">
                                            <li><a href="<?= base_url('about-us') ?>">About</a></li>
                                            <li><a href="<?= base_url('services') ?>">Services</a></li>
                                            <li><a href="<?= base_url('projects') ?>">Project</a></li>
                                            <li><a href="<?= base_url('blog') ?>">Blog</a></li>
                                            <li><a href="<?= base_url('contact') ?>">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!--Footer Column-->
                            <div class="footer-column col-xl-7 col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget gallery-widget">
                                    <h2 class="widget-title">Recent Works</h2>
                                    <div class="widget-content">
                                        <div class="outer clearfix">
                                        <?php  
                                            $recent_project = \App\Controllers\Template::getSixRecentProject();
                                            foreach($recent_project as $p):
                                        ?>
                                            <figure class="image">
                                                <a href="<?= $p->portfolio_main_image ? base_url('media/' .$p->portfolio_main_image) : 'images/gallery/1.jpg' ?>" class="lightbox-image" title="<?= $p->portfolio_title ?>"><img  loading="lazy" src="<?= $p->portfolio_main_image ? base_url('media/' .$p->portfolio_main_image) : 'images/resource/work-thumb-1.jpg' ?>" alt=""></a>
                                            </figure>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Footer Bottom-->
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <div class="social-links">
                        <ul class="social-icon-two">
                            <li><a href="<?= $company_data->company_facebook ? $company_data->company_facebook : '#' ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?= $company_data->company_youtube ? $company_data->company_youtube : '#' ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="<?= $company_data->company_instagram ? $company_data->company_instagram : '#' ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li>
                                <a href="<?= $company_data->company_whatsapp ? 'https://api.whatsapp.com/send?phone=62' . str_ireplace(' ', '', $company_data->company_whatsapp) : '#' ?>" target="_blank">
                                <i class="fa fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="copyright-text">
                        <p>Copyright © 2020 <a href="https://bintorocorp.co.id">Bintorocorp.</a> All right reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Main Footer -->
    <a href="<?= $company_data->company_whatsapp ? 'https://api.whatsapp.com/send?phone=62' . str_ireplace(' ', '', $company_data->company_whatsapp) : '#' ?>" class="float-whatsapp" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
        </a>

</div>



<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-o-up"></span></div>
<script src="<?= base_url('js/jquery.js') ?>"></script>
<script src="<?= base_url('js/popper.min.js') ?>"></script>
<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('js/jquery.fancybox.js') ?>"></script>
<script src="<?= base_url('js/owl.js') ?>"></script>
<script src="<?= base_url('js/wow.js') ?>"></script>
<script src="<?= base_url('js/appear.js') ?>"></script>
<script src="<?= base_url('js/mixitup.js') ?>"></script>
<script src="<?= base_url('js/script.js') ?>"></script>
<!-- Color Setting -->
<script src="<?= base_url('js/color-settings.js') ?>"></script>
<!-- Bintoro Chat -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> <link rel="stylesheet" href="https://chat.bintoroapps.co.id/pd-chat/bintchat.min.css"> <div class="bintoro-chat-list"> <div class="bintoro-chat-close"> <span class="bintoro-close-icon">&#10006;</span></div><div class="bintoro-chat-header"> <h4 style="color:#fff;" class="bintoro-chat-hi">Hi &#128075;</h4> <p style="color:#fff; text-align:left;" class="bintoro-p-greeting">Silahkan kirim pesan untuk memulai percakapan </p></div><div class="bintoro-chat-body"></div><div class="bintoro-chat-input-form"> <input type="text" class="bintoro-form-input" placeholder="Type here..."> </div><div class="bintoro-chat-footer"> <p>Powered by <span>Bintoro Apps</span></p></div></div><div class="bintoro-chat-pop-up"> <small class="bintoro-chat-title-cs">Marketing</small><span class="bintoro-close-icon-pop-up">&#10006;</span><br><p>Semangat pagi, ada yang bisa kami bantu ?</p><p>Atau mungkin boleh minta nomer yang bisa dihubungi agar kami langsung hubungi Anda ? 😀</p></div><div class="bintoro-chat-pop-up-reply"> <p>Reply to Marketing ...</p></div><img title="Click to close image" class="bintoro-call-center" src="https://chat.bintoroapps.co.id/images/oc-asset/bintoro_call_center.png"><div class="bintoro-chat"> <p>Silahkan Chat</p></div><input type="hidden" id="this_ip_address"><script src="https://js.pusher.com/5.0/pusher.min.js"></script> <script src="https://chat.bintoroapps.co.id/pd-chat/bintchat.min.js"></script>
<?= $this->renderSection('js') ?>
</body>
</html>
