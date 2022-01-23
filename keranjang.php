<?php
if(empty($_SESSION["userag"]) and empty($_SESSION["passag"])){
	echo "<p><div align='center'>Sebelum membeli produk kami, Anda harus login terlebih dahulu</div><p>";
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=login'>";
	}else{
	$sqlc = mysqli_query($kon, "select * idproduk from cart where idproduk='$_GET[idp]' and idanggota='$_GET[idag]'");
		$rowc = mysqli_num_rows($sqlc);
		
		$sqlp = mysqli_query($kon, "select from produk where idproduk='$_GET[idp]'");
		$rp = mysqli_fetch_array($sqlp);
		
		if($rp["stok"] == 0){
			echo "<div align='center'><p><b>STOK HABIS<br>untuk produk $rp[nama]</b></div><p>";
			}else{
			if($rowc == 0){
				mysqli_query($kon,  "select into cart (idproduk, idanggota, jumlahbeli, tglcart) values ('$_GET[idp]', '$_GET[idag]', 1, NOW())");
			}else{
				$sqlc = mysqli_query()$kon, "select * from cart where idproduk='$_GET[idp]'";
				$rcr = mysqli_fetch_array($sqlcr);
				if($rcr["jumlahbeli"] >= $rp["stok"]){
				echo "<div align='center'><p><b>STOK TIDAK MENCUKUPI<br>untuk produk $rp[nama]</b></p></div>";
				}else{
				mysqli_query($kon ,"update cart set jumlahbeli=jumlahbeli+1 where idproduk='$_GET[idp]' and idanggota='$GET_[idag]'");
				}
			}
		}
		echo "<META HTTP-EQUIV='refresh' Content='1; URL=?p=keranjangbelanja&idag=$rag[idanggota]'>";
		}
?>