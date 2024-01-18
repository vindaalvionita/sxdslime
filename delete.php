<?php
session_start();
$product_id=$_GET["id"];
unset($_SESSION["shoppingcart"][$product_id]);

echo "<script>alert('Product selected has been successfully removed from Shopping Cart');</script>";
echo "<script>location='shoppingcart.php';</script>";
?>