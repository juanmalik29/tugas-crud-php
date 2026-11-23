<?php
require_once 'koneksi.php';

$sql = "SELECT tb_game.*, tb_genre.genre 
        FROM tb_game 
        INNER JOIN tb_genre ON tb_game.id_genre = tb_genre.id_genre";
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Game</title>
</head>
<body>
    <h2>Data Game</h2>
    <a href="game-add.php">+ Tambah Game</a>
    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Genre</th>
            <th>Judul Game</th>
            <th>Developer</th>
            <th>Cover Game</th>
            <th>Publisher</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $no = 1;
        while ($data = mysqli_fetch_assoc($query)) { 
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($data['genre']); ?></td>
            <td><?= htmlspecialchars($data['judul_game']); ?></td>
            <td><?= htmlspecialchars($data['developer']); ?></td>
            <td><img src="uploads/<?= $data['cover_game']; ?>" width="80"></td>
            <td><?= htmlspecialchars($data['publisher']); ?></td>
            <td>
                <a href="game-edit.php?id=<?= $data['id_game']; ?>">Edit</a> | 
                <a href="game-delete.php?id=<?= $data['id_game']; ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>