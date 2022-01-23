<div class="container5">
	<div class="grid">
	<div class="dh12">
<?php
$batas = 4;
$halaman = $_GET["pg"];
if(empty($halaman)){
	$posisi = 0;
	$halaman = 1;
}else{
	$posisi = ($halaman - 1) * $batas;
}

if(!empty($_GET["idk"])){
	$q = " where idkat='$_GET[idk]'";
	$l = "";
}else if($_POST["cari"]){
	$q = "where nama like '%$_POST[cari]%'";
	$l = "";
	}else{
	$q = "";
	$l = " limit $posisi, $batas";
	}
	
$sqlk = mysqli_query($kon, "select * from kategori $q");
$rk = mysqli_fetch_array($sqlk);
if(!empty($_GET["idk"])){
	$kat = "Kategori : <b>$rk[namakat]</b>";
}else{
	$kat = "Produk Terbaru";
}
echo "<h2>$kat</h2>";
	
$sqlp = mysqli_query($kon, "select * from produk $q order by tglproduk desc $l");
while($rp = mysqli_fetch_array($sqlp)){
	$sqlk = mysqli_query($kon, "select * from kategori where idkat='$rp[idkat]'");
	$rk = mysqli_fetch_array($sqlk);
	$hrg = number_format($rp["harga"]);
	$nm = substr($rp["nama"], 0, 25);
	if($rp["stok"] > 0){
		$stok = "<font color='#00CC00'>Stok Tersedia</font>";
	}else{
		$stok = "<font color='#FF0000'>Stok Habis</font>";
	}
	
	if($rp["diskon"] > 0){
	$disk = ($rp["diskon"] * $rp["harga"]) / 100;
	$hrgbaru = $rp["harga"] - $disk;
	$hrgbr = number_format($hrgbaru);
	$diskon = "<font color='#FF0000'> -$rp[diskon]%</font>";
	$hrglama = "<font style='text-decoration:line-through'><small>IDR $hrg</small></font>";
		}else{
			$hrgbr = "";
			$diskon = "";
			$hrglama = "<b>$hrg</b>";
		}
		
		echo "<div class='dh3'>";
		echo "<div class='card'>";
		echo "<div class='isicard' style='text-align:center;'>";
		echo "<br>";
		echo "<img src='fotoproduk/$rp[foto1]' border='1' width='100px'>
			  <img src='fotoproduk/$rp[foto2]' border='1' width='100px'>
			  <hr>
			  <big>$nm...</big>
			  <hr>
			  <b>IDR $hrgbr</b> $diskon $hrglama
			  <hr>
			  <b>$stok</b>
			  <hr>
			  <small><i>Dibuat pada $rp[tglproduk] WIB</i></small>";
		echo "</div>";
		echo "<div class='kakicard'>";
		echo "<br><a href='?=produkdetail$idp=$rp[idproduk]'><button type='button' class='btn btn-add'>Lihat Detail</button></a>
				<a href='?p=keranjang$idp=$rp[idproduk]&idag=$rag[idanggota]'><button type='button' class='btn btn-add'>Beli Sekarang</button></a>";
				
		echo "</div>";
		echo "</div><br>";
		echo "</div>";
		}
		
		echo "<div class='dh12' align='right'>";
		echo "Halaman ";
		$sqlhal = mysqli_query($kon, "select * from produk");
		$jmldata = mysqli_num_rows($sqlhal);
		$jmlhal = ceil($jmldata / $batas);
		
		for($i=1; $i<=$jmlhal; $i++){
			if($i == $halaman){
			echo "<span class='kotak'><b>$i</b></span>";
			}
		}
		
	if($halaman > 1){
		$prev = $halaman - 1;
		echo "<span class='kotak'><a href='?p=produk&pg=$prev'>&laquo; Prev</a></span>";
		}else{
			echo "<span class='kotak'>&laquo; Prev</span>";
		}
		
		if($halaman < $jmlhal){
			$next = $halaman + 1;
			echo "<span class='kotak'<a href='?p=produk&pg=$next' >Next &raquo;</a></span>";
		}else{
			echo "<span class='kotak'>Next &raquo;</span>";
		}
		
		echo " Total Produk <span class='kotak'><b>$jmldata</b></span>";
		echo "<p></div>";
		?>
				</div>
			</div>
		</div>