<?php namespace App\Controllers;

use App\Models\TemplateModel;
use App\Models\UserModel;

class Template extends BaseController {
    public function index() {
        $db = db_connect();
        $model = new TemplateModel($db);
        $data['home'] = $model->getHomePage();
        $data['header'] = $model->getHomeHeader();
        $data['jasa'] = $model->getjasa();
        $data['portfolio'] = $model->getPortfolio();
        $data['team'] = $model->getTeam();
        $data['testimonial'] = $model->getTestimonial();
        $data['blog'] = $model->getThreeTopBlog();
        $data['testimonials'] = $model->getTestimonials();
        $data['client_logo'] = $model->getClientLogos();
        $data['faqs'] = $model->getFaqHome();
        return view('template/home', $data);
    }

    public function aboutUs() {
        $db = db_connect();
        $model = new TemplateModel($db);
        $data['about'] = $model->getAboutPage();
        $data['testimonials'] = $model->getTestimonials();
        $data['work_flow'] = $model->getWorkflow();
        $data['team'] = $model->getTeam();
        $data['seo'] = $model->getAboutSeo();
        $data['client_logo'] = $model->getClientLogos();
        $data['faqs'] = $model->getFaqHome();
        return view('template/about', $data);
    }

    public function faq() {
        $db = db_connect();
        $model = new TemplateModel($db);
        $data['faq'] = $model->getFAQPage();
        $data['faqs'] = $model->getFAQ();
        return view('template/faq', $data);
    }

    public function ourTeam() {
        $db = db_connect();
        $model = new TemplateModel($db);
        $data['team'] = $model->getTeamPage();
        // $data['teams'] = $model->getAllTeam();
        $data['team_category'] = $model->getTeamCategory();
        $data['about'] = $model->getAboutPage();
        return view('template/team', $data);
    }

    public function services() {
        $db = db_connect();
        $model = new TemplateModel($db);
        $data['service'] = $model->getServicePage();
        $data['jasa'] = $model->getjasa();
        $data['slider'] = $model->getServiceSlider();
        $data['about'] = $model->getAboutPage();
        return view('template/services', $data);
    }

    public function serviceDetail($slug) {
        $db = db_connect();
        $model = new TemplateModel($db);
        $data['portfolio'] = $model->getPortfolio();
        $jasa_id = $model->getJasaBySlug($slug)->jasa_id;
        $data['service'] = $model->getServiceDetail($jasa_id);
        $data['jasa'] = $model->getjasa();
        $data['video'] = $model->getTestimoniVideo($jasa_id);
        $data['price'] = $model->getServicePrice($jasa_id);
        return view('template/services-detail', $data);
    }

    public function projects() {
        $db = db_connect();
        $model = new TemplateModel($db);
        $data['project'] = $model->getProjectPage();
        $data['category'] = $model->getProjectCategory();
        $data['all_project'] = $model->getAllProject();
        $data['count_project'] = $model->getCountProject();
        return view('template/project', $data);
    }

    public function projectLoadMore() {
        $project_id = $this->request->getVar('project_id');
        $db = db_connect();
        $model = new TemplateModel($db);
        $data['all_project'] = $model->getProjectLoadMore($project_id);
        return view('template/project-load-more', $data);
    }

    public function projectDetail($slug) {
        $db = db_connect();
        $model = new TemplateModel($db);
        $data['project'] = $model->getProjectBySlug($slug);
        $data['image'] = $model->getProjectImageThree($slug);
        $data['detail'] = $model->getProjectDetailPage();
        $data['header'] = $model->getProjectHeader();
        $data['btn_load'] = $model->checkProjectImage($slug);
        return view('template/project-detail', $data);
    }

    public function blog() {
        $db = db_connect();
        $model = new TemplateModel($db);
        
        if(isset($_GET['category'])) {
            $data['blogs'] = $model->getAllBlog($_GET['category'], NULL, NULL);
            $data['count'] = $model->getBlogCount($_GET['category'], NULL, NULL);
        } else if(isset($_GET['tags'])) {
            $data['blogs'] = $model->getAllBlog(NULL, $_GET['tags'], NULL);
            $data['count'] = $model->getBlogCount(NULL, $_GET['tags'], NULL);
        } else if(isset($_GET['search'])) {
            $data['blogs'] = $model->getAllBlog(NULL, NULL, $_GET['search']);
            $data['count'] = $model->getBlogCount(NULL, NULL, $_GET['search']);
        } else {
            $data['blogs'] = $model->getAllBlog();
            $data['count'] = $model->getBlogCount();
        }

        $data['blog'] = $model->getBlogPage();
        $data['recent'] = $model->getBlogRecentPost();
        $data['category'] = $model->getBlogCategory();
        $data['tags'] = $model->getBlogTags();
        return view('template/blog', $data);
    }
    
    public function blogDetail($slug) {
        $db = db_connect();
        $model = new TemplateModel($db);

        if($model->checkSlugBlog($slug)) {
            $data['blog'] = $model->getBlogPage();
            $data['content'] = $model->getBlogDetailPage($slug);
            $data['recent'] = $model->getBlogRecentPost();
            $data['category'] = $model->getBlogCategory();
            $data['tags'] = $model->getBlogTags();
            $data['comment'] = $model->getBlogComment($data['content']->blog_id);
            return view('template/blog-detail', $data);
        } else {
            $data['portfolio'] = $model->getPortfolio();
            $jasa_id = $model->getJasaBySlug($slug)->jasa_id;
            $data['service'] = $model->getServiceDetail($jasa_id);
            $data['jasa'] = $model->getjasa();
            $data['video'] = $model->getTestimoniVideo($jasa_id);
            $data['price'] = $model->getServicePrice($jasa_id);
            $data['faqs'] = $model->getFaqJasa($jasa_id);
            return view('template/services-detail', $data);
        }

    }

    public function blogLoadMore() {
        $blog_post = $this->request->getVar('blog_post');
        $category = $this->request->getVar('category');
        $tags = $this->request->getVar('tags');
        $search = $this->request->getVar('search');
        $db = db_connect();
        $model = new TemplateModel($db);
        $data['blogs'] = $model->getBlogLoadMore($blog_post, $category, $tags, $search);
        return view('template/blog-load-more', $data);
    }

    public function contact() {
        $db = db_connect();
        $model = new TemplateModel($db);
        $data['client_logo'] = $model->getClientLogo();
        $data['contact'] = $model->getContactPage();
        $data['company'] = $model->getCompany();
        return view('template/contact', $data);
    }

    public static function bulan($m) {
        if($m == '01') {
            return 'Januari';
        } else if($m == '02') {
            return 'Februari';
        } else if($m == '03') {
            return 'Maret';
        } else if($m == '04') {
            return 'April';
        } else if($m == '05') {
            return 'Mei';
        } else if($m == '06') {
            return 'Juni';
        } else if($m == '07') {
            return 'Juli';
        } else if($m == '08') {
            return 'Agustus';
        }else if($m == '09') {
            return 'September';
        }else if($m == '10') {
            return 'Oktober';
        }else if($m == '11') {
            return 'November';
        }else if($m == '12') {
            return 'Desember';
        }
    }

    public static function blog_comment($id) {
        $db = db_connect();
        $model = new TemplateModel($db);
        $comment = $model->getCommentCount($id);
        return $comment;
    }

    public static function blogCategoryCount($id) {
        $db = db_connect();
        $model = new TemplateModel($db);
        $count = $model->countCategoryBlog($id);
        return $count;
    }

    public static function getReplyComment($id) {
        $db = db_connect();
        $model = new TemplateModel($db);
        $comment = $model->getReplyComment($id);
        return $comment;
    }

    public static function companyData() {
        $db = db_connect();
        $model = new TemplateModel($db);
        return $model->getCompany();
    }

    public static function socialMedia($id) {
        $db = db_connect();
        $model = new TemplateModel($db);
        return $model->getSocialMedia($id)->social_media_content;
    }

    public static function getTwoRecentPost() {
        $db = db_connect();
        $model = new TemplateModel($db);
        return $model->getTwoRecentPost();
    }

    public static function getSixRecentProject() {
        $db = db_connect();
        $model = new TemplateModel($db);
        return $model->getSixRecentProject();
    }

    public static function getTeamByTeamCategoryId($id) {
        $db = db_connect();
        $model = new TemplateModel($db);
        return $model->getTeamByTeamCategoryId($id);
    }

    public function projectImagesLoadMore() {
        $db = db_connect();
        $model = new TemplateModel($db);
        $id_project = $this->request->getVar('id_project');
        $data['images'] = $model->getAllImageProject($id_project);
        return view('template/project-images-ajax', $data);
    }

    public static function trackingCode() {
        $db = db_connect();
        $model = new TemplateModel($db);
        return $model->getTrackingCode();
    }
}