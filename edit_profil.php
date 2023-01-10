<?php 

session_start();

include "koneksi.php";


$id_pegawai = $_SESSION['id'];

 if (isset($_POST['profil'])){
    if($_FILES['gambar']['error']===4){
            $gambar = $_POST['$gambarlama'];
        } else {
            $gambar = uploadprofil();
        }
    
    mysqli_query($conn, 'UPDATE pegawai SET nama="'.ucwords($_POST['nama']).'",
                                            alamat="'.$_POST['alamat'].'",
                                            tempat_kelahiran="'.$_POST['tk'].'",
                                            tgl_lahir="'.$_POST['tl'].'",
                                            jk="'.$_POST['jk'].'",
                                            agama="'.$_POST['agama'].'",
                                            username="'.$_POST['username'].'",
                                            gambar="'.$gambar.'" WHERE id_pegawai="'.$id_pegawai.'"');
        ?>
        <script type="text/javascript">
            alert("Update data berhasil");
            document.location = "profil.php";

        </script>                
 <?php

 }

        
    if (isset($_POST['Konfirmasipass'])) {

        $query = mysqli_query($conn,'SELECT * FROM pegawai WHERE id_pegawai = "'.$id_pegawai.'"');
        $data = mysqli_fetch_array($query);

        if (MD5($_POST['pass_lama']) == $data[8]) {

            if($_POST['pass2'] != $_POST['pass']){
            ?>

            <script type="text/javascript">
                alert("Password yang anda masukkan salah!");
                document.location = "profil.php";
            </script>

            <?php
        } else{
            mysqli_query($conn, 'UPDATE pegawai SET password="'.MD5($_POST['pass']).'" WHERE id_pegawai="'.$id_pegawai.'"');             
        ?>

        <script type="text/javascript">
            alert("Password berhasil di ubah");
            document.location = "profil.php";
        </script> 
        

        <?php
          
            }
            
        } else{
            ?>
            <script type="text/javascript">
                alert("Password yang anda masukkan salah!");
                document.location = "profil.php";
            </script>
            <?php
        }

        
    }
?>    
       