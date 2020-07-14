<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class BlogModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db; 
    }

    public function getAllBlog() {
        $blog = $this->db->table('blog');
        $blog->select('blog.blog_id, blog.blog_title, blog.blog_created, blog.blog_status, blog.blog_slug, blog_category.blog_category_name');
        $blog->join('blog_category', 'blog_category.blog_category_id=blog.blog_category_id');
        $blog->orderBy('blog.blog_id', 'DESC');
        return $blog->get()->getResult();
    }

    public function getAllCategory() {
        $category = $this->db->table('blog_category');
        $category->orderBy('blog_category_name');
        return $category->get()->getResult();
    }

    public function insertMedia($data) {
        $media = $this->db->table('media');
        $media->insert($data);
        return true;
    }

    public function insertCategory($data) {
        $category = $this->db->table('blog_category');
        $category->insert($data);
        return $category->get()->getLastRow()->blog_category_id;
    }

    public function insertBlog($data) {
        $blog = $this->db->table('blog');
        $blog->insert($data);
        return true;
    }

    public function getDetailBlog($id) {
        $blog = $this->db->table('blog');
        $blog->join('blog_category', 'blog_category.blog_category_id=blog.blog_category_id');
        $blog->where('blog.blog_id', $id);
        return $blog->get()->getFirstRow();
    }

    public function updateBlog($id, $data) {
        $blog = $this->db->table('blog');
        $blog->where('blog_id', $id);
        $blog->update($data);
        return true;
    }

    public function deleteBlog($id) {
        $blog = $this->db->table('blog');
        $blog->where('blog_id', $id);
        $blog->delete();
        return true;
    }
}