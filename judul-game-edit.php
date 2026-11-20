<?php

require_once "koneksi.php";

if (!isset($_GET['id'])) {
    header("Location: judul-game.php");
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM tb_judul_game WHERE id_judul_game = ?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "<script>
            alert('Data Judul Tidak Ditemukan!');
            window.location='judul-game.php';
        </script>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Judul Game</title>
</head>

<body>
    <h2>Edit Judul Game</h2>

    <form method="POST" action="judul-game-update.php">
        <input type="hidden" name="id_judul_game" value="<?= $data['id_judul_game']; ?>">

        <label>Judul Game</label>
        <br>
        <input type="text" name="judul_game"
                value="<?= htmlspecialchars($data['judul_game']); ?>" required>

        <br><br>

        <button type="submit" name="update">Update</button>
        <a href="judul-game.php">Kembali</a>
    </form>

</body>
</html>
