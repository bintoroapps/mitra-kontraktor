<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class TestimonialModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function getTestimonial() {
        $testi = $this->db->table('testimonial');
        $testi->orderBy('testimonial_id', 'DESC');
        return $testi->get()->getResult();
    }
}