<?php

if (session_status() == PHP_SESSION_NONE) :
    session_start();
endif;

require 'controller/frontend.php';
require 'controller/backend.php';

$frontend = new Alaska\Blog\Controller\Frontend();
$backend = new Alaska\Blog\Controller\Backend();

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'connexion') {
            include 'view/frontend/connexionView.php';
        } elseif ($_GET['action'] === 'login') {
            if (!empty($_POST['login']) AND !empty($_POST['password'])) {
                    $frontend->connection($_POST['login'], ($_POST['password']));
            } else {
                throw new Exception('Le login et/ou le mot de passe sont incorrects');
            }
        } elseif ($_GET['action'] === 'chapter') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $frontend->chapter($_GET['id']);
            } else {
                    throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        } elseif ($_GET['action'] =='comment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontend->comment($_GET['id']);
            } else {
                throw new Exception('Tous les champs ne sont pas requis!');
            }
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $frontend->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé'); 
            } 
        } elseif ($_GET['action'] == 'signalComment') {
            if (!empty($_GET['id']) && $_GET['id'] > 0) {
                $frontend->signalComment($_GET['id'], $_GET['chapterId']);
            } else {
                throw new Exception('Votre requête n\'a pu aboutir :(');
            }
        } elseif ($_GET['action'] == 'listChaptersBackend') {
            $backend->listChaptersBackend();
        } elseif ($_GET['action'] == 'chapterBackend') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $backend->chapterBackend();
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        } elseif ($_GET['action'] == 'addChapter') {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                $backend->addChapter($_POST['title'], $_POST['content']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        } elseif ($_GET['action'] == 'modifyChapter') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    $backend->modifyChapter($_GET['id'], $_POST['title'], $_POST['content']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé'); 
            }
        } elseif ($_GET['action'] == 'deleteChapter') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $backend->deleteChapter($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé'); 
            }
        } elseif ($_GET['action'] == 'commentSignal') {
            $backend->signalCommentBackend();
        } elseif ($_GET['action'] == 'deleteComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $backend->deleteComment($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé'); 
            }
        } elseif ($_GET['action'] == 'approveComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $backend->approveComment($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé'); 
            }
        } elseif ($_GET['action'] == 'deconnexion') {
            $backend->logOut();
        } 
    } else {
        $frontend->listChapters();
    } 
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}