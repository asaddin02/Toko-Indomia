<?php 

    include "koneksi.php";
    $nt = $_GET['nota_penjualan']; 
    $nota = mysqli_query($conn, "SELECT MAX('nota_penjualan') as nt FROM trans_penjualan");
    $nota_p = mysqli_fetch_array($nota);
    $data_barang = munculkan("SELECT * FROM trans_penjualan WHERE nota_penjualan = $nt");
    $detail_barang = munculkan("SELECT * FROM detail_penjualan WHERE nota_penjualan = $nt");
    
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cetak</title>
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
</head>
<body>
	<center class="mb-5">
		<h2>TOKO INDOMIA</h2>
		<h2>Nota Pembayaran</h2>
	</center>

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
                                           
                                           <td class="align-middle"><?php echo $nt;?></td>
                                           
                                           <td class="align-middle">
                                            <?php foreach ($detail_barang as $key) {
                                           ?>
                                            <?php echo substr($key['nama'], 3);?> <br>
                                                <?php }?> 
                                            </td>
                                           
                                           <td class="align-middle"><?php echo $tampil['tanggal'];?></td>
                                           <td class="align-middle"><?php echo $tampil['grand_total'];?></td>
                                           <td class="align-middle" style="vertical-align: middle;">
                                               <a class="btn btn-sm bg-primary" target="_blank" style="color: whitesmoke;"><i class="fas fa-print"></i></a> 
                                           </td>                                          
                                       </tr>
                                       <?php
                                        }?>                                    
                                    </table>
                               </div>
                           </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Prasada Arif Nurudin | Indomia 2022</span>
                    </div>
                </div>
            </footer>

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
    <script>window.print();</script>
	
</body>
</html>				