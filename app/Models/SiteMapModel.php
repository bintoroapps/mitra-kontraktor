<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class SiteMapModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function getSiteMap() {
        $site_map = $this->db->table('sitemap');
        return $site_map->get()->getResult();
    }

    public function getBlog() {
        $blog = $this->db->table('blog');
        $blog->select('blog_slug');
        $blog->where('blog_status', 'post');
        return $blog->get()->getResult();
    }

    public function getJasa() {
        $jasa = $this->db->table('jasa');
        $jasa->select('jasa_slug');
        return $jasa->get()->getResult();
    }

    public function getPortfolio() {
        $portfolio = $this->db->table('portfolio');
        $portfolio->select('portfolio_slug');
        return $portfolio->get()->getResult();
    }
}