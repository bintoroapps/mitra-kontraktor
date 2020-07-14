<?php namespace App\Controllers;

use App\Models\TestimonialModel;

class TestimonialController extends BaseController {

    public function index() {
        $db = db_connect();
        $model = new TestimonialModel($db);
        $data['testi'] = $model->getTestimonial();
        return view('admin/testimonial', $data);
    }
}