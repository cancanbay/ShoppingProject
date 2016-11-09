<?
require_once __DIR__ . "/../includes/common.php";
require_once __DIR__ . "/../models/order.php";

if (!empty($_GET["customer"])) {
    $orders = Order::findByCustomer($_GET['customer']);
} else {
    $orders = Order::listbyState();
}

include __DIR__ . "/../views/list-new-orders.phtml";
?>