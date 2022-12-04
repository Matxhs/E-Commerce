<?php  
session_start();


include 'koneksi.php';

if(empty($_SESSION["menu"]) OR !isset($_SESSION["menu"]))
{
	echo "<script>alert('keranjang kosong, silahkan berbelanja dahulu');</script>";
	echo "<script>location='index.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Keranjang Belanja</title>
	<style type="text/css">
		
	</style>
</head>
<body>

<!-- navbar -->
<?php include 'navbar.php'; ?>

<section class="konten mt-5">
	<div class="container">
		<h1>Keranjang Belanja</h1>
		<hr>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>SubTotal</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php foreach ($_SESSION["menu"] as $id_menu => $jumlah): ?>
				<!-- menampilkan produk tg sedang diperulangkan berdasarkan id_produk -->
				<?php  
				$ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu = '$id_menu'");
				$pecah = $ambil->fetch_assoc();
				$subharga = $pecah["harga"] * $jumlah;

				// echo "<pre>";
				// print_r($pecah);
				// echo "</pre>";
				?>

				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["nama"]; ?></td>
					<td><?php echo 'Rp. '. number_format($pecah["harga"],0,',','.').',-'; ?></td>
					<td><?php echo $jumlah ?></td>
					<td><?php echo 'Rp. '.number_format("$subharga",0,',', '.'). ',-'; ?></td>
					<td>
						<a href="hapuskeranjang.php?id=<?php echo $id_menu ?>" class="btn btn-danger btn-xs">Hapus</a>
					</td>
				</tr>
				<?php $nomor++; ?>
				<?php endforeach ?>
			</tbody>
		</table>
		<a href="menu.php" class="btn btn-default">Lanjutkan Belanja</a>
		<a href="checkout.php" class="btn btn-primary">Checkout</a>
	</div>
</section>
	
</body>
</html>