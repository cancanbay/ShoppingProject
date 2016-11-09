<?
require_once __DIR__ . "/../includes/common.php";
require_once __DIR__ . "/../models/order.php";
$order = Order::ship($_GET['id']);
include __DIR__ . "/../views/order-ship.phtml";
?>