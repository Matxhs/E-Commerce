<?php 

session_start();

include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ubah Data</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
	<link rel="icon" href="admin/logo/icon_web_16.png" type="image/png">
</head>
<body>
	
<?php include 'navbar.php'; ?>


<?php 

//koding MySQL ubah data (ngambil dari ID pelanggan yang masuk)

$ambil = $koneksi->query("SELECT * FROM user WHERE id_user='$_GET[id]'");
$ubahdata = $ambil->fetch_assoc();

?>
<?php 
// echo "<pre>";
// print_r($ubahdata);
// echo "</pre>";
 ?>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Ubah Data Pelanggan</h3>
			</div>
			<div class="panel-body">

				<form method="POST" enctype="multipart/form-data" class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-md-3">Nama</label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $ubahdata['nama']; ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Email</label>
						<div class="col-md-7">
						<input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $ubahdata['email']; ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Password</label>
						<div class="col-md-7">
						<input type="password" class="form-control" name="password" placeholder="Password Sebelumnya" value="<?php echo $ubahdata['password']; ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">
							Alamat
						</label>
						<div class="col-md-7">
						<textarea name="alamat" placeholder="Masukkan alamat dengan lengkap" class="form-control"><?php echo htmlspecialchars($ubahdata['alamat']); ?></textarea>
						</div> 
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">
							Telp/Hp
						</label>
						<div class="col-md-7">
						<input type="text" class="form-control" name="telepon" placeholder="Nomor Telp" value="<?php echo $ubahdata['telepon']; ?>" required>
						</div>
					</div>
					<div class="form-group">
							<label class="control-label col-md-3">Ganti Foto</label>
						<div class="col-md-7">
							<input type="file" class="form-control" name="foto">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-7 col-md-offset-3">
							<button class="btn btn-warning" name="ubah">Ubah</button>
							<button class="btn btn-primary" type="reset">Batal</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 

	if (isset($_POST['ubah'])) 
	{
		$namafoto=$_FILES['foto']['name'];
		$lokasifoto=$_FILES['foto']['tmp_name'];
		$namafotofiks = date("YmdHis").$namafoto;
	 	//jika foto diubah
		if (!empty($lokasifoto)) 
		{
			move_uploaded_file($lokasifoto, "foto_pelanggan/$namafotofiks");

			$koneksi->query("UPDATE user SET nama='$_POST[nama]', email='$_POST[email]', password='$_POST[password]',alamat='$_POST[alamat]',telepon=$_POST[telepon], foto='$namafotofiks' WHERE id_user='$_GET[id]'");
		}
		else
		{
			$koneksi->query("UPDATE user SET nama='$_POST[nama]', email='$_POST[email]',password='$_POST[password]',alamat='$_POST[alamat]',telepon=$_POST[telepon] WHERE id_user='$_GET[id]'");
		}
		echo "<script>alert('Data anda berhasil diubah')</script>";
		echo "<script>location='profil_pelanggan.php';</script>";
	}

?>
</body>
</html>