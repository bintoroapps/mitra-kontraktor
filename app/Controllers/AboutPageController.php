<?php namespace App\Controllers;

use App\Models\AboutModel;
use App\Models\SeoModel;

class AboutPageController extends BaseController {
    public function index() {
        $db = db_connect();
        $model = new AboutModel($db);
        $seo = new SeoModel($db);
        $data['about'] = $model->getAboutPage();

         // check if home page keyphrase is duplicate from other page
         $data['keyphrase_check'] = $seo->keyphraseCheck('about');

        if($this->request->getMethod() == 'post') {
            $act = $this->request->getVar('act');
            if($act == 'seo') {
                $data = [
                    'keyphrase' => $this->request->getVar('focus_keyphrase'),
                    'seo_title' => $this->request->getVar('seo_title'),
                    'meta_description' => $this->request->getVar('meta_description')
                ];
                $model->updateAbout($data);
                session()->setFlashdata('success', 'SEO analysis successfully updated');
                return redirect()->to('/admin/tampilan-website/about');
            } else if($act == '1_background') {
                $this->_uploadNewImage('1', null, $this->request->getFile('image_1'), 'background', $this->request->getVar('save'));
                return redirect()->to('/admin/tampilan-website/about');
            } else if($act == '2_img_1') {
                $this->_uploadNewImage('2', '1', $this->request->getFile('image_2_1'), 'image', $this->request->getVar('save'));
                return redirect()->to('/admin/tampilan-website/about');
            } else if($act == '2_img_2') {
                $this->_uploadNewImage('2', '2', $this->request->getFile('image_2_2'), 'image', $this->request->getVar('save'));
                return redirect()->to('/admin/tampilan-website/about');
            } else if($act == '3_background') {
                $this->_uploadNewImage('3', null, $this->request->getFile('image_3'), 'background', $this->request->getVar('save'));
                return redirect()->to('/admin/tampilan-website/about');
            }  else if($act == '6_background') {
                $this->_uploadNewImage('6', null, $this->request->getFile('image_6'), 'background', $this->request->getVar('save'));
                return redirect()->to('/admin/tampilan-website/about');
            } else if($act == '8_background') {
                $this->_uploadNewImage('8', null, $this->request->getFile('image_8'), 'background', $this->request->getVar('save'));
                return redirect()->to('/admin/tampilan-website/about');
            } else if($act == '9_img_1') {
                $this->_uploadNewImage('9', '1', $this->request->getFile('image_9_1'), 'image', $this->request->getVar('save'));
                return redirect()->to('/admin/tampilan-website/about');
            }
        }
        return view('admin/about', $data);
    }

    public function getEditBackground() {
        $data['section'] = $this->request->getVar('section');
        $db = db_connect();
        $model = new AboutModel($db);
        $data['media'] = $model->media();
        return view('admin/about-get-edit-background', $data);
    }

    public function update() {
        $db = db_connect();
        $model = new AboutModel($db);
        $act = $this->request->getVar('act');

        if($act == '1-title') {
            $small_title = $this->request->getVar('small_title');
            $big_title = $this->request->getVar('big_title');
            $model->updateAbout(['about_page_1_big_title' => $big_title, 'about_page_1_small_title' => $small_title]);
            return 'true';
        } else if($act == '1-background') {
            $image = $this->request->getVar('image');
            $model->updateAbout(['about_page_1_img' => $image]);
            return 'true';
        } else if($act == '1-bread') {
            $bread_1 = $this->request->getVar('bread_1');
            $bread_2 = $this->request->getVar('bread_2');
            $bread_link = $this->request->getVar('bread_link');
            $model->updateAbout(['about_page_1_bread_1' => $bread_1, 'about_page_1_bread_2' => $bread_2, 'about_page_1_bread_link' => $bread_link]);
            return 'true';
        } else if($act == 'alt') {
            $section = $this->request->getVar('section');
            $img = $this->request->getVar('img');
            $alt = $this->request->getVar('alt');
            $model->updateAbout(['about_page_' . $section . '_img_' . $img . '_alt' => $alt]);
            return 'true';
        } else if($act == 'change-media') {
            $section = $this->request->getVar('section');
            $img = $this->request->getVar('img');
            $media = $this->request->getVar('media');
            $model->updateAbout(['about_page_' . $section . '_img_' . $img => $media]);
            return 'true';
        } else if($act == 'big-title') {
            $section = $this->request->getVar('section');
            $big_title = $this->request->getVar('big_title');
            $model->updateAbout(['about_page_' . $section . '_big_title' => $big_title]);
            return 'true';
        } else if($act == 'small-title') {
            $section = $this->request->getVar('section');
            $small_title = $this->request->getVar('small_title');
            $model->updateAbout(['about_page_' . $section . '_small_title' => $small_title]);
            return 'true';
        } else if($act == 'desc') {
            $section = $this->request->getVar('section');
            $desc = $this->request->getVar('desc');
            $model->updateAbout(['about_page_' . $section . '_desc' => $desc]);
            return 'true';
        } else if($act == 'button') {
            $section = $this->request->getVar('section');
            $text = $this->request->getVar('text');
            $link = $this->request->getVar('link');
            $model->updateAbout(['about_page_' . $section . '_btn_text' => $text, 'about_page_' . $section . '_btn_link' => $link]);
            return 'true';
        } else if($act == '3-background') {
            $image = $this->request->getVar('image');
            $model->updateAbout(['about_page_3_img' => $image]);
            return 'true';
        } else if($act == '3-text') {
            $position = $this->request->getVar('position');
            $value = $this->request->getVar('value');
            $text = $this->request->getVar('text');
            $model->updateAbout(['about_page_3_num_' . $position => $value, 'about_page_3_text_' . $position => $text]);
            return 'true';
        } else if($act == '3-pros') {
            $position = $this->request->getVar('position');
            $title = $this->request->getVar('title');
            $desc = $this->request->getVar('desc');
            $model->updateAbout(['about_page_3_pros_' . $position . '_title' => $title, 'about_page_3_pros_' . $position . '_desc' => $desc]);
            return 'true';
        } else if($act == '4-title') {
            $big_title = $this->request->getVar('big_title');
            $small_title = $this->request->getVar('small_title');
            $model->updateAbout(['about_page_4_big_title' => $big_title, 'about_page_4_small_title' => $small_title]);
            return 'true';
        } else if($act == '6-background') {
            $image = $this->request->getVar('image');
            $model->updateAbout(['about_page_6_img' => $image]);
            return 'true';
        } else if($act == '6-text') {
            $position = $this->request->getVar('position');
            $title = $this->request->getVar('title');
            $desc = $this->request->getVar('desc');
            $model->updateAbout(['about_page_6_title_' . $position => $title, 'about_page_6_desc_' . $position => $desc]);
            return 'true';
        } else if($act == '6-title') {
            $big_title = $this->request->getVar('big_title');
            $small_title = $this->request->getVar('small_title');
            $model->updateAbout(['about_page_6_big_title' => $big_title, 'about_page_6_small_title' => $small_title]);
            return 'true';
        } else if($act == '7-title') {
            $big_title = $this->request->getVar('big_title');
            $small_title = $this->request->getVar('small_title');
            $model->updateAbout(['about_page_7_big_title' => $big_title, 'about_page_7_small_title' => $small_title]);
            return 'true';
        } else if($act == '8-background') {
            $image = $this->request->getVar('image');
            $model->updateAbout(['about_page_8_img' => $image]);
            return 'true';
        } else if($act == '8-text') {
            $big_title = $this->request->getVar('big_title');
            $small_title = $this->request->getVar('small_title');
            $mid = $this->request->getVar('mid');
            $desc = $this->request->getVar('desc');
            $model->updateAbout(['about_page_8_small_title' => $small_title, 'about_page_8_big_title' => $big_title, 'about_page_8_num' => $mid, 'about_page_8_desc' => $desc]);
            return 'true';
        } else if($act == '8-btn') {
            $btn_text = $this->request->getVar('btn_text');
            $model->updateAbout(['about_page_8_btn' => $btn_text]);
            return 'true';
        } else if($act == '9-video') {
            $link = $this->request->getVar('link');
            $model->updateAbout(['about_page_9_video' => $link]);
            return 'true';
        } else if($act == '9-text') {
            $big_title = $this->request->getVar('big_title');
            $med_title = $this->request->getVar('med_title');
            $small_title = $this->request->getVar('small_title');
            $desc = $this->request->getVar('desc');
            $model->updateAbout(['about_page_9_small_title' => $small_title, 'about_page_9_big_title' => $big_title, 'about_page_9_med_title' => $med_title, 'about_page_9_desc' => $desc]);
            return 'true';
        }
    }

    public function getEditImage() {
        $data['alt'] = $this->request->getVar('alt');
        $data['section'] = $this->request->getVar('section');
        $data['img'] = $this->request->getVar('img');
        $db = db_connect();
        $model = new AboutModel($db);
        $data['media'] = $model->media();
        return view('admin/about-get-edit-image', $data);
    }

    private function _uploadNewImage($section, $position, $image, $type, $save) {
        $db = db_connect();
        $model = new AboutModel($db);
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
                        $model->updateAbout(['about_page_' . $section . '_img' => $img_new]);
                        session()->setFlashdata('success', 'Background successfully updated');
                    else:
                        $model->updateAbout(['about_page_' . $section . '_img_' . $position => $img_new]);
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
                        $model->updateAbout(['about_page_' . $section . '_img' => $img->getName()]);
                        session()->setFlashdata('success', 'Background successfully updated');
                    else:
                        $model->updateAbout(['about_page_' . $section . '_img_' . $position => $img->getName()]);
                        session()->setFlashdata('success', 'Image successfully updated');
                    endif;
                }
            }
        }
    }

    public function keyphraseCheck() {
        $keyphrase = $this->request->getVar('keyphr');
        $db = db_connect();
        $seo = new SeoModel($db);
        $result = $seo->keyphraseCheckAjax('about', $keyphrase);
        return $result ? 'true' : 'false';
    }
}