<?php 

    session_start();
    include "koneksi.php";

    include "ceksesi2.php";

    $id_pegawai = $_SESSION['id'];
    $level = $_SESSION['jabatan'];


    $query = mysqli_query($conn, 'SELECT * FROM pegawai WHERE id_pegawai = "'.$id_pegawai.'"');
    $data = mysqli_fetch_array($query);

    $nama = $data['nama'];

    if(isset($_POST['tambah'])){
            if(tambah($_POST) > 0){
            echo "<script>
                    document.location = 'data-barang.php?notif=berhasil';
                </script>";
            }else{
            echo "<script>
                    document.location = 'data-barang.php?notif=gagal';
                </script>";
        }
    }


 ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah Barang</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
            include "sidebar.php";
        ?>
        
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    include "navbar.php";
                ?>

                <!-- End of Topbar -->

            </div>
            <!-- End of Main Content -->
            <div class="container-fluid mb-5">
                <div class="d-sm-flex align-items-center justify-content-center mb-5">
                    <h1 class="h3 mb-0 text-gray-800">
                        Form Tambah Barang
                    </h1>
                </div>

                <form action="" method="post" class="mb-5" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <label for="Nama_b" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="Nama_b" name="nama" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="Harga" name="harga" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="JumlahBarang" class="col-sm-2 col-form-label">Jumlah Barang</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="JumlahBarang" name="stok" required>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <label for="gambar" class="col-sm-2 col-form-label">Masukkan Gambar</label>
                    <div class="col-sm-10">
                      <input type="file" id="gambar" name="gambar" required>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                      <button type="submit" name="tambah" class="btn btn-warning"><i class="fas fa-plus"></i>     Tambah Barang</button>
                  </div>
                </form>
            </div>
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Yakin mau keluar?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Klik tombol "Keluar" jika Anda mau mengakhiri & Klik tombol "Batal" jika tidak.</div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="button" data-dismiss="modal">Batal</button>
                            <a class="btn btn-danger" href="logout.php">Keluar</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white shadow">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Prasada Arif Nurudin | Indomia 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>