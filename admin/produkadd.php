<a href="<?php  echo "?p=produk"; ?>"><button type="button" class="btn btn-add">PRODUK</button></a>
<button type="button" class="btn btn-dis">Tambah Produk</button>
<br>
<div class="card">
<div class="kepalacard">Tambah Produk</div>
<div class="isicard" style="text-align:center;">
<form name="form1" method="post" action="" enctype="multipart/form-data">
	<?php
	$sqlk = mysqli_query($kon, "select * from kategori order by namakat asc");
	echo "<select name='idkat'>";
	echo "<option value=''>Kategori</option>";
	while($rk = mysqli_fetch_array($sqlk)){
		echo "<option value='$rk[idcat]'>$rk[namakat]</option>";
		}
		echo "</select>";
		?>
		<br>
	<input name="nama" type="text" id="nama" placeholder="Nama Produk" />
	<input name="harga" type="text" id="harga" placeholder="Harga produk (dalam Rp.)">
	  <input name="stok" type="text" id="stok" placeholder="Stok Produk">
	  <textarea name="spesifikasi" id="spesifikasi" placeholder="Spesifikasi Produk"></textarea>
	  <textarea name="detail" id="detail" placeholder="Detail Produk"></textarea>
	  <input name="diskon" type="text" id="diskon" placeholder="Diskon produk (dalam %)">
	  <input name="berat" type="text" id="berat" placeholder="Berat Produk (dalam Kg)">
	  <textarea name="isikotak" id="isikotak" placeholder="Isi Dalam Kotak Produk"></textarea>
	  <input name="foto1" type="file" id="foto1">
	  <input name="foto2" type="file" id="foto2">
      <input name="simpan" type="submit" id="simpan" value="SIMPAN PRODUK">
</form>



<?php
if($_POST["simpan"]){
	
	if(isset($_POST["idkat"]) and isset($_POST["nama"]) 
	and isset($_POST["harga"]) and isset($_POST["stok"]) 
	and isset($_POST["spesifikasi"]) and isset($_POST["detail"]) and isset($_POST["berat"]) and isset($_POST["isikotak"])){


		$ekstensi_diperbolehkan	= array('png','jpg');
		$gambar = $_FILES['foto1']['name'];
		$x = explode('.', $gambar);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['foto1']['tmp_name'];

	$nmfoto1 = $_FILES["foto1"]["name"];
	$lokfoto1 = $_FILES["foto1"]["tmp_name"];
	if(!empty($lokfoto1)){
		move_uploaded_file($file_tmp, "../fotoproduk/$gambar");
		}
		
	$nmfoto2 = $_FILES["foto2"]["name"];
	$lokfoto2 = $_FILES["foto2"]["tmp_name"];
	if(!empty($lokfoto2)){
		move_uploaded_file($lokfoto2, "../fotoproduk/$nmfoto2");
		}
		
		$spek    = nl2br($_POST["spesifikasi"]);
		$detail  = nl2br($_POST["detail"]);
		$isi     = nl2br($_POST["isikotak"]);
	
		
		$sqlp = mysqli_query($kon , "INSERT INTO `produk` (`idkat`, `idadmin`, `nama`, `harga`, `stok`, `spesifikasi`, `detail`, `diskon`, `berat`, `isikotak`, `foto1`, `foto2`, `tglproduk`) VALUES ('$_POST[idkat]', '$_SESSION[idadmin]', '$_POST[nama]','$_POST[harga]', '$_POST[stok]', '$spek', '$detail', '$_POST[diskon]', '$_POST[berat]', '$isi', '$nmfoto1', '$nmfoto2', now())");
		
		if($sqlp){
			echo "Produk Berhasil Disimpan";
		}else{
			echo "Gagal Menyimpan";
		}
		echo "<META HTTP-EQUIV='Refresh' Content='1'; URL=?p=produk'>";
		}else{
		echo "Data harus diisi dengan lengkap!!!";
		}
	}
?>