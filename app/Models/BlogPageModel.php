<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class BlogPageModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function getBlog() {
        $team = $this->db->table('blog_page');
        return $team->get()->getFirstRow();
    }

    public function updateBlog($data) {
        $team = $this->db->table('blog_page');
        $team->where('blog_page_id', 1);
        $team->update($data);
        return true;
    }

    public function insertMedia($data) {
        $media = $this->db->table('media');
        $media->insert($data);
        return true;
    }

    public function media() {
        $media = $this->db->table('media');
        return $media->get()->getResult();
    }
}