<?php namespace App\Controllers;

use App\Models\HomePageModel;
use App\Models\SeoModel;

class HomePageController extends BaseController {
    public function index() {
        $db = db_connect();
        $model = new HomePageModel($db);
        $seo = new SeoModel($db);

        $data['home'] = $model->getHomePage();
        $data['first_header'] = $model->oneHeader();
        $data['first_team'] = $model->getDisplayTeam(1);
        $data['second_team'] = $model->getDisplayTeam(2);
        $data['third_team'] = $model->getDisplayTeam(3);
        $data['faqs'] = $model->getFaq();
        
        // check if home page keyphrase is duplicate from other page
        $data['keyphrase_check'] = $seo->keyphraseCheck('home');

        if($this->request->getMethod() == 'post') {
            $act = $this->request->getVar('act');
            if($act == 'seo') {
                $data = [
                    'home_page_keyphrase' => $this->request->getVar('focus_keyphrase'),
                    'home_page_seo_title' => $this->request->getVar('seo_title'),
                    'home_page_meta_description' => $this->request->getVar('meta_description')
                ];
                $model->updateHomePage($data);
                session()->setFlashdata('success', 'SEO analysis successfully updated');
                return redirect()->to('/admin/tampilan-website/home');
            } else if($act == 'header_image') {
                $id_header = $this->request->getVar('id_header');
                $save = $this->request->getVar('save');

                if($img = $this->request->getFile('image_header')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('image_header');
                        $img->move('./media', $img->getName());

                        if($save == 'save-as-webp') {
                            $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                            $insert_data = [
                                'media_name' => $img_new,
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_data);
                            $model->changeMediaHeader($id_header, ['home_page_header_image' => $img_new]);
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
    
                            $model->changeMediaHeader($id_header, ['home_page_header_image' => $img->getName()]);
                        }

                        session()->setFlashdata('success', 'Header image successfully updated');
                        return redirect()->to('/admin/tampilan-website/home');
                    }
                }
                
            } else if($act == '2_img_1') {
                $save = $this->request->getVar('save');
                if($img = $this->request->getFile('image_2_1')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('image_2_1');
                        $img->move('./media', $img->getName());

                        if($save == 'save-as-webp') {
                            $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                            $insert_data = [
                                'media_name' => $img_new,
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_data);
    
                            $model->changeMedia2Img1(['home_page_2_image_1' => $img_new]);
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

                            $model->changeMedia2Img1(['home_page_2_image_1' => $img->getName()]);
                        }

                        session()->setFlashdata('success', 'Image successfully updated');
                        return redirect()->to('/admin/tampilan-website/home');
                    }
                }
            } else if($act == '2_img_2') {
                $save = $this->request->getVar('save');
                if($img = $this->request->getFile('image_2_2')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('image_2_2');
                        $img->move('./media', $img->getName());

                        if($save == 'save-as-webp') {
                            $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                            $insert_data = [
                                'media_name' => $img_new,
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_data);
    
                            $model->changeMedia2Img1(['home_page_2_image_2' => $img_new]);
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
    
                            $model->changeMedia2Img1(['home_page_2_image_2' => $img->getName()]);
                        }

                        session()->setFlashdata('success', 'Image successfully updated');
                        return redirect()->to('/admin/tampilan-website/home');
                    }
                }
            } else if($act == '3_background') {
                $save = $this->request->getVar('save');
                if($img = $this->request->getFile('image_3')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('image_3');
                        $img->move('./media', $img->getName());

                        if($save == 'save-as-webp') {
                            $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                            $insert_data = [
                                'media_name' => $img_new,
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_data);
    
                            $model->changeMedia2Img1(['home_page_3_background' => $img_new]);
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
    
                            $model->changeMedia2Img1(['home_page_3_background' => $img->getName()]);
                        }

                        session()->setFlashdata('success', 'Image successfully updated');
                        return redirect()->to('/admin/tampilan-website/home');
                    }
                }
            } else if($act == '4_background') {
                $save = $this->request->getVar('save');
                if($img = $this->request->getFile('image_4')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('image_4');
                        $img->move('./media', $img->getName());

                        if($save == 'save-as-webp') {
                            $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                            $insert_data = [
                                'media_name' => $img_new,
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_data);
    
                            $model->changeMedia2Img1(['home_page_4_background' => $img_new]);
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
    
                            $model->changeMedia2Img1(['home_page_4_background' => $img->getName()]);
                        }

                        session()->setFlashdata('success', 'Image successfully updated');
                        return redirect()->to('/admin/tampilan-website/home');
                    }
                }
            } else if($act == '7_background') {
                $save = $this->request->getVar('save');
                if($img = $this->request->getFile('image_7')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('image_7');
                        $img->move('./media', $img->getName());

                        if($save == 'save-as-webp') {
                            $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                            $insert_data = [
                                'media_name' => $img_new,
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_data);
    
                            $model->changeMedia2Img1(['home_page_7_background' => $img_new]);
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
    
                            $model->changeMedia2Img1(['home_page_7_background' => $img->getName()]);
                        }

                        session()->setFlashdata('success', 'Image successfully updated');
                        return redirect()->to('/admin/tampilan-website/home');
                    }
                }
            } else if($act == 'team') {
                $position = $this->request->getVar('position');
                $id_team = $this->request->getVar('id_team');
                $model->updateTeamPosition($id_team, $position);

                session()->setFlashdata('success', 'Team successfully updated');
                return redirect()->to('/admin/tampilan-website/home');
            } else if($act == '9_img_1') {
                $save = $this->request->getVar('save');
                if($img = $this->request->getFile('image_9_1')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('image_9_1');
                        $img->move('./media', $img->getName());

                        if($save == 'save-as-webp') {
                            $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                            $insert_data = [
                                'media_name' => $img_new,
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_data);
    
                            $model->changeMedia2Img1(['home_page_9_image_1' => $img_new]);
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
    
                            $model->changeMedia2Img1(['home_page_9_image_1' => $img->getName()]);
                        }

                        session()->setFlashdata('success', 'Image successfully updated');
                        return redirect()->to('/admin/tampilan-website/home');
                    }
                }
            }
        }

        return view('admin/home', $data);
    }

    public function getHeader() {
        $db = db_connect();
        $model = new HomePageModel($db);
        $data['header'] = $model->header();
        return view('admin/home-header', $data);
    }

    public function getMedia() {
        $db = db_connect();
        $model = new HomePageModel($db);
        $data['media'] = $model->media();
        return view('admin/home-header-media', $data);
    }

    public function newHeaderText() {
        $id_header = $this->request->getVar('id_header');
        $small_title = $this->request->getVar('small_title');
        $big_title = $this->request->getVar('big_title');
        $db = db_connect();
        $model = new HomePageModel($db);
        $model->newHeaderText($id_header, ['home_page_header_big_title' => $big_title, 'home_page_header_small_title' => $small_title]);
        return 'true';
    }

    public function changeMediaHeader() {
        $id_header = $this->request->getVar('id_header');
        $media = $this->request->getVar('media');
        $db = db_connect();
        $model = new HomePageModel($db);
        $model->changeMediaHeader($id_header, ['home_page_header_image' => $media]);
        return 'true';
    }

    public function getEditImage() {
        $data['alt'] = $this->request->getVar('alt');
        $data['section'] = $this->request->getVar('section');
        $data['img'] = $this->request->getVar('img');
        $db = db_connect();
        $model = new HomePageModel($db);
        $data['media'] = $model->media();
        return view('admin/home-get-edit-image', $data);
    }

    public function changeMedia2Img1() {
        $section = $this->request->getVar('section');
        $img = $this->request->getVar('img');
        $media = $this->request->getVar('media');
        $db = db_connect();
        $model = new HomePageModel($db);
        $model->changeMedia2Img1(['home_page_'.$section.'_image_'.$img => $media]);
        return 'true';
    }

    public function changeMedia2Alt1() {
        $section = $this->request->getVar('section');
        $img = $this->request->getVar('img');
        $alt = $this->request->getVar('alt');
        $db = db_connect();
        $model = new HomePageModel($db);
        $model->changeMedia2Img1(['home_page_'.$section.'_image_'.$img.'_alt' => $alt]);
        return 'true';
    }

    public function updateHome() {
        $db = db_connect();
        $model = new HomePageModel($db);
        $act = $this->request->getVar('act');

        if($act == '2-big-title') {
            $big_title = $this->request->getVar('big_title');
            $model->changeMedia2Img1(['home_page_2_big_title' => $big_title]);
            return 'true';
        }else if($act == '2-small-title') {
            $small_title = $this->request->getVar('small_title');
            $model->changeMedia2Img1(['home_page_2_small_title' => $small_title]);
            return 'true';
        } else if($act == '2-desc') {
            $desc = $this->request->getVar('desc');
            $model->changeMedia2Img1(['home_page_2_desc' => $desc]);
            return 'true';
        } else if($act == '2-button') {
            $text = $this->request->getVar('text');
            $link = $this->request->getVar('link');
            $model->changeMedia2Img1(['home_page_2_button' => $text, 'home_page_2_button_link' => $link]);
            return 'true';
        } else if($act == '3-background') {
            $image = $this->request->getVar('image');
            $model->changeMedia2Img1(['home_page_3_background' => $image]);
            return 'true';
        } else if($act == '3-title') {
            $small_title = $this->request->getVar('small_title');
            $big_title = $this->request->getVar('big_title');
            $model->changeMedia2Img1(['home_page_3_big_title' => $big_title, 'home_page_3_small_title' => $small_title]);
            return 'true';
        } else if($act == '4-text') {
            $position = $this->request->getVar('position');
            $value = $this->request->getVar('value');
            $text = $this->request->getVar('text');
            $model->changeMedia2Img1(['home_page_4_'.$position.'_value' => $value, 'home_page_4_'.$position.'_text' => $text]);
            return 'true';
        } else if($act == '4-background') {
            $image = $this->request->getVar('image');
            $model->changeMedia2Img1(['home_page_4_background' => $image]);
            return 'true';
        } else if($act == '5-text') {
            $small_title = $this->request->getVar('small_title');
            $big_title = $this->request->getVar('big_title');
            $model->changeMedia2Img1(['home_page_5_big_title' => $big_title, 'home_page_5_small_title' => $small_title]);
            return 'true';
        } else if($act == '6-text') {
            $small_title = $this->request->getVar('small_title');
            $big_title = $this->request->getVar('big_title');
            $model->changeMedia2Img1(['home_page_6_big_title' => $big_title, 'home_page_6_small_title' => $small_title]);
            return 'true';
        } else if($act == '7-text') {
            $small_title = $this->request->getVar('small_title');
            $big_title = $this->request->getVar('big_title');
            $desc = $this->request->getVar('desc');
            $model->changeMedia2Img1(['home_page_7_big_title' => $big_title, 'home_page_7_small_title' => $small_title, 'home_page_7_desc' => $desc]);
            return 'true';
        } else if($act == '7-background') {
            $image = $this->request->getVar('image');
            $model->changeMedia2Img1(['home_page_7_background' => $image]);
            return 'true';
        } else if($act == '8-text') {
            $small_title = $this->request->getVar('small_title');
            $big_title = $this->request->getVar('big_title');
            $model->changeMedia2Img1(['home_page_8_big_title' => $big_title, 'home_page_8_small_title' => $small_title]);
            return 'true';
        }  else if($act == '9-text') {
            $small_title = $this->request->getVar('small_title');
            $big_title = $this->request->getVar('big_title');
            $model->changeMedia2Img1(['home_page_9_big_title' => $big_title, 'home_page_9_small_title' => $small_title]);
            return 'true';
        } else if($act == 'new-faq') {
            $question = $this->request->getVar('question');
            $answer = $this->request->getVar('answer');
            $data['faq'] = $model->insertFaq(['faq_home_question' => $question, 'faq_home_answer' => $answer]);
            return view('admin/home-faq-ajax', $data);
        } else if($act == 'update-faq') {
            $id_faq = $this->request->getVar('faq_id');
            $question = $this->request->getVar('question');
            $answer = $this->request->getVar('answer');
            $model->updateFaq($id_faq,['faq_home_question' => $question, 'faq_home_answer' => $answer]);
            return 'true';
        } else if($act == 'delete-faq') {
            $id_faq = $this->request->getVar('faq_id');
            $model->deleteFaq($id_faq);
            return 'true';
        }
    }

    public function getEditBackground() {
        $data['section'] = $this->request->getVar('section');
        $db = db_connect();
        $model = new HomePageModel($db);
        $data['media'] = $model->media();
        return view('admin/home-get-edit-background', $data);
    }

    public function getTeamOption() {
        $db = db_connect();
        $model = new HomePageModel($db);
        $team = $model->getAllTeam();
        return json_encode($team);
        // return $team;
    }

    public function keyphraseCheck() {
        $keyphrase = $this->request->getVar('keyphr');
        $db = db_connect();
        $seo = new SeoModel($db);
        $result = $seo->keyphraseCheckAjax('home', $keyphrase);
        return $result ? 'true' : 'false';
    }
}