<?php

require_once 'koneksi.php';
$sql = "SELECT * FROM tb_judul_game ORDER BY id_judul_game DESC";
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Judul Game</title>
</head>

<body>
    <h2>Data Judul Game</h2>
    <a href="judul-game-add.php">+ Tambah Judul Game</a>
    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">

        <thead>
            <tr>
                <th>No</th>
                <th>Judul Game</th>
                <th>Created At</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            if ($query && mysqli_num_rows($query) > 0) {
                while ($data = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($data['judul_game']); ?></td>
                <td><?= htmlspecialchars($data['Created_at'] ?? $data['created_at']); ?></td>
                <td>
                    <a href="judul-game-edit.php?id=<?= $data['id_judul_game']; ?>">Edit</a>
                    
                    <a href="judul-game-delete.php?id=<?= $data['id_judul_game']; ?>"
                        onclick="return confirm('Yakin Ingin Menghapus Judul Game Ini?')">
                        Hapus>
                    </a>
                </td>
            </tr>

            <?php
                }
            } else {
            ?>
            <tr>
                <td colspan="4">Belum Ada Judul Game.</td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
</body>
</html>
