<?php
$sqlo = mysqli_query($kon, "UPDATE `orders` SET
`statusorder` = '$_POST[statusorder]'
WHERE `idorder` = '$_POST[idorder]'");

if($sqlo){
	echo "Status order sudah berhasil diubah";
	}else{
	echo "Gagal merubah status order";
}
echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=order&st=$_POST[statusorder]'>";

?>