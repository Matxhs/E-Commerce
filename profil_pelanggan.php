<?php 
session_start();

include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profil Pelanggan</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap_v.2.css">
	<link rel="icon" href="admin/logo/icon_web_16.png" type="image/png">
	
</head>
<body>

	<?php include 'navbar.php'; ?>

<?php 


$id_user = $_SESSION["user"]['id_user'];
$ambil =  $koneksi->query("SELECT * FROM user WHERE id_user='$id_user'");
$datauser = $ambil->fetch_assoc();

?>

<!-- <pre><?php print_r($_SESSION); ?></pre> -->

<div class="container">
	<div class="col-md-4 col-lg-3">
		<div class="panel panel-success">
			<div class="panel-heading">Profil Pelanggan</div>
	  		<div class="panel-body">
		  	<img src="foto_pelanggan/<?php echo $datauser['foto']; ?>" class="img-circle img-responsive" style="margin: auto;">
			<!-- img/people4.jpg -->
		 	<h3 class="text-center"><?php echo $datauser['nama']; ?></h3>
		 	<h4 class="text-muted text-center">Customer</h4>
		 	<p class="text-justify">
		 	</p>
	  	</div>
	</div>
</div>


<div class="col-md-4 col-lg-8">
	<div class="panel panel-default">
		<div class="panel-heading">
		<h3 class="panel-title">Profil Pelanggan</h3>
		</div>
		<div class="panel-body">
		<form method="POST" class="form-horizontal">

			<div class="form-group">
				<label class="control-label col-md-3">Email</label>
				<div class="col-md-7">
				<input type="text" class="form-control" name="email" value="<?php echo $datauser['email'] ; ?>" readonly>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-3">Password</label>
				<div class="col-md-7">
				<input type="password" class="form-control" name="password" value="<?php echo $datauser['password'] ; ?>" readonly>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-3">
					Telp/Hp
				</label>
				<div class="col-md-7">
				<input type="text" class="form-control" name="telepon" value="<?php echo $datauser['telepon'] ; ?>" readonly>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-7 col-md-offset-3">
					<a href="ubahdata.php?id=<?php echo $datauser['id_user']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i>ubah</a>
				</div>
			</div>
		</form>
	</div>
</div>

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