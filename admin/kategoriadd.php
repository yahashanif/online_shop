<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	color: #009999;
}
-->
</style>
<a href="<?php echo "?p=kategori"; ?>"><button type="button" class="btn btn-add">KATEGORI</button></a>
<button type="button" class="btn btn-dis">Tambah Kategori</button>
<br>
<div class="card">
<div class="kapalacard style1"><strong><em>Tambah Kategori</em></strong></div>
<div class="isicard" style="text-align:center;">
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <input name="namakat" type="text" id="namakat" placeholder="Nama Kategori">
  <textarea name="ketkat" id="ketkat" placeholder="Keterangan Kategori"></textarea>
  <br>
  <br>
  <input name="simpan" type="submit" id="simpan" value="SIMPAN KATEGORI">
</form>

<?php
if($_POST["simpan"]){
	if(!empty($_POST["namakat"]) and !empty($_POST["ketkat"])){
		$sqlk = mysqli_query($kon, "insert into kategori (idadmin, namakat, ketkat, tglkat) values ('$ra[idadmin]', '$_POST[namakat]', '$_POST[ketkat]', NOW())");
	
	if($sqlk){
		echo "kategori Berhasil Disimpan";
		}else{
		echo "Gagal Menyimpan";
		}
		echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=kategori'>";
		}else{
		echo "Isi Data dengan lengkap";
		}
	}
?>
</div>
</div>