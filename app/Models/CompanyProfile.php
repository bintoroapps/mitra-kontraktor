<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class CompanyProfile {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    function getCompany() {

        $check = $this->db->table('company');
        $check->where('company_id', 1);
        $final_check = $check->get()->getFirstRow();
        
        if($final_check->media_id) {
            $data = $this->db->table('company');
            $data->join('media', 'media.media_id = company.media_id');
            $final_check = $data->get()->getFirstRow();
        }

        return $final_check;

    }

    public function insertMedia($data) {
        $media = $this->db->table('media');
        $media->insert($data);
        return $media->get()->getLastRow()->media_id;
    }

    public function updateCompany($data) {
        $company = $this->db->table('company');
        $company->where('company_id', 1);
        $company->update($data);
        return true;
    }

    public function getName() {
        $company = $this->db->table('company');
        return $company->get()->getFirstRow()->company_name;
    }
}