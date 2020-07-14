<?php namespace App\Controllers;

use App\Models\JasaModel;
use App\Models\SeoModel;

class JasaController extends BaseController {
    public function index() {
        $db = db_connect();
        $model = new JasaModel($db);

        $data['jasa'] = $model->getAllJasa();
        
        return view('admin/jasa', $data);
    }

    public function create() {
        $data = [];
        helper('form');
        if($this->request->getMethod() == 'post') {
            $rules = [
                'nama' => 'required',
                'deskripsi' => 'required'
            ];

            if(!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $db = db_connect();
                $jasa = new JasaModel($db);
                $save = $this->request->getVar('save');
    
                // Upload Image
                if($img = $this->request->getFile('gambar')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('gambar');
                        $img->move('./media', $img->getName());

                        if($save == 'save-as-webp') {
                            $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                            $insert_data = [
                                'media_name' => $img_new,
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $jasa->insertMedia($insert_data);
    
                            $jasa_insert = [
                                'jasa_name' => $this->request->getVar('nama'),
                                'jasa_slug' => url_title($this->request->getVar('nama'), '-', TRUE),
                                'jasa_img' => $img_new,
                                'jasa_desc' => $this->request->getVar('deskripsi')
                            ];
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
                            $jasa->insertMedia($insert_data);
    
                            $jasa_insert = [
                                'jasa_name' => $this->request->getVar('nama'),
                                'jasa_slug' => url_title($this->request->getVar('nama'), '-', TRUE),
                                'jasa_img' => $img->getName(),
                                'jasa_desc' => $this->request->getVar('deskripsi')
                            ];
                        }
                       
                        $jasa->insertJasa($jasa_insert);
                        session()->setFlashdata('success', 'Data Successfully Added');
                        return redirect()->to('/admin/jasa');
                    } else {
                        session()->setFlashdata('error', 'Image is required');
                        return redirect()->to('/admin/jasa/create');
                    }
                }
            }

        }

        return view('admin/jasa-create', $data);
    }

    public function detail($id) {
        $db = db_connect();
        $model = new JasaModel($db);

        $data['jasa'] = $model->getJasaById($id);
        return view('admin/jasa-detail', $data);
    }

    public function edit($id) {
        helper('form');
        $db = db_connect();
        $model = new JasaModel($db);

        $data['jasa'] = $model->getJasaById($id);

        if($this->request->getMethod() == 'post') {
            $rules = [
                'nama' => 'required',
                'deskripsi' => 'required'
            ];

            if(!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $save = $this->request->getVar('save');
                if($img = $this->request->getFile('gambar')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('gambar');
                        $img->move('./media', $img->getName());

                        if($save == 'save-as-webp') {
                            $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                            $insert_data = [
                                'media_name' => $img_new,
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_data);
                            $jasa_update = [
                                'jasa_name' => $this->request->getVar('nama'),
                                'jasa_slug' => url_title($this->request->getVar('nama'), '-', TRUE),
                                'jasa_img' => $img_new,
                                'jasa_desc' => $this->request->getVar('deskripsi')
                            ];
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
                            $jasa_update = [
                                'jasa_name' => $this->request->getVar('nama'),
                                'jasa_slug' => url_title($this->request->getVar('nama'), '-', TRUE),
                                'jasa_img' => $img->getName(),
                                'jasa_desc' => $this->request->getVar('deskripsi')
                            ];
                        }
                    } else {
                        $jasa_update = [
                            'jasa_name' => $this->request->getVar('nama'),
                            'jasa_slug' => url_title($this->request->getVar('nama'), '-', TRUE),
                            'jasa_desc' => $this->request->getVar('deskripsi')
                        ];
                    }
                }

                $model->update($id, $jasa_update);
                session()->setFlashdata('success', 'Data Successfully Updated');
                return redirect()->to('/admin/jasa');
            }
        }


        return view('admin/jasa-edit', $data);
    }

    public function delete() {
        $id_jasa = $this->request->getVar('jasa_id');
        $db = db_connect();
        $model = new JasaModel($db);
        $model->delete($id_jasa);

        return 'true';
    }

    public function layout($id) {
        $db = db_connect();
        $model = new JasaModel($db);
        $seo = new SeoModel($db);

        // Check if service detail exist
        // inser new of not exist
        // get service page 
        $data['keyphrase_check'] = $seo->kepyhraseCheckWithId('service_detail', $id);
        $data['service_detail'] = $model->getServiceDetail($id);
        $data['testimonial'] = $model->getTestimonialVideo($id);
        $data['service_price'] = $model->getServicePriceByIdJasa($id);
        $data['faqs'] = $model->getFaq($id);


        if($this->request->getMethod() == 'post') {
            $act = $this->request->getVar('act');
             if($act == '1_background') {
                $this->_uploadNewImage('1', null, $this->request->getFile('image_1'), 'background', $id);
                return redirect()->to('/admin/jasa/layout/' . $id);
            } else if($act == '2_background') {
                $this->_uploadNewImage('2', null, $this->request->getFile('image_2'), 'background', $id);
                return redirect()->to('/admin/jasa/layout/' . $id);
            } else if($act == '6_background') {
                $this->_uploadNewImage('6', null, $this->request->getFile('image_6'), 'background', $id);
                return redirect()->to('/admin/jasa/layout/' . $id);
            } else if($act == '7_background') {
                $this->_uploadNewImage('7', null, $this->request->getFile('image_7'), 'background', $id);
                return redirect()->to('/admin/jasa/layout/' . $id);
            } else if($act == '8_background') {
                $this->_uploadNewImage('8', null, $this->request->getFile('image_8'), 'background', $id);
                return redirect()->to('/admin/jasa/layout/' . $id);
            } else if($act == '13_img_1') {
                $this->_uploadNewImage('13', '1', $this->request->getFile('image_13_1'), 'image', $id);
                return redirect()->to('/admin/jasa/layout/' . $id);
            } else if($act == '10_background') {
                $this->_uploadNewImage('10', null, $this->request->getFile('image_10'), 'background', $id);
                return redirect()->to('/admin/jasa/layout/' . $id);
            } else if($act == '11_background') {
                $this->_uploadNewImage('11', null, $this->request->getFile('image_11'), 'background', $id);
                return redirect()->to('/admin/jasa/layout/' . $id);
            } else if($act == '12_background') {
                $this->_uploadNewImage('12', null, $this->request->getFile('image_12'), 'background', $id);
                return redirect()->to('/admin/jasa/layout/' . $id);
            }
        }

        return view('admin/service-detail', $data);
        
    }

    public function seo($id) {

    }

    public function getEditBackground() {
        $data['section'] = $this->request->getVar('section');
        $data['id_jasa'] = $this->request->getVar('id_jasa');
        $db = db_connect();
        $model = new JasaModel($db);
        $data['media'] = $model->media();
        return view('admin/service-detail-get-edit-background', $data);
    }

    public function update() {
        $db = db_connect();
        $model = new JasaModel($db);
        $act = $this->request->getVar('act');
        $id_jasa = $this->request->getVar('id_jasa');
        
        if($act == '1-background') {
            $image = $this->request->getVar('image');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_1_img' => $image]);
            return 'true';
        } else if($act == '1-title') {
            $small_title = $this->request->getVar('small_title');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_1_small_title' => $small_title]);
            return 'true';
        } else if($act == '1-bread') {
            $bread_1 = $this->request->getVar('bread_1');
            $bread_2 = $this->request->getVar('bread_2');
            $bread_link = $this->request->getVar('bread_link');
            $model->updateServiceDetail($id_jasa,['service_detail_page_1_bread_1' => $bread_1, 'service_detail_page_1_bread_2' => $bread_2, 'service_detail_page_1_bread_link' => $bread_link]);
            return 'true';
        } else if($act == '2-background') {
            $image = $this->request->getVar('image');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_2_img' => $image]);
            return 'true';
        } else if($act == '2-title') {
            $small_title = $this->request->getVar('small_title');
            $big_title = $this->request->getVar('big_title');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_2_big_title'=> $big_title,'service_detail_page_2_small_title' => $small_title]);
            return 'true';
        } else if($act == 'button') {
            $section = $this->request->getVar('section');
            $text = $this->request->getVar('text');
            $link = $this->request->getVar('link');
            $position = $this->request->getVar('position');
            $model->updateServiceDetail($id_jasa,['service_detail_page_' . $section . '_btn_'.$position.'_text' => $text, 'service_detail_page_' . $section . '_btn_'.$position.'_link' => $link]);
            return 'true';
        } else if($act == '3-title') {
            $small_title = $this->request->getVar('small_title');
            $big_title = $this->request->getVar('big_title');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_3_big_title'=> $big_title,'service_detail_page_3_small_title' => $small_title]);
            return 'true';
        } else if($act == '4-title') {
            $small_title = $this->request->getVar('small_title');
            $big_title = $this->request->getVar('big_title');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_4_big_title'=> $big_title,'service_detail_page_4_small_title' => $small_title]);
            return 'true';
        } else if($act == 'delete-testimoni') {
            $testi_id = $this->request->getVar('testi_id');
            $model->deleteTestimoniVideo($testi_id);
            return 'true';
        } else if($act == 'video-testimoni') {
            $testimoni = $this->request->getVar('testimoni');

            $new_testimoni = str_replace('<p>', '', $testimoni);
            $new_testimoni = str_replace('</p>', '', $new_testimoni);
            $new_testimoni = str_replace('<br>', '', $new_testimoni);

            $height = $this->_get_string_between($new_testimoni, 'height="', '"');
            $width = $this->_get_string_between($new_testimoni, 'width="', '"');

            $new_testimoni = str_replace('height="'.$height.'"', 'height="315"', $new_testimoni);
            $new_testimoni = str_replace('width="'.$width.'"', 'width="100%"', $new_testimoni);

            $new = $model->insertTestimoniVideo(['jasa_id' => $id_jasa, 'service_testimoni_video' => $new_testimoni]);
            return json_encode($new);
        } else if($act == '5-title') {
            $small_title = $this->request->getVar('small_title');
            $big_title = $this->request->getVar('big_title');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_5_big_title'=> $big_title,'service_detail_page_5_small_title' => $small_title]);
            return 'true';
        } else if($act == '5-desc') {
            $desc = $this->request->getVar('desc');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_5_desc' => $desc]);
            return 'true';
        } else if($act == '5-price') {
            $data = $this->request->getVar('data');
            $price_id = $this->request->getVar('price_id');
            $model->updatePrice($price_id, $data);
            return 'true';
        } else if($act == '5-add-price') {
            $data = $this->request->getVar('data');
            $new_id = $model->insertPrice($data);
            return $new_id;
        } else if($act == 'delete-price') {
            $price_id = $this->request->getVar('price_id');
            $model->deletePrice($price_id);
            return 'true';
        } else if($act == '6-background') {
            $image = $this->request->getVar('image');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_6_img' => $image]);
            return 'true';
        } else if($act == '6-title') {
            $big_title = $this->request->getVar('big_title');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_6_big_title' => $big_title]);
            return 'true';
        } else if($act == '6-desc') {
            $desc = $this->request->getVar('desc');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_6_desc' => $desc]);
            return 'true';
        } else if($act == '7-background') {
            $image = $this->request->getVar('image');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_7_img' => $image]);
            return 'true';
        } else if($act == '8-background') {
            $image = $this->request->getVar('image');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_8_img' => $image]);
            return 'true';
        } else if($act == '8-desc') {
            $desc = $this->request->getVar('desc');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_8_desc' => $desc]);
            return 'true';
        } else if($act == '9-title') {
            $big_title = $this->request->getVar('big_title');
            $desc = $this->request->getVar('desc');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_9_big_title' => $big_title, 'service_detail_page_9_desc' => $desc]);
            return 'true';
        } else if($act == '9-button') {
            $section = $this->request->getVar('section');
            $text = $this->request->getVar('text');
            $link = $this->request->getVar('link');
            $model->updateServiceDetail($id_jasa,['service_detail_page_' . $section . '_btn_text' => $text, 'service_detail_page_' . $section . '_btn_link' => $link]);
            return 'true';
        } else if($act == 'alt') {
            $section = $this->request->getVar('section');
            $img = $this->request->getVar('img');
            $alt = $this->request->getVar('alt');
            $model->updateServiceDetail($id_jasa,['service_detail_page_' . $section . '_img_' . $img . '_alt' => $alt]);
            return 'true';
        } else if($act == 'change-media') {
            $section = $this->request->getVar('section');
            $img = $this->request->getVar('img');
            $media = $this->request->getVar('media');
            $model->updateServiceDetail($id_jasa,['service_detail_page_' . $section . '_img_' . $img => $media]);
            return 'true';
        } else if($act == '13-title') {
            $small_title = $this->request->getVar('small_title');
            $big_title = $this->request->getVar('big_title');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_13_big_title'=> $big_title,'service_detail_page_13_small_title' => $small_title]);
            return 'true';
        } else if($act == 'new-faq') {
            $question = $this->request->getVar('question');
            $answer = $this->request->getVar('answer');
            $data['faq'] = $model->insertFaq(['jasa_id' => $id_jasa, 'faq_jasa_question' => $question, 'faq_jasa_answer' => $answer]);
            return view('admin/faq-jasa-ajax', $data);
        } else if($act == 'update-faq') {
            $faq_id = $this->request->getVar('faq_id');
            $question = $this->request->getVar('question');
            $answer = $this->request->getVar('answer');
            $model->updateFaqData($faq_id, ['faq_jasa_question' => $question, 'faq_jasa_answer' => $answer]);
            return 'true';
        } else if($act == 'delete-faq') {
            $faq_id = $this->request->getVar('faq_id');
            $model->deleteFaq($faq_id);
            return 'true';
        } else if($act == '10-background') {
            $image = $this->request->getVar('image');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_10_img' => $image]);
            return 'true';
        } else if($act == '10-text') {
            $position = $this->request->getVar('position');
            $value = $this->request->getVar('value');
            $text = $this->request->getVar('text');
            $model->updateServiceDetail($id_jasa,['service_detail_page_10_num_' . $position => $value, 'service_detail_page_10_text_' . $position => $text]);
            return 'true';
        } else if($act == '10-pros') {
            $position = $this->request->getVar('position');
            $title = $this->request->getVar('title');
            $desc = $this->request->getVar('desc');
            $model->updateServiceDetail($id_jasa,['service_detail_page_10_pros_' . $position . '_title' => $title, 'service_detail_page_10_pros_' . $position . '_desc' => $desc]);
            return 'true';
        } else if($act == '11-background') {
            $image = $this->request->getVar('image');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_11_img' => $image]);
            return 'true';
        } else if($act == '11-title') {
            $small_title = $this->request->getVar('small_title');
            $big_title = $this->request->getVar('big_title');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_11_big_title'=> $big_title,'service_detail_page_11_small_title' => $small_title]);
            return 'true';
        } else if($act == '11-text') {
            $position = $this->request->getVar('position');
            $title = $this->request->getVar('title');
            $desc = $this->request->getVar('desc');
            $model->updateServiceDetail($id_jasa,['service_detail_page_11_title_' . $position => $title, 'service_detail_page_11_desc_' . $position => $desc]);
            return 'true';
        } else if($act == '12-background') {
            $image = $this->request->getVar('image');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_12_img' => $image]);
            return 'true';
        } else if($act == '12-title') {
            $small_title = $this->request->getVar('small_title');
            $big_title = $this->request->getVar('big_title');
            $model->updateServiceDetail($id_jasa, ['service_detail_page_12_big_title'=> $big_title,'service_detail_page_12_small_title' => $small_title]);
            return 'true';
        }
    }

    private function _uploadNewImage($section, $position, $image, $type, $id) {
        $db = db_connect();
        $model = new JasaModel($db);
        if($img = $image) {
            if ($img->isValid() && ! $img->hasMoved()) {
                $img = $image;
                $img->move('./media', $img->getName());
                $insert_data = [
                    'media_name' => $img->getName(),
                    'media_created_at' => date('Y-m-d H:i:s')
                ];
                $model->insertMedia($insert_data);

                if($type == 'background'):
                    $model->updateServiceDetail($id, ['service_detail_page_' . $section . '_img' => $img->getName()]);
                    session()->setFlashdata('success', 'Background successfully updated');
                else:
                    $model->updateServiceDetail($id,['service_detail_page_' . $section . '_img_' . $position => $img->getName()]);
                    session()->setFlashdata('success', 'Image successfully updated');
                endif;
            }
        }
    }

    private function _get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    public function getEditImage() {
        $data['alt'] = $this->request->getVar('alt');
        $data['section'] = $this->request->getVar('section');
        $data['img'] = $this->request->getVar('img');
        $data['id_jasa'] = $this->request->getVar('id_jasa');
        $db = db_connect();
        $model = new JasaModel($db);
        $data['media'] = $model->media();
        return view('admin/service-detail-get-edit-image', $data);
    }
}