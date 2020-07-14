<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class TeamPageModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function getTeam() {
        $team = $this->db->table('team_page');
        return $team->get()->getFirstRow();
    }

    public function updateTeam($data) {
        $team = $this->db->table('team_page');
        $team->where('team_page_id', 1);
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

    public function getTeamCategory() {
        $team_category = $this->db->table('team_category');
        $team_category->orderBy('team_category_created_at', 'DESC');
        return $team_category->get()->getResult();
    }

    public function getTeamByTeamCategoryId($id) {
        $team = $this->db->table('team');
        $team->where('team_category_id', $id);
        $team->orderBy('team_category_created', 'DESC');
        return $team->get()->getResult();
    }

    public function addNewCategory($data) {
        $team_category = $this->db->table('team_category');
        $team_category->insert($data);

        $new_team_category = $this->db->table('team_category');
        return $new_team_category->get()->getLastRow();
    }

    public function getTeamCategoryNull() {
        $team = $this->db->table('team');
        $team->where('team_category_id', NULL);
        return $team->get()->getResult();
    }

    public function updateTeamCategory($id, $data) {
        $team = $this->db->table('team');
        $team->where('team_id', $id);
        $team->update($data);
        
        $new_team = $this->db->table('team');
        $new_team->where('team_id', $id);
        return $new_team->get()->getFirstRow(); 
    }

    public function deleteTeamCategory($id) {
        $team_category = $this->db->table('team_category');
        $team_category->where('team_category_id', $id);
        $team_category->delete();
        return true;
    }

    public function deleteTeamMember($id) {
        $team = $this->db->table('team');
        $team->where('team_id', $id);
        $team->update(['team_category_id' => NULL]);
        return true;
    }

    public function updateCategoryTeam($id, $data) {
        $category = $this->db->table('team_category');
        $category->where('team_category_id', $id);
        $category->update($data);
        return true;
    }
}