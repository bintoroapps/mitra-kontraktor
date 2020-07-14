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
<?php echo $tracking_code->google_analytic ?>
<?php echo $tracking_code->google_tags ?>
<?php echo $tracking_code->google_search_console ?>
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
<?php echo $tracking_code->facebook_pixel ?>

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
	
	<!-- About Section -->
	
	
	<!-- Services Section -->
	<section class="services-section">
		<div class="image-layer" style="background-image:url(https://via.placeholder.com/1366x480)"></div>

		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title light centered">
				<div class="title">
					<!-- Title Effect -->
					<div class="title-effect">
						<div class="bar bar-top"></div>
						<div class="bar bar-right"></div>
						<div class="bar bar-bottom"></div>
						<div class="bar bar-left"></div>
					</div>
					Our Service
				</div>
				<h2>We Will Satisfy You By Our <br> Servicing Plan</h2>
			</div>
			<div class="four-item-carousel owl-carousel owl-theme">
				
				<!-- Service Block -->
				<div class="service-block">
					<div class="inner-box">
						<figure class="image-box">
							<img src="images/resource/service-1.jpg" alt="">
							<!--Overlay Box-->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<div class="icon-box">
											<span class="icon flaticon-mall-1"></span>
										</div>
										<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</div>
										<a href="property-sketching.html" class="read-more">Read More</a>
									</div>
								</div>
							</div>
						</figure>
						<!-- Lower Box -->
						<div class="lower-box">
							<h5><a href="property-sketching.html">Property Sketching</a></h5>
						</div>
					</div>
				</div>
				
				<!-- Service Block -->
				<div class="service-block">
					<div class="inner-box">
						<figure class="image-box">
							<img src="images/resource/service-2.jpg" alt="">
							<!--Overlay Box-->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<div class="icon-box">
											<span class="icon flaticon-mall-1"></span>
										</div>
										<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</div>
										<a href="interior-design.html" class="read-more">Read More</a>
									</div>
								</div>
							</div>
						</figure>
						<!-- Lower Box -->
						<div class="lower-box">
							<h5><a href="interior-design.html">Interior Designing</a></h5>
						</div>
					</div>
				</div>
				
				<!-- Service Block -->
				<div class="service-block">
					<div class="inner-box">
						<figure class="image-box">
							<img src="images/resource/service-3.jpg" alt="">
							<!--Overlay Box-->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<div class="icon-box">
											<span class="icon flaticon-mall-1"></span>
										</div>
										<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</div>
										<a href="interior-design.html" class="read-more">Read More</a>
									</div>
								</div>
							</div>
						</figure>
						<!-- Lower Box -->
						<div class="lower-box">
							<h5><a href="interior-design.html">Exterior Design</a></h5>
						</div>
					</div>
				</div>
				
				<!-- Service Block -->
				<div class="service-block">
					<div class="inner-box">
						<figure class="image-box">
							<img src="images/resource/service-4.jpg" alt="">
							<!--Overlay Box-->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<div class="icon-box">
											<span class="icon flaticon-mall-1"></span>
										</div>
										<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</div>
										<a href="plan-certification.html" class="read-more">Read More</a>
									</div>
								</div>
							</div>
						</figure>
						<!-- Lower Box -->
						<div class="lower-box">
							<h5><a href="plan-certification.html">Plan Estimations</a></h5>
						</div>
					</div>
				</div>
				
				<!-- Service Block -->
				<div class="service-block">
					<div class="inner-box">
						<figure class="image-box">
							<img src="images/resource/service-1.jpg" alt="">
							<!--Overlay Box-->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<div class="icon-box">
											<span class="icon flaticon-mall-1"></span>
										</div>
										<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</div>
										<a href="property-sketching.html" class="read-more">Read More</a>
									</div>
								</div>
							</div>
						</figure>
						<!-- Lower Box -->
						<div class="lower-box">
							<h5><a href="property-sketching.html">Property Sketching</a></h5>
						</div>
					</div>
				</div>
				
				<!-- Service Block -->
				<div class="service-block">
					<div class="inner-box">
						<figure class="image-box">
							<img src="images/resource/service-2.jpg" alt="">
							<!--Overlay Box-->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<div class="icon-box">
											<span class="icon flaticon-mall-1"></span>
										</div>
										<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</div>
										<a href="interior-design.html" class="read-more">Read More</a>
									</div>
								</div>
							</div>
						</figure>
						<!-- Lower Box -->
						<div class="lower-box">
							<h5><a href="interior-design.html">Interior Designing</a></h5>
						</div>
					</div>
				</div>
				
				<!-- Service Block -->
				<div class="service-block">
					<div class="inner-box">
						<figure class="image-box">
							<img src="images/resource/service-3.jpg" alt="">
							<!--Overlay Box-->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<div class="icon-box">
											<span class="icon flaticon-mall-1"></span>
										</div>
										<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</div>
										<a href="interior-design.html" class="read-more">Read More</a>
									</div>
								</div>
							</div>
						</figure>
						<!-- Lower Box -->
						<div class="lower-box">
							<h5><a href="interior-design.html">Exterior Design</a></h5>
						</div>
					</div>
				</div>
				
				<!-- Service Block -->
				<div class="service-block">
					<div class="inner-box">
						<figure class="image-box">
							<img src="images/resource/service-4.jpg" alt="">
							<!--Overlay Box-->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<div class="icon-box">
											<span class="icon flaticon-mall-1"></span>
										</div>
										<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</div>
										<a href="plan-certification.html" class="read-more">Read More</a>
									</div>
								</div>
							</div>
						</figure>
						<!-- Lower Box -->
						<div class="lower-box">
							<h5><a href="plan-certification.html">Plan Estimations</a></h5>
						</div>
					</div>
				</div>
				
				<!-- Service Block -->
				<div class="service-block">
					<div class="inner-box">
						<figure class="image-box">
							<img src="images/resource/service-1.jpg" alt="">
							<!--Overlay Box-->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<div class="icon-box">
											<span class="icon flaticon-mall-1"></span>
										</div>
										<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</div>
										<a href="property-sketching.html" class="read-more">Read More</a>
									</div>
								</div>
							</div>
						</figure>
						<!-- Lower Box -->
						<div class="lower-box">
							<h5><a href="property-sketching.html">Property Sketching</a></h5>
						</div>
					</div>
				</div>
				
				<!-- Service Block -->
				<div class="service-block">
					<div class="inner-box">
						<figure class="image-box">
							<img src="images/resource/service-2.jpg" alt="">
							<!--Overlay Box-->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<div class="icon-box">
											<span class="icon flaticon-mall-1"></span>
										</div>
										<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</div>
										<a href="interior-design.html" class="read-more">Read More</a>
									</div>
								</div>
							</div>
						</figure>
						<!-- Lower Box -->
						<div class="lower-box">
							<h5><a href="interior-design.html">Interior Designing</a></h5>
						</div>
					</div>
				</div>
				
				<!-- Service Block -->
				<div class="service-block">
					<div class="inner-box">
						<figure class="image-box">
							<img src="images/resource/service-3.jpg" alt="">
							<!--Overlay Box-->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<div class="icon-box">
											<span class="icon flaticon-mall-1"></span>
										</div>
										<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</div>
										<a href="interior-design.html" class="read-more">Read More</a>
									</div>
								</div>
							</div>
						</figure>
						<!-- Lower Box -->
						<div class="lower-box">
							<h5><a href="interior-design.html">Exterior Design</a></h5>
						</div>
					</div>
				</div>
				
				<!-- Service Block -->
				<div class="service-block">
					<div class="inner-box">
						<figure class="image-box">
							<img src="images/resource/service-4.jpg" alt="">
							<!--Overlay Box-->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<div class="icon-box">
											<span class="icon flaticon-mall-1"></span>
										</div>
										<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</div>
										<a href="plan-certification.html" class="read-more">Read More</a>
									</div>
								</div>
							</div>
						</figure>
						<!-- Lower Box -->
						<div class="lower-box">
							<h5><a href="plan-certification.html">Plan Estimations</a></h5>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Services Section -->
	
	<!-- Call To Action Section -->

	<!-- End Call To Action Section -->
	
	<!-- Skill Section -->
	<section class="skill-section" style="background-image:url(images/background/2.jpg)">
		<div class="image-layer" style="background-image:url(images/background/pattern-2.png)"></div>
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
					Our Skills
				</div>
				<h2>We are giving you a chance <br> to build your dream</h2>
			</div>
			<div class="row clearfix">
				
				<!-- Skill Column -->
				<div class="skill-column col-lg-4 col-md-6 col-sm-12">
					<div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						
						<div class="skill-block">
							<div class="bar-item">
								<div class="skill-title">General Consulting</div>
								<div class="skill-bar">
									<div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="99">0</span>%</div></div>
									<div class="bar-inner"><div class="bar progress-line" data-height="99"></div></div>
								</div>
							</div>
							<div class="bar-item">
								<div class="skill-title">Construction Management</div>
								<div class="skill-bar">
									<div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="99">0</span>%</div></div>
									<div class="bar-inner"><div class="bar progress-line" data-height="99"></div></div>
								</div>
							</div>
							<div class="bar-item">
								<div class="skill-title">Design & Build</div>
								<div class="skill-bar">
									<div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="60">0</span>%</div></div>
									<div class="bar-inner"><div class="bar progress-line" data-height="60"></div></div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
				<!-- Image Column -->
				<div class="image-column col-lg-4 col-md-12 col-sm-12">
					<div class="inner-column wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<img src="images/resource/accordian.png" alt="" />
						</div>
					</div>
				</div>
				
				<!-- Skill Column -->
				<div class="skill-column right-column col-lg-4 col-md-6 col-sm-12">
					<div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
						
						<div class="skill-block">
							<div class="bar-item">
								<div class="skill-title">General Consulting</div>
								<div class="skill-bar">
									<div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="65">0</span>%</div></div>
									<div class="bar-inner"><div class="bar progress-line" data-height="65"></div></div>
								</div>
							</div>
							<div class="bar-item">
								<div class="skill-title">Construction Management</div>
								<div class="skill-bar">
									<div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="75">0</span>%</div></div>
									<div class="bar-inner"><div class="bar progress-line" data-height="75"></div></div>
								</div>
							</div>
							<div class="bar-item">
								<div class="skill-title">Design & Build</div>
								<div class="skill-bar">
									<div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="90">0</span>%</div></div>
									<div class="bar-inner"><div class="bar progress-line" data-height="90"></div></div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Skill Section -->
	
	<!-- Testimonial Section -->
	<section class="testimonial-section" style="background-image:url(https://via.placeholder.com/1920x930)">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title light">
				<div class="title">
					<!-- Title Effect -->
					<div class="title-effect">
						<div class="bar bar-top"></div>
						<div class="bar bar-right"></div>
						<div class="bar bar-bottom"></div>
						<div class="bar bar-left"></div>
					</div>
					Testimonial
				</div>
				<h2>We Have Many Satisfied <br> Clients Say About Us</h2>
			</div>
			<div class="testimonial-carousel owl-carousel owl-theme">
				
				<!-- Testimonial Block -->
				<div class="testimonial-block">
					<div class="inner-box">
						<div class="quote-icon flaticon-quote-4"></div>
						<div class="rating">
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star-o"></span>
						</div>
						<div class="text">“Makin their way the only way they know how that’s just a little bit more than the law will allow these happy days are you. leads a rag tag fugitive fleet on a lonely”</div>
						<h6>Malika Morla</h6>
						<div class="author-image">
							<img src="images/resource/author-1.jpg" alt="" />
						</div>
					</div>
				</div>
				
				<!-- Testimonial Block -->
				<div class="testimonial-block">
					<div class="inner-box">
						<div class="quote-icon flaticon-quote-4"></div>
						<div class="rating">
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star-o"></span>
						</div>
						<div class="text">Don’t buy this theme, you won’t be able to resist its charm. Right, like you’re charmed. A theme that is truly multipurpose and flexible.</div>
						<h6>Smith Makan</h6>
						<div class="author-image">
							<img src="images/resource/author-2.jpg" alt="" />
						</div>
					</div>
				</div>
				
				<!-- Testimonial Block -->
				<div class="testimonial-block">
					<div class="inner-box">
						<div class="quote-icon flaticon-quote-4"></div>
						<div class="rating">
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star-o"></span>
						</div>
						<div class="text">Interesting design and concept, beautiful presentation and functional features are what make this theme worth your time, money and effort.</div>
						<h6>Rajor Fatia</h6>
						<div class="author-image">
							<img src="images/resource/author-3.jpg" alt="" />
						</div>
					</div>
				</div>
				
				<!-- Testimonial Block -->
				<div class="testimonial-block">
					<div class="inner-box">
						<div class="quote-icon flaticon-quote-4"></div>
						<div class="rating">
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star-o"></span>
						</div>
						<div class="text">“Makin their way the only way they know how that’s just a little bit more than the law will allow these happy days are you. leads a rag tag fugitive fleet on a lonely”</div>
						<h6>Malika Morla</h6>
						<div class="author-image">
							<img src="images/resource/author-1.jpg" alt="" />
						</div>
					</div>
				</div>
				
				<!-- Testimonial Block -->
				<div class="testimonial-block">
					<div class="inner-box">
						<div class="quote-icon flaticon-quote-4"></div>
						<div class="rating">
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star-o"></span>
						</div>
						<div class="text">Don’t buy this theme, you won’t be able to resist its charm. Right, like you’re charmed. A theme that is truly multipurpose and flexible.</div>
						<h6>Smith Makan</h6>
						<div class="author-image">
							<img src="images/resource/author-2.jpg" alt="" />
						</div>
					</div>
				</div>
				
				<!-- Testimonial Block -->
				<div class="testimonial-block">
					<div class="inner-box">
						<div class="quote-icon flaticon-quote-4"></div>
						<div class="rating">
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star-o"></span>
						</div>
						<div class="text">Interesting design and concept, beautiful presentation and functional features are what make this theme worth your time, money and effort.</div>
						<h6>Rajor Fatia</h6>
						<div class="author-image">
							<img src="images/resource/author-3.jpg" alt="" />
						</div>
					</div>
				</div>
				
			</div>
			<!-- Lower Text -->
			<div class="lower-text">Don’t think so more about success rate. <a href="#">Let’s get started</a></div>
			
		</div>
	</section>
	<!-- End Testimonial Section -->
	
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
                        <li class="filter" data-role="button" data-filter=".building">Buildings</li>
                        <li class="filter" data-role="button" data-filter=".bridge">Modern Bridge</li>
                        <li class="filter" data-role="button" data-filter=".houses">Houses</li>
                        <li class="filter" data-role="button" data-filter=".interiors">Interiors</li>
                    </ul>
                    
                </div>
                
                <div class="filter-list row clearfix">
					
					<!-- Gallery Block -->
					<div class="gallery-block mix all houses interiors col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box">
							<figure class="image-box">
								<img src="https://via.placeholder.com/370x370" alt="">
								<!-- Overlay Box -->
								<div class="overlay-box">
									<div class="overlay-inner">
										<div class="content">
											<h6><a href="portfolio-detail.html">Construction Build</a></h6>
											<div class="category">Roof Filling</div>
										</div>
									</div>
								</div>
								<a href="https://via.placeholder.com/370x370" data-fancybox="gallery-1" data-caption="" class="link"><span class="icon flaticon-full-screen"></span></a>
							</figure>
						</div>
					</div>
					
					<!-- Gallery Block -->
					<div class="gallery-block mix all building interiors col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box">
							<figure class="image-box">
								<img src="https://via.placeholder.com/370x370" alt="">
								<!-- Overlay Box -->
								<div class="overlay-box">
									<div class="overlay-inner">
										<div class="content">
											<h6><a href="portfolio-detail.html">Construction Build</a></h6>
											<div class="category">Roof Filling</div>
										</div>
									</div>
								</div>
								<a href="https://via.placeholder.com/370x370" data-fancybox="gallery-1" data-caption="" class="link"><span class="icon flaticon-full-screen"></span></a>
							</figure>
						</div>
					</div>
					
					<!-- Gallery Block -->
					<div class="gallery-block mix all houses interiors col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box">
							<figure class="image-box">
								<img src="https://via.placeholder.com/370x370" alt="">
								<!-- Overlay Box -->
								<div class="overlay-box">
									<div class="overlay-inner">
										<div class="content">
											<h6><a href="portfolio-detail.html">Construction Build</a></h6>
											<div class="category">Roof Filling</div>
										</div>
									</div>
								</div>
								<a href="https://via.placeholder.com/370x370" data-fancybox="gallery-1" data-caption="" class="link"><span class="icon flaticon-full-screen"></span></a>
							</figure>
						</div>
					</div>
					
					<!-- Gallery Block -->
					<div class="gallery-block mix all houses building bridge col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box">
							<figure class="image-box">
								<img src="https://via.placeholder.com/370x370" alt="">
								<!-- Overlay Box -->
								<div class="overlay-box">
									<div class="overlay-inner">
										<div class="content">
											<h6><a href="portfolio-detail.html">Construction Build</a></h6>
											<div class="category">Roof Filling</div>
										</div>
									</div>
								</div>
								<a href="https://via.placeholder.com/370x370" data-fancybox="gallery-1" data-caption="" class="link"><span class="icon flaticon-full-screen"></span></a>
							</figure>
						</div>
					</div>
					
					<!-- Gallery Block -->
					<div class="gallery-block mix all houses interiors col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box">
							<figure class="image-box">
								<img src="https://via.placeholder.com/370x370" alt="">
								<!-- Overlay Box -->
								<div class="overlay-box">
									<div class="overlay-inner">
										<div class="content">
											<h6><a href="portfolio-detail.html">Construction Build</a></h6>
											<div class="category">Roof Filling</div>
										</div>
									</div>
								</div>
								<a href="https://via.placeholder.com/370x370" data-fancybox="gallery-1" data-caption="" class="link"><span class="icon flaticon-full-screen"></span></a>
							</figure>
						</div>
					</div>
					
					<!-- Gallery Block -->
					<div class="gallery-block mix all bridge building col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box">
							<figure class="image-box">
								<img src="https://via.placeholder.com/370x370" alt="">
								<!-- Overlay Box -->
								<div class="overlay-box">
									<div class="overlay-inner">
										<div class="content">
											<h6><a href="portfolio-detail.html">Construction Build</a></h6>
											<div class="category">Roof Filling</div>
										</div>
									</div>
								</div>
								<a href="https://via.placeholder.com/370x370" data-fancybox="gallery-1" data-caption="" class="link"><span class="icon flaticon-full-screen"></span></a>
							</figure>
						</div>
					</div>
					
				</div>
				
			</div>
			
			<!-- Lower Text -->
			<div class="lower-text">
				<div class="text">If you want to more project then you <a href="projects.html">Click Here Now</a></div>
			</div>
			
		</div>
	</section>
	<!-- End Gallery Section -->
	
	<!-- Team Section -->
	<section class="team-section">
		<div class="image-layer" style="background-image:url(https://via.placeholder.com/1920x600)"></div>
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title light centered">
				<div class="title">
					<!-- Title Effect -->
					<div class="title-effect">
						<div class="bar bar-top"></div>
						<div class="bar bar-right"></div>
						<div class="bar bar-bottom"></div>
						<div class="bar bar-left"></div>
					</div>
					Our Team
				</div>
				<h2>Our Expert Team Members <br> Will Help You</h2>
			</div>
			<div class="three-item-carousel owl-carousel owl-theme">
				
				<!-- Team Block -->
				<div class="team-block">
					<div class="inner-box">
						<div class="image">
							<img src="images/resource/team-1.jpg" alt="" />
							<!-- Social Box -->
							<ul class="social-box">
								<li><a href="#" class="fa fa-facebook-f"></a></li>
								<li><a href="#" class="fa fa-linkedin"></a></li>
								<li><a href="#" class="fa fa-twitter"></a></li>
								<li><a href="#" class="fa fa-google"></a></li>
							</ul>
						</div>
						<div class="lower-content">
							<h5><a href="team-detail.html">Celsiya Malocm</a></h5>
							<div class="designation">Builder Advisor</div>
							<!-- Arrows -->
							<a href="team-detail.html" class="team-arrows-right">
								<div class="chevron"></div>
								<div class="chevron"></div>
								<div class="chevron"></div>
								<div class="chevron"></div>
							</a>
							
						</div>
					</div>
				</div>
				
				<!-- Team Block -->
				<div class="team-block">
					<div class="inner-box">
						<div class="image">
							<img src="images/resource/team-2.jpg" alt="" />
							<!-- Social Box -->
							<ul class="social-box">
								<li><a href="#" class="fa fa-facebook-f"></a></li>
								<li><a href="#" class="fa fa-linkedin"></a></li>
								<li><a href="#" class="fa fa-twitter"></a></li>
								<li><a href="#" class="fa fa-google"></a></li>
							</ul>
						</div>
						<div class="lower-content">
							<h5><a href="team-detail.html">Nelson Mecoy</a></h5>
							<div class="designation">Architecture</div>
							<!-- Arrows -->
							<a href="team-detail.html" class="team-arrows-right">
								<div class="chevron"></div>
								<div class="chevron"></div>
								<div class="chevron"></div>
								<div class="chevron"></div>
							</a>
							
						</div>
					</div>
				</div>
				
				<!-- Team Block -->
				<div class="team-block">
					<div class="inner-box">
						<div class="image">
							<img src="images/resource/team-3.jpg" alt="" />
							<!-- Social Box -->
							<ul class="social-box">
								<li><a href="#" class="fa fa-facebook-f"></a></li>
								<li><a href="#" class="fa fa-linkedin"></a></li>
								<li><a href="#" class="fa fa-twitter"></a></li>
								<li><a href="#" class="fa fa-google"></a></li>
							</ul>
						</div>
						<div class="lower-content">
							<h5><a href="team-detail.html">Andrea Spilber</a></h5>
							<div class="designation">Project Manager</div>
							<!-- Arrows -->
							<a href="team-detail.html" class="team-arrows-right">
								<div class="chevron"></div>
								<div class="chevron"></div>
								<div class="chevron"></div>
								<div class="chevron"></div>
							</a>
							
						</div>
					</div>
				</div>
				
				<!-- Team Block -->
				<div class="team-block">
					<div class="inner-box">
						<div class="image">
							<img src="images/resource/team-1.jpg" alt="" />
							<!-- Social Box -->
							<ul class="social-box">
								<li><a href="#" class="fa fa-facebook-f"></a></li>
								<li><a href="#" class="fa fa-linkedin"></a></li>
								<li><a href="#" class="fa fa-twitter"></a></li>
								<li><a href="#" class="fa fa-google"></a></li>
							</ul>
						</div>
						<div class="lower-content">
							<h5><a href="team-detail.html">Celsiya Malocm</a></h5>
							<div class="designation">Builder Advisor</div>
							<!-- Arrows -->
							<a href="team-detail.html" class="team-arrows-right">
								<div class="chevron"></div>
								<div class="chevron"></div>
								<div class="chevron"></div>
								<div class="chevron"></div>
							</a>
							
						</div>
					</div>
				</div>
				
				<!-- Team Block -->
				<div class="team-block">
					<div class="inner-box">
						<div class="image">
							<img src="images/resource/team-2.jpg" alt="" />
							<!-- Social Box -->
							<ul class="social-box">
								<li><a href="#" class="fa fa-facebook-f"></a></li>
								<li><a href="#" class="fa fa-linkedin"></a></li>
								<li><a href="#" class="fa fa-twitter"></a></li>
								<li><a href="#" class="fa fa-google"></a></li>
							</ul>
						</div>
						<div class="lower-content">
							<h5><a href="team-detail.html">Nelson Mecoy</a></h5>
							<div class="designation">Architecture</div>
							<!-- Arrows -->
							<a href="team-detail.html" class="team-arrows-right">
								<div class="chevron"></div>
								<div class="chevron"></div>
								<div class="chevron"></div>
								<div class="chevron"></div>
							</a>
							
						</div>
					</div>
				</div>
				
				<!-- Team Block -->
				<div class="team-block">
					<div class="inner-box">
						<div class="image">
							<img src="images/resource/team-3.jpg" alt="" />
							<!-- Social Box -->
							<ul class="social-box">
								<li><a href="#" class="fa fa-facebook-f"></a></li>
								<li><a href="#" class="fa fa-linkedin"></a></li>
								<li><a href="#" class="fa fa-twitter"></a></li>
								<li><a href="#" class="fa fa-google"></a></li>
							</ul>
						</div>
						<div class="lower-content">
							<h5><a href="team-detail.html">Andrea Spilber</a></h5>
							<div class="designation">Project Manager</div>
							<!-- Arrows -->
							<a href="team-detail.html" class="team-arrows-right">
								<div class="chevron"></div>
								<div class="chevron"></div>
								<div class="chevron"></div>
								<div class="chevron"></div>
							</a>
							
						</div>
					</div>
				</div>
				
				<!-- Team Block -->
				<div class="team-block">
					<div class="inner-box">
						<div class="image">
							<img src="images/resource/team-1.jpg" alt="" />
							<!-- Social Box -->
							<ul class="social-box">
								<li><a href="#" class="fa fa-facebook-f"></a></li>
								<li><a href="#" class="fa fa-linkedin"></a></li>
								<li><a href="#" class="fa fa-twitter"></a></li>
								<li><a href="#" class="fa fa-google"></a></li>
							</ul>
						</div>
						<div class="lower-content">
							<h5><a href="team-detail.html">Celsiya Malocm</a></h5>
							<div class="designation">Builder Advisor</div>
							<!-- Arrows -->
							<a href="team-detail.html" class="team-arrows-right">
								<div class="chevron"></div>
								<div class="chevron"></div>
								<div class="chevron"></div>
								<div class="chevron"></div>
							</a>
							
						</div>
					</div>
				</div>
				
				<!-- Team Block -->
				<div class="team-block">
					<div class="inner-box">
						<div class="image">
							<img src="images/resource/team-2.jpg" alt="" />
							<!-- Social Box -->
							<ul class="social-box">
								<li><a href="#" class="fa fa-facebook-f"></a></li>
								<li><a href="#" class="fa fa-linkedin"></a></li>
								<li><a href="#" class="fa fa-twitter"></a></li>
								<li><a href="#" class="fa fa-google"></a></li>
							</ul>
						</div>
						<div class="lower-content">
							<h5><a href="team-detail.html">Nelson Mecoy</a></h5>
							<div class="designation">Architecture</div>
							<!-- Arrows -->
							<a href="team-detail.html" class="team-arrows-right">
								<div class="chevron"></div>
								<div class="chevron"></div>
								<div class="chevron"></div>
								<div class="chevron"></div>
							</a>
							
						</div>
					</div>
				</div>
				
				<!-- Team Block -->
				<div class="team-block">
					<div class="inner-box">
						<div class="image">
							<img src="images/resource/team-3.jpg" alt="" />
							<!-- Social Box -->
							<ul class="social-box">
								<li><a href="#" class="fa fa-facebook-f"></a></li>
								<li><a href="#" class="fa fa-linkedin"></a></li>
								<li><a href="#" class="fa fa-twitter"></a></li>
								<li><a href="#" class="fa fa-google"></a></li>
							</ul>
						</div>
						<div class="lower-content">
							<h5><a href="team-detail.html">Andrea Spilber</a></h5>
							<div class="designation">Project Manager</div>
							<!-- Arrows -->
							<a href="team-detail.html" class="team-arrows-right">
								<div class="chevron"></div>
								<div class="chevron"></div>
								<div class="chevron"></div>
								<div class="chevron"></div>
							</a>
							
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Team Section -->
	
	<!-- News Section -->
	<section class="news-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title">
				<div class="title">
					<!-- Title Effect -->
					<div class="title-effect">
						<div class="bar bar-top"></div>
						<div class="bar bar-right"></div>
						<div class="bar bar-bottom"></div>
						<div class="bar bar-left"></div>
					</div>
					Our Latest New
				</div>
				<h2>Learn Something More <br> From Our News and Artical</h2>
			</div>
			
			<div class="single-item-carousel owl-carousel owl-theme">
			
				<div class="slide">
			
					<div class="row clearfix">
						
						<!-- Column -->
						<div class="column col-lg-8 col-md-12 col-sm-12">
						
							<!-- News Block -->
							<div class="news-block">
								<div class="inner-box">
									<div class="image">
										<div class="post-date">20 / 12 / 2020</div>
										<a href="news-detail.html"><img src="images/resource/news-1.jpg" alt="" /></a>
									</div>
									<div class="lower-content">
										<ul class="post-meta">
											<li>24 Likes</li>
											<li>3 Comments</li>
											<li>By Admin Rose</li>
										</ul>
										<h3><a href="news-detail.html">Building Public Support For A Severige work Bond in your Smart Referendum</a></h3>
									</div>
								</div>
							</div>
							
						</div>
						
						<!-- Column -->
						<div class="column col-lg-4 col-md-12 col-sm-12">
							
							<!-- News Block Two -->
							<div class="news-block-two">
								<div class="inner-box">
									<div class="image">
										<div class="post-date">20 / 12 / 2019</div>
										<a href="news-detail.html"><img src="images/resource/news-2.jpg" alt="" /></a>
									</div>
									<div class="lower-content">
										<ul class="post-meta">
											<li>24 Likes</li>
											<li>3 Comments</li>
											<li>By Admin Rose</li>
										</ul>
										<h4><a href="news-detail.html">High quality work for demand our customer.</a></h4>
									</div>
								</div>
							</div>
							
							<!-- News Block Two -->
							<div class="news-block-two">
								<div class="inner-box">
									<div class="image">
										<div class="post-date">20 / 12 / 2019</div>
										<a href="news-detail.html"><img src="images/resource/news-3.jpg" alt="" /></a>
									</div>
									<div class="lower-content">
										<ul class="post-meta">
											<li>24 Likes</li>
											<li>3 Comments</li>
											<li>By Admin Rose</li>
										</ul>
										<h4><a href="news-detail.html">Satisfection for the customer our first parity.</a></h4>
									</div>
								</div>
							</div>
							
						</div>
						
					</div>
				
				</div>
				
				<div class="slide">
			
					<div class="row clearfix">
						
						<!-- Column -->
						<div class="column col-lg-8 col-md-12 col-sm-12">
						
							<!-- News Block -->
							<div class="news-block">
								<div class="inner-box">
									<div class="image">
										<div class="post-date">20 / 12 / 2020</div>
										<a href="news-detail.html"><img src="images/resource/news-1.jpg" alt="" /></a>
									</div>
									<div class="lower-content">
										<ul class="post-meta">
											<li>24 Likes</li>
											<li>3 Comments</li>
											<li>By Admin Rose</li>
										</ul>
										<h3><a href="news-detail.html">Building Public Support For A Severige work Bond in your Smart Referendum</a></h3>
									</div>
								</div>
							</div>
							
						</div>
						
						<!-- Column -->
						<div class="column col-lg-4 col-md-12 col-sm-12">
							
							<!-- News Block Two -->
							<div class="news-block-two">
								<div class="inner-box">
									<div class="image">
										<div class="post-date">20 / 12 / 2019</div>
										<a href="news-detail.html"><img src="images/resource/news-2.jpg" alt="" /></a>
									</div>
									<div class="lower-content">
										<ul class="post-meta">
											<li>24 Likes</li>
											<li>3 Comments</li>
											<li>By Admin Rose</li>
										</ul>
										<h4><a href="news-detail.html">High quality work for demand our customer.</a></h4>
									</div>
								</div>
							</div>
							
							<!-- News Block Two -->
							<div class="news-block-two">
								<div class="inner-box">
									<div class="image">
										<div class="post-date">20 / 12 / 2019</div>
										<a href="news-detail.html"><img src="images/resource/news-3.jpg" alt="" /></a>
									</div>
									<div class="lower-content">
										<ul class="post-meta">
											<li>24 Likes</li>
											<li>3 Comments</li>
											<li>By Admin Rose</li>
										</ul>
										<h4><a href="news-detail.html">Satisfection for the customer our first parity.</a></h4>
									</div>
								</div>
							</div>
							
						</div>
						
					</div>
				
				</div>
				
				<div class="slide">
			
					<div class="row clearfix">
						
						<!-- Column -->
						<div class="column col-lg-8 col-md-12 col-sm-12">
						
							<!-- News Block -->
							<div class="news-block">
								<div class="inner-box">
									<div class="image">
										<div class="post-date">20 / 12 / 2020</div>
										<a href="news-detail.html"><img src="images/resource/news-1.jpg" alt="" /></a>
									</div>
									<div class="lower-content">
										<ul class="post-meta">
											<li>24 Likes</li>
											<li>3 Comments</li>
											<li>By Admin Rose</li>
										</ul>
										<h3><a href="news-detail.html">Building Public Support For A Severige work Bond in your Smart Referendum</a></h3>
									</div>
								</div>
							</div>
							
						</div>
						
						<!-- Column -->
						<div class="column col-lg-4 col-md-12 col-sm-12">
							
							<!-- News Block Two -->
							<div class="news-block-two">
								<div class="inner-box">
									<div class="image">
										<div class="post-date">20 / 12 / 2019</div>
										<a href="news-detail.html"><img src="images/resource/news-2.jpg" alt="" /></a>
									</div>
									<div class="lower-content">
										<ul class="post-meta">
											<li>24 Likes</li>
											<li>3 Comments</li>
											<li>By Admin Rose</li>
										</ul>
										<h4><a href="news-detail.html">High quality work for demand our customer.</a></h4>
									</div>
								</div>
							</div>
							
							<!-- News Block Two -->
							<div class="news-block-two">
								<div class="inner-box">
									<div class="image">
										<div class="post-date">20 / 12 / 2019</div>
										<a href="news-detail.html"><img src="images/resource/news-3.jpg" alt="" /></a>
									</div>
									<div class="lower-content">
										<ul class="post-meta">
											<li>24 Likes</li>
											<li>3 Comments</li>
											<li>By Admin Rose</li>
										</ul>
										<h4><a href="news-detail.html">Satisfection for the customer our first parity.</a></h4>
									</div>
								</div>
							</div>
							
						</div>
						
					</div>
				
				</div>
				
			</div>
			
		</div>
	</section>
	<!-- End News Section -->
	
	<!-- Main Footer -->
    <footer class="main-footer" style="background-image: url(<?= $company_data->company_footer ? base_url('media/' . $company_data->company_footer) : base_url('images/background/5.jpg') ?>);">
    	<div class="auto-container">
        	<!--Widgets Section-->
            <div class="widgets-section">
            	<div class="row clearfix">
					
					<!-- Footer Column -->
					<div class="footer-column col-lg-4 col-md-6 col-sm-12">
						<div class="footer-widget logo-widget">
							<div class="widget-content">
								<div class="logo">
									<a href="<?php echo base_url() ?>">
                                    <img loading="lazy" src="<?php echo $company_data->media_id ? base_url('media/' . $company_data->media_name) : base_url('images/logo-2.png') ?>" alt="">
                                    </a>
								</div>
								<div class="text">
									<p><?php echo $company_data->company_description ?></p>
								</div>
								<!-- Social Box -->
								<ul class="social-box">
									<li><a href="<?= $company_data->company_facebook ? $company_data->company_facebook : '#' ?>" target="_blank" class="fa fa-facebook-f"></a></li>
									<li><a href="<?= $company_data->company_youtube ? $company_data->company_youtube : '#' ?>" target="_blank" class="fa fa-youtube"></a></li>
									<li><a href="<?= $company_data->company_youtube ? $company_data->company_instagram : '#' ?>" target="_blank" class="fa fa-instagram"></a></li>
									<li><a href=""<?= $company_data->company_whatsapp ? 'https://api.whatsapp.com/send?phone=62' . str_replace(' ', '', $company_data->company_whatsapp) : '#' ?>" class="fa fa-whatsapp"></a></li>
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
						<div class="copyright">&copy; All rights reserved by <a href="https://bintorocorp.co.id">Bintorocorp.</a></div>
					</div>
					<!-- Column -->

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