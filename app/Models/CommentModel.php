<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class CommentModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function getAllComment() {
        $comment = $this->db->table('blog_comment');
        $comment->select('blog_comment.blog_comment_id, blog_comment.blog_id, blog_comment.reply_id, blog_comment.blog_comment_content, blog_comment.blog_comment_user, blog_comment.blog_comment_created, blog.blog_title');
        $comment->join('blog', 'blog.blog_id=blog_comment.blog_id');
        $comment->orderBy('blog_comment.blog_comment_id', 'DESC');
        return $comment->get()->getResult();
    }
    
    public function replyComment($data) {
        $comment = $this->db->table('blog_comment');
        $comment->insert($data);
        return true;
    }

    public function deleteComment($id) {
        $comment = $this->db->table('blog_comment');
        $comment->where('blog_comment_id', $id);
        $comment->delete();
        return true;
    }
}