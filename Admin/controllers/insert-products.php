<?
require_once __DIR__ . "/../includes/common.php";
require_once __DIR__ . "/../models/product.php";

if($_POST) {
    $name = $_POST['txtName'];
    $size = $_POST['beden'];
    $quantity = $_POST['txtQuantity'];
    $color = $_POST['renk'];
    $imageurl = $_POST['imgUrl'];
    $price = $_POST['price'];
    $category = $_POST['kategori'];
    $gender=$_POST['cinsiyet'];
    $products = Product::addProduct($name, $size, $quantity, $color, $imageurl, $price,$category,$gender);
    header("Location: list-products");
}

include __DIR__ . "/../views/insert-products.phtml";
?>