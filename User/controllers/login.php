<?
require_once "../../Admin/models/customer.php";


session_start();
if($_POST) {
    $customer = Customer::getCustomerbyInfo($_POST['email'],$_POST['password']);
    $_SESSION['customer'] = $customer;
}

if(!isset($_SESSION['customer'])){

}



require_once "../views/login.phtml";
?>