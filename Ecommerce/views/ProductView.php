<?php

require_once(__ROOT__ . '/vendor/autoload.php');

require_once('BaseView.php');

class ProductView extends BaseView
{

    public function render($not_found_message, $list)
    {
        echo $this->twig->render('customers/products_customer.html.twig', [
            'products' => $list,
            'not_found_message' => $not_found_message
        ]);
    }

    public function show($product)
    {
        echo $this->twig->render('customers/product_customer.html.twig', [
            'product' => $product,
        ]);
    }

}
