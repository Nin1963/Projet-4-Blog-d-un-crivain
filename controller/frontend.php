<?php
namespace Alaska\Blog\Controller;

use Alaska\Blog\Model\Manager;


// Chargement des classes
require_once 'model/Manager.php';
require_once 'model/ChapterManager.php';
require_once 'model/CommentManager.php';
require_once 'model/AdminManager.php';

class Frontend extends Manager
{
    function connection($login, $password) 
    {
        $adminManager = new \Alaska\Blog\Model\AdminManager();
        $adminInfo = $adminManager->checkLogin($login, $password);
        
        if ($adminInfo) {
        
            $_SESSION['administrateur'] = true;
            $_SESSION['login'] = $adminInfo['login'];
            $this->setFlash('Vous êtes à présent connecté', 'info');
            header('Location: index.php?action=listChaptersBackend');
        } else {
            $this->setFlash('Identifiants incorrects', 'warning');
            include 'view/frontend/connexionView.php';
        }
    }

    function listChapters()
    {
        $chapterManager = new \Alaska\Blog\Model\ChapterManager();
        $chapters = $chapterManager->getChapters();
        
        include 'view/frontend/listChaptersView.php';
    }

    function chapter()
    {
        $chapterManager = new \Alaska\Blog\Model\ChapterManager();
        $commentManager = new \Alaska\Blog\Model\CommentManager();

        $chapter = $chapterManager->getChapter($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);
    
        include 'view/frontend/chapterView.php';
    }

    function comment()
    {
        $commentManager = new \Alaska\Blog\Model\CommentManager();
        $comment = $commentManager->getComment($_GET['id']);

        include 'view/frontend/commentView.php';
    }

    function addComment($chapterId, $author, $comment)
    {
        $commentManager = new \Alaska\Blog\Model\CommentManager();

        $affectedLines = $commentManager->chapterComment($chapterId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=chapter&id=' . $chapterId);
        }
    }

    function signalComment($commentId, $chapterId)
    {
        $commentManager = new \Alaska\Blog\Model\CommentManager();
        $signal = $commentManager->signalComment($commentId);
        if ($signal > 0) {
            header('Location: index.php?');
        } else {
            echo 'Ce commentaire est en attente de modération, je me dépêche ;)' ;
        }

        include 'view/frontend/commentView.php';
    }
}



