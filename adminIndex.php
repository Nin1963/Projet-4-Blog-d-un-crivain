<?php
session_start();

require'controller/backend.php';

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listChapters') {
            listChapters();
        } elseif ($_GET['action'] == 'chapter') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                chapter();
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
        }
    } else {
        listChapters();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}