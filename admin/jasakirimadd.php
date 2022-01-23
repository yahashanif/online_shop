<a href="<?php echo "?p=jasakirim"; ?>"><button type="button" class="btn btn-add">JASA PENGIRIMAN</button></a>
<button type="button" class="btn btn-dis">Tambah Jasa Pengiriman</button>
<div class="card">
<div class="kepalacard">Tambah Jasa Pengiriman</div>
<div class="isicard" style="text-align:center;">
<form name="form1" method="post" action="" enctype="multipart/form-data">
    <input name="nama" type="text" id="nama" placeholder="Nama Jasa Pengiriman">
    <textarea name="detail" id="detail" placeholder="Detail Jasa Pengiriman"></textarea>
    <input name="tarif" type="text" id="tarif" placeholder="Tarif Jasa Pengiriman">
    <input name="logo" type="file" id="logo">
    <input name="simpan" type="submit" id="simpan" value="SIMPAN JASA PENGIRIMAN">
 </form>
  
<?php 
if($_POST["simpan"]){
	if(!empty($_POST["nama"]) and !empty($_POST["tarif"]) and !empty($_POST["detail"])){
	$nmlogo  = $_FILES["logo"]["name"];
	$lokfoto = $_FILES["logo"]["tmp_name"];
	if(!empty($loklogo)){
		move_uploaded_file($loklogo, "../logojasa/$nmlogo");
		}
		
		$detail = nl2br($_POST["detail"]);
		
		$sqlj = mysqli_query($kon, "insert into jasakirim (idadmin, nama, detail, logo, tarif) values ('$ra[idadmin]', '$_POST[nama]', '$detail', '$nmlogo', '$_POST[tarif]')");
		
		if($sqlj){
			echo "Jasa Pengiriman Berhasil Disimpan";
		}else{
			echo "Gagal Menyimpan";
		}
		echo "<META HTTP-EQUIV='Refresh Content='1; URL=?p=jasakirim'>";
		}else{
		echo "Data harus diisi dengan lengkap!!!";
	}
}
?>
