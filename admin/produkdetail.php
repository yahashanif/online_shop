<button type="button" class="btn btn-dis">PRODUK</button> &raquo;
<a href="<?php echo ""; ?>"><button type="button" class="btn btn-add">Produk Detail</button></a>
<br>
<?php
$sqlp = mysqli_query($kon, "select * from produk where idproduk='$_GET[id]'");
$rp = mysqli_fetch_array($sqlp);
	$sqlk = mysqli_query($kon, "select * from kategori where idkat='$rp[idkat]'");
	$rk = mysqli_fetch_array($sqlk);
	$hrg = number_format($rp["harga"]);
	if($rp["stok"] > 0){
		$stok = "<font color='#00CC00'>Stok Tersedia</font>";
	}else{
		$stok = "<font color='#FF0000'>Stok Habis</font>";
	}
	
	if($rp["diskon"] >0){
	$disk = ($rp["diskon"] * ["harga"]) / 100;
	$hrgbaru = $rp["harga"] - $disk;
	$hrgbr = number_format($hrgbaru);
	$diskon = "<font color='FF0000> -$rp[diskon]%</font>";
	$hrglama = "<font style='text-decoration:line-through'><small>IDR $hrg</small></font>";
	}else{
	$hrgbr = "";
	$diskon = "";
	$hrglama = "<b>$hrg</b>";
	}
	
	echo "<div class='dh12'>";
	echo "<div class='card'>";
	echo "<div class='kepalacard'><small>Kategori :</small> $rk[namakat]</div>";
	echo "<div class='isicard' style='text-align:center;'>";
	echo "<br>";
	echo "<img src='../fotoproduk/$rp[foto1]' border='1' width='100px'>
		  <img src='../fotoproduk/$rp[foto2]' border='1' width='100px'>
		  <hr>
		  <big>$rp[nama]</big>
		  <hr>
		  <b>IDR $hrgbr</b> $diskon $hrglama
		  <hr>
		  <b>$stok</b>
		  <hr>
		  <b>Berat : $rp[berat] Kg</b>
		  <hr>
		  <b>Spesifikasi</b> <br> $rp[spesifikasi]
		  <hr>
		  <b>Detail Produk</b> <br>$rp[detail]
		  <hr>
		  <b>Isi dalam Kotak</b> <br>$rp[isikotak]
		  <hr>
		  <small><i>Dibuat pada $rp[tglproduk] WIB
		  <br>oleh $ra[namalengkap]</i></small>";
	echo "</div>";
	echo "<div class='kakicard'>";
	echo "<br><a href='?p=produkedit&id=$rp[idproduk]'><button type='button' class='btn btn-add'>Ubah Produk</button></a>
	<a href='?p=produkdel&id=$rp[idproduk]'><button type='button' class='btn btn-add'>Hapus Produk</button></a>";
	echo "</div>";
	echo "</div><br>";
	echo "<div>";
?>
	