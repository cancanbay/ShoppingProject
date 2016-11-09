<?
require_once "../../Admin/models/product.php";
require_once "../../admin/models/customer.php";

session_start();
$product = Product::listbyGender($_GET['category']);

include "../views/list-products.phtml";
?>