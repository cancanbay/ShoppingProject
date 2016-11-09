<?
require_once __DIR__ . "/../../admin/models/product.php";

$products = Product::get($_GET['id']);

include "../views/show-product.phtml";
?>