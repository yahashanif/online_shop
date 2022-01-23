<?php
	mysqli_query($kon, "delete from cart where idanggota='$_SESSION[idanggota]'");
	echo  "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=keranjangbelanja&idag=$_SESSION[idanggota]'>";
?>