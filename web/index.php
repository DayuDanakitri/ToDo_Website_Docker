<?php
$conn = new mysqli(
    getenv("DB_HOST"),
    getenv("DB_USER"),
    getenv("DB_PASS"),
    getenv("DB_NAME")
);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM tasks ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>📋 To-Do List</h1>

    <form action="add.php" method="POST" style="margin-bottom: 25px;">
        <input 
            type="text" 
            name="title" 
            placeholder="Nama Tugas" 
            required
            style="padding:8px; width:45%;"
        >

        <select name="category" style="padding:8px;">
            <option value="Kuliah">Kuliah</option>
            <option value="Pribadi">Pribadi</option>
            <option value="Lainnya">Lainnya</option>
        </select>

        <button type="submit">Tambah</button>
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>Tugas</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php if ($result->num_rows > 0): ?>
            <?php $no = 1; ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= $row['category'] ?></td>
                    <td>
                        <?= $row['status'] === 'done' 
                            ? '✅ Selesai' 
                            : '⏳ Pending' ?>
                    </td>
                    <td>
                        <?php if ($row['status'] !== 'done'): ?>
                            <a href="update.php?id=<?= $row['id'] ?>">
                                <button class="btn-done">Selesai</button>
                            </a>
                        <?php endif; ?>

                        <a href="delete.php?id=<?= $row['id'] ?>" 
                           onclick="return confirm('Yakin hapus task ini?')">
                            <button class="btn-delete">Hapus</button>
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" style="text-align:center;">
                    Belum ada tugas
                </td>
            </tr>
        <?php endif; ?>
    </table>
</div>

</body>
</html>
