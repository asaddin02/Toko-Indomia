<?php
include "koneksi.php";

date_default_timezone_set("Asia/Jakarta");
$dt['date'] = date('Y-m-d');
$dt['nota'] = $_POST['nota'];
$sql = mysqli_query($conn, "SELECT * FROM detail_penjualan WHERE nota_penjualan = '".$dt['nota']."'");


if(isset($_POST['selesai'])) {
	$grand_total = 0;
	while($detail = mysqli_fetch_array($sql)){
		$kode_barang = $detail['kode_barang'];
		$cueri = mysqli_query($conn, "SELECT * FROM barang WHERE kode_barang = $kode_barang");
		$dtbrg = mysqli_fetch_array($cueri);
		if($kode_barang == $dtbrg['kode_barang']){
			$stok = $dtbrg['stok'] - $detail['jumlah_beli'];
			$pengurangan = mysqli_query($conn,"UPDATE barang SET stok = '".$stok."' WHERE kode_barang = '".$kode_barang."'");
	}
	}
	$sql2 = mysqli_query($conn, "SELECT * FROM detail_penjualan WHERE nota_penjualan = '".$dt['nota']."'");
	while ($mysql = mysqli_fetch_array($sql2)) {
		$data = $mysql['total'];
		$grand_total = $grand_total+$data;
	}
	$dt['grand_total'] = $grand_total;

	

	if(grand($dt)>0){
		?>
		<script type="text/javascript">
			alert("berhasil");
			document.location = 'transaksi.php'; 
		</script>
		<?php
	}else {
		?>
	    <script type="text/javascript">
			alert("gagal");
			document.location = 'detail_transaksi.php'; 
		</script>
		<?php
	}
}
?>