<?php

namespace Alaska\Blog\Model;

require_once("model/Manager.php");

class AdminManager extends Manager
{
	public function getLogin()
	{
		$db = $this->dbConnect();
		$login = $_POST['login'];
        $req = $db->prepare('SELECT id, password FROM login WHERE login = :login');
        $req-> execute(array(
        'login' => $login));
 
        $resultat = $req->fetch();
	}
	
	public function getPassword()
	{
		$db = $this->dbConnect();
		$login = $_POST['password'];
        $req = $db->prepare('SELECT id, password FROM login WHERE password = :password');
        $req-> execute(array(
        'password' => $password));
 
        $resultat = $req->fetch();
	}
}