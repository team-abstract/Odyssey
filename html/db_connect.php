<?php

$servername = "localhost";
$username = "insert_username_here";
$password = "insert_passwd_here";
$dbname = "odyssey";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("[!] Connection failed: " . $conn->connect_error);
} 

echo "[+] Connected successfully" . "<br>";

?>
