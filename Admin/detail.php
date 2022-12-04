<?php 
$koneksi = new mysqli("localhost", "root", "" , "nasgor");
session_start();

$ambil = $koneksi->query("SELECT * FROM pembelian JOIN user
	ON pembelian.id_user = user.id_user
	WHERE pembelian.id_pembelian = '$_GET[id]'");
$detail = $ambil->fetch_assoc(); 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
    />

    <title>Detail</title>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php include 'navbar.php'?>
          <!-- Content wrapper -->
          <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h2 class="card-header text-center">Data Detail</h2>
                <div class="table-responsive">
                <div class="row card-body">
                    <div class="col-md-4">
                        <h3>Pembelian</h3>
                        <strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
                        Tanggal	 : <?php echo $detail['tanggal_pembelian']; ?><br>
                        Total : <?php echo 'Rp. '. number_format($detail['total_pembelian'],0,',','.').',-'; ?><br>
                        Status : <?php echo $detail['status_pembelian']; ?>
                    </div>

                    <div class="col-md-4">
                        <h3>Pelanggan</h3>
                        <strong>Nama : <?php echo $detail['nama']; ?></strong><br>
                        Telepon	 : <?php echo $detail['telepon']; ?><br>
                        Email : <?php echo $detail['email']; ?>
                    </div>

                    <div class="col-md-4">
                        <h3>Pengiriman</h3>
                        <strong>Kab. / Kota : <?php echo $detail['nama_kota'] ?></strong><br>
                        Tarif : <?php echo 'Rp. '.number_format($detail['tarif'],0,',','.').',-'; ?><br>
                        Alamat Pengiriman : <?php echo $detail['alamat_pengiriman']; ?>
                    </div>
                </div>
                <br>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1 ?>
                        <?php $ambil = $koneksi->query("SELECT * FROM pembelian_menu JOIN menu 
                            ON pembelian_menu.id_menu = menu.id_menu 
                            WHERE pembelian_menu.id_pembelian_menu = '$_GET[id]'"); ?>
                            <?php while($pecah = $ambil->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah['nama']; ?></td>
                            <td>Rp. <?php echo number_format( $pecah['harga'],0,',','.').',-'; ?></td>
                            <td><?php echo $pecah['jumlah']; ?></td>
                            <td>Rp. <?php echo number_format($pecah['harga'] * $pecah['jumlah'],0,',','.').',-'; ?></td>
                        </tr>
                        <?php $nomor++; ?>
                        <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
