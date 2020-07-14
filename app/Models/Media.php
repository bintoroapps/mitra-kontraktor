<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class Media {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function getAllMedia() {
        $media = $this->db->table('media');
        $media->orderBy('media_id', 'DESC');
        $media->limit(12);
        return $media->get()->getResult();
    }

    public function countMedia() {
        $media = $this->db->table('media');
        return $media->countAll();
    }

    public function loadMore($last_id) {
        $media = $this->db->table('media');
        $media->where('media_id <', $last_id);
        $media->orderBy('media_id', 'DESC');
        $media->limit(12);
        return $media->get()->getResult();
    }
    
    public function countLoadMore($last_id) {
        $media = $this->db->table('media');
        return $media->where('media_id <', $last_id)->countAllResults();
    }
}