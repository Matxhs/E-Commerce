<?php 
session_start();
$koneksi = new mysqli("localhost", "root", "" , "nasgor");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta
        name="viewport"
        />

        <title>Login Admin</title>
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
    <div class="layout-wrapper">
        <div class="layout-container">
          <!-- Content wrapper -->
            <div class="content-wrapper">
                <div class="container-xxl container-p-y">
                    <div class="w-25 m-auto p-auto">
                        <div class="row text-center">
                            <div>
                                <br><br>
                                <h2>Login</h2>
                                <h5>(Silahkan Login untuk mendapat akses)</h5>
                                <form role="form" method="POST" >
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" name="user" placeholder="Masukkan Username" />
                                    </div>
                                    <br>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="password" class="form-control"  name="pass" placeholder="Masukkan Password" />
                                    </div>
                                    <br>
                                    <button class="btn btn-primary" name="login">Login</button>
                                    <hr>
                                </form>

                                <?php 
                                    if (isset($_POST['login'])) 
                                    {
                                        $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' AND password='$_POST[pass]'");
                                        $cocok = $ambil->num_rows;
                                        if($cocok==1)
                                        {
                                        $_SESSION['admin'] = $ambil->fetch_assoc();
                                        echo "<div class='alert alert-success'>Login Sukses</div>";
                                        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                                        }
                                        else
                                        {
                                        echo "<div class='alert alert-danger'>Login Gagal</div>";
                                        echo "<meta http-equiv='refresh' content='1;url=login_admin.php'>";
                                        }
                                    }
                                ?>
                            </div>
                        </div>
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
