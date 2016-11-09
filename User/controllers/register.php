<?
require_once "../../Admin/models/customer.php";



if($_POST) {
    Customer::insert($_POST['name'],$_POST['lastname'],$_POST['email'],$_POST['password']);
    include "../views/index.phtml";
}
else
    require_once "../views/register.phtml";

?>