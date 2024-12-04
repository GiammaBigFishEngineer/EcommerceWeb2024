<?php
require_once(__ROOT__ . '/views/UserView.php');
require_once(__ROOT__ . '/models/UserModel.php');
require_once(__ROOT__ . '/models/OrdineModel.php');
require_once(__ROOT__ . '/models/OrdineProductModel.php');

class UserController {

    public static function login() {
        $error_message = false;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $email = $_POST["email"];
            $password = $_POST["password"];
            $user = UserModel::validateUser($email, $password);

            if (isset($user)) {
                $_SESSION['email'] = $user["email"];
                $_SESSION['nome'] = $user["nome"];
                $_SESSION['cognome'] = $user["cognome"];
                $_SESSION['venditore'] = $user["venditore"] === 1;
                $_SESSION['indirizzo'] = $user["indirizzo"];
                $_SESSION['citta'] = $user["citta"];
                session_write_close(); 
                header('Location: /');
            } else {
                $error_message = true;
            }
            
        }
        
        $view = new UserView();
        $view->renderLogin($error_message);
    }

    public static function privateArea() {
        $ordini = null;
        if (isset($_SESSION["email"])){
            $user = UserModel::get($_SESSION["email"]);
            $ordini = OrdineModel::where(array(
                "user_id" => $user->id
            ));
            foreach($ordini as $ordine) {
                $ordine->setProducts();
            }
        } else {
            header("Location: /");
        }
        
        $view = new UserView();
        $view->renderPrivatePage($ordini);
    }
}