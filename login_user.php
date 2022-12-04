<?php  
session_start();
include 'koneksi.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Pelanggan</title>
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


<div class="container">
	<div class="row justify-content-center" style="margin-top: 50px">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">

				<div class="panel-heading">
					<div class="panel-title text-center">
						<H1>Login Pelanggan</H1>
						<br>
					</div>
				</div>
				<div class="panel-body">
					<form method="POST">
						<div class="form-group">
							<label>Email</label>
							<div class="input-group">
					            <input type="text" class="form-control" name="email" placeholder="Masukkan Email" />
			            	</div>
						</div>

						<div class="form-group">
							<label>Password</label>
							<div class="input-group">
				            	<input type="password" class="form-control"  name="password" placeholder="Masukkan Password" />
							</div>
						</div>
						<button class="btn btn-primary btn-lg btn-block" name="masuk">Login</button>
						<br>
						<p>Belum punya akun? <a href="daftar.php" style="text-decoration: none"><b>Daftar</b></a></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php  
//jika tombol "masuk" ditekan maka
if (isset($_POST["masuk"])) 
{
	
	$email = $_POST["email"];
	$password = $_POST["password"];


	$ambil = $koneksi->query("SELECT * FROM user WHERE email='$email' AND password='$password'");
	
	$cocok = $ambil->num_rows;

	if($cocok==1)
	{
		$akun = $ambil->fetch_assoc();
		//simpan di session
		$_SESSION["user"] = $akun;
        echo "<script>alert('anda sukses login');</script>";

        //jika sudah belanja 
        if (isset($_SESSION["keranjang"])  OR !empty($_SESSION["keranjang"]))
        {
        	echo "<script>location='checkout.php';</script>";
        }
        else
        {
        	  echo "<script>location='menu.php';</script>";
        }
	}
	else
	{
		echo "<script>alert('Email dan Password tidak valid');</script>";
        echo "<script>location='login_user.php';</script>";

	}
	


}	

?>

<!-- JavaScript Libraries -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="assets_user/lib/easing/easing.min.js"></script>
    <script src="assets_user/lib/waypoints/waypoints.min.js"></script>
    <script src="assets_user/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets_user/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="assets_user/lib/lightbox/js/lightbox.min.js"></script>
	<script src="assets_user/login/js/jquery.min.js"></script>
	<script src="assets_user/login/js/popper.js"></script>
	<script src="assets_user/login/js/bootstrap.min.js"></script>
	<script src="assets_user/login/js/main.js"></script>
</body>
</html>