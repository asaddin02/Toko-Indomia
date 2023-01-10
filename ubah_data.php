<?php

    include 'koneksi.php';

    if(isset($_POST['submit1'])){
              if(ubah($_POST) > 0){
                echo "<script>
                            alert('data berhasil diubah');
                            document.location = 'data-barang.php';
                        </script>";
            } else {
                echo "<script>
                            alert('data gagal diubah');
                            document.location = 'data-barang.php';
                        </script>";
            }
    }

?>