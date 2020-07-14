<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class FaqModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function getPage() {
        $about = $this->db->table('faq_page');
        return $about->get()->getFirstRow();
    }

    public function updateFaq($data) {
        $faq = $this->db->table('faq_page');
        $faq->where('faq_page_id', 1);
        $faq->update($data);
        return true;
    }

    public function getFaq() {
        $faq = $this->db->table('faq');
        return $faq->get()->getResult();
    }

    public function insertFaq($data) {
        $faq = $this->db->table('faq');
        $faq->insert($data);

        $new_faq = $this->db->table('faq');
        $new_faq->orderBy('faq_id', 'DESC');
        return $new_faq->get()->getFirstRow();
    }
    
    public function updateFaqData($id, $data) {
        $faq = $this->db->table('faq');
        $faq->where('faq_id', $id);
        $faq->update($data);
        return true;
    }

    public function deleteFaq($id) {
        $faq = $this->db->table('faq');
        $faq->where('faq_id', $id);
        $faq->delete();
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