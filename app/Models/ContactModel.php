<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class ContactModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function getContact() {
        $contact = $this->db->table('contact_page');
        return $contact->get()->getFirstRow();
    }

    public function updateContact($data) {
        $contact = $this->db->table('contact_page');
        $contact->where('contact_page_id', 1);
        $contact->update($data);
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