<?php

	include 'koneksi.php';
	$id = $_GET['id'];

	$query = mysqli_query($conn, "SELECT * FROM barang WHERE kode_barang = '".$id."'");
	$data = mysqli_fetch_array($query);
	$namabarang = $data['gambar'];

	unlink('fotoproduk/'.$namabarang);

	if(hapus($id) > 0){
		echo "<script>

					alert('data berhasil di hapus');
					document.location = 'data-barang.php';

				</script>";
	} else {
		echo "<script>

					alert('data gagal dihapus');
					document.location = 'data-barang.php';

				</script>";
	}

?>