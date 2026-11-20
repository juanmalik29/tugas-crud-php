<?php

require_once 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tb_judul_game WHERE id_judul_game = '$id'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>
                alert('Judul Game Berhasil Dihapus!');
                window.location='judul-game.php';
            </script>";
    } else {
        echo "<script>
                alert('Judul Game Gagal Dihapus!');
                window.location='judul-game.php';
            </script>";
    }
} else {
    header("Location: judul-game.php");
    exit;
}

?>
