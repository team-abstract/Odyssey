<?php

require('db_connect.php');

$sql = "SELECT id FROM users;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id " . $row["id"] . "<br>";
    }
} else {
    echo "[-] Something else happened";
}

$conn->close();

?>
