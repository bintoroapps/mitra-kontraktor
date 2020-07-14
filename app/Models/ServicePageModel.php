<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class ServicePageModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function getService() {
        $service = $this->db->table('service_page');
        return $service->get()->getFirstRow();
    }

    public function updateService($data) {
        $service = $this->db->table('service_page');
        $service->where('service_page_id', 1);
        $service->update($data);
        return true;
    }

    public function media() {
        $media = $this->db->table('media');
        return $media->get()->getResult();
    }

    public function insertMedia($data) {
        $media = $this->db->table('media');
        $media->insert($data);
        return true;
    }

    public function getSlider() {
        $slider = $this->db->table('service_slider');
        return $slider->get()->getResult();
    }

    public function deleteSlider($id) {
        $slider = $this->db->table('service_slider');
        $slider->where('service_slider_id', $id);
        $slider->delete();
        return true;
    }

    public function insertSlider($data) {
        $slider = $this->db->table('service_slider');
        $slider->insert($data);
        return true;
    }

    public function lastSlider() {
        $slider = $this->db->table('service_slider');
        $slider->orderBy('service_slider_id', 'DESC');
        return $slider->get()->getFirstRow();
    }
}