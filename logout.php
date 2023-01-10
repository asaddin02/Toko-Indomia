<?php

	session_start();

	$id_pegawai = $_SESSION['id'];

	unset($username);

	session_destroy();

?>

<script type="text/javascript">
	document.location = "login.php";
</script>