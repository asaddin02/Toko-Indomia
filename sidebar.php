        <?php
        	if($level == 'Admin'){
        		$warna = 'bg-gradient-success';
        	}else {
        		$warna = 'bg-gradient-info';
        	}
        ?>

        <ul class="navbar-nav <?php echo $warna; ?> sidebar sidebar-light accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center mb-5" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-laugh-wink"></i>
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
            <?php
            	if ($level=='Admin') {
            		?>
            <li class="nav-item">
                <a class="nav-link" href="data-barang.php" name="data-barang">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Data Barang</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            		<?php
            	}
            ?>



            <div class="text-center d-none d-md-inline" style="  margin-top: 90px;">
               <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>