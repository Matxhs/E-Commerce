<?php  
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nota Pembelian</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
	<link rel="icon" href="admin/logo/icon_web_16.png" type="image/png">
</head>
<body>

<?php include 'navbar.php'; ?>

<section class="konten">
	<div class="container">
		<br>
	<!-- nota disini copas dari nota(detail) yang ada diadmin -->
	<h2 class="text-center">Nota Pembelian</h2>
	<br><br>
	<?php  
	$ambil = $koneksi->query("SELECT * FROM pembelian JOIN user
		ON pembelian.id_user = user.id_user
		WHERE pembelian.id_pembelian = '$_GET[id]'");
	$detail = $ambil->fetch_assoc(); 
	?>
<!-- 	<h1>data orang yang beli</h1>
	<pre><?php //print_r($detail); ?></pre>

	<h1>Data orang yang login di session</h1>
	<pre><?php //print_r($_SESSION); ?></pre> -->

	<?php 

	$idpelangganyangbeli = $detail["id_user"];

	$idpelangganyanglogin = $_SESSION["user"]["id_user"];

	if ($idpelangganyangbeli !== $idpelangganyanglogin) 
	{
		echo "<script>alert('Anda tidak bisa melihat nota orang lain!!!');</script>";
		echo "<script>location='riwayat.php';</script>";
		exit();

	}

	?>

	<div class="row">
		<div class="col-md-4">
			<h3>Pembelian</h3>
			<strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
			<p>
				Tanggal	 : <?php echo $detail['tanggal_pembelian']; ?><br>
				Total : <?php echo 'Rp. '. number_format($detail['total_pembelian'],0,',','.').',-'; ?><br>
			</p>
		</div>

		<div class="col-md-4">
			<h3>Pelanggan</h3>
			<strong>Nama : <?php echo $detail['nama']; ?></strong><br>
			<p>
				Telepon	 : <?php echo $detail['telepon']; ?><br>
				Email : <?php echo $detail['email']; ?>
			</p>
		</div>

		<div class="col-md-4">
			<h3>Pengiriman</h3>
			<strong>Kota : <?php echo $detail['nama_kota'] ?></strong><br>
			Ongkos Kirim : <?php echo 'Rp. '.number_format($detail['tarif'],0,',','.').',-'; ?>
		</div>
	</div>


	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Subtotal</th>
			</tr>
		</thead>
		<tbody>
			<?php $nomor = 1 ?>
			<?php $ambil = $koneksi->query("SELECT * FROM pembelian_menu WHERE id_pembelian = '$_GET[id]'"); ?>
			<?php while($pecah = $ambil->fetch_assoc()) { ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah['nama']; ?></td>
				<td><?php echo 'Rp. '.number_format( $pecah['harga'],0,',','.').',-'; ?></td>
				<td><?php echo $pecah['jumlah']; ?></td>
				<td><?php echo 'Rp. '.number_format($pecah['subharga'],0,',','.').',-'; ?></td>
			</tr>
			<?php $nomor++; ?>
			<?php } ?>
		</tbody>
	</table>

	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info">
				<p>
					Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br> <strong>Akun DANA:0813517362904/Muhamad Azis Abduloh </strong>
				</p>
			</div>
		</div>
	</div>

	</div>
</section>
</body>
</html>