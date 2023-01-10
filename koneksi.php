<?php 
	
	$conn = mysqli_connect('localhost','root','','indomia');


	function munculkan($muncul){
		global $conn;
		$result = mysqli_query($conn, $muncul);
		$tampilsemua = [];
		while( $tampil = mysqli_fetch_assoc($result) ) {
			$tampilsemua[] = $tampil;
		}
		return $tampilsemua;
	}

	function tambah($data){
		global $conn;

		$nama = $data['nama'];
		$harga = $data['harga'];
		$stok = $data['stok'];
		$gambar = upload();
		if(!$gambar){
			return false;
		}

		$query = "INSERT INTO barang VALUES ('', '$nama', '$gambar','$harga', '$stok')";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);

	}

	function simpan($data){
		global $conn;

		$kode = $data['barang'];
		$nota = $data['notrans'];
		$barang = $data['barang'];
		$harga = $data['harga'];
		$jumlah = $data['jumlah'];
		$total = $data['total'];
        $sql = mysqli_query($conn,"SELECT * FROM barang WHERE kode_barang = '".$barang."'");
                $fetch = mysqli_fetch_array($sql);
                $stok_b = $fetch['stok'];
                if($_POST['jumlah'] > $stok_b){
                    echo "stok barang tidak mencukupi ";
                    return false;
                }else{
                	$query = "INSERT INTO detail_penjualan VALUES ('$nota', '$kode','$barang', '$harga','$jumlah', '$total')";
					mysqli_query($conn, $query);
                }   
		return mysqli_affected_rows($conn);

	}


	function upload(){
		$namafile = $_FILES['gambar']['name'];
		$ukuranfile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpname = $_FILES['gambar']['tmp_name'];

		if($error===4){
			echo "<script>
					alert('Pilih gambar yang akan di upload');
				</script>";
			return false;
		}

		$ekstensi = ['jpg','jpeg','png'];
		$ekstensigambar = explode('.', $namafile);
		$ekstensigambar = strtolower( end($ekstensigambar));
		if(!in_array($ekstensigambar, $ekstensi)){
			echo "<script>
					alert('Ekstensi yang diizinkan hanya jpg, jpeg, dan png!');
				</script>";
			return false;
		}

		if($ukuranfile > 1500000){
			echo "<script>
					alert('Ukuran gambar terlalu besar!');
				</script>";
			return false;
		}

		$namafilebaru = uniqid();
		$namafilebaru .= '.';
		$namafilebaru .= $ekstensigambar;


		move_uploaded_file($tmpname, 'fotoproduk/'. $namafilebaru);

		return $namafilebaru;

	}


	function uploadprofil(){
		$namafile = $_FILES['gambar']['name'];
		$ukuranfile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpname = $_FILES['gambar']['tmp_name'];

		if($error===4){
			echo "<script>
					alert('Pilih gambar yang akan di upload');
				</script>";
			return false;
		}

		$ekstensi = ['jpg','jpeg','png'];
		$ekstensigambar = explode('.', $namafile);
		$ekstensigambar = strtolower( end($ekstensigambar));
		if(!in_array($ekstensigambar, $ekstensi)){
			echo "<script>
					alert('Ekstensi yang diizinkan hanya jpg, jpeg, dan png!');
				</script>";
			return false;
		}

		if($ukuranfile > 1500000){
			echo "<script>
					alert('Ukuran gambar terlalu besar!');
				</script>";
			return false;
		}

		$namafilebaru = uniqid();
		$namafilebaru .= '.';
		$namafilebaru .= $ekstensigambar;


		move_uploaded_file($tmpname, 'fotoku/'. $namafilebaru);

		return $namafilebaru;

	}

	function hapus($id){
		global $conn;

		mysqli_query($conn, "DELETE FROM barang WHERE kode_barang = $id");
		return mysqli_affected_rows($conn);
	}

	function gosok($pp,$nt){
		global $conn;

		mysqli_query($conn, "DELETE FROM detail_penjualan WHERE kode_barang = $pp AND nota_penjualan = $nt");
		return mysqli_affected_rows($conn);
	}

	function ubah($data){
		global $conn;

		$kode = ($data["kode_barang"]);
		$nama = htmlspecialchars(ucwords($data["nama"]));
		$harga = htmlspecialchars($data["harga"]);
		$stok = htmlspecialchars($data["stok"]);
		$gambarlama = $data["gambarlama"];
		if($_FILES['gambar']['error']===4){
			$gambar = $gambarlama;
		} else {
			$gambar = upload();
		}

		$edit = "UPDATE barang SET 
					nama = '$nama',
					harga = '$harga',
					stok = '$stok',
					gambar = '$gambar'
					WHERE kode_barang = $kode";

		mysqli_query($conn,$edit);

		return mysqli_affected_rows($conn);
	}

	function grandtotal($total){
		global $conn;

		$nota = $total['notrans'];
		$total = $total['total'];
		$query = mysqli_query($conn, "SELECT total FROM detail_penjualan WHERE nota_penjualan = $nota");
		$grand = mysqli_fetch_array($query);

		while($grand){
			$total += $grand; 
		}

		return mysqli_affected_rows($conn,$grand);
	}



		function grand($data){
		global $conn;

		$date = $data['date'];
		$nota = $data['nota'];
		$grand = $data['grand_total'];
		$query = "INSERT INTO trans_penjualan VALUES ('$nota', '$date','$grand')";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);

	}

?>

