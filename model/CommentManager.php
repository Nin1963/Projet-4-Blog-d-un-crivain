<?php

namespace Alaska\Blog\Model;

require_once "model/Manager.php";

class CommentManager extends Manager
{
    public function getComments($chapterId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE chapter_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($chapterId));

        return $comments;
    }
    public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        $comment = $req->fetch();

        return $comment;
    }

    public function chapterComment($chapterId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(chapter_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($chapterId, $author, $comment));

        return $affectedLines;
    }

    public function signalComment($commentId)
    {
        $db = $this-> dbConnect();
        $req = $db->prepare('UPDATE comments SET signal_comment = 1 WHERE id = ?');
        $req->execute(array($commentId));
        $signal = $req->rowCount(); 
       
        return $signal;         
    }

    public function getSignalComments()
    {
        $db = $this->dbConnect();
        $comments = $db->query('SELECT comments.id, chapters.title, comments.chapter_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y \') AS comment_date_fr FROM comments INNER JOIN chapters ON chapters.id = comments.chapter_id WHERE signal_comment =1 ORDER BY comment_date DESC');
        
        return $comments;
      
    }

    public function deleteComment($id) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($id));
        $delete = $req->rowCount();
        
        return $delete;
    }

    public function approveComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET signal_comment = 0 WHERE id = ?');
        $req->execute(array($id));
        $signal = $req->rowCount(); 
       
        return $signal;     
    }
}