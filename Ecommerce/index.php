<?php

define('__ROOT__', dirname(__FILE__));

require_once (__ROOT__ . '/controller/ProductCustomerController.php');
require_once (__ROOT__ . '/controller/UserController.php');
require_once (__ROOT__ . '/views/ThankyouView.php');
require_once (__ROOT__ . '/utils/CookieUtils.php');
require_once (__ROOT__ . '/controller/OrderVendorController.php');
require_once (__ROOT__ . '/controller/ProductVendorController.php');


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
                UserController::renderNotifiche();
                ProductCustomerController::allProducts();
                break;

            case "/prodotto":
                UserController::renderNotifiche();
                ProductCustomerController::showProduct($_GET["id"]);
                break;

            case "/checkout":
                UserController::renderNotifiche();
                ProductCustomerController::checkout();
                break;

            case "/thankyou_page":
                UserController::renderNotifiche();
                $view = new ThankyouView();
                $view->show();
                break;

            case "/login":
                UserController::login();
                break;
            
            case "/signup":
                UserController::signup();
                break;

            case "/area_privata":
                UserController::renderNotifiche();
                UserController::privateArea();
                break;
            
            case "/logout":
                session_destroy();
                clearCartCookie();
                header('Location: /');
                break;
            
            case "/vendorOrdini":
                UserController::renderNotifiche();
                OrderVendorController::listOrders();
                break;
            

            case "/vendorProducts":
                UserController::renderNotifiche();
                ProductVendorController::listProducts();
                break;

            case "/productForm":
                UserController::renderNotifiche();
                ProductVendorController::createProduct();
                //ProductVendorController::editProduct($_GET["id"]);
                //ProductVendorController::deleteProduct($_GET["id"]);
                break;

            case "/ListinoProdotti":
                UserController::renderNotifiche();
                ProductVendorController::listProducts();

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

