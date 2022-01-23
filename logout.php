<?php
session_start();
session_destroy();
echo "<p><div align='center'>Anda sudah logout, kami tunggu kunjungannya kembali</div><p>";
echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=beranda'>";
?>
