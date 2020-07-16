<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Template');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Template::index');
$routes->get('/about-us', 'Template::aboutUs');
$routes->get('/faq', 'Template::faq');
$routes->get('/team', 'Template::ourTeam');
$routes->get('/services', 'Template::services');
$routes->get('/services/(:any)', 'Template::serviceDetail/$1');
$routes->get('/projects', 'Template::projects');
$routes->get('/projects/(:any)', 'Template::projectDetail/$1');
$routes->get('/projectsloadmore', 'Template::projectLoadMore');
$routes->get('/projectsimageloadmore', 'Template::projectImagesLoadMore');
$routes->get('/blog', 'Template::blog');
// $routes->get('/blog/(:any)', 'Template::blogDetail/$1');
$routes->get('/blogloadmore', 'Template::blogLoadMore');
$routes->get('/contact', 'Template::contact');
$routes->get('/sitemap_index.xml', 'SiteMapController::index');

$routes->get('/team/(:any)', 'Template::teamdetail/$1');

// ------------------ ADMIN ------------------ //
$routes->match(['get', 'post'], '/admin', 'Auth::index', ['filter' => 'noauth']);

$routes->group('admin', ['filter' => 'auth'], function($routes) {
	$routes->get('dashboard', 'Dashboard::index');
	$routes->get('logout', 'Auth::logout');
	$routes->match(['get', 'post'],'company-profile', 'Company::index');
	$routes->match(['get','post'],'tampilan-website/home', 'HomePageController::index');
	$routes->get('tampilan-website/home/keyphrase-check', 'HomePageController::keyphraseCheck');
	$routes->get('tampilan-website/home/getHeader', 'HomePageController::getHeader');
	$routes->get('tampilan-website/home/getMedia', 'HomePageController::getMedia');
	$routes->post('tampilan-website/home/newHeaderText', 'HomePageController::newHeaderText');
	$routes->post('tampilan-website/home/changeMediaHeader', 'HomePageController::changeMediaHeader');
	$routes->get('tampilan-website/home/getEditImage', 'HomePageController::getEditImage');
	$routes->post('tampilan-website/home/changeMedia2Img1', 'HomePageController::changeMedia2Img1');
	$routes->post('tampilan-website/home/changeMedia2Alt1', 'HomePageController::changeMedia2Alt1');
	$routes->post('tampilan-website/home/updateHome', 'HomePageController::updateHome');
	$routes->get('tampilan-website/home/getEditBackground', 'HomePageController::getEditBackground');
	$routes->get('tampilan-website/home/getTeamOption', 'HomePageController::getTeamOption');
	$routes->match(['get', 'post'],'tampilan-website/about', 'AboutPageController::index');
	$routes->get('tampilan-website/about/keyphrase-check', 'AboutPageController::keyphraseCheck');
	$routes->get('tampilan-website/about/getEditBackground', 'AboutPageController::getEditBackground');
	$routes->post('tampilan-website/about/update', 'AboutPageController::update');
	$routes->get('tampilan-website/about/getEditImage', 'AboutPageController::getEditImage');
	$routes->match(['get', 'post'],'tampilan-website/faq', 'FaqPageController::index');
	$routes->get('tampilan-website/faq/keyphrase-check', 'FaqPageController::keyphraseCheck');
	$routes->get('tampilan-website/faq/getEditImage', 'FaqPageController::getEditImage');
	$routes->post('tampilan-website/faq/update', 'FaqPageController::update');
	$routes->get('tampilan-website/faq/getEditBackground', 'FaqPageController::getEditBackground');
	$routes->match(['get', 'post'],'tampilan-website/team', 'TeamPageController::index');
	$routes->get('tampilan-website/team/getEditImage', 'TeamPageController::getEditImage');
	$routes->match(['post', 'get'],'tampilan-website/team/update', 'TeamPageController::update');
	$routes->get('tampilan-website/team/getEditBackground', 'TeamPageController::getEditBackground');
	$routes->match(['get', 'post'],'tampilan-website/project', 'ProjectController::index');
	$routes->get('tampilan-website/project/getEditImage', 'ProjectController::getEditImage');
	$routes->post('tampilan-website/project/update', 'ProjectController::update');
	$routes->get('tampilan-website/project/getEditBackground', 'ProjectController::getEditBackground');
	$routes->match(['get', 'post'],'tampilan-website/service', 'ServicePageController::index');
	$routes->get('tampilan-website/service/getEditImage', 'ServicePageController::getEditImage');
	$routes->post('tampilan-website/service/update', 'ServicePageController::update');
	$routes->get('tampilan-website/service/getEditBackground', 'ServicePageController::getEditBackground');
	$routes->get('tampilan-website/service/getAddSlider', 'ServicePageController::getAddSlider');
	$routes->get('jasa', 'JasaController::index');
	$routes->match(['get', 'post'],'jasa/create', 'JasaController::create');
	$routes->get('jasa/detail/(:any)', 'JasaController::detail/$1');
	$routes->match(['get', 'post'],'jasa/edit/(:any)', 'JasaController::edit/$1');
	$routes->post('jasa/delete', 'JasaController::delete');
	$routes->match(['get', 'post'],'jasa/layout/(:any)', 'JasaController::layout/$1');
	$routes->match(['post'],'jasa/seo/(:any)', 'JasaController::seo/$1');
	$routes->get('jasa/tampilan/getEditBackground', 'JasaController::getEditBackground');
	$routes->post('jasa/tampilan/update', 'JasaController::update');
	$routes->get('jasa/tampilan/getEditImage', 'JasaController::getEditImage');
	$routes->match(['get', 'post'],'tampilan-website/blog', 'BlogPageController::index');
	$routes->get('tampilan-website/blog/getEditImage', 'BlogPageController::getEditImage');
	$routes->post('tampilan-website/blog/update', 'BlogPageController::update');
	$routes->get('tampilan-website/blog/getEditBackground', 'BlogPageController::getEditBackground');
	$routes->match(['get', 'post'],'tampilan-website/contact', 'ContactController::index');
	$routes->get('tampilan-website/contact/getEditImage', 'ContactController::getEditImage');
	$routes->post('tampilan-website/contact/update', 'ContactController::update');
	$routes->get('tampilan-website/contact/getEditBackground', 'ContactController::getEditBackground');
	$routes->match(['get','post'],'kupon', 'KuponController::index');
	$routes->post('kupon/delete', 'KuponController::delete');
	$routes->get('portfolio', 'PortfolioController::index');
	$routes->match(['get','post'],'portfolio/create', 'PortfolioController::create');
	$routes->post('portfolio/delete', 'PortfolioController::delete');
	$routes->get('portfolio/detail/(:any)', 'PortfolioController::detail/$1');
	$routes->match(['get','post'],'portfolio/edit/(:any)', 'PortfolioController::edit/$1');
	$routes->match(['get', 'post'],'portfolio/layout/(:any)', 'PortfolioController::layout/$1');
	$routes->post('portfolio/tampilan/update', 'PortfolioController::update');
	$routes->get('media', 'MediaController::index');
	$routes->get('media/load-more', 'MediaController::loadMore');
	$routes->get('artikel', 'BlogController::index');
	$routes->match(['get','post'],'artikel/create', 'BlogController::create');
	$routes->match(['get','post'],'artikel/edit/(:any)', 'BlogController::edit/$1');
	$routes->post('artikel/delete', 'BlogController::delete');
	$routes->get('artikel/detail/(:any)', 'BlogController::detail/$1');
	$routes->match(['get', 'post'],'komentar', 'CommentController::index');
	$routes->post('komentar/delete', 'CommentController::delete');
	$routes->get('appointment', 'AppointmentController::index');
	$routes->match(['get', 'post'],'appointment/create', 'AppointmentController::create');
	$routes->match(['get', 'post'],'appointment/edit/(:any)', 'AppointmentController::edit/$1');
	$routes->post('appointment/delete', 'AppointmentController::delete');
	$routes->get('social-media', 'SocialMediaController::index');
	$routes->post('social-media/edit', 'SocialMediaController::edit');
	$routes->get('anggota', 'AnggotaController::index');
	$routes->match(['get', 'post'],'anggota/create', 'AnggotaController::create');
	$routes->match(['get', 'post'],'anggota/edit/(:any)', 'AnggotaController::edit/$1');
	$routes->post('anggota/change-status', 'AnggotaController::changeStatus');
	$routes->post('anggota/delete', 'AnggotaController::delete');
	$routes->get('anggota/role', 'AnggotaController::role');
	$routes->get('seo', 'SEOController::index');
	$routes->get('team', 'TeamController::index');
	$routes->post('team/delete', 'TeamController::delete');
	$routes->match(['get','post'],'team/create', 'TeamController::create');
	$routes->match(['get','post'],'team/edit/(:any)', 'TeamController::edit/$1');
	$routes->get('seo/analysis', 'SEOController::ajax');
	$routes->match(['get','post'],'testimonial', 'TestimonialController::index');
	$routes->match(['get','post'],'tracking-code', 'TrackingCodeController::index');
});

$routes->get('/(:any)', 'Template::blogDetail/$1');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
