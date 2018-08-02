<?php
namespace Alaska\Blog\Controller;

use \Alaska\Blog\Model\Manager;
// Chargement des classes
require_once 'model/ChapterManager.php';
require_once 'model/CommentManager.php';
require_once 'model/AdminManager.php';
require_once 'model/Manager.php';

class Backend extends Manager
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->isAdmin()) {
            $this->setFlash('Vous n\'êtes pas autorisé à accéder à cette page', $this::FLASH_ERROR);
           
        }
    }

    function listChaptersBackend()
    {
        $chapterManager = new \Alaska\Blog\Model\ChapterManager();
        $chapters = $chapterManager->getChapters();

        include 'view/backend/listChaptersViewBackend.php';
    }

    function chapterBackend()
    {
        $chapterManager = new \Alaska\Blog\Model\ChapterManager();
        $commentManager = new \Alaska\Blog\Model\CommentManager();
        $chapter = $chapterManager->getChapter($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        include 'view/backend/chapterViewBackend.php';
    }

    function addChapter($title, $content)
    {
        $chapterManager = new \Alaska\Blog\Model\ChapterManager();
        $affectedLines = $chapterManager->ajoutChapter($title, $content);
    
        if ($affectedLines === true) {
            header('Location: index.php?action=listChaptersBackend');
            
        } else {
            throw new Exception('Impossible d\'ajouter le chapitre !');
        }
    }

    function modifyChapter($id, $title, $content)
    {    
        $chapterManager = new \Alaska\Blog\Model\ChapterManager();
        $affectedLines = $chapterManager->updateChapter($id, $title, $content);
        
        if ($affectedLines === false) {
            throw new Exception('Impossible de modifier ce chapitre !');
        } else {
            header('Location: index.php?action=listChaptersBackend');
        }
    }

    function deleteChapter($id)
    {
        $chapterManager = new \Alaska\Blog\Model\ChapterManager();
        $supprimChapter = $chapterManager->deleteChapter($id);
        
        if ($supprimChapter > 0) {
            header('Location: index.php?action=listChaptersBackend');
        } else {
            throw new Exception('Impossible de supprimer ce chapitre !');
        }

    }

    function commentBackend($id)
    {
        $commentManager = new \Alaska\Blog\Model\CommentManager();
        $comment = $commentManager->getComment($_GET['id']);

        include 'view/frontend/commentView.php';
    }

    function signalCommentBackend() 
    {
        $commentManager = new \Alaska\Blog\Model\CommentManager();
        $comments = $commentManager->getSignalComments();
        
        include 'view/backend/signalCommentView.php';
    }

    function deleteComment($id)
    {
        $commentManager = new \Alaska\Blog\Model\CommentManager();
        $supprimComment = $commentManager->deleteComment($id);

        if ($supprimComment > 0) {
            header('Location: index.php?action=commentSignal');
        } else {
            throw new Exception('Impossible de supprimer ce commentaire !');
        }
    }

    function approveComment($id)
    {
        $commentManager = new \Alaska\Blog\Model\CommentManager();
        $commentApprove = $commentManager->approveComment($id);

        if ($commentApprove > 0) {
            header('Location: index.php?action=commentSignal');
        } else {
            throw new Exception('Impossible d\'approuver ce commentaire !');
        }
    }

    function logOut()
    {
        session_destroy();
        session_start();
        $this->setFlash('Vous êtes à présent déconnecté', 'info');
        header('Location:index.php');
    }
}

