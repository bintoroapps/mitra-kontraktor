<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class AboutModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;    
    }

    public function getAboutPage() {
        $about = $this->db->table('about_page');
        return $about->get()->getFirstRow();
    }

    public function getSeo() {
        $seo = $this->db->table('about_page');
        $seo->select('keyphrase,seo_title,meta_description');
        return $seo->get()->getFirstRow();
    }

    public function updateAbout($data) {
        $about = $this->db->table('about_page');
        $about->where('about_page_id', 1);
        $about->update($data);
        return true;
    }

    public function media() {
        $media = $this->db->table('media');
        return $media->get()->getResult();
    }

    public function insertMedia($data) {
        $media = $this->db->table('media');
        $media->insert($data);
        return true;
    }
}