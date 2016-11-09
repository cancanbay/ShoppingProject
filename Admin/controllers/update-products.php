<?
require_once __DIR__ . "/../includes/common.php";
require_once __DIR__ . "/../models/product.php";

$id=$_GET['id'];
$product = Product::get($id);
if($_POST) {
    $id = $_POST['id'];
    $name = $_POST['txtName'];
    $size = $_POST['beden'];
    $quantity = $_POST['txtQuantity'];
    $color = $_POST['renk'];
    $imageurl = $_POST['imgUrl'];
    $price = $_POST['price'];
    $category = $_POST['kategori'];
    $gender = $_POST['cinsiyet'];
    $products = Product::updateProduct($id,$name, $size, $quantity, $color, $imageurl, $price,$category,$gender);
    echo $id;
    header("Location: list-products");
}
include __DIR__ . "/../views/update-products.phtml";
?>