<div class="container5">
	<div class="grid">
	<?php
	echo "<p>&nbsp;</p>";
	echo "<h2>Keranjang Belanja Anda</h2>";
	$sqlc =  mysqli_query($kon, "select * from cart where idanggota='$rag[idanggota]'");
	$rowc = mysqli_num_rows(sqlc);
	if($rowc > 0){
	echo "<form action='?p=keranjangedit' method='post' enctype='multipart/form-data'>";
	echo "<input type='hidden' name='idag' value='$rag[idanggota]'>";
	$no = 1;
	while($rc = mysqli_fetch_array($sqlc)){
		$sqlp = mysqli_query($kon, "select *from produk where idproduk='$rc[idproduk]'");
		$rp = mysqli_fetch_array($sqlp);
		$nm = substr($rp["nama"], 0, 30);
		$hrg = number_format($rp["harga"]);
		$disk = ($rp["harga"] * $rp["diskon"]) / 100;
		$hargabaru = $rp["harga"] - $disk;
		$hrgbr = number_format($hargabaru);
		$subtotal = $hargabaru * $rc["jumlahbeli"];
		$total = $total + $subtotal;
		$st = number_format($subtotal);
		$t = number_format($total);
		$brt = $rc["jumlahbeli"] * $rp["berat"];
		$berat = $berat + $brt;
		
		if($rp["stok"] > 0){
			$stok = "<font color="#006600">Stok Tersedia</font>";
		}else{
			$stok = "<font color="#FF0000">Stok Habis</font>";
		}
		
		if($rp["diskon"] > 0){
			$diskon = "<font color="#FF0000">-$rp[diskon]%</font>";
			$hargalama = "<font style='text-decoration:line-through'>IDR $hrg</font>";
		}else{
		$diskon = "";
		$hargalama = "";
		}
		
		if(!empty($rp["foto1"])){
			$foto1 = "fotoproduk/$rp[foto1]";
		}else{
			$foto1 = "fotoproduk/avatar.png";
		}
		
		echo "<div class='dh6'>";
		echo "<div class='card'>":
		echo "<div class='isicard'>
		echo "<table width='100%' border='0' cellpadding='5' cellspacing='5'>";
		echo "<tr valign='top'>";
		echo "<td width='100px'>
					<img src='$foto1' width='100px'>
				</td>";
		echo "<td>
					<big>$nm...</big>
					<input type='hidden' name='id[$no]' value='$rc[idcart]'><p>
					$diskon $hargalama<br>
					<big>IDR $hrgbr * <span class='jmlbeli'><input type='text' name='jml[$no]' value='$rc[jumlahbeli]' size='5' style='text-align:center'></span> Unit</big>
					</td>";
		echo "</tr>";
		echo "</table>";
		echo "</div>";
		echo "<div class='kepalacard'>";
		echo "Subtotal : IDR $st";
		echo "<a href='?p=keranjangdel&idc=$rc[idcart]&idag=$rag[idanggota]'><button type='button' class='btn-x'></button></a>";
		echo "</div>";
		echo "</div>";
		echo "<br>";
		echo "</div>";
		$no++;
	}
	echo "<div class='dh12'>";
	echo "<div class='kepalacard'>";
	echo "Berat : $berat Kg";
	echo "</div><br>";
	echo "<div class='kepalacard'>";
	echo "Total : IDR $t";
	echo "</div>";
	echo "</div>";
	echo "<div class='dh12'>";
	echo "<div align='center'>";
	echo "<a href="?p=produkterbaru'><button type='button' class='btn btn-add'>&laquo; Lanjut Belanja</button></a> ";
	echo "<input type='submit' value='Edit Keranjang' class='btn btn-add'> ";
	echo "<a href='?p=selesaibelanja'><button type='button' class='btn btn-add'>Selesai Belanja &raquo;</button></a>";
	echo "</div>":
	echo "</form><p>";
	}else{
	echo "<p><div align='center'><b>Keranjang Belanja Anda Masih Kosong</b></div><p>";
	echo "<META HTTP-EQUIV='Refresh' Content='2; URL=?p=produkterbaru'>";
	}
	?>	
	</div>
</div>
	
		
		
		
		