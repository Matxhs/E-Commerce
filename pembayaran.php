<?php 
session_start();

include 'koneksi.php';

//jika tidak ada session pelanggan (blm login)

if(!isset($_SESSION["user"]) OR empty($_SESSION["user"]))
{
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login_pelanggan.php'</script>";
	exit();
}


	//mendapatkan id_pembayaran dari url

	$idpem = $_GET["id"];
	$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
	$detpem = $ambil->fetch_assoc();

	//1. mendapatkan id_pelanggan yang beli
	$id_pelanggan_beli = $detpem["id_user"];

	//2. mendapatkan id_pelanggan yang login
	$id_pelanggan_login = $_SESSION["user"]["id_user"];

	if($id_pelanggan_login !== $id_pelanggan_beli)
	{
		echo "<script>alert('Anda tidak bisa melihat Input Pembayaran orang lain!!!');</script>";
		echo "<script>location='riwayat.php'</script>";
		exit();
		
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pembayaran</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
	<link rel="icon" href="admin/logo/icon_web_16.png" type="image/png">
</head>
<body>
	<?php include 'navbar.php'; ?>

<div class="container">
	<h2>Konfirmasi Pembayaran</h2>
	<p>Kirim bukti pembayaran Anda disini</p>
	<div class="alert alert-info">Total Tagihan Anda <strong><?php echo 'Rp. '.number_format($detpem["total_pembelian"],0,',','.').',-'; ?></strong></div>

	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>Nama Penyetor</label>
			<input type="text" class="form-control" name="nama">
		</div>
		<div class="form-group">
			<label>Bank</label>
			<input type="text" class="form-control" name="bank">
		</div>
		<div class="form-group">
			<label>Jumlah</label>
			<input type="text" class="form-control" name="jumlah" min="1">
		</div>
		<div class="form-group">
			<label>Foto Bukti</label>
			<input type="file" class="form-control" name="bukti">
			<p class="text-danger">Foto bukti harus JPG maksimal 2 Mb</p>
		</div>
		<button class="btn btn-primary" name="kirim">Kirim</button>
	</form>
<?php 
if(isset($_POST["kirim"]))
{
	//upload foto bukti pembayran
	$namabukti = $_FILES["bukti"]["name"];
	$lokasibukti = $_FILES["bukti"]["tmp_name"];
	$namafiks = date("YmdHis").$namabukti;
	move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

	$nama = $_POST["nama"];
	$bank = $_POST["bank"];
	$jumlah = $_POST["jumlah"];
	$tanggal = date("Y-m-d");

	//simpan pembayaran
	$koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti) VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");

	//update data pembelian dari pending menjadi sudah dirkirm pembayaran
	$koneksi->query("UPDATE pembelian SET status_pembelian = 'sudah kirim pembayaran' WHERE id_pembelian='$idpem'");

	echo "<script>alert('terima Kasih sudah mengirimkan bukti pembayaran');</script>";
	echo "<script>location='riwayat.php'</script>";

}
?>

</div>
</body>
</html>