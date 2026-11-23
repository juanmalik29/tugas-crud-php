<?php
require_once 'koneksi.php';

$id = $_GET['id'];

$sql   = "SELECT cover_game FROM tb_game WHERE id_game = '$id'";
$query = mysqli_query($conn, $sql);
$data  = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>
            alert('Data game tidak ditemukan!');
            window.location='game.php';
          </script>";
    exit;
}

$folder    = "uploads/";
$nama_file = $data['cover_game'];

if (!empty($nama_file) && file_exists($folder . $nama_file)) {
    unlink($folder . $nama_file);
}

$sql_delete   = "DELETE FROM tb_game WHERE id_game = '$id'";
$query_delete = mysqli_query($conn, $sql_delete);

if ($query_delete) {
    echo "<script>
            alert('Game berhasil dihapus!');
            window.location='game.php';
          </script>";
} else {
    echo "<script>
            alert('Game gagal dihapus!');
            window.location='game.php';
          </script>";
}
?>