<?php 
session_start();

include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cara Pembelian</title>

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

	<section class="konten">
		<div class="container mt-5">
			<h3>Cara Mudah Memesan Makanan Di Website Nasi Goreng Mpok Mamay</h3><hr>
		      <p style="text-align: justify-all;">
		        <ol>
		          <li>Pilih Menu yang ingin dipesan</li>
		          <li>Tekan tombol "Detail" untuk mendapatkan informasi lebih rinci tentang makanan yang ingin dipesan</li>
		          <li>Lihat info makanan dan stok makanan.</li>
		          <li>Jika ingin memesan makanan yang diminati, tekan tombol "Beli".</li>
		          <li>Di Halaman Detail makanan Anda juga bisa menambah jumlah makanan yang ingin dibeli.<br>
		          <li>Jika makanan sudah masuk ke keranjang, anda dapat melanjutkan belanja.<br>
		       		  dengan menekan tombol "Lanjutkan Belanja".</li>
		          <li>Jika ingin menyelesaikan belanja, silahkan Checkout pilih ongkos kirim. <br>
		           	  dan masukkan alamat lengkap pengiriman anda </li>
		          <li>Konfirmasi pembayaran dapat melalui fitur yang tersedia di menu akun anda, yaitu Riwayat Belanja .</li>
		          <li>Di menu akun Riwayat Belanja, anda dapat melihat status order barang yang akan dibeli<br>
		              atau sudah diproses oleh admin. </li>
		        </ol>
		      </p>
		</div>
	</section>

	<!-- JavaScript Libraries -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="assets_user/lib/easing/easing.min.js"></script>
    <script src="assets_user/lib/waypoints/waypoints.min.js"></script>
    <script src="assets_user/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets_user/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="assets_user/lib/lightbox/js/lightbox.min.js"></script>

</body>
</html>