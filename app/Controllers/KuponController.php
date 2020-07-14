<?php namespace App\Controllers;

use App\Models\KuponModel;

class KuponController extends BaseController {
    public function index() {
        $db = db_connect();
        $model = new KuponModel($db);
        helper('form');

        if($this->request->getMethod() == 'post') {
            $rules = [
                'nama' => 'required',
                'kode' => 'required',
                'mulai_berlaku' => 'required',
                'selesai_berlaku' => 'required',
                'diskon' => 'required'
            ];

            if(!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            }

            $data_save = [
                'kupon_name' => $this->request->getVar('nama'),
                'kupon_kode' => $this->request->getVar('kode'),
                'kupon_awal' => date('Y-m-d', strtotime($this->request->getVar('mulai_berlaku'))),
                'kupon_akhir' => date('Y-m-d', strtotime($this->request->getVar('selesai_berlaku'))),
                'kupon_diskon' => $this->request->getVar('diskon')
            ];

            if($this->request->getVar('act') == 'add') {
                $model->insertKupon($data_save);
                session()->setFlashdata('success', 'Data Successfully Added');
            } else if($this->request->getVar('act') == 'edit') {
                $model->updateKupon($this->request->getVar('kupon_id'), $data_save);
                session()->setFlashdata('success', 'Data Successfully Updated');
            }

            return redirect()->to('/admin/kupon');
        }

        $data['kupon'] = $model->getAllKupon();
        return view('admin/kupon', $data);
    }

    public function delete() {
        $id = $this->request->getVar('kupon_id');
        $db = db_connect();
        $model  = new KuponModel($db);
        $model->deleteKupon($id);
        return true;
    }
}