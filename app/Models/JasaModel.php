<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class JasaModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function insertMedia($data) {
        $media = $this->db->table('media');
        $media->insert($data);

        return true;
    }

    public function getAllJasa() {
        $jasa = $this->db->table('jasa');
        $jasa->orderBy('jasa_id', 'DESC');
        return $jasa->get()->getResult();
    }

    public function insertJasa($data) {
        $jasa = $this->db->table('jasa');
        $jasa->insert($data);

        $new_jasa = $this->db->table('jasa');
        $new_jasa->orderBy('id', 'DESC');
        $id_new_jasa = $new_jasa->get()->getFirstRow()->jasa_id;

        $service_detail = $this->db->table('service_detail_page');
        $service_detail->insert(['jasa_id' => $id_new_jasa]);

        return true;
    }

    public function getJasaById($id) {
        $jasa = $this->db->table('jasa');
        $jasa->where('jasa_id', $id);
        return $jasa->get()->getFirstRow();
    }

    public function update($id,$data) {
        $jasa = $this->db->table('jasa');
        $jasa->where('jasa_id', $id);
        $jasa->update($data);

        return true;
    }

    public function delete($id) {
        $jasa = $this->db->table('jasa');
        $jasa->where('jasa_id', $id);
        $jasa->delete();

        return true;
    }

    public function checkServiceDetailByJasaId($id) {
        $detail = $this->db->table('service_detail_page');
        $detail->where('jasa_id', $id);
        
        if(!$detail->countAllResults()) {
            $new_detail = $this->db->table('service_detail_page');
            $new_detail->insert(['jasa_id' => $id]);
        }

        $super_new_detail = $this->db->table('service_detail_page');
        $super_new_detail->join('jasa', 'jasa.jasa_id=service_detail_page.jasa_id');
        $super_new_detail->where('service_detail_page.jasa_id', $id);
        return $super_new_detail->get()->getFirstRow();
    }

    public function getServiceDetail($id) {
        $detail = $this->db->table('service_detail_page');
        $detail->join('jasa', 'jasa.jasa_id=service_detail_page.jasa_id');
        $detail->where('service_detail_page.jasa_id', $id);
        return $detail->get()->getFirstRow();
    }

    public function media() {
        $media = $this->db->table('media');
        return $media->get()->getResult();
    }

    public function updateServiceDetail($id, $data) {
        $detail = $this->db->table('service_detail_page');
        $detail->where('jasa_id', $id);
        $detail->update($data);
        return true;
    }

    public function getTestimonialVideo($id) {
        $testi = $this->db->table('service_testimoni');
        $testi->where('jasa_id', $id);
        return $testi->get()->getResult();
    }

    public function deleteTestimoniVideo($id)  {
        $testi = $this->db->table('service_testimoni');
        $testi->where('service_testimoni_id', $id);
        $testi->delete();
        return true;
    }

    public function insertTestimoniVideo($data) {
        $testi = $this->db->table('service_testimoni');
        $testi->insert($data);

        $new_testi = $this->db->table('service_testimoni');
        $new_testi->orderBy('service_testimoni_id', 'DESC');
        return $new_testi->get()->getFirstRow();
    }

    public function getServicePriceByIdJasa($id) {
        $price = $this->db->table('service_price');
        $price->where('jasa_id', $id);
        return $price->get()->getResult();
    }

    public function updatePrice($id, $data) {
        $price = $this->db->table('service_price');
        $price->where('service_price_id', $id);
        $price->update($data);
        return true;
    }

    public function insertPrice($data) {
        $price = $this->db->table('service_price');
        $price->insert($data);

        $new_price = $this->db->table('service_price');
        $new_price->orderBy('service_price_id', 'DESC');
        return $new_price->get()->getFirstRow()->service_price_id;
    }

    public function deletePrice($id) {
        $price = $this->db->table('service_price');
        $price->where('service_price_id', $id);
        $price->delete();

        return true;
    }

    public function getFaq($id) {
        $faq = $this->db->table('faq_jasa');
        $faq->where('jasa_id', $id);
        return $faq->get()->getResult();
    }

    public function insertFaq($data) {
        $faq = $this->db->table('faq_jasa');
        $faq->insert($data);

        $new_faq = $this->db->table('faq_jasa');
        $new_faq->orderBy('faq_jasa_id', 'DESC');
        return $new_faq->get()->getFirstRow(); 
    }
    
    public function updateFaqData($id, $data) {
        $faq = $this->db->table('faq_jasa');
        $faq->where('faq_jasa_id', $id);
        $faq->update($data);
        return true;
    }

    public function deleteFaq($id) {
        $faq = $this->db->table('faq_jasa');
        $faq->where('faq_jasa_id', $id);
        $faq->delete();
        return true;
    }

}