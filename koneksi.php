<?php

date_default_timezone_set("Asia/Jakarta");

$conn = mysqli_connect("localhost", "root", "", "db_phpdaffa");
if (mysqli_connect_errno()) {
    echo "Koneksi Database Gagal! : --> " . mysqli_connect_error();
}

?>
