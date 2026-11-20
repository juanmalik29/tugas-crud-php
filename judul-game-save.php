<?php

require_once 'koneksi.php';

if (isset($_POST['simpan']) || isset($_POST['judul_game'])) {
    $judul_game = mysqli_real_escape_string($conn, trim($_POST['judul_game']));
    
    $sql = "INSERT INTO tb_judul_game (judul_game) VALUES ('$judul_game')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>
                alert('Judul Berhasil Ditambahkan!');
                window.location='judul-game.php';
            </script>";
    } else {
        echo "<script>
                alert('Judul Gagal Ditambahkan!');
                window.location='judul-game.php';
            </script>";
    }
} else {
    header("Location: judul-game.php");
    exit;
}

?>
