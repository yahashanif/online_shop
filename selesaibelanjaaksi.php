<div class="container5">
    <div class="grid">
        <div class="dh5">
            <?php
            $tgl = date('d');
            $bln = date('m');
            $thn = date('y');
            $jam = date('H');
            $mnt = date('i');
            $dtk = date('s');
            $idorderbantu = ''.$tgl.''.$bln.''.$thn.''.$jam.''.$mnt.''.$dtk;
           

            // Menyimpan Data order
            mysqli_query($kon,"INSERT INTO `orders` (`noorder`, `idanggota`, `alamatkirim`, `tglorder`, `statusorder`)
            VALUES ('$idorderbantu', '$_POST[idag]', '$_POST[alamatkirim]',  now(), 'Baru');");

            // Mendapatkan ID Order
            // $idorder = mysqli_inser_id($kon);
            // echo $idorder;

            // Memanggil fungsi dan menghitung produk
            $sqlc = mysqli_query($kon,"select * from cart where idanggota='$_POST[idag]'");
            $rowc = mysqli_num_rows($sqlc);
            $jml = $rowc;
           

            // menghapus data dari tabel cart
            mysqli_query($kon,"delete * from cart where idanggota='$_POST[idag]'");

            // Menampilkan Data dan  Order dari Anggota
            ?>
            <div class="kepalacard">Terima Kasih</div>
            <div class="isicard" style="text-align:left;">
                <p>No. Order : <big><b>#<?php echo "$tgl$bln$thn$jam$mnt$dtk"; ?></b></big></p><br>
                Nama <br><big><b><?php echo $_POST['nama'];?></b></big><br>
                Email <br><big><b><?php echo $_POST['email'];?></b></big><br>
                No. Handphone <br><big><b><?php echo $_POST['nohp'];?></b></big><br>
                Alamat <br><big><b><?php echo $_POST['alamat'];?></b></big><br>
                Alamat Pengiriman<br><big><b><?php echo $_POST['alamatkirim'];?></b></big>
            </div>

        <?php
        while ($rc = mysqli_fetch_array($sqlc)) {
            $sqlp = mysqli_query($kon,"select * from produk where idproduk='$rc[idproduk]'");
            $rp = mysqli_fetch_array($sqlp);
            $stok = $rp['stok'];
            $jumlahbeli = $rc['jumlahbeli'];
            $stokakhir = $stok - $jumlahbeli;
            mysqli_query($kon,"UPDATE produk SET stok ='$stokakhir' WHERE idproduk='$rc[idproduk]'");

            $no = $i + 1;
            $disk = ($rp['diskon'] * $rp['harga']) / 100;
            $hrgbaru = $rp['harga'] - $disk;
            $subtotal = $jumlahbeli * $hrgbaru;
            $tot = $tot + $subtotal;
            $brt = $jumlahbeli * $rp['berat'];
            $berat = $berat + $brt;
            $st = number_format($subtotal);
            $hrg = number_format($rp['harga']);
            $hrgbr = number_format($hrgbaru);

            if($rp['diskon'] > 0) {
                $diskon = "<font color='red'>-$rp[diskon]%</font>";
                $hrglama = "<font style='text-decoration:line-through'>IDR $hrg</font>";
            }else{
                $diskon ="";
                $hrglama="";
            }
           

            if(isset($rp['foto1'])){
                $foto1 = "fotoproduk/$rp[foto1]";
            }else{
                $foto1 = "fotoproduk/avatar.png";
            }
            echo $foto1;
            ?>
            <div class="dh6">
                <div class="card">
                    <div class="isicard">
                        <table width='100%' border='0' cellpadding='5' cellspacing='5'>
                            <tr valign='top'>
                                <td width='100px'>
                                    <img src="$foto1" width='100px' alt="">
                                </td>
                                <td>
                                    <big><?php echo $rp['nama'];?></big><p>
                                        <?php echo $diskon; echo $hrglama; ?><br>
                                        <big>IDR <?php echo $hrgbr ?> *  <?php echo $jumlahbeli; ?></big>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="kepalacard">
                        Subtotal : IDR <?php echo $st; ?>
                    </div>
                </div>
                <br>
            </div>
            <?php
            // simpan data orderdetail
            mysqli_query($kon,"INSERT INTO `orderdetail` (`idorder`, `idproduk`, `idjasa`, `jumlahbeli`, `subtotal`)
            VALUES ('$idorder', '$rc[idproduk]', '$_POST[idjasa]', '$jumlahbeli', '$subtotal');");
        }

        $sqlj = mysqli_query($kon,"select * from jasakirim where idjasa='$_POST[idjasa]'");
        $rj = mysqli_fetch_array($sqlj);
        $tarif= $berat * $rj['tarif'];
        $trf = number_format($tarif);
        $total = $tot  + $tarif;
        $t = number_format($total);
        
        ?>
        <div class="dh12">
            <div class="kepalacard">
                Berat : <?php echo $berat;?> KG
            </div><br>
            <div class="kepalacard">
                Jasa Pengiriman <?php echo $rj['nama'];?> : IDR <?php echo $trf;?>
            </div><br>
            <div class="kepalacard">
                Total : IDR <?php echo $st;?>
            </div><br>
        </div>

        <!-- Update Data Total -->
        <?php
        mysqli_query($kon,"UPDATE orders SET total='$total' where idorder='$idorder'");
        ?>
        <div class="dh12">
            <div align="right">
                <a href="javascript:window.print()"><button type="button" class="btn btn-add">Cetak Faktur</button></a>
            </div>
        </div>
        </div>

    </div>
</div>