<?
require_once __DIR__ . "/../includes/common.php";
require_once __DIR__ . "/../models/order.php";
require_once __DIR__ . "/../models/product.php";
require_once __DIR__ . "/../models/customer.php";

if(!isset($_GET["order"])) {
    // send 404
}

$order = Order::get($_GET["order"]);
if(empty($order)) {
    // send 404
}

$items = $order->getItems();
$customers = Customer::getCustomerByid($order->customer);

include __DIR__ . "/../views/order-details.phtml";
?>

