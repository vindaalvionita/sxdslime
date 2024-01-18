<?php
session_start();
// mendapatkan product_id dari url
$product_id = $_GET['id'];
//jika sudah ada produk itu di keranjang, maka produk itu jumlahnya di +1
if (isset($_SESSION ['shoppingcart'][$product_id]))
{
	$_SESSION ['shoppingcart'][$product_id]+=1;
}
// selain itu (belum ada di shopping cart), maka produk itu dianggap dibeli 1
else
{
	$_SESSION ['shoppingcart'][$product_id]= 1;
}
//echo "<pre>";
//print_r($_SESSION);
//echo "<pre>";
// larikan ke halaman keranjang
echo "<script>alert('Product has been successfully entered Shopping Cart.');</script>";
echo "<script>location='shoppingcart.php';</script>";
?>