<?php

include('auth.php');

require("db_connect.php");

$search = $_POST['search'];

$search = "%$search%";

$sql = "SELECT * FROM items WHERE author LIKE :author";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':author', $search);

$stmt->execute([$search]);

$sqlRow = $stmt->fetchAll();

print_r($sqlRow);

/*
for ($i = 0; $i < count($sqlRow); $i++) {
    echo $sqlRow[$i] . "\n";
}*/

?>
