<?php namespace App\Controllers;

use App\Models\CommentModel;

class CommentController extends BaseController {
    public function index() {
        $db = db_connect();
        $model = new CommentModel($db);
        helper('form');
        if($this->request->getMethod() == 'post') {
            $rules = [
                'reply' => 'required'
            ];
            if(!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $data_input = [
                    'blog_id' => $this->request->getVar('blog_id'),
                    'reply_id' => $this->request->getVar('reply_id') ? $this->request->getVar('reply_id') : $this->request->getVar('comment_id'),
                    'blog_comment_content' => $this->request->getVar('reply'),
                    'blog_comment_user' => session('lastname') ? session('firstname') . ' ' . session('lastname') : session('firstname'),
                    'blog_comment_created' => date('Y-m-d H:i:s')
                ];
                
                $model->replyComment($data_input);
                session()->setFlashdata('success', 'Comment Successfully Replied');
                return redirect()->to('/admin/komentar');
            }

        }

        $data['comments'] = $model->getAllComment();
        return view('admin/comment', $data);
    }

    public function delete() {
        $comment_id = $this->request->getVar('comment_id');
        $db = db_connect();
        $model = new CommentModel($db);
        $model->deleteComment($comment_id);
        return 'true';  
    }
}