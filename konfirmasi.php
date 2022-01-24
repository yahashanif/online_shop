<div class="card">
    <div class="kepalacard">Konfirmasi Pembayaran</div>
    <div class="isicard" style="text-align:center">
<form action="" method="get" enctype="multipart/form-data">
    <div class="dh12">
        <input type="hidden" name="p" value="<?=$_GET['p']?>">
        <input type="hidden" name="idag" value="<?=$_GET['idag']?>">
        <input type="text" name="noorder" id="" placeholder="Masukan No Order (Tanpa #)" value="<?=$_GET['noorder']?>">
        <br>
        <input type="submit" value="Cari No Order">

    </div>
</form> 

<?php

$sqlo = mysqli_query($kon,"select * from orders where noorder='$_GET[noorder]'");
$ro = mysqli_fetch_array($sqlo);
$sqlbyr = mysqli_query($kon,"select * from pembayaran where idorder='$rop[idorder]'");
$rbyr = mysqli_fetch_array($sqlbyr);
$rowbyr = mysqli_num_rows($sqlbyr);
$sqlag = mysqli_query($kon,"select * from anggota where idanggota='$_SESSION[idanggota]'");
$rag = mysqli_fetch_array($sqlag);
$total = number_format($ro['total']);
$jmltrs = number_format($rbyr['jumlahtranfer']);

?>

<form action="" name="form2" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idorder" value="<?=$ro['idorder']?>">
    <input type="text" name="tglorder" value="Tanggal Order : <?=$ro['tglorder']?> WIB">
    <input type="text" name="nama" value="Atas Nama : <?=$rag['nama']?>">
    <input type="text" name="total" value="Sebesar : IDR <?=$total?>">
    <p>
        <h2>Dari Rekening</h2>
        <input type="text" name="namabankpengirim" placeholder="Nama Bank Pengirim" value="<?=$rbyr['namabankpengirim']?>">
        <input type="text" name="namapengirim" placeholder="Nama Pengirim" value="<?=$rbyr['namapengirim']?>">
        <input type="text" name="jumlahtranfer" placeholder="Jumlah Tranfer" value="<?=$jmltrs?>">
        <input type="date" name="tgltranfer" placeholder="Tanggal Tranfer ex : 0000-00-00" value="<?=$rbyr['tgltranfer']?>">
        <p>
            <h2>Ke Rekening</h2>
            <input type="text" name="bankpenerima" placeholder="Nama Bank Penerima" value="<?=$rbyr['namabankpenerima']?>">
            <h2>Bukti Transfer</h2>
            <?php
            if($rowbyr > 0){
                echo "<div align='center'><a href='buktibayar/$rbyr[bukti]' target='blank'><img src='buktibayar/$rbyr[bukti] width='200px'></a></div>";
            }else{
                ?>
                <input type="file" name="bukti" placeholder="Nama Bank Penerima">
                <input type="submit" name="konfirmasi" value="KONFIRMASI PEMBAYARAN"> 
                <?php
            }
            ?>
        </p>
    </p>
</form>

<?php
    if($_POST['konfirmasi']){
        
        $nmbukti = $_FILES["bukti"]["name"];
        $lokbukti = $_FILES["bukti"]["tmp_name"];
      
        echo $_POST['idorder']; 
        echo "<br>";
        echo $_POST['namabankpengirim'];
        
        echo "<br>";
        echo $_POST['namapengirim'];
        echo "<br>";
        echo $_POST['jumlahtranfer'];
        echo "<br>";
        echo $_POST['tgltranfer'];
        echo "<br>";
        echo $_POST['bankpenerima']; 
        echo "<br>";
        echo $nmbukti;
      
        if(isset($lokbukti)){
            move_uploaded_file($lokbukti,"buktibayar/$nmbukti");
        }

        $sqlb = mysqli_query($kon,"INSERT INTO `pembayaran` (`idorder`, `namabankpengirim`, `namapengirim`, `jumlahtranfer`, `tgltranfer`, `namabankpenerima`, `bukti`)
                            VALUES ('$_POST[idorder]', '$_POST[namabankpengirim]', '$_POST[namapengirim]',
                             '$_POST[jumlahtranfer]', '$_POST[tgltranfer]', '$_POST[bankpenerima]', '$nmbukti')");
        if($sqlb){
            echo "Konfirmasi Pembayaran Berhasil";
        }else{
            echo "Konfirmasi Gagal";
        }
        echo  "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=beranda'>";

    }

?>
</div>
</div>