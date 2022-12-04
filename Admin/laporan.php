<?php 
$koneksi = new mysqli("localhost", "root", "" , "nasgor");
session_start();

$semuadata=array();
$tgl_mulai = "-";
$tgl_selesai = "-";

if(isset($_POST["kirim"]))
{

	$tgl_mulai = $_POST["tglm"];
	$tgl_selesai = $_POST["tgls"];
	$ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN user pl ON pm.id_user=pl.id_user WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");

	while($pecah = $ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}

}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
    />

    <title>Laporan</title>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  </head>
  
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php include 'navbar.php'?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
            <h2>Laporan Pembelian dari <?php echo $tgl_mulai ?> hingga <?php echo $tgl_selesai ?></h2>
            <hr>
            <form method="post">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                            <label>Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
                    </div>
                    <div class="col-md-2">
                        <label>&nbsp;</label><br>
                        <button class="btn btn-primary" name="kirim">Lihat</button>
                    </div>
                </div>
            </form>

            <div>
              <!-- Basic Bootstrap Table -->
              <br><br>
              <div class="card">
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $total=0; ?>
                        <?php  foreach($semuadata as $key => $value): ?>
                        <?php $total+=$value['total_pembelian'] ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $value["nama"] ?></td>
                            <td><?php echo $value["tanggal_pembelian"] ?></td>
                            <td><?php echo 'Rp. '.number_format($value["total_pembelian"],0,',','.').',-'; ?></td>
                            <td><?php echo $value["status_pembelian"] ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total</th>
                            <th><?php echo 'Rp. '.number_format($total,0,',','.').',-'; ?></th>
                        </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
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
