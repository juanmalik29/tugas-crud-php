<?php
require_once 'koneksi.php';

$sql = "SELECT * FROM tb_genre ORDER BY genre ASC";
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Game</title>
</head>
<body>
    <h2>Tambah Game</h2>

    <form method="POST" action="game-save.php" enctype="multipart/form-data">
        <label>Genre Game</label>
        <br>
        <select name="id_genre" required>
            <option value="">-- Pilih Genre --</option>
            <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                <option value="<?= $data['id_genre']; ?>">
                    <?= htmlspecialchars($data['genre']); ?>
                </option>
            <?php } ?>
        </select>
        <br><br>

        <label>Judul Game</label>
        <br>
        <input type="text" name="judul_game" required>
        <br><br>

        <label>Developer</label>
        <br>
        <input type="text" name="developer" required>
        <br><br>

        <label>Publisher</label>
        <br>
        <input type="text" name="publisher" required>
        <br><br>

        <label>Cover Game</label>
        <br>
        <input type="file" name="cover_game" accept="image/*" required>
        <br><br>

        <button type="submit" name="simpan">Simpan</button>
        <a href="game.php">Kembali</a>
    </form>
</body>
</html>