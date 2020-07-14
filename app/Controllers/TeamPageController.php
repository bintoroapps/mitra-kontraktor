<?php namespace App\Controllers;

use App\Models\TeamPageModel;

class TeamPageController extends BaseController {

    public function index() {
        $db = db_connect();
        $model = new TeamPageModel($db);
        $data['team'] = $model->getTeam();
        $data['team_category'] = $model->getTeamCategory();

        if($this->request->getMethod() == 'post') {
            $act = $this->request->getVar('act');
             if($act == '1_background') {
                $this->_uploadNewImage('1', null, $this->request->getFile('image_1'), 'background', $this->request->getVar('save'));
                return redirect()->to('/admin/tampilan-website/team');
            }
        }

        return view('admin/team_page', $data);
    }

    private function _uploadNewImage($section, $position, $image, $type, $save) {
        $db = db_connect();
        $model = new TeamPageModel($db);
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
                        $model->updateTeam(['team_page_' . $section . '_img' => $img_new]);
                        session()->setFlashdata('success', 'Background successfully updated');
                    else:
                        $model->updateTeam(['team_page_' . $section . '_img_' . $position => $img_new]);
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
                        $model->updateTeam(['team_page_' . $section . '_img' => $img->getName()]);
                        session()->setFlashdata('success', 'Background successfully updated');
                    else:
                        $model->updateTeam(['team_page_' . $section . '_img_' . $position => $img->getName()]);
                        session()->setFlashdata('success', 'Image successfully updated');
                    endif;
                }
            }
        }
    }

    public function update() {
        $db = db_connect();
        $model = new TeamPageModel($db);
        $act = $this->request->getVar('act');
        
        if($act == '1-background') {
            $image = $this->request->getVar('image');
            $model->updateTeam(['team_page_1_img' => $image]);
            return 'true';
        } else if($act == '1-title') {
            $small_title = $this->request->getVar('small_title');
            $big_title = $this->request->getVar('big_title');
            $model->updateTeam(['team_page_1_big_title' => $big_title, 'team_page_1_small_title' => $small_title]);
            return 'true';
        } else if($act == '1-bread') {
            $bread_1 = $this->request->getVar('bread_1');
            $bread_2 = $this->request->getVar('bread_2');
            $bread_link = $this->request->getVar('bread_link');
            $model->updateTeam(['team_page_1_bread_1' => $bread_1, 'team_page_1_bread_2' => $bread_2, 'team_page_1_bread_link' => $bread_link]);
            return 'true';
        } else if($act == 'add-team-category') {
            $team_category = $this->request->getVar('team_category');
            $data['team_category'] = $model->addNewCategory(['team_category_name' => $team_category, 'team_category_created_at' => date('Y-m-d H:i:s')]);
            return view('admin/team-category-ajax', $data);
        } else if($act == 'get-team-null') {
            $teams = $model->getTeamCategoryNull();
            return $teams ? json_encode($teams) : NULL;
        } else if($act == 'add-team-to-category') {
            $team_id = $this->request->getVar('team_id');
            $team_category_id = $this->request->getVar('team_category_id');
            $data['team'] = $model->updateTeamCategory($team_id, ['team_category_id' => $team_category_id, 'team_category_created' => date('Y-m-d H:i:s')]);
            return view('admin/team-list-category-ajax', $data);
        } else if($act == 'delete-team-category') {
            $team_category_id = $this->request->getVar('team_category_id');
            $model->deleteTeamCategory($team_category_id);
            return 'true';
        } else if($act == 'delete-team-member') {
            $id_team = $this->request->getVar('id_team');
            $model->deleteTeamMember($id_team);
            return 'true';
        } else if($act == '2-name') {
            $name = $this->request->getVar('name');
            $team_category_id = $this->request->getVar('team_category_id');
            $model->updateCategoryTeam($team_category_id, ['team_category_name' => $name]);
            return 'true';
        }
    }

    public function getEditBackground() {
        $data['section'] = $this->request->getVar('section');
        $db = db_connect();
        $model = new TeamPageModel($db);
        $data['media'] = $model->media();
        return view('admin/team-get-edit-background', $data);
    }

    public static function getTeamByTeamCategoryId($id) {
        $db = db_connect();
        $model = new TeamPageModel($db);
        return $model->getTeamByTeamCategoryId($id);
    }

}