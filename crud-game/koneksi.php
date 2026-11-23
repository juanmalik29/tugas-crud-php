<?php

$conn = mysqli_connect("localhost", "root", "", "db_phpjuan");
if (mysqli_connect_errno()) {
    echo "Koneksi Database Gagal : --> " . mysqli_connect_error();
}

?>
