<?php session_start(); ?>
<?php  include 'koneksi.php'; ?>
<?php 
//mendapatkan id produk dari url
$id_menu = $_GET["id"];

//query ambil data

$ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu='$id_menu'");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Detail Produk</title>
</head>
<body>
	
<?php include 'navbar.php'; ?>

<section class="konten mt-4">
	<div class="container">
		<div class="col-md-6">
			<img src="foto_produk/<?php echo $detail["foto_menu"]; ?>" style="width: 300px;" alt="" class="img-responsive">
		</div>
		<div class="col-md-6">
			<h2><?php echo $detail["nama"]; ?></h2>
			<h4>Rp. <?php echo number_format($detail["harga"]); ?></h4>

			
			<h5>Stok: <?php echo 
			$detail['stok'] ?></h5>



			<form method="POST">
				<div class="form-group">
					<div class="input-group">
						<input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail['stok'] ?>">
					<div class="input-group-btn">
						<button class="btn btn-primary" name="beli">Beli</button>
					</div>
					</div>
				</div>	
			</form>
			<?php 
			if (isset($_POST["beli"])) {
				//mendapatkan jumlah yg diinputkan
				$jumlah = $_POST["jumlah"];

				//masukkan di keranjang belanja
				$_SESSION["menu"][$id_menu] = $jumlah;

				echo "<script>alert('produk telah masuk ke keranjang');</script>";
				echo "<script>location='keranjang.php';</script>";
			}
			?>
			<p><?php echo $detail["deskripsi"]; ?></p>
			<a href="index.php" class="btn btn-warning">Kembali</a>

		</div>
	</div>
</section>

</body>
</html>