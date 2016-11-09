<?
require_once "../models/cart.php";
require_once "../../admin/models/product.php";
require_once "../../admin/models/customer.php";



session_start();
if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = new Cart();
}

$cart = $_SESSION['cart'];
$array =[];
foreach($cart->items as $item) {
    $product = Product::get($item->product);
    $array[] = $product;
   // var_dump($product);
}

include "../views/shopping-cart.phtml";
?>

