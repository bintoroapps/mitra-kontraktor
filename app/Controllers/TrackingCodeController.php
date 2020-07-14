<?php namespace App\Controllers;

use App\Models\TrackingCodeModel;

class TrackingCodeController extends BaseController {

    public function index() {
        $db = db_connect();
        $model = new TrackingCodeModel($db);
        $data['code'] = $model->getTrackingCode();

        if($this->request->getMethod() == 'post') {
            $input = [
                'google_analytic' => $this->request->getVar('google_analytics'),
                'google_tags' => $this->request->getVar('google_tags'),
                'google_search_console' => $this->request->getVar('google_search_console'),
                'facebook_pixel' => $this->request->getVar('facebook_pixel')
            ];

            $model->updateTrackingCode($input);

            session()->setFlashdata('message', 'Data Successfully Updated');
            return redirect()->to('/admin/tracking-code');
        }

        return view('admin/tracking-code', $data);
    }

}