<?php 
require 'db.php';

$id = $_GET['id'] ?? null;

if(!$id) {
    die("ID tidak ditemukan");
}

$stmt = $pdo->prepare('DELETE FROM notes WHERE id = :id');
$stmt->execute([':id' => $id]);

header("Location: index.php");
exit;
?>