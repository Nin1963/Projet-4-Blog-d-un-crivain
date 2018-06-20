<?php

session_start();

require'controller/frontend.php';


try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'chapter') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                chapter();
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        } elseif ($_GET['action'] == 'admin') {
            if (isset($_POST['login']) AND isset($_POST['password'])) {
                if (!empty($_POST['login']) AND !empty($_POST['password'])) {
                    admin();
                } else {
                    if (!$resultat OR !passwordword_verify($_POST['password'], $resultat['password'])) {
                        throw new Exception('Identifiant ou Mot de passe incorrect.<br/>');
                    } else {
                        throw new Exception('Vous êtes connecté ! :)<br/>');
                    }
                }
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
        } elseif ($_GET['action'] =='comment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                comment();
            } else {
                throw new Exception('Tous les champs ne sont pas requis!');
            }
        } elseif ($_GET['action'] == 'signalComment') {

        }
    } else {
        listChapters();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}