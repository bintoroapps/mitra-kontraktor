<?php namespace App\Controllers;

use App\Models\CompanyProfile;
use CodeIgniter\HTTP\Files\UploadedFile;

class Company extends BaseController {
    public function index() {
        $db = db_connect();
        $data = [];
        helper('form');
        $model = new CompanyProfile($db);
        $data['company'] = $model->getCompany();

        if($this->request->getMethod() == 'post') {
            $act = $this->request->getVar('act');
            $save = $this->request->getVar('save');

            if($act) {
                if($img = $this->request->getFile('footer')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('footer');
                        $img->move('./media', $img->getName());

                        if($save == 'save-as-webp') {
                            $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                            $insert_data = [
                                'media_name' => $img_new,
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $media = $model->insertMedia($insert_data);
    
                            $model->updateCompany(['company_footer' => $img_new]);
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
                            $media = $model->insertMedia($insert_data);
    
                            $model->updateCompany(['company_footer' => $img->getName()]);
                        }
                    }
                }
            } else {
                $rules = [
                    'nama' => 'required',
                    'telp' => 'required|numeric',
                    'alamat' => 'required',
                    'email' => 'required|valid_email'
                ];
    
                if(!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                }
    
                $media = '';
    
                // Check Image
                if($img = $this->request->getFile('logo')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('logo');
                        $img->move('./media', $img->getName());

                        if($save == 'save-as-webp') {
                            $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                            $insert_data = [
                                'media_name' => $img_new,
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $media = $model->insertMedia($insert_data);
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
                            $media = $model->insertMedia($insert_data);
                        }
                        
                    }
                }
    
                if($media) {
                    $insert_company = [
                        'company_name' => $this->request->getVar('nama'),
                        'company_address' => $this->request->getVar('alamat'),
                        'company_description' => $this->request->getVar('deskripsi'),
                        'company_telp' => $this->request->getVar('telp'),
                        'company_email' => $this->request->getVar('email'),
                        'company_map' => $this->request->getVar('embed_google_maps'),
                        'company_facebook' => $this->request->getVar('facebook'),
                        'company_youtube' => $this->request->getVar('youtube'),
                        'company_instagram' => $this->request->getVar('instagram'),
                        'company_whatsapp' => $this->request->getVar('whatsapp'),
                        'media_id' => $media
                    ];
                    if($save == 'save-as-webp') {
                        session()->set(['company_photo' => $img_new]);
                    } else {
                        session()->set(['company_photo' => $img->getName()]);
                    }
                } else {
                    $insert_company = [
                        'company_name' => $this->request->getVar('nama'),
                        'company_address' => $this->request->getVar('alamat'),
                        'company_description' => $this->request->getVar('deskripsi'),
                        'company_telp' => $this->request->getVar('telp'),
                        'company_email' => $this->request->getVar('email'),
                        'company_map' => $this->request->getVar('embed_google_maps'),
                        'company_facebook' => $this->request->getVar('facebook'),
                        'company_youtube' => $this->request->getVar('youtube'),
                        'company_instagram' => $this->request->getVar('instagram'),
                        'company_whatsapp' => $this->request->getVar('whatsapp')
                    ];
                }
    
                $model->updateCompany($insert_company);
                session()->set(['company_name' => $this->request->getVar('nama')]);
            }

            $session = session();
            $session->setFlashdata('success', 'Data Successfully Updated');


            return redirect()->to('/admin/company-profile');
        }

        return view('admin/company', $data);
    }
}