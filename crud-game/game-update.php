<?php
require_once 'koneksi.php';

$id         = $_POST['id_game'];
$id_genre   = $_POST['id_genre'];
$judul_game = mysqli_real_escape_string($conn, $_POST['judul_game']);
$developer  = mysqli_real_escape_string($conn, $_POST['developer']);
$publisher  = mysqli_real_escape_string($conn, $_POST['publisher']);

$sql_foto   = "SELECT cover_game FROM tb_game WHERE id_game = '$id'";
$query_foto = mysqli_query($conn, $sql_foto);
$data_foto  = mysqli_fetch_assoc($query_foto);
$cover_game = $data_foto['cover_game'];

if (!empty($_FILES['cover_game']['name'])) {
    $nama_file = $_FILES['cover_game']['name'];
    $tmp_file  = $_FILES['cover_game']['tmp_name'];

    $folder = "uploads/";

    if (move_uploaded_file($tmp_file, $folder . $nama_file)) {
        if (!empty($cover_game)) {
            unlink($folder . $cover_game);
        }
        $cover_game = $nama_file;
    }
}

$sql = "UPDATE tb_game SET 
        id_genre   = '$id_genre',
        judul_game = '$judul_game',
        developer  = '$developer',
        publisher  = '$publisher',
        cover_game = '$cover_game'
        WHERE id_game = '$id'";
$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>
            alert('Game berhasil diperbarui!');
            window.location='game.php';
          </script>";
} else {
    echo "<script>
            alert('Game gagal diperbarui!');
            window.location='game.php';
          </script>";
}
?>