<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class HomePageModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function getHomePage() {
        $home = $this->db->table('home_page');
        return $home->get()->getFirstRow();
    }

    public function updateHomePage($data) {
        $home = $this->db->table('home_page');
        $home->where('home_page_id', 1);
        $home->update($data);
        return true;
    }

    public function oneHeader() {
        $header = $this->db->table('home_page_header');
        return $header->get()->getFirstRow();
    }

    public function header() {
        $header = $this->db->table('home_page_header');
        return $header->get()->getResult();
    }

    public function media() {
        $media = $this->db->table('media');
        return $media->get()->getResult();
    }

    public function newHeaderText($id, $data) {
        $header = $this->db->table('home_page_header');
        $header->where('home_page_header_id', $id);
        $header->update($data);
        return true;
    }

    public function changeMediaHeader($id, $data) {
        $media = $this->db->table('home_page_header');
        $media->where('home_page_header_id', $id);
        $media->update($data);
        return true;
    }

    public function insertMedia($data) {
        $media = $this->db->table('media');
        $media->insert($data);
        return true;
    }

    public function changeMedia2Img1($data) {
        $home = $this->db->table('home_page');
        $home->where('home_page_id', 1);
        $home->update($data);
        return true;
    }

    public function getDisplayTeam($position) {
        $team = $this->db->table('team');
        $team->where('team_display_position', $position);
        return $team->get()->getFirstRow();
    }
    
    public function getAllTeam() {
        $team = $this->db->table('team');
        $team->select('team_name,team_id,team_role');
        $team->orderBy('team_name', 'ASC');
        return $team->get()->getResult();
    }

    public function updateTeamPosition($id, $position) {
        $old = $this->db->table('team');
        $old->where('team_display_position', $position);
        $old->update(['team_display_position' => NULL]);

        $new = $this->db->table('team');
        $new->where('team_id', $id);
        $new->update(['team_display_position' => $position]);
        return true;
    }

    public function getFaq() {
        $faq = $this->db->table('faq_home');
        return $faq->get()->getResult();
    }

    public function insertFaq($data) {
        $faq = $this->db->table('faq_home');
        $faq->insert($data);

        $new_faq = $this->db->table('faq_home');
        $new_faq->orderBy('faq_home_id', 'DESC');
        return $new_faq->get()->getFirstRow();
    }

    public function updateFaq($id, $data) {
        $faq = $this->db->table('faq_home');
        $faq->where('faq_home_id', $id);
        $faq->update($data);
        return true;
    }

    public function deleteFaq($id) {
        $faq = $this->db->table('faq_home');
        $faq->where('faq_home_id', $id);
        $faq->delete();
        return true;
    }

}