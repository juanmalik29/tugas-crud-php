<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Judul Game</title>
</head>

<body>
    
    <h2>Tambah Judul Game</h2>

    <form method="POST" action="judul-game-save.php">

        <label>Judul Game</label>
        <br>
        <input type="text" name="judul-game" placeholder="Masukkan Judul Game..." required>

        <br><br>

        <button type="submit" name="save">Simpan Judul</button>
        <a href="judul-game.php">Kembali</a>

    </form>

</body>
</html>
