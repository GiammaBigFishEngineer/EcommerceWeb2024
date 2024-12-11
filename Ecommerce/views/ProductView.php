<?php

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
    // Render per la lista dei prodotti per i venditori
    public function renderVendorProducts($products)
    {
        echo $this->twig->render('vendor/products_vendor.html.twig', [
            'products' => $products,
        ]);
    }

    // Render del form per la creazione/modifica di un prodotto per i venditori
    public function renderVendorForm($products = null)
    {
        echo $this->twig->render('vendor/product_form.html.twig', [
            'products' => $products,
        ]);
    }


}
