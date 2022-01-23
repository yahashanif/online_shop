<div id="signin">
<fieldset>
<img src="foto/avtr.jpg". width="120px">
<form name="form1" method="post" action="" enctype="multipart/form-data">
	<h3>ANGGOTA</h3>
	<?php
	?>
	<p>SILAHKAN LOGIN</p>
	<input name="email" type="text" id="email" placeholder="Email">
	<input name="password" type="password" id="Password" placeholder="Password"
	>
	<input name="login" type="submit" id="login" value="LOGIN ANGGOTA">
	<p>
	Belum Terdaftar? <a href="<?php echo "?p=register"; ?>">Register</a> disini
	</form>

 <?php
if(isset($_POST["login"])){
	$email=(isset($_POST['email'])? $_POST['email']:'');
	$ps=(isset($_POST['password'])? $_POST['password']:'');
$sqlag = mysqli_query($kon, "select * from anggota where
email='$_POST[email]' and password='$_POST[password]'");
	$ra = mysqli_fetch_array($sqlag);
	$row = mysqli_num_rows($sqlag);
	echo $ra;
	if($ra){
	session_start();
	$_SESSION["userag"] = $ra["nama"];
	$_SESSION["email"] = $ra["email"];
	$_SESSION["passag"] = $ra["password"];
	echo "<div align='center'>Login Berhasil</div>";
	}else{
	echo "<div align='center'>Login Gagal</div>";
	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=beranda'>";
}
?>
</fieldset>
</div>