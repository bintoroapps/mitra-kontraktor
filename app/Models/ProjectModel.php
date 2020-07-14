<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class ProjectModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function getProject() {
        $project = $this->db->table('project_page');
        return $project->get()->getFirstRow();
    }

    public function updateProject($data) {
        $team = $this->db->table('project_page');
        $team->where('project_page_id', 1);
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