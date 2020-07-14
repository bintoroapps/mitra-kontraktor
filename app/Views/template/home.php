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
<title>Mitra Kontraktor || Homepage</title>

<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- Revolution Slider -->
<link href="plugins/revolution/css/settings.css" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
<link href="plugins/revolution/css/layers.css" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
<link href="plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->

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
<meta name="description" content="<?= $home->home_page_meta_description ?>"/>
<link rel="canonical" href="<?= base_url() ?>" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?= $home->home_page_seo_title ?>" />
<meta property="og:description" content="<?= $home->home_page_meta_description ?>" />
<meta property="og:url" content="<?= base_url() ?>" />
<meta property="og:site_name" content="<?= $home->home_page_seo_title ?>" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:description" content="<?= $home->home_page_meta_description ?>" />
<meta name="twitter:title" content="<?= $home->home_page_seo_title ?>" />
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
<?= $tracking_code->facebook_pixel ?>

</head>

<body>
<?php
    $company_data = \App\Controllers\Template::companyData();
?>
<div class="page-wrapper">
 	
    <!-- Main Header -->
    <header class="main-header header-style-one">
    
        <!--Header Top-->
        <div class="header-top">
            <div class="auto-container">
                <div class="clearfix">
                    <!--Top Left-->
                    <div class="top-left clearfix">
						<div class="text">Mitra Kontraktor</div>
                    </div>
                </div>
            </div>
        </div>
    
        <!--Header-Upper-->
        <div class="header-upper">
            <div class="auto-container">
                <div class="clearfix">
                    
                    <div class="pull-right upper-right clearfix">
                        
                        <!--Info Box-->
                        <div class="upper-column info-box">
                            <div class="icon-box"><span class="flaticon-world"></span></div>
                            <ul>
                                <li><strong>25BT, San Rojartar,</strong></li>
                                <li>New York, United States</li>
                            </ul>
                        </div>
                        
                        <!--Info Box-->
                        <div class="upper-column info-box">
                            <div class="icon-box"><span class="flaticon-email-3"></span></div>
                            <ul>
                                <li><strong>Send Your Mail At</strong></li>
                                <li><a href="mailto:construction@support.Com">Construction@Support.Com</a></li>
                            </ul>
                        </div>
                        
                        <!--Info Box-->
                        <div class="upper-column info-box">
                            <div class="icon-box"><span class="flaticon-clock-3"></span></div>
                            <ul>
								<li><strong>Working Hours</strong></li>
                                <li>Mon-Sat:9.30am To 7.00pm</li>
                            </ul>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        <!--End Header Upper-->
        
        <!--Header Lower-->
        <div class="header-lower">
            
            <div class="auto-container">
				<div class="clearfix">

					<!-- Logo Box -->
					<div class="pull-left logo-box">
						<div class="logo"><a href="index.html"><img src="https://via.placeholder.com/220x86" alt="" title=""></a></div>
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
							
							<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
								<ul class="navigation clearfix">
									<li class="current"><a href="/">Home</a></li>
									<li class="dropdown"><a href="#">About us</a>
										<ul>
											<li><a href="/about-us">About us</a></li>
											<li><a href="/faq">Faq's</a></li>
                                            <li><a href="/team">Our Team</a></li>
										</ul>
									</li>
                                    <li><a href="/services">Services</a>
                                        <!-- <ul>
                                            <li><a href="/services">All Services</a></li>
                                            <li><a href="service-detail.html">Commercial Design</a></li>
                                            <li><a href="service-detail.html">Landescape Design</a></li>
                                            <li><a href="service-detail.html">Interior Design</a></li>
                                            <li><a href="service-detail.html">Complete Interior</a></li>
                                            <li><a href="service-detail.html">House Interior</a></li>
                                            <li><a href="service-detail.html">Service Detail</a></li>
                                        </ul> -->
                                    </li>
                                    <li><a href="/projects">Projects</a></li>
                                    <li><a href="/blog">Blog</a></li>
                                    <li><a href="/contact">Contact</a></li>
								 </ul>
							</div>
						</nav>
						<!-- Main Menu End-->

						<!-- Options Box -->
						<div class="options-box clearfix">
							
							<!--Search Box-->
							<div class="search-box-outer">
								<div class="search-box-btn"><span class="fa fa-search"></span></div>
							</div>
							
							<div class="btn-box">
								<a href="contact.html" class="theme-btn btn-style-one"><span class="txt">Find Advisor</span></a>
							</div>
							
						</div>
						
					</div>
				</div>
            </div>
        </div>
        <!-- End Header Lower -->
        
		<!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="index.html" title=""><img src="https://via.placeholder.com/135x50" alt="" title=""></a>
                </div>
                <!--Right Col-->
                <div class="pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav><!-- Main Menu End-->
					
					<!-- Options Box -->
					<div class="options-box clearfix">
						
						<!--Search Box-->
						<div class="search-box-outer">
							<div class="search-box-btn"><span class="fa fa-search"></span></div>
						</div>
						
						<div class="btn-box">
							<a href="contact.html" class="theme-btn btn-style-one"><span class="txt">Find Advisor</span></a>
						</div>
						
					</div>
					
                </div>
            </div>
        </div><!-- End Sticky Menu -->
		
        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-multiply"></span></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="index.html"><img src="https://via.placeholder.com/220x86" alt="" title=""></a></div>
                <div class="menu-outer">
					<!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
				</div>
            </nav>
        </div><!-- End Mobile Menu -->
    
    </header>
    <!-- End Main Header -->

	<!--Main Slider-->
    <section class="main-slider">
    	
        <div class="rev_slider_wrapper fullwidthbanner-container"  id="rev_slider_one_wrapper" data-source="gallery">
            <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
                <ul>
                
                	<li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1688" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="https://via.placeholder.com/1720x800" data-title="Slide Title" data-transition="parallaxvertical">
                    <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="https://via.placeholder.com/1720x800"> 
                    
					<div class="tp-caption tp-shape tp-shapewrapper tp-resizeme"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="shape"
                    data-height="auto"
                    data-whitespace="nowrap"
                    data-width="['660','1000','750','550']"
                    data-hoffset="['15','15','15','15']"
                    data-voffset="['-120','-100','-150','-130']"
                    data-x="['left','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-frames='[{"from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1000,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                    	<div class="title">Constraction Soluction</div>
                    </div>
					
                    <div class="tp-caption" 
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['660','1000','750','550']"
                    data-whitespace="normal"
                    data-hoffset="['15','15','15','15']"
                    data-voffset="['-50','-30','-80','-60']"
                    data-x="['left','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                    	<h1>Your Thought We Build</h1>
                    </div>
                    
                    <div class="tp-caption" 
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['660','1000','750','550']"
                    data-whitespace="normal"
                    data-hoffset="['15','15','15','15']"
                    data-voffset="['40','60','10','20']"
                    data-x="['left','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                    	<div class="text">Manzil Construction Agency Is Proud To Provide Most Reliable <br> Housing & Top Notch Construction Service.</div>
                    </div>
                    
                    <div class="tp-caption tp-resizeme" 
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['660','1000','750','550']"
                    data-whitespace="normal"
                    data-hoffset="['15','15','15','15']"
                    data-voffset="['145','160','120','110']"
                    data-x="['left','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                    	<div class="btns-box">
							<a href="#" class="theme-btn btn-style-three"><span class="txt">Our Services</span></a>
                    		<a href="#" class="theme-btn btn-style-two"><span class="txt">Join Us Now</span></a>
                        </div>
                    </div>
					
					<div class="tp-caption tp-shape tp-shapewrapper tp-resizeme"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="shape"
                    data-height="auto"
                    data-whitespace="nowrap"
                    data-width="none"
                    data-hoffset="['15','15','15','15']"
                    data-voffset="['75','15','15','15']"
                    data-x="['right','right','right','right']"
                    data-y="['middle','middle','middle','middle']"
                    data-frames='[{"from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1000,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                    	<figure class="content-image"><img src="https://via.placeholder.com/490x700" alt=""></figure>
                    </div>
                    
                    </li>
                    
                    <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1689" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="https://via.placeholder.com/1920x950" data-title="Slide Title" data-transition="parallaxvertical">
                    <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="https://via.placeholder.com/1920x950"> 
                    
                    <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="shape"
                    data-height="auto"
                    data-whitespace="nowrap"
                    data-width="['660','1000','750','550']"
                    data-hoffset="['15','15','15','15']"
                    data-voffset="['-120','-100','-150','-130']"
                    data-x="['left','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-frames='[{"from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1000,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                    	<div class="title">Constraction Soluction</div>
                    </div>
					
                    <div class="tp-caption" 
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['660','1000','750','550']"
                    data-whitespace="normal"
                    data-hoffset="['15','15','15','15']"
                    data-voffset="['-50','-30','-80','-60']"
                    data-x="['left','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                    	<h1>Your Thought We Build</h1>
                    </div>
                    
                    <div class="tp-caption" 
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['660','1000','750','550']"
                    data-whitespace="normal"
                    data-hoffset="['15','15','15','15']"
                    data-voffset="['40','60','10','20']"
                    data-x="['left','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                    	<div class="text">Manzil Construction Agency Is Proud To Provide Most Reliable <br> Housing & Top Notch Construction Service.</div>
                    </div>
                    
                    <div class="tp-caption tp-resizeme" 
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['660','1000','750','550']"
                    data-whitespace="normal"
                    data-hoffset="['15','15','15','15']"
                    data-voffset="['145','160','120','110']"
                    data-x="['left','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                    	<div class="btns-box">
							<a href="#" class="theme-btn btn-style-three"><span class="txt">Our Services</span></a>
                    		<a href="#" class="theme-btn btn-style-two"><span class="txt">Join Us Now</span></a>
                        </div>
                    </div>
					
					<div class="tp-caption tp-shape tp-shapewrapper tp-resizeme"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="shape"
                    data-height="auto"
                    data-whitespace="nowrap"
                    data-width="none"
                    data-hoffset="['15','15','15','15']"
                    data-voffset="['55','15','15','15']"
                    data-x="['right','right','right','right']"
                    data-y="['middle','middle','middle','middle']"
                    data-frames='[{"from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1000,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                    	<figure class="content-image"><img src="https://via.placeholder.com/490x700" alt=""></figure>
                    </div>
                    
                    </li>
                    
                </ul>
            </div>
        </div>
		
		<!-- Slider Icon Scroll -->
		<div class="slider-icon-scroll scroll-to-target" data-target=".about-section"></div>
		
    </section>
    <!--End Main Slider-->
	
	<!-- About Section -->
	
	
	
	
	<!-- Main Footer -->
    <footer class="main-footer" style="background-image:url(https://via.placeholder.com/1920x718)">
    	<div class="auto-container">
        	<!--Widgets Section-->
            <div class="widgets-section">
            	<div class="row clearfix">
					
					<!-- Footer Column -->
					<div class="footer-column col-lg-4 col-md-6 col-sm-12">
						<div class="footer-widget logo-widget">
							<div class="widget-content">
								<div class="logo">
									<a href="index.html"><img src="https://via.placeholder.com/220x86" alt="" /></a>
								</div>
								<div class="text">
									<p>Manzil is an exclusive multi-purpose 100% responsive Template Theme with powerful features.</p>
									<p>Simple and well-structured coding, high quality and flexible layout, scalable features along with color schemes to create tailor-cut websites.</p>
								</div>
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
					
					<!-- Footer Column -->
					<div class="footer-column col-lg-4 col-md-6 col-sm-12">
						<div class="footer-widget links-widget">
							<h4>Useful Links</h4>
							<div class="row clearfix">
								<!-- Column -->
								<div class="column col-lg-6 col-sm-6 col-sm-12">
									<ul class="list-link">
										<li><a href="index.html">Home</a></li>
										<li><a href="services.html">Services</a></li>
										<li><a href="about.html">About us</a></li>
										<li><a href="testimonial.html">Testimonials</a></li>
										<li><a href="blog.html">News</a></li>
										<li><a href="projects.html">Portfolio</a></li>
									</ul>
								</div>
								<!-- Column -->
								<div class="column col-lg-6 col-sm-6 col-sm-12">
									<ul class="list-link">
										<li><a href="team.html">Team</a></li>
										<li><a href="faq.html">FAQ</a></li>
										<li><a href="projects.html">Gallery</a></li>
										<li><a href="contact.html">Contact</a></li>
									</ul>
								</div>
								
							</div>
							
						</div>
					</div>
					
					<!-- Footer Column -->
					<div class="footer-column col-lg-4 col-md-6 col-sm-12">
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
		
		<!-- Footer Bottom -->
		<div class="footer-bottom">
			<div class="auto-container">
				<div class="row clearfix">
					<!-- Column -->
					<div class="column col-lg-6 col-md-12 col-sm-12">
						<div class="copyright">&copy; All rights reserved by <a href="https://themeforest.net/user/themeexpo">themeexpo</a></div>
					</div>
					<!-- Column -->
					<div class="column col-lg-6 col-md-12 col-sm-12">
						<ul class="footer-nav">
							<li><a href="terms.html">Terms</a></li>
							<li><a href="privacy.html">Privacy & Policy</a></li>
							<li><a href="register.html">Join Us</a></li>
							<li><a href="contact.html">Need Help?</a></li>
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

<!-- Revolution Slider -->
<script src="plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="js/main-slider-script.js"></script>

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