<?php 
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';

    if ($title) {
        // $stmt = $pdo->prepare("INSERT INTO notes (title, content) VALUES (?,?)");
        // $stmt->execute([$title, $content]);
        $stmt = $pdo->prepare("INSERT INTO notes (title, content) VALUES (:title,:content)");
        $stmt->execute([
            ':title' => $title,
            ':content' => $content
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
    <title>Create</title>
    <link rel="stylesheet" href="style/bootstrap.css">
</head>
<body>
    <div class="m-4">
        <h1>Buat Catatan Baru</h1>
        <form action="" method="POST">
            <input type="text" name="title" placeholder="judul catatan" required>
            <br><br>
            <textarea name="content" placeholder="isi konten" rows="5" cols="50"></textarea>
            <br><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>