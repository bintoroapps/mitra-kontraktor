<?php namespace App\Controllers;

use App\Models\BlogModel;

class BlogController extends BaseController {
    public function index() {
        $db = db_connect();
        $model = new BlogModel($db);
        $data['blogs'] = $model->getAllBlog();
        return view('admin/blog', $data);
    }

    public function create() {
        $data = [];
        $db = db_connect();
        $model = new BlogModel($db);
        $data['category'] = $model->getAllCategory();
        helper('form');

        if($this->request->getMethod() == 'post') {
            $rules = [
                'judul' => 'required',
                'kategori_name' => 'required',
                'konten' => 'required',
                'tags' => 'required'
            ];

            if(!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                // check image
                if($img = $this->request->getFile('gambar_utama')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('gambar_utama');
                        $img->move('./media', $img->getName());
                        $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                        $insert_media = [
                            'media_name' => $img_new,
                            'media_created_at' => date('Y-m-d H:i:s')
                        ];
                        $model->insertMedia($insert_media);

                        if($this->request->getVar('kategori_tipe') == 'new') {
                            $category_data = [
                                'blog_category_name' => $this->request->getVar('kategori_name'),
                                'blog_category_slug' => url_title($this->request->getVar('kategori_name'), '-', TRUE)
                            ];
                            $id_kategori = $model->insertCategory($category_data);
                        } else {
                            $id_kategori = $this->request->getVar('kategori_name');
                        }

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

                        $insert_data = [
                            'blog_category_id' => $id_kategori,
                            'blog_tags' => json_encode(explode(',', $this->request->getVar('tags'))),
                            'blog_content' => $this->request->getVar('konten'),
                            'blog_image' => $img_new,
                            'blog_title' => $this->request->getVar('judul'),
                            'user_id' => session('id'),
                            'blog_slug' => url_title($this->request->getVar('judul'), '-', TRUE),
                            'blog_status' => $this->request->getVar('submit_type') == 'post' ? 'post' : 'draft',
                            'blog_created' => date('Y-m-d H:i:s'),
                            'blog_post' => $this->request->getVar('submit_type') == 'post' ? date('Y-m-d H:i:s') : NULL
                        ];

                        $model->insertBlog($insert_data);
                        session()->setFlashdata('success', 'Data Successfully Created');
                        return redirect()->to('/admin/artikel');

                    } else {
                        session()->setFlashdata('error', 'Gambar Utama is Required');
                        return redirect()->to('/admin/artikel/create');
                    }
                } else {
                    session()->setFlashdata('error', 'Gambar Utama is Required');
                    return redirect()->to('/admin/artikel/create');
                }
            }
        }

        return view('admin/blog-create', $data);
    }

    public function edit($id) {
        $db = db_connect();
        $model = new BlogModel($db);
        helper('form');
        $data['category'] = $model->getAllCategory();
        $data['blog'] = $model->getDetailBlog($id);

        if($this->request->getMethod() == 'post') {
            $rules = [
                'judul' => 'required',
                'kategori_name' => 'required',
                'konten' => 'required',
                'tags' => 'required'
            ];

            if(!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                if($this->request->getVar('kategori_tipe') == 'new') {
                    $category_data = [
                        'blog_category_name' => $this->request->getVar('kategori_name'),
                        'blog_category_slug' => url_title($this->request->getVar('kategori_name'), '-', TRUE)
                    ];
                    $id_kategori = $model->insertCategory($category_data);
                } else {
                    $id_kategori = $this->request->getVar('kategori_name');
                }

                $insert_data = [
                    'blog_category_id' => $id_kategori,
                    'blog_tags' => json_encode(explode(',', $this->request->getVar('tags'))),
                    'blog_content' => $this->request->getVar('konten'),
                    'blog_title' => $this->request->getVar('judul'),
                    'blog_slug' => url_title($this->request->getVar('judul'), '-', TRUE),
                    'blog_status' => $this->request->getVar('submit_type') == 'post' ? 'post' : 'draft',
                    'blog_post' => $this->request->getVar('submit_type') == 'post' ? date('Y-m-d H:i:s') : NULL
                ];

                // check image
                if($img = $this->request->getFile('gambar_utama')) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $img = $this->request->getFile('gambar_utama');
                        $img->move('./media', $img->getName());
                        $img_new = str_replace($img->getClientExtension(), '', $img->getName()) . 'webp';
                        $insert_media = [
                            'media_name' => $img_new,
                            'media_created_at' => date('Y-m-d H:i:s')
                        ];
                        $model->insertMedia($insert_media);
                        $insert_data['blog_image'] = $img_new;

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
                    }
                }

                $model->updateBlog($id,$insert_data);
                session()->setFlashdata('success', 'Data Successfully Updated');
                return redirect()->to('/admin/artikel');
            }
        }

        return view('admin/blog-edit', $data);
    }

    public function delete() {
        $db = db_connect();
        $model = new BlogModel($db);
        $model->deleteBlog($this->request->getVar('blog_id'));
        return 'true';
    }

    public function detail($id) {
        $db = db_connect();
        $model = new BlogModel($db);
        $data['blog'] = $model->getDetailBlog($id);
        return view('admin/blog-detail', $data);
    }
}