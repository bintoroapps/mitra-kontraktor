<?php namespace App\Controllers;

use App\Models\ContactModel;

class ContactController extends BaseController {

    public function index() {
        $db = db_connect();
        $model = new ContactModel($db);
        $data['contact'] = $model->getContact();
        
        if($this->request->getMethod() == 'post') {
            $act = $this->request->getVar('act');
             if($act == '1_background') {
                $this->_uploadNewImage('1', null, $this->request->getFile('image_1'), 'background', $this->request->getVar('save'));
                return redirect()->to('/admin/tampilan-website/contact');
            }
        }

        return view('admin/contact', $data);
    }

    private function _uploadNewImage($section, $position, $image, $type, $save) {
        $db = db_connect();
        $model = new ContactModel($db);
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
                        $model->updateContact(['contact_page_' . $section . '_img' => $img_new]);
                        session()->setFlashdata('success', 'Background successfully updated');
                    else:
                        $model->updateContact(['contact_page_' . $section . '_img_' . $position => $img_new]);
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
                        $model->updateContact(['contact_page_' . $section . '_img' => $img->getName()]);
                        session()->setFlashdata('success', 'Background successfully updated');
                    else:
                        $model->updateContact(['contact_page_' . $section . '_img_' . $position => $img->getName()]);
                        session()->setFlashdata('success', 'Image successfully updated');
                    endif;
                }
            }
        }
    }

    public function update() {
        $db = db_connect();
        $model = new ContactModel($db);
        $act = $this->request->getVar('act');
        
        if($act == '1-background') {
            $image = $this->request->getVar('image');
            $model->updateContact(['contact_page_1_img' => $image]);
            return 'true';
        } else if($act == '1-title') {
            $small_title = $this->request->getVar('small_title');
            $big_title = $this->request->getVar('big_title');
            $model->updateContact(['contact_page_1_big_title' => $big_title, 'contact_page_1_small_title' => $small_title]);
            return 'true';
        } else if($act == '1-bread') {
            $bread_1 = $this->request->getVar('bread_1');
            $bread_2 = $this->request->getVar('bread_2');
            $bread_link = $this->request->getVar('bread_link');
            $model->updateContact(['contact_page_1_bread_1' => $bread_1, 'contact_page_1_bread_2' => $bread_2, 'contact_page_1_bread_link' => $bread_link]);
            return 'true';
        }  else if($act == '2-title') {
            $small_title = $this->request->getVar('small_title');
            $big_title = $this->request->getVar('big_title');
            $model->updateContact(['contact_page_2_big_title' => $big_title, 'contact_page_2_small_title' => $small_title]);
            return 'true';
        }
    }

    public function getEditBackground() {
        $data['section'] = $this->request->getVar('section');
        $db = db_connect();
        $model = new ContactModel($db);
        $data['media'] = $model->media();
        return view('admin/contact-get-edit-background', $data);
    }

}