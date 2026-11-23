<?php
require_once 'koneksi.php';

$id_genre   = $_POST['id_genre'];
$judul_game = mysqli_real_escape_string($conn, $_POST['judul_game']);
$developer  = mysqli_real_escape_string($conn, $_POST['developer']);
$publisher  = mysqli_real_escape_string($conn, $_POST['publisher']);

// Upload cover game
$cover_game = $_FILES['cover_game']['name'];
$tmp        = $_FILES['cover_game']['tmp_name'];

$folder = "uploads/";

move_uploaded_file($tmp, $folder . $cover_game);

// Simpan data game
$sql = "INSERT INTO tb_game 
        (id_genre, judul_game, developer, publisher, cover_game) 
        VALUES 
        ('$id_genre', '$judul_game', '$developer', '$publisher', '$cover_game')";
$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>
            alert('Game berhasil ditambahkan!');
            window.location='game.php';
          </script>";
} else {
    echo "<script>
            alert('Game gagal ditambahkan!');
            window.location='game-add.php';
          </script>";
}
?>