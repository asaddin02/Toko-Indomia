<?php

	include 'koneksi.php';
	$pp = $_GET['pp'];
	$nt = $_GET['nt'];
	
	if(gosok($pp,$nt) > 0){
		echo "<script>

					alert('data berhasil di hapus');
					document.location = 'detail_transaksi.php?nt=$nt';

				</script>";
	} else {
		echo "<script>

					alert('data gagal dihapus');
					

				</script>";
	}

?>