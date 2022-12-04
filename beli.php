<?php 
session_start();

//mendapatkan id_produk dari url
$id_menu = $_GET['id'];


if(isset($_SESSION['menu'][$id_menu]))
{
	$_SESSION['menu'][$id_menu] += 1;
}
else
{
	$_SESSION['menu'][$id_menu] = 1;
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// larikan ke halaman kerajang
echo "<script>alert('produk telah masuk ke keranjang');</script>";
echo "<script>location='keranjang.php';</script>";

?>