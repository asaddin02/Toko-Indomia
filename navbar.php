        <?php
            if($level == 'Admin'){
                $warna = 'bg-success';
            }else {
                $warna = 'bg-info';
            }
        ?>

<nav class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline small" style="color: #9B9B6D;"><?php echo $nama; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="fotoku/<?php echo $data[10]?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right <?php echo $warna;?> shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profil.php" style="color: white;">
                                    <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" name="keluar" data-toggle="modal" data-target="#logoutModal" style="color: white;">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>