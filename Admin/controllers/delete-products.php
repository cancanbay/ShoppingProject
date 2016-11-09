<?
require_once __DIR__ . "/../includes/common.php";
require_once __DIR__ . "/../models/product.php";


$id = $_GET['id'];
$product = Product::deleteProduct($id);
include __DIR__ . "/../views/delete-products.phtml";




?>
