<?php
require_once(__ROOT__ . '/models/ProductModel.php');
require_once(__ROOT__ . '/views/ProductView.php');
require_once(__ROOT__ . '/models/UserModel.php');

class ProductVendorController
{
    // Mostra i prodotti del venditore
    public static function listProducts()
    {
        $products = ProductModel::where(['vendor_id' => UserModel::get($_SESSION['email'])->id]);
        $view = new ProductView();
        $view->renderVendorProducts($products);
    }

    // Crea un nuovo prodotto
    public static function createProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productData = array_merge($_POST, ['vendor_id' => UserModel::get($SESSION['email'])->id]);
            $product = new ProductModel($productData);
            try {
                $product->save();
                header('Location: /vendor/products');
            } catch (Exception $err) {
                echo $err;
            }
        }
        $products = ProductModel::where(['vendor_id' => UserModel::get($_SESSION['email'])->id]);
        $view = new ProductView();
        $view->renderVendorForm($products);

    }

    // Modifica un prodotto esistente
    public static function editProduct($productId)
{
    print_r($_POST); // Debug input POST
    exit;

    if (empty($productId) || !is_numeric($productId)) {
        echo "Errore: ID Prodotto non valido!";
        exit;
    }

    $product = ProductModel::get((int)$productId);

    if (!$product) {
        echo "Errore: Prodotto non trovato!";
        exit;
    }

    if ( isset($_SESSION['email']) && $product->vendor_id !== UserModel::get($_SESSION['email'])->id) {
        header('Location: /vendor/products');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        foreach ($_POST as $key => $value) {
            $product->$key = $value;
        }
        try {
            $product->save();
            header('Location: /vendor/products');
        } catch (Exception $err) {
            echo $err;
        }
    }

    $view = new ProductView();
    $view->renderVendorForm($product);
}


    // Elimina un prodotto
    public static function deleteProduct($productId)
{
    $product = ProductModel::get($productId);
    if ( isset($_SESSION['email']) && $product->vendor_id !== UserModel::get($_SESSION['email'])->id) {
        header('Location: /vendor/products');
        exit;
    }

    try {
        ProductModel::delete($productId);
        header('Location: /vendor/products');
    } catch (Exception $err) {
        echo $err;
    }
}

}
