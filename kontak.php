<?php 
session_start();

include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profil</title>

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
	<?php  include 'navbar.php'; ?>

	<section class="konten">
		<div class="container-fluid py-5">
			<center><h3>Nasi Goreng Mpok Mamay</h3></center>
			<hr>
			<div class="row justify-content-center">
                <div class="col-lg-4 py-5">
					<h4 class="font-weight-bold mb-3">Tentang Kita</h4>
					<p>
						Nasi goreng merupakan menu makanan yang sudah sangat melekat dengan kehidupan warga Indonesia. 
						Makanan satu ini benar-benar disukai dan sudah terkenal ke seluruh pelosok negeri bahkan dunia. 
						Melihat makanan ini sangat terkenal dikalangan orang-orang, pemilik usaha Nasi Goreng Mpok Mamay
						memilih makanan nasi goreng ini sebagai sebuah usaha sampingan dan ingin mengembangkan usahanya lebih besar lagi 
						dan untuk langkah awalnya pemilik usaha Nasi Goreng Mpok Mamay ingin mengenalkan produk makanannya lewat Website ini.
					</p>
                </div>
                <div class="col-lg-4 py-5" style="min-height: 400px;">
					<div class="position-relative h-100 rounded overflow-hidden">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.130296056807!2d106.80576691429332!3d-6.246555395478472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1650c39eecf%3A0x68f8530069294cc2!2sJl.%20Nipah%20Gg.%205%2C%20RT.10%2FRW.1%2C%20Petogogan%2C%20Kec.%20Kby.%20Baru%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012170!5e0!3m2!1sid!2sid!4v1659883922636!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>	
					</div>
                </div>
            </div>
		</div>
	</section>

	<!-- Footer Start -->
<div class="footer bg-light copyright" style="margin-top: 90px;">
        <div class="container text-center">
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