<?php namespace App\Controllers;

use App\Models\FaqModel;
use App\Models\SeoModel;

class FaqPageController extends BaseController {
    
    public function index() {
        $db = db_connect();
        $model = new FaqModel($db);
        $seo = new SeoModel($db);
        $data['faq'] = $model->getPage();
        $data['faqs'] = $model->getFaq();

        // check if home page keyphrase is duplicate from other page
        $data['keyphrase_check'] = $seo->keyphraseCheck('faq');

        if($this->request->getMethod() == 'post') {
            $act = $this->request->getVar('act');
            if($act == 'seo') {
                $data = [
                    'keyphrase' => $this->request->getVar('focus_keyphrase'),
                    'seo_title' => $this->request->getVar('seo_title'),
                    'meta_description' => $this->request->getVar('meta_description')
                ];
                $model->updateFaq($data);
                session()->setFlashdata('success', 'SEO analysis successfully updated');
                return redirect()->to('/admin/tampilan-website/faq');
            } else if($act == '1_background') {
                $this->_uploadNewImage('1', null, $this->request->getFile('image_1'), 'background', $this->request->getVar('save'));
                return redirect()->to('/admin/tampilan-website/faq');
            } else if($act == '2_img_1') {
                $this->_uploadNewImage('2', '1', $this->request->getFile('image_2_1'), 'image', $this->request->getVar('save'));
                return redirect()->to('/admin/tampilan-website/faq');
            }
        }
        return view('admin/faq', $data);
    }

    public function keyphraseCheck() {
        $keyphrase = $this->request->getVar('keyphr');
        $db = db_connect();
        $seo = new SeoModel($db);
        $result = $seo->keyphraseCheckAjax('faq', $keyphrase);
        return $result ? 'true' : 'false';
    }

    public function getEditImage() {
        $data['alt'] = $this->request->getVar('alt');
        $data['section'] = $this->request->getVar('section');
        $data['img'] = $this->request->getVar('img');
        $db = db_connect();
        $model = new FaqModel($db);
        $data['media'] = $model->media();
        return view('admin/faq-get-edit-image', $data);
    }

    private function _uploadNewImage($section, $position, $image, $type, $save) {
        $db = db_connect();
        $model = new FaqModel($db);
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
                        $model->updateFaq(['faq_page_' . $section . '_img' => $img_new]);
                        session()->setFlashdata('success', 'Background successfully updated');
                    else:
                        $model->updateFaq(['faq_page_' . $section . '_img_' . $position => $img_new]);
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
                        $model->updateFaq(['faq_page_' . $section . '_img' => $img->getName()]);
                        session()->setFlashdata('success', 'Background successfully updated');
                    else:
                        $model->updateFaq(['faq_page_' . $section . '_img_' . $position => $img->getName()]);
                        session()->setFlashdata('success', 'Image successfully updated');
                    endif;
                }
            }
        }
    }

    public function update() {
        $db = db_connect();
        $model = new FaqModel($db);
        $act = $this->request->getVar('act');
        if($act == 'alt') {
            $section = $this->request->getVar('section');
            $img = $this->request->getVar('img');
            $alt = $this->request->getVar('alt');
            $model->updateFaq(['faq_page_' . $section . '_img_' . $img . '_alt' => $alt]);
            return 'true';
        } else if($act == 'change-media') {
            $section = $this->request->getVar('section');
            $img = $this->request->getVar('img');
            $media = $this->request->getVar('media');
            $model->updateFaq(['faq_page_' . $section . '_img_' . $img => $media]);
            return 'true';
        } else if($act == '2-title') {
            $big_title = $this->request->getVar('big_title');
            $small_title = $this->request->getVar('small_title');
            $model->updateFaq(['faq_page_2_big_title' => $big_title, 'faq_page_2_small_title' => $small_title]);
            return 'true';
        } else if($act == 'new-faq') {
            $question = $this->request->getVar('question');
            $answer = $this->request->getVar('answer');
            $data['faq'] = $model->insertFaq(['faq_question' => $question, 'faq_answer' => $answer]);
            return view('admin/faq-ajax', $data);
        } else if($act == 'update-faq') {
            $faq_id = $this->request->getVar('faq_id');
            $question = $this->request->getVar('question');
            $answer = $this->request->getVar('answer');
            $model->updateFaqData($faq_id, ['faq_question' => $question, 'faq_answer' => $answer]);
            return 'true';
        } else if($act == 'delete-faq') {
            $faq_id = $this->request->getVar('faq_id');
            $model->deleteFaq($faq_id);
            return 'true';
        } else if($act == '3-title') {
            $big_title = $this->request->getVar('big_title');
            $small_title = $this->request->getVar('small_title');
            $model->updateFaq(['faq_page_3_big_title' => $big_title, 'faq_page_3_small_title' => $small_title]);
            return 'true';
        } else if($act == 'btn-form') {
            $btn_text = $this->request->getVar('btn_text');
            $model->updateFaq(['faq_page_3_btn' => $btn_text]);
            return 'true';
        } else if($act == '1-background') {
            $image = $this->request->getVar('image');
            $model->updateFaq(['faq_page_1_img' => $image]);
            return 'true';
        } else if($act == '1-title') {
            $small_title = $this->request->getVar('small_title');
            $big_title = $this->request->getVar('big_title');
            $model->updateFaq(['faq_page_1_big_title' => $big_title, 'faq_page_1_small_title' => $small_title]);
            return 'true';
        } else if($act == '1-bread') {
            $bread_1 = $this->request->getVar('bread_1');
            $bread_2 = $this->request->getVar('bread_2');
            $bread_link = $this->request->getVar('bread_link');
            $model->updateFaq(['faq_page_1_bread_1' => $bread_1, 'faq_page_1_bread_2' => $bread_2, 'faq_page_1_bread_link' => $bread_link]);
            return 'true';
        }
    }

    public function getEditBackground() {
        $data['section'] = $this->request->getVar('section');
        $db = db_connect();
        $model = new FaqModel($db);
        $data['media'] = $model->media();
        return view('admin/faq-get-edit-background', $data);
    }
}