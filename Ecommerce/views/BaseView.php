<?php

require_once(__ROOT__ . '/vendor/autoload.php');

class BaseView
{
    public $twig;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('templates');
        $this->twig = new \Twig\Environment($loader);

        if (isset($_SESSION)) $this->twig->addGlobal('session', $_SESSION);
        $this->twig->addGlobal('get', $_GET);
        $this->twig->addGlobal('post', $_POST);

        // Registra la funzione "asset"
        $this->twig->addFunction(new \Twig\TwigFunction('asset', function ($path) {
            return '/templates/public/' . ltrim($path, '/');
        }));
    }

    public function __destruct()
    {
        // clear the consumed sessions
        if (session_status() === PHP_SESSION_ACTIVE)
            $_SESSION = array();
    }
}
