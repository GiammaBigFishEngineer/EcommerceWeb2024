<?php
require_once(__ROOT__ . '/models/ProductModel.php');
require_once(__ROOT__ . '/views/ProductView.php');
require_once(__ROOT__ . '/models/OrdineModel.php');
require_once(__ROOT__ . '/models/OrdineProductModel.php');
require_once(__ROOT__ . '/views/CheckoutView.php');

class ProductCustomerController {

    public static function allProducts() {
        $not_found_message = FALSE;
        if (!isset($_GET['search'])){
            $list = ProductModel::all();
        } else {
            $list = ProductModel::where(array('name' => $_GET['search']));
            if (count($list) === 0) {
                $not_found_message = TRUE;
            }
        }

        $view = new ProductView();
        $view->render($not_found_message, $list);
    }

    public static function showProduct($id) {
        $product = ProductModel::get($id);

        $view = new ProductView();
        $view->show($product);
    }

    public static function checkout() {
        
        $view = new CheckoutView();
        $view->render();
    }
}