<p><div class="container5">
    <div class="grid">
        <div class="dh12">
            <div class="card">
                <div class="kepalacard">
                    Proses Checkout
                </div>
                <div class="isicard" style="text-align:center;">
                <?php
                $sqldata = mysqli_query($kon,"select * from anggota where idanggota='$_SESSION[idanggota]'");
                $data = mysqli_fetch_array($sqldata);

                ?>

                <form action="<?php echo "?p=selesaibelanjaaksi"; ?>" enctype="multipart/form-data" method="post">
                <input type="text" name="idag" value="<?php echo "$_SESSION[idanggota]";?>">
                <input type="text" name="email" id="" value="<?php echo "$data[email]"; ?>">
                <input type="text" name="nama" value="<?php echo "$data[nama]"; ?>">
                <input type="text" name="nohp" value="<?php echo "$data[nohp]"; ?>">
                <textarea name="alamat" id="" cols="30" rows="10"><?php echo "$data[alamat]"; ?></textarea>
                <textarea name="alamatkirim" id="" cols="30" rows="10" placeholder="Alamat Kirim"></textarea>

                <?php
                $sqlj = mysqli_query($kon,"select * from jasakirim order by nama asc");
                ?>
                    <select name="idjasa" id="">
                        <option value="0">Pilih Jasa Kirim</option>
                <?php
                    while ($rj = mysqli_fetch_array($sqlj)) {
                        ?>
                        <option value="<?php echo "$rj[idjasa]";?>"><?php echo "$rj[nama]"; ?></option>
                        <?php
                    }
                ?>
                    
                    </select>
                    <br><br>
                <input type="submit" name="submit" value="PROSES CHECKOUT">

            </form>
            </div>
            </div>
        </div>
    </div>

</div>