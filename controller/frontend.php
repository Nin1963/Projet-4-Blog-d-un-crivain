<?php

// Chargement des classes
require_once 'model/ChapterManager.php';
require_once 'model/CommentManager.php';
require_once 'model/AdminManager.php';

function admin()
{
    $adminManager = new \Alaska\Blog\Model\AdminManager();
    $login = $adminManager->getLogin();
    $password = $adminManager->getPassword();

    include 'view/backend/listChaptersView.php';
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

function comment()
{
    $commentManager = new \Alaska\Blog\Model\CommentManager();
    $comment = $commentManager->getComment($_GET['id']);

    include 'view/frontend/commentView.php';
}

function signalComment()
{
    $commentManager = new \Alaska\Blog\Model\CommentManager();
    $signal = $commentManager->signalComment();
}
