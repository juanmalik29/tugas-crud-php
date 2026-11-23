<?php
require_once 'koneksi.php';

$id = $_GET['id'];

$sql   = "SELECT * FROM tb_game WHERE id_game = '$id'";
$query = mysqli_query($conn, $sql);
$data  = mysqli_fetch_assoc($query);

$sql_genre   = "SELECT * FROM tb_genre ORDER BY genre ASC";
$query_genre = mysqli_query($conn, $sql_genre);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Game</title>
</head>
<body>
    <h2>Edit Game</h2>

    <form method="POST" action="game-update.php" enctype="multipart/form-data">
        <input type="hidden" name="id_game" value="<?= $data['id_game']; ?>">

        <label>Genre Game</label>
        <br>
        <select name="id_genre" required>
            <option value="">-- Pilih Genre --</option>
            <?php while ($gnr = mysqli_fetch_assoc($query_genre)) { ?>
                <option value="<?= $gnr['id_genre']; ?>" <?= ($gnr['id_genre'] == $data['id_genre']) ? 'selected' : ''; ?>>
                    <?= htmlspecialchars($gnr['genre']); ?>
                </option>
            <?php } ?>
        </select>
        <br><br>

        <label>Judul Game</label>
        <br>
        <input type="text" name="judul_game" value="<?= htmlspecialchars($data['judul_game']); ?>" required>
        <br><br>

        <label>Developer</label>
        <br>
        <input type="text" name="developer" value="<?= htmlspecialchars($data['developer']); ?>" required>
        <br><br>

        <label>Publisher</label>
        <br>
        <input type="text" name="publisher" value="<?= htmlspecialchars($data['publisher']); ?>" required>
        <br><br>

        <label>Cover Game</label>
        <br>
        <img src="uploads/<?= $data['cover_game']; ?>" width="80">
        <br>
        <input type="file" name="cover_game" accept="image/*">
        <br><br>

        <button type="submit" name="update">Update</button>
        <a href="game.php">Kembali</a>
    </form>
</body>
</html>