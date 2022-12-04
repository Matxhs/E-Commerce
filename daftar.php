<?php 
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Daftar</title>
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
		<div class="row justify-content-center" style="margin-top: 50px;">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading text-center">
						<h3 class="panel-title">Daftar Akun</h3>
					</div>
				<div class="panel-body">
					
					<form method="POST" action="" class="form-horizontal" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label col-md-3">Nama</label>
							<div class="input-group">
								<input type="text" class="form-control" name="nama" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Email</label>
							<div class="input-group">
							<input type="email" class="form-control" name="email" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Password</label>
							<div class="input-group">
							<input type="password" class="form-control" name="password" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">
								Alamat
							</label>
							<div class="input-group">
							<textarea name="alamat" placeholder="Masukkan alamat dengan lengkap" class="form-control" required></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">
								Telp/Hp
							</label>
							<div class="input-group">
							<input type="telp" class="form-control" name="telepon" required>
							</div>
						</div>
						<div class="form-group">
								<label class="control-label col-md-3">Foto</label>
							<div class="input-group">
								<input type="file" class="form-control" name="foto" id="foto">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-7 col-md-offset-3">
								<button class="btn btn-primary" name="daftar" id="daftar">Daftar</button>
							</div>
						</div>

					</form>
					<?php  

					if (isset($_POST["daftar"]))
					{
						$nama = $_POST["nama"];
						$email = $_POST["email"];
						$password = $_POST["password"];
						$telepon = $_POST["telepon"];
						$alamat = $_POST["alamat"];

						$namafoto = $_FILES['foto']['name'];
						$lokasifoto = $_FILES['foto']['tmp_name'];
						$namafotofiks = date("YmdHis").$namafoto;
						move_uploaded_file($lokasifoto, "foto_pelanggan/$namafotofiks");

						$ambil = $koneksi->query("SELECT * FROM user WHERE email_pelanggan = '$email'");
						$yangcocok = $ambil->num_rows;

						if($yangcocok==1)
						{
							echo "<script>alert('pendaftaran gagal, karena email sudah di gunakan');</script>";
							echo "<script>location='daftar.php';</script>";
						}
						else
						{
					    $koneksi->query("INSERT INTO user (email, password ,nama ,telepon ,alamat ,foto) VALUES ('$_POST[email]','$_POST[password]','$_POST[nama]','$_POST[telepon]','$_POST[alamat]','$namafotofiks')"); 

					    echo "<script>alert('pendaftaran berhasil');</script>";
						echo "<script>location='login_user.php';</script>";
						}
						  
					}

					?>
					
				</div>
			</div>
		</div>
	</div>

</body>
</html>