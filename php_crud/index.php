<?php 
require 'db.php';

$stmt = $pdo->query("SELECT * FROM notes ORDER BY created_at DESC");
$notes = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App</title>
    <link rel="stylesheet" href="style/bootstrap.css">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="m-4">
        <h1>Daftar Catatan</h1>
        <ul>
            <?php foreach ($notes as $note): ?>
                <li>
                    <div class="content">
                        <strong><?= htmlspecialchars($note['title']) ?></strong><br>
                        <p><?= nl2br(htmlspecialchars($note['content'])) ?></p><br>
                        <small><?= $note['created_at'] ?></small><br>
                    </div>
                    <div class="action">
                        <a class="btn btn-secondary" href="edit.php?id=<?= $note['id'] ?>">Edit</a>
                        <a class="btn btn-danger" href="delete.php?id=<?= $note['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                    </div>
                </li>
                <hr>
                <?php endforeach; ?>
            </ul>
            <a id="add" class="btn btn-primary" href="create.php">+ Tambah catatan</a>
    </div>
</body>
</html>