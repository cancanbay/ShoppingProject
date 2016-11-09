<?
require_once __DIR__ . "/../includes/common.php";
require_once __DIR__ . "/../models/customer.php";

$customers = Customer::listAll();

include __DIR__ . "/../views/list-customers.phtml";
?>