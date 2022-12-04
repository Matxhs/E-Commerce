<?php 
session_start();

include 'koneksi.php';

//jika tidak ada session pelanggan (blm login)

if(!isset($_SESSION["user"]) OR empty($_SESSION["user"]))
{
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login_user.php'</script>";
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Riwayat Belanja</title>
	<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

	<!---css--->
	<link href="assets_user/css/style.css" rel="stylesheet" type="text/css"/>

	<!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

	<!-- Libraries Stylesheet -->
    <link href="assets_user/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets_user/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
</head>
<body>

<?php include 'navbar.php'; ?>


<section class="riwayat">
	<div class="container mt-5">
		<h3>Riwayat Belanja <?php echo $_SESSION["user"]["nama"] ?></h3>
	
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Total</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$nomor=1;
				//mendapatkan id_pelanggan yang login dari session
				$id_pelanggan = $_SESSION["user"]['id_user'];

				$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_user='$id_pelanggan'");
				while($pecah = $ambil->fetch_assoc()){
				?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["tanggal_pembelian"] ?></td>
					<td>
						<?php echo $pecah["status_pembelian"] ?>
						<br>
						<?php if (!empty($pecah['resi_pengiriman'])): ?>
						<?php echo 'Resi : '.$pecah['resi_pengiriman'];  ?>
						<?php endif ?>
						</td>
					<td><?php echo 'Rp. '.number_format($pecah["total_pembelian"],0,',', '.'). ',-'; ?></td>
					<td>
						<a href="nota.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-info">Nota</a>

						<?php if ($pecah['status_pembelian']=="pending"): ?>
							<a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-success">Input Pembayaran</a>
						<?php else: ?>
							<a href="lihat_pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-warning">Lihat Pembayaran</a>
						<?php endif ?>
						
					</td>
				</tr>
				<?php $nomor++; ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</section>
</body>
</html>