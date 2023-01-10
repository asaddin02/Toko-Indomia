<?php 

    session_start();
    include "koneksi.php";

    include "ceksesi2.php";

    $id_pegawai = $_SESSION['id'];
    $level = $_SESSION['jabatan'];


    $query = mysqli_query($conn, 'SELECT * FROM pegawai WHERE id_pegawai = "'.$id_pegawai.'"');
    $data = mysqli_fetch_array($query);

    $nama = $data['nama'];
    $id = $data['id_pegawai'];
    $alamat = $data['alamat'];
    $tl = $data['tgl_lahir']; 
    $tk = $data['tempat_kelahiran'];
    $jk = $data['jk'];
    $agama = $data['agama'];
    $username = $data['username'];

    $nota = mysqli_query($conn, "SELECT MAX(nota_penjualan) AS nt FROM trans_penjualan");
    $nota_p = mysqli_fetch_array($nota);
    $nt = $nota_p['nt']+1;
    $data_barang = munculkan("SELECT * FROM trans_penjualan ORDER BY nota_penjualan DESC");
    // $detail_barang = munculkan("SELECT * FROM detail_penjualan WHERE nota_penjualan = $nt");    


 ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Transaksi</title>

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

        <!-- Sidebar -->
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                        <div class="d-sm-flex align-items-center justify-content-center mb-5">
                            <h1 class="h2 mb-0 text-gray-800">
                                Transaksi
                            </h1>
                        </div>
                    <!-- Content Row -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="detail_transaksi.php?nt=<?php echo $nt;?>" class="btn bg-warning mb-4" style="color: whitesmoke;"><i class="fas fa-plus"></i>    Tambah Transaksi</a>
                                </div>
                            </div>
                            <div class="row">
                               <div class="col">
                                    <table class="table table-sm table-bordered">                       
                                       <tr class="text-center">
                                        <th style="width: 8%;">No.Trans</th>
                                            <th>Nama Barang</th>
                                           <th>Tanggal Transaksi</th>
                                           <th style="width: 30%;">Total Pembayaran</th>
                                           <th style="width: 20%;">Aksi</th>
                                       </tr>
                                        <?php foreach ($data_barang as $tampil) {

                                        ?>
                                       <tr class="text-center">
                                           
                                           <td class="align-middle"><?php echo $tampil['nota_penjualan'];?></td>
                                           
                                           <td class="align-middle">
                                            <?php
                                                $detil_barang = munculkan("SELECT * FROM detail_penjualan WHERE nota_penjualan = '".$tampil['nota_penjualan']."' ");
                                            ?>
                                            <?php foreach ($detil_barang as $key) {

                                           ?>
                                            <?php echo substr($key['nama'], 3);?> <br>
                                                <?php }?> 
                                            </td>
                                           
                                           <td class="align-middle"><?php echo $tampil['tanggal'];?></td>
                                           <td class="align-middle"><?php echo $tampil['grand_total'];?></td>
                                           <td class="align-middle" style="vertical-align: middle;">
                                               <a class="btn btn-sm bg-primary" target="_blank" href="cetak.php?nota_penjualan=<?php echo $tampil['nota_penjualan'] ?>" style="color: whitesmoke;"><i class="fas fa-print"></i></a> 
                                           </td>                                          
                                       </tr>
                                       <?php
                                        }?>                                    
                                    </table>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->

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