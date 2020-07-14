<?php  namespace App\Controllers;

use App\Models\TeamModel;

class TeamController extends BaseController {
    
    public function index() {
        $db = db_connect();
        $model = new TeamModel($db);
        $data['teams'] = $model->getAllTeam();
        return view('admin/team', $data);
    }

    public function create() {
        $db = db_connect();
        $model = new TeamModel($db);
        helper('form');
        $data['role'] = $model->getTeamRole();

        if($this->request->getMethod() == 'post') {
            $rules = [
                'nama' => 'required',
                'role' => 'required'
            ];
            if(!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $save = $this->request->getVar('save');
                $data_input = [
                    'team_name' => $this->request->getVar('nama'),
                    'team_role' => $this->request->getVar('role'),
                    'team_facebook' => $this->request->getVar('link_facebook'),
                    'team_twitter' => $this->request->getVar('link_twitter'),
                    'team_google_plus' => $this->request->getVar('link_google_plus'),
                    'team_instagram' => $this->request->getVar('link_instagram'),
                    'team_whatsapp' => $this->request->getVar('nomor_whatsapp')
                ];

                // Check Image
                if($img = $this->request->getFile('foto_profil')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('foto_profil');
                        $img->move('./media', $img->getName());
                        if($save == 'save-as-webp') {
                            $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                            $insert_data = [
                                'media_name' => $img_new,
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_data);
                            $data_input['team_image'] = $img_new;
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
                            $data_input['team_image'] = $img->getName();
                        }
                    }
                }

                $model->insertTeam($data_input);
                session()->setFlashdata('success', 'Data Successfully Added');
                return redirect()->to('/admin/team');
            }
        }

        return view('admin/team-create', $data);
    }

    public function edit($id) {
        $db = db_connect();
        $model = new TeamModel($db);
        helper('form');
        $data['team'] = $model->getTeamById($id);
        $data['role'] = $model->getTeamRole();


        if($this->request->getMethod() == 'post') {
            $rules = [
                'nama' => 'required',
                'role' => 'required'
            ];
            if(!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $save = $this->request->getVar('save');
                $data_input = [
                    'team_name' => $this->request->getVar('nama'),
                    'team_role' => $this->request->getVar('role'),
                    'team_facebook' => $this->request->getVar('link_facebook'),
                    'team_twitter' => $this->request->getVar('link_twitter'),
                    'team_google_plus' => $this->request->getVar('link_google_plus'),
                    'team_instagram' => $this->request->getVar('link_instagram'),
                    'team_whatsapp' => $this->request->getVar('nomor_whatsapp')
                ];

                // Check Image
                if($img = $this->request->getFile('foto_profil')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('foto_profil');
                        $img->move('./media', $img->getName());
                        if($save == 'save-as-webp') {
                            $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                            $insert_data = [
                                'media_name' => $img_new,
                                'media_created_at' => date('Y-m-d H:i:s')
                            ];
                            $model->insertMedia($insert_data);
                            $data_input['team_image'] = $img_new;
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
                            $data_input['team_image'] = $img->getName();
                        }
                    }
                }

                $model->updateTeam($id, $data_input);
                session()->setFlashdata('success', 'Data Successfully Updated');
                return redirect()->to('/admin/team');
            }
        }

        return view('admin/team-edit', $data);
    }

    public function delete() {
        $team_id = $this->request->getVar('team_id');
        $db = db_connect();
        $model = new TeamModel($db);
        $model->deleteTeam($team_id);
        return 'true';
    }
}