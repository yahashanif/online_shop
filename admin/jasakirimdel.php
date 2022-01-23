<?php
$sqlj = mysqli_query($kon, "delete from jasakirim where idjasa='$_GET[idj]'");

if($sqlj){
	echo "Jasa Pengiriman Berhasil Dihapus";
}else{
	echo "Gagal Menghapus";
	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=jasakirim'>";
?>