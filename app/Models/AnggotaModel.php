<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class AnggotaModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function getAllAnggota() {
        $anggota = $this->db->table('users');
        $anggota->join('role', 'role.role_id=users.role_id');
        $anggota->orderBy('id', 'DESC');
        return $anggota->get()->getResult();
    }

    public function getAllRole() {
        $role = $this->db->table('role');
        $role->orderBy('role_name');
        return $role->get()->getResult();
    }

    public function inputAnggota($data) {
        $anggota = $this->db->table('users');
        $anggota->insert($data);
        return true;
    }

    public function getAnggotaById($id) {
        $anggota = $this->db->table('users');
        $anggota->where('id', $id);
        return $anggota->get()->getFirstRow();
    } 

    public function updateAnggota($id, $data) {
        $anggota = $this->db->table('users');
        $anggota->where('id', $id);
        $anggota->update($data);
        return true;
    }

    public function changeStatus($id, $data) {
        $anggota = $this->db->table('users');
        $anggota->where('id', $id);
        $anggota->update($data);
        return true;
    }

    public function deleteAnggota($id) {
        $anggota = $this->db->table('users');
        $anggota->where('id', $id);
        $anggota->delete();
        return true;
    }
}