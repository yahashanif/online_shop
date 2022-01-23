<a href="<?php echo "?p=order&st=Semua"; ?>"<button type="button" class="btn btn-add">TRANSAKSI SEMUA</button></a>
<br>
<br>
<br>
<a href="<?php echo "?p=order&st=Baru"; ?>"<button type="button" class="btn btn-add">Baru</button></a>
<a href="<?php echo "?p=order&st=Lunas"; ?>"<button type="button" class="btn btn-add">Lunas</button></a>
<a href="<?php echo "?p=order&st=Dikirim"; ?>"<button type="button" class="btn btn-add">Dikirim</button></a>
<a href="<?php echo "?p=order&st=Diterima"; ?>"<button type="button" class="btn btn-add">Diterima</button></a>
<br>
<?php 
$batas = 4;
$halaman = $_GET["pg"];
if(empty($halaman)){
	$posisi = 0;
	$halaman = 1;
}else{
	$posisi =($halaman - 1) * $batas;
}

if($_GET["st"] == "semua"){
	$status = "";
}else{
	$status = "where statusorder='$_GET[st]'";
}


$sqlo = mysqli_query($kon, "select * from orders $status order by tglorder desc");
$no = 1;
while($ro=mysqli_fetch_array($sqlo)){

	$sqlod = mysqli_query($kon, "select * from orders where idorder='$ro[idorder]'");
	$rod = mysqli_fetch_array($sqlod);
	$sqlag = mysqli_query($kon, "select * from anggota where idanggota='$rod[idanggota]'");
	$rag = mysqli_fetch_array($sqlag);
	
	echo "<div class='dh12'>";
	echo "<div class='card'>";
	echo "<div class='kepalacard'>";
	echo "#$ro[noorder]";
	echo "</div>";
	echo "<div class='isicard'>";
	echo "<br>Dipesan Oleh : <b>$rag[nama]</b><br>";
	echo "<br>";
	echo "Handphone &nbsp; &nbsp; <b>$rag[nohp]</b><br>";
	echo "<br>";
	echo "Alamat Email : <b>$rag[email]</b><br>";
	echo "<br>";
	echo "Dipesan Pada : <b>$ro[tglorder] WIB</b><br>";
	echo "<br>";
	echo "Dikirim ke : <b>$ro[alamatkirim]</b><br>";
	echo "<br>";
	
	echo "<tabel order='0' cellpadding='3px'>";
	$sqlordt = mysqli_query($kon, "select * from orderdetail where idorder='$ro[idorder]'");
	while($rordt = mysqli_fetch_array($sqlordt)){
	$sqlpr = mysqli_query($kon, "select * from produk where idproduk='$rordt[idproduk]'");
	$rpr = mysqli_fetch_array($sqlpr);
	$sqlj = mysqli_query($kon, "select * from jasakirim where idjasa='$rordt[idjasa]'");
	$rj = mysqli_fetch_array($sqlj);
	
	$hrg = number_format($rpr["harga"]);
	$disk = ($rpr["harga"] * $rpr["diskon"]) /100;
	$hargabaru = $rpr["harga"] - $disk;
	$hrgbr = number_format($hargabaru);
	$brt = $rordt["jumlahbeli"] * $rpr["berat"];
	$berat = $berat + $brt;
	
	if($rp["diskon"] > 0){
	$diskon = "<font color='red'>-$rp[diskon]%</font>";
	$hargalama = "<font style='text-decoderation:line-through'>IDR $hrg</font>";
	}else{
	$diskon = "";
	$hargalama = "";
	}
	
	echo "<tr valign='top'>
	<td width='50px'><img src='../fotoproduk/$rpr[foto1]' height='50px'></td>		
	<br>			
	<td><b>$rpr[nama]</b>
	<br>$rordt[jumlahbeli] * IDR $hrgbr
	<br>$brt Kg * $rj[tarif] (<b>$rj[nama]</b>)</td>
	</tr>";
	}
	echo "</table>";
	
	$sqlbyr = mysqli_query($kon, "select * from pembayaran where idorder='$ro[idorder]'");
	$rbyr = mysqli_fetch_array($sqlbyr);
	$rowbyr = mysqli_num_rows($sqlbyr);
	$jmltrs = number_format($rbyr["jumlahtransfer"]);
	
	if($rowbyr > 0){
	echo "<table width='100%' border='0'>";
	echo "<tr>";
	echo "<td width='100px'><a href='../buktibayar/$rbyr[bukti]' target='_blank'><img src='../fotobayar/$rbyr[bukti]' width='100px></a></td>";
	echo "<td>Ditransfer Oleh : <br><b><br>$rbyr[namapengirim]</b><br>
	dari <b>$rbyr[namabankpengirim]</b><br>
	ke <b>$rbyr[namabankpenerima]</b><br>
	pada <b>$rbyr[tgltransfer]</b><br>
	sebesar <br><big><b>IDR $jmltrs</b></big></td>";
	echo "</tr>";
	echo "</table>";
	}
	
	echo "<form method='post' action='?p=orderstatus' enctype='multipart/form-data'>";
	echo "<input type='hidden' name='idorder' value='$ro[idorder]'>";
	echo "<input type='hidden' name='st' value='$_GET[st]'>";
	echo "<br>";
	
	?>

	<select name='statusorder'>";
	<option value='Baru' <?php if($ro["statusorder"] == "Baru"){ echo "Selected";} ?>>Baru</option>
	<option value='Lunas' <?php if($ro["statusorder"] == "Lunas"){ echo "Selected";} ?>>Lunas</option>
	<option value='Dikirim' <?php if($ro["statusorder"] == "Dikirim"){ echo "Selected";} ?>>Dikirim</option>
	<option value='Diterima' <?php if($ro["statusorder"] == "Diterima"){ echo "Selected";} ?>>Diterima</option>
	</select>
	<?php
	echo "<br>";
	echo "<br>";
	echo "<input type='submit' value='Ubah Status Pesanan'>";
	echo "</form><br>";
	$total = number_format($ro["total"]);
	echo "</div>";
	echo "<div class='kepalacard'>Total : IDR $total</div>";
	echo "</div><br>";
	echo "</div>";
	}
	
	echo "<div class='dh12' align='right'>";
	echo "Halaman ";
	
	$sqlhal = mysqli_query($kon, "select * from order $status");
	$jmldata = mysqli_num_rows($sqlhal);
	$jmlhal = ceil($jmldata / $batas);
	
	for($i=1; $i<=$jmlhal; $i++){
		if($i == $halaman){
	echo "<span class='kotak'><b>$i</b></span>";
	}
}

if($halaman > 1){
	$prev = $halaman - 1;
	echo "<span class='kotak'><a href='?p=order&pg=$prev&st=$_GET[st]'Next &laquo;</a></span>";
	}else{
	echo "<span class='kotak'>&laquo; Prev</span>";
	}
	
if($halaman < $jmlhal){
	$next = $halaman + 1;
	echo "<span class='kotak'><a href='?p=order&pg=$next&st=$_GET[st]'>Next &raquo;</a></span>";
	}else{
	echo "<span class='kotak'>Next &raquo;</span>";
}

echo "Transaksi $_GET[st] <span class='kotak'><b>$jmldata</b></span>";
echo "<p></div>";
echo "<p>&nbsp;</p>";
?>
	
	
	