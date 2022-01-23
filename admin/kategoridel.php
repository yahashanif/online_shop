<?php
$sqlk = mysqli_query($kon, "delete from kategori where idcat='$_GET[id]'");

if($sqlk){
	echo "Kategori Berhasil Dihapus";
}else{
	echo "Gagal Menghapus";
}
echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=kategori'>";
?>