<?php 

	session_start();
	include "koneksi.php";

	$user = $_POST['user'];
	$pass = md5($_POST['pass']);

 	$query = mysqli_query($conn, 'SELECT * FROM pegawai WHERE username = "'.$user.'" AND password = "'.$pass.'"');
 	$data = mysqli_fetch_array($query);
 	$cek = mysqli_num_rows($query);

 	if ($cek > 0){
 		$username = $data['username'];
 		$jabatan = $data['jabatan'];
 		$id_pegawai = $data['id_pegawai'];
 		$_SESSION['id'] = $id_pegawai;
 		if($jabatan == 'Admin'){
 			$_SESSION['jabatan'] = 'Admin';
 		}else if($jabatan == 'Kasir'){
 			$_SESSION['jabatan'] = 'Kasir';
 		}

 		header('location:index.php');
 	}else{
 		?>
 		<script type="text/javascript">
			alert("gagal");
			document.location="login.php";
		</script>
 		<?php
 		
 	}
?>