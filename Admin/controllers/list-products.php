<?
require_once __DIR__ . "/../includes/common.php";
require_once __DIR__ . "/../models/product.php";

$products = Product::listAll();

include __DIR__ . "/../views/list-products.phtml";
?>