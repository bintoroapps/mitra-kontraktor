<?php namespace App\Controllers;

use App\Models\Media;

class MediaController extends BaseController {
    public function index() {
        $db = db_connect();
        $model = new Media($db);
        $data['media'] = $model->getAllMedia();
        $data['count'] = $model->countMedia();
        return view('admin/media', $data);
    }

    public function loadMore() {
        $last_id = $this->request->getVar('last_id');
        $db = db_connect();
        $model = new Media($db);
        $data['media'] = $model->loadMore($last_id);
        $data['count'] = $model->countLoadMore($last_id);
        return view('admin/load-more-ajax', $data);
    }
}