<?php 

$ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotomenu = $pecah['foto_menu'];
if(file_exists("../foto_produk/$fotoproduk"))
{
	unlink("../foto_produk/$fotoproduk");
}

$koneksi->query("DELETE FROM menu WHERE id_menu='$_GET[id]'");
echo "<script>alert('produk terhapus');</script>";
echo "<script>location='index.php?halaman=produk';</script>";
 ?>
