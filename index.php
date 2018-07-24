<?php

session_start();

require 'controller/frontend.php';
require 'controller/backend.php';

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'connexion') {
            include 'view/frontend/connexionView.php';
        } elseif ($_GET['action'] === 'login') {
            if (!empty($_POST['login']) AND !empty($_POST['password'])) {
                    checkLogin($_POST['login'], sha1($_POST['password'])); 
            } else {
                throw new Exception('Le login et/ou le mot de passe sont incorrects');
            }
        } elseif ($_GET['action'] === 'chapter') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                    chapter();
            } else {
                    throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        } elseif ($_GET['action'] =='comment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                comment();
            } else {
                throw new Exception('Tous les champs ne sont pas requis!');
            }
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                        addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé'); 
            } 
        } elseif ($_GET['action'] == 'signalComment') {
            if (!empty($_GET['id']) && $_GET['id'] > 0) {
                signalComment($_GET['id'], $_GET['chapterId']);
            } else {
                throw new Exception('Votre requête n\'a pu aboutir :(');
            }
        } elseif ($_GET['action'] == 'listChaptersBackend') {
            listChaptersBackend();
        } elseif ($_GET['action'] == 'chapterBackend') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                chapterBackend();
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        } elseif ($_GET['action'] == 'addChapter') {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                addChapter($_POST['title'], $_POST['content']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        } elseif ($_GET['action'] == 'modifyChapter') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    modifyChapter($_GET['id'], $_POST['title'], $_POST['content']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé'); 
            }
        } elseif ($_GET['action'] == 'deleteChapter') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteChapter($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé'); 
            }
        } elseif ($_GET['action'] == 'commentSignal') {
            signalCommentBackend();
        } elseif ($_GET['action'] == 'deleteComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteComment($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé'); 
            }
        } elseif ($_GET['action'] == 'approveComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                approveComment($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé'); 
            }
        } elseif ($_GET['action'] == 'deconnexion') {
            logOut();
        } 
    } else {
        listChapters();
    } 
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}