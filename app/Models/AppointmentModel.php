<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class AppointmentModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function getAllAppointment() {
        $appo = $this->db->table('appointment');
        $appo->orderBy('appointment_id', 'DESC');
        return $appo->get()->getResult();
    }

    public function insertAppointment($data) {
        $model = $this->db->table('appointment');
        $model->insert($data);
        return true;
    }

    public function getAppointmentById($id) {
        $model = $this->db->table('appointment');
        $model->where('appointment_id', $id);
        return $model->get()->getFirstRow();
    }

    public function updateAppointment($id, $data) {
        $appo = $this->db->table('appointment');
        $appo->where('appointment_id', $id);
        $appo->update($data);
        return true;
    }

    public function deleteAppointment($id) {
        $appo = $this->db->table('appointment');
        $appo->where('appointment_id', $id);
        $appo->delete();
        return true;
    }
}