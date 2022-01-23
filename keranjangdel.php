<?php
	mysqli_query($kon, "delete from cart where idcart='$_GET[idc]'");
	echo  "<META HTTP-EQUIV='Refresh' Content='1'; URL=?p=keranjangbelanja&idag=$_GET[idag]'>";
?>