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

    <title>Data Barang</title>

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
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-light accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center mb-5" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-user"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><img src="fotoku/paty.png" alt="" width="150"></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            

             <li class="nav-item">
                <a class="nav-link" href="profil.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span></a>
            </li>
            <hr class="sidebar-divider my-0">


            <li class="nav-item">
                <a class="nav-link" href="transaksi.php">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Transaksi</span></a>
            </li>
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="data-barang.php">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Data Barang</span></a>
            </li>
            <hr class="sidebar-divider my-0">


            <div class="text-center d-none d-md-inline" style="  margin-top: 90px;">
               <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-dark bg-light topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">
                                <span class="mr-2 d-none d-lg-inline small" style="color: #9B9B6D;"><?php echo $data[1]; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="fotoku/<?php echo $data[10]?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right bg-gradient-success shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profil.php" style="color: white;">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" name="keluar" data-toggle="modal" data-target="#logoutmodal" style="color: white;">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                        <div class="d-sm-flex align-items-center justify-content-center mb-5">
                            <h1 class="h2 mb-0 text-gray-800">
                                Data Barang
                            </h1>
                        </div>
                    <!-- Content Row -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="tambah_barang.php" class="btn bg-warning mb-4" style="color: whitesmoke;"><i class="fas fa-plus"></i>    Tambah Data Barang</a>
                                </div>
                                <?php
                                if(isset($_GET['notif'])){
                                    if($_GET['notif']=='berhasil'){
                                        ?>
                                            <div class="col-sm-6">
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <strong>Data Berhasil Ditambahkan</strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                    </button>
                                                </div>
                                            </div>
                                            <?php
                                    } else{
                                    ?>
                                <div class="col-sm-6">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Data Gagal Ditambahkan</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                        </button>
                                    </div>
                                </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="row">
                               <div class="col">
                                    <table class="table table-sm table-bordered">                       
                                       <tr class="text-center">
                                            <th style="width: 20%;">Aksi</th>
                                            <th>Nama</th>
                                           <th style="width: 4%;">kode</th>
                                           <th>Gambar</th>
                                           <th>Harga</th>
                                           <th>Stok</th>
                                           
                                       </tr>
                                       <?php foreach ($data_barang as $tampil) {
                                        ?>
                                      <tr class="text-center"  style="vertical-align: middle;">
                                            <td class="align-middle">
                                               <a class="btn bg-primary mr-2" id="tombolubah" style="color: whitesmoke; padding: 0.375rem 0.65rem;" data-toggle="modal" data-target="#ubah_barang<?php echo $tampil['kode_barang']?>"><i class="fas fa-edit" style="padding: 0;"></i></a>
                                               <a href="hapus_barang.php?id=<?php echo $tampil["kode_barang"]; ?>" class="btn bg-danger" style="color: whitesmoke;" data-toggle="modal" data-target="#logoutModal<?php echo $tampil['kode_barang']?>"><i class="fas fa-trash-alt"></i></a>  
                                           </td>
                                           <td class="text-left align-middle pl-2"><?php echo ucwords($tampil['nama']);?></td>
                                           <td class="align-middle"><?php echo $tampil['kode_barang'];?></td>
                                           <td class="align-middle"><img src="fotoproduk/<?php echo $tampil['gambar'];?>" width="50"></td>
                                           <td class="align-middle"><?php echo number_format($tampil['harga'],0,',','.');?></td>
                                           <td class="align-middle"><?php echo $tampil['stok'];?></td>
                                       </tr>
                                        <div class="modal fade" id="ubah_barang<?php echo $tampil['kode_barang'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog  modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header mb-4">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Barang Anda</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="container-fluid">
                                                    <form class="modal-body text-center " method="post" action="ubah_data.php" enctype="multipart/form-data">
                                                          <input type="hidden" name="kode_barang" id="kode_barang" value="<?php echo $tampil['kode_barang'];?>">
                                                          <input type="hidden" name="gambarlama" id="gambarlama" value="<?php echo $tampil['gambar'];?>">
                                                          <div class="row mb-3">
                                                            <label for="nama" class="col-sm-2 col-form-label col-form-label-sm">Nama Barang</label>
                                                            <div class="col-sm-10">
                                                              <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?php echo $tampil['nama'];?>">
                                                            </div>
                                                          </div>
                                                          <div class="row mb-3">
                                                            <label for="harga" class="col-sm-2 col-form-label col-form-label-sm">Harga</label>
                                                            <div class="col-sm-10">
                                                              <input type="text" class="form-control form-control-sm" id="harga" name="harga" value="<?php echo $tampil['harga'];?>">
                                                            </div>
                                                          </div>
                                                          <div class="row mb-3">
                                                            <label for="stok" class="col-sm-2 col-form-label col-form-label-sm">Jumlah Barang</label>
                                                            <div class="col-sm-10">
                                                              <input type="text" class="form-control form-control-sm" id="stok" name="stok" value="<?php echo $tampil['stok'];?>">
                                                            </div>
                                                          </div>
                                                          <div class="row mb-4">
                                                            <label for="gambar" class="col-sm-2 col-form-label col-form-label-sm">Gambar Produk</label>
                                                            <div class="col-sm-10">
                                                                <img src="fotoproduk/<?php echo $tampil['gambar']; ?>" width="100">
                                                              <input type="file" id="gambar" class="form-control-plaintext" name="gambar">
                                                            </div>
                                                          </div>
                                                          <div class="row justify-content-center">
                                                              <button class="btn btn-primary btn-sm mb-3" type="submit" name="submit1">Ubah Data Barang</button> 
                                                          </div>
                                                    </form>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="logoutModal<?php echo $tampil['kode_barang']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus data?</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center">Apakah anda ingin menghapus data <br><span style="color: #FFB900;"><?php echo $tampil['nama']; ?> - <?= $tampil['harga'];?></span></div>
                                                        <div class="modal-footer">
                                                            <a class="btn btn-danger" href="hapus_barang.php?id=<?php echo $tampil["kode_barang"]; ?>">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    <?php }?>
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

    <div class="modal fade" id="logoutmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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

    <script type="text/javascript">
        $(document).on("click", "#tombolubah", function(){
            let kode = $(this).data('kode');
            let nama = $(this).data('nama');
            let gambar = $(this).data('gambar');
            let stok = $(this).data('stok');
            let harga = $(this).data('harga');

            $(".modal-body #kode_barang").val(kode);
            $(".modal-body #nama").val(nama);
            $(".modal-body #gambar").val(gambar);
            $(".modal-body #stok").val(stok);
            $(".modal-body #harga").val(harga);
        })
    </script>

</body>

</html>