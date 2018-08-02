<?php

namespace Alaska\Blog\Model;

class Manager
{   
    protected $name;
    protected $config;
    protected $db;

    const FLASH_SUCCESS = 'success';
    const FLASH_ERROR = 'danger';
    const FLASH_WARNING = 'warning';
    const FLASH_INFO = 'info';
    
    public function __construct()
    {
        if (!$this->config) {
            $this->config = require 'config.php';
        }
        if (!$this->name) {
            $this->name = $this->config['Site']['name'];
        }
    }

    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=alaska;charset=utf8', 'root', '');
        
        return $db;
    }

    public function setFlash($message, $class = 'success')
    {
        $_SESSION['Flash'] = new \stdClass();
        $_SESSION['Flash']->class = $class;
        $_SESSION['Flash']->message = $message;
    }

    public function isAdmin()
    {
        return (new AdminManager())->isAdmin();
    }

    public function redirect($uri = '/')
    {
        header("Location: $uri");
        exit();
    }
}