<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class SocialMediaModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function getAllSocmed() {
        $socmed = $this->db->table('social_media');
        return $socmed->get()->getResult();
    }

    public function editSocmed($id, $data) {
        $socmed = $this->db->table('social_media');
        $socmed->where('social_media_id', $id);
        $socmed->update($data);
        return true;
    }
}