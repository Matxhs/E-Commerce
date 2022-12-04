<?php 
session_start();
$id_menu=$_GET["id"];
unset($_SESSION['menu'][$id_menu]);

echo "<script>alert('produk dihapus dari keranjang');</script>";
echo "<script>location='keranjang.php';</script>";

?>