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
    $jabatan = $data['jabatan'];

    date_default_timezone_set("Asia/Jakarta");
    $tanggal = date('Y-m-d');

    $sql = munculkan("SELECT * FROM trans_penjualan WHERE tanggal = '".$tanggal."'");
    
    $ttl = mysqli_query($conn,"SELECT SUM(grand_total) AS grand FROM trans_penjualan WHERE tanggal = '".$tanggal."'");
    $ttl_grand = mysqli_fetch_array($ttl);
 ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                            Selamat <?php 
                                        date_default_timezone_set("Asia/Jakarta");
                                        $jam = date('H:i');

                                        if ($jam >= '04:00' && $jam <= '10:00'){
                                            $salam = "Pagi";
                                        } else if ($jam >= '10:00' && $jam <= '14:30'){
                                            $salam = "Siang";
                                        } else if ($jam <= '18.00'){
                                            $salam = "Sore";
                                        } else {
                                            $salam = "Malam";
                                        }

                                        echo $salam;
                                    ?>
                            , <?php echo $jabatan; ?>
                        </h1>
                    </div>

                        <?php
                            if($level == 'Admin'){
                                $warna = 'bg-success';
                                $card = 'border-left-success';
                            }else {
                                $warna = 'bg-info';
                                $card = 'border-left-info';
                            }   
                        ?>

                    <div class="d-sm-flex">
                        <div class="col-sm-3 <?php echo $warna;?> p-2 text-center text-gray-100 mb-5">
                        <?php 

                             date_default_timezone_set("Asia/Jakarta");
                             $time = date('l');

                             if ($time == 'Sunday'){
                                $hari = "Minggu, ";
                             } else if ($time == 'Monday'){
                                $hari = "Senin, ";
                             } else if ($time == 'Tuesday'){
                                $hari = "Selasa, ";
                             } else if ($time == 'Wednesday'){
                                $hari = "Rabu, ";
                             } else if ($time == 'Thursday'){
                                $hari = "Kamis, ";
                             } else if ($time == 'Friday'){
                                $hari = "Jum'at, ";
                             } else{
                                $hari = "Sabtu, ";
                             }
                           echo $hari;
                           echo date('d-F-Y');

                         ?>
                        </div>
                    </div>

                            <div class="row">
                                <div class="col">
                                    <div class="card mb-5 <?= $card; ?>">
                                        <div class="card-header">Penjualan Tanggal <?= $tanggal = date('d-F-Y'); ?></div>
                                        <div class="card-body">
                                                <table class="table table-sm">
                                                    <tr class="text-center">
                                                        <th class="<?php echo $warna; ?> text-white">Nama Barang</th>
                                                        <th class="<?php echo $warna; ?> text-white">Jumlah</th>
                                                        <th class="<?php echo $warna; ?> text-white">Total Harga</th>
                                                    </tr class="text-center">
                                                    <?php foreach ($sql as $tampil) {
                                                    ?>
                                                   <tr class="text-center mb-3">
                                                       <td class="align-middle">
                                                        <?php
                                                        $nota = $tampil['nota_penjualan'];
                                                        $mysql = munculkan("SELECT * FROM detail_penjualan WHERE nota_penjualan = $nota");
                                                        foreach ($mysql as $key) {
                                                       ?>
                                                        <?php echo substr($key['nama'], 3);?> <br>
                                                            <?php }?> 
                                                        </td>
                                                       
                                                       <td class="align-middle">
                                                        <?php foreach ($mysql as $key) {
                                                            ?>
                                                            <?= $key['jumlah_beli'] ?><br>
                                                        <?php } ?>
                                                            
                                                        </td>
                                                       <td class="align-middle"><?php echo $tampil['grand_total'];?></td>
                                                   </tr>
                                                   <?php
                                                    }?>
                                                    <tr class="text-center">
                                                        <th class="<?php echo $warna; ?> text-white">Total Keseluruhan</th>
                                                        <td class="<?php echo $warna; ?> text-white"></td>
                                                        <th class="<?php echo $warna; ?> text-white">
                                                            <?php
                                                                $array = array_unique($ttl_grand);
                                                                $final = implode(" ",$array);
                                                                echo $final;
                                                             ?>    
                                                        </th>
                                                    </tr>        
                                                </table>
                                        </div>
                                    </div>
                                </div>
                            </div>  

                    <!-- Content Row -->
                    <div class="card <?php echo $card;?> mb-5 shadow">
                        <div class="card-header"><a href="profil.php" class="btn"><i class="fas fa-user"></i>   Info Profile</a></div>
                        <div class="card-body">
                            <div class="col-sm-12 text-center">
                                <img src="fotoku/<?php echo $data[10]?>" alt="" style="width:15%;" class="mb-4 img-thumbnail">
                                <table class=" table table-sm table-light text-left table-striped">
                                    <tr>
                                        <td style="width: 20%;">ID</td>
                                        <td style="width: 4%;">:</td>
                                        <td><?php echo $id; ?></td>
                                    </tr>
                                     <tr>
                                        <td style="width: 20%;">Nama</td>
                                        <td style="width: 4%;">:</td>
                                        <td><?php echo $nama; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20%;">Alamat</td>
                                        <td style="width: 4%;">:</td>
                                        <td><?php echo $alamat; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20%;">Kota Kelahiran</td>
                                        <td style="width: 4%;">:</td>
                                        <td><?php echo $tk; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20%;">Tanggal Lahir</td>
                                        <td style="width: 4%;">:</td>
                                        <td><?php echo $tl; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20%;">Agama</td>
                                        <td style="width: 4%;">:</td>
                                        <td><?php echo $agama; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20%;">Jenis Kelamin</td>
                                        <td style="width: 4%;">:</td>
                                        <td><?php

                                            if($jk=='L'){
                                                echo "Laki-Laki";
                                            } else {
                                                echo "Perempuan";
                                            }

                                         ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20%;">Username</td>
                                        <td style="width: 4%;">:</td>
                                        <td><?php echo $username; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <!-- <div class="col-sm-9"> -->

                        <!-- </div> -->
                        </div>
                    </div>
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
                include "footer.php";
            ?>
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