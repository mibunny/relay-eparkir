<?php
$host = "mysql.railway.internal";
$db   = "railway";
$user = "root";
$pass = "yDtVxAAwXAacKARCVpUaejJyEcgFSzZC";
$port = 3306;

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
