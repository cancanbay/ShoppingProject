<?
require_once "../views/add-to-cart.phtml";
require_once "../../Admin/models/product.php";
require_once "../models/cart.php";
require_once "../../admin/models/customer.php";



session_start();

if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = new Cart();
}

$cart = $_SESSION['cart'];
$cart->add($_POST['product'], $_POST['beden'], $_POST['txtQuantity'], $_POST['renk']);

?>