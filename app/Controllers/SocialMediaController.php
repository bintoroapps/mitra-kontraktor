<?php namespace App\Controllers;

use App\Models\SocialMediaModel;

class SocialMediaController extends BaseController {
    public function index() {
        $db = db_connect();
        $model = new SocialMediaModel($db);
        $data['socmed'] = $model->getAllSocmed();
        return view('admin/socmed', $data);
    }

    public function edit() {
        $db = db_connect();
        $model = new SocialMediaModel($db);
        
        $update_data = [
            'social_media_content' => $this->request->getVar('socmed_content')
        ];

        $model->editSocmed($this->request->getVar('socmed_id'), $update_data);
        return 'true';
    }
}