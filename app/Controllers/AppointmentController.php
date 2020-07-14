<?php namespace App\Controllers;

use App\Models\AppointmentModel;

class AppointmentController extends BaseController {
    public function index() {
        $db = db_connect();
        $model = new AppointmentModel($db);
        $data['appointment'] = $model->getAllAppointment();
        return view('admin/appointment', $data);
    }

    public function create() {
        $data = [];
        $db = db_connect();
        $model = new AppointmentModel($db);
        helper('form');

        if($this->request->getMethod() == 'post') {
            $rules = [
                'klien' => 'required',
                'arsitek' => 'required',
                'tgl_survey' => 'required',
                'jam_survey' => 'required',
                'deskripsi' => 'required'
            ];
            if(!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $data_input = [
                    'appointment_client' => $this->request->getVar('klien'),
                    'appointment_date' => date('Y-m-d', strtotime($this->request->getVar('tgl_survey'))),
                    'appointment_time' => date('H:i:s', strtotime($this->request->getVar('jam_survey'))),
                    'appointment_arsitek' => $this->request->getVar('arsitek'),
                    'appointment_description' => $this->request->getVar('deskripsi')
                ];
                $model->insertAppointment($data_input);
                session()->setFlashdata('success', 'Data Successfully Added');
                return redirect()->to('/admin/appointment');
            }
        }

        return view('admin/appointment-create', $data);
    }

    public function edit($id) {
        $db = db_connect();
        $model = new AppointmentModel($db);
        $data['appointment'] = $model->getAppointmentById($id);
        helper('form');

        if($this->request->getMethod() == 'post') {
            $rules = [
                'klien' => 'required',
                'arsitek' => 'required',
                'tgl_survey' => 'required',
                'jam_survey' => 'required',
                'deskripsi' => 'required'
            ];
            if(!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $data_input = [
                    'appointment_client' => $this->request->getVar('klien'),
                    'appointment_date' => date('Y-m-d', strtotime($this->request->getVar('tgl_survey'))),
                    'appointment_time' => date('H:i:s', strtotime($this->request->getVar('jam_survey'))),
                    'appointment_arsitek' => $this->request->getVar('arsitek'),
                    'appointment_description' => $this->request->getVar('deskripsi')
                ];
                $model->updateAppointment($id, $data_input);
                session()->setFlashdata('success', 'Data Successfully Updated');
                return redirect()->to('/admin/appointment');
            }
        }
        
        return view('admin/appointment-edit', $data);
    }

    public function delete() {
        $appointment_id = $this->request->getVar('appointment_id');
        $db = db_connect();
        $model = new AppointmentModel($db);
        $model->deleteAppointment($appointment_id);
        return 'true';
    }
}