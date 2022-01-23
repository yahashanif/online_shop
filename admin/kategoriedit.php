<?php
$sqlk = mysqli_query($kon, "select * from kategori where idcat='$_GET[id]'");
$rk = mysqli_fetch_array($sqlk);
?>
<a href="<?php echo "?p=kategori"; ?>"><button type="button" class="btn
btn-add">KATEGORI</button></a>
<button type="button" class="btn btn-dis">Ubah Kategori</button>
<br>
<div class="card">
<div class="kepalacard">Ubah Kategori</div>
<div class="isicard" style="text-align:center;">
<form name="form1" method="post" action="" enctype="multipart/form-data">
	<input type="hidden" name="idkat" value="<?php echo "$rk[idcat]"; ?>" />
	<input name="namakat" type="text" id="namakat" placeholder="Nama Kategori"
value="<?php echo "$rk[namakat]"; ?>">
	<textarea name="ketkat" id="ketkat" placeholder="keterangan kategori"><?php
	echo "$rk[ketkat]"; ?></textarea>
	<br>
	<br>
	<input name="simpan" type="submit" id="simpan" value="SIMPAN KATEGORI">
	</form>
	
	<?php
	if($_POST["simpan"]){
		if(!empty($_POST["namakat"]) and !empty($_POST["ketkat"])){
		$sqlk = mysqli_query($kon, "update kategori set namakat='$_POST[namakat]', ketkat='$_POST[ketkat]' where idcat='$_GET[id]'");
		
		if($sqlk){
		echo "Kategori Berhasil Disimpan";
		header("location: ?p=kategori");
		}else{
		echo "Gagal Menyimpan";
		}
		}else{
		echo "Isi Data dengan Lengkap";
		}
	}
	?>
	</div>
	</div>
	