<?php 
$koneksi = new mysqli("localhost", "root", "" , "nasgor");
session_start();

//mendapatkan id_pembelian dari url
$id_pembelian = $_GET['id'];

//MENGAMBIL DATA PEMBAYARAN BERDASARKAN ID_PEMBELIAN

$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
    />

    <title>Pembayaran</title>

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
          <div class="content-wrapper">
            <!-- Content -->
            <div class="row">
                <div class="col-md-6">
                  <br><br>
                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <th><?php echo $detail['nama']?></th>
                        </tr>
                        <tr>
                            <th>Bank</th>
                            <th><?php echo $detail['bank'] ?></th>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <th><?php echo $detail['jumlah']?></th>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <th><?php echo $detail['tanggal'] ?></th>
                        </tr>
                    </table>
                </div>
                <br><br>
                <div class="col-md-6">
                    <img src="../bukti_pembayaran/<?php echo $detail['bukti'] ?>" alt="" class="img-responsive">
                </div>
            </div>

            <div class="container-xxl flex-grow-1 container-p-y">
                <form method="post">
                    <div class="form-group">
                        <label>No Resi Pengiriman</label>
                        <input type="text" class="form-control" name="resi">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="">Pilih Status</option>
                            <option value="selesai">Selesai</option>
                            <option value="barang dikirim">Dikirim</option>
                            <option value="batal">Batal</option>
                        </select>
                    </div>
                    <br>
                    <button class="btn btn-primary" name="proses">Proses</button>
                </form>
                <?php  
                if (isset($_POST["proses"])) {

                    $resi = $_POST["resi"];
                    $status = $_POST["status"];
                    $koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");

                    echo "<script>alert('data pembelian sudah di UPDATE');</script>";
                    echo "<script>location='pembelian.php';</script>";
                }
                ?>
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
