<?php namespace App\Controllers;

use App\Models\PortfolioModel;
use Config\Services;

class PortfolioController extends BaseController {

    public function index() {
        $db = db_connect();
        $model = new PortfolioModel($db);

        $data['portfolio'] = $model->getAllPortfolio();
        return view('admin/portfolio', $data);
    }

    public function create() {
        $data = [];
        helper('form');
        $db = db_connect();
        $model = new PortfolioModel($db);
        $data['category'] = $model->getCategory();

        if($this->request->getMethod() == 'post') {
            $rules = [
                'nama' => 'required',
                'lokasi' => 'required',
                'kategori_name' => 'required',
            ];

            if(!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $save = $this->request->getVar('save');
                if($this->request->getVar('kategori_tipe') == 'new') {
                    $category_data = [
                        'portfolio_category_name' => $this->request->getVar('kategori_name')
                    ];
                    $id_kategori = $model->insertCategory($category_data);
                } else {
                    $id_kategori = $this->request->getVar('kategori_name');
                }

                $insert_data = [
                    'portfolio_category_id' => $id_kategori,
                    'portfolio_title' => $this->request->getVar('nama'),
                    'portfolio_slug' => url_title($this->request->getVar('nama'), '-', TRUE),
                    'portfolio_description' => $this->request->getVar('deskripsi'),
                    'portfolio_challenge' => $this->request->getVar('tantangan'),
                    'portfolio_challenge_detail' => json_encode($this->request->getVar('point_challenge')),
                    'portfolio_what_we_did' => $this->request->getVar('solusi'),
                    'portfolio_result' => $this->request->getVar('hasil'),
                    'portfolio_information' => $this->request->getVar('informasi'),
                    'portfolio_client' => $this->request->getVar('klien'),
                    'portfolio_location' => $this->request->getVar('lokasi'),
                    'portfolio_surface_area' => $this->request->getVar('luas_area'),
                    'portfolio_year_completed' => $this->request->getVar('tahun_selesai'),
                    'portfolio_value' => $this->request->getVar('nilai_project'),
                    'portfolio_architect' => $this->request->getVar('arsitek'),
                    'portfolio_client_job' => $this->request->getVar('pekerjaan_klien'),
                    'portfolio_testimonial' => $this->request->getVar('testimoni_klien') ? $this->request->getVar('testimoni_klien') : NULL,
                    'portfolio_created' => date('Y-m-d')
                ];

                // Check client photo
                if($img = $this->request->getFile('foto_klien')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('foto_klien');
                        $img->move('./media', $img->getName());

                        if($save == 'save-as-webp') {
                            $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                            $insert_media = [
                                'media_name' => $img_new,
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_media);
                            $insert_data['portfolio_client_photo'] =  $img_new;
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
                            $insert_media = [
                                'media_name' => $img->getName(),
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_media);
                            $insert_data['portfolio_client_photo'] =  $img->getName();
                        }
                    } 
                }

                // Check client logo
                if($img = $this->request->getFile('logo_klien')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('logo_klien');
                        $img->move('./media', $img->getName());

                        if($save == 'save-as-webp') {
                            $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                            $insert_media = [
                                'media_name' => $img_new,
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_media);
                            $insert_data['portfolio_client_logo'] =  $img_new;
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
                            $insert_media = [
                                'media_name' => $img->getName(),
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_media);
                            $insert_data['portfolio_client_logo'] =  $img->getName();
                        }
                    } 
                }

                // Check main image
                if($img = $this->request->getFile('main_image')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('main_image');
                        $img->move('./media', $img->getName());

                        if($save == 'save-as-webp') {
                            $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                            $insert_media = [
                                'media_name' => $img_new,
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_media);
                            $insert_data['portfolio_main_image'] =  $img_new;
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
                            $insert_media = [
                                'media_name' => $img->getName(),
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_media);
                            $insert_data['portfolio_main_image'] =  $img->getName();
                        }

                        $portfolio_id = $model->insertPortfolio($insert_data);

                    } else {
                        session()->setFlashdata('error', 'Main Image is required');
                        return redirect()->to('/admin/portfolio/create');
                    }
                } else {
                    session()->setFlashdata('error', 'Main Image is Not Uploaded');
                    return redirect()->to('/admin/portfolio/create');
                }

                // Check other images
                if($images = $this->request->getFiles('other_image')) {
                    foreach($images['other_image'] as $image) {
                        if($image->isValid() && ! $image->hasMoved()) {
                            $image->move('./media', $image->getName());

                            if($save == 'save-as-webp') {
                                $img_new = str_replace($image->getClientExtension(), '', $image->getName()) . 'webp';
                                $insert_media = [
                                    'media_name' => $img_new,
                                    'media_created_at' => date('Y-m-d H:i:s')
                                ];
    
                                $model->insertMedia($insert_media);
                                $model->insertPortImage($portfolio_id, $img_new);
                                if($image->getClientExtension() == 'png') {
                                    $img_new_a = imagecreatefrompng('./media/' . $image->getName());
                                } else {
                                    $img_new_a = imagecreatefromjpeg('./media/' . $image->getName());
                                }
                                imagepalettetotruecolor($img_new_a);
                                imagealphablending($img_new_a, true);
                                imagesavealpha($img_new_a, true);
                                imagewebp($img_new_a, './media/' . $img_new, 80);
                                imagedestroy($img_new_a);
                                unlink(FCPATH . 'media/' . $image->getName());
                            } else {
                                $insert_media = [
                                    'media_name' => $image->getName(),
                                    'media_created_at' => date('Y-m-d H:i:s')
                                ];
    
                                $model->insertMedia($insert_media);
                                $model->insertPortImage($portfolio_id, $image->getName());
                            }
                        }
                    }
                }

                session()->setFlashdata('success', 'Portfolio Successfully Added');
                return redirect()->to('/admin/portfolio');
            }
        }

        return view('admin/portfolio-create', $data);
    }

    public function delete() {
        $portfolio_id = $this->request->getVar('portfolio_id');
        $db = db_connect();
        $model = new PortfolioModel($db);
        $model->deletePortfolio($portfolio_id);
        return 'true';
    }

    public function detail($id) {
        $db = db_connect();
        $model = new PortfolioModel($db);
        $data['portfolio'] = $model->getDetailPort($id);
        $data['portfolio_images'] = $model->getDetailImagePort($id);
        return view('admin/portfolio-detail', $data);
    }

    public function edit($id) {
        $db = db_connect();
        $model = new PortfolioModel($db);
        $data['category'] = $model->getCategory();
        helper('form');
        
        if($this->request->getMethod() == 'post') {
            $rules = [
                'nama' => 'required',
                'lokasi' => 'required',
                'kategori_name' => 'required'
            ];

            if(!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $save = $this->request->getVar('save');
                if($this->request->getVar('kategori_tipe') == 'new') {
                    $category_data = [
                        'portfolio_category_name' => $this->request->getVar('kategori_name')
                    ];
                    $id_kategori = $model->insertCategory($category_data);
                } else {
                    $id_kategori = $this->request->getVar('kategori_name');
                }
                $insert_data = [
                    'portfolio_category_id' => $id_kategori,
                    'portfolio_title' => $this->request->getVar('nama'),
                    'portfolio_slug' => url_title($this->request->getVar('nama'), '-', TRUE),
                    'portfolio_description' => $this->request->getVar('deskripsi'),
                    'portfolio_challenge' => $this->request->getVar('tantangan'),
                    'portfolio_challenge_detail' => json_encode($this->request->getVar('point_challenge')),
                    'portfolio_what_we_did' => $this->request->getVar('solusi'),
                    'portfolio_result' => $this->request->getVar('hasil'),
                    'portfolio_information' => $this->request->getVar('informasi'),
                    'portfolio_client' => $this->request->getVar('klien'),
                    'portfolio_location' => $this->request->getVar('lokasi'),
                    'portfolio_surface_area' => $this->request->getVar('luas_area'),
                    'portfolio_year_completed' => $this->request->getVar('tahun_selesai'),
                    'portfolio_value' => $this->request->getVar('nilai_project'),
                    'portfolio_architect' => $this->request->getVar('arsitek'),
                    'portfolio_client_job' => $this->request->getVar('pekerjaan_klien'),
                    'portfolio_testimonial' => $this->request->getVar('testimoni_klien') ? $this->request->getVar('testimoni_klien') : NULL
                ];

                // Check client photo
                if($img = $this->request->getFile('foto_klien')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('foto_klien');
                        $img->move('./media', $img->getName());

                        if($save == 'save-as-webp') {
                            $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                            $insert_media = [
                                'media_name' => $img_new,
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_media);
                            $insert_data['portfolio_client_photo'] =  $img_new;
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
                            $insert_media = [
                                'media_name' => $img->getName(),
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_media);
                            $insert_data['portfolio_client_photo'] =  $img->getName();
                        }
                    } 
                }

                // Check client logo
                if($img = $this->request->getFile('logo_klien')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('logo_klien');
                        $img->move('./media', $img->getName());

                        if($save == 'save-as-webp') {
                            $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                            $insert_media = [
                                'media_name' => $img_new,
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_media);
                            $insert_data['portfolio_client_logo'] =  $img_new;
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
                            $insert_media = [
                                'media_name' => $img->getName(),
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_media);
                            $insert_data['portfolio_client_logo'] =  $img->getName();
                        }
                    } 
                }

                // Check main image
                if($img = $this->request->getFile('main_image')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('main_image');
                        $img->move('./media', $img->getName());

                        if($save == 'save-as-webp') {
                            $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                            $insert_media = [
                                'media_name' => $img_new,
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_media);
                            $insert_data['portfolio_main_image'] =  $img_new;
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
                            $insert_media = [
                                'media_name' => $img->getName(),
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_media);
                            $insert_data['portfolio_main_image'] =  $img->getName();
                        }
                    }
                }
                
                $model->updatePortfolio($id,$insert_data);

                // Check other images
                if($images = $this->request->getFiles('other_image')) {
                    foreach($images['other_image'] as $image) {
                        if($image->isValid() && ! $image->hasMoved()) {
                            $image->move('./media', $image->getName());

                            if($save == 'save-as-webp') {
                                $img_new = str_replace($image->getClientExtension(), '', $image->getName()) . 'webp';
                                $insert_media = [
                                    'media_name' => $img_new,
                                    'media_created_at' => date('Y-m-d H:i:s')
                                ];
    
                                $model->insertMedia($insert_media);
                                $model->insertPortImage($id, $img_new);
                                if($image->getClientExtension() == 'png') {
                                    $img_new_a = imagecreatefrompng('./media/' . $image->getName());
                                } else {
                                    $img_new_a = imagecreatefromjpeg('./media/' . $image->getName());
                                }
                                imagepalettetotruecolor($img_new_a);
                                imagealphablending($img_new_a, true);
                                imagesavealpha($img_new_a, true);
                                imagewebp($img_new_a, './media/' . $img_new, 80);
                                imagedestroy($img_new_a);
                                unlink(FCPATH . 'media/' . $image->getName());
                            } else {
                                $insert_media = [
                                    'media_name' => $image->getName(),
                                    'media_created_at' => date('Y-m-d H:i:s')
                                ];
    
                                $model->insertMedia($insert_media);
                                $model->insertPortImage($id, $image->getName());
                            }
                        }
                    }
                }

                session()->setFlashdata('success', 'Portfolio Successfully Updated');
                return redirect()->to('/admin/portfolio');
            }
        }
        
        $data['portfolio'] = $model->getDetailPort($id);
        return view('admin/portfolio-edit', $data);
    }

    public function layout($id) {
        $db = db_connect();
        $model = new PortfolioModel($db);
        $data['portfolio_detail'] = $model->getPortfolioDetail($id);
        return view('admin/portfolio-layout', $data);
    }

    public function update() {
        $db = db_connect();
        $model = new PortfolioModel($db);
        $id_portfolio = $this->request->getVar('id_portfolio');
        $act = $this->request->getVar('act');

        if($act == '3-title') {
            $position = $this->request->getVar('position');
            $title = $this->request->getVar('title');
            $model->updatePortfolioDetail($id_portfolio, ['project_detail_page_3_title_' . $position => $title]);
            return 'true';
        } else if($act == '4-title') {
            $title = $this->request->getVar('title');
            $model->updatePortfolioDetail($id_portfolio, ['project_detail_page_4_title' => $title]);
            return 'true';
        } else if($act == '5-title') {
            $title = $this->request->getVar('title');
            $model->updatePortfolioDetail($id_portfolio, ['project_detail_page_5_title' => $title]);
            return 'true';
        } else if($act == '6-title') {
            $title = $this->request->getVar('title');
            $model->updatePortfolioDetail($id_portfolio, ['project_detail_page_6_title' => $title]);
            return 'true';
        } else if($act == '7-title') {
            $title = $this->request->getVar('title');
            $desc = $this->request->getVar('desc');
            $btn_text = $this->request->getVar('btn_text');
            $btn_link = $this->request->getVar('btn_link');
            $model->updatePortfolioDetail($id_portfolio, ['project_detail_page_7_big_title' => $title, 'project_detail_page_7_desc' => $desc, 'project_detail_page_7_btn' => $btn_text, 'project_detail_page_7_link' => $btn_link]);
            return 'true';
        }

    }

}