<?
require_once "../../Admin/models/order.php";
require_once "../models/cart.php";
require_once "../../admin/models/customer.php";

session_start();
/**
 * @var Cart $cart
 */

$cart = $_SESSION['cart'];
$id = Order::insert(1, $_POST['address'], $cart->getTotal());
foreach ($cart->items as $item) {
    $product = Product::get($item->product);
    Order::addOrderItems($id,$item->quantity,$item->product,$product->price * $item->quantity, $item->size, $item->color);

}
require_once "../views/create-order.phtml";
?>