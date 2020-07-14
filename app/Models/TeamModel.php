<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class TeamModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function getAllTeam() {
        $team = $this->db->table('team');
        $team->orderBy('team_id', 'DESC');
        return $team->get()->getResult();
    }

    public function getTeamRole() {
        $team = $this->db->table('team');
        $team->select('team_role');
        $team->orderBy('team_role');
        $team->distinct();
        return $team->get()->getResult();
    }

    public function insertMedia($data) {
        $media = $this->db->table('media');
        $media->insert($data);
        return true;
    }

    public function insertTeam($data) {
        $team = $this->db->table('team');
        $team->insert($data);
        return true;
    }

    public function getTeamById($id) {
        $team = $this->db->table('team');
        $team->where('team_id', $id);
        return $team->get()->getFirstRow();
    }

    public function updateTeam($id, $data) {
        $team = $this->db->table('team');
        $team->where('team_id', $id);
        $team->update($data);
        return true;
    }

    public function deleteTeam($id) {
        $team = $this->db->table('team');
        $team->where('team_id', $id);
        $team->delete();
        return true;
    }


}