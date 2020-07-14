<?php namespace App\Controllers;

use App\Models\AnggotaModel;

class AnggotaController extends BaseController {
    public function index() {
        $db = db_connect();
        $model = new AnggotaModel($db);
        $data['anggota'] = $model->getAllAnggota();
        return view('admin/anggota', $data);
    }

    public function create() {
        helper('form');
        $db = db_connect();
        $model = new AnggotaModel($db);
        $data['role'] = $model->getAllRole();

        if($this->request->getMethod() == 'post') {
            $rules = [
                'nama_awal' => 'required',
                'email' => 'required|valid_email',
                'role' => 'required',
                'status' => 'required'
            ];

            if(!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $data_input = [
                    'firstname' => $this->request->getVar('nama_awal'),
                    'lastname' => $this->request->getVar('nama_akhir'),
                    'email' => $this->request->getVar('email'),
                    'status' => $this->request->getVar('status'),
                    'password' => password_hash('user', PASSWORD_DEFAULT),
                    'role_id' => $this->request->getVar('role')
                ];
                $model->inputAnggota($data_input);

                session()->setFlashdata('success', 'Data Successfully Added');
                return redirect()->to('/admin/anggota');
            }
        }

        return view('admin/anggota-create', $data);
    }

    public function edit($id) {
        helper('form');
        $db = db_connect();
        $model = new AnggotaModel($db);
        $data['anggota'] = $model->getAnggotaById($id);
        $data['role'] = $model->getAllRole();

        if($this->request->getMethod() == 'post') {
            $rules = [
                'nama_awal' => 'required',
                'email' => 'required|valid_email',
                'role' => 'required',
                'status' => 'required'
            ];

            if(!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $data_input = [
                    'firstname' => $this->request->getVar('nama_awal'),
                    'lastname' => $this->request->getVar('nama_akhir'),
                    'email' => $this->request->getVar('email'),
                    'status' => $this->request->getVar('status'),
                    'role_id' => $this->request->getVar('role')
                ];
                $model->updateAnggota($id,$data_input);

                session()->setFlashdata('success', 'Data Successfully Updated');
                return redirect()->to('/admin/anggota');
            }
        }

        return view('admin/anggota-edit', $data);
    }

    public function changestatus() {
        $anggota_id = $this->request->getVar('anggota_id');
        $anggota_status = $this->request->getVar('anggota_status');
        $db = db_connect();
        $model = new AnggotaModel($db);
        $model->changeStatus($anggota_id,['status' => $anggota_status]);
        return 'true';
    }

    public function delete() {
        $anggota_id = $this->request->getVar('anggota_id');
        $db = db_connect();
        $model = new AnggotaModel($db);
        $model->deleteAnggota($anggota_id);
        return 'true';
    }

    public function role() {
        $db = db_connect();
        $model = new AnggotaModel($db);
        $data['role'] = $model->getAllRole();
        return view('admin/role', $data);
    }
}