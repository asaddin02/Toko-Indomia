<?php
 $koneksi = mysqli_connect('localhost','root','','indomia');

 $kode_barang = $_POST['pkb'];

 $query_pkb = mysqli_query($koneksi,'SELECT * FROM barang WHERE kode_barang = "'.$kode_barang.'"');
 $data_pkb = mysqli_fetch_array($query_pkb);
 $harga = $data_pkb['harga'];

?>

					<label for="Harga" class="col-sm-2 col-form-label col-form-label-sm">Harga</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control form-control-sm" id="harga" name="harga" value="<?php echo $harga; ?>" readonly>
                    </div>