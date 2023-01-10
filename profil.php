<?php 

    session_start();
    include "koneksi.php";

    include "ceksesi2.php";

    $id_pegawai = $_SESSION['id'];
    $level = $_SESSION['jabatan'];


    $query = mysqli_query($conn, 'SELECT * FROM pegawai WHERE id_pegawai = "'.$id_pegawai.'"');
    $data = mysqli_fetch_array($query);
    $nama = $data['nama'];


 ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profil</title>

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

            </div>
            <!-- End of Main Content -->
            <div class="container-fluid mb-5">
                <div class="card mt-5">
                    <div class="card-header bg-info mb-5">
                        <div class="d-sm-flex align-items-center justify-content-center">
                            <h1 class="h3 mb-0" style="color: #fff;">
                                Profile User
                            </h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data">
                          <div class="row mb-5 text-center">
                            <div class="col-sm-12">
                              <img src="fotoku/<?php echo $data[10]?>" class="img-thumbnail" width="100">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="ID" class="col-sm-2 col-form-label col-form-label-sm">ID</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control form-control-sm" id="ID" name="idp" value="<?php echo $data[0]; ?>" readonly>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="Nama" class="col-sm-2 col-form-label col-form-label-sm">Nama</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control form-control-sm" id="Nama" name="nama" value="<?php echo $data[1]; ?>" readonly>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="Alamat" class="col-sm-2 col-form-label col-form-label-sm">Alamat</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control form-control-sm" id="Alamat" name="alamat" value="<?php echo $data[2]; ?>" readonly>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="TempatKelahiran" class="col-sm-2 col-form-label col-form-label-sm">Tempat Kelahiran</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control form-control-sm" id="TempatKelahiran" name="tk" value="<?php echo $data[4]; ?>" readonly>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="TanggalLahir" class="col-sm-2 col-form-label col-form-label-sm">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <?php
                                    $date = strtotime($data[3]);
                                    $newdate = date('d-m-Y',$date);
                                ?>
                              <input type="text" class="form-control form-control-sm" id="TanggalLahir" name="tl" value="<?php echo $newdate?>" readonly>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="Agama" class="col-sm-2 col-form-label col-form-label-sm">Agama</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control form-control-sm" id="Agama" name="tk" value="<?php echo $data[6]; ?>" readonly>
                            </div>
                           </div>
                            <div class="row mb-3">
                            <label for="JenisKelamin" class="col-sm-2 col-form-label col-form-label-sm">Jenis Kelamin</label>
                            <div class="col-sm-10">
                              <?php

                                if($data[5] == 'L'){
                                    ?>
                                <input type="text" class="form-control form-control-sm" id="JenisKelamin" name="tk" value="Laki-Laki" readonly>
                                <?php
                                }else {
                                    ?>
                                <input type="text" class="form-control form-control-sm" id="JenisKelamin" name="tk" value="Perempuan" readonly>
                                <?php
                                }
                              ?>
                            </div>
                           </div>
                          <div class="row mb-5">
                            <label for="Username" class="col-sm-2 col-form-label col-form-label-sm">Username</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control form-control-sm" name="username" id="Username" value="<?php echo $data[7]; ?>" readonly>
                            </div>
                          </div>
                          <div class="row justify-content-center">
                              <button type="button" data-toggle="modal" data-target="#ubah_data" class="btn btn-sm btn-info">Edit Profil</button>
                          </div>
                        </form>
                    </div>  
                </div>
            </div>

            <div class="container-fluid mb-5">
                <div class="card">
                    <div class="card-header  bg-danger">
                        <div class="d-sm-flex align-items-center justify-content-center">
                            <h1 class="h3 mb-0" style="color: #fff;">
                                Password
                            </h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                              <div class="row justify-content-center">
                                  <button type="button" name="cekpass" data-toggle="modal" data-target="#gantipassword" class="btn btn-sm btn-danger">Ubah Password</button>
                              </div>
                        </form>  
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
                    <button class="btn btn-success" type="submit" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="logout.php">Keluar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- modal ubah data -->
    <div class="modal fade" id="ubah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Ubah Data Profile</h6>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="edit_profil.php" method="post" class="form-sm" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control form-control-sm" id="ID" name="idp" value="<?php echo $data[0]; ?>" disabled>
                      <input type="hidden" name="gambarlama" id="gambarlama" value="<?php echo $data[10];?>">
                    </div>
                  </div>
                    <div class="row mt-3 mb-4 text-center vertical-align-center">
                        <div class="col-sm-12 ">
                              <img src="fotoku/<?php echo $data[10]?>" width="150"> <br>
                              <input type="file" accept="" name="gambar" id="gambar" class="form-control-sm mt-3">
                        </div>
                    </div>
                  <div class="row mb-3">
                    <label for="Nama" class="col-sm-2 col-form-label col-form-label-sm">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control form-control-sm" id="Nama" name="nama" value="<?php echo $data[1]; ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Alamat" class="col-sm-2 col-form-label col-form-label-sm">Alamat</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control form-control-sm" id="Alamat" name="alamat" value="<?php echo $data[2]; ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="TempatKelahiran" class="col-sm-2 col-form-label col-form-label-sm">Tempat Kelahiran</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control form-control-sm" id="TempatKelahiran" name="tk" value="<?php echo $data[4]; ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="TanggalLahir" class="col-sm-2 col-form-label col-form-label-sm">Tanggal Lahir</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control form-control-sm" id="TanggalLahir" name="tl" value="<?php echo $data[3]; ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                      <label for="Agama" class="col-sm-2 col-form-label col-form-label-sm">Agama</label>
                      <div class="col-sm-10">
                      <select class="form-control form-control-sm" id="Agama" name="agama">
                          <option value="Islam"  <?php if($data[6]=='Islam') {echo "selected";} ?> >Islam</option>
                          <option value="Kristen"  <?php if($data[6]=='Kristen') {echo "selected";} ?> >Kristen</option>
                          <option value="Budha"  <?php if($data[6]=='Budha') {echo "selected";} ?> >Budha</option>
                          <option value="Hindu"  <?php if($data[6]=='Hindu') {echo "selected";} ?> >Hindu</option>
                          <option value="Katholik"  <?php if($data[6]=='Katholik') {echo "selected";} ?> >Katholik</option>
                          <option value="Konghuchu"  <?php if($data[6]=='Konghuchu') {echo "selected";} ?> >Konghuchu</option>
                      </select>
                      </div>
                  </div>
                  <div class="row mb-3">
                    <legend class="col-form-label col-form-label-sm col-sm-2 pt-0">Jenis Kelamin</legend>
                      <?php

                        if($data[5]=='L'){  
                        ?>
                            <div class="form-check col-sm-2 ml-3">
                                <input class="form-check-input" type="radio" name="jk" id="jk1" value="L" checked>
                                <label class="form-check-label" for="jk1">
                                  Laki-Laki
                                </label>
                              </div>
                          <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" id="jk2" value="P">
                                <label class="form-check-label" for="jk2">
                                  Perempuan
                                </label>
                          </div>                         
                        <?php
                    }else {
                        ?>
                        <div class="form-check col-sm-2 ml-3">
                            <input class="form-check-input" type="radio" name="jk" id="jk1" value="L">
                            <label class="form-check-label" for="jk1">
                              Laki-Laki
                            </label>
                        </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="jk2" value="P" checked>
                        <label class="form-check-label" for="jk2">
                          Perempuan
                        </label>
                      </div>
                        <?php
                    }

                      ?>
                  </div>
                  <div class="row mb-3">
                    <label for="Username" class="col-sm-2 col-form-label col-form-label-sm">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control form-control-sm" name="username" id="Username" value="<?php echo $data[7]; ?>">
                    </div>
                  </div>
                <div class="modal-footer">
                    <button type="submit" name="profil" class="btn btn-sm btn-primary">Ubah Profil</button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal ganti password -->

     <div class="modal fade" id="gantipassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masukkan password yang baru!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">  
                <form action="edit_profil.php" method="post">
                              <div class="row mb-3">
                                <label for="Password" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control form-control-sm" name="pass_lama" id="Password" placeholder="Masukkan Password Saat Ini" required>
                                </div>
                              </div>
                    <div class="row mb-3">
                        <label for="Password" class="col-sm-2 col-form-label col-form-label-sm">Password Baru</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control form-control-sm" name="pass" id="Password" placeholder="Masukkan Password Baru" required>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <label for="KonfirmasiPassword" class="col-sm-2 col-form-label col-form-label-sm">Konfirmasi</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control form-control-sm" name="pass2" id="KonfirmasiPassword" placeholder="Konfirmasi Password" required>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                          <button type="submit" name="Konfirmasipass" class="btn btn-sm btn-danger">Ubah</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal keyakinan -->

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