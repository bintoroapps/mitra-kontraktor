<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class TemplateModel {
    protected $db;
    
    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function getHomePage() {
        $home = $this->db->table('home_page');
        return $home->get()->getFirstRow();
    }

    public function getFaqHome() {
        $faq = $this->db->table('faq_home');
        return $faq->get()->getResult();
    }

    public function getHomeHeader() {
        $header = $this->db->table('home_page_header');
        return $header->get()->getResult();
    }

    public function getjasa() {
        $jasa = $this->db->table('jasa');
        return $jasa->get()->getResult();
    }

    public function getPortfolio() {
        $jasa = $this->db->table('portfolio');
        $jasa->select('portfolio_title, portfolio_client, portfolio_main_image, portfolio_slug, portfolio_main_image_alt');
        return $jasa->get()->getResult();
    }

    public function getTeam() {
        $team = $this->db->table('team');
        $team->where('team_display_position !=', NULL);
        $team->orderBy('team_display_position');
        return $team->get()->getResult();
    }

    public function getTestimonial() {
        $testimonial = $this->db->table('testimonial');
        return $testimonial->get()->getResult();
    }

    public function getThreeTopBlog() {
        $blog = $this->db->table('blog');
        $blog->select('blog.blog_title, blog.blog_slug, blog.blog_image, blog.blog_image_alt, blog.blog_post, users.firstname, users.lastname');
        $blog->join('users', 'users.id=blog.user_id');
        $blog->where('blog.blog_status', 'post');
        $blog->orderBy('blog.blog_post', 'desc');
        $blog->limit(3);
        return $blog->get()->getResult();
    }

    public function getClientLogo() {
        $logo = $this->db->table('portfolio');
        $logo->where('portfolio_client_logo !=', NULL);
        return $logo->get()->getResult();
    }

    public function getAboutPage() {
        $about = $this->db->table('about_page');
        return $about->get()->getFirstRow();
    }

    public function getAboutTesti() {
        $testi = $this->db->table('about_testi');
        return $testi->get()->getResult();
    }

    public function getWorkflow() {
        $work_flow = $this->db->table('work_flow');
        return $work_flow->get()->getResult();
    }

    public function getFAQPage() {
        $faq = $this->db->table('faq_page');
        return $faq->get()->getFirstRow();
    }

    public function getFAQ() {
        $faq = $this->db->table('faq');
        return $faq->get()->getResult();
    }

    public function getTeamPage() {
        $team = $this->db->table('team_page');
        return $team->get()->getFirstRow();
    }

    public function getAllTeam() {
        $team = $this->db->table('team');
        return $team->get()->getResult();
    }

    public function getServicePage() {
        $service = $this->db->table('service_page');
        return $service->get()->getFirstRow();
    }

    public function getServiceSlider() {
        $slider = $this->db->table('service_slider');
        return $slider->get()->getResult();
    }

    public function getProjectPage() {
        $project = $this->db->table('project_page');
        return $project->get()->getFirstRow();
    }

    public function getProjectCategory() {
        $category = $this->db->table('portfolio_category');
        return $category->get()->getResult();
    }

    public function getAllProject() {
        $project = $this->db->table('portfolio');
        $project->select('portfolio.portfolio_id,portfolio.portfolio_title, portfolio.portfolio_slug, portfolio.portfolio_main_image, portfolio_category.portfolio_category_name');
        $project->join('portfolio_category', 'portfolio_category.portfolio_category_id=portfolio.portfolio_category_id');
        $project->orderBy('portfolio.portfolio_id', 'DESC');
        $project->limit(6);
        return $project->get()->getResult();
    }

    public function getCountProject() {
        $project = $this->db->table('portfolio');
        $project->select('portfolio.portfolio_id,portfolio.portfolio_title, portfolio.portfolio_slug, portfolio.portfolio_main_image, portfolio_category.portfolio_category_name');
        $project->join('portfolio_category', 'portfolio_category.portfolio_category_id=portfolio.portfolio_category_id');
        $project->orderBy('portfolio.portfolio_id', 'DESC');
        $project->limit(6);
        return $project->countAllResults();
    }

    public function getProjectLoadMore($id) {
        $project = $this->db->table('portfolio');
        $project->select('portfolio.portfolio_id,portfolio.portfolio_title, portfolio.portfolio_slug, portfolio.portfolio_main_image, portfolio_category.portfolio_category_name');
        $project->join('portfolio_category', 'portfolio_category.portfolio_category_id=portfolio.portfolio_category_id');
        $project->orderBy('portfolio.portfolio_id', 'DESC');
        $project->where('portfolio.portfolio_id <', $id);
        $project->limit(6);
        return $project->get()->getResult();
    }

    public function getProjectBySlug($slug) {
        $project = $this->db->table('portfolio');
        $project->where('portfolio_slug', $slug);
        return $project->get()->getFirstRow();
    }

    public function getProjectImage($slug) {
        $project = $this->db->table('portfolio');
        $project->where('portfolio_slug', $slug);
        $project_id = $project->get()->getFirstRow()->portfolio_id;

        $image = $this->db->table('portfolio_images');
        $image->where('portfolio_id', $project_id);
        return $image->get()->getResult();
    }

    public function getProjectImageThree($slug) {
        $project = $this->db->table('portfolio');
        $project->where('portfolio_slug', $slug);
        $project_id = $project->get()->getFirstRow()->portfolio_id;

        $image = $this->db->table('portfolio_images');
        $image->where('portfolio_id', $project_id);
        $image->limit(3);
        return $image->get()->getResult();
    }
    
    public function checkProjectImage($slug) {
        $project = $this->db->table('portfolio');
        $project->where('portfolio_slug', $slug);
        $project_id = $project->get()->getFirstRow()->portfolio_id;

        $image = $this->db->table('portfolio_images');
        $image->where('portfolio_id', $project_id);
        $count =  $image->countAllResults();
        
        if($count > 3) {
            return true;
        } else {
            return false;
        }
    }

    public function getProjectDetailPage() {
        $project = $this->db->table('project_detail_page');
        return $project->get()->getFirstRow();
    }

    public function getBlogPage() {
        $blog = $this->db->table('blog_page');
        return $blog->get()->getFirstRow();
    }

    public function getAllBlog($category = NULL, $tags = NULL, $search = NULL) {
        $blog = $this->db->table('blog');
        $blog->select('blog.blog_id, blog.blog_image, blog.blog_title, blog.blog_slug, blog.blog_post, users.firstname, users.lastname');
        $blog->join('users', 'users.id=blog.user_id');
        $blog->join('blog_category', 'blog_category.blog_category_id=blog.blog_category_id');
        $blog->where('blog.blog_status', 'post');

        if($category) {
            $blog->where('blog_category.blog_category_slug', $category);
        }

        if($tags) {
            $blog->like('blog.blog_tags', $tags);
        }

        if($search) {
            $blog->like('blog.blog_title', $search);
        }

        $blog->orderBy('blog.blog_post', 'DESC');
        $blog->limit(5);
        return $blog->get()->getResult();
    }

    public function getCommentCount($id) {
        $comment = $this->db->table('blog_comment');
        $comment->where('blog_id', $id);
        return $comment->countAllResults();
    }

    public function getBlogLoadMore($blog_post, $category, $tags, $search) {
        $blog = $this->db->table('blog');
        $blog->select('blog.blog_id, blog.blog_image, blog.blog_title, blog.blog_slug, blog.blog_post, users.firstname, users.lastname');
        $blog->join('users', 'users.id=blog.user_id');
        $blog->where('blog.blog_status', 'post');
        $blog->where('blog.blog_post <', date('Y-m-d H:i:s', strtotime($blog_post)));

        if($category) {
            $blog->where('blog_category.blog_category_slug', $category);
        }

        if($tags) {
            $blog->like('blog.blog_tags', $tags);
        }

        if($search) {
            $blog->like('blog.blog_title', $search);
        }
        
        $blog->orderBy('blog.blog_post', 'DESC');
        $blog->limit(5);
        return $blog->get()->getResult();
    }

    public function getAllBlogCount() {
        $blog = $this->db->table('blog');
        $blog->where('blog_status', 'post');
        return $blog->countAllResults();
    }

    public function getBlogRecentPost() {
        $blog = $this->db->table('blog');
        $blog->select('blog.blog_image, blog.blog_slug, blog.blog_title, users.firstname, users.lastname');
        $blog->join('users', 'users.id=blog.user_id');
        $blog->where('blog.blog_status', 'post');
        $blog->orderBy('blog.blog_post', 'DESC');
        $blog->limit(2);
        return $blog->get()->getResult();
    }

    public function getBlogCategory() {
        $category = $this->db->table('blog_category');
        return $category->get()->getResult();
    }

    public function countCategoryBlog($id) {
        $blog = $this->db->table('blog');
        $blog->where('blog_category_id', $id);
        return $blog->countAllResults();
    }

    public function getBlogTags() {
        $tags = [];

        $tag = $this->db->table('blog');
        $tag->select('blog_tags');
        $array = $tag->get()->getResult();

        foreach($array as $a) {
            if($a->blog_tags) {
                if(!empty(json_decode($a->blog_tags, true))) {
                    $new_array = json_decode($a->blog_tags, true);
                    $tags = array_unique(array_merge($tags, $new_array));
                }
            }
        }

        return array_values($tags);

    }

    public function getBlogCount($category = NULL, $tags = NULL, $search = NULL) {
        $blog = $this->db->table('blog');
        $blog->join('users', 'users.id=blog.user_id');
        $blog->join('blog_category', 'blog_category.blog_category_id=blog.blog_category_id');
        $blog->where('blog.blog_status', 'post');
        if($category) {
            $blog->where('blog_category.blog_category_slug', $category);
        }

        if($tags) {
            $blog->like('blog.blog_tags', '"'. $tags. '"');
        }

        if($search) {
            $blog->like('blog.blog_title', $search);
        }

        return $blog->countAllResults();
    }

    public function getBlogDetailPage($slug) {
        $blog = $this->db->table('blog');
        $blog->select('users.firstname, users.lastname, blog.blog_id, blog.blog_slug, blog.blog_tags, blog.blog_content, blog.blog_image, blog.blog_title, blog.blog_post');
        $blog->join('users', 'users.id=blog.user_id');
        $blog->where('blog.blog_slug', $slug);
        return $blog->get()->getFirstRow();
    }

    public function getBlogComment($id) {
        $comment = $this->db->table('blog_comment');
        $comment->where('blog_id', $id);
        $comment->where('reply_id', NULL);
        $comment->orderBy('blog_comment_created', 'DESC');
        return $comment->get()->getResult();
    }

    public function getReplyComment($id) {
        $reply = $this->db->table('blog_comment');
        $reply->where('reply_id', $id);
        $reply->orderBy('blog_comment_created', 'ASC');
        return $reply->get()->getResult();
    }

    public function getContactPage() {
        $contact = $this->db->table('contact_page');
        return $contact->get()->getFirstRow();
    }

    public function getCompany() {
        $company = $this->db->table('company');
        $result = $company->get()->getFirstRow();

        if($result->media_id) {
            $company = $this->db->table('company');
            $company->join('media', 'media.media_id=company.media_id');
            return $company->get()->getFirstRow();
        }
        
        return $result;
    }

    public function getSocialMedia($id) {
        $socmed = $this->db->table('social_media');
        $socmed->where('social_media_id', $id);
        return $socmed->get()->getFirstRow();
    }

    public function getTestimonials() {
        $testi = $this->db->table('portfolio');
        $testi->select('portfolio_client, portfolio_client_job, portfolio_testimonial, portfolio_client_photo, portfolio_client_photo_alt, portfolio_created');
        $testi->where('portfolio_testimonial !=', NULL);
        $testi->orderBy('portfolio_id', 'DESC');
        return $testi->get()->getResult();
    }

    public function getClientLogos() {
        $logo = $this->db->table('portfolio');
        $logo->select('portfolio_slug, portfolio_client_logo, portfolio_client_logo_alt');
        $logo->where('portfolio_client_logo !=', NULL);
        $logo->orderBy('portfolio_id', 'DESC');
        return $logo->get()->getResult();
    }

    public function getAboutSeo() {
        $seo = $this->db->table('about_page');
        $seo->select('keyphrase,seo_title,meta_description');
        return $seo->get()->getFirstRow();
    }

    public function getJasaBySlug($slug) {
        $jasa = $this->db->table('jasa');
        $jasa->where('jasa_slug', $slug);
        return $jasa->get()->getFirstRow();
    }

    public function getServiceDetail($id) {
        $service_detail = $this->db->table('service_detail_page');
        $service_detail->join('jasa', 'jasa.jasa_id=service_detail_page.jasa_id');
        $service_detail->where('service_detail_page.jasa_id', $id);
        return $service_detail->get()->getFirstRow();
    }

    public function getTestimoniVideo($id) {
        $video = $this->db->table('service_testimoni');
        $video->where('jasa_id', $id);
        return $video->get()->getResult();
    }

    public function getServicePrice($id) {
        $price = $this->db->table('service_price');
        $price->where('jasa_id', $id);
        return $price->get()->getResult();
    }

    public function checkSlugBlog($slug) {
        $blog = $this->db->table('blog');
        $blog->where('blog_slug', $slug);
        return $blog->countAllResults();
    }

    public function getFaqJasa($id) {
        $faq = $this->db->table('faq_jasa');
        $faq->where('jasa_id', $id);
        return $faq->get()->getResult();
    }

    public function getProjectHeader() {
        $header = $this->db->table('project_page');
        return $header->get()->getFirstRow();
    }

    public function getTwoRecentPost() {
        $post = $this->db->table('blog');
        $post->select('blog_id, blog_image, blog_image_alt, blog_title, blog_slug, blog_post');
        $post->where('blog_status', 'post');
        $post->orderBy('blog_post', 'DESC');
        $post->limit(2);
        return $post->get()->getResult();
    }

    public function getSixRecentProject() {
        $project = $this->db->table('portfolio');
        $project->select('portfolio_title, portfolio_main_image, portfolio_main_image_alt');
        $project->orderBy('portfolio_id', 'DESC');
        $project->limit(6);
        return $project->get()->getResult();
    }

    public function getTeamCategory() {
        $category = $this->db->table('team_category');
        $category->orderBy('team_category_created_at', 'DESC');
        return $category->get()->getResult();
    }

    public function getTeamByTeamCategoryId($id) {
        $team = $this->db->table('team');
        $team->where('team_category_id', $id);
        $team->orderBy('team_category_created', 'DESC');
        return $team->get()->getResult();
    }

    public function getAllImageProject($id) {
        $image = $this->db->table('portfolio_images');
        $image->where('portfolio_id', $id);
        return $image->get()->getResult();
    }

    public function getTrackingCode() {
        $code = $this->db->table('tracking_code');
        $code->where('tracking_code_id', 1);
        return $code->get()->getFirstRow();
    }
}