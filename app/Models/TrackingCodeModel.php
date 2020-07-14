<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class TrackingCodeModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function getTrackingCode() {
        $code = $this->db->table('tracking_code');
        $code->where('tracking_code_id', 1);
        return $code->get()->getFirstRow();
    }

    public function updateTrackingCode($data) {
        $code = $this->db->table('tracking_code');
        $code->where('tracking_code_id', 1);
        $code->update($data);
        return true;
    }

}