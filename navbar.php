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

<!-- Atas Navbar Awal -->
	<div class="container-fluid bg-primary py-3 d-none d-md-block">
        <div class="container">
            <div class="row">
				<div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
					<!-- jika sudah login(ada session pelanggan) -->
					<?php if(isset($_SESSION["user"])): ?>
					<!-- selain itu (blm login||blm ada session pelanggan)-->
					<?php else: ?>
						<a class="text-white pr-3" href="login_user.php">Login</a>
                        <span class="text-white">|</span>
                        <a class="text-white px-3" href="daftar.php">Daftar</a>
					    <span class="text-white">|</span>
					<?php endif ?>
					<a class="text-white px-3" href="cara_pembelian.php">Cara Pembelian</a>
					<span class="text-white">|</span>
					<a href="kontak.php" class="text-white px-3">Tentang</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-white px-3" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Atas Navbar Akhir -->

<!-- navbar Awal -->
<div class="container-fluid position-relative nav-bar p-0">
    <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow p-lg-0">
    	    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- jika sudah login(ada session pelanggan) -->
				<?php if(isset($_SESSION["user"])): ?>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav ml-auto py-0">
                        <a class="nav-item nav-link" href="profil_pelanggan.php">Profil</a>
                        <a class="nav-item nav-link" href="riwayat.php">Riwayat Belanja</a>
                            <a href="index.php" class="nav-item nav-link">Beranda</a>
                            <a href="menu.php" class="nav-item nav-link">Menu</a>
                        </div>
                        <div class="navbar-nav mr-auto py-0">
                            <a href="keranjang.php" class="nav-item nav-link">Keranjang</a>
                            <a href="checkout.php" class="nav-item nav-link">Chekout</a>
                            <a class="nav-item nav-link" href="logout_pelanggan.php" onclick="return confirm('Apakah anda yakin ingin Logout?')">Logout</a>
                        </div>
                    </div>
			<!-- selain itu (blm login||blm ada session pelanggan)-->
				<?php else: ?>
					<div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav ml-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Beranda</a>
                            <a href="menu.php" class="nav-item nav-link">Menu</a>
                        </div>
                        <a href="index.php" class="navbar-brand">
                            <img class="nav-item nav-link" src="img/logo.PNG" style="width: 150px;">
                        </a>
                        <div class="navbar-nav mr-auto py-0">
                            <a href="keranjang.php" class="nav-item nav-link">Keranjang</a>
                            <a href="checkout.php" class="nav-item nav-link">Chekout</a>
                        </div>
                    </div>
				<?php endif ?>
        </nav>
    </div>
</div>
<!-- navbar Akhir -->

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="assets_user/lib/easing/easing.min.js"></script>
    <script src="assets_user/lib/waypoints/waypoints.min.js"></script>
    <script src="assets_user/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets_user/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="assets_user/lib/lightbox/js/lightbox.min.js"></script>