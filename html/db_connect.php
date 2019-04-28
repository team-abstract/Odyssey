<?php

$servername = "localhost";
$username = "insert_username_here";
$password = "insert_passwd_here";
$dbname = "odyssey";
$charset = "utf8mb4";

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);

$dsn = "mysql:host=$servername;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

/*
// Check connection
if ($conn->connect_error) {
    die("[!] Connection failed: " . $conn->connect_error);
} 

*/

echo "[+] Connected successfully" . "<br>";

?>
