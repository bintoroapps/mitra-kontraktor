<?php namespace App\Controllers;

use App\Models\CompanyProfile;
use App\Models\UserModel;

class Auth extends BaseController {

    public function index() {
        $data = [];
        helper(['form']);

        if($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|validateUser[email,password]'
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Email or Password don\'t match'
                    ]
                ];

            if(!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();
                $user = $model->where('email', $this->request->getVar('email'))
                        ->first();
                if($user['status'] == 'nonaktif') {
                    session()->setFlashdata('failed', 'User Tidak Aktif');
                    return redirect()->to('/admin');
                }

                $this->setUserSession($user);
                return redirect()->to('admin/dashboard');
            }
        }

        return view('admin/login', $data);
    }

    private function setUserSession($user) {
        $db = db_connect();
        $company = new CompanyProfile($db);
        $company_name = $company->getName();

        $data = [
            'id' => $user['id'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'role_id' => $user['role_id'],
            'isLoggedIn' => true,
            'company_name' => $company_name,
            'company_photo' => $company->getCompany()->media_id ? $company->getCompany()->media_name : ''
        ];

        session()->set($data);
        return true;

    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/admin');
    }
}