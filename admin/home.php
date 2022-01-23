<div class="grid style1">
<!-- Untuk Kategori -->
	<?php 
	$sqlk = mysqli_query($kon, "select * from kategori");
	$rowk = mysqli_num_rows($sqlk);
	$sqlkl = mysqli_query($kon, "select * from kategori order by tglkat desc limit 2");
	?>
	<div class="dh3">
		<div id="boxval">
		
			<h3><?php echo "$rowk"; ?></h3>
			</div>
			<div class="card">
			<div class="kepalacard"> <h2>Kategori</h2>
			   <p>Kategori Terbaru</p></div>
			<div class="isicard">
		<?php
		if($rowk == 0){
			echo "Belum ada kategori ditambahkan";
		}else{
			echo "<hr>";
			while($rk = mysqli_fetch_array($sqlkl)){
			echo "<big>$rk[namakat]</big>
				<br>$rk[ketkat]
				<hr>";
				}
			}
			?>
		</div>
		<div class="kakicard">
			<a href="<?php echo "?p=kategori";?>"><button type="button" class="btn btn-add">Lihat Semua Kategori &raquo;</button></a>
			</div>
		</div>
		<br>
	</div>	
	
	<!-- Untuk Produk -->
	<?php 
	$sqlk = mysqli_query($kon, "select * from produk");
	$rowk = mysqli_num_rows($sqlk);
	$sqsqlpllkl = mysqli_query($kon, "select * from produk order by tglproduk desc limit 1");
	
	?>
	<div class="dh3">
		<div id="boxval">
			
			<h3><?php echo "$rowk"; ?></h3>
			</div>
			<div class="card">
			<div class="kepalacard"> <h2>Produk</h2>
			   <p>Produk Terbaru</p></div>
			<div class="isicard" style="text-align:center;">
		<?php
		
		if($rowk == 0){
			echo "<div align='center'><h2>Belum ada produk ditambahkan</h2></div>";
		}else{
			echo "<hr>";
			echo "<h2>Data Produk</h2>";
		}
			?>
		</div>
		<div class="kakicard">
			<a href="<?php echo "?p=produk";?>"><button type="button" class="btn btn-add">Lihat Semua Produk &raquo;</button></a>
			</div>
		</div>
		<br>
	</div>	
	
	<!-- Untuk Anggota -->
	<?php 
	$sqlk = mysqli_query($kon, "select * from anggota");
	$rowk = mysqli_num_rows($sqlk);
	$sqlkl = mysqli_query($kon, "select * from anggota order by tgldaftar desc limit 2");
	?>
	<div class="dh3">
		<div id="boxval">
		
			<h3><?php echo "$rowk"; ?></h3>
			</div>
			<div class="card">
			 
			<div class="kepalacard"> 
  			 <h2>Anggota</h2>
			   <p>Anggota Terbaru</p>
  </div>
			<div class="isicard">
		<?php
		if($rowk == 0){
			echo "<hr>";
			echo "<div align='center'>Belum ada anggota yang terdaftar</div>";
			echo "<hr>";
			}else{
			while($rag = mysqli_fetch_array($sqlkl)){
			echo "<br>";
			echo "<img src='../foto/$rag[foto]'  width='100' height='100' style='border-radius:50%'>";
			echo "<hr>";
			echo "<b>$rag[nama]</b>";
			echo "<hr>";
			echo "$rag[email]";
			echo "<hr>";
			echo "$rag[nohp]";
			echo "<hr>"; 
				}
			}
			?>
		</div>
		<div class="kakicard">
			<a href="<?php echo "?p=anggota";?>"><button type="button" class="btn btn-add">Lihat Semua Anggota &raquo;</button></a>
			</div>
		</div>
		<br>
	</div>	
		<!-- Untuk Transaksi -->
	<?php 
	$sqlk = mysqli_query($kon, "select * from orders");
	$rowk = mysqli_num_rows($sqlo);
	$sqlkl = mysqli_query($kon, "select * from orders where statusorder='Baru' order by tglorder desc limit 2");
	?>
	<div class="dh3">
		<div id="boxval">
			
			<h3><?php echo "$rowk"; ?></h3>
			</div>
			<div class="card">
			
			<div class="kepalacard"> 
			<h2>Transaksi</h2>
			<p>Transaksi Terbaru</p>
	</div>
			<div class="isicard">
			<hr>
			Status Order<br>
			<a href="<?php echo "?p=order&st=Baru"; ?>"><button type="button" class="btn btn-add">Baru</button></a>
			<a href="<?php echo "?p=order&st=Lunas"; ?>"><button type="button" class="btn btn-add">Lunas</button></a>
			<a href="<?php echo "?p=order&st=Dikirim"; ?>"><button type="button" class="btn btn-add">Dikirim</button></a>
			<a href="<?php echo "?p=order&st=Diterim"; ?>"><button type="button" class="btn btn-add">Diterima</button></a>
		<?php
		if($rowo == 0){
			echo "<hr>";
			echo "<div align='center'>Belum ada Transaksi yang masuk</div>";
			echo "<hr>";
			}else{
			echo "<hr>";
			while($rol = mysqli_fetch_array($sqlol)){
			echo "<big>#$rol[noorder] - $rol[statusorder]</big>";
			echo "<br><small><i>pada $rol[tglorder] WIB</i></small>";
			echo "<hr>";
			 }
			}
			?>
		</div>
		<div class="kakicard">
			<a href="<?php echo "?p=order&st=Semua";?>"><button type="button" class="btn btn-add">Lihat Semua Transaksi &raquo;</button></a>
			</div>
		</div>
		<br>
	</div>
	
</div>