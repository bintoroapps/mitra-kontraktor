<?php namespace App\Controllers;

use App\Models\ServicePageModel;

class ServicePageController extends BaseController {

    public function index() {
        $db = db_connect();
        $model = new ServicePageModel($db);
        $data['service'] = $model->getService();
        $data['slider'] = $model->getSlider();

        if($this->request->getMethod() == 'post') {
            $act = $this->request->getVar('act');
             if($act == '1_background') {
                $this->_uploadNewImage('1', null, $this->request->getFile('image_1'), 'background', $this->request->getVar('save'));
                return redirect()->to('/admin/tampilan-website/service');
            } else if($act == '3_background') {
                $this->_uploadNewImage('3', null, $this->request->getFile('image_3'), 'background', $this->request->getVar('save'));
                return redirect()->to('/admin/tampilan-website/service');
            } else if($act == 'add-slider') {
                $image = $this->request->getFile('image');
                $save = $this->request->getVar('save');
                if($img = $image) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $image;
                        $img->move('./media', $img->getName());

                        if($save == 'save-as-webp') {
                            $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                            $insert_data = [
                                'media_name' => $img_new,
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_data);
                            $model->insertSlider(['service_slider_img' => $img_new, 'service_slider_alt' => 'alt']);
                            if($img->getClientExtension() == 'png') {
                                $img_new_a = imagecreatefrompng('./media/' . $img->getName());
                            } else {
                                $img_new_a = imagecreatefromjpeg('./media/' . $img->getName());
                            }
                            imagepalettetotruecolor($img_new_a);
                            imagealphablending($img_new_a, true);
                            imagesavealpha($img_new_a, true);
                            imagewebp($img_new_a, './media/' . $img_new, 80);
                            imagedestroy($img_new_a);
                            unlink(FCPATH . 'media/' . $img->getName());
                        } else {
                            $insert_data = [
                                'media_name' => $img->getName(),
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_data);
                            $model->insertSlider(['service_slider_img' => $img->getName(), 'service_slider_alt' => 'alt']);
                        }

                        session()->setFlashdata('success', 'Image successfully added');
                        return redirect()->to('/admin/tampilan-website/service');
                    }
                }
            }
        }

        return view('admin/service', $data);
    }

    private function _uploadNewImage($section, $position, $image, $type, $save) {
        $db = db_connect();
        $model = new ServicePageModel($db);
        if($img = $image) {
            if ($img->isValid() && ! $img->hasMoved()) {
                $img = $image;
                $img->move('./media', $img->getName());

                if($save == 'save-as-webp') {
                    $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                    $insert_data = [
                        'media_name' => $img_new,
                        'media_created_at' => date('Y-m-d H:i:s')
                    ];
                    $model->insertMedia($insert_data);
    
                    if($type == 'background'):
                        $model->updateService(['service_page_' . $section . '_img' => $img_new]);
                        session()->setFlashdata('success', 'Background successfully updated');
                    else:
                        $model->updateService(['service_page_' . $section . '_img_' . $position => $img_new]);
                        session()->setFlashdata('success', 'Image successfully updated');
                    endif;
                    if($img->getClientExtension() == 'png') {
                        $img_new_a = imagecreatefrompng('./media/' . $img->getName());
                    } else {
                        $img_new_a = imagecreatefromjpeg('./media/' . $img->getName());
                    }
                    imagepalettetotruecolor($img_new_a);
                    imagealphablending($img_new_a, true);
                    imagesavealpha($img_new_a, true);
                    imagewebp($img_new_a, './media/' . $img_new, 80);
                    imagedestroy($img_new_a);
                    unlink(FCPATH . 'media/' . $img->getName());
                } else {
                    $insert_data = [
                        'media_name' => $img->getName(),
                        'media_created_at' => date('Y-m-d H:i:s')
                    ];
                    $model->insertMedia($insert_data);
    
                    if($type == 'background'):
                        $model->updateService(['service_page_' . $section . '_img' => $img->getName()]);
                        session()->setFlashdata('success', 'Background successfully updated');
                    else:
                        $model->updateService(['service_page_' . $section . '_img_' . $position => $img->getName()]);
                        session()->setFlashdata('success', 'Image successfully updated');
                    endif;
                }
            }
        }
    }

    public function update() {
        $db = db_connect();
        $model = new ServicePageModel($db);
        $act = $this->request->getVar('act');
        
        if($act == '1-background') {
            $image = $this->request->getVar('image');
            $model->updateService(['service_page_1_img' => $image]);
            return 'true';
        } else if($act == '1-title') {
            $small_title = $this->request->getVar('small_title');
            $big_title = $this->request->getVar('big_title');
            $model->updateService(['service_page_1_big_title' => $big_title, 'service_page_1_small_title' => $small_title]);
            return 'true';
        } else if($act == '1-bread') {
            $bread_1 = $this->request->getVar('bread_1');
            $bread_2 = $this->request->getVar('bread_2');
            $bread_link = $this->request->getVar('bread_link');
            $model->updateService(['service_page_1_bread_1' => $bread_1, 'service_page_1_bread_2' => $bread_2, 'service_page_1_bread_link' => $bread_link]);
            return 'true';
        } else if($act == '2-title') {
            $small_title = $this->request->getVar('small_title');
            $big_title = $this->request->getVar('big_title');
            $model->updateService(['service_page_2_big_title' => $big_title, 'service_page_2_small_title' => $small_title]);
            return 'true';
        }  else if($act == '3-background') {
            $image = $this->request->getVar('image');
            $model->updateService(['service_page_3_img' => $image]);
            return 'true';
        } else if($act == '3-text') {
            $position = $this->request->getVar('position');
            $value = $this->request->getVar('value');
            $text = $this->request->getVar('text');
            $model->updateService(['service_page_3_num_' . $position => $value, 'service_page_3_text_' . $position => $text]);
            return 'true';
        } else if($act == '3-pros') {
            $position = $this->request->getVar('position');
            $title = $this->request->getVar('title');
            $desc = $this->request->getVar('desc');
            $model->updateService(['service_page_3_pros_' . $position . '_title' => $title, 'service_page_3_pros_' . $position . '_desc' => $desc]);
            return 'true';
        } else if($act == '4-title') {
            $small_title = $this->request->getVar('small_title');
            $med_title = $this->request->getVar('med_title');
            $big_title = $this->request->getVar('big_title');
            $desc = $this->request->getVar('desc');
            $model->updateService(['service_page_4_big_title' => $big_title, 'service_page_4_small_title' => $small_title, 'service_page_4_med_title' => $med_title, 'service_page_4_desc' => $desc]);
            return 'true';
        } else if($act == 'remove-slider') {
            $slider_id = $this->request->getVar('slider_id');
            $model->deleteSlider($slider_id);
            return 'true';
        } else if($act == 'add-slider') {
            $media = $this->request->getVar('media');
            $model->insertSlider(['service_slider_img' => $media, 'service_slider_alt' => 'alt']);
            $data['slider'] = $model->lastSlider();
            return view('admin/service-new-slider', $data);
        } else if($act == 'btn-form') {
            $btn_text = $this->request->getVar('btn_text');
            $model->updateService(['service_page_5_btn' => $btn_text]);
            return 'true';
        } else if($act == '5-title') {
            $med_title = $this->request->getVar('med_title');
            $big_title = $this->request->getVar('big_title');
            $model->updateService(['service_page_5_med_title' => $med_title, 'service_page_5_big_title' => $big_title]);
            return 'true';
        } else if($act == '5-desc') {
            $small_title = $this->request->getVar('small_title');
            $det_1 = $this->request->getVar('det_1');
            $det_2 = $this->request->getVar('det_2');
            $det_3 = $this->request->getVar('det_3');
            $model->updateService(['service_page_5_small_title' => $small_title, 'service_page_5_det_1' => $det_1, 'service_page_5_det_2' => $det_2, 'service_page_5_det_3' => $det_3]);
            return 'true';
        }
    }

    public function getEditImage() {
        $data['alt'] = $this->request->getVar('alt');
        $data['section'] = $this->request->getVar('section');
        $data['img'] = $this->request->getVar('img');
        $db = db_connect();
        $model = new ServicePageModel($db);
        $data['media'] = $model->media();
        return view('admin/service-get-edit-image', $data);
    }

    public function getEditBackground() {
        $data['section'] = $this->request->getVar('section');
        $db = db_connect();
        $model = new ServicePageModel($db);
        $data['media'] = $model->media();
        return view('admin/service-get-edit-background', $data);
    }

    public function getAddSlider() {
        $db = db_connect();
        $model = new ServicePageModel($db);
        $data['media'] = $model->media();
        return view('admin/service-get-add-slider', $data);
    }

}