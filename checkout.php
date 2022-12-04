<?php  
session_start();
include 'koneksi.php';

//jika belum login
if(!isset($_SESSION["user"]))
{
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='login_user.php';</script>";
}


if(!isset($_SESSION["menu"]))
{
	echo "<script>alert('Silahkan berbelanja dahulu atau liat riwayat belanja');</script>";
	echo "<script>location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Checkout</title>
</head>
<body>
	
<?php include 'navbar.php'; ?>

<section class="konten mt-5">
	<div class="container">
		<h1>Checkout</h1>
		<hr>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Menu</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>SubTotal</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php $totalbelanja = 0; ?>
				<?php foreach($_SESSION["menu"] as $id_menu => $jumlah): ?>
				<!-- menampilkan menu tg sedang diperulangkan berdasarkan id_menu -->
				<?php  

				$ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu = '$id_menu'");
				$pecah = $ambil->fetch_assoc();
				$subharga = $pecah["harga"] * $jumlah;

				?>

				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["nama"]; ?></td>
					<td><?php echo 'Rp.'.number_format($pecah["harga"],0,',', '.'). ',-'; ?></td>
					<td><?php echo $jumlah ?></td>
					<td><?php echo 'Rp.'.number_format("$subharga",0,',', '.'). ',-'; ?></td>
				</tr>
				<?php $nomor++; ?>
				<?php $totalbelanja += $subharga; ?>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="4">Total Belanja</th>
					<th><?php echo 'Rp.'.number_format($totalbelanja,0,',', '.'). ',-'; ?> </th>
				</tr>
			</tfoot>
		</table>
		<form method="POST">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" readonly value="<?php echo $_SESSION["user"]['nama'] ?>" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" readonly value="<?php echo $_SESSION["user"]['telepon'] ?>" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<select name="id_ongkir" class="form-control">
						<option value="">Pilih Ongkos Kirim</option>
						<?php
						$ambil = $koneksi->query("SELECT * FROM ongkir");
						while($perongkir = $ambil->fetch_assoc()) {
						?>
						<option value="<?php echo $perongkir['id_ongkir'] ?>">
							<?php echo $perongkir['kota'] ?>
							- Rp.<?php echo number_format($perongkir['tarif']) ?>
						</option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="from-group">
				<label for="">Alamat Lengkap Pengiriman</label>
				<textarea class="form-control" placeholder="Masukkan alamat lengkap pengiriman" id="" cols="30" rows="3" name="alamat_pengiriman" required></textarea>
			</div><br>
			<button class="btn btn-primary" name="checkout">Checkout</button>
		</form>
		<br>
		

		<?php  
		if(isset($_POST["checkout"]))
		{
			$id_user = $_SESSION["user"]["id_user"];
			$id_ongkir = $_POST["id_ongkir"];
			$tanggal_pembelian = date("Y-m-d");
			$alamat_pengiriman = $_POST['alamat_pengiriman'];



			$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
			$arrayongkir = $ambil->fetch_assoc();
			$nama_kota = $arrayongkir['nama_kota'];
			$tarif = $arrayongkir['tarif'];

			$total_pembelian = $totalbelanja+$tarif;

			//1. menyimpan data ke tabel pembelian
			$koneksi->query("INSERT INTO pembelian (id_user,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman) VALUES ('$id_user','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman') ");

			//mendapatkan id_pembelian barusan terjadi
			$id_pembelian_barusan = $koneksi->insert_id;

			foreach ($_SESSION["menu"] as $id_menu => $jumlah)
			{	
				$ambil=$koneksi->query("SELECT * FROM menu WHERE id_menu='$id_menu'");
				$permenu = $ambil->fetch_assoc();


				$nama = $permenu['nama'];
				$harga = $permenu['harga'];

				$subharga = $permenu['harga']*$jumlah;
				$koneksi->query("INSERT INTO pembelian_menu (id_pembelian,id_menu,nama,harga,subharga,jumlah) VALUES ('$id_pembelian_barusan','$id_menu','$nama','$harga','$subharga','$jumlah')");


				$koneksi->query("UPDATE menu SET stok =stok -$jumlah WHERE id_menu='$id_menu'");
			}
			//mengkosongkan keranjang belanja
			unset($_SESSION["menu"]);


			//tampilan dialihkan ke halaman nota, nota dari pembelian yang barusan
			echo "<script>alert('pembelian sukses');</script>";
			echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
		}
		?>
	</div>
</section>

</body>
</html>