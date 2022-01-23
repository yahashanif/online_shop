<button type="button" class="btn btn-dis">KATEGORI</button> &raquo;
<a href="<?php echo "?p=kategoriadd"; ?>"><button type="button" class="btn btn-add">Tambah Kategori</button></a>
<br>
<?php
$sqlk = mysqli_query($kon, "select * from kategori order by namakat asc");
while($rk = mysqli_fetch_array($sqlk)){
$sqlp = mysqli_query($kon, "select * from produk where idcat='$rk[idcat]'");
	$rowp = mysqli_num_rows($sqlp);
	echo "<div class='dh3'>";
	echo "<div class='card'>";
	echo "<div class='isicard'>";
	echo "<br>";
	echo "<hr><big>$rk[namakat]</big> <div class='badge'>$rowp</div>
		  <hr>$rk[ketkat]
		  <hr><small><i>Dibuat pada $rk[tglkat] WIB
		  <br>Oleh $ra[namalengkap]</i></small>";
	echo "</div>";
	echo "<div class='kakicard'>";
	echo "<br><a href='?p=kategoriedit&id=$rk[idcat]'><button type='button'
class='btn btn-add'>Ubah Kategori</button></a> ";
	echo "<a href='?p=kategoridel&id=$rk[idcat]'><button type='button'
class='btn btn-add'>Hapus Kategori</button></a>";
	echo "</div>";
	echo "</div><br>";
	echo "</div>";
}
?>