<?php
	session_start();
	include "koneksi.php";

	$sqlag = mysqli_query($kon, "select * from anggota where nama='$_SESSION[userag]' and password='$_SESSION[passag]'");
	$ragn = mysqli_fetch_array($sqlag);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="style.css"
<title>SND Online Shop</title>
</head>

<body>

<div class="container1">
	<div class="grid">
		<div class="dh12">
			Padang, Indonesia | 082173056084 | sales@sndonlineshop.com
		</div>
	</div>
</div>	

<?php
	include "menu.php";
?>
 
<div class="container3">
	<div class="grid">
		<div class="dh12">
			<form method="post" action="<?php echo "?p=produkterbaru"; ?>">
			<input name="cari" type="text" placeholder="Ketik Nama Produk Yang Akan Dicari" />
			<input type="submit" name="Submit" value="Cari" />
			</form>
			</div>
		</div>
	</div>	
			
<?php
if($_GET["p"] == "produkterbaru"){
	include "produkterbaru.php";
}else if($_GET["p"] == "produkdetail"){
	include "produkdetail.php";
}else if($_GET["p"] == "keranjang"){
	include "keranjang.php";
}else if($_GET["p"] == "keranjangbelanja"){
	include "keranjangbelanja.php";
}else if($_GET["p"] == "keranjangedit"){
	include "keranjangedit.php";
}else if($_GET["p"] == "keranjangdel"){
	include "keranjangdel.php";
}else if($_GET["p"] == "register"){
	include "register.php";
}else if($_GET["p"] == "login"){
	include "login.php";
}else if($_GET["p"] == "logout"){
	include "logout.php";
}else if($_GET['p'] == "riwayat"){
	include "riwayat.php";
}else if($_GET['p'] == "konfirmasi"){
	include "konfirmasi.php";
}else{
	include "home.php";
	include "produkterbaru.php";
}
?>

<div class="container6">
	<div class="grid">
		<div class="dh12">
		Copyright &copy; Sandy Mulyanda 2022
		</div>
	</div>
</div>

</body>
</html>
