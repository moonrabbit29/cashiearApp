<?php 
require_once '../init.php';
require_once '../models/product_model.php';
$obj = new Product_model();
$q = $_REQUEST["q"];
$result = $obj-> getProductByName($q,"cashier");
echo $result['P_sell'];

