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

    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative text-center mb-5">MENU</h1>
                </div>
            </div>
            <div class="row">
                <?php $ambil = $koneksi->query("SELECT * FROM menu"); ?>
                <?php while($perproduk = $ambil->fetch_assoc()){ ?>
                    <div class="col-lg-3 col-md-6 mb-4 pb-2">
                        <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3 mt-3">
                            <div class="thumbnail">
                                <img src="foto_produk/<?php echo $perproduk['foto_menu']; ?>" class="rounded-circle w-100 h-100">
                                <div class="caption">
                                    <h3><?php echo $perproduk['nama']; ?></h3>
                                    <h5><?php echo 'Rp. ' . number_format($perproduk['harga'],0,',', '.') . ',-'; ?></h5>
                                    <a href="beli.php?id=<?php echo $perproduk['id_menu']; ?>" class="btn btn-primary">Beli</a>
                                    <a href="detail_menu.php?id=<?php echo $perproduk['id_menu']?>" class="btn btn-secondary">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Products End -->

</body>
</html>