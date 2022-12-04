<?php 
session_start();

include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1.0,width=device-width" />

	<title>Nasi Goreng Mpok Mamay</title>
	
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
<header>
<?php include ('navbar.php'); ?>
</header>

<!-- konten -->
<section class="konten">
	<div class="container-fluid p-0 mb-10 pb-1">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="foto_produk/nasgor_china.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="text-white text-uppercase mb-md-3">Selamat Datang</h1>
							<h2 class="text-white text-uppercase mb-md-0">Di</h2>
                            <h1 class="display-3 text-white mb-md-4">Nasi Goreng Mpok Mamay</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="foto_produk/nasgor_seafood.jpg" alt="Image">
					<div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
						<div class="p-3" style="max-width: 900px;">
							<h2 class="text-white text-uppercase mb-md-3">Selamat Datang</h2>
							<h2 class="text-white text-uppercase mb-md-1">Di</h2>
							<h1 class="display-3 text-white mb-md-4">Nasi Goreng Mpok Mamay</h1>
						</div>
					</div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-secondary px-0" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n1"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-secondary px-0" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n1"></span>
                </div>
            </a>
    	</div>
	</div>
</section>

<!-- About Mulai -->
<div class="container-fluid py-5">
        <div class="container py-5 justify-content-center section-title position-relative text-center">
            <div class="row justify-content-center">
                <h4 class="font-weight-bold mb-3">Tentang Kami</h4>
					<p>
						Nasi goreng merupakan menu makanan yang sudah sangat melekat dengan kehidupan warga Indonesia. 
						Makanan satu ini benar-benar disukai dan sudah terkenal ke seluruh pelosok negeri bahkan dunia. 
						Melihat makanan ini sangat terkenal dikalangan orang-orang, pemilik usaha Nasi Goreng Mpok Mamay
						memilih makanan nasi goreng ini sebagai sebuah usaha sampingan dan ingin mengembangkannya lebih besar lagi 
						dan untuk langkah awalnya pemilik usaha Nasi Goreng Mpok Mamay ingin mengenalkan produk makanannya lewat Website ini.
					</p>
                <div class="col-lg-10 justify-content-center">
					<a href="kontak.php" class="btn btn-secondary">Lebih Lengkap</a>
				</div>
            </div>
        </div>
    </div>
</div>
<!-- About Akhir -->

<!-- Footer Start -->
<div class="container-fluid footer bg-light py-5" style="margin-top: 90px;">
        <div class="container text-center py-5">
            <div class="row">
                <div class="col-12">
					<img src="img/logo.PNG" style="object-fit: cover;">
                </div>
                <div class="col-12 mb-4">
                    <a class="btn btn-outline-secondary btn-social mr-2" href="#"><i class="fab fa-whatsapp"></i></a>
                    <a class="btn btn-outline-secondary btn-social mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-secondary btn-social" href="#"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="col-12">
				<p>Copyright <i class="fa fa-copyright"></i> 2022 Allright Reserved <i style="color: pink;"></i><a style="color: black;"> Muhamad Azis Abduloh</a></p>
                </div>
            </div>
        </div>
</div>
<!-- Footer End -->

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