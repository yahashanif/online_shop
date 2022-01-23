<?php
$sqlp= mysqli_query($kon, "select * from produk where idproduk='$_GET[produkedit]'");
$rp = mysqli_fetch_array($sqlp);
?>
<a href="<?php echo ""; ?>"><button type="button" class="btn btn-add">PRODUK</button></a>
<button type="button" class="btn btn-dis">Ubah Produk</button>
<br />
<div class="card">
<div class="kepalacard">Ubah Produk</div>
<div class="isicard" style="text-align:center;">
<form name="idproduk" method="post" action="" enctype="multipart/form-data">
	<input name="idproduk" type="hidden" value="<?php echo "$rp[idproduk]"; ?>"/>
<?php 
 $sqlk = mysqli_query($kon, "select * from kategori where idcat='$rp[idkat]'");
 $rk = mysqli_fetch_array($sqlk);
 ?>
 <input name="namakat" type="text" disabled value="<?php echo "$rk[namakat]"; ?>"/>
 <input name="nama" type="text" id="nama" placeholder="Nama Produk" value="<?php echo "$rp[nama]"; ?>">
 <input name="harga" type="text" id="harga" placeholder="Harga Produk(dalam Rp.)" value="<?php echo "$rp[harga]"; ?>">
 <input name="stok" type="text" id="stok" placeholder="Stok Produk" value="<?php echo "$rp[stok]"; ?>">
 <textarea name="spesifikasi" id="spesifikasi" placeholder="Spesifikasi Produk"><?php echo "$rp[spesifikasi]"; ?>"</textarea>
 <textarea name="detail" id="detail" placeholder="Detail Produk"><?php echo "$rp[detail]"; ?></textarea>
 <input name="diskon" type="text" id="diskon" placeholder="Diskon Produk(dalam %)" value="<?php echo "$rp[diskon]"; ?>">
 <input name="berat" type="text" id="berat" placeholder="Berat Produk (dalam Kg)" value="<?php echo "$rp[berat]"; ?>">
 <textarea name="isikotak" id="isikotak" placeholder="Isi dalam kotak Produk"><?php echo "$rp[isikotak]"; ?></textarea>
 <p><img src="<?php echo "../fotoproduk/$rp[foto1]"; ?>" height="200px">
 <input name="foto1" type="file" id="foto1" >

 <p><img src="<?php echo "../fotoproduk/$rp[foto2]"; ?>" height="200px">
 <input name="foto2" type="file" id="foto2" >
 <br><br>
 <input name="simpan" type="submit" id="simpan" value="SIMPAN PRODUK">
 </form>

 
 <?php
if($_POST["simpan"]){
	
	if(isset($_POST["nama"]) 
	and isset($_POST["harga"]) and isset($_POST["stok"]) 
	and isset($_POST["spesifikasi"]) and isset($_POST["detail"]) and isset($_POST["berat"]) and isset($_POST["isikotak"])){


		$ekstensi_diperbolehkan	= array('png','jpg');
		$gambar = $_FILES['foto1']['name'];
		$x = explode('.', $gambar);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['foto1']['tmp_name'];

	if(isset($_POST['foto1']) && isset($_POST['foto2'])){
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
	
		
		$sqlp = mysqli_query($kon , "UPDATE `produk` SET
		
		`nama` = '$_POST[nama]',
		`harga` = '$_POST[harga]',
		`stok` = '$_POST[stok]',
		`spesifikasi` = '$_POST[spesifikasi]',
		`detail` = '$_POST[detail]',
		`diskon` = '$_POST[diskon]',
		`berat` = '$_POST[berat]',
		`isikotak` = '$_POST[isikotak]',
		`foto1` = '$foto1',
		`foto2` = '$foto2'
		WHERE `idproduk` = '$_GET[produkedit]';");
		
	}else{
		$sqlp = mysqli_query($kon , "UPDATE `produk` SET
		
		`nama` = '$_POST[nama]',
		`harga` = '$_POST[harga]',
		`stok` = '$_POST[stok]',
		`spesifikasi` = '$_POST[spesifikasi]',
		`detail` = '$_POST[detail]',
		`diskon` = '$_POST[diskon]',
		`berat` = '$_POST[berat]',
		`isikotak` = '$_POST[isikotak]'
	
		WHERE `idproduk` = '$_GET[produkedit]';");
	}

		if($sqlp){
			echo "Produk Berhasil Disimpan";
		}else{
			echo "Gagal Menyimpan";
		}
		echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=produk'>";
		}else{
		echo "Data harus diisi dengan lengkap!!!";
		}
	}
?>

