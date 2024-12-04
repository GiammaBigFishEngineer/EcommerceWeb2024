<?php

define('__ROOT__', dirname(__FILE__));

require_once (__ROOT__ . '/controller/ProductCustomerController.php');
require_once (__ROOT__ . '/controller/UserController.php');
require_once (__ROOT__ . '/views/ThankyouView.php');
require_once (__ROOT__ . '/utils/CookieUtils.php');


session_start();
class Dispatcher
{
    private $method;
    private $path;

    public function __construct()
    {
        $this->method = $_SERVER["REQUEST_METHOD"];
        $this->path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    }

    public function dispatch()
    {
        switch ($this->path) {
            
            case "/":
                ProductCustomerController::allProducts();
                break;

            case "/prodotto":
                ProductCustomerController::showProduct($_GET["id"]);
                break;

            case "/checkout":
                ProductCustomerController::checkout();
                break;

            case "/thankyou_page":
                $view = new ThankyouView();
                $view->show();
                break;

            case "/login":
                UserController::login();
                break;
            
            case "/signup":

                break;

            case "/area_privata":
                UserController::privateArea();
                break;
            
            case "/logout":
                session_destroy();
                clearCartCookie();
                header('Location: /');
                break;
            
            default:
                echo "404 HTML<br>";
                echo $this->path;
                break;
        }
    }
}

$dispatcher = new Dispatcher();
$dispatcher->dispatch();
