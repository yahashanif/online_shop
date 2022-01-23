<div id="signin">
<fieldset>
<img src="../foto/avtr.jpg". width="120px">
<form name="form1" method="post" action="" enctype="multipart/form-data">
	<h3>ADMINISTRATOR</h3>
	<p>SILAHKAN LOGIN</p>
	<input name="username" type="text" id="username" placeholder="Username">
	<input name="password" type="password" id="Password" placeholder="Password"
	>
	<input name="login" type="submit" id="login" value="LOGIN ADMINISTRATOR">
</form>

<?php
if($_POST["login"]){
$sqla = mysqli_query($kon, "select * from admin where
username='$_POST[username]' and password='$_POST[password]'");
	$ra = mysqli_fetch_array($sqla);
	$row = mysqli_num_rows($sqla);
	if($row > 0){
	session_start();
	$_SESSION['idadmin'] = $ra['idadmin'];
	$_SESSION["useradm"] = $ra["username"];
	$_SESSION["passadm"] = $ra["password"];
	echo "<div align='center'>Login Berhasil</div>";
	}else{
	echo "<div align='center'>Login Gagal</div>";
	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=home'>";
}
?>
</fieldset>
</div>