<?php 
$koneksi = new mysqli("localhost", "root", "" , "nasgor");
session_start();

$ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
    />

    <title>Ubah Produk</title>

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
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">Menu</h4>

              <!-- Basic Bootstrap Table -->
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama']; ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Harga (Rp)</label>
                        <input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga']; ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Stok Barang</label>
                        <input type="number" class="form-control" name="stok" value="<?php echo $pecah['stok']; ?>">
                    </div>
                    <div class="form-group">
                        <img src="../foto_produk/<?php echo $pecah['foto']; ?>" alt="" width="200">
                    </div>
                    <div class="form-group">
                        <label>Ganti Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" id="" cols="20" rows="5" class="form-control"><?php echo $pecah['deskripsi']; ?>
                        </textarea>
                    </div>
                    <br>
                    <button class="btn btn-primary" name="ubah">Ubah</button>
                    <a href="index.php?halaman=produk" class="btn btn-warning" name="batal">Batal</a>
                </form>
                <?php 
                    if (isset($_POST['ubah'])) 
                    {
                        $namafoto=$_FILES['foto']['name'];
                        $lokasifoto=$_FILES['foto']['tmp_name'];
                        //jika foto dirubah
                        if (!empty($lokasifoto)) 
                        {
                            move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

                            $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',stok_produk='$_POST[stok]',foto_produk='$namafoto',deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");
                        }
                        else
                        {
                            $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',stok_produk='$_POST[stok]',deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");
                        }
                        echo "<script>alert('Data produk berhasil diubah')</script>";
                        echo "<script>location='index.php?halaman=produk';</script>";
                    }
                ?>
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
