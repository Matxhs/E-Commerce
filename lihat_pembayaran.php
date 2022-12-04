<?php  
session_start();
include 'koneksi.php';
$id_pembelian = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran 
	LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian 
	WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detbay);
// echo "</pre>";


//Validasi jika belum ada data pembayaran
if(empty($detbay))
{
	echo "<script>alert('Belum Ada Data Pembayaran')</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}

//Validasi jika data user yg bayar tidak sesuai dengan yg login
if($_SESSION["user"]["id_user"]!==$detbay["id_user"])
{
	echo "<script>alert('Anda Tidak berhak melihat Riwayat Orang Lain')</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lihat Pembayaran</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
	<link rel="icon" href="admin/logo/icon_web_16.png" type="image/png">
</head>
<body>
	
	<?php include 'navbar.php'; ?>

	<div class="container">
		<h2>Lihat Pembayaran</h2>
		<div class="row">
			<div class="col-md-6">
				<table class="table">
					<tr>
						<th>Nama</th>
						<th><?php echo $detbay["nama"] ?></th>
					</tr>
					<tr>
						<th>Bank</th>
						<th><?php echo $detbay["bank"] ?></th>
					</tr>
					<tr>
						<th>Tanggal</th>
						<th><?php echo $detbay["tanggal"] ?></th>
					</tr>
					<tr>
						<th>Jumlah</th>
						<th>Rp. <?php echo number_format($detbay["jumlah"],0,',','.').',-' ?></th>
					</tr>
				</table>
			</div>
			<div class="col-md-6">
				<h2>Bukti Pembayaran</h2>
				<img src="bukti_pembayaran/<?php echo $detbay["bukti"] ?>" alt="" class="img-responsive">
			</div>
		</div>

	</div>

</body>
</html>