<?php 
require 'db.php';

// Ambil data berdasarkan ID
$id = $_GET['id'] ?? null;

if(!$id) {
    die("ID tidak ditemukan");
}

// Ambil data lama dari database
$stmt = $pdo->prepare('SELECT * FROM notes WHERE id= :id');
$stmt->execute([':id' => $id]);
$note = $stmt->fetch();

if(!$note) {
    die('Catatan tidak ditemukan');
}

// Proses update data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';

    if ($title) {
        $stmt = $pdo->prepare('UPDATE notes SET title = :title, content = :content WHERE id = :id');
        $stmt->execute([
            ':title' => $title,
            ':content' => $content,
            ':id' => $id
        ]);
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="style/bootstrap.css">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="m-4">
        <h1>Edit Data</h1>
        <form action="" method="POST">
            <input type="text" name="title" value="<?= htmlspecialchars($note['title']) ?>" required>
            <br><br>
            <textarea name="content" row="5" cols="50"><?= htmlspecialchars($note['content']) ?></textarea>
            <br><br>
            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>
</body>
</html>