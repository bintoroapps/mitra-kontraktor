<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class  PortfolioModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function getAllPortfolio() {
        $port = $this->db->table('portfolio');
        return $port->select('portfolio.portfolio_id, portfolio.portfolio_title, portfolio.portfolio_client, portfolio.portfolio_year_completed, portfolio_category.portfolio_category_name')
            ->join('portfolio_category', 'portfolio_category.portfolio_category_id=portfolio.portfolio_category_id')
            ->orderBy('portfolio.portfolio_id', 'DESC')
            ->get()
            ->getResult();
        
    }

    public function insertMedia($data) {
        $port = $this->db->table('media');
        $port->insert($data);
        
        return true;
    }

    public function insertPortfolio($data) {
        $port = $this->db->table('portfolio');
        $port->insert($data);

        return $port->get()->getLastRow()->portfolio_id;
    }

    public function insertPortImage($id, $image) {
        $port = $this->db->table('portfolio_images');
        $port->insert(['portfolio_id' => $id, 'portfolio_images_name' => $image]);
    }

    public function deletePortfolio($id) {
        $this->db->table('portfolio')
                    ->where('portfolio_id', $id)
                    ->delete();
        return true;
    }

    public function getDetailPort($id) {
        $port = $this->db->table('portfolio');
        $port->join('portfolio_category', 'portfolio_category.portfolio_category_id=portfolio.portfolio_category_id');
        $port->where('portfolio.portfolio_id', $id);
        return $port->get()->getFirstRow();
        
    }

    public function getDetailImagePort($id) {
        $images = $this->db->table('portfolio_images');
        $images->where('portfolio_id', $id);
        return $images->get()->getResult();
    }

    public function updatePortfolio($id, $data) {
        $port = $this->db->table('portfolio');
        $port->where('portfolio_id', $id)
            ->update($data);
        return true;
    }

    public function deletePortImage($id) {
        $port = $this->db->table('portfolio_images');
        $port->where('portfolio_id', $id)->delete();
        return true;
    }

    public function getCategory() {
        $category = $this->db->table('portfolio_category');
        $category->orderBy('portfolio_category_name');
        return $category->get()->getResult();
    }

    public function insertCategory($data) {
        $category = $this->db->table('portfolio_category');
        $category->insert($data);
        return $category->get()->getLastRow()->portfolio_category_id;
    }

    public function getPortfolioDetail($id_portfolio) {
        $check = $this->db->table('project_detail_page');
        $check->where('portfolio_id', $id_portfolio);
        $result = $check->countAllResults();

        if(!$result) {
            $data = [
                'portfolio_id' => $id_portfolio,
                'project_detail_page_3_title_1' => 'Project Description',
                'project_detail_page_3_title_2' => 'Project Information',
                'project_detail_page_4_title' => 'Project Challenge',
                'project_detail_page_5_title' => 'What We Did',
                'project_detail_page_6_title' => 'RESULT',
                'project_detail_page_7_small_title' => 'Quick Contact',
                'project_detail_page_7_big_title' => 'Get Solution',
                'project_detail_page_7_desc' => 'Contact us at the Interior office nearest to you or submit a business inquiry online.',
                'project_detail_page_7_btn' => 'Contact',
                'project_detail_page_7_link' => '/contact'
            ];
            $new = $this->db->table('project_detail_page');
            $new->insert($data);
        }

        $new_port = $this->db->table('project_detail_page');
        $new_port->where('portfolio_id', $id_portfolio);
        return $new_port->get()->getFirstRow();
    }

    public function updatePortfolioDetail($id, $data) {
        $portfolio = $this->db->table('project_detail_page');
        $portfolio->where('portfolio_id', $id);
        $portfolio->update($data);
        return true;
    }

}