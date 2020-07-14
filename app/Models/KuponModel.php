<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class KuponModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function getAllKupon() {
        $kupon = $this->db->table('kupon');
        return $kupon->get()->getResult();
    }

    public function insertKupon($data) {
        $kupon = $this->db->table('kupon');
        $kupon->insert($data);
        return true;
    }

    public function updateKupon($id, $data) {
        $kupon = $this->db->table('kupon');
        $kupon->where('kupon_id', $id);
        $kupon->update($data);
        return true;
    }

    public function deleteKupon($id) {
        $kupon = $this->db->table('kupon');
        $kupon->where('kupon_id', $id);
        $kupon->delete();
        return true;
    }
}