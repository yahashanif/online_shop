<?php
$sqlp = mysqli_query($kon, "delete from produk where idproduk='$_GET[produkdel]'");
if($sqlp){
	echo "Produk Berhasil Dihapus";
}else{
	echo "Gagal Menghapus";
	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=produk'>";
	?>