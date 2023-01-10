<?php 

    session_start();
    include "koneksi.php";

    include "ceksesi2.php";

    $id_pegawai = $_SESSION['id'];
    $level = $_SESSION['jabatan'];


    $query = mysqli_query($conn, 'SELECT * FROM pegawai WHERE id_pegawai = "'.$id_pegawai.'"');
    $data = mysqli_fetch_array($query);

    $nama = $data['nama'];

    $data_barang = munculkan("SELECT * FROM barang");

 ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Detail Transaksi</title>

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
                        Detail Transaksi
                    </h1>
                </div>

                <form action="" method="post" class="mb-5">
                  <div class="row mb-3">
                    <label for="notrans" class="col-sm-2 col-form-label col-form-label-sm">Nomor Transaksi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control form-control-sm" id="notrans" name="notrans" value="<?php echo $_GET['nt'];?>" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Barang" class="col-sm-2 col-form-label col-form-label-sm">Barang</label>
                    <div class="col-sm-10">

                      <select class="form-control form-control-sm" name="barang" id="Barang" onmouseout="cek_harga()">
                          <?php foreach ($data_barang as $tampil) {
                              ?>
                              <option value="<?php echo $tampil['kode_barang'];?>.<?= $tampil['nama'];?>"><?php echo $tampil['nama'];?>(<?php echo $tampil['kode_barang'];?>)</option>
                              <?php
                          }?>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3" id="div-awal">
                    <label for="Harga" class="col-sm-2 col-form-label col-form-label-sm">Harga</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control form-control-sm" name="harga" value="0">
                    </div>
                  </div>
                  <div class="row mb-3" id="div-harga" style="display: none;">

                  </div>
                  <div class="row mb-3">
                    <label for="jumlah" class="col-sm-2 col-form-label col-form-label-sm">Jumlah</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control form-control-sm" id="jumlah" name="jumlah" onclick="kalkulasi()" onkeyup="kalkulasi()" value="0">
                    </div>
                  </div>
                  <div class="row mb-4">
                    <label for="Total" class="col-sm-2 col-form-label col-form-label-sm">Total</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control form-control-sm" id="Total" name="total" readonly>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-2">
                        <button type="submit" name="simpan" class="btn btn-info ml-1"><i class="fas fa-save"></i>     Simpan</button>
                    </div>
                    <div class="col-sm-2 offset-8 text-right">
                        
                    </div>
                  </div>             

                </form>

            <?php
            $nt = $_GET['nt'];
            if(isset($_POST['simpan'])){
                $pilih = $_POST['barang'];
                if(simpan($_POST) > 0){
                    echo "penjualan berhasil ditambahkan";
                }                
            }
                
                $detail_beli = munculkan("SELECT * FROM detail_penjualan WHERE nota_penjualan= '".$nt."'");
            ?>
                <div class="row">
                               <div class="col">
                                    <table class="table table-sm table-bordered">                       
                                       <tr class="text-center">
                                        <th style="width: 8%;">No.Trans</th>
                                           <th>Barang</th>
                                           <th>Harga</th>
                                           <th>Jumlah Beli</th>
                                           <th style="width: 30%;">Total</th>
                                           <th>Aksi</th>
                                       </tr>
                                       
                                        <?php foreach ($detail_beli as $tampil) {
                                        ?>
                                       <tr class="text-center">
                                           <td class="align-middle"><?php echo $tampil['nota_penjualan']; ?></td> 
                                           <td class="text-left align-middle pl-3"><?php echo $tampil['nama'];?></td> 
                                           <td class="align-middle"><?php echo number_format($tampil['harga'],0,',','.');?></td>
                                           <td class="align-middle"><?php echo $tampil['jumlah_beli'];?></td>
                                           <td class="align-middle"><?php echo $tampil['total'];?></td>
                                           <td class="align-middle" style="vertical-align: middle;">
                                               <a class="btn btn-sm bg-danger" name="hapus_penjualan" href="hapus_penjualan.php?pp=<?php echo $tampil['kode_barang']; ?>&nt=<?= $tampil['nota_penjualan'];?>" style="color: whitesmoke;"><i class="fas fa-trash-alt"></i></a>
                                           </td>                                          
                                       </tr>
                                       <?php
                                        
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="6">
                                                <center>
                        <form action="proses_transaksi.php" method="post">
                                                    <button type="submit" name="selesai" class="btn btn-primary"><i class="fas fa-check-circle"></i>     Selesai</button>
                                                </center>
                                            </td>
                                        </tr>                                    
                                    </table>
                               </div>
                           </div>
                           <input type="hidden" name="nota" value="<?php echo $detail_beli[0]['nota_penjualan'];?>">
                        </form>
            

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
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
        function cek_harga() {
            var kode_barang;

            kode_barang = $("#Barang").val();
            var main = "hargajs.php";

            $.post(main, {pkb: kode_barang}, function(data){
                $("#div-harga").html(data).show();
                $("#div-awal").hide();
                kalkulasi();
            });
        }

        function kalkulasi(){
            var harga;
            var jml;
            var total;

            harga = $("#harga").val();
            jml = $("#jumlah").val();
            total = harga*jml;

            $("#Total").val(total);
        }
    </script>
</body>

</html>