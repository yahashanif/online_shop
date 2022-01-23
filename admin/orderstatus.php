<?php
$sqlo = mysqli_query($kon, "update order set statusorder='$_POST[statusorder]' where idorder='$_POST[idorder]'");

if($sqlo){
	echo "Status order sudah berhasil diubah";
	}else{
	echo "Gagal merubah status order";
}

echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=order&st=$_POST[st]'>";
?>