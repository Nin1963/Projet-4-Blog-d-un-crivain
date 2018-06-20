<?php
require_once 'model/ChapterManager.php';
require_once 'model/CommentManager.php';
require_once 'model/AdminManager.php';

function listChapters()
{
    $chapterManager = new \Alaska\Blog\Model\ChapterManager();
    $chapters = $chapterManager->getChapters();

    include 'view/backend/listChaptersView.php';
}

function chapter()
{
    $chapterManager = new \Alaska\Blog\Model\ChapterManager();
    $commentManager = new \Alaska\Blog\Model\CommentManager();

    $chapter = $chapterManager->getChapter($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    include 'view/backend/chapterView.php';
}

function addChapter($title, $content)
{
    $chapterManager = new \Alaska\Blog\Model\ChapterManager();

    $affectedLines = $chapterManager->ajoutChapter($title, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le chapitre !');
    } else {
        header('Location: adminIndex.php?action=listChapters');
    }
}

function modifyChapter($id, $title, $content)
{    
    $chapterManager = new \Alaska\Blog\Model\ChapterManager();
    
    $affectedLines = $chapterManager->updateChapter($id, $title, $content);
    
    if($affectedLines === false) {
        throw new Exception('Impossible de modifier ce chapitre !');
    } else {
        header('Location: adminIndex.php?action=chapter&id=' .$id);
    }
}

function deleteChapter($id)
{
    $chapterManager = new \Alaska\Blog\Model\ChapterManager();
    
    $supprimChapter = $chapterManager->deleteChapter($id);

    if ($supprimChapter > 0) {
        header('Location: adminIndex.php');
    } else {
        throw new Exception('Impossible de supprimer ce chapitre !');
    }

}

function comment()
{
    $commentManager = new \Alaska\Blog\Model\CommentManager();
    $comment = $commentManager->getComment($_GET['id']);

    include 'view/frontend/commentView.php';
}


