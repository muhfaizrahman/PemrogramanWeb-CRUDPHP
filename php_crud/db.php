<?php 
$host = "127.0.0.1";
$username = "root";
$password ="";
$dbname = "db_crud";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    // Bikin objek PDO
    $pdo = new PDO($dsn, $username, $password, $options);

} catch (PDOException $e) {
    // Tampilkan error jika gagal koneksi
    die("Koneksi gagal" . $e->getMessage());
    exit;
}
?>