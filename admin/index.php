<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="style.css" type="text/css" />
<title>Administrator sndonlineshop</title>
<style type="text/css">
.container1{
    background-color:#b39800;
    height:40px;
    width:100%;
    color:#FFFFFF;
    font-family:Cambria;
    font-size:20px;
    padding-left:20px;
    padding-top:20px;
    padding-bottom:10px;
    position:fixed;
    z-index:1;
}
.kepalacard{
    padding:10px;
    background-color:#b39800;
    color:#FFFFFF;
    font-family:Century Gothic;
    family-size:20px;
}
/* CSS Document */

body{
    font-family:Cambria;
    padding:0px;
    margin:0px;
    color:#b59a01;
    font-size:14px;
}

#signin{
    max-width:350px;
    margin:150px auto;
    position:relativ;
    display:block;
    background-color:#FFFFFF;
    box-shadow:0 0 5px #b39800;
    text-align:center;
}

#signin img{
    margin:-60px;
    margin-left:-50px;
    border-radius:50%;
}

#signin h3{
    text-align:center;
    color:#b39800;
    font-size:24px;
    padding-top:60px;
}

#signin p{
    text-align:center;
    color:#b39800;
    font-size:14px;
}

fieldset{
    margin:10px;
    border:none;
}

input[type="text"],
input[type="password"],
input[type="file"],
select,
textarea{
    width:90%;
    padding:0.8em;
    margin-top:1em;
    border:1px solid #b39800;
    background-color:#FFFFFF;
    font-family:Cambria;
    font-size:14px;
    color:#b39800;
    text-align:center;
    border-radius:5px;
}

input [type="submit"]{
    width:auto;
    margin-top:0.9em;
	color:#FFFFFF;
    background-color:#b39800;
    padding:0.8em;
    cursor:pointer;
    border:1px solid #b39800;
    font-family:Cambria;
    border-radius:5px;
    }

.grid{
    width:100%;
    padding-top:0px;
    padding-bottom:0px;
    overflow:hidden;
}

.dh1 {width:8.33%; }
.dh2 {width:16.66%; }
.dh3 {width:24.99%; }
.dh4 {width:33.33%; }
.dh5 {width:41.66%; }
.dh6 {width:49.99%; }
.dh7 {width:58.33%; }
.dh8 {width:66.66%; }
.dh9 {width:74.99%; }
.dh10 {width:83.33%; }
.dh11 {width:91.66%; }
.dh12 {width:99.99%; }

.dh1, .dh2, .dh3, .dh4, .dh5, .dh6, .dh7, .dh8, .dh9, .dh10, .dh11, .dh12{
    float:left;
    display:inline;
    margin:0 0%;
}

@media screen and (max-width:720px) {
  .dh1, .dh2, .dh3, .dh4, .dh5, .dh6, .dh7, .dh8, .dh9, .dh10, .dh11, .dh12{
    width:100%;
    margin-bottom:-lem;
    }
}

/*Bagian Menu*/
.sidenav{
    height:100%;
    width:0;
    position:fixed;
    z-index:1;
    top:0;
    left:0;
    background-color:#b39800;
    overflow-x:hidden;
    padding-top:60px;
    text-align:center;
}

.sidenav img{
    margin:0px;
    margin-left:0px;
    border-radius:50%;
    border:3px solid #FFFFFF;
}

.sidenav a{
    padding:4px 8px 4px 0px;
    text-decoration:none;
    font-size:18px;
    color:#FFFFFF;
    display:block;
    transition:0,3s;
}

.sidenav a:hover{
    color:#87C2C2;
}

.sidenav h3{
    text-align:center;
    color:#FFFFFF;
    font-size:20px;
    padding-top:-30px;    
}

.sidenav p{
    text-align:center;
    color:#FFFFFF;
    font-size:14px;
}

.sidenav .closebtn{
    position:absolute;
    top:0;
    right:25px;
    font-size:36px;
    margin-left:50px;
}

.sidenav hr{
    border:1px solid #CCCCCC;
    width:90%;
    text-align:center;
}

@media screen and (max-height:450px){
    .sidenav { padding-top:15px; }
    .sidenav a{ font-size:18px; }
}



.container1 a{ color:#FFFFFF; text-decoration:none; }
.container1 a:hover{ color:#87C2C2; }

.container2{
    background-color:#FFFFFF;
    margin-top:70px;
    padding:20px;
    font-family:Cambria;
    font-size:14px;
}

.container2 h2{
    font-family:Century Gothic;
    font-size:24px;
}

.container3{
    background-color:#b39800;
    height:20px;
    width:100%;
    color:#FFFFFF;
    font-family:Cambria;
    font-size:14px;
    padding-top:10px;
    padding-bottom:10px;
    text-align:center;
    margin-top:20px;
    margin-bottom:10px;
}

#boxvail{
    max-width:90%;
    height:100px;
    margin:0px auto;
    position:relative;
    display:block;
    background-color:#b39800;
    border-radius:5px;
}

#boxval p{
    float:left;
    color:#FFFFFF;
    font-size:15px;
    margin:35px;
    margin-left:30px;
    font-family:Century Gothic;
}

#boxval h3{
    float:right;
    color:#FFFFFF;
    font-size:50px;
    margin-top:20px;
    margin-right:30px;
    font-family:Arial;
}

/*link*/
a{ color:#b39800; text-decoration:none; }
a:hover{ color:#87C2C2; }

/*Tombol*/
.btn{
    padding:9px 9px;
    text-align:center;
    border:1px solid transparent;
    border-radius:4px;
    font-family:Cambria;
    font-size:14px;
    margin-top:10px;
    width:auto;
}

.btn-add{
    color:#FFFFFF;
    background-color:#b39800;
	cursor:pointer;
}

.btn-dis{
    color:#FFFFFF;
    background-color:#4E9A9A;
}

.btn-add:hover{
    color:#FFFFFF;
    background-color:#4E9A9A;
}

/* Tabel*/
table{
    width:100%;
    border-color:#CCCCCC;
}

th{
    text-align:center;
    padding:10px;
    background-color:#b39800;
    color:#FFFFFF;
    font-family:Cambria;
    font-size:14px;
}

td{
    padding:10px;
    background-color:#FFFFFF;
    font-size:14px;
    color:#b39800;
    vertical-align:top;
}

 td big{
     font-size:20px;
     font-width:bold;
 }

td small{
    font-size:12px;
}

hr{
    border: 1px solid rgba(0,0,0,0.2);
}

/*Card*/
.card{
    margin:17px;
    min-height:230px;
    border:thin;
    box-shadow: 2px 2px 4px 2px rgba(0,0,0,0.2);
    padding-bottom:10px;
}



.isicard{
    padding-left:10px;
    padding-right:10px;
    background-color:#FFFFFF;
    color:#b39800;
    min-height:185px;
    font-size:14px;
}

.isicard select{
    width:100px;
    padding:0.8em;
    margin-top:1em;
    border:1px solid #b39800;
    Background-color:#FFFFFF;
    font-family:Cambria;
    font-size:14px;
    color:#b39800;
    text-align:center;
    border-radius:5px;
}

.isicard hr,
.isicard img{
    border:1px solid rgba(0,0,0,0.2);
}

.isicard .badge{
    width:35px;
    height:23px;
    border-radius:7px;
    float:right;
    background-color:#b39800;
    color:#FFFFFF;
    text-align:center;
    font-weight:bold;
    font-size:17px;
}

.isicard big{
    font-size:18px;
    font-weight:bold;
}

.kakicard{
    padding-left:10px;
    padding-right:10px;
    background-color:#FFFFFF;
    color:#b39800;
    text-align:right;
    min-height:50px;
}

.kotak{
    border:1px solid #b39800;
    color:#b39800;
    padding:4px 10px 5px;
    font-size:14px;
    margin:0 0px 0 0;
    font-weight:bold;
}

.kotak:hover{
    background-color:#b39800;
    border:1px solid #b39800;
    color:#FFFFFF;
    padding:4px 10px 5px;
    font-size:14px;
    margin:0 0px 0 0;
    font-weight:bold; 
}
</style>
</head>

<body>
<?php
if(!empty($_SESSION["useradm"]) and !empty($_SESSION["passadm"])){
	$sqla = mysqli_query($kon, "select * from admin where 
username='$_SESSION[useradm]' and password='$_SESSION[passadm]'");
	$ra = mysqli_fetch_array($sqla);
?> 
<div class="grid">
	<div class="dh12">
		<div class="container1">
		<span style="font-size:20px; cursor:pointer; padding-right:15px;"
onclick="openNav()">&#9776;</span>
		<a href="<?php echo "?p=home"; ?>" class="style1">Snd Onlineshop Admin</a>		
		</div>
	</div>
</div>

<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;
</a>
	<img src="../foto/avtr.jpg" width="150px" />
	<p>Selamat Datang</p>
	<h3><?php echo "$ra[namalengkap]"; ?></h3>
	<hr><a href="<?php echo "?p=home"; ?>">Beranda</a>
	<hr><a href="<?php echo "?p=kategori"; ?>">Kategori</a>
	<hr><a href="<?php echo "?p=produk"; ?>">Produk</a>
	<hr><a href="<?php echo "?p=jasakirim"; ?>">Jasa Kirim</a>
	<hr><a href="<?php echo "?p=anggota"; ?>">Anggota</a>
	<hr><a href="<?php echo "?p=order&st=semua"; ?>">Transaksi</a>
	<hr><a href="<?php echo "?p=logout"; ?>">Logout</a>
</div>

<script>
function openNav(){
	document.getElementById("mySidenav").style.width = "350px";
}
function closeNav(){
	document.getElementById("mySidenav").style.width = "0px";
}
</script>

<div class="grid">
	<div class="dh12">
		<div class="container2">
		<?php
		if($_GET["p"] == "logout"){
			include "logout.php";
		}else if($_GET["p"] == "kategori"){
			include "kategori.php";
		}else if($_GET["p"] == "kategoriadd"){
			include "kategoriadd.php";	
		}else if($_GET["p"] == "kategoriedit"){
			include "kategoriedit.php";	
		}else if($_GET["p"] == "kategoridel"){
			include "kategoridel.php";
		}else if($_GET["p"] == "produk"){
			include "produk.php";
		}else if($_GET["p"] == "produkadd"){
			include "produkadd.php";
		}else if($_GET["p"] == "produkedit"){
			include "produkedit.php";
		}else if($_GET["p"] == "produkdel"){
			include "produkdel.php";
		}else if($_GET["p"] == "produkdetail"){
			include "produkdetail.php";
		}else if($_GET["p"] == "jasakirim"){
			include "jasakirim.php";
		}else if($_GET["p"] == "jasakirimadd"){
			include "jasakirimadd.php";
		}else if($_GET["p"] == "jasakirimedit"){
			include "jasakirimedit.php";
		}else if($_GET["p"] == "jasakirimdel"){
			include "jasakirimdel.php";
		}else if($_GET["p"] == "anggota"){
			include "anggota.php";
		}else if($_GET["p"] == "anggotadel"){
			include "anggotadel.php";
		}else if($_GET["p"] == "order"){
			include "order.php";
		}else if($_GET["p"] == "orderstatus"){
				include "orderstatus.php";
		}else if($_GET["p"] == "orderdetail"){
			include "orderdetail.php";	
			}else{
			include "home.php";
		}
		?>
		</div>
	</div>
</div>

<div class="grid">
	<div class="dh12">
		<div class="container3">
		Copyright &copy; Sandy Mulyanda, 2021
		</div>
	</div>
</div>
<?php
	}else{
	include "login.php";
	}
	?>
</body>
</html>
